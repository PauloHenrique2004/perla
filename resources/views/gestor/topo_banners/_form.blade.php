<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="card-body">
        <div class="row">

            {{-- Título --}}
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo"
                           value="{{ old('titulo', $topoBanner->titulo) }}">
                </div>
            </div>

            {{-- Link (opcional) --}}
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="link">Link (opcional)</label>
                    <input type="text" class="form-control" id="link" name="link"
                           value="{{ old('link', $topoBanner->link) }}">
                </div>
            </div>

            {{-- Ordem --}}
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="ordem">Ordem</label>
                    <input type="number" class="form-control" id="ordem" name="ordem"
                           value="{{ old('ordem', $topoBanner->ordem) }}">
                </div>
            </div>

            {{-- Ativo --}}
            <div class="col-sm-3 d-flex align-items-center">
                <div class="form-group mb-0">
                    <label for="ativo" class="mr-2">Ativo</label><br>
                    <input type="checkbox" id="ativo" name="ativo" value="1"
                        {{ old('ativo', $topoBanner->ativo) ? 'checked' : '' }}>
                </div>
            </div>

            {{-- Imagem Desktop --}}
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="imagem_desktop">Imagem Desktop</label>
                    <div class="alert alert-warning py-2" role="alert" style="margin-bottom:8px;">
                        Dimensão recomendada: 1920 × 500 px. Formatos: JPG/PNG/WebP.
                    </div>
                    <input type="file" class="form-control" id="imagem_desktop" name="imagem_desktop" accept=".png,.jpg,.jpeg,.webp">
                    @if(!empty($topoBanner->imagem_desktop))
                        <div class="mt-2">
                            <img src="{{ Storage::disk('storage_configuracoes')->url($topoBanner->imagem_desktop) }}"
                                 alt="Desktop" style="max-height: 80px;">
                        </div>
                    @endif
                </div>
            </div>

            {{-- Imagem Mobile --}}
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="imagem_mobile">Imagem Mobile</label>
                    <div class="alert alert-warning py-2" role="alert" style="margin-bottom:8px;">
                        Dimensão recomendada: 800 × 800 px. Formatos: JPG/PNG/WebP.
                    </div>
                    <input type="file" class="form-control" id="imagem_mobile" name="imagem_mobile" accept=".png,.jpg,.jpeg,.webp">
                    @if(!empty($topoBanner->imagem_mobile))
                        <div class="mt-2">
                            <img src="{{ Storage::disk('storage_configuracoes')->url($topoBanner->imagem_mobile) }}"
                                 alt="Mobile" style="max-height: 80px;">
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
