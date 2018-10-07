@extends('upcoworkingspace::layouts.en-master')


@section('en-content')
    <style>
        .banner{
            background: url("http://up-co.vn/wp-content/uploads/revslider/homevi/126A6996.jpg");
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
    </style>
    {{-- <div class="banner flexbox-centering">
        <div class="text-uppercase text-center white-text">
            <h3>UP CO-WORKING space</h3>
            <h2>media partner</h2>
        </div>
    </div> --}}
    <div class="card card-raised page-carousel no-margin">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('http://up-co.vn/wp-content/uploads/revslider/homevi/126A6996.jpg'); background-size: 100% 100%; background-repeat:no-repeat; padding-bottom: 40%;">
                    {{-- <div class="filter filter-dark"></div> --}}
                    <div class="content-center" style="position: absolute; top: 50%; left: 50%; text-align: center; color: #fff; transform: translate(-50%, -50%);">
                        <div class="container">
                            <h3 class="font-weight-bold text-white">UP CO-WORKING SPACE</h3>
                            <h1 class="font-weight-bold text-white">MEDIA PARTNER</h1><br>
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

    <div class="container-fluid text-dark" style="background: #ffffff">
        <br/><br/>

        <h3 class="font-weight-bold text-center text-uppercase">
            MEDIA PARTNER
        </h3>
        <br/>
        <p class="text-center">
            If you need more information or pictures of UP, please kindly contact our Community Manager at<a style="color: #96d21f;" href="#" target="_blank">van@up-co.vn</a>
        </p>
        <br/>
    </div>

    <div class="container-fluid text-dark">
        <div class="container">
            <h3 class="font-weight-bold text-uppercase">
                HOW THE MEDIA TALKS ABOUT US

            </h3>
            <br/>
            <div class="row">
                <div class="col-md-3">
                    <a href="http://www.vtc.vn/hai-co-gai-xinh-dep-gioi-thieu-mo-hinh-khoi-nghiep-cua-viet-nam-ra-the-gioi-d262806.html" target="_blank">
                        <img src="http://up-co.vn/wp-content/uploads/2016/06/VTC-News-2-400x225.png" width="100%" height="auto" alt="VTC News 2" title="VTC News 2">
                    </a>
                    <br/>
                    <h4 class="text-center font-weight-bold">
                        Vtc.vn
                    </h4>
                    <br/><br/>
                </div>
                <div class="col-md-3">
                    <a href="http://vtv.vn/kinh-te/chia-se-khong-gian-khoi-nghiep-voi-up-coworking-space-20160409151600172.htm" target="_blank">
                        <img src="http://up-co.vn/wp-content/uploads/2016/06/VTV-news-400x225.png" width="100%" height="auto" alt="VTC News" title="VTC News">
                    </a>
                    <br/>
                    <h4 class="text-center font-weight-bold">
                        Vtc.vn
                    </h4>
                    <br/><br/>
                </div>
                <div class="col-md-3">
                    <a href="http://cafebiz.vn/diem-danh-10-co-working-tuyet-voi-nhat-danh-cho-cong-dong-khoi-nghiep-o-ha-noi-20160718104230026.chn" target="_blank">
                        <img src="http://up-co.vn/wp-content/uploads/2016/06/Cafebiz-News-400x225.png" width="100%" height="auto" alt="Cafebiz News" title="Cafebiz News">
                    </a>
                    <br/>
                    <h4 class="text-center font-weight-bold">
                        Cafebiz.vn
                    </h4>
                    <br/><br/>
                </div>
                <div class="col-md-3">
                    <a href="http://canhtranhquocgia.vn/Box-canh-tranh/Quoc-gia-khoi-nghiepvan-hoi-nao-cho-Viet-Nam/281377.vgp" target="_blank">
                        <img src="http://up-co.vn/wp-content/uploads/2016/06/Canh-tranh-quoc-gia-News-400x225.png" width="100%" height="auto" alt="Canh tranh quoc gia News" title="Canh tranh quoc gia News">
                    </a>
                    <br/>
                    <h4 class="text-center font-weight-bold">
                        Canhtranhquocgia.vn
                    </h4>
                    <br/><br/>
                </div>
            </div>
        </div>
    </div>
    <div style="background: #ffffff" class="container-fluid">
        <div class="container">
            <br/><br/>
            <h3 class="text-uppercase font-weight-bold">
                MEDIA PARTNER
            </h3>
            <br/>
            <br/>
            <div class="row">
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/8fb3ea61-f2da-41c9-aab1-bc43ac6d4d37-e1467361319708.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/VTV-1-500x250.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/500_dantri.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/500_vnexpress.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/510575-vtc10-500x250.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/VTV_Canbiet00.jpg" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/hqdefault-e1467302208451-476x250.jpg" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/500_vtcnews.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/ybox-500x250.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/logo-TTXVN.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/500_kenh14.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/SinhVienIT.NET-untitled-119-e1467695521760-500x250.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/bao-thanh-nien-500x250.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/Logo_VTV4.png" alt="">
                </div>
                <div class="col-md-2 m-3">
                    <img width="100%" height="auto" src="http://up-co.vn/wp-content/uploads/2016/06/w6e7Twj9-1-500x250.png" alt="">
                </div>
            </div>
        </div>
    </div>




@endsection