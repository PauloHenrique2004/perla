@section('title', 'Formulário Cupom Desconto - ')
@section('header-title', 'Formulário Cupom Desconto')

<form wire:submit.prevent="salvar">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="codigo">*Código</label>
                    <input type="text" class="form-control @error('cupomDesconto.codigo') is-invalid @enderror"
                           id="codigo" wire:model.debounce.500ms="cupomDesconto.codigo">

                    @error('cupomDesconto.codigo')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="qtd_uso_maxima">*Qtd de Uso Máxima</label>
                    <input type="number" class="form-control @error('cupomDesconto.qtd_uso_maxima') is-invalid @enderror"
                           id="qtd_uso_maxima" wire:model.debounce.500ms="cupomDesconto.qtd_uso_maxima">

                    @error('cupomDesconto.qtd_uso_maxima')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="validade">*Validade</label>
                    <input type="text" id="validade" required
                           class="form-control @error('cupomDesconto.validade') is-invalid @enderror"
                           value="{{ !empty($cupomDesconto->validade) ? $cupomDesconto->validade->format('d/m/Y') : '' }}"
                           autocomplete="off" wire:ignore
                           x-data x-ref="validade"
                           x-init="
                                atualizarValor = () => {
                                    data = $($refs.validade).val() ? moment($($refs.validade).val(), 'DD/MM/YYYY') : moment()
                                    @this.set('cupomDesconto.validade', data.format('YYYY/MM/DD'));
                                }
                                $($refs.validade).datepicker({
                                    change: () => atualizarValor(), locale: 'pt-br', uiLibrary: 'bootstrap4',
                                    format: 'dd/mm/yyyy', icons: { rightIcon: '' },
                                });
                           "
                    >

                    @error('cupomDesconto.validade')
                    <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    *<x-jquery-mask-money wire-model="cupomDesconto.valor" id="valor" label="Valor" value="{{ $cupomDesconto->valor }}" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    *<x-jquery-mask-money wire-model="cupomDesconto.valor_minimo_pedido" id="valorPedidoMinimo" label="O cupom o se aplica a partir de" value="{{ $cupomDesconto->valor_minimo_pedido }}" />
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('gestor.cupom_descontos.index') }}" class="btn btn-default">Voltar</a>
    </div>
</form>
