<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::user()->id)->paginate(8)->withQueryString();

        return view('notification.index', compact('notifications'));
    }

    public function changeStatus(Notification $notification)
    {
        $notification->update([
            'condition' => 'seen'
        ]);

        return redirect()->back()->with('success','Success');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->back()->with('success','Success delete notification');
    }
}
