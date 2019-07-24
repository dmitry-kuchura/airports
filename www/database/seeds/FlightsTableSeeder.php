<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 150; $i++) {

            $date = Carbon::now()->addDays(rand(5, 25));

            DB::table('flights')->insert([
                'flight_number' => rand(112, 882),
                'transporter_id' => rand(1, 8),
                'departure_airport_id' => rand(15, 21),
                'arrival_airport_id' => rand(15, 21),
                'departure_at' => $date->format('Y-m-d H:i:s'),
                'arrival_at' => $date->addMinutes(rand(59, 240))->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
