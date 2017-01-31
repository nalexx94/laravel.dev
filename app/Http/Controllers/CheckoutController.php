<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Checkout;

class CheckoutController extends Controller
{
    public $_checkout;

    public function __construct()
    {

        $this->init();
    }

    public function init() {

       $this->_checkout = new Checkout();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = [
            ['id' =>1,'date'=>'23/23/23','qty'=>3],
            ['id' =>2,'date'=>'23/23/23','qty'=>6],
            ['id' =>3,'date'=>'23/23/23','qty'=>9],
            ['id' =>18,'date'=>'23/23/23','qty'=>85]
        ];
        $this->_checkout->setItems($data1);
        $data = $this->_checkout->getItems();
        $itemsInfo = $this->_checkout->getItemsInfo();
        $price = $this->_checkout->getSum();

       return view('checkout.main')->with( [
                'items' => $data,
                'totalPrice' => $price
           ]
       );
    }

    public function add(Request $request) {
        $data = $request->all();
        $this->_checkout->setItems($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $this->_checkout->destroy($ids);
    }

    public function increase ($id){
        $this->_checkout->increase($id);
    }

    public function decrease ($id){
        $this->_checkout->decrease($id);
    }

    public function clear() {
        $this->_checkout->clear();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // todo create order
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // nothing
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($this->_checkout->getItems());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // nothing
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




}
