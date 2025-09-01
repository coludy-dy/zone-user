    <footer style="background-color: #f9f9f9; padding: 50px 20px; border-top: 1px solid #e0e0e0;">
        <div style="text-align: center; margin-top: -60px; margin-bottom: 150px">
            <a href="#top" style="
                background-color: #2196F3;
                color: #fff;
                padding: 10px 25px;
                font-weight: bold;
                border-radius: 4px;
                text-decoration: none;
                transition: background 0.3s ease;
            " onmouseover="this.style.backgroundColor='#1e88e5'" onmouseout="this.style.backgroundColor='#2196F3'">
                BACK TO TOP
            </a>
        </div>

        <div style="display: flex; flex-wrap: wrap; justify-content: space-around; gap: 40px;">
            <!-- Customer Service -->
            <div style="min-width: 200px;">
                <h4 style="font-weight: bold; margin-bottom: 15px;">Customer Service</h4>
                <ul style="list-style: none; padding: 0; color: #333;">
                    <li><a href="{{ route('contact') }}" style="color: #333; text-decoration: none;">Contact Us</a></li>
                </ul>
            </div>

            <!-- About Us -->
            <div style="min-width: 200px;">
                <h4 style="font-weight: bold; margin-bottom: 15px;">About Us</h4>
                <ul style="list-style: none; padding: 0; color: #333;">
                    <li><a href="#" style="color: #333; text-decoration: none;">Sell With Us</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none;">Terms & Conditions</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none;">Privacy Policy</a></li>
                    <li><a href="{{ route('about') }}" style="color: #333; text-decoration: none;">About store</a></li>
                </ul>
            </div>

            <!-- App Section -->
            <div style="min-width: 200px; text-align: center;">
                <h4 style="font-weight: bold; margin-bottom: 15px;">mobilezone.com</h4>
                <a href="#" target="_blank">
                    <img src="{{ asset('pj-img/google.png')}}" alt="Get it on Google Play" style="width: 100px;">
                </a>
            </div>
        </div>

        <div style="text-align: center; margin-top: 40px; color: #999; font-size: 14px;">
            mobilezone.com © {{ now()->year }}. All Rights Reserved.
        </div>
    </footer>