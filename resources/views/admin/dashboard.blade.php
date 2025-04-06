@extends('admin.master')
@section('content')

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Vendas do Dia</p>
                    <h6 class="mb-0">{{ count($orders) }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Ganhos do Dia</p>
                    <h6 class="mb-0">{{ number_format($ganhos, 2, ',', '.') }}Kz</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Ganhos do Mês</p>
                    <h6 class="mb-0">{{ number_format($price_total_orders, 2, ',', '.') }}Kz</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total de Usuários</p>
                    <h6 class="mb-0">{{ count($users) }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->

<!-- Sales Chart Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Worldwide Sales</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Salse & Revenue</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Sales Chart End -->

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Vendas Recente</h6>
            <a href="#">Mostrar Todas</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Data</th>
                        <th scope="col">Total</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Entrega</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($order->total_price, 2, ',', '.') }}Kz</td>
                            <td>
                                @foreach ($users as $user)
                                    @if ($user->id == $order->user_id)
                                        {{ $user->firstname . ' ' . $user->lastname }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $order->ship > 0 ? number_format($order->ship, 2, ',', '.') . 'Kz' : 'Indisponivel' }}</td>
                            <td><button type="button" class="btn btn-success btn-sm " disabled>{{ $order->status }}</button></td>
                            <td><a class="btn btn-sm btn-primary" href="#">Detalhes</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
@endsection
