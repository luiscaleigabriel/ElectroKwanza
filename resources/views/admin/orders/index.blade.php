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
                                            <button type="button" class="btn btn-outline-dark view-order" data-id="{{ $order->id }}">
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

    <!-- Modal de Visualização de detalhes -->
    <!-- Modal de Visualização de detalhes da Compra -->
    <div class="modal fade" id="viewOrderModal" tabindex="-1" aria-labelledby="viewOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- modal maior -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes da Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID da Compra:</strong> <span id="orderId"></span></p>
                    <p><strong>Cliente:</strong> <span id="orderCustomer"></span></p>
                    <p><strong>Email:</strong> <span id="orderEmail"></span></p>
                    <p><strong>Telefone:</strong> <span id="orderPhone"></span></p>
                    <p><strong>Endereço:</strong> <span id="orderAddress"></span></p>
                    <p><strong>Total:</strong> <span id="orderTotal"></span></p>
                    <p><strong>Status da Compra:</strong> <span id="orderStatus"></span></p>
                    <p><strong>Status da Entrega:</strong> <span id="orderShipStatus"></span></p>
                    <p><strong>Data da Compra:</strong> <span id="orderCreatedAt"></span></p>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewButtons = document.querySelectorAll('.view-order');
            const viewModal = new bootstrap.Modal(document.getElementById('viewOrderModal'));

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-id');

                    fetch(`/admin/orders/${orderId}`)
                        .then(response => response.json())
                        .then(order => {
                            document.getElementById('orderId').textContent = order.id;
                            document.getElementById('orderCustomer').textContent =
                                `${order.user.firstname} ${order.user.lastname}`;
                            document.getElementById('orderEmail').textContent = order.user
                            .email;
                            document.getElementById('orderPhone').textContent = order.user
                            .phone;
                            document.getElementById('orderAddress').textContent = order.user
                                .address;
                            document.getElementById('orderTotal').textContent = parseFloat(order
                                .total_price).toLocaleString('pt-AO', {
                                style: 'currency',
                                currency: 'AOA'
                            });
                            document.getElementById('orderStatus').textContent = order.status;
                            document.getElementById('orderShipStatus').textContent = order
                                .status_ship ? 'Finalizada' : 'Em processo...';
                            document.getElementById('orderCreatedAt').textContent = new Date(
                                order.created_at).toLocaleString('pt-BR');

                            viewModal.show();
                        })
                        .catch(error => console.error('Erro ao buscar detalhes da compra:', error));
                });
            });
        });
    </script>
@endsection
