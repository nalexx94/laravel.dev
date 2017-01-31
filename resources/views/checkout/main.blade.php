<ul>
    @foreach($items as $item)
        <li>name {{ $item['id'] }} , qty {{ $item['qty'] }} , date {{ $item['date'] }}</li>
        @endforeach
</ul>

<div>
    Total Price: {{ $totalPrice }}
</div>
