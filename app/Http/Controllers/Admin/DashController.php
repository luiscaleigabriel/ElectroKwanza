<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    public function index(Order $order, User $user)
    {
        $hoje = Carbon::today();
        $mesAtual = now()->month;
        $anoAtual = now()->year;

        $users = $user->all();
        $orders = $order->orderBy('created_at', 'desc')->limit(5)->get();

        $vendasDoDia = Order::whereDate('created_at', $hoje)->count();

        $ganhosDoDia = Order::whereDate('created_at', $hoje)
            ->where('status', 'Finalizada')
            ->sum(DB::raw('total_price * 0.35'));

        $ganhosDoMes = Order::whereYear('created_at', $anoAtual)
            ->whereMonth('created_at', $mesAtual)
            ->where('status', 'Finalizada')
            ->sum(DB::raw('total_price * 0.35'));

        $ganhosDoAno = Order::whereYear('created_at', $anoAtual)
            ->where('status', 'Finalizada')
            ->sum(DB::raw('total_price * 0.35'));

        // Para o gráfico de vendas do mês, vamos pegar as vendas de cada dia do mês atual
        $vendasPorDia = Order::whereYear('created_at', $anoAtual)
            ->whereMonth('created_at', $mesAtual)
            ->selectRaw('DATE(created_at) as date, count(*) as sales')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        // Para o gráfico de ganhos do mês, também pegamos os ganhos de cada dia do mês
        $ganhosPorDia = Order::whereYear('created_at', $anoAtual)
            ->whereMonth('created_at', $mesAtual)
            ->where('status', 'Finalizada')
            ->selectRaw('DATE(created_at) as date, sum(total_price * 0.35) as profit')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        return view('admin.dashboard', compact('vendasDoDia', 'ganhosDoDia', 'ganhosDoMes', 'ganhosDoAno', 'users', 'orders', 'vendasPorDia', 'ganhosPorDia'));
    }
}
