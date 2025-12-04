<div class="modal fade" id="usuarioNaoLogadoModal" tabindex="-1" role="dialog"
     aria-labelledby="usuarioNaoLogadoModal"
     aria-hidden="true" style="background: rgb(117 117 117 / 81%); z-index: 9999">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div style="font-size: 15px; text-transform: uppercase; font-weight: bold; color: #852525; text-align: center">
                    Para utilizar essa forma de envio é necessário realizar autenticação!
                </div>
            </div>

            <div class="modal-footer p-0 border-0">
                <div class="col-6 m-0 p-0">
                    <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Fechar</button>
                </div>
                <div class="col-6 m-0 p-0">
                    <a href="{{ route('login') }}"class="btn btn-success btn-lg btn-block">
                        <span style="font-size: 13px">REALIZAR AUTENTICAÇÃO</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
