<!-- About Section -->
@if (request()->path() == '/')
    <div class="container pt-4 bg-opacity-5" style="margin-top: 50px;">
        <div class="text-center mb-5">
            <h2 class="fw-bold">About Us</h2>
            <p>Discover the Mobile Phones and facilities from our Mobile Zone.</p>
        </div>

        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="{{ asset('pj-img/about.png') }}" class="img-fluid rounded shadow" alt="Mobile Shop">
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold">Who We Are</h4>
                <p>
                    At <strong>MobileZone </strong>, we are passionate about technology and customer satisfaction.
                    Since our founding in 2025, we’ve become one of the leading mobile phone retailers in the region, providing customers with the newest smartphones, and accessories at unbeatable prices.
                    We offer a wide selection of brands including Apple, Samsung, Xiaomi, Huawei, Oppo, and more. Whether you're looking for the latest iPhone, a budget-friendly Android, or essential mobile accessories — we’ve got you covered.
                </p>
            </div>
        </div>

        <div class="row text-center mb-5 g-4 justify-content-center">
            <div class="col-md-4 col-lg-3">
                <div class="card shadow rounded text-black bg-white p-3 h-auto">
                    <h5 class="fw-bold mb-2">Trusted Brands</h5>
                    <p class="small">We only offer authentic and top-quality products from the most trusted mobile brands in the market.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card shadow rounded text-black bg-white p-3 h-auto">
                    <h5 class="fw-bold mb-2">Affordable Prices</h5>
                    <p class="small">Competitive pricing and regular promotions make sure you always get the best value.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card shadow rounded text-black bg-white p-3 h-auto">
                    <h5 class="fw-bold mb-2">Customer Support</h5>
                    <p class="small">We pride ourselves on after-sales service, warranties, and friendly customer support both in-store and online.</p>
                </div>
            </div>
        </div>


        <div class="text-center">
            <h5>Visit Us Today!</h5>
            <p>Drop by our store or shop online and experience the difference. Your next device is just a click away.</p>
            <a href="{{ route('product') }}" class="btn btn-primary">Browse Products</a>
        </div>
    </div> 
@endif

<!-- Contact Section -->
<div class="container" style="margin-top: 50px; margin-bottom:100px;">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Contact Us</h2>
        <p>Stay connected, stay supported.We’re just a message away.</p>
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