<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Notifications\OrderProcessed;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $order = Order::factory()->count(1)->make();


        $request->user()->notify(new OrderProcessed($order[0]));


        return redirect()->route('home')->with('status', 'Order Placed!');
    }
}
