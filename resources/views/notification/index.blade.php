@extends('layouts.app')

@section('content')
<div style=" min-height: 100vh; padding: 40px 20px;">
    <h2 style="font-size: 28px; font-weight: bold; margin-bottom: 30px;">
        <i class="fa fa-shopping-cart"></i> Your Message
    </h2>
    
    @if($notifications->count())
        @foreach($notifications as $notification)
                <div class="card p-3 mb-3 {{ $notification->condition == 'unseen' ? 'bg-warning bg-opacity-25' : '' }}">

                    <div class="card-header d-flex row">
                        <div class="col-md-6"><h5>Order #{{ $notification->order_id }} &Tab;</div>
                        <div class="col-md-6 text-end"><p> 
                            @if ($notification->condition == 'seen') 
                                <button class="btn btn-sm btn-success text-white">Seen</button>
                            @else
                                <a href="{{route('notification.read',['notification' => $notification])}}" 
                                    class="btn btn-sm btn-warning text-black">Mark</a>
                            @endif
                            &nbsp;
                            <strong>Date:</strong> {{ $notification->created_at->format('d-m-Y') }}</p></div>
                    </div>
                    <div class="card-body d-flex">
                        <div class="col-md-6">{{$notification->title}}</div>
                        <div class="col-md-6 text-end">
                            <a href="{{route('notification.destroy',['notification' => $notification])}}" 
                                class="btn btn-sm btn-danger text-black">
                                <i class="fa fa-trash text-white"></i>
                            </a>
                        </div>
                    </div>
                </div>
        @endforeach
        <div class="ms-2 me-2">
            {{ $notifications->links() }}
        </div>
    @else
        <p>Your message is empty.</p>
    @endif

</div>
@endsection

