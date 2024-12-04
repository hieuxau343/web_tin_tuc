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
                <p>Đừng bỏ lỡ tin tức quan trọng! <br>
                    Nhận tóm tắt tin tức nổi bật, hấp dẫn nhất 24 giờ qua trên 24 News. <br>
                    <b>Báo tiếng Việt nhiều người xem nhất</b>
                </p>
            </div>

            <!-- Danh mục -->
            <div class="col-6 col-md-2 mb-4">
                <h5 class="text-uppercase">Chủ đề</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Thể thao</a></li>
                    <li><a href="#" class="text-light">Khoa học</a></li>
                    <li><a href="#" class="text-light">Xe</a></li>
                    <li><a href="#" class="text-light">Thời trang</a></li>
                    <li><a href="#" class="text-light">Xã hội</a></li>
                </ul>
            </div>

            <!-- Bài viết phổ biến -->
            <div class="col-6 col-md-3 mb-4">
                <h5 class="text-uppercase">Bài viết nổi</h5>
                <ul class="list-unstyled">
                    <li><a href="http://127.0.0.1:8000/post/nga-na-ten-lua-hanh-trinh-vao-cac-thanh-pho-khap-ukraine.html" class="text-light">Nga nã tên lửa hành trình ....</a></li>
                    <li><a href="http://127.0.0.1:8000/post/biet-nghe-nghiep-cua-chu-re-co-dau-lap-tuc-huy-hon.html" class="text-light">Biết nghề nghiệp của chú rể, cô dâu lập tức hủy hôn</a></li>
                    <li><a href="http://127.0.0.1:8000/post/vi-sao-hang-ngan-nguoi-tep-trung-truoc-nha-hat-lon-ha-noi-khien-auong-tac-tu-sang-toi-chieu.html" class="text-light">Vì sao hàng ngàn người tập trung trước Nhà hát lớn Hà Nội..</a></li>
                </ul>
            </div>
            
            <!-- Đăng ký nhận tin -->
            <div class="col-12 col-md-3">
                <h5 class="text-uppercase">Đăng ký nhận thông tin</h5>
                <form class="mt-3">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email...">
                        <button class="btn btn-primary">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

