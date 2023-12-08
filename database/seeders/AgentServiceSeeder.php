<?php

namespace Database\Seeders;

use App\Models\AgentService;
use Illuminate\Database\Seeder;

class AgentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AgentService::insert([
            ["name"=>"Transaction management (Writing and sending out contracts, disclosures, and addendums)"],
            ["name"=>"Meeting a Buyer for one showing"],
            ["name"=>"Meeting a Buyer for multiple showings"],
            ["name"=>"Hosting an Open House"],
            ["name"=>"Meeting Inspectors, Appraisers, etc"],
            ["name"=>"Meeting a Seller"],
            ["name"=>"Referral"],
            ["name"=>"Other"],
        ]);
    }
}
