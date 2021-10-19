<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{route('home')}}" >PuminShop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            @if (!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">Buy a Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart')}}">Finish your purchase</a>
                </li>
            @endif


                @if (Auth::check())
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{route('home')}}" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="{{route('products.index')}}">Product List</a>
                    <a class="dropdown-item" href="{{route('orders.index')}}">Order List</a>
                    <a class="dropdown-item" href="{{route('products.create')}}">Add Product</a>

                    </li>
                    <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">LOGOUT</button>
                    </form>

                @else
                    <a href="{{ route('login') }}"
                       class="nav-link">
                        Login
                    </a>
                @endif
        </ul>
    </div>
</nav>
