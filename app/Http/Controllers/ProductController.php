<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Добавление продукта';
        $categories = \App\Category::all();
        $brands = \App\Brand::all();
        $models = \App\BrandModel::all();

        foreach ($categories as $category)
        {
            $massCategory[$category->id] =  $category->name;
        }

        foreach ($brands as $brand)
        {
            $massBrands[$brand->id] =  $brand->name;
        }

        $options = [];

       return view('shop.products.add')->with([
           'title' => $title,
           'categories' =>$massCategory,
           'brands'=>$massBrands,
           'models'=>$options
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    public function ajax(Request $request)
    {

        $data = $request->all();
        $arrayReturn = [];
        switch ($data['method'])
        {
            case 'getModelsByBrand': {
                $brandModels = \App\Brand::find($data['brand']);
                $arrayReturn = $brandModels->brandmodel()->get()->toArray(); //->pluck('name','id')->all();


            }; break;
        }
        return response()->json($arrayReturn);
        exit;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
