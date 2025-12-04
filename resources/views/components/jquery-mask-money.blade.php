@props([
'id',
'label',
'wireModel',
'value'
])

@if($label)
    <label for="{{ $id }}">{{ $label }}</label>
@endif

<!-- Campo de Cobaia somente para armazenar o valor formatado -->
<input
    id="{{ $id }}"
    type="text"
    class="form-control valor @error($wireModel) is-invalid @enderror"
    value="{{ number_format(floatval($value), 2, ',', '.') }} "
    wire:ignore
>

<input
    type="hidden"
    class="@error($wireModel) is-invalid @enderror"

    wire:model="{{ $wireModel }}"
    x-data
    x-init="
                valorInput = $( $($el).parent().find('.valor')[0] );

                valorInput.on('keyup change', function() {
                    valorFloat = removeJqueryMaskMoney( $(this).val() );
                    @this.set('{{ $wireModel }}', valorFloat);
                });

                setTimeout(() => { maskMoney(); }, 100);
            "
>

@error($wireModel)
<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
@enderror
