<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(Request $request, Order $order, User $user)
    {
        $search = $request->input('search');
        $users = $user->all();

        $orders = $order->when($search, function ($query, $search) {
            return $query->where('created_at', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%")
                ->orWhere('total_price', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.ship.index', compact('orders', 'users'));
    }
}
