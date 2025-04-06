<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request, Order $order, User $user)
    {
        $search = $request->input('search');
        $users = $user->all();

        $orders = $order->when($search, function ($query, $search) {
            return $query->where('created_at', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%")
                ->orWhere('total_price', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.orders.index', compact('orders', 'users'));
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);

        return response()->json([
            'id' => $order->id,
            'status' => $order->status,
            'total_price' => $order->total_price,
            'ship' => $order->ship,
            'status_ship' => $order->status_ship,
            'created_at' => $order->created_at,
            'user' => [
                'firstname' => $order->user->firstname,
                'lastname' => $order->user->lastname,
                'email' => $order->user->email,
                'phone' => $order->user->phone,
                'address' => $order->user->address,
            ],
        ]);
    }
}
