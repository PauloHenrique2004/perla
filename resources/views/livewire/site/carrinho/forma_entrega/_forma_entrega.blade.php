<div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">
    <!-- address header -->
    <div class="card-header bg-white border-0 p-0" id="headingtwo">
        <h2 class="mb-0">
            <button type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true"
                    class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                    aria-controls="collapsetwo"
                    wire:click="changeCard('formaEntrega')">
                <span class="c-number">2</span> Entrega

                @if(Auth::check())
                    <a href="" wire:click.prevent="editarEndereco()"
                       {{--                   data-toggle="modal" data-target="#exampleModal"--}}
                       class="text-decoration-none text-success ml-auto">
                        <i class="icofont-plus-circle mr-1"></i>Adicionar novo endereço</a>
                @endif
            </button>
        </h2>
    </div>
    <!-- body address -->
    <div id="collapsetwo" class="collapse show"
         aria-labelledby="headingtwo" data-parent="#accordionExample">
        <div class="card-body p-0 border-top">
            <div class="osahan-order_address">
                <div class="p-3 col-md-12 form-group">
                    <label for="formaEntrega">*Forma de Entrega</label>

                    <select wire:model="pedido.forma_entrega_id" id="formaEntrega"
                            class="form-control @error('municipioId') is-invalid @enderror">
                        <option value=""></option>
                        @foreach($formasEntrega as $formaEntrega)
                            <option value="{{$formaEntrega->id}}">
                                {{ $formaEntrega->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @if($informarEndereco)
                    <div class="p-3 row">
                        @if(sizeof($usuarioEnderecos) > 0)
                            @foreach($usuarioEnderecos as $endereco)
                                @include('livewire.site.carrinho.forma_entrega._endereco', compact('pedido', 'endereco'))
                            @endforeach
                        @else
                            <div style="color: var(--site-cor); margin: 0 auto; font-size: 14px; font-weight: bold">
                                Você nã possui nenhum endereço cadastrado.
                                <div style="text-align: center">
                                    @if(Auth::check())
                                        <a href="" wire:click.prevent="editarEndereco()"
                                           {{--                   data-toggle="modal" data-target="#exampleModal"--}}
                                           class="text-decoration-none text-success ml-auto">
                                            <i class="icofont-plus-circle mr-1"></i>Cadastrar endereço para entrega</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                    <style>
                        .endereco {
                            border: 1px solid #9a9a9a;
                            border-radius: 4px;
                        }

                        .endereco-selecionado {
                            border: 2px solid #225f39;
                        }
                    </style>
                @endif
            </div>
        </div>
    </div>
</div>
