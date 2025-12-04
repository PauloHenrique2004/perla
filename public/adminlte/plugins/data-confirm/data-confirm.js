$(function() {
    $(document).on("click", "a[data-confirm]", function(e){
        if (confirm($(this).data("confirm"))) {
            return true;
        } else {
            e.preventDefault();
        }
    });
})
