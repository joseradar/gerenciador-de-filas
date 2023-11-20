<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Chamador de senhas</title>
    <style>
        * {
            cursor: none;
        }

        body {
            background-color: #1d4c53;
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;
        }

        .imagem {
            vertical-align: middle;
            text-align: center;
            padding-bottom: 15vh;
        }

        .nameNumber {
            border: none;
            color: rgb(200, 211, 0);
            text-align: center;
            text-decoration: none;
            font-family: Arial;
            font-size: 5vh;
            letter-spacing: 20px;
        }

        .stringNumber,
        .stringTable {
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            font-family: Arial;
            font-size: 15vh;
            font-weight: bold;
        }

        .backgroundGreen {
            background-color: rgb(200, 211, 0);
        }

        .nameQueue {
            border: none;
            color: rgb(0, 88, 101);
            text-align: center;
            min-height: 9vh;
            text-decoration: none;
            font-family: Arial;
            font-size: 5vh;
            font-weight: bold;
        }

        .stringDate {
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            font-family: Arial;
            font-size: 5vh;
            font-weight: bold;
        }

        .colunaDados {
            vertical-align: top;
            text-align: center;
            width: 32%;
        }

        .stringTime {
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            font-family: Arial;
            font-size: 10vh;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <audio style="display: none" id="audioDing" src="{{ asset('ding.mp3') }}"></audio>

    <table style="text-align: center; margin-top:20vh; !important;width: 100%; margin-left: auto; margin-right: auto;"
        border="0" cellpadding="2" cellspacing="2">
        <tbody>
            <tr>
                <td></td>
                <td rowspan="0" class="colunaDados">
                    <table style="text-align: center; width: 100%; margin-right: auto; padding-top: 100px;">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="nameNumber" id="nameNumber">SENHA</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="stringNumber" id="stringNumber">000</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="backgroundGreen">
                                    <div class="nameQueue" id="nameQueue"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="stringDate" class="stringDate">00/00/0000</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="stringTime" class="stringTime">00:00:00</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="imagem">
                    <img id="media-image" src="{{ asset('propaganda.png') }}" style="width: 1280px;height: 720px;"
                        alt="Sem imagem">
                </td>

            </tr>
        </tbody>
    </table>
    <script>
        startSetInterval();
        atualizaSenha();

        function startSetInterval() {
            setInterval(atualizaHora, 1000);
            setInterval(atualizaSenha, 1000);
        }

        function addLeadingZeros(number, length = 2) {
            return String(number).padStart(length, '0');
        }

        function atualizaHora() {
            const data = new Date();
            const dia = addLeadingZeros(data.getDate());
            const mes = addLeadingZeros(data.getMonth() + 1);
            const ano = data.getFullYear();
            const hora = addLeadingZeros(data.getHours());
            const minuto = addLeadingZeros(data.getMinutes());
            const segundo = addLeadingZeros(data.getSeconds());

            const horaImprimivel = `${hora}:${minuto}:${segundo}`;
            const dataImprimivel = `${dia}/${mes}/${ano}`;

            document.getElementById('stringTime').textContent = horaImprimivel;
            document.getElementById('stringDate').textContent = dataImprimivel;
        }
        function atualizaSenha() {
            fetch('{{ route("call.verify") }}')
                .then(response => response.json())
                .then(data => {
                    if (data && data.ticket_number) {
                        document.getElementById('stringNumber').textContent = data.ticket_number;
                        document.getElementById('nameQueue').textContent = data.queue;
                        var audio = document.getElementById('audioDing');
                        audio.play();
                    }
                })
                .catch(error => console.error('Erro ao buscar senha:', error));
        }

    </script>
</body>

</html>