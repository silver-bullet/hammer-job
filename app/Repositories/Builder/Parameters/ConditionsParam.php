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

            if ( in_array($fieldName, $this->builder->getModel()::ALLOWED_ATTRIBUTES)
                 && isset($this->operators[$operator])
            ) {
                $operatorClassName = $this->operators[$operator];
                $this->builder = (new $operatorClassName($this->builder))->build($fieldName, $fieldValue);
            }

        }

        return $this->builder;
    }

}