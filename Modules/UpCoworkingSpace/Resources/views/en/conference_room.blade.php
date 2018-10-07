@extends('upcoworkingspace::layouts.en-master')

@section('en-content')
    {{-- <div class="page-header page-header-xs"
         style="background-image: url('http://up-co.vn/wp-content/uploads/revslider/homevi/126A6996.jpg'); height: 350px">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <br><br>
                <br><br>
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <h4 class="description"><b>UP CO-WORKING SPACE</b></h4>
                        <h1 class="title">MEETING ROOM
                        </h1>
                        <br>
                    </div>

                </div>
            </div>
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
                            <h1 class="font-weight-bold text-white">MEETING ROOM</h1><br>
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

    <div class="blog-4" style="margin-top:20px">
        <div class="container">
            <div class="col-md-6">
                <div class="row">
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown" class="btn btn-round dropdown-toggle"
                                aria-expanded="false"
                                style="background-color: #96d21f; color: white; border-color: #96d21f; text-align: right;">
                            @if($base_id)
                                {{\App\Base::find($base_id)->name}}
                            @else
                                Cơ sở
                            @endif
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu"
                            style="background: white; box-shadow: rgba(0, 0, 0, 0.15) 0px 6px 10px -4px; border-radius: 0px !important;">
                            <a href="/conference-room?page=1&room_type_id={{$room_type_id}}" class="dropdown-item"
                               style="padding: 10px 15px !important; border-radius: 0px !important;">
                                Tất cả
                            </a>
                            @foreach($bases as $base)
                                <a href="/conference-room?page=1&base_id={{$base->id}}&room_type_id={{$room_type_id}}"
                                   class="dropdown-item"
                                   style="padding: 10px 15px !important; border-radius: 0px !important;">
                                    {{$base->name}}
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown" class="btn btn-round dropdown-toggle"
                                aria-expanded="false"
                                style="background-color: #96d21f; color: white; border-color: #96d21f; text-align: right">
                            @if($room_type_id)
                                {{\App\RoomType::find($room_type_id)->name}}
                            @else
                                Loại phòng
                            @endif
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu"
                            style="background: white; box-shadow: rgba(0, 0, 0, 0.15) 0px 6px 10px -4px; border-radius: 0px !important;">
                            <a href="/conference-room?page=1&base_id={{$base_id}}" class="dropdown-item"
                               style="padding: 10px 15px !important; border-radius: 0px !important;">
                                Tất cả
                            </a>
                            @foreach($room_types as $room_type)
                                <a href="/conference-room?page=1&base_id={{$base_id}}&room_type_id={{$room_type->id}}"
                                   class="dropdown-item"
                                   style="padding: 10px 15px !important; border-radius: 0px !important;">
                                    {{$room_type->name}}
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                @foreach($rooms as $room)
                    <div class="col-md-4">
                        <div class="card card-plain card-blog">
                            <div class="card-image">
                                <a href="{{'/conference-room/'.$room->id}}">
                                    <div
                                            style="width: 100%;
                                                    border-radius: 15px;
                                                    background: url({{generate_protocol_url($room->avatar_url)}});
                                                    background-size: cover;
                                                    background-position: center;
                                                    padding-bottom: 70%;"

                                    ></div>
                                </a>
                            </div>
                            <div class="card-block">
                                <h3 class="card-title">
                                    <a href="{{'/conference-room/'.$room->id}}">{{$room->base->name}}
                                        : {{$room->name}}</a>
                                </h3>
                                <p class="card-description">
                                    {{$room->roomType ? $room->roomType->name : ""}}
                                </p>
                                <br>
                                <a href=""
                                   data-target="#submitModal2"
                                   data-toggle="modal"
                                   style="color:#96d21f!important">
                                    <b>Đặt phòng</b>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr>
            <div id="pagination-rooms">
                <div class="pagination-area">
                    <ul class="pagination pagination-primary justify-content-center">
                        <li class="page-item">
                            <a href="/conference-room?page=1&search=" class="page-link">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li v-for="page in pages"
                            v-bind:class="'page-item ' + (page=={{$current_page}} ? 'active' : '')">
                            <a v-bind:href="'/conference-room?page='+page+'&room_type_id={{$room_type_id}}&base_id={{$base_id}}'"
                               class="page-link">
                                @{{page}}
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="/conference-room?page={{$total_pages}}&search=" class="page-link">
                                <i class="fa fa-angle-double-right" aria-hidden="true">
                                </i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var submitModal2 = new Vue({
            el: '#submitModal2',
            data: {

            },
            methods: {
                submit: function () {
                    $("#submitModal2").modal("hide");
                    $("#modalSuccess").modal("show");
                }
            }
        });
        var pagination = new Vue({
            el: '#pagination-rooms',
            data: {
                pages: []
            },
        });
        pagination.pages = paginator({{$current_page}},{{$total_pages}})
    </script>
@endpush

