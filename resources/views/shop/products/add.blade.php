@extends('layouts.app')

@section('title')
   Product add
@endsection

@section('breadcrumbs')
    @include('layouts.breadcrumbs')
@endsection

@section('content')

    {!! Form::open(['route' =>'product.store','class'=>'shop-forms','enctype' => 'multipart/form-data','files' => true]) !!}
    {{ csrf_field() }}


    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
        <label for="category_id" class="control-label">Категория</label>

        <div >
            {!! Form::select('category_id',$categories,old('category_id'),['placeholder'=>'Choose category','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
        <label for="brand" class="control-label">Брэнд</label>

        <div >

                {!! Form::select('brand_id',$brands,old('brand_id'),['placeholder'=>'Choose brand','id'=>'choose-brand','class' => 'form-control']) !!}

        </div>
    </div>

    <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
        <label for="model" class="control-label">Модель</label>

        <div >
            {!! Form::select('model_id',[],null,['id'=>'brandmodels','disabled','placeholder'=>'Choose model','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group ">
        <label for="hidden" class="control-label">Отображать</label>

        <div >

            {!! Form::select('hidden',['0' => 'Да','1' => 'Нет'],old('hidden'),['class' => 'form-control']) !!}



        </div>
    </div>

    <div class="form-group ">
        <label for="hidden" class="control-label">Изображение</label>

        <div>
            {!! Form::file('images',['id'=>'img-product']) !!}


        </div>
    </div>

    <div class="form-group">
        <div >
            {!! Form::submit('Создать',['class' => 'btn btn-brown']) !!}


        </div>
    </div>

    {!! Form::close() !!}

@endsection

@section('scripts')
    <script>
        var productUrl = '{{ route('product.ajax') }}';
    </script>
    <script src="{{ asset('js/product.js') }}"></script>
    @endsection