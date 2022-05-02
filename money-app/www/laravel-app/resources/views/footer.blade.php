<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js?v=1.01') }}"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

@if (Route::currentRouteName() == 'calculator')
    <script src="{{ asset('js/calculator.js?v=1.01') }}"></script>
@endif

@if (Route::currentRouteName() == 'dashboard')
    <!-- Page level plugins -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/chart/chart-area.js?v=1.03') }}"></script>
    <script src="{{ asset('js/chart/chart-pie.js?v=1.01') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.compatibility.js" integrity="sha512-+ol0Tck+iZU3Wj7lJSB9/7iVlEwvVbURRJTUQ9QmjVFF8tnrltnwuafT/eu1e4GTOgbCri6YLJkvUS8YIr4U2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/admin.js') }}"></script>
@endif

<script src="{{ asset('js/main.js?v=1.15') }}"></script>