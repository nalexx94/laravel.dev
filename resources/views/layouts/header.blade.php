<div id="back-top">
    <button class="btn"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></button>
</div>


<!-- h-nav begin -->
<section id="h-nav">
    <div class="container">
        <div class="block-auth fl-r">
            @if (Sentinel::guest())
                <a href="{{ route('login') }}">Login</a>
                <span class="separator">/</span>
                <a href="{{ route('register') }}">Register</a>
            @else

                <a href=" {{ route('user_cab') }} ">Cabinet</a>
                <span class="separator">/</span>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif


        </div>
    </div>
</section>
<!-- h-nav end -->



<!-- header begin -->
<header id="header">
    <div class="container">
        <a href="{{ route('home') }}">
        <div class="logo">
            HERMES
        </div>
        </a>
        <div class="menu">
            <ul class="main-menu">


            @foreach (App('SiteMenu')->getMenuByLocation()->getMenuItems() as $item)

                @if ($item['slug'] == Route::currentRouteName())

                    <li class="active"><a href="{{ route($item['slug']) }}">{{ $item['name'] }} </a></li>
                @else

                    <li class="">
                        <a href="{{ route($item['slug']) }}">{{ $item['name'] }} </a></li>
                @endif

            @endforeach
            </ul>
            <!-- <ul class="main-menu">

               <li class="active"><a href="{{ route('home') }}">Home</a></li>
               <li><a href="{{ route('man') }}">Man</a></li>
               <li><a href="{{ route('woman') }}">Woman</a></li>
               <li><a href="{{ route('accessories') }}">Accessories</a></li>
               <li><a href="{{ route('about') }}">About</a></li>

            </ul> -->
        </div>
        <div class="icon-menu">
            <div class="clearfix">
                <a href="#">
                <div class="cart fl-r">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    <span class="counts">

                    </span>
                </div>
                </a>

                <div class="search fl-r">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>



            </div>

        </div>
    </div>
</header>

<!-- header end -->