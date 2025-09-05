<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', Auth::user()->id)->get();

        $total_amount = 0;
        foreach($carts as $cart){
            $qty_price = $cart->product->price * $cart->quantity;
            $total_amount+=$qty_price;
        }
        return view('cart.index', compact('carts','total_amount'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity'   => 'required|integer|min:1'
        ]);

        $card = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $product->id)
            ->first();

        if ($card) {
            $card->update([
                'quantity' => $card->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'user_id'    => Auth::user()->id,
                'product_id' => $product->id,
                'quantity'   => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Success!');
    }

    public function decreaseQuantity(Cart $cart)
    {
        if($cart->quantity == 1)
        {
            $cart->delete();
            return redirect()->back()->with('success','Success remove cart');
        }else{
            $cart->update([
                'quantity' => $cart->quantity -1
            ]);
            return back();
        }
    }

    public function increaseQuantity(Cart $cart)
    {
        $stock = Product::where('id',$cart->product_id)->value('stock');
        if($cart->quantity == $stock)
        {
            return redirect()->back()->with('error','Availabel is * '.$stock. ' *');
        }else{
            $cart->update([
                'quantity' => $cart->quantity +1
            ]);
            return back();
        }
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Cart Discard!');
    }

    public function confirmCart()
    {
        $userId = Auth::id();

        DB::transaction(function() use ($userId) {

            $carts = Cart::where('user_id', $userId)->get();

            if ($carts->isEmpty()) {
                throw new \Exception('Cart is empty.');
            }

            $total_amount = 0;
            foreach($carts as $cart) {
                $product = Product::where('id', $cart->product_id)->first();

                $qty_price = $product->price * $cart->quantity;
                $total_amount += $qty_price;

                $cartsQty = $cart->quantity;
                $proQty = $product->stock;

                if($cartsQty === $proQty){
                    $product->stock = 0;
                    $product->status = 'out_of_stock';
                    $product->save();
                }else{
                    $product->stock = $product->stock - $cart->quantity;
                    $product->save();
                }
            }

            $order = Order::create([
                'user_id' => $userId,
                'admin_id' => 1,
                'total_amount' => $total_amount,
                'status' => 'pending',
                'complete_date' => null
            ]);

            foreach($carts as $cart) {
                // dd($cart->quantity);
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $cart->product_id,
                        'quantity' => $cart->quantity,
                    ]);
            }

            Cart::where('user_id', $userId)->delete();
        });

        return redirect()->route('my-order')->with('success', 'Checkout successfully!');
    }
}