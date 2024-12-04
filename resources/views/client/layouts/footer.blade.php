<body>
    <style>
        #footer {
        background-color: #343a40;
        color: white;
        }

#footer h5 {
    color: #f8f9fa;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 1rem;
}

#footer a {
    color: #adb5bd;
    text-decoration: none;
    font-size: 0.9rem;
}

#footer a:hover {
    color: #f8f9fa;
    text-decoration: underline;
}

.footer_mediya_icon a {
    font-size: 1.5rem;
    transition: color 0.3s;
}

.footer_mediya_icon a:hover {
    color: #007bff;
}

.footer_logo {
    max-width: 150px;
}

.bg-secondary {
    background-color: #495057 !important;
}

    </style>
</body>
<div id="footer" class="container-fluid bg-dark text-light py-5">
    <div class="container">
        <div class="row">
            <!-- Logo và giới thiệu -->
            <div class="col-12 col-md-4 mb-4">
                <img src="{{ asset('storage/images/white_logo.png') }}" alt="Logo" class="mb-3 footer_logo img-fluid">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>

            <!-- Danh mục -->
            <div class="col-6 col-md-2 mb-4">
                <h5 class="text-uppercase">Category</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Business</a></li>
                    <li><a href="#" class="text-light">Entertainment</a></li>
                    <li><a href="#" class="text-light">Environment</a></li>
                    <li><a href="#" class="text-light">Health</a></li>
                    <li><a href="#" class="text-light">Technology</a></li>
                </ul>
            </div>

            <!-- Bài viết phổ biến -->
            <div class="col-6 col-md-3 mb-4">
                <h5 class="text-uppercase">Most Viewed</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Success is not a good teacher...</a></li>
                    <li><a href="#" class="text-light">Humble yourself for growth...</a></li>
                    <li><a href="#" class="text-light">Dream big and work hard...</a></li>
                </ul>
            </div>

            <!-- Đăng ký nhận tin -->
            <div class="col-12 col-md-3">
                <h5 class="text-uppercase">Subscribe</h5>
                <form class="mt-3">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email...">
                        <button class="btn btn-primary">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

