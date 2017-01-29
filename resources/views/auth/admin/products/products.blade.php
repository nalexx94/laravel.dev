@extends('auth.cabinet.cabinet')


@section('content')


    <a class="btn btn-primary" href="{{ route('product.create') }}">Добавить продукт</a>
    <table class="table">
        <th>ID</th>
        <th>Фото</th>
        <th>Брэнд</th>
        <th>Модель</th>
        <th>Цена</th>
        <th>Отображение</th>
        <th>Управление</th>
        @foreach($products as $product)


            <tr>
                <td>{{ $product['id'] }}</td>
                <td> --- </td>
                <td>{{ $product['brand']['name'] }}</td>
                <td>{{ $product['model']['name'] }}</td>
                <td> --- </td>
                <td>{{ HelpFD::statusHiddenTable($product['hidden']) }}</td>
                <td>
                    <a href="{{ route('product.edit',['product' => $product['id']]) }}" style="color:#ba933e;"><i class="fa fa-pencil "></i></a>
                    <a href="#" style="color:#ba933e;"><i class="fa fa-eye"></i></a>

                    {!! Form::open(['url' =>route('product.destroy',['product' => $product['id']]),'method'=>'GET','style'=>'display:inline-block' ]) !!}
                    {!! Form::hidden('action','delete') !!}
                    {!! Form::button('<i class="fa fa-trash "></i>',['class'=>'btn btn-brown','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach
    </table>

@endsection