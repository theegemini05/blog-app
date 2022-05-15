<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Software Developer',
                'email' => 'sd@development.com',
                'created_at' => Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        ]);
    }
}
