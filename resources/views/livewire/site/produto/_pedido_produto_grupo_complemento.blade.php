<label tabindex="0" class="complemento-escolhas">
    <span class="complemento-escolhas-conteudo">
            <div class="complemento-escolha-opcao-desc">
                <div>
                    {{ $complemento['nome'] }}
                    <div style="color: #969696;width: 70%;">
                        {{ $complemento['descricao'] }}
                    </div>
                </div>

                @if($complemento['preco'])
                    <span class="complemento-escolha-opcao-valor">+ {{ number_format($complemento['preco'], 2, ',', '.') }}</span>
                @endif
            </div>

            <div class="complemento-contador">
                <button type="button" wire:click="remover({{$index}})" class="complemento-btn-icon complemento-btn-icon--primary complemento-btn-icon--size-m complemento-btn-icon--transparent">
                    <span class="icone-complemento">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#e6505b" fill-rule="evenodd"
                                  d="M17.993 11c.556 0 1.007.444 1.007 1 0 .552-.45 1-1.007 1H6.007A1.001 1.001 0 0 1 5 12c0-.552.45-1 1.007-1h11.986z">
                            </path>
                        </svg>
                    </span>
                </button>

                <div class="complemento-valor">{{ $complemento['quantidade'] }}</div>

                <button type="button" wire:click="adicionar({{$index}})" class="complemento-btn-icon complemento-btn-icon--primary complemento-btn-icon--size-m complemento-btn-icon--transparent">
                   <span class="icone-complemento">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#EA1D2C" fill-rule="evenodd"
                                  d="M13 11h4.993c.556 0 1.007.444 1.007 1 0 .552-.45 1-1.007 1H13v4.993a1 1 0 1 1-2 0V13H6.007A1.001 1.001 0 0 1 5 12c0-.552.45-1 1.007-1H11V6.007a1 1 0 1 1 2 0V11z">
                            </path>
                       </svg>
                   </span>
                </button>
            </div>
    </span>
</label>
