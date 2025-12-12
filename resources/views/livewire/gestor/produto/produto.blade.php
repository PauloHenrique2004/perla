@section('title', 'Formulário Produto - ')

<form wire:submit.prevent="salvar" id="produto-form">
    <div class="card-header">
        <h1 class="card-title">Formulário Produto</h1>

        <div class="card-tools">
            <div class="float-right">
                <a class="btn btn-default"
                   href="{{ route('gestor.produto.produtos.index') }}">
                    <i class="nav-icon fas fa-book-open"></i>
                    Produtos
                </a>

                <a class="btn btn-danger @if(!$produto->id) disabled @endif" style="color: #fff"
                   href="{{ route('gestor.produto.produto_grupos.index', $produto->id ? $produto->id : 0) }}">
                    <i class="nav-icon fas fa-align-left"></i>
                    Grupos
                </a>

                <button type="submit" class="btn btn-success">
                    <i class="nav-icon fas fa-save"></i> Salvar Produto
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mb-4">
            {{-- Foto principal --}}
            <div class="col-md-6">
                <div style="margin: 0 auto; display: block; width: fit-content">
                    <label for="foto" style="width: 200px; margin: 0 auto; display: block;">
                        <img
                            style="width: 200px; height: 200px; cursor: pointer; object-fit: cover; border-radius: 10%;"
                            class="direct-chat-img"
                            src="{{ ($foto && !$errors->has('foto')) ? $this->foto->temporaryUrl() : $produto->thumbnailUrl() }}"
                            alt="Foto do produto">
                    </label>

                    <input type="file" id="foto" style="visibility: collapse"
                           class="form-control @error('foto') is-invalid @enderror"
                           wire:model="foto">

                    @unless($errors->has('foto'))
                        <div style="text-align: center; border: 1px solid #fff;">
                            <i class="fas fa-info-circle"></i> Tamanho máximo 1MB (JPEG ou PNG)
                        </div>
                        <div style="text-align: center; border: 1px solid #fff;">
                            Resolução 640px x  640px
                        </div>
                    @endunless

                    @error('foto')
                    <div style="text-align: center; color: #a02525;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            {{-- Nome --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control @error('produto.nome') is-invalid @enderror" id="nome"
                           wire:model.debounce.500ms="produto.nome">
                    @error('produto.nome')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            {{-- Categoria --}}
            {{--            <div class="col-md-4">--}}
            {{--                <div class="form-group">--}}
            {{--                    <label for="categoria">*Categoria</label>--}}
            {{--                    <select class="custom-select @error('produto.produto_categoria_id') is-invalid @enderror"--}}
            {{--                            id="categoria" wire:model="produto.produto_categoria_id" required>--}}
            {{--                        <option value="">Selecione</option>--}}
            {{--                        @foreach($categorias as $categoria)--}}
            {{--                            <option value="{{ $categoria->id }}">--}}
            {{--                                {{ $categoria->nome }}--}}
            {{--                            </option>--}}
            {{--                        @endforeach--}}
            {{--                    </select>--}}
            {{--                    @error('produto.produto_categoria_id')--}}
            {{--                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
            {{--                    @enderror--}}
            {{--                    <small class="form-text text-muted">--}}
            {{--                        A configuração da categoria define se o produto será exibido em submenu do menu superior ou na seção de categorias em destaque (bolinhas).--}}
            {{--                    </small>--}}
            {{--                </div>--}}
            {{--            </div>--}}


            {{-- Categoria --}}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="categoria">*Categoria</label>
                    <select class="custom-select @error('produto.produto_categoria_id') is-invalid @enderror"
                            id="categoria" wire:model="produto.produto_categoria_id" required>
                        <option value="">Selecione</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('produto.produto_categoria_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    {{--                    <small class="form-text text-muted">--}}
                    {{--                        A categoria define se o produto aparece no menu do topo ou nas categorias em destaque (bolinhas).--}}
                    {{--                    </small>--}}
                </div>
            </div>

            {{-- Subcategoria (aparece só se a categoria tiver subcategorias) --}}
            {{-- Subcategoria (aparece só se a categoria tiver subcategorias) --}}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="subcategoria">Subcategoria do menu </label>
                    <select id="subcategoria"
                            class="custom-select @error('produto.produto_subcategoria_id') is-invalid @enderror"
                            wire:model="produto.produto_subcategoria_id"
                            @if($subcategorias->isEmpty()) disabled @endif>
                        <option value="">
                            @if($subcategorias->isEmpty())
                                — Esta categoria não possui subcategorias —
                            @else
                                — Selecione uma subcategoria —
                            @endif
                        </option>
                        @foreach($subcategorias as $sub)
                            <option value="{{ $sub->id }}">
                                {{ $sub->produto_subcategoria }}
                            </option>
                        @endforeach
                    </select>

                    @error('produto.produto_subcategoria_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <small class="form-text text-muted">
                        Quando você escolhe uma subcategoria, o produto aparecerá na lista ao clicar nessa opção do menu.
                    </small>
                </div>
            </div>



            {{-- Seção destaque --}}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="destaque_id">Seção de destaque na home</label>
                    <select id="destaque_id"
                            class="custom-select @error('produto.destaque_id') is-invalid @enderror"
                            wire:model="produto.destaque_id">
                        <option value="">— Não destacar na home —</option>
                        @foreach($destaquesHome as $destaque)
                            <option value="{{ $destaque->id }}">{{ $destaque->nome }}</option>
                        @endforeach
                    </select>
                    @error('produto.destaque_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <small class="form-text text-muted">
                        Opcional. Escolha em qual seção de destaque da home este produto deve aparecer.
                    </small>
                </div>
            </div>

            {{-- Preços --}}
            <div class="col-md-4">
                <div class="form-group">
                    <x-jquery-mask-money wire-model="produto.preco" id="preco" label="Preço"
                                         value="{{ $produto->preco }}"/>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <x-jquery-mask-money wire-model="produto.preco_a_partir_de" id="preco_a_partir_de"
                                         label="Preço a partir de"
                                         value="{{ $produto->preco_a_partir_de }}"/>
                </div>
            </div>

            {{-- Promocional --}}
            <div class="col-md-6">
                <div class="form-group" style="display: flex">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sim-promocional" id="sim-promocional"
                               value="1" wire:model="produto.promocional">
                        <label class="form-check-label" for="sim-promocional">Preço Promocional</label>
                    </div>
                    <div class="form-check ml-2">
                        <input class="form-check-input" type="radio" name="nao-promocional"
                               id="nao-promocional" value="0" wire:model="produto.promocional">
                        <label class="form-check-label" for="nao-promocional">Preço Normal</label>
                    </div>
                </div>
            </div>

            @if($produto->promocional)
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jquery-mask-money wire-model="produto.preco_promocional" id="valor" label="Preço Promocional"
                                             value="{{ $produto->preco_promocional }}"/>
                    </div>
                </div>
            @endif

            {{-- Ativo --}}
            <div class="col-sm-12">
                <label for="ativo">*Produto Ativo/Inativo</label>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ativo"
                               id="ativo" value="1" wire:model="produto.ativo">
                        <label class="form-check-label" for="ativo">Ativo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="inativo"
                               id="inativo" value="0" wire:model="produto.ativo">
                        <label class="form-check-label" for="inativo">Inativo</label>
                    </div>
                </div>
            </div>

            {{-- Descrição --}}
            <div class="col-md-12">
                <div class="form-group">
                    <label for="descricao">Descrição</label>

                    {{-- textarea “oficial” do Livewire, fica oculto --}}
                    <textarea
                        type="text"
                        id="descricao"
                        class="form-control @error('produto.descricao') is-invalid @enderror"
                        wire:model.debounce.500ms="produto.descricao"
                        hidden
                    ></textarea>

                    {{-- CKEditor visível --}}
                    <div wire:ignore>
            <textarea
                rows="10"
                x-data
                x-ref="descricaoInput"
                x-init="
                    window.ckeditorDescricao = CKEDITOR.replace($refs.descricaoInput, {
                        customConfig: '/adminlte/ckeditor-plugins/plugins.js'
                    });
                    window.ckeditorDescricao.setData(@this.get('produto.descricao') ?? '');
                    window.ckeditorDescricao.on('change', function () {
                        @this.set('produto.descricao', window.ckeditorDescricao.getData());
                    });
                "
                type="text"
            >{!! $produto->descricao !!}</textarea>
                    </div>

                    @error('produto.descricao')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            {{-- Galeria de imagens --}}
            <div class="col-md-12" style="margin-top: 25px;">
                <h5>Galeria de imagens</h5>

                @if($produto->id)
                    {{-- imagens já salvas no banco --}}
                    @foreach($galeria as $img)
                        <div class="imagem-global" style="width: 100%; margin-top: 15px; margin-left: 8px;">
                            <div class="row">
                                <div class="col-md-10">
                                    <img style="height: 76px; border-radius: 10px; margin-bottom: 10px"
                                         src="{{ asset($img->imagem) }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="button"
                                            class="btn btn-danger btn-sm"
                                            wire:click="removerImagemGaleria({{ $img->id }})">
                                        Remover
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- previews já confirmados (uploads) --}}
                    @if($uploads)
                        <div class="row mt-3">
                            @foreach($uploads as $index => $file)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="{{ $file->temporaryUrl() }}"
                                             class="card-img-top"
                                             style="height: 140px; object-fit: cover;">
                                        <div class="card-body p-2 text-center">
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-danger"
                                                    wire:click="removerUpload({{ $index }})">
                                                Remover
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- input para novo lote --}}
                    <div class="form-group mt-3">
                        <label>Selecionar novas imagens</label>
                        <input type="file" class="form-control"
                               multiple
                               wire:model="buffer">
                        <small class="form-text text-muted">
                            Escolha uma ou mais imagens e depois clique em "Adicionar à galeria".
                        </small>
                        @error('buffer.*')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- previews do buffer atual + botão para somar ao uploads --}}
                    @if($buffer)
                        <div class="row mt-3">
                            @foreach($buffer as $file)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="{{ $file->temporaryUrl() }}"
                                             class="card-img-top"
                                             style="height: 140px; object-fit: cover;">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-2">
                            <button type="button" class="btn btn-info btn-sm"
                                    wire:click="confirmarBuffer">
                                Adicionar à galeria
                            </button>
                        </div>
                    @endif
                @else
                    <div class="col-md-12" style="margin-top: 17px;">
                        <div class="alert alert-success" role="alert" style="text-align: center">
                            <h4 class="nav-icon fas fa">Alerta!</h4>
                            <p class="mb-0">Após salvar o formulário a opção de incluir imagens aparecerá.</p>
                        </div>
                    </div>
                @endif
            </div>




        </div>
    </div>
</form>



@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.querySelector('.btn-add-imagem');
            const input = document.getElementById('input-galeria');

            if (btn && input) {
                btn.addEventListener('click', function () {
                    input.click(); // abre o diálogo de arquivos
                });
            }
        });
    </script>
@endsection
