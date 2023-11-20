<div>
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
                                class="btn btn-secondary btn-lg" wire:click="absent({{ $ticket->id }})">Ausente</button>
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