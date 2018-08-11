<?php

namespace App\Respositories\Builder\Parameters;

use Illuminate\Database\Eloquent\Builder;

class ConditionsParam extends AbstractParameter
{

    /**
     * @var array
     */
    protected $operators = [
        "eq" => "\\App\\Respositories\\Builder\\Operators\\AbstractOperator",
        "gt" => "\\App\\Respositories\\Builder\\Operators\\GreaterOperator",
        "in" => "\\App\\Respositories\\Builder\\Operators\\InOperator"
    ];

    /**
     * @param $data
     * @return Builder
     */
    public function build($data): Builder
    {
        if (!isset($data["conditions"]) || !is_array($data["conditions"])) {
            return $this->builder;
        }

        foreach ($data["conditions"] as $key => $fieldValue) {

            list($fieldName, $operator) = array_pad(explode(":", $key), 2, "eq");

            if (!isset($this->operators[$operator])) {
                continue;
            }

            // attribute
            if (strpos($fieldName, ".") === false) {
                if (in_array($fieldName, $this->builder->getModel()::ALLOWED_ATTRIBUTES)) {
                    $operatorClassName = $this->operators[$operator];
                    $this->builder = (new $operatorClassName($this->builder))->build($fieldName, $fieldValue);
                    continue;
                }
            }

            // relation
            $attrs = explode(".", $fieldName);

            if (count($attrs) > 3) {
                continue;
            }

            switch(count($attrs)) {

                // 1 level relation
                case 2:
                    list($relationName, $relationAttribute) = $attrs;
                    if (in_array($relationName, ($this->builder->getModel())::ALLOWED_RELATIONSHIPS)
                        && in_array($relationAttribute, ("\\App\\Models\\".ucfirst(rtrim($relationName, "s")))::ALLOWED_ATTRIBUTES)
                    ) {
                        $this->builder->whereHas($relationName, function ($query) use (
                            $operator,
                            $relationAttribute,
                            $fieldValue
                        ) {
                            $operatorClassName = $this->operators[$operator];
                            return (new $operatorClassName($query))->build($relationAttribute, $fieldValue);
                        });
                    }
                    break;

                // 2 level relation
                case 3:
                    list($relationName, $subRelationName, $subRelationAttribute) = $attrs;
                    if (
                        in_array($relationName, ($this->builder->getModel())::ALLOWED_RELATIONSHIPS)
                        && in_array($subRelationName, ("\\App\\Models\\".ucfirst(rtrim($relationName, "s")))::ALLOWED_RELATIONSHIPS)
                        && in_array($subRelationAttribute, ("\\App\\Models\\".ucfirst(rtrim($subRelationName, "s")))::ALLOWED_ATTRIBUTES)
                    ) {
                        $this->builder->whereHas($relationName, function ($query) use (
                            $operator,
                            $subRelationName,
                            $subRelationAttribute,
                            $fieldValue
                        ) {
                            return $query->whereHas($subRelationName, function ($query) use (
                                $operator,
                                $subRelationAttribute,
                                $fieldValue
                            ) {
                                $operatorClassName = $this->operators[$operator];
                                return (new $operatorClassName($query))->build($subRelationAttribute, $fieldValue);
                            });
                        });
                    }
                    break;
            }
        }
        return $this->builder;
    }

}
