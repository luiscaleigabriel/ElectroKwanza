<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(Order $order, User $user, Request $request)
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

    public function confirm($id, Order $order)
    {
        $order = $order->findOrFail($id);

        $updated = $order->update([
            'status_ship' => true
        ]);

        if($updated) {
            return redirect()->back()->with('success', 'Entrega finalizada com sucesso!');
        }else {
            return redirect()->back()->with('error', 'Ocorreu um erro ao finalizar entrega, tente novamente!');
        }
    }
}
