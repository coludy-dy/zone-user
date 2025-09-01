@extends('layouts.app')

@section('content')
    <!-- Contact Section -->
<div class="container" style="margin-top: 50px; margin-bottom:100px;">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Contact Us</h2>
        <p>Stay connected, stay supported.We're just a message away.</p>
    </div>

    <div class="row">
        <!-- Contact Info -->
        <div class="col-md-6 mb-4" style="margin-bottom: 50px;">
            <p><i class="fas fa-map-marker-alt"></i> No.123, Main Road, Pyinmana, Naypyidaw, Myanmar</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i> <strong>Phone:</strong> +95 9 123 456 789</p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> <strong>Email:</strong> contact@mobilezone.com</p>
            <p><i class="fa fa-clock" aria-hidden="true"></i> <strong>Open Hours:</strong> Mon - Sat, 9AM - 6PM</p>
        </div>

        <!-- Contact Form -->
        <div class="card col-md-6">
            <div class="card-header">
                <h5>Send Message</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="mt-2 mb-2 inputbox">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mt-2 mb-2 inputbox">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mt-2 mb-2 inputbox">
                        <label for="message" class="form-label">Type Your Message...</label>
                        <textarea id="message" name="message" class="form-control" required></textarea>
                    </div>
                    <div class="mt-2 mb-2 inputbox text-center">
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div> 
    </div> 

    <!-- Google Map -->
            <div class="row my-4">
                <div class="col-md-12">
                    <h5 class="fw-bold" style="margin-bottom: 50px;">Find Us on the Map</h5>
                    <div class="ratio ratio-4x3 rounded shadow" style="height: 500px">
                        <iframe 
                            src="https://www.google.com/maps?q=Pyinmana&output=embed"
                            style="border:0;" 
                            allowfullscreen 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
    </div>
@endsection