@extends('upcoworkingspace::layouts.master')

@section('vi-content')
    <style>
        .banner {
            background: url("http://up-co.vn/wp-content/uploads/2016/06/alleydesks2.jpg");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 400px;
        }

        .flexbox-centering {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .white-text {
            color: #fff;
        }
        .green-text {
            color: #96d21f;
        }
    </style>
    {{-- <div class="banner flexbox-centering">
        <div class="text-uppercase text-center white-text">
            <h3>UP CO-WORKING space</h3>
            <h2>tham gia đội ngũ up </h2>
        </div>
    </div> --}}

    <div class="card card-raised page-carousel no-margin">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('http://up-co.vn/wp-content/uploads/2016/06/alleydesks2.jpg'); background-size: 100% 100%; background-repeat:no-repeat; padding-bottom: 40%;">
                    {{-- <div class="filter filter-dark"></div> --}}
                    <div class="content-center" style="position: absolute; top: 50%; left: 50%; text-align: center; color: #fff; transform: translate(-50%, -50%);">
                        <div class="container">
                            <h3 class="font-weight-bold text-white">UP CO-WORKING SPACE</h3>
                            <h1 class="font-weight-bold text-white">THAM GIA ĐỘI NGŨ UP</h1><br>
                            <button class="btn-core-up btn btn-round btn-danger"
                            style="background-color:rgb(139, 209, 0);border-color:rgb(139, 209, 0)" data-target="#submitModal"
                            data-toggle="modal">TÌM HIỂU THÊM</button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('http://96bda424cfcc34d9dd1a-0a7f10f87519dba22d2dbc6233a731e5.r41.cf2.rackcdn.com/ermu/sliders-1/fall-residential-faders/Fall_Fader2.jpg'); background-size: 100% 100%; background-repeat:no-repeat; padding-bottom: 40%;">
                    {{-- <div class="filter filter-dark"></div> --}}
                    <div class="content-center"  style="position: absolute; top: 50%; left: 50%; text-align: center; color: #fff; transform: translate(-50%, -50%);">
                        <div class="container">
                            <h3 class="font-weight-bold text-white">LÀM VIỆC HIỆU QUẢ VÀ SÁNG TẠO HƠN</h3>
                            <h1 class="font-weight-bold text-white">TẠI UP COWORKING SPACE</h1><br>
                            <button class="btn-core-up btn btn-round btn-danger"
                            style="background-color:rgb(139, 209, 0);border-color:rgb(139, 209, 0)" data-target="#submitModal"
                            data-toggle="modal">TÌM HIỂU THÊM</button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('http://www.jveroassociates.com/images/slider/slider-02.jpg'); background-size: 100% 100%; background-repeat:no-repeat; padding-bottom: 40%;">
                    {{-- <div class="filter filter-dark"></div> --}}
                    <div class="content-center"  style="position: absolute; top: 50%; left: 50%; text-align: center; color: #fff; transform: translate(-50%, -50%);">
                        <div class="container">
                            <h3 class="font-weight-bold text-white">LÀM VIỆC HIỆU QUẢ VÀ SÁNG TẠO HƠN</h3>
                            <h1 class="font-weight-bold text-white">TẠI UP COWORKING SPACE</h1><br>
                            <button class="btn-core-up btn btn-round btn-danger"
                            style="background-color:rgb(139, 209, 0);border-color:rgb(139, 209, 0)" data-target="#submitModal"
                            data-toggle="modal">TÌM HIỂU THÊM</button>
                        </div>
                    </div>
                </div>
            </div>
       
            <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="fa fa-angle-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="fa fa-angle-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br/>
    <br/>

    <div class="container text-dark">
        <h2 class="text-center font-weight-bold text-uppercase">
            TRỞ THÀNH 1 THÀNH VIÊN CỦA GIA ĐÌNH UP
        </h2>
        <br/>
        <p class="text-center">
            Bạn đang tìm kiếm một công việc trong thị trường khởi nghiệp Việt Nam? Trở thành thành viên của cộng đồng StartUp lớn nhất trong mảng Startup, Freelancers, doanh nhân, sáng tạo và kỹ thuật.
        </p>
        <br/><br/>
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-uppercase font-weight-bold">
                    TUYỂN DỤNG
                </h3>
                <br/>
                <p class="font-weight-bold">
                    Về Up:
                </p>
                <p class="text-justify">
                    Công ty Cổ phần Phát triển UP là chủ sở hữu chuỗi hệ thống UP Co-working Space – Không gian làm việc chung  lớn nhất, hiện đại nhất và duy nhất mở cửa 24/7 tại Việt Nam.
                    <br/><br/>
                    UP được thành lập với tầm nhìn xây dựng và phát triển cộng đồng khởi nghiệp tại Việt Nam lớn mạnh nhất Đông Nam Á, đem lại những thay đổi mạnh mẽ, tích cực và bền vững cho nền kinh tế đất nước và khu vực.
                    <br/><br/>
                    UP mang sứ mệnh nâng cánh cho cộng đồng khởi nghiệp Việt Nam phát triển khỏe mạnh và đạt mục tiêu một cách nhanh nhất qua gói hỗ trợ giá tốt nhất thị trường và môi trường kết nối với mạng lưới trong giới đầu tư, kinh doanh và công nghệ.
                    <br/><br/>
                    UP luôn tạo một môi trường làm việc năng động, sáng tạo, thân thiện với cơ hội thăng tiến cao cho các bạn trẻ có đam mê và nhiệt huyết.
                </p>
                <br/>
                <p class="font-weight-bold">
                    Vị trí tuyển dụng (CLICK ĐỂ XEM CHI TIẾT VỀ CÔNG VIỆC):
                </p>
                <ul>
                    <li>
                        <a href="" class="green-text">Nhân viên cộng đồng và sự kiện</a>
                    </li>
                    <li>
                        <a href="" class="green-text">Quản lý cộng đồng và sự kiện</a>
                    </li>padding
                    <li>
                        <a href="" class="green-text">Trường phòng vận hành HCM</a>
                    </li>
                    <li>
                        <a href="" class="green-text">Chuyện viên pháp chế</a>
                    </li>
                    <li>
                        <a href="" class="green-text">Nhân viên kinh doanh</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="http://up-co.vn/wp-content/uploads/tuyen-dung-hr-01-1-1-732x1024.jpg" width="100%" height="auto" alt="">
            </div>
        </div>
        <br/><br/>
    </div>
@endsection
