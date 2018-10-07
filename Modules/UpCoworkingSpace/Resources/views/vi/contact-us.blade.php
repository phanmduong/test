@extends('upcoworkingspace::layouts.master')

@section('vi-content')
    <style>
        .banner {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/back2.jpg");
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
            <h2>vì cộng đồng khởi nghiệp việt nam</h2>
        </div>
    </div> --}}

    <div class="card card-raised page-carousel no-margin">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('http://up-co.vn/wp-content/uploads/2016/08/back2.jpg'); background-size: 100% 100%; background-repeat:no-repeat; padding-bottom: 40%;">
                    {{-- <div class="filter filter-dark"></div> --}}
                    <div class="content-center" style="position: absolute; top: 50%; left: 50%; text-align: center; color: #fff; transform: translate(-50%, -50%);">
                        <div class="container">
                            <h3 class="font-weight-bold text-white">UP CO-WORKING SPACE</h3>
                            <h1 class="font-weight-bold text-white">VÌ CỘNG ĐỒNG KHỞI NGHIỆP VIỆT NAM</h1><br>
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
        <p>
            <b>Trụ sở Up Co-working Space</b>
            <br/><br/>
            Địa chỉ: Tầng 8, tòa nhà Hanoi Creative City, Số 1 phố Lương Yên, Phường Bạch Đằng, Quận Hai Bà Trưng, Hà Nội.
            <br/>
            Điện thoại: (+84)24 7 308 0668
            <br/>
            Email: info@up-co.vn
            <br/><br/>
            <b>Hướng dẫn chỉ đường tới Up</b>
            <br/><br/>
            UP được đặt tại khu vực trung tâm với vị trí thuận lợi, tiện việc đi lại cho các thành viên. Bạn chỉ mất:
        </p>
        <ul>
            <li>
                3 phút từ Nhà hát lớn
            </li>
            <li>
                5 phút từ cầu Chương Dương
            </li>
            <li>
                5 phút từ Times City
            </li>
            <li>
                6 phút từ Đại học Bách Khoa
            </li>
        </ul>
        <br/>
        <p>
            Bạn có thể đến UP bằng: Ô tô (có chỗ đỗ xe), Xe máy (gửi xe miễn phí) và Xe bus
        </p>
        <br/><br/>
    </div>


@endsection

