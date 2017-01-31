<?php


namespace App\Services;

use App\Item;
use App\Product;
use Illuminate\Http\Request;



class Checkout
{
    public $data = [];
    private $_request;

    public function __construct()
    {

    }

    public function setItems($data = []){
        $this->clear();
        session(['checkout.items'=>$data]);
        $ids = $this->getItemsId();
        $price = (new Item)->whereIn('id',$ids)->sum('price');
        $this->setSum($price);

    }

    public function getItems(){
       $data  =  session('checkout.items');
        return $data;
    }

    public function getItemsInfo() {

    }


    public function getItemsId(){
        $items = $this->getItems();
        return collect($items)->pluck('id');
    }

    public function setSum($price){

        session(['checkout.sum' => $price]);
    }

    public function getSum()
    {
        return session('checkout.sum');
    }

    public function unsetItems($data = []){

    }


    public function setOrder(){

    }

    public function increase ($id){

    }

    public function decrease ($id){

    }

    public function clear() {
        session(['checkout.sum' => []]);
        session(['checkout.items' => []]);
    }

    public function destroy($ids)
    {

    }


}