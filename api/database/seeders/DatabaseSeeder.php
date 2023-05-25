<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class DatabaseSeeder extends Seeder
{
    public function run()
    {   $path = storage_path('seeds/csv/customers.csv');
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();
        $data = array();

        foreach ($records as $offset => $record) {
            $id = intval($record["id"]);
            $record_data = [
                "id" => $id,
                "first_name" => $record["first_name"],
                "last_name" => $record["last_name"],
                "email" => $record["email"],
                "gender" => $record["gender"],
                "company" => $record["company"],
                "city" => $record["city"],
                "title" => $record["title"],
            ];
            array_push($data, $record_data);
        }
        
        DB::table('customers')->insert($data);

    }
}
