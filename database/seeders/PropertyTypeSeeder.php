<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Single Family Home,
        Townhome,
        Condo,
        Condo-Hotel,
        Villa,
        Multi-Family,
        Land/Lots,
        Manufactured Homes,
        Mobile Home,
        Modular Home,
        Duplex,
        Triplex,
        Quadruplex,
        Five or more units,
        Commercial */
        $data = [
            ["name"=>"Townhouse"],
            ["name"=>"Multi-family"],
            ["name"=>"Condo"],
            ["name"=>"Land/Lots"],
            ["name"=>"Apartments"],
            ["name"=>"Manufactured"],
            ["name"=>"Condo-Hotel"],
            ["name"=>"Villa"],
            ["name"=>"Single Family Home"],
            ["name"=>"Mobile Home"],
            ["name"=>"Modular Home"],
            ["name"=>"Other"],
        ];
        PropertyType::insert($data);
    }
}
