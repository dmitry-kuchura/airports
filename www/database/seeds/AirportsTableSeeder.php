<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $value) {
            DB::table('airports')->insert($value);
        }
    }

    protected function data()
    {
        return [
            [
                'key' => 'IEV',
                'name' => 'Igor Sikorsky Kyiv International Airport',
                'city' => 'Kyiv',
                'country' => 'Ukraine',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'KBP',
                'name' => 'Boryspil International Airport',
                'city' => 'Kyiv',
                'country' => 'Ukraine',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'VIE',
                'name' => 'Vienna International Airport',
                'city' => 'Vienna',
                'country' => 'Austria',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'LCA',
                'name' => 'Larnaca International Airport',
                'city' => 'Larnaca',
                'country' => 'Cyprus',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'CPH',
                'name' => 'Copenhagen Airport, Kastrup',
                'city' => 'Copenhagen',
                'country' => 'Denmark',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'CGN',
                'name' => 'Cologne Bonn Airport',
                'city' => 'Cologne',
                'country' => 'Germany',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'LEJ',
                'name' => 'Leipzig/Halle Airport',
                'city' => 'Leipzig',
                'country' => 'Germany',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'CRL',
                'name' => 'Brussels South Charleroi Airport',
                'city' => 'Brussel',
                'country' => 'Belgium',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'GYD',
                'name' => 'Baku Heydar Aliyev International Airport',
                'city' => 'Baku',
                'country' => 'Azerbaijan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'SPU',
                'name' => 'Split Airport',
                'city' => 'Split',
                'country' => 'Croatia',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'PRG',
                'name' => 'Václav Havel Airport Prague',
                'city' => 'Prague',
                'country' => 'Czech republic',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'KEF',
                'name' => 'Reykjavík Airport',
                'city' => 'Reykjavik',
                'country' => 'Iceland',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'BUD',
                'name' => 'Budapest Ferenc Liszt International Airport',
                'city' => 'Budapest',
                'country' => 'Hungary',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
    }
}
