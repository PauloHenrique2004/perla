<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="card-body">
        <div class="row">

            {{-- Nome --}}
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                           value="{{ old('nome', $depoimento->nome) }}">
                </div>
            </div>

            {{-- Estrelas --}}
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="estrelas">Estrelas</label>
                    <select id="estrelas" name="estrelas" class="form-control">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}"
                                {{ old('estrelas', $depoimento->estrelas ?? 5) == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            {{-- Ordem --}}
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="ordem">Ordem</label>
                    <input type="number" class="form-control" id="ordem" name="ordem" required
                           value="{{ old('ordem', $depoimento->ordem) }}">
                </div>
            </div>

            {{-- Ativo --}}
            <div class="col-sm-3 d-flex align-items-center">
                <div class="form-group mb-0">
                    <label for="ativo" class="mr-2">Ativo</label><br>
                    <input type="hidden" name="ativo" value="0">
                    <input type="checkbox" id="ativo" name="ativo" value="1"
                        {{ old('ativo', $depoimento->ativo) ? 'checked' : '' }}>
                </div>
            </div>

            {{-- Foto --}}
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="foto">Foto (avatar)</label>
                    <div class="alert alert-warning py-2" role="alert" style="margin-bottom:8px;">
                        Dimensão sugerida: 200 × 200 px. Formatos: JPG/PNG/WebP.
                    </div>
                    <input type="file" class="form-control" id="foto" name="foto"
                           accept=".png,.jpg,.jpeg,.webp">
                    @if(!empty($depoimento->foto))
                        <div class="mt-2">
                            <img src="{{ Storage::disk('storage_configuracoes')->url($depoimento->foto) }}"
                                 alt="{{ $depoimento->nome }}"
                                 style="max-height: 80px; width:80px; border-radius:50%; object-fit:cover;">
                        </div>
                    @endif
                </div>
            </div>

            {{-- Texto --}}
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="texto">Texto do depoimento</label>
                    <textarea id="texto" name="texto" rows="4" required
                              class="form-control">{{ old('texto', $depoimento->texto) }}</textarea>
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
