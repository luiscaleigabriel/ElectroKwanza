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

        dd(count($users));
        return view('admin.dashboard', compact('orders', 'users'));
    }
}
