<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ url('images/logo-icon.png') }}">
    <title>Painel de Senhas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: 30vh !important;">

                <h4 class="text-center h1">Ações para o atendimento</h4>
                <table class="table">

                    <thead class="text-warning text-center">
                        <div class="text-center" style="font-size: 50px;">
                            {{ $ticket->ticket_number }}
                        </div>
                    </thead>
                    <tbody class="d-flex justify-content-around">
                        <tr>
                            <td class="align-middle" style="padding: 30px !important;"><button type="button"
                                    class="btn btn-secondary btn-lg"
                                    wire:click="absent({{ $ticket->id }})">Ausente</button>
                            </td>

                            <td class="align-middle" style="padding: 30px !important;"><button type="button"
                                    class="btn btn-secondary btn-lg" wire:click="conclude({{ $ticket->id }})">Concluir
                                    atendimento</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>


</body>

</html>