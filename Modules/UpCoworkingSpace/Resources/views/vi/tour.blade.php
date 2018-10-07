@extends('upcoworkingspace::layouts.master')

@section('vi-content')
    <style>
        .banner{
            background: url("http://up-co.vn/wp-content/uploads/2016/07/khong-gian-lam-viec-1.jpg");
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
        .white-text{
            color: #fff;
        }
        .co-input{
            border: 1px solid #8bd100;
            padding: 10px;
        }

    </style>
    {{-- <div class="banner flexbox-centering">
        <div class="text-uppercase text-center white-text">
            <h3>UP CO-WORKING space</h3>
            <h2>contact us</h2>
        </div>
    </div> --}}

    <div class="card card-raised page-carousel no-margin">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('http://up-co.vn/wp-content/uploads/2016/07/khong-gian-lam-viec-1.jpg'); background-size: 100% 100%; background-repeat:no-repeat; padding-bottom: 40%;">
                    {{-- <div class="filter filter-dark"></div> --}}
                    <div class="content-center" style="position: absolute; top: 50%; left: 50%; text-align: center; color: #fff; transform: translate(-50%, -50%);">
                        <div class="container">
                            <h3 class="font-weight-bold text-white">UP CO-WORKING SPACE</h3>
                            <h1 class="font-weight-bold text-white">CONTACT US</h1><br>
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

    <div class="container text-dark">
        <br/><br/>
        <br/>
        <form>
            <div class="row">
                    <div class="col-md-6">
                        <img src="http://up-co.vn/wp-content/uploads/Anh-10-1024x633.jpg" width="100%" height="auto" alt="">
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-center font-weight-bold">
                                Khám phá và trải nghiệm 01 ngày miễn phí tại UP Coworking Space
                        </h3>
                        <br/>
                        <div class="row">
                            <label class="font-weight-bold" for="name">Họ và tên *</label>
                            <input type="text" class="form-control co-input" name="name" id="name" required>
                        </div>
                        <br/>
                        <div class="row">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input type="email" class="form-control co-input" id="email" name="email"  required>
                        </div>
                        <br/>
                        <div class="row">
                            <label class="font-weight-bold" for="phone">Số điện thoại *</label>
                            <input type="text" class="form-control co-input" name="phone" id="phone" required>
                        </div>
                        <br/>
                        <div class="row">
                            <br/>
                            <input style="background: #8bd100;
                            border: 0;
                            color: #fff;
                            font-weight: bold;
                            padding: 10px 15px;
                            width: 100%;
                            text-transform: uppercase;
                            font-size: 18px;" type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
                        </div>
                        <br/>
                        <p class="font-weight-bold">
                                Địa điểm đăng ký trải nghiệm *
                        </p>
                        <label><input type="radio" name="optradio"><span> 
        
                                UP Lương Yên: Tầng 8, toà nhà Hanoi Creative City, số 1 Lương Yên, Hai Bà Trưng, Hà Nội</span></label>
                        <br/>
                        <label><input type="radio" name="optradio"><span> BKHUP: Tầng 3, toà nhà A17, số 17 Tạ Quang Bửu, Hai Bà Trưng, Hà Nội</span></label>
                        <br/>
                        <label><input type="radio" name="optradio"><span> UP Kim Mã: Tầng 5, tòa nhà VIT, số 519 Kim Mã, Ba Đình, Hà Nội</span></label>
                        <br/>
                        <label><input type="radio" name="optradio"><span> UP@VPBank: Tầng 21, số 89 Láng Hạ, Ba Đình, Hà Nội</span></label>
                        <br/>
                        <label><input type="radio" name="optradio"><span> 
                                UP Bách Khoa Hồ Chí Minh: Số 268 Lý Thường Kiệt, phường 14, quận 10, Hồ Chí Minh</span></label>
                        <br/>
                        <div class="row">
                            <img src="http://up-co.vn/wp-content/uploads/2016/06/up-212x160-106x80.png" alt="Up" class="m-auto">
                        </div>
                    </div>
            </div>
                <br/><br/>
        </form>
    </div>


@endsection
