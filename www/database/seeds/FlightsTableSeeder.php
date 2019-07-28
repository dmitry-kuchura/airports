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
        for ($i = 0; $i < 7000; $i++) {

            $date = Carbon::now()->addDays(rand(1, 5));

            $departure = rand(1, 13);
            $arrival = $this->randomAirportWithoutRepeat($departure);

            DB::table('flights')->insert([
                'flight_number' => rand(112, 882),
                'transporter_id' => rand(1, 8),
                'departure_airport_id' => $departure,
                'arrival_airport_id' => $arrival,
                'departure_at' => $date->format('Y-m-d H:i:s'),
                'arrival_at' => $date->addMinutes(rand(59, 360))->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }

    function randomAirportWithoutRepeat($value)
    {
        $airports = range(1, 13);

        if (($key = array_search($value, $airports)) !== false) {
            unset($airports[$key]);
        }

        $random = array_rand($airports);

        return $airports[$random];
    }
}
