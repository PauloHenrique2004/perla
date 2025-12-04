$('body')[0].addEventListener('notify', (e) => {
    const event = e.detail;
    notificar(event);
});

function notificar(event) {
    toastr.options.timeOut = event.timeout ? event.timeout : 1000;

    switch (event.type) {
        case 'error':
            toastr.error(event.message);
            break;
        case 'info':
            toastr.info(event.message);
            break
        default:
            toastr.success(event.message);
    }
}
