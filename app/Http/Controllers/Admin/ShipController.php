<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(Order $order, User $user)
    {
        $users = $user->all();
        $orders = $order->all();

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
