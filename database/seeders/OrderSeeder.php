<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new Order();
        $order->name = "Yuki";
        $order->tel = "09X-XXX-XXX9";
        $order->address = "11X/44X saimai XX saimaiRd. saimai BKK 10220";
        $order->amount = 5000.00;
        $order->status = 0;
        $order->save();

        $order = new Order();
        $order->name = "Sayuri";
        $order->tel = "08X-XXX-XXX8";
        $order->address = "11X/55X saimai XX saimaiRd. saimai BKK 10220";
        $order->amount = 1500.00;
        $order->status = 0;
        $order->save();

    }
}
