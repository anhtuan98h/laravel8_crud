@include('layouts.header')
@include('layouts.sidebar')
<!-- /. NAV SIDE  -->

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">

                <img class="logo" src="{{asset('assets/img/logo.png')}}" alt="logo" title="logo">
            </div>
        </div>
        <!-- /. ROW  -->

        <hr />
        <style>
            .logo {
                width: 300px;
                height: 100px;
            }

            .img {
                width: 1000px;
                height: auto;
            }

            h3 {
                text-align: center;
                color: blue;
            }
        </style>
        <div class="container">
            @yield('content')
        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>


@include('layouts.footer')