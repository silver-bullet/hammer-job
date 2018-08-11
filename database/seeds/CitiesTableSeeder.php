<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * @var City
     */
    protected $city;

    /**
     * CitiesTableSeeder constructor.
     * @param City $city
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            "Berlin",
            "Porta Westfalica",
            "Lommatzsch",
            "Hamburg",
            "Bülzig",
            "Diesbar-Seußlitz"
        ];

        foreach($cities as $city) {
            $this->city->create(["name" => $city]);
        }
    }
}
