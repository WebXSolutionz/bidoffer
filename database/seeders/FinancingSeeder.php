<?php

namespace Database\Seeders;

use App\Models\Financing;
use Illuminate\Database\Seeder;

class FinancingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ["name"=>"Assumable"],
            ["name"=>"Cash"],
            ["name"=>"Conventional"],
            ["name"=>"Exchange/Trade"],
            ["name"=>"FHA"],
            ["name"=>"Lease Option"],
            ["name"=>"Lease Purchase"],
            ["name"=>"Other"],
            ["name"=>"Private Financing Available"],
            ["name"=>"Special Funding"],
            ["name"=>"USDA Loan"],
            ["name"=>"VA Loan"],
            ["name"=>"Non-QM"],
            ["name"=>"Jumbo"] */
        Financing::insert([
            ["name"=>"Cash"],
            ["name"=>"Conventional"],
            ["name"=>"FHA"],
            ["name"=>"Jumbo"],
            ["name"=>"VA"],
            ["name"=>"USDA"],
            ["name"=>"No-Doc"],
            ["name"=>"Non-QM"],
            ["name"=>"Other"],
            ["name"=>"Crypto"],
            ["name"=>"Crypto currency"],
            ["name"=>"Bitcoin (BTC)"],
            ["name"=>"Ethereum (ETH)"],
            ["name"=>"Litecoin (LTC)"],
            ["name"=>"Bitcoin Cash (BCH)"],
            ["name"=>"Dash (DASH)"],
            ["name"=>"Ripple (XRP)"],
            ["name"=>"Tether (USDT)"],
            ["name"=>"USD Coin (USDC)"],
            ["name"=>"NFT"],
        ]);
    }
}
