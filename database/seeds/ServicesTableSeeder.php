<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class ServicesTableSeeder extends Seeder
{
    /**
     * @var Category
     */
    protected $category;

    /**
     * ServicesTableSeeder constructor.
     * @param Category $category
     */
    public function __construct(
        Category $category
    ){
        $this->category = $category;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [ "code" => "804040", "name" => "Sonstige Umzugsleistungen" ],
            [ "code" => "802030", "name" => "Abtransport, Entsorgung und Entrümpelung" ],
            [ "code" => "411070", "name" => "Fensterreinigung" ],
            [ "code" => "402020", "name" => "Holzdielen schleifen" ],
            [ "code" => "108140", "name" => "Kellersanierung" ]
        ];

        foreach($categories as $category) {
            $this->category->create($category);
        }
    }
}
