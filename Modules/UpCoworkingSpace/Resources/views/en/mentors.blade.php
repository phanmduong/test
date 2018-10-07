@extends('upcoworkingspace::layouts.en-master')




@section('en-content')
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

        #mentor-1 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/1.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-2 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/nguyenduylan.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-3 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/2.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-4 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/4.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-5 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/3.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-6 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/6.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-7 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/5.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-8 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/11.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-9 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/7.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-10 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/12.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-11 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/9.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }

        #mentor-12 {
            background: url("http://up-co.vn/wp-content/uploads/2016/08/8.png");
            background-position: 50% 50%;
            background-size: cover;
            height: 350px;
        }
    </style>
    {{-- <div class="banner flexbox-centering">
        <div class="text-uppercase text-center white-text">
            <h3>UP CO-WORKING space</h3>
            <h2>UP MENTORS</h2>
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
                            <h1 class="font-weight-bold text-white">UP MENTORS</h1><br>
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
                    UP MENTORS
            </h3>
            <br/>
            <p class="text-center">
                    It is our pleasure to welcome honorable members to UP co-working space. Come to UP to listen, to learn and to share stories with them.
            </p>
            <br/><br/>
            <div class="row">
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-1">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br/>
                        <b>Nguyễn Đức Thành</b>
                        <br/>
                        <br/>
                        Viện trưởng VEPR
                        Viện Nghiên cứu Kinh tế và Chính sách
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-2">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Nguyễn Duy Lân</b>
                        <br>
                        <br>
                        Super Star người Việt kỳ cựu nhất ở Microsoft Headquarter Redmond
                        Chuyên gia hàng đầu về enterprise security.
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-3">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Cao Toàn Mỹ</b>
                        <br>
                        <br>
                        MCofounder VNG
                        <br/>
                        Một trong những nhà đầu tư thiên thần năng động nhất hiện nay
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-4">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Tuấn Nguyễn</b>
                        <br>
                        <br>
                        VC Corp
                        <br/>
                        chuyên gia về thương mại điện tử và marketing
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-5">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Phạm Diệp Anh</b>
                        <br>
                        <br>
                        Founder của SilkyVietnam
                        <br/>
                        Biên tập viên VTV
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-6">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Lê Huỳnh Kim Ngân</b>
                        <br>
                        <br>
                        Founder Twenty.vn
                        <br/>
                        Cái tên nổi bật trong giới Công nghệ - Khởi nghiệp
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-7">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Phan Minh Tuấn</b>
                        <br>
                        <br>
                        MSc. Real Estate Management - Greenwich University
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-8">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Phan Minh Tuấn</b>
                        <br>
                        <br>
                        MSc. Real Estate Management - Greenwich University
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-9">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Phan Minh Tuấn</b>
                        <br>
                        <br>
                        MSc. Real Estate Management - Greenwich University
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-10">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Phan Minh Tuấn</b>
                        <br>
                        <br>
                        MSc. Real Estate Management - Greenwich University
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-11">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Phan Minh Tuấn</b>
                        <br>
                        <br>
                        MSc. Real Estate Management - Greenwich University
                    </p>
                </div>
                <div class="col-md-3" style="overflow: hidden">
                    <div id="mentor-12">

                    </div>
                    <p style="background: #f9f9f9;" class="text-center">
                        <br>
                        <b>Phan Minh Tuấn</b>
                        <br>
                        <br>
                        MSc. Real Estate Management - Greenwich University
                    </p>
                </div>


            </div>
        </div>
        <br/><br/>
        <br/><br/>
    </div>

@endsection
