<div class="details">
    <div class="">
        <a href="/">
            <div class="font-weight-bold mb-2"
                 style=" background: var(--site-cor); color: #fff; text-align: center; border-radius: 4px; padding: 3px 0; ">
                Continuar comprando
            </div>
        </a>

        <p class="font-weight-bold mb-2">Compartilhar</p>
        <p class="text-muted small mb-0" style="font-size: 22px">
            <a href="{{$compartilharUrl['facebook']}}">
                <i class="fa fa-facebook" style="color:#2a2a9f;"></i>
            </a>

            <a href="{{$compartilharUrl['whatsapp']}}">
                <i class="fa fa-whatsapp" style="margin-left: 10px; color: green"></i>
            </a>

            <a href="{{$compartilharUrl['telegram']}}">
                <img src="/site/img/telegram.svg" style="height: 21px; margin-top: -5px; margin-left: 8px;">
            </a>

            <a href="" onclick="compartilhar()" id="copyClipboard">
                <i class="fa fa-share-alt" style="margin-left: 10px; color: green"></i>
            </a>
        </p>
    </div>
</div>

<script>
    function compartilhar() {
        event.preventDefault();
        $("body").append('<input id="copyURL" type="text" value="" />');
        const copyUrl = $("#copyURL");
        copyUrl.val(window.location.href).select();
        document.execCommand("copy");
        copyUrl.remove();
        notificar({message: 'Link copiado.'});
    }
</script>
