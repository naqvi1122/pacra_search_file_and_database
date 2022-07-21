@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
@include('pages.dashbordnav');
    <div class="my-class">

        <form action="{{url('/wsearch')}}" >
            <img src="https://www.pacra.com/images/logo.png" alt="">
            <input name="search" type="text" autocomplete="off" placeholder="Search...">
            <button>Search</button>
        </form>
    </div>



    <footer class="footer float-right mx-2" style="position: fixed;bottom: -8px;right: 10px;">
        <h6 class="font-weight-bold">MIT | Building Bit by Bit</h6>
    </footer>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
