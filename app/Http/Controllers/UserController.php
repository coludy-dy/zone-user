<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    // public function myOrders()
    // {
    //     $orders = Order::with('orderItems.product')
    //         ->where('user_id', Auth::id())
    //         ->orderByDesc('created_at')
    //         ->paginate(10)->withQueryString();

    //     return view('users.my_order', compact('orders'));
    // }
    public function myOrders(Request $request)
{
    $query = Order::with('orderItems.product')
        ->where('user_id', Auth::id());

    if ($request->filled('created_at')) {
        $query->whereDate('created_at', $request->created_at);
    }

    $orders = $query->orderByDesc('created_at')
        ->paginate(10)
        ->withQueryString();

    return view('users.my_order', compact('orders'));
}


    public function editProfile(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function updateProfile(Request $request,User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('home')->with('success','Success');
    }
}
