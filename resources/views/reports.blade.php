<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Fila</th>
                            <th>Tempo Médio de Atendimento (minutos)</th>
                            <th>Número de Senhas Geradas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($queues as $queue)
                        <tr>
                            <td>{{ $queue->name }}</td>
                            <td>{{ $queue->average }}</td>
                            <td>{{ $queue->countTickets }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <canvas id="graficoTempoMedioAtendimento"></canvas>
                <canvas id="graficoSenhasPorFila"></canvas>
            </div>
        </div>
    </div>
    <script>
        const dataTempoMedio = {
            labels: @json($queues->pluck('name')),
            datasets: [{
                label: 'Tempo Médio de Atendimento (minutos)',
                data: @json($queues->pluck('average')),
                backgroundColor: ['blue', 'red', 'green', 'yellow', 'orange', 'purple', 'brown', 'pink', 'gray', 'cyan'],
            }]
        };

        const dataSenhasPorFila = {
            labels: @json($queues->pluck('name')),
            datasets: [{
                label: 'Número de Senhas Geradas',
                data: @json($queues->pluck('countTickets')),
                backgroundColor: ['blue', 'red', 'green', 'yellow', 'orange', 'purple', 'brown', 'pink', 'gray', 'cyan'],
            }]
        };

        new Chart(document.getElementById('graficoTempoMedioAtendimento'), {
            type: 'bar',
            data: dataTempoMedio,
        });

        new Chart(document.getElementById('graficoSenhasPorFila'), {
            type: 'bar',
            data: dataSenhasPorFila,
        });
    </script>
</body>

</html>