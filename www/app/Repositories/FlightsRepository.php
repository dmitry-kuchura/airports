<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Flights;

class FlightsRepository implements Repository
{
    protected $model = Flights::class;

    public function search(array $data)
    {
        // Что бы найти полеты в течении одного дня нужно определить конец дня и начало

        // Так же можно узнать начало дня при помощи mktime
        // $start_day= mktime(0, 0, 0, date("m", strtotime($data["departureDate"])), date("d", strtotime($data["departureDate"])), date("y", strtotime($data["departureDate"])));
        // Но карбоном это немного проще
        $from = Carbon::parse($data["departureDate"])->startOfDay()->format("Y-m-d H:i:s");
        $to = Carbon::parse($data["departureDate"])->endOfDay()->format("Y-m-d H:i:s");

        // Данные о перевозчиках и аэропортах размещены в разных таблицах это в одно время упрощает нам с размерами БД
        // Однао усложняет запрос, но в случае если нужно получить отдельный список аэропортов и список перевозчиков
        // Лучший вариант все же в разных таблицах
        return $this->model::select(
            "transporters.code as transporters_code",
            "transporters.name as transporters_name",
            "flights.flight_number",
            "departure.name AS departure_name",
            "departure.timezone AS departure_timezone",
            "arrival.name AS arrival_name",
            "arrival.timezone AS arrival_timezone",
            "flights.departure_at",
            "flights.arrival_at"
        )
            ->leftJoin("airports as departure", "departure.id", "=", "flights.departure_airport_id")
            ->leftJoin("airports as arrival", "arrival.id", "=", "flights.arrival_airport_id")
            ->leftJoin("transporters", "transporters.id", "=", "flights.transporter_id")
            ->where("departure.key", $data["departureAirport"])
            ->where("arrival.key", $data["arrivalAirport"])
            ->where("flights.departure_at", ">", $from)
            ->where("flights.departure_at", "<", $to)
            ->orderBy("flights.departure_at", "asc")
            ->get();

            // Сам же запрос выглядит так:

            // SELECT
            //      "transporters"."code" AS "transporters_code",
            //      "transporters"."name" AS "transporters_name",
            //      "flight_number",
            //      "departure"."name" AS "departure_name",
            //      "arrival"."name" AS "arrival_name",
            //      "departure_at",
            //      "arrival_at"
            // FROM
            //      "flights"
            // LEFT JOIN "airports" AS "arrival" ON "arrival"."id" = "flights"."arrival_airport_id"
            // LEFT JOIN "airports" AS "departure" ON "departure"."id" = "flights"."departure_airport_id"
            // LEFT JOIN "transporters" ON "transporters"."id" = "flights"."transporter_id"
            // WHERE
            // "departure"."key" = 'KBP'
            // AND "arrival"."key" = 'VIE'
            // AND "flights"."departure_at" > '2019-08-17 00:00:00'
            // AND "flights"."departure_at" < '2019-08-17 23:59:59'
    }

    public function list()
    {
        // TODO: Implement list() method.
    }
}
