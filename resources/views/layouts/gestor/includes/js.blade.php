<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>

<!-- ChartJS -->
{{--<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>--}}
<!-- Sparkline -->
{{--<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>--}}
<!-- JQVMap -->
{{--<script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>--}}
{{--<script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')  }}"></script>--}}
<!-- jQuery Knob Chart -->
{{--<script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>--}}
<!-- daterangepicker -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
{{--<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>--}}
<!-- Tempusdominus Bootstrap 4 -->
{{--<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>--}}
<!-- Summernote -->
{{--<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>--}}

<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/js/adminlte.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css">

<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.pt-br.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('adminlte/js/pages/dashboard.js') }}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/js/demo.js') }}"></script>

<script src="{{ asset('adminlte/plugins/data-confirm/data-confirm.js') }}"></script>

<script src="{{ asset('js/jquery_mask_money.js') }}"></script>

<script src="{{ asset('js/notify.js') }}"></script>
@if(Session::has('notify') || Session::has('error'))
    <script>
        $(document).ready(function () {
            @if(Session::has('notify'))
            notificar({type: 'success', message: "{{ Session::get('notify') }}"});
            @elseif(Session::has('error'))
            notificar({type: 'error', message: "{{ Session::get('error') }}"});
            @endif
        })
    </script>
@endif


@yield('script')
