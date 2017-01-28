@extends('auth.cabinet.cabinet')


@section('content')
    @include('auth.cabinet.cabinet-menu-admin')

    <a class="btn btn-primary" href="{{ route('product.create',['user'=>Auth::user()->login]) }}">Добавить продукт</a>
    <table class="table">
        <th>Имя</th>
        <th>Алиас</th>
        <th>Спрятано?</th>
        <th>Управление</th>
        @foreach($products as $product)


            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->hidden }}</td>
                <td>
                    <a href="{{ route('product.edit',['user'=>Auth::user()->login,'product'=>$product->id]) }}" style="color:#ba933e;"><i class="fa fa-pencil "></i></a>
                    <a href="#" style="color:#ba933e;"><i class="fa fa-eye"></i></a>

                    {!! Form::open(['url' =>route('product.destroy',['user'=>Auth::user()->login,'product'=>$product->id]),'method'=>'GET','style'=>'display:inline-block' ]) !!}
                    {!! Form::hidden('action','delete') !!}
                    {!! Form::button('<i class="fa fa-trash "></i>',['class'=>'btn btn-brown','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach
    </table>

@endsection