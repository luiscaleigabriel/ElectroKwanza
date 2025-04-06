<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index(Order $order, User $user)
    {
        $orders = $order->all();
        $users = $user->all();

        $price_total_orders = 0;
        foreach($orders as $order) {
            $price_total_orders += $order->total_price;
        }

        $ganhos = $price_total_orders - ($price_total_orders - (($price_total_orders * 30) / 100));

        return view('admin.dashboard', compact('orders', 'users', 'ganhos', 'price_total_orders'));
    }
}
