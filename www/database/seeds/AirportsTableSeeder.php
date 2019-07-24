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
                'name' => 'Kyiv - Zhulyany',
                'city' => 'Kyiv',
                'country' => 'Ukraine',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'KBP',
                'name' => 'Kyiv - Borispol',
                'city' => 'Kyiv',
                'country' => 'Ukraine',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'VIE',
                'name' => 'Vienna',
                'city' => 'Vienna',
                'country' => 'Austria',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'LCA',
                'name' => 'Larnaca',
                'city' => 'Larnaca',
                'country' => 'Cyprus',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'CPH',
                'name' => 'Copenhagen',
                'city' => 'Copenhagen',
                'country' => 'Denmark',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'CGN',
                'name' => 'Cologne',
                'city' => 'Cologne',
                'country' => 'Germany',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'key' => 'LEJ',
                'name' => 'Leipzig',
                'city' => 'Leipzig',
                'country' => 'Germany',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
    }
}