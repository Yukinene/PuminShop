<?php

namespace Database\Seeders;
use App\Models\Log;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $log = new Log();
        $log->name = "Yuki";
        $log->orderid = "1";
        $log->pname = "Almonds";
        $log->amount = 20;
        $log->save();

        $log = new Log();
        $log->name = "Sayuri";
        $log->orderid = "2";
        $log->pname = "Cashew nut";
        $log->amount = 5;
        $log->save();

        $log = new Log();
        $log->name = "Sayuri";
        $log->orderid = "2";
        $log->pname = "Fried Cashews Nuts";
        $log->amount = 5;
        $log->save();

    }
}
