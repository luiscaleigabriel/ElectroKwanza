@extends('admin.master')
@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <h2>Compras</h2>
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form class="d-flex" role="search" method="GET" action="{{ route('admin.orders') }}">
                            <input class="form-control me-2" type="search" name="search" placeholder="Buscar por..."
                                value="{{ request('search') }}" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Procurar</button>
                        </form>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Status da Compra</th>
                                    <th>Data da Compra</th>
                                    <th>Entrega</th>
                                    <th>Total</th>
                                    <th>Status Entrega</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <th>{{ $order->id }}</th>
                                        <td>
                                            @foreach ($users as $user)
                                                @if ($user->id == $order->user_id)
                                                    {{ $user->firstname . ' ' . $user->lastname }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm "
                                            disabled>{{ $order->status }}</button>
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}
                                        </td>
                                        <td>
                                            @if ($order->total_price > 100000)
                                                Grátis
                                            @else
                                                {{ number_format($order->ship, 2, ',', '.') }}Kz
                                            @endif
                                        </td>
                                        <td>
                                            {{ number_format($order->total_price, 2, ',', '.') }}Kz
                                        </td>
                                        <td>
                                            @if ($order->total_price > 100000)
                                                @if ($order->status_ship == true)
                                                    <button type="button" class="btn btn-success btn-sm "
                                                        disabled>Finalizada</button>
                                                @else
                                                    <button type="button" class="btn btn-secondary btn-sm " disabled>Em
                                                        processo...</button>
                                                @endif
                                            @else
                                                @if ($order->ship > 0)
                                                    @if ($order->status_ship == true)
                                                        <button type="button" class="btn btn-success btn-sm "
                                                            disabled>Finalizada</button>
                                                    @else
                                                        <button type="button" class="btn btn-secondary btn-sm " disabled>Em
                                                            processo...</button>
                                                    @endif
                                                @elseif ($order->ship == 1)
                                                    <button type="button" class="btn btn-warning btn-sm " disabled>Não
                                                        Pago</button>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-dark view-category"
                                                data-id="{{ $order->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Nenhuma Compra encontrada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $orders->links('pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@endsection
