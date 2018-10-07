@extends('upcoworkingspace::layouts.en-master')


@section('en-content')
<div class="card card-raised page-carousel no-margin">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url('http://up-co.vn/wp-content/uploads/2016/07/khong-gian-lam-viec-1.jpg'); background-size: 100% 100%; background-repeat:no-repeat; padding-bottom: 40%;">
                {{-- <div class="filter filter-dark"></div> --}}
                <div class="content-center" style="position: absolute; top: 50%; left: 50%; text-align: center; color: #fff; transform: translate(-50%, -50%);">
                    <div class="container">
                        <h3 class="font-weight-bold text-white">LÀM VIỆC HIỆU QUẢ VÀ SÁNG TẠO HƠN</h3>
                        <h1 class="font-weight-bold text-white">TẠI UP COWORKING SPACE</h1><br>
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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <div class="container">
        <div class="row" style="margin-top:150px">
            <div class="blog-4">
                <div class="container">

                    <div class="row">
                        @foreach($events as $event)
                            <div class="col-md-4" style="margin-bottom: 20px">
                                <div class="card card-blog">
                                    <div class="card-image" >
                                        <a href="{{'/en/events/' . $event->slug}}">
                                            <div style="width: 100%;
                                                    background: url({{$event->avatar_url}});
                                                    background-size: cover;
                                                    background-position: center;
                                                    padding-bottom: 56%;">
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 style="min-height: 50px">
                                        <a href="{{'/en/events/' . $event->slug}}" class="card-category text-main-color">{{$event->name}}</a>
                                    </h5>
                                    <p class="card-description" style="color: #4a4a4a">
                                        <i class="fa fa-calendar text-main-color" aria-hidden="true"></i>
                                        {{ Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }}
                                        @if($event->end_date != $event->start_date)
                                            <span > - {{ Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}</span>
                                        @endif
                                    </p>
                                    <p class="card-description" style="color: #4a4a4a">
                                        <i class="fa fa-clock-o text-main-color" aria-hidden="true"></i>
                                        {{ Carbon\Carbon::parse($event->start_time)->format('H:i') }}
                                        @if($event->end_time != $event->start_time)
                                            <span > - {{ Carbon\Carbon::parse($event->end_time)->format('H:i') }}</span>
                                        @endif
                                    </p>
                                    <br>
                                </div>
                            </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row" style="background-color: #ffffff; padding: 20px">
                        <div id="loading">
                            @include('upcoworkingspace::includes.loading')

                        </div>
                        <div id='calendar'></div>
                    </div>
                    <br>
                    <hr>

                    <div id="pagination-events">
                        <div class="pagination-area">
                            <ul class="pagination pagination-primary justify-content-center">
                                <li class="page-item">
                                    <a href="/su-kien?page=1&search={{$search}}" class="page-link">
                                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li v-for="page in pages"
                                    v-bind:class="'page-item ' + (page=={{$current_page}} ? 'active' : '')">
                                    <a v-bind:href="'/su-kien?page='+page+'&search={{$search}}'" class="page-link">
                                        @{{page}}
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="/su-kien?page={{$total_pages}}&search={{$search}}" class="page-link">
                                        <i class="fa fa-angle-double-right" aria-hidden="true">
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
<style>
    /*.fc-prev-button.fc-button.fc-state-default.fc-corner-left, .fc-next-button.fc-button.fc-state-default.fc-corner-right {*/
    /*border: none;*/
    /*display: flex;*/
    /*align-items: center;*/
    /*justify-content: center;*/
    /*background-color: #96d21f;*/
    /*}*/

    .fc-event {
        border: 1px solid #96d21f !important;
        background-color:  #96d21f !important; /* default BACKGROUND color */

    }

    .fc-state-default { /* non-theme */
        border: none !important;
        background: #96d21f !important;
        margin: 1px !important;
        color:white !important;
    }
    .fc-state-default.fc-corner-left { /* non-theme */
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;

    }

    .fc-state-default.fc-corner-right { /* non-theme */
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;

    }

    .fc-icon-left-single-arrow, .fc-icon-right-single-arrow {
        color:white;

    }
    /*.fc-today-button {*/
    /*visibility: hidden;*/
    /*}*/
    .card-category {
        font-weight: 600;
    }
    .card-blog {
        min-height: 380px;
    }
    .visible {
        visibility: visible;
    }
    .hidden {
        visibility: hidden;
    }
</style>

@push('scripts')

    <script>
        var pagination = new Vue({
            el: '#pagination-events',
            data: {
                pages: []
            },
        });

        pagination.pages = paginator({{$current_page}},{{$total_pages}})
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.0/fullcalendar.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.0/fullcalendar.min.js"></script>

    <script>

        stateLoading = false;
        data = [];
        function loading(state){
            if(state === true) {
                document.getElementById('loading').setAttribute("style","display: block; position: relative; top:26px; left: 80px ");

            }
            else {
                document.getElementById('loading').setAttribute("style","display: none")
            }
        }


        function getData(year, month) {
            stateLoading = true;
            loading(stateLoading);
            axios.get(window.url + '/su-kien-data?year=' + year + '&month=' + month)
                .then(function (response) {

                    data = [];
                    if (response.data.events.length > 0) {

                        response.data.events.forEach(function (event) {
                            var event_start_date = event.start_date.slice(0,10);
                            var event_end_date = event.end_date.slice(0,10);
                            var event_start_time = event.start_time.slice(11);
                            var event_end_time = event.end_time.slice(11);
                            data.push(
                                {
                                    id: event.id,
                                    title: event.name,
                                    id: event.id,
                                    start: event.start_time,
                                    end: event.end_time,
                                    url: window.url + '/events/' + event.slug,
                                    // Repeat monday and thursday
                                    ranges: [{ //repeating events are only displayed if they are within one of the following ranges.
                                        start: moment(event.start_date,'YYYY-MM-DD'), //next two weeks
                                        end: moment(event.end_date,'YYYY-MM-DD').add(1,'d'),
                                    }]
                                }
                            );
                        });
                        updateData();
                    }
                    else {
                        updateData();
                    }

                    stateLoading = false;
                    loading(stateLoading);

                }.bind(data)).catch(function (error) {
                stateLoading = false;
                loading(stateLoading);
            });
        }


        function updateData() {
            getEvents = function( start, end ){
                return data;
            }

            $('#calendar').fullCalendar({
                defaultDate: moment(),
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                eventRender: function(event, element, view){
                    // console.log(event.start.format());
                    return (event.ranges.filter(function(range){
                        return (event.start.isBefore(range.end) &&
                            event.end.isAfter(range.start));
                    }).length)>0;
                },
                events: function( start, end, timezone, callback ){
                    events = getEvents(start,end); //this should be a JSON request

                    callback(events);
                },
            });
            console.log(data);
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', data);

        }

        var moment1;
        var moment_year;
        var moment_month;




        $(document).ready(function () {
            moment1 = new Date();
            moment_year = moment(moment1).format('YYYY');
            moment_month = moment(moment1).format('M');
            getData(moment_year, moment_month);



            $('#calendar').on('click', '.fc-next-button', function () {
                $('#calendar').fullCalendar('removeEvents');
                moment1 = $('#calendar').fullCalendar('getDate');
                moment_year = moment(moment1).format('YYYY');
                moment_month = moment(moment1).format('M');
                getData(moment_year, moment_month);
                // console.log(repeatingEvents);

            });
            $('#calendar').on('click', '.fc-prev-button', function () {
                $('#calendar').fullCalendar('removeEvents');
                moment1 = $('#calendar').fullCalendar('getDate');
                moment_year = moment(moment1).format('YYYY');
                moment_month = moment(moment1).format('M');
                getData(moment_year, moment_month);
                // console.log(repeatingEvents);
            });



        });


    </script>








@endpush






