<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retire Sua Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #17a2b8;
            font-family: 'Arial', sans-serif;

        }

        .wrapper {
            padding-top: 3rem;
        }

        .title {
            color: white;
            font-size: 5em;
        }

        .button {
            width: 80% !important;
            height: 150px;
            margin-bottom: 2rem;
            padding: 0.5rem 1rem;
            font-size: 3.5rem;
        }

        .print h1 {
            font-weight: bold !important;
            font-weight: 200;
            color: black;
            font-size: 64px;
        }

        .print {
            font-weight: bold !important;
            font-weight: 200;
            color: black;
            display: none;
        }

        .print h4 {
            font-weight: bold !important;
            font-weight: 200;
            color: black;
            font-size: 18px;
            padding: 10px;
            display: inline-block;
        }

        @media print {
            .print {
                display: block;
            }

            .wrapper {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container wrapper text-center">
        <h1 class="title mb-4">RETIRE SUA SENHA</h1>
        <div class="row">
            @foreach ($queues as $queue)
            <div class="col-12 mb-3">
                <button class="btn btn-light btn-lg button w-100" onclick="handleButtonClick('{{ $queue->id }}')">
                    {{ $queue->name }}
                </button>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container print">
        <div class="row text-center">
            <hr>
            <div class="col-12">
                <h4 id="queue">-</h4>
            </div>
            <div class="col-12">
                <h1 id="ticket_number">-</h1>
            </div>
            <div class="col-6">
                <h4 id="date">-</h4>
            </div>
            <div class="col-6">
                <h4 id="time">-</h4>
            </div>
            <hr>
        </div>
    </div>

    <script>
        function handleButtonClick(queueId) {
            fetch('{{ route('ticket.print', '') }}/' +  queueId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('queue').textContent = data.queue_name;
                    document.getElementById('ticket_number').textContent = data.ticket_number;
                    document.getElementById('date').textContent = data.date;
                    document.getElementById('time').textContent = data.time;
                    const printSection = document.querySelector('.print');
                    printSection.classList.remove('d-none');
                    window.print();
                    printSection.classList.add('d-none');
                });
        }
    </script>


</body>

</html>