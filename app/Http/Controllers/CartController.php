<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $items = [];
            \Cart::getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });
            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ),200,[]);
        }
        else
        {
            return view('cart.show');
        }
    }
    public function add()
    {
        $id = request('id');
        $name = request('name');
        $price = request('price');
        $qty = request('qty');
        \Cart::add($id, $name, $price, $qty, array());
    }
    public function delete($id)
    {
        \Cart::remove($id);
        return response(array(
            'success' => true,
            'data' => $id,
            'message' => "cart item {$id} removed."
        ),200,[]);
    }
    public function details()
    {
        return response(array(
            'success' => true,
            'data' => array(
                'total_quantity' => \Cart::getTotalQuantity(),
                'sub_total' => \Cart::getSubTotal(),
                'total' => \Cart::getTotal(),
            ),
            'message' => "Get cart details success."
        ),200,[]);
    }
}
