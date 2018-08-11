<?php

use Illuminate\Database\Seeder;
use App\Models\ZipCode;
use App\Models\City;

class ZipCodesTableSeeder extends Seeder
{
    /**
     * @var ZipCode
     */
    protected $zipCode;

    /**
     * @var City
     */
    protected $city;

    /**
     * ZipCodesTableSeeder constructor.
     * @param ZipCode $zipCode
     * @param City $city
     */
    public function __construct(
        ZipCode $zipCode,
        City $city
    )
    {
        $this->zipCode = $zipCode;
        $this->city = $city;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zipCodes = [
            [ "code" => "10115", "city" => "Berlin" ],
            [ "code" => "32457", "city" => "Porta Westfalica" ],
            [ "code" => "01623", "city" => "Lommatzsch" ],
            [ "code" => "21521", "city" => "Hamburg" ],
            [ "code" => "06895", "city" => "Bülzig" ],
            [ "code" => "01612", "city" => "Diesbar-Seußlitz" ],
        ];

        $cities = $this->city->all();
        foreach($zipCodes as $zipCode)
        {
            $city = $cities->firstWhere("name", $zipCode["city"]);

            if (!$city) {
                continue;
            }

            $zipCode["city_id"] = $city->id;
            unset($zipCode["city"]);

            $this->zipCode->create($zipCode);
        }
    }
}
