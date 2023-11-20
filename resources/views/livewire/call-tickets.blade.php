<div wire:poll>
    <div class="row g-5" style="margin-top: 3vh !important;">
        <div class="col-8">
            <div class="card shadow">
                <div class="card-header card-header-warning">
                    <h4 class="card-title text-center">Senhas em espera</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover datatable numbers-table">
                        <thead class="text-warning text-center">
                            <th>Senha</th>
                            <th>Fila</th>
                            <th>Tempo de Espera</th>

                        </thead>
                        <tbody class="text-center">

                            @foreach ($tickets as $ticket)

                            <tr>
                                <td style="max-width: 6rem;">
                                    {{ $ticket->ticket_number }}
                                </td>

                                <td>{{ $ticket->queue->name }}</td>
                                <td>
                                    {{ $ticket->created_at->diffForHumans() }}
                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow">
                <div class="card-header card-header-warning">
                    <h4 class="card-title text-center">
                        Ações
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table datatable">
                        <tbody class="text-center">
                            <tr>
                                <td><button class="btn btn-secondary" wire:click="callNext()">
                                        Chamar Próxima
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>