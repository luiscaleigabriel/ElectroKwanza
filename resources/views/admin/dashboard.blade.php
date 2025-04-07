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
                        <h6 class="mb-0">{{ $vendasDoDia }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Ganhos do Dia</p>
                        <h6 class="mb-0">{{ number_format($ganhosDoDia, 2, ',', '.') }}Kz</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Ganhos do Mês</p>
                        <h6 class="mb-0">{{ number_format($ganhosDoMes, 2, ',', '.') }}Kz</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Ganhos do Ano</p>
                        <h6 class="mb-0">{{ number_format($ganhosDoAno, 2, ',', '.') }}Kz</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <!-- Gráfico de Vendas do Mês -->
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Vendas do Mês</h6>
                    </div>
                    <canvas id="vendasDoMesChart"></canvas>
                </div>
            </div>

            <!-- Gráfico de Ganhos do Mês -->
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Ganhos do Mês</h6>
                    </div>
                    <canvas id="ganhosDoMesChart"></canvas>
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
                <a href="{{ route('admin.orders') }}">Mostrar Todas</a>
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
                                <td>{{ $order->ship > 0 ? number_format($order->ship, 2, ',', '.') . 'Kz' : 'Indisponivel' }}
                                </td>
                                <td><button type="button" class="btn btn-success btn-sm "
                                        disabled>{{ $order->status }}</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gráfico de Vendas do Mês
            var vendasPorDiaData = @json($vendasPorDia);
            var vendasPorDiaLabels = vendasPorDiaData.map(function(item) {
                return item.date;
            });
            var vendasPorDiaCounts = vendasPorDiaData.map(function(item) {
                return item.sales;
            });

            var vendasDoMesChart = new Chart(document.getElementById('vendasDoMesChart'), {
                type: 'line',
                data: {
                    labels: vendasPorDiaLabels,
                    datasets: [{
                        label: 'Vendas',
                        data: vendasPorDiaCounts,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false,
                        tension: 0.1
                    }]
                }
            });

            // Gráfico de Ganhos do Mês
            var ganhosPorDiaData = @json($ganhosPorDia);
            var ganhosPorDiaLabels = ganhosPorDiaData.map(function(item) {
                return item.date;
            });
            var ganhosPorDiaValues = ganhosPorDiaData.map(function(item) {
                return item.profit;
            });

            var ganhosDoMesChart = new Chart(document.getElementById('ganhosDoMesChart'), {
                type: 'bar',
                data: {
                    labels: ganhosPorDiaLabels,
                    datasets: [{
                        label: 'Ganhos (35% do valor)',
                        data: ganhosPorDiaValues,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                }
            });
        });
    </script>
@endsection
