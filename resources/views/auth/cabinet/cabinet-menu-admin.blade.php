<!-- begin cabinet-menu -->
<ul class="nav nav-pills">

        <li ><a href="{{ route('product.index',['user'=>Auth::user()->login]) }}">Товары</a></li>
        <li><a href="#">Категории</a></li>
        <li><a href="#">Заказы</a></li>
        <li><a href="#">Пользователи</a></li>
        <li><a href="#">Настройки</a></li>


</ul>

<!-- end cabinet-menu -->