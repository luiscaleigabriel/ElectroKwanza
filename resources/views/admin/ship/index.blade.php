@extends('admin.master')
@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <h2>Entregas</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form class="d-flex" role="search" method="GET" action="{{ route('admin.ship') }}">
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
                                    @if (Auth::user()->role == 'seller')
                                        @if ($order->status_ship == false)
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
                                                            <button type="button" class="btn btn-secondary btn-sm "
                                                                disabled>Em
                                                                processo...</button>
                                                        @endif
                                                    @else
                                                        @if ($order->ship > 0)
                                                            @if ($order->status_ship == true)
                                                                <button type="button" class="btn btn-success btn-sm "
                                                                    disabled>Finalizada</button>
                                                            @else
                                                                <button type="button" class="btn btn-secondary btn-sm "
                                                                    disabled>Em
                                                                    processo...</button>
                                                            @endif
                                                        @elseif ($order->ship == 1)
                                                            <button type="button" class="btn btn-warning btn-sm "
                                                                disabled>Não
                                                                Pago</button>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->status_ship == false)
                                                        <!-- Botão que chama o modal -->
                                                        <button type="button" class="btn btn-outline-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $order->id }}">
                                                            Entregar
                                                        </button>

                                                        <!-- Modal de Confirmação -->
                                                        <div class="modal fade" id="deleteModal{{ $order->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="deleteModalLabel{{ $order->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="deleteModalLabel{{ $order->id }}">
                                                                            Finalização de
                                                                            Entrega</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Entregou o produto do Cliente: <strong>
                                                                            @foreach ($users as $user)
                                                                                @if ($user->id == $order->user_id)
                                                                                    {{ $user->firstname . ' ' . $user->lastname }}
                                                                                @endif
                                                                            @endforeach
                                                                        </strong>?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancelar</button>
                                                                        <form
                                                                            action="{{ route('admin.ship.shipconfirm', $order->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button type="submit"
                                                                                class="btn btn-success">Sim,
                                                                                Entreguei</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        #
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @else
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
                                                            <button type="button" class="btn btn-secondary btn-sm "
                                                                disabled>Em
                                                                processo...</button>
                                                        @endif
                                                    @elseif ($order->ship == 1)
                                                        <button type="button" class="btn btn-warning btn-sm " disabled>Não
                                                            Pago</button>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->status_ship == false)
                                                    <!-- Botão que chama o modal -->
                                                    <button type="button" class="btn btn-outline-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $order->id }}">
                                                        Entregar
                                                    </button>

                                                    <!-- Modal de Confirmação -->
                                                    <div class="modal fade" id="deleteModal{{ $order->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="deleteModalLabel{{ $order->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteModalLabel{{ $order->id }}">
                                                                        Finalização de
                                                                        Entrega</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Entregou o produto do Cliente: <strong>
                                                                        @foreach ($users as $user)
                                                                            @if ($user->id == $order->user_id)
                                                                                {{ $user->firstname . ' ' . $user->lastname }}
                                                                            @endif
                                                                        @endforeach
                                                                    </strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancelar</button>
                                                                    <form
                                                                        action="{{ route('admin.ship.shipconfirm', $order->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="btn btn-success">Sim,
                                                                            Entreguei</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    #
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="5">Nenhuma enconmenda por entregar</td>
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
