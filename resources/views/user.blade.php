@include('fronted.header')
<main class="main">
    <div class="row" style="margin-top: 100px">

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    menu
                </div>
                <div class="cart-body">
                    <ul class="menu">
                        <li><a href="">Home</a></li>
                        <li><a href="{{ route('order.index') }}">Order</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
    
            
                </div>
            </div>
    
        </div>
        <div class="col-sm-8">
            @yield('content')
        </div>
    </div>
</main>
@include('fronted.footer')
