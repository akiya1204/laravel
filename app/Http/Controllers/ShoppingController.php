<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\category;
use App\cart;
use App\Complete;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function index($ctg_id = '',Request $request) {

        if ($ctg_id === '') {
            $itemDetail = item::all();
            $category = category::all();
        } else {
            $query = item::query();
            $query->where('ctg_id', $ctg_id);
            $itemDetail = $query->get();
            $category = category::all();
        }

        return view('shopping/list',[
            'itemDetail' => $itemDetail,
            'category' => $category,
        ]);
    }

    public function detail($item_id) {
        $query = item::query();
        $query->where('item_id', $item_id);
        $itemDetail = $query->get();
        $category = category::all();

        return view('shopping/detail' , [
            'itemDetail' => $itemDetail[0],
            'category' => $category,
        ]);
    }

    public function cart(Request $request) {
        $user = Auth::user();
        if($request->has('item_id') === false){
            $query = Cart::query();
            $query->where('customer_id', $user->id);
            $query->where('delete_flg', 0);
            $cart_items = $query
                        ->join('items', 'carts.item_id', '=', 'items.item_id')
                        ->get();
            $cart_price = $query->sum('price');
            $cart_num = $query->sum('num');
        } else {
            $query = item::query();
            $item_id = intval($request->item_id);
            $query->where('item_id', $item_id);
            $item = $query->get()->toArray();
            $item[0]['customer_id'] = $user->id;
            $item[0]['num'] = $request->count;

            Cart::create($item[0]);
            return redirect()->route('cart');
        }

        return view('shopping/cart' , [
            'cart_items' => $cart_items,
            'cart_price' => $cart_price,
            'cart_num' => $cart_num,
        ]);
    }

    public function delete($crt_id = '') {

        if ($crt_id == true) {
            $query = cart::query();
            $query->where('crt_id', $crt_id)
              ->update(['delete_flg' => 1]);
        }
        
        return redirect()->route('cart');
    }

    public function complete() {
        $user = Auth::user();
        $query = Cart::query();
        $query->where('customer_id', $user->id);
        $query->where('delete_flg', 0);
        $complete = $query->get()->toArray();
        Complete::create($complete[0]);

        return redirect()->route('complete2');
    }

    public function complete2() {
        return view('shopping/complete');
    }

    public function history() {
        $user = Auth::user();
        $query = Complete::query();
        $query->where('customer_id', $user->id);
        $history_items = $query->join('items', 'completes.item_id', '=', 'items.item_id')->get();

        return view('shopping/history' , [
            'history_items' => $history_items,
        ]);
    }
}

