<!-- begin cabinet-menu -->
    <ul class="nav nav-pills">


        @foreach (App('SiteMenu')->getCabinetMenu() as $item)

            @if (($item['slug'].'') == Route::currentRouteName())

                <li class="active"><a href="{{ route(($item['slug'].'')) }}">{{ $item['name'] }} </a></li>
            @else

                <li class="">
                    <a href="{{ route(($item['slug'].'')) }}">{{ $item['name'] }} </a></li>
            @endif

        @endforeach

    </ul>

<!-- end cabinet-menu -->