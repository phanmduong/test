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
        #co-1{
            background: url("http://up-co.vn/wp-content/uploads/2016/07/image1-2.jpg");
            background-position: 50% 50%;
            background-size: cover;
            height: 500px;
        }
        #co-2{
            background: url("http://up-co.vn/wp-content/uploads/2016/07/10255509_10152836081949046_5649044726019190139_n-e1470199685922.jpg");
            background-position: 50% 50%;
            background-size: cover;
            height: 500px;
        }
        #co-3{
            background: url("http://up-co.vn/wp-content/uploads/2016/07/13918396_10153551255295771_612429366_o-e1470198264130-781x1024.jpg");
            background-position: 50% 50%;
            background-size: cover;
            height: 500px;
        }
    </style>
    {{-- <div class="banner flexbox-centering">
        <div class="text-uppercase text-center white-text">
            <h3>UP CO-WORKING space</h3>
            <h2>đội ngũ sáng lập </h2>
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
                            <h1 class="font-weight-bold text-white">ĐỘI NGŨ SÁNG LẬP</h1><br>
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

    <div style="background: #fff;" class="container-fluid">
        <div class="container" style="color: #000;">
            <br/>
            <br/>
            <h3 class="text-uppercase font-weight-bold text-center">
                NHỮNG BỘ NÃO ĐẰNG SAU....
            </h3>
            <br/>
            <p class="text-center">
                Chúng tôi mong muốn xây dựng một cộng đồng sáng tạo của những người khởi nghiệp
                <br/>
                Nơi mà giá trị cốt lõi không chỉ dừng lại ở một không gian làm việc chung
                <br/>
                Mà còn là những cơ hội để cộng đồng khởi nghiệp trẻ biến hoài bão thay đổi thế giới của họ thành sự thật
            </p>
            <br/><br/>
            <div class="row">
                <div class="col-md-4" style="overflow: hidden">
                    <div id="co-1">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br/>
                        <b>Phan Minh Tuấn</b>
                        <br/>
                        <br/>
                        <b>Co-Founder/CEO </b>
                        <br/>
                        MSc. Real Estate Management - Greenwich University
                    </p>
                </div>
                <div class="col-md-4" style="overflow: hidden">
                    <div id="co-2">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br/>
                        <b>Đỗ Hoài Nam</b>
                        <br/>
                        <br/>
                        <b>Co-Founder/Chairman </b>
                        <br/>
                        Founder/ Former CEO - Emotive
                        <br/>
                        Founder/CEO - Seespace
                    </p>
                </div>
                <div class="col-md-4" style="overflow: hidden">
                    <div id="co-3">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br/>
                        <b>Bùi Cẩm Vân</b>
                        <br/>
                        <br/>
                        <b>COO </b>
                        <br/>
                        Strategy Consultant - Deloitte UK
                        <br/>
                        BSc. Management - LSE
                    </p>
                </div>
            </div>
        </div>
        <br/><br/>
        <br/><br/>
    </div>


@endsection

