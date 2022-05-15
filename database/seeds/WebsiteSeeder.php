<?php

use App\Website;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            [
                'name' => 'website 2',
                'created_at' => Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name' => 'website 1',
                'created_at' => Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ]);
    }
}
