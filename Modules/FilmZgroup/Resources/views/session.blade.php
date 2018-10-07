@extends('filmzgroup::layouts.master')

<link rel="shortcut icon" href="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525764756TOI3CROQKmr7chO.ico"/>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$film->name}}</title>
<meta property="og:image"         content="{{$film->avatar_url}}" />

<link rel="shortcut icon" href="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525764756TOI3CROQKmr7chO.ico"/>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/filmzgroup.css" media="all">
<link rel="stylesheet" href="/css/filmzgroup-session.css" media="all">

<link rel="stylesheet" id="fw-googleFonts-css"
      href="http://fonts.googleapis.com/css?family=Roboto+Condensed%3A300%2Cregular&amp;subset=latin-ext&amp;ver=4.9.4"
      media="all">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js"></script>
<script>
    !function (e) {
        "use strict";
        var o, t, a, i, s, n, c, r, d, l, v, u, b, p, m, f, h, g, k, x, y, w, C, _, P, B, E, O, U, D, M, N, V, z, R, X,
            Y, j, W, $;
        e.fn.extend({
            venobox: function (q) {
                var I = this, A = {
                    arrowsColor: "#B6B6B6",
                    autoplay: !1,
                    bgcolor: "#fff",
                    border: "0",
                    closeBackground: "#161617",
                    closeColor: "#d2d2d2",
                    framewidth: "",
                    frameheight: "",
                    infinigall: !1,
                    htmlClose: "&times;",
                    htmlNext: "<span>Next</span>",
                    htmlPrev: "<span>Prev</span>",
                    numeratio: !1,
                    numerationBackground: "#161617",
                    numerationColor: "#d2d2d2",
                    numerationPosition: "top",
                    overlayClose: !0,
                    overlayColor: "rgba(23,23,23,0.85)",
                    spinner: "double-bounce",
                    spinColor: "#d2d2d2",
                    titleattr: "title",
                    titleBackground: "#161617",
                    titleColor: "#d2d2d2",
                    titlePosition: "top",
                    cb_pre_open: function () {
                        return !0
                    },
                    cb_post_open: function () {
                    },
                    cb_pre_close: function () {
                        return !0
                    },
                    cb_post_close: function () {
                    },
                    cb_post_resize: function () {
                    },
                    cb_after_nav: function () {
                    },
                    cb_init: function () {
                    }
                }, H = e.extend(A, q);
                return H.cb_init(I), this.each(function () {
                    function q() {
                        y = O.data("gall"), h = O.data("numeratio"), b = O.data("infinigall"), p = e('.vbox-item[data-gall="' + y + '"]'), w = p.eq(p.index(O) + 1), C = p.eq(p.index(O) - 1), p.length > 1 ? (U = p.index(O) + 1, a.html(U + " / " + p.length)) : U = 1, h === !0 ? a.show() : a.hide(), "" !== x ? i.show() : i.hide(), w.length || b === !0 ? (e(".vbox-next").css("display", "block"), _ = !0) : (e(".vbox-next").css("display", "none"), _ = !1), p.index(O) > 0 || b === !0 ? (e(".vbox-prev").css("display", "block"), P = !0) : (e(".vbox-prev").css("display", "none"), P = !1), (P === !0 || _ === !0) && (r.on(ne.DOWN, T), r.on(ne.MOVE, Z), r.on(ne.UP, F))
                    }

                    function A(e) {
                        return e.length < 1 ? !1 : m ? !1 : (m = !0, g = e.data("overlay") || e.data("overlaycolor"), v = e.data("framewidth"), u = e.data("frameheight"), s = e.data("border"), t = e.data("bgcolor"), d = e.data("href") || e.attr("href"), o = e.data("autoplay"), x = e.attr(e.data("titleattr")) || "", e === C && r.addClass("animated").addClass("swipe-right"), e === w && r.addClass("animated").addClass("swipe-left"), void r.animate({opacity: 0}, 500, function () {
                            k.css("background", g), r.removeClass("animated").removeClass("swipe-left").removeClass("swipe-right").css({
                                "margin-left": 0,
                                "margin-right": 0
                            }), "iframe" == e.data("vbtype") ? J() : "inline" == e.data("vbtype") ? oe() : "ajax" == e.data("vbtype") ? G() : "video" == e.data("vbtype") || "vimeo" == e.data("vbtype") || "youtube" == e.data("vbtype") ? K(o) : (r.html('<img src="' + d + '">'), te()), O = e, q(), m = !1, H.cb_after_nav(O, U, w, C)
                        }))
                    }

                    function Q(e) {
                        27 === e.keyCode && S(), 37 == e.keyCode && P === !0 && A(C), 39 == e.keyCode && _ === !0 && A(w)
                    }

                    function S() {
                        var o = H.cb_pre_close(O, U, w, C);
                        return o === !1 ? !1 : (e("body").off("keydown", Q).removeClass("vbox-open"), O.focus(), void k.animate({opacity: 0}, 500, function () {
                            k.remove(), m = !1, H.cb_post_close()
                        }))
                    }

                    function T(e) {
                        r.addClass("animated"), V = R = e.pageY, z = X = e.pageX, D = !0
                    }

                    function Z(e) {
                        if (D === !0) {
                            X = e.pageX, R = e.pageY, j = X - z, W = R - V;
                            var o = Math.abs(j), t = Math.abs(W);
                            o > t && 100 >= o && (e.preventDefault(), r.css("margin-left", j))
                        }
                    }

                    function F(e) {
                        if (D === !0) {
                            D = !1;
                            var o = O, t = !1;
                            Y = X - z, 0 > Y && _ === !0 && (o = w, t = !0), Y > 0 && P === !0 && (o = C, t = !0), Math.abs(Y) >= $ && t === !0 ? A(o) : r.css({
                                "margin-left": 0,
                                "margin-right": 0
                            })
                        }
                    }

                    function G() {
                        e.ajax({url: d, cache: !1}).done(function (e) {
                            r.html('<div class="vbox-inline">' + e + "</div>"), te()
                        }).fail(function () {
                            r.html('<div class="vbox-inline"><p>Error retrieving contents, please retry</div>'), ae()
                        })
                    }

                    function J() {
                        r.html('<iframe class="venoframe" src="' + d + '"></iframe>'), ae()
                    }

                    function K(e) {
                        var o, t = L(d), a = e ? "?rel=0&autoplay=1" : "?rel=0", i = a + ee(d);
                        "vimeo" == t.type ? o = "https://player.vimeo.com/video/" : "youtube" == t.type && (o = "https://www.youtube.com/embed/"), r.html('<iframe class="venoframe vbvid" webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder="0" src="' + o + t.id + i + '"></iframe>'), ae()
                    }

                    function L(e) {
                        if (e.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/), RegExp.$3.indexOf("youtu") > -1) var o = "youtube"; else if (RegExp.$3.indexOf("vimeo") > -1) var o = "vimeo";
                        return {type: o, id: RegExp.$6}
                    }

                    function ee(e) {
                        var o = "", t = decodeURIComponent(e), a = t.split("?");
                        if (void 0 !== a[1]) {
                            var i, s, n = a[1].split("&");
                            for (s = 0; s < n.length; s++) i = n[s].split("="), o = o + "&" + i[0] + "=" + i[1]
                        }
                        return encodeURI(o)
                    }

                    function oe() {
                        r.html('<div class="vbox-inline">' + e(d).html() + "</div>"), ae()
                    }

                    function te() {
                        N = r.find("img"), N.length ? N.each(function () {
                            e(this).one("load", function () {
                                ae()
                            })
                        }) : ae()
                    }

                    function ae() {
                        i.html(x), r.find(">:first-child").addClass("figlio").css({
                            width: v,
                            height: u,
                            padding: s,
                            background: t
                        }), e("img.figlio").on("dragstart", function (e) {
                            e.preventDefault()
                        }), ie(), r.animate({opacity: "1"}, "slow", function () {
                        })
                    }

                    function ie() {
                        var o = r.outerHeight(), t = e(window).height();
                        f = t > o + 60 ? (t - o) / 2 : "30px", r.css("margin-top", f), r.css("margin-bottom", f), H.cb_post_resize()
                    }

                    if (O = e(this), O.data("venobox")) return !0;
                    I.VBclose = function () {
                        S()
                    }, O.addClass("vbox-item"), O.data("framewidth", H.framewidth), O.data("frameheight", H.frameheight), O.data("border", H.border), O.data("bgcolor", H.bgcolor), O.data("numeratio", H.numeratio), O.data("infinigall", H.infinigall), O.data("overlaycolor", H.overlayColor), O.data("titleattr", H.titleattr), O.data("venobox", !0), O.on("click", function (b) {
                        b.preventDefault(), O = e(this);
                        var p = H.cb_pre_open(O);
                        if (p === !1) return !1;
                        switch (I.VBnext = function () {
                            A(w)
                        }, I.VBprev = function () {
                            A(C)
                        }, g = O.data("overlay") || O.data("overlaycolor"), v = O.data("framewidth"), u = O.data("frameheight"), o = O.data("autoplay") || H.autoplay, s = O.data("border"), t = O.data("bgcolor"), _ = !1, P = !1, m = !1, d = O.data("href") || O.attr("href"), l = O.data("css") || "", x = O.attr(O.data("titleattr")) || "", B = '<div class="vbox-preloader">', H.spinner) {
                            case"rotating-plane":
                                B += '<div class="sk-rotating-plane"></div>';
                                break;
                            case"double-bounce":
                                B += '<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div>';
                                break;
                            case"wave":
                                B += '<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>';
                                break;
                            case"wandering-cubes":
                                B += '<div class="sk-wandering-cubes"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div></div>';
                                break;
                            case"spinner-pulse":
                                B += '<div class="sk-spinner sk-spinner-pulse"></div>';
                                break;
                            case"three-bounce":
                                B += '<div class="sk-three-bounce"><div class="sk-child sk-bounce1"></div><div class="sk-child sk-bounce2"></div><div class="sk-child sk-bounce3"></div></div>';
                                break;
                            case"cube-grid":
                                B += '<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>'
                        }
                        return B += "</div>", E = '<a class="vbox-next">' + H.htmlNext + '</a><a class="vbox-prev">' + H.htmlPrev + "</a>", M = '<div class="vbox-title"></div><div class="vbox-num">0/0</div><div class="vbox-close">' + H.htmlClose + "</div>", n = '<div class="vbox-overlay ' + l + '" style="background:' + g + '">' + B + '<div class="vbox-container"><div class="vbox-content"></div></div>' + M + E + "</div>", e("body").append(n).addClass("vbox-open"), e(".vbox-preloader .sk-child, .vbox-preloader .sk-rotating-plane, .vbox-preloader .sk-rect, .vbox-preloader .sk-cube, .vbox-preloader .sk-spinner-pulse").css("background-color", H.spinColor), k = e(".vbox-overlay"), c = e(".vbox-container"), r = e(".vbox-content"), a = e(".vbox-num"), i = e(".vbox-title"), i.css(H.titlePosition, "-1px"), i.css({
                            color: H.titleColor,
                            "background-color": H.titleBackground
                        }), e(".vbox-close").css({
                            color: H.closeColor,
                            "background-color": H.closeBackground
                        }), e(".vbox-num").css(H.numerationPosition, "-1px"), e(".vbox-num").css({
                            color: H.numerationColor,
                            "background-color": H.numerationBackground
                        }), e(".vbox-next span, .vbox-prev span").css({
                            "border-top-color": H.arrowsColor,
                            "border-right-color": H.arrowsColor
                        }), r.html(""), r.css("opacity", "0"), k.css("opacity", "0"), q(), k.animate({opacity: 1}, 250, function () {
                            "iframe" == O.data("vbtype") ? J() : "inline" == O.data("vbtype") ? oe() : "ajax" == O.data("vbtype") ? G() : "video" == O.data("vbtype") || "vimeo" == O.data("vbtype") || "youtube" == O.data("vbtype") ? K(o) : (r.html('<img src="' + d + '">'), te()), H.cb_post_open(O, U, w, C)
                        }), e("body").keydown(Q), e(".vbox-prev").on("click", function () {
                            A(C)
                        }), e(".vbox-next").on("click", function () {
                            A(w)
                        }), !1
                    });
                    var se = ".vbox-overlay";
                    H.overlayClose || (se = ".vbox-close"), e(document).on("click", se, function (o) {
                        (e(o.target).is(".vbox-overlay") || e(o.target).is(".vbox-content") || e(o.target).is(".vbox-close") || e(o.target).is(".vbox-preloader")) && S()
                    }), z = 0, X = 0, Y = 0, $ = 50, D = !1;
                    var ne = {DOWN: "touchmousedown", UP: "touchmouseup", MOVE: "touchmousemove"}, ce = function (o) {
                        var t;
                        switch (o.type) {
                            case"mousedown":
                                t = ne.DOWN;
                                break;
                            case"mouseup":
                                t = ne.UP;
                                break;
                            case"mouseout":
                                t = ne.UP;
                                break;
                            case"mousemove":
                                t = ne.MOVE;
                                break;
                            default:
                                return
                        }
                        var a = de(t, o, o.pageX, o.pageY);
                        e(o.target).trigger(a)
                    }, re = function (o) {
                        var t;
                        switch (o.type) {
                            case"touchstart":
                                t = ne.DOWN;
                                break;
                            case"touchend":
                                t = ne.UP;
                                break;
                            case"touchmove":
                                t = ne.MOVE;
                                break;
                            default:
                                return
                        }
                        var a, i = o.originalEvent.touches[0];
                        a = t == ne.UP ? de(t, o, null, null) : de(t, o, i.pageX, i.pageY), e(o.target).trigger(a)
                    }, de = function (o, t, a, i) {
                        return e.Event(o, {pageX: a, pageY: i, originalEvent: t})
                    };
                    "ontouchstart" in window ? (e(document).on("touchstart", re), e(document).on("touchmove", re), e(document).on("touchend", re)) : (e(document).on("mousedown", ce), e(document).on("mouseup", ce), e(document).on("mouseout", ce), e(document).on("mousemove", ce)), e(window).resize(function () {
                        e(".vbox-content").length && setTimeout(ie(), 800)
                    })
                })
            }
        })
    }(jQuery);
</script>

<style type="text/css">
    @media (min-width: 992px){
        #atm-visa { margin-top: 49px }
    }    
    @media (min-width: 768px) and (max-width: 991px){
        #atm-visa { margin-top: 68px }
    } 
</style>

<!-- Navigation -->
@section('content')
    <div class="navbar" role="navigation">
        <div class="heading">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="search">
                            <a href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                        <div class="tel">
                            <a href="tel:0942929990"><i class="fa fa-phone"></i> 0942929990</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="navbar-header">
                <a href="/" title="Ledahlia" class="logo">
                    <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525421236EE6Two3Gmcm7zec.png" alt="Ledahlia"
                         style="margin-top: -20px; width: 178px">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse ">
                <ul id="menu-main-navigation" class="nav navbar-nav">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-194 current-menu-item curent_page_item active dropdown">
                        <a title="Movies" href="/film?category=showing" class="dropdown-toggle" aria-haspopup="false">&#160;&#160;&#160;Phim&#160;&#160;&#160;</a>
                        <ul role="menu" class="dropdown-menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-246">
                                <a title="All movies" style="color: white!important" href="/film">Tất cả phim</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-229"><a title="News"
                                                                                                          href="/blog">Tin
                            tức</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254"
                        style="display: none"><a title="Coffee"
                                                 href="Coffee.html">Cà
                            phê</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254"
                        style="display: none"><a title="Events"
                                                 href="Events.thml">Sự
                            kiện</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-210"><a
                                title="Contact us" href="/contact-us">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="movie-search" style="height: 46px; display: none; transition: transform 0.3s">
        <form role="search" method="get" id="searchform" action="{{url('/film')}}">
            <div>
                <input type="text" value="" name="search" id="search" placeholder="Tìm phim">
                <input type="submit" id="searchsubmit" class="btn btn-default" value="Tìm kiếm">
                <input type="hidden" name="post_type" value="movie">
            </div>
        </form>
    </div>
    <div id="content_hero" style="background: url({{$film->cover_url}}) center center / cover;">
        <img src="http://specto.klevermedia.co.uk/wp-content/themes/specto/images/scroll-arrow.svg" alt="Scroll down"
             class="scroll">
        <div class="container">
            <div class="row blurb">
                <div class="col-md-9">
                    <span class="title">{{$film->genre}}</span>
                    <header>
                        <h1><a href="/film/{{$film->id}}" style="color: white">{{$film->name}}</a></h1>
                    </header>
                    <?php $limit_summary = 300;?>
                    <p>{{mb_substr($film->summary, 0, $limit_summary) . '...'}}</p>
                    <div class="buttons">
                        <span class="certificate">{{$film->film_rated}}</span>
                        <a href="{{$film->trailer_url}}" data-vbtype="video" class="venobox btn btn-default vbox-item">
                            <i class="fa fa-play"></i>
                            <span>Xem trailer</span>
                        </a>
                        <div class="star-rating">
                            @for($i = 1; $i <=  $film->rate; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                            @for($i = 1; $i <=  5 - $film->rate; $i++)
                                <i class="fa fa-star grey"></i>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="clock">
        <div id="clockdiv">
            <div>
                <span class="minutes">00</span>
            </div>
            <div>
                <span class="seconds">00</span>
            </div>
        </div>
    </div>

    <div class="timeline">
        <div class="timeline_card">
            <input class="timeline_input" name="timeline" type="radio" id="btn1" checked="">
            <label class="timeline_label">
                &#160;
            </label>
            <input class="timeline_input" name="timeline" type="radio" id="btn2">
            <label class="timeline_label">
                &#160;
            </label>
            <input class="timeline_input" name="timeline" type="radio" id="btn3">
            <label class="timeline_label">
                &#160;
            </label>
            <div class="timeline_line"></div>
        </div>
    </div>

    <br><br><br>

    <section class="fw-main-row" id="section-1">
        <div class="fw-container">
            <div class="fw-row">

                <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 page-1">
                    <header>
                        <h2 class="left " style="color: #82242A">
                            Thông tin cá nhân </h2>
                    </header>
                </div>
            </div>
            <br>
            <div class="fw-row">
                <div class="fw-col-xs-12 fw-col-sm-6 order-2" style="padding: 0 15px 0 15px">
                    <div class="form-wrapper fw-contact-form contact-form">
                        <div class="form">
                            <div class="wrap-forms">
                                <div class="fw-row"></div>
                                <div class="fw-row">
                                    <div class="fw-col-xs-12 form-builder-item">
                                        <div class="field-text">
                                            <label for="id-1">Tên của bạn </label>
                                            <input type="text" name="user-name" value="" id="id-1">
                                        </div>
                                    </div>
                                </div>
                                <div class="fw-row">
                                    <div class="fw-col-xs-12 form-builder-item">
                                        <div class="field-text">
                                            <label for="id-2">Email <sup style="top: 0">*</sup> </label>
                                            <input type="text" name="user-email" value="" id="id-2">
                                            <p class="infor-error">
                                                <i class="fa fa-times"></i>
                                                <span style="margin: -2px 0px 0px 5px">Bạn cần nhập Email hợp lệ : ...@email.com<span></span></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fw-row">
                                    <div class="fw-col-xs-12 form-builder-item">
                                        <div class="field-text">
                                            <label for="id-3">Số điện thoại <sup style="top: 0">*</sup> </label>
                                            <input type="text" name="user-phone" id="id-3">
                                            <p class="infor-error">
                                                <i class="fa fa-times"></i>
                                                <span style="margin: -2px 0px 0px 5px">Bạn cần nhập Email hoặc Số điện thoại<span></span></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="submit">
                                <button class="btn-ghost btn" id="next-1">Tiếp theo</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                use Carbon\Carbon;
                ?>
                <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 fw-col-sm-6 ">
                    <p id="infor-avatar-0" style=" background: url({{$film->avatar_url}}) center center / cover;"></p>
                    <div class="tagcloud">
                        <div style="width: 100%">
                            <div class="tagcloud infor-1">
                                <div id="infor-avatar-1"
                                     style=" background: url({{$film->avatar_url}}) center center / cover;"></div>
                                <span class="session-quality"
                                      style="width: 100%; font-size: 20px!important;"><span>{{$film->name}}</span></span>
                            </div>
                            <div id="line-0"></div>
                            <div style="display: flex">
                                <span class="session-time"
                                      style="margin-right: 4px; min-width: 65px"><span>{{substr($session->start_time,0,5)}}</span></span>
                                <span class="session-quality"
                                      style="margin-right: 4px; min-width: 65px"><span>{{$session->film_quality}}</span></span>
                                <span class="session-quality session-day"
                                      style="white-space: nowrap;"><span>{{Carbon::createFromFormat('Y-m-d', $session->start_date)->format('d/m')}}</span></span>
                            </div>
                            <div id="line" style="margin-top: 24px; margin-bottom: 37px"></div>

                        </div>

                    </div>
                    <div id="information-1">
                        <p class="infor-error">
                            <sup>*</sup>
                            <span>Lần đầu mua vé, bạn cần nhập đầy đủ cả 3 thông tin : Tên - Email - Số điện thoại<span></span></span>
                        </p>
                        <p class="infor-error">
                            <sup>*</sup>
                            <span>Sau khi khởi tạo User thành công, chúng tôi sẽ gửi 1 mail xác nhận về Email của bạn<span></span></span>
                        </p>
                        <p class="infor-error">
                            <sup>*</sup>
                            <span>Những lần mua vé tiếp theo, bạn chỉ cần nhập 1 trong 2 thông tin : Email - Số điện thoại<span></span></span>
                        </p>
                        <p class="infor-error">
                            <sup>*</sup>
                            <span>Thông tin cá nhân của bạn dùng để tích điểm ưu đãi cho bạn trong những lần mua vé sau này<span></span></span>
                        </p>
                        <p class="infor-error">
                            <sup>*</sup>
                            <span>Xin bạn vui lòng nhập Email chính xác. Bởi vì sau khi đặt ghế, vé xem phim sẽ được gửi trực tiếp về Email của bạn</span>
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <div class="fw-container">
            <div id="information-2">
                <br><br><br><br>
                <p class="infor-error" style="display: flex">
                    <sup>*</sup>
                    <span>Lần đầu mua vé, bạn cần nhập đầy đủ cả 3 thông tin : Tên - Email - Số điện thoại<span></span></span>
                </p>
                <p class="infor-error" style="display: flex">
                    <sup>*</sup>
                    <span>Sau khi khởi tạo User thành công, chúng tôi sẽ gửi 1 mail xác nhận về Email của bạn<span></span></span>
                </p>
                <p class="infor-error" style="display: flex">
                    <sup>*</sup>
                    <span>Những lần mua vé tiếp theo, bạn chỉ cần nhập 1 trong 2 thông tin : Email - Số điện thoại<span></span></span>
                </p>
                <p class="infor-error" style="display: flex">
                    <sup>*</sup>
                    <span>Thông tin cá nhân của bạn dùng để tích điểm ưu đãi cho bạn trong những lần mua vé sau này<span></span></span>
                </p>
                <p class="infor-error" style="display: flex">
                    <sup>*</sup>
                    <span>Xin bạn vui lòng nhập Email chính xác. Bởi vì sau khi đặt ghế, vé xem phim sẽ được gửi trực tiếp về Email của bạn</span>
                </p>
            </div>

        </div>
    </section>

    <!..................................................................................>

    <!..................................................................................>

    <section class="fw-main-row" id="section-2">
        <div class="fw-container">
            <div class="fw-row">
                <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 fw-col-sm-8 ">
                    <header>
                        <h2 class="left " style="color: #82242A"> Đặt vé </h2>
                    </header>
                    <div class="screen"><span class="text-screen"></span></div>
                    <div class="svg"></div>
                    <div style="display: none" id="seat-types-more-than-3">
                        <div style="width: 10%"></div>
                        <div class="svg-1" style="width: 60%"></div>
                        <div class="svg-2" style="width: 20%">
                            <svg viewBox="0 -4 180 180">
                                <g transform="translate(20,20)">
                                    <circle r="20" style="fill: black"></circle>
                                </g>
                                <g transform="translate(20,75)">
                                    <circle r="20" style="fill: gray"></circle>
                                </g>
                                <g transform="translate(20,130)">
                                    <circle r="20" style="fill: rgb(76, 175, 80)"></circle>
                                </g>
                                <g transform="translate(50,20)">
                                    <text fill="#82242A" alignment-baseline="central" font-size="18"
                                          font-family="Roboto Condensed, latin-ext"
                                          style="font-weight: bold; letter-spacing: 2">Đã chọn
                                    </text>
                                </g>
                                <g transform="translate(50,75)">
                                    <text fill="#82242A" alignment-baseline="central" font-size="18"
                                          font-family="Roboto Condensed, latin-ext"
                                          style="font-weight: bold; letter-spacing: 2">Checked
                                    </text>
                                </g>
                                <g transform="translate(50,130)">
                                    <text fill="#82242A" alignment-baseline="central" font-size="18"
                                          font-family="Roboto Condensed, latin-ext"
                                          style="font-weight: bold; letter-spacing: 1.5">Đang chờ
                                    </text>
                                </g>
                            </svg>
                        </div>
                        <div style="width: 10%"></div>
                    </div>
                    <div id="seat-types-less-than-4">
                        <div class="svg-1"></div>
                        <div class="svg-2">
                            <svg viewBox="-30 -10 800 100">
                                <g transform="translate(20,20)">
                                    <circle r="21.5" style="fill: black"></circle>
                                </g>
                                <g transform="translate(280,20)">
                                    <circle r="21.5" style="fill: gray"></circle>
                                </g>
                                <g transform="translate(540,20)">
                                    <circle r="21.5" style="fill: rgb(76, 175, 80)"></circle>
                                </g>
                                <g transform="translate(51,20)">
                                    <text fill="#82242A" alignment-baseline="central" font-size="18"
                                          font-family="Roboto Condensed, latin-ext"
                                          style="font-weight: bold; letter-spacing: 2">Đã chọn
                                    </text>
                                </g>
                                <g transform="translate(311,20)">
                                    <text fill="#82242A" alignment-baseline="central" font-size="18"
                                          font-family="Roboto Condensed, latin-ext"
                                          style="font-weight: bold; letter-spacing: 2">Checked
                                    </text>
                                </g>
                                <g transform="translate(571,20)">
                                    <text fill="#82242A" alignment-baseline="central" font-size="18"
                                          font-family="Roboto Condensed, latin-ext"
                                          style="font-weight: bold; letter-spacing: 1.5">Đang chờ thanh toán
                                    </text>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div style="width: 0%"></div>
                </div>
                <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 fw-col-sm-4 ">
                    <header>
                        <h2 class="left " style="color: #82242A">
                            Thông tin </h2>
                    </header>


                    <form>
                        <div style="display: flex; margin-bottom: 15px; margin-left: 1px" class="tagcloud">
                            <div style="background: url({{$film->avatar_url}}) center center / cover;min-width: 65px; height: 80px; border-radius: 5px; margin-right: 4px;"></div>
                            <span class="session-quality"
                                  style="width: 100%; font-size: 20px;"><span>{{$film->name}}</span></span>
                        </div>
                        <div style="display: flex; margin-left: 1px">
                            <span class="session-time"
                                  style="min-width: 66px; margin-right: 4px"><span>{{substr($session->start_time,0,5)}}</span></span>
                            <span class="session-quality"
                                  style="min-width: 65px"><span>{{$session->film_quality}}</span></span>&#160;
                            <span class="session-quality session-day"
                                  style="display: inline-flex!important"><span>{{Carbon::createFromFormat('Y-m-d', $session->start_date)->format('d/m')}}</span></span>
                        </div>

                        <div id="line"></div>
                        <div class="tagcloud" id="svg-no-seat" style="margin: 0 2px 0 -2px; cursor: default;"></div>
                        <div class="tagcloud" id="svg-seats" style="padding:0 0px; margin-left: -2px"></div>
                        <div id="line" style="margin: 15px 0px 17px 0px"></div>
                        <div style="display: flex; margin-top: 15px;">
                            <span class="session-quality" style="min-width: 137px"><span>Số vé đặt</span></span>&#160;
                            <span class="session-time total-seats" style="width: 100%"><span>0</span></span>
                        </div>
                        <div style="display: flex; margin-top: 15px;">
                            <span class="session-quality" style="min-width: 137px"><span>Tổng giá tiền</span></span>&#160;
                            <span class="session-time total-pay" style="width: 100%"><span>0 VNĐ</span></span>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
            <div class="submit">
                <button class="btn btn-ghost" id="next-2">Tiếp theo</button>
            </div>
        </div>
    </section>


    <!..................................................................................>

    <!..................................................................................>

    <section class="fw-main-row" id="section-3">
        <div class="fw-container">
            <div class="fw-row">

                <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 page-3">
                    <header>
                        <h2 class="left " style="color: #82242A; min-width: 290px">
                            Thanh toán </h2>
                    </header>
                </div>
            </div>

            <div class="fw-row">
                <div style="padding: 0 15px 0 15px" class="fw-col-xs-12 fw-col-sm-7 ">
                    <form style="margin-top: 15px">
                        <div class="form-check" style="padding-left: 0px">
                            <span class="session-quality"
                                  style="min-width: 310px; margin-left: 45px; margin-bottom: 32px"><span>Chọn hình thức thanh toán</span></span>
                        </div>

                        <div class="form-check" id="atm-visa">
                            <label class="form-check-label tagcloud">
                                <input class="form-check-input" type="radio" name="pay-radios" value="pay-1">
                                <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/payment/atm_ic.png">
                                <a style="letter-spacing: 1.5">ATM - VISA - MASTER CARD</a>
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-check"  style="display: none;">
                            <label class="form-check-label tagcloud">
                                <input class="form-check-input" type="radio" name="pay-radios" value="pay-2">
                                <img src="https://cdn0.iconfinder.com/data/icons/online-shopping-3/78/Shopping_icons_vector-10-512.png">
                                <a style="">Chưa hỗ trợ</a>
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-check"  style="display: none;">
                            <label class="form-check-label tagcloud">
                                <input class="form-check-input" type="radio" name="pay-radios" value="pay-3">
                                <img src="https://cdn6.aptoide.com/imgs/d/6/2/d6289396398cedf710a15d18d0463070_icon.png?w=240">
                                <a style="">Chưa hỗ trợ</a>
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </form>
                    <br>
                </div>

                <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 fw-col-sm-1 ">
                </div>

                <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 fw-col-sm-4 ">
                    <div>

                        <div style="display: flex; margin-top: 15px;">
                            <span class="session-quality" style="min-width: 140px; margin-right: 8px"><span>Tổng giá tiền</span></span>
                            <span class="session-time total-pay"
                                  style="width: 100%; max-width: 210px; min-width: 85px;"><span>0 VNĐ</span></span>
                        </div>
                        <div style="display: flex; margin-top: 15px; position: relative;" class="tagcloud code-input">
                            <style type="text/css">
                                ::placeholder {color:#82242A;opacity: 0.7; text-transform: none}
                                .code-input button {
                                    display: none;
                                    position: absolute; 
                                    width: 20px; 
                                    min-width: 20px; 
                                    border: none;
                                    color: #82242A; 
                                    background-color: transparent!important; 
                                    right: 23px; 
                                    top: 13px;
                                    font-size: 15px;
                                    opacity: 0.7
                                }
                                .code-input button:hover {
                                    opacity: 1
                                }   
                            </style>
                            <button><i>OK</i></button> 
                            <input id="code" type="text" placeholder="Nhập code giảm giá"
                                   style="border-radius: 5px; text-transform: uppercase; width: 100%; padding: 12px 15px;border: 1px solid #82242A">
                        </div>
                        <div style="display: flex; margin-top: 15px;">
                            <span class="session-quality"
                                  style="min-width: 140px; margin-right: 8px"><span>Giảm giá</span></span>
                            <span class="session-time sale"
                                  style="width: 100%; max-width: 210px; min-width: 85px;"><span>0 VNĐ</span></span>
                        </div>
                        <div id="line" class="line-3" style="margin: 25px 3px 25px 1px; min-width: 233px"></div>
                        <div style="display: flex; margin-top: 15px;">
                            <span class="session-quality"
                                  style="min-width: 140px; margin-right: 8px; border-width: 3px; border-style: double"><span>Thanh toán</span></span>
                            <span class="session-time total-pay-final"
                                  style="width: 100%; max-width: 210px; min-width: 85px;"><span>0 VNĐ</span></span>
                        </div>


                    </div>
                </div>
            </div>
            <form action="{{ url('/payment/create_payment') }}" id="create_form" method="post" style="display: none;">

                <div class="form-group">
                    <label for="language">Loại hàng hóa </label>
                    <select name="order_type" id="order_type" class="form-control">
                        {{--<option value="topup">Nạp tiền điệnt thoại</option>--}}
                        <option value="billpayment">Thanh toán hóa đơn</option>
                        {{--<option value="fashion">Thời trang</option>--}}
                        {{--<option value="other">Khác - Xem thêm tại VNPAY</option>--}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="order_id">Mã hóa đơn</label>
                    <input class="form-control" id="order_id" name="order_id" type="text" value="ssss"/>
                </div>
                <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" id="amount"
                           name="amount" type="number" value="10000"/>
                </div>
                <div class="form-group">
                    <label for="order_desc">Nội dung thanh toán</label>
                    <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Thanh toán vé xem phim tại Ledahlia.vn</textarea>
                </div>
                <div class="form-group">
                    <label for="bank_code">Ngân hàng</label>
                    <select name="bank_code" id="bank_code" class="form-control">
                        <option value="">Không chọn</option>
                        {{--<option value="NCB"> Ngan hang NCB</option>--}}
                        {{--<option value="AGRIBANK"> Ngan hang Agribank</option>--}}
                        {{--<option value="SCB"> Ngan hang SCB</option>--}}
                        {{--<option value="SACOMBANK">Ngan hang SacomBank</option>--}}
                        {{--<option value="EXIMBANK"> Ngan hang EximBank</option>--}}
                        {{--<option value="MSBANK"> Ngan hang MSBANK</option>--}}
                        {{--<option value="NAMABANK"> Ngan hang NamABank</option>--}}
                        {{--<option value="VNMART"> Vi dien tu VnMart</option>--}}
                        {{--<option value="VIETINBANK">Ngan hang Vietinbank</option>--}}
                        {{--<option value="VIETCOMBANK"> Ngan hang VCB</option>--}}
                        {{--<option value="HDBANK">Ngan hang HDBank</option>--}}
                        {{--<option value="DONGABANK"> Ngan hang Dong A</option>--}}
                        {{--<option value="TPBANK"> Ngân hàng TPBank</option>--}}
                        {{--<option value="OJB"> Ngân hàng OceanBank</option>--}}
                        {{--<option value="BIDV"> Ngân hàng BIDV</option>--}}
                        {{--<option value="TECHCOMBANK"> Ngân hàng Techcombank</option>--}}
                        {{--<option value="VPBANK"> Ngan hang VPBank</option>--}}
                        {{--<option value="MBBANK"> Ngan hang MBBank</option>--}}
                        {{--<option value="ACB"> Ngan hang ACB</option>--}}
                        {{--<option value="OCB"> Ngan hang OCB</option>--}}
                        {{--<option value="IVB"> Ngan hang IVB</option>--}}
                        {{--<option value="VISA"> Thanh toan qua VISA/MASTER</option>--}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="language">Ngôn ngữ</label>
                    <select name="language" id="language" class="form-control">
                        <option value="vn">Tiếng Việt</option>
                        {{--<option value="en">English</option>--}}
                    </select>
                </div>

                {{--<button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Popup</button>--}}
                <button type="submit" class="btn btn-default">Thanh toán Redirect</button>

            </form>

            <div class="submit-3">
                <button class="btn btn-ghost" id="back-3" style="margin-right: 2px">Quay lại</button>
                <button class="btn btn-ghost" id="next-3">Xác nhận</button>
            </div>
        </div>
    </section>

    <!..................................................................................>
    <section style="margin-top: 80px; padding-top: 75px; padding-bottom: 75px; border-width: 1px 0px 0px 0px"
             class="fw-main-row ">
        <div class="fw-container">
            <div class="fw-row">

                <div style="padding: 0 15px 0 15px; margin: auto" class="fw-col-xs-12 ">
                    <header>
                        <h3 class="center  no-underline " style="color: #4a4a4a">
                            Cần giúp đỡ ? Hãy liên hệ với chúng tôi </h3>
                    </header>
                    <aside style="color: #82242A; font-size: 46px">
                        <p style="text-align: center;">0942929990</p></aside>
                </div>
            </div>

        </div>
    </section>
    </div>


    <footer class="footer">

        <div class="footer-middle" style="border-top: 1px solid #444">

            <div class="column column1">
                <div class="footer-column pull-left">
                    <div style="float: right;">
                        <p>HỖ TRỢ MUA HÀNG</p>
                        <ul class="links">
                            <li class="first"><span>Hotline: 0942929990</span></li>
                            <li><span>Email: contact@ledahlia.vn</span></li>
                            <li><span><a href="/FAQ/huong-dan-mua-hang">Hướng dẫn mua hàng</a></span></li>
                            <li><span><a href="/FAQ/phuong-thuc-thanh-toan">Phương thức thanh toán</a></span></li>
                            <li><span><a href="/FAQ/cau-hoi-thuong-gap">Câu hỏi thường gặp</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="column column2">
                <div class="footer-column pull-left">
                    <p style="letter-spacing: 2.3px">VỀ CHÚNG TÔI</p>
                    <ul class="links">
                        <li><span><a href="/FAQ/gioi-thieu">Giới thiệu Ledahlia</a></span></li>
                        <li><span><a href="/blog/post/35802">Tuyển dụng</a></span></li>
                        <li><span><a href="/contact-us">Liên hệ quảng cáo</a></span></li>
                        <li><span><a href="/FAQ/chinh-sach-bao-mat">Chính sách bảo mật</a></span></li>
                        <li><span><a href="/FAQ/quy-dinh-su-dung">Quy định sử dụng</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="column column3">
                <div class="footer-column pull-left">
                    <p style="letter-spacing: 1px">THÔNG TIN CÁ NHÂN</p>
                    <ul class="links">
                        <!-- <li><span><a href="#">Đăng nhập</a></span></li>
                        <li><span><a href="#">Quản lý tài khoản</a></span></li>
                        <li><span ><a href="#">Lịch sử mua hàng</a></span></li> -->
                        <li><span><a href="/FAQ/nang-hang-thanh-vien">Nâng hạng thành viên</a></span></li>
                        <li><span><a href="/blog?page=1&search=&tag=khuyến%20mại">Khuyến mãi</a></span></li>
                        <div style="height: 110" id="space"></div>
                    </ul>
                </div>
            </div>
            <div class="column column4" style="padding-top: 20px">
                <div class="social">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/LeDahliaCoffee/&amp;tabs=timeline&amp;width=400&amp;height=250&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId"
                            width="400" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowtransparency="true">

                    </iframe>
                </div>
            </div>

        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row" style="padding: 0px 10px">
                    <div class="col-xs-12 col-sm-6">
                        <div class="logo-footer">
                            <div style="width: 100%; text-align: center">
                                <a href="/">
                                    <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525421236EE6Two3Gmcm7zec.png"
                                         alt="Ledahlia" style="width: 300px">
                                </a>
                            </div>
                            <div class="announced">
                                <a href="#">
                                    <img src="http://online.gov.vn/PublicImages/2015/08/27/11/20150827110756-dathongbao.png"
                                         alt="logo-footer">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="about">
                            <p style="color: #fff; font-size: 27px; font-weight: 1000; letter-spacing: 3; margin-bottom: 30px">
                                CÔNG TY CỔ PHẦN ZGROUP</p>
                            <p style="max-width: 425px">Giấy CNĐKDN: 0107402262, đăng ký lần đầu ngày 20/04/2016, đăng
                                ký thay đổi lần thứ 2 ngày
                                12/06/2018, cấp bởi Sở KHĐT thành phố Hà Nội</p>
                            <p>Địa chỉ: 106 Yết Kiêu, Phường Nguyễn Du, Quận Hai Bà Trừng, Hà Nội</p>
                            <p style="margin-bottom: 0px">COPYRIGHT 2018 ZGROUP JOINT STOCK COMPANY</p>
                            <p>ALL RIGHTS RESERVED</p>
                            <a href="#" style="display: none">
                                <img src="http://online.gov.vn/PublicImages/2015/08/27/11/20150827110756-dathongbao.png"
                                     alt="logo-footer" style="width: 150px; margin-top: -20px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="ant-spin ant-spin-lg ant-spin-spinning sc-dxgOiQ gCUkXE"><span
                class="ant-spin-dot ant-spin-dot-spin"><i></i><i></i><i></i><i></i></span></div>

    <div class="modal" id="myModal">
        <div class="modal-backdrop in" style="height: 100%"></div>
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 20px">
                <div class="modal-header" style="border-bottom: 0px">
                    <h4 class="modal-title" style="color: red">Thanh toán thất bại</h4>
                </div>
                <div class="modal-body tagcloud">
                    <p>Trong các ghế bạn chọn, ghế <span class="session-quality"><span>B5</span></span> vừa có người
                        mua.</p>
                    <p>Xin bạn vui lòng chọn lại ghế !</p>
                </div>
                <div class="modal-footer" style="border-top: 0px">
                    <button type="button" class="btn btn-danger btn-link" id="close" style="color: red; padding: 0px">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    </body>


    <script src="/js/filmzgroup-homepage.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('[value = "pay-1"]').prop("checked", true);

            var data = [];

            $.ajax({

                url: "http://ledahlia.vn/api/v3/sessions?session_id={{$session->id}}",

                type: "get",

                data: {},

                success: function (sessions) {
                    // console.log(sesions.sesions[0ư.seats);
                    data = sessions.sessions[0].seats;
                    if (data.length < 4) {
                        var svg_1 = d3.select("#seat-types-less-than-4 .svg-1").append("svg").attr("viewBox", " -29 -10 800 80")
                        var svg_2 = svg_1.selectAll("g")
                            .data(data)
                            .enter()
                            .append("g")
                            .attr('transform', function (d, index) {
                                return 'translate(' + (260 * (index) + 20) + ',' + 20 + ')';
                            });
                        svg_2.append("circle").attr('r', 20)
                            .attr('stroke', function (d) {
                                return d.color
                            })
                            .attr('stroke-width', 3)
                            .style('fill', 'white')
                        svg_2.append("text")
                            .attr('fill', function (d) {
                                return d.color
                            })
                            .attr('text-anchor', 'middle')
                            .attr('alignment-baseline', 'central')
                            .attr("font-size", 18)
                            .attr("font-family", "sans-serif")
                            .style('font-weight', 'bold')
                            .text(function (d) {
                                return d.price / 1000
                            });
                        var svg_3 = svg_1.selectAll("g1")
                            .data(data)
                            .enter()
                            .append("g")
                            .attr('transform', function (d, index) {
                                return 'translate(' + (260 * (index) + 50) + ',' + 20 + ')';
                            });
                        svg_3.append("text")
                            .attr('fill', '#82242A')
                            .attr('alignment-baseline', 'central')
                            .attr("font-size", 18)
                            .attr("font-family", "Roboto Condensed, latin-ext")
                            .style('letter-spacing', '2')
                            .style('font-weight', 'bold')
                            .text(function (d) {
                                return d.type
                            });
                    }
                    else {
                        $("#seat-types-less-than-4").css("display", "none");
                        $("#seat-types-more-than-3").css("display", "flex");
                        var svg_1 = d3.select("#seat-types-more-than-3 .svg-1").append("svg").attr("viewBox", function () {
                            return "-27.5 -2 " + 270 + " " + 27.5 * sessions.sessions[0].seats.length
                        })
                        var svg_2 = svg_1.selectAll("g")
                            .data(data)
                            .enter()
                            .append("g")
                            .attr('transform', function (d, index) {
                                return 'translate(' + 10 + ',' + (27.5 * (index) + 10) + ')';
                            });
                        svg_2.append("circle").attr('r', 10)
                            .attr('stroke', function (d) {
                                return d.color
                            })
                            .attr('stroke-width', 1.5)
                            .style('fill', 'white')
                        svg_2.append("text")
                            .attr('fill', function (d) {
                                return d.color
                            })
                            .attr('text-anchor', 'middle')
                            .attr('alignment-baseline', 'central')
                            .attr("font-size", 9)
                            .attr("font-family", "sans-serif")
                            .style('font-weight', 'bold')
                            .text(function (d) {
                                return d.price / 1000
                            });
                        var svg_3 = svg_1.selectAll("g1")
                            .data(data)
                            .enter()
                            .append("g")
                            .attr('transform', function (d, index) {
                                return 'translate(' + 25 + ',' + (27.5 * (index) + 10) + ')';
                            });
                        svg_3.append("text")
                            .attr('fill', '#82242A')
                            .attr('alignment-baseline', 'central')
                            .attr("font-size", 9)
                            .attr("font-family", "Roboto Condensed, latin-ext")
                            .style('font-weight', 'bold')
                            .text(function (d) {
                                return d.type
                            });
                    }
                },
                error: function (error) {
                    alert("Đường truyển Internet bị lỗi. Xin bạn vui lòng reload lại trang web !");
                }
            })
        })

        var count = 0;


        $("#next-1").click(function user() {

            count++;

            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (($('#id-2').val().length === 0 && $('#id-3').val().length === 0) || (!filter.test($('[name="user-email"]').val()) && $('#id-2').val().length !== 0)) {

                count = 0;

                if ($('#id-2').val().length === 0 && $('#id-3').val().length === 0) {

                    $("#id-3").parents().children(".infor-error").css('display', 'flex');

                    $("#id-2").parents().children(".infor-error").css('display', 'none');

                    $('[name="user-email"]').focus();

                }

                else if (!filter.test($('[name="user-email"]').val()) && $('#id-2').val().length !== 0) {

                    $("#id-2").parents().children(".infor-error").css('display', 'flex');

                    $("#id-3").parents().children(".infor-error").css('display', 'none');

                    $('[name="user-email"]').focus();

                    return false;
                }

            }

            else {

                if (count == 1) {

                    $("#id-2").parents().children(".infor-error").css('display', 'none');

                    $("#id-3").parents().children(".infor-error").css('display', 'none');

                    $(".ant-spin-spinning").css('display', 'block');

                    $.ajax({

                        url: "http://ledahlia.vn/api/v3/user",

                        type: "post",

                        data: {

                            name: $('[name="user-name"]').val(),

                            email: $('[name="user-email"]').val(),

                            phone: $('[name="user-phone"]').val(),

                        },

                        success: function (user) {

                            console.log("user", user);

                            if (user.status !== 0) {

                                var data = [];
                                var filmSessionRegisterId = 0;
                                var total_pay = 0;
                                var correct_code = "";
                                var correct_code_value = 0;

                                $.ajax({

                                    url: "http://ledahlia.vn/api/v3/film-session-register",

                                    type: "post",

                                    data: {

                                        user_id: user.data.user.id,

                                        film_session_id: "{{$session->id}}",

                                    },

                                    success: function (filmSessionRegister) {
                                        // console.log("film_session_register",filmSessionRegister);
                                        // console.log("filmSessionRegister.data.id",filmSessionRegister.data.id);
                                        // console.log("filmSessionRegisterId",filmSessionRegisterId);
                                        filmSessionRegisterId = filmSessionRegister.data.id;
                                        console.log(filmSessionRegisterId);
                                        $.ajax({

                                            url: "http://ledahlia.vn/api/v3/film-session-register/" + filmSessionRegisterId + "/seat",

                                            type: "get",

                                            success:

                                                function (e) {

                                                    $(".ant-spin-spinning").css('display', 'none');
                                                    $("#clock").css("visibility", "visible");

                                                    function getTimeRemaining(endtime) {
                                                        var t = Date.parse(endtime) - Date.parse(new Date());
                                                        var seconds = Math.floor((t / 1000) % 60);
                                                        var minutes = Math.floor((t / 1000 / 60) % 5);
                                                        return {
                                                            'minutes': minutes,
                                                            'seconds': seconds
                                                        };
                                                    }

                                                    function initializeClock(id, endtime) {
                                                        var clock = document.getElementById(id);
                                                        var minutesSpan = clock.querySelector('.minutes');
                                                        var secondsSpan = clock.querySelector('.seconds');

                                                        function updateClock() {
                                                            if (Date.parse(deadline) >= Date.parse(new Date())) {
                                                                var t = getTimeRemaining(endtime);
                                                                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                                                                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
                                                                if (t.total <= 0) {
                                                                    clearInterval(timeinterval);
                                                                }
                                                            } else {
                                                                window.open("http://ledahlia.vn/session/{{$session->id}}/time-out", "_self")
                                                            }
                                                        }

                                                        updateClock();
                                                        var timeinterval = setInterval(updateClock, 1000);
                                                    }

                                                    var deadline = new Date(Date.parse(new Date()) + 5 * 60 * 1000);
                                                    initializeClock('clockdiv', deadline);

                                                    var status0 = 0;
                                                    var data = e.seats;
                                                    width = e.width;
                                                    height = e.height;

                                                    d3.select("#svg-seats")
                                                        .selectAll("a")
                                                        .data(data)
                                                        .enter()
                                                        .append("a")
                                                        .text(function (d) {
                                                            return d.name
                                                        })

                                                    d3.select("#svg-no-seat")
                                                        .append("a")
                                                        .style('width', '100%')
                                                        .text("Mời bạn chọn ghế")

                                                    var svg = d3.select(".svg")
                                                        .append("svg")
                                                        .attr("viewBox", "0 0 " + width + " " + height)

                                                    var g = svg.selectAll("g")
                                                        .data(data)
                                                        .enter()
                                                        .append("g")
                                                        .attr('transform', function (d) {
                                                            return 'translate(' + d.x + ',' + d.y + ')';
                                                        });
                                                    g.append("circle").attr('r', function (d) {
                                                        return 6.25 * d.r
                                                    })
                                                        .attr('class', 'circle')
                                                        .attr('stroke-width', function (d) {
                                                            return 0.9 * d.r
                                                        })
                                                        .attr('stroke', function (d) {
                                                            if (d.status == 0) {
                                                                if (d.trigger_status == 0) {
                                                                    return d.color
                                                                }
                                                                else if (d.trigger_status == 1) {
                                                                    return "gray"
                                                                }
                                                            }
                                                            else if (d.status == 2) {
                                                                return "#4caf50"
                                                            }
                                                            else if (d.status == 3) {
                                                                return "black"
                                                            }
                                                        })
                                                        .style('fill', function (d) {
                                                            if (d.status == 0) {
                                                                if (d.trigger_status == 0) {
                                                                    return "white"
                                                                }
                                                                else if (d.trigger_status == 1) {
                                                                    return "gray"
                                                                }
                                                            }
                                                            else if (d.status == 2) {
                                                                return "#4caf50"
                                                            }
                                                            else if (d.status == 3) {
                                                                return "black"
                                                            }
                                                        });

                                                    g.append("text")
                                                        .attr('text-anchor', 'middle')
                                                        .attr('alignment-baseline', 'central')
                                                        .attr("font-size", function (d) {
                                                            return 6 * d.r
                                                        })
                                                        .attr("font-family", "sans-serif")
                                                        .style('font-weight', 'bold')
                                                        .text(function (d) {
                                                            return d.name
                                                        })
                                                        .attr('fill', function (d) {
                                                            if (d.status == 0) {
                                                                if (d.trigger_status == 0) {
                                                                    return d.color
                                                                }
                                                                else if (d.trigger_status == 1) {
                                                                    return "white"
                                                                }
                                                            }
                                                            else if (d.status == 2) {
                                                                return "white"
                                                            }
                                                            else if (d.status == 3) {
                                                                return "white"
                                                            }
                                                        });

                                                    function render(dataset) {
                                                        var svg_render = d3.select('svg')
                                                            .selectAll('g')
                                                            .data(dataset)
                                                            .style('cursor', function (d) {
                                                                return (d.status == 2 || d.status == 3) ? "not-allowed" : "pointer"
                                                            })
                                                            .on('click', function (d) {

                                                                if (d.status == 0 || d.status == 1) {

                                                                    $(".ant-spin-spinning").css('display', 'block');

                                                                    $.ajax({

                                                                        url: "http://ledahlia.vn/api/v3/session/{{$session->id}}/seat/" + d.id,

                                                                        type: "get",

                                                                        success: function (success) {

                                                                            if (success.status == 0) {

                                                                                $.ajax({

                                                                                    url: "http://ledahlia.vn/api/v3/film-session-register/seat/trigger",

                                                                                    type: "post",

                                                                                    data: {

                                                                                        seat_id: d.id,

                                                                                        film_session_register_id: filmSessionRegister.data.id,

                                                                                    },

                                                                                    success: function (filmSessionRegisterTrigger) {
                                                                                        $(".ant-spin-spinning").css('display', 'none');
                                                                                        // console.log(filmSessionRegisterTrigger)
                                                                                    },

                                                                                    error:

                                                                                        function (error) {
                                                                                            alert("Đường truyển Internet bị lỗi. Xin bạn vui lòng reload lại trang và đặt lại ghế !");
                                                                                            // location.reload()
                                                                                        }

                                                                                });

                                                                            } else {
                                                                                alert("Ghế này vừa có người chọn !");
                                                                                d.status = success.status;
                                                                                d.trigger_status = 0;
                                                                                $(".ant-spin-spinning").css('display', 'none');
                                                                                render(data);
                                                                            }

                                                                        },

                                                                        error:

                                                                            function (error) {
                                                                                alert("Đường truyển Internet bị lỗi. Xin bạn vui lòng reload lại trang và đặt lại ghế !");
                                                                                // location.reload()
                                                                            }

                                                                    })

                                                                    if (d.trigger_status == 0) {
                                                                        d.trigger_status = 1
                                                                    } else {
                                                                        d.trigger_status = 0
                                                                    }

                                                                    render(data);

                                                                }
                                                                ;
                                                                // console.log(d);
                                                                // console.log(filmSessionRegisterId);
                                                            })

                                                        svg_render.select("circle")
                                                            .attr('stroke', function (d) {
                                                                if (d.status == 0) {
                                                                    if (d.trigger_status == 0) {
                                                                        return d.color
                                                                    }
                                                                    else if (d.trigger_status == 1) {
                                                                        return "gray"
                                                                    }
                                                                }
                                                                else if (d.status == 2) {
                                                                    return "#4caf50"
                                                                }
                                                                else if (d.status == 3) {
                                                                    return "black"
                                                                }
                                                            })
                                                            .style('fill', function (d) {
                                                                if (d.status == 0) {
                                                                    if (d.trigger_status == 0) {
                                                                        return "white"
                                                                    }
                                                                    else if (d.trigger_status == 1) {
                                                                        return "gray"
                                                                    }
                                                                }
                                                                else if (d.status == 2) {
                                                                    return "#4caf50"
                                                                }
                                                                else if (d.status == 3) {
                                                                    return "black"
                                                                }
                                                            });

                                                        svg_render.select("text")
                                                            .style('fill', function (d) {
                                                                if (d.status == 0) {
                                                                    if (d.trigger_status == 0) {
                                                                        return d.color
                                                                    }
                                                                    else if (d.trigger_status == 1) {
                                                                        return "white"
                                                                    }
                                                                }
                                                                else if (d.status == 2) {
                                                                    return "white"
                                                                }
                                                                else if (d.status == 3) {
                                                                    return "white"
                                                                }
                                                            });

                                                        d3.select("#svg-no-seat")
                                                        // .select("a")
                                                            .data(dataset)
                                                            .style('display', function () {
                                                                newdata = data.filter(da => da.trigger_status === 1);
                                                                if (newdata.length === 0) {
                                                                    return "block"
                                                                } else {
                                                                    return "none"
                                                                }
                                                            })

                                                        d3.select("#svg-seats")
                                                            .selectAll("a")
                                                            .data(dataset)
                                                            .style('display', function (d) {
                                                                return d.trigger_status === 1 ? "inline-block" : "none"
                                                            })
                                                        var svg2 = d3.selectAll(".total-pay span")
                                                            .text(function (d) {
                                                                newdata = data.filter(da => da.trigger_status === 1);
                                                                var data_select = [];
                                                                let sum = 0;
                                                                for (i = 0; i < newdata.length; i++) {
                                                                    data_select[i] = parseInt(newdata[i].price);
                                                                    sum = sum + data_select[i];
                                                                }
                                                                ;
                                                                total_pay = sum;
                                                                return sum / 1000 + ".000 VNĐ";
                                                            })
                                                        var svg3 = d3.selectAll(".total-seats span")
                                                            .text(function () {
                                                                newdata = data.filter(da => da.trigger_status === 1);
                                                                return newdata.length;
                                                            })
                                                        var svg4 = d3.select(".modal-body .session-quality span")
                                                            .text(function () {
                                                                newdata = data.filter(da => da.trigger_status === 1);
                                                                return "A" + newdata.length;
                                                            })

                                                    };
                                                    render(data);
                                                    $('#btn2').prop("checked", true);
                                                    $("#section-1 .fw-container").css("display", "none");
                                                    $("#section-2 .fw-container").css("display", "block");
                                                    $("#section-1").css("transform", "translateX(-110%)");
                                                    $("#section-1").css("-moz-transform", "translateX(-100%)");
                                                    $("#section-1").css("-ms-transform", "translateX(-100%)");
                                                    $("#section-1").css("-webkit-transform", "translateX(-100%)");
                                                    $("#section-2").css("transform", "translateX(0)");
                                                    $("#section-2").css("-moz-transform", "translateX(0)");
                                                    $("#section-2").css("-ms-transform", "translateX(0)");
                                                    $("#section-2").css("-webkit-transform", "translateX(0)");
                                                    window.scrollTo(0, $("#content_hero").height());

                                                    $('button#next-2').click(function () {

                                                        if ($(".total-seats").text() > 0) {

                                                            $('#btn3').prop("checked", true);
                                                            $("#section-2 .fw-container").css("display", "none");
                                                            $("#section-3 .fw-container").css("display", "block");
                                                            $("#section-2").css("transform", "translateX(-100%)");
                                                            $("#section-2").css("-moz-transform", "translateX(-100%)");
                                                            $("#section-2").css("-ms-transform", "translateX(-100%)");
                                                            $("#section-2").css("-webkit-transform", "translateX(-100%)");
                                                            $("#section-3").css("transform", "translateX(0)");
                                                            $("#section-3").css("-moz-transform", "translateX(0)");
                                                            $("#section-3").css("-ms-transform", "translateX(0)");
                                                            $("#section-3").css("-webkit-transform", "translateX(0)");
                                                            window.scrollTo(0, $("#content_hero").height());
                                                            d3.select(".total-pay-final span").text(total_pay / 1000 + ".000 VNĐ");

                                                            $("#code").keyup(function(){ 
                                                                if($("#code").val().length === 0){
                                                                    $(".code-input button").css("display", "none") 
                                                                } else {
                                                                    $(".code-input button").css("display", "block")
                                                                }
                                                            })
                                                            
                                                            $("#code").bind("paste", function(e){ 
                                                                
                                                                $(".code-input button").css("display", "block");

                                                            })

                                                            $("#code").focusout();

                                                            $(".code-input button").click(function(e){ $("#code").focusout() })

                                                            $("#code").focusout(function(e){ 

                                                                e.preventDefault();

                                                                $(".ant-spin-spinning").css('display', 'block');

                                                                $.ajax({

                                                                    url: "http://ledahlia.vn/api/v3/code/" + $("#code").val(),

                                                                    type: "get",

                                                                    success:

                                                                        function (code) {
                                                                            $(".ant-spin-spinning").css('display', 'none');

                                                                            function addDays(date, days) {
                                                                                var one_day = 1000 * 60 * 60 * 24;
                                                                                return new Date(date.getTime() + (days * one_day));
                                                                            }

                                                                            if ((new Date() < new Date(code.start_date)) || (new Date() > addDays(new Date(code.end_date), 1)) || code.status === 1) {

                                                                                correct_code = "";
                                                                                correct_code_value = 0;

                                                                                alert("Mã giảm giá của bạn không còn hiệu lực !")

                                                                            } else {

                                                                                correct_code = $("#code").val();

                                                                                correct_code_value = Number(code.value);

                                                                                d3.select(".session-time.sale span").text(Number(code.value) / 1000 + ".000 VNĐ");

                                                                                if (correct_code_value < total_pay) {

                                                                                    d3.select(".total-pay-final span").text((total_pay - Number(code.value)) / 1000 + ".000 VNĐ");

                                                                                } else {

                                                                                    d3.select(".total-pay-final span").text("0.000 VNĐ");

                                                                                }

                                                                            }
                                                                        },

                                                                    error:

                                                                        function (error) {
                                                                            $(".ant-spin-spinning").css('display', 'none');
                                                                        []

                                                                            correct_code = "";
                                                                            correct_code_value = 0;

                                                                            d3.select(".session-time.sale span").text("0 VNĐ");

                                                                            d3.select(".total-pay-final span").text(total_pay / 1000 + ".000 VNĐ");
                                                                        }
                                                                });

                                                            })
                                                        }
                                                        else {
                                                            alert("Bạn chưa chọn ghế nào ! ")
                                                        }
                                                    })


                                                    $("#close").click(function () {

                                                        $(".ant-spin-spinning").css('display', 'block');

                                                        $("#myModal").css("display", "none");
                                                        $("#myModal").removeClass("in");
                                                        $(".modal-dialog").removeClass("in");

                                                        $.ajax({

                                                            url: "http://ledahlia.vn/api/v3/film-session-register/" + filmSessionRegisterId + "/seat",

                                                            type: "get",

                                                            success:

                                                                function (f) {
                                                                    data = f.seats;
                                                                    console.log(data);
                                                                    render(data);

                                                                    $(".ant-spin-spinning").css('display', 'none');
                                                                    $('#btn2').prop("checked", true);
                                                                    $("#section-3 .fw-container").css("display", "none");
                                                                    $("#section-2 .fw-container").css("display", "block");
                                                                    $("#section-3").css("transform", "translateX(-100%)");
                                                                    $("#section-3").css("-moz-transform", "translateX(-100%)");
                                                                    $("#section-3").css("-ms-transform", "translateX(-100%)");
                                                                    $("#section-3").css("-webkit-transform", "translateX(-100%)");
                                                                    $("#section-2").css("transform", "translateX(0)");
                                                                    $("#section-2").css("-moz-transform", "translateX(0)");
                                                                    $("#section-2").css("-ms-transform", "translateX(0)");
                                                                    $("#section-2").css("-webkit-transform", "translateX(0)");
                                                                    window.scrollTo(0, $("#content_hero").height());

                                                                },

                                                            error:

                                                                function (error) {
                                                                    alert("Đường truyển Internet bị lỗi. Xin bạn vui lòng reload lại trang và đặt lại ghế !");
                                                                    // location.reload()
                                                                }

                                                        })
                                                    })

                                                },
                                        });
                                    },

                                    error:

                                        function (error) {
                                            alert("Đường truyển Internet bị lỗi. Xin bạn vui lòng reload lại trang và đặt lại ghế !");
                                            location.reload()
                                        }

                                });

                                $('button#next-3').click(function () {

                                    alert("Bạn xác nhận mua vé ?");

                                    if ($('.form-check-input').is(':checked')) {

                                        if ($('[value = "pay-1"]').is(':checked')) {

                                            $(".ant-spin-spinning").css('display', 'block');

                                            $.ajax({

                                                url: "http://ledahlia.vn/api/v3/film-session-register/" + filmSessionRegisterId + "/change",

                                                type: "put",

                                                data: {

                                                    status: 2,
                                                    code: correct_code

                                                },

                                                success: function (e) {

                                                    $(".ant-spin-spinning").css('display', 'none');

                                                    if (e.status == 1) {
                                                        if (total_pay > correct_code_value) {
                                                            window.location.replace("http://ledahlia.vn/payment?register_id=" + filmSessionRegisterId + "&code=" + correct_code);
                                                        } else {

                                                            $(".ant-spin-spinning").css('display', 'block');

                                                            // Chuyển luôn đến trang Response mà ko vào trang VNPAY, và gửi mail về cho khách hàng
                                                            $.ajax({

                                                                url: "http://ledahlia.vn/api/v3/film-session-register/" + filmSessionRegisterId + "/change",

                                                                type: "put",
                                                                data: {
                                                                    status: 2
                                                                },

                                                                success: function (f) {

                                                                        $.ajax({

                                                                            url: "http://ledahlia.vn/api/v3/film-session-register/" + filmSessionRegisterId + "/change",

                                                                            type: "put",
                                                                            data: {
                                                                                status: 3,
                                                                                code: correct_code
                                                                            },
                                                                            success:

                                                                                function (f) {

                                                                                    $.ajax({

                                                                                        url: "http://ledahlia.vn/book_information/" + filmSessionRegisterId,

                                                                                        type: "post",
                                                                                        data: {
                                                                                            code: correct_code,
                                                                                            payment: "online"
                                                                                        },

                                                                                        success:
                                                                                            function (f) {
                                                                                                $(".ant-spin-spinning").css('display', 'none');
                                                                                                alert("Bạn đã mua vé thành công. Vé xem phim đã được gửi về Email đăng ký của bạn. Vui lòng check Email để xem lại thông tin vé !");
                                                                                                window.open("http://ledahlia.vn/", "_self") 
                                                                                            },

                                                                                        error:

                                                                                            function (error) {
                                                                                                $(".ant-spin-spinning").css('display', 'none');
                                                                                                alert("Đường truyển Internet bị lỗi. Xin bạn vui lòng reload lại trang và đặt lại ghế !");
                                                                                                // location.reload()
                                                                                            }

                                                                                    })
                                                                                },

                                                                            error:

                                                                                function (error) {
                                                                                    $(".ant-spin-spinning").css('display', 'none');
                                                                                    alert("Đường truyển Internet bị lỗi. Xin bạn vui lòng reload lại trang và đặt lại ghế !");
                                                                                    // location.reload()
                                                                                }
                                                                        })
                                                                    },


                                                                error:

                                                                    function (error) {
                                                                        $(".ant-spin-spinning").css('display', 'none');
                                                                        alert("Đường truyển Internet bị lỗi. Xin bạn vui lòng reload lại trang và đặt lại ghế !");
                                                                        // location.reload()
                                                                    }

                                                            })


                                                        }
                                                    }

                                                    else if (e.status == 0) {

                                                        d3.select(".modal-body .session-quality span").text(e.message)

                                                        $("#myModal").css("display", "block");
                                                        $("#myModal").addClass("in");
                                                        $(".modal-dialog").addClass("in");

                                                    }
                                                },

                                                error:

                                                    function (error) {
                                                        alert("Đường truyển Internet bị lỗi, quá trình thanh toán thất bại. Xin bạn vui lòng reload lại trang và đặt lại ghế !");
                                                        // location.reload()
                                                    }
                                            })

                                        } else if ($('[value = "pay-2"]').is(':checked')) {
                                            alert("Chúng tôi chưa hỗ trợ thanh toán trực tuyến bằng One Pay Credit Card. Xin bạn vui lòng chọn lại hình thức thanh toán khác !")
                                        } else if ($('[value = "pay-3"]').is(':checked')) {
                                            alert("Chúng tôi chưa hỗ trợ thanh toán trực tuyến bằng Ví điện tử Momo. Xin bạn vui lòng chọn lại hình thức thanh toán khác !")
                                        }

                                    } else {
                                        alert("Bạn chưa chọn phương thức thanh toán !")
                                    }
                                });

                            }

                            else {

                                if (user.message === "Sdt va email khong khop") {
                                    alert("Email hoặc Số điện thoại bạn vừa nhập trùng với 1 người dùng khác !");
                                    // location.reload()
                                    $(".ant-spin-spinning").css('display','none'); count = 0;
                                }
                                else if (user.message === "Chua nhap du ten va sdt") {
                                    alert("Lần đầu mua vé xin bạn vui lòng nhập đầy đủ cả 3 thông tin !");
                                    // location.reload()
                                    $(".ant-spin-spinning").css('display','none'); count = 0;
                                }
                                else if (user.message === "Sdt chua duoc dang ky") {
                                    alert("Lần đầu mua vé xin bạn vui lòng nhập đầy đủ cả 3 thông tin !");
                                    // location.reload()
                                    $(".ant-spin-spinning").css('display','none'); count = 0;
                                }
                                else if (user.message === "Sdt da ton tai") {
                                    alert("Số điện thoại bạn đăng ký trùng với 1 người dùng khác !");
                                    // location.reload()
                                    $(".ant-spin-spinning").css('display','none'); count = 0;
                                }
                                else {
                                    alert("Nhập thông tin thất bại !");
                                    location.reload()
                                }
                            }

                        },

                        error: function (error) {

                            alert("Nhập thông tin thất bại. Xin bạn vui lòng reload lại trang và nhập lại thông tin cá nhân !");
                            location.reload()

                        }
                    });
                }
            }
            ;

        })

        $('button#back-3').click(function () {
            $('#btn2').prop("checked", true);
            $("#section-3 .fw-container").css("display", "none");
            $("#section-2 .fw-container").css("display", "block");
            $("#section-3").css("transform", "translateX(-100%)");
            $("#section-3").css("-moz-transform", "translateX(-100%)");
            $("#section-3").css("-ms-transform", "translateX(-100%)");
            $("#section-3").css("-webkit-transform", "translateX(-100%)");
            $("#section-2").css("transform", "translateX(0)");
            $("#section-2").css("-moz-transform", "translateX(0)");
            $("#section-2").css("-ms-transform", "translateX(0)");
            $("#section-2").css("-webkit-transform", "translateX(0)");
            window.scrollTo(0, $("#content_hero").height());
        })

    </script>

    <script type="text/javascript">

        $('.venobox').venobox({
            autoplay: true
        });

        var methods = (function () {
            // private properties and methods go here
            var c = {
                    bcClass: 'sf-breadcrumb',
                    menuClass: 'sf-js-enabled',
                    anchorClass: 'sf-with-ul',
                    menuArrowClass: 'sf-arrows'
                },
                ios = (function () {
                    var ios = /iPhone|iPad|iPod/i.test(navigator.userAgent);
                    if (ios) {
                        // iOS clicks only bubble as far as body children
                        $(window).load(function () {
                            $('body').children().on('click', $.noop);
                        });
                    }
                    return ios;
                })(),
                wp7 = (function () {
                    var style = document.documentElement.style;
                    return ('behavior' in style && 'fill' in style && /iemobile/i.test(navigator.userAgent));
                })(),

                applyHandlers = function ($menu, o) {
                    var targets = 'li:has(' + o.popUpSelector + ')';
                    if ($.fn.hoverIntent && !o.disableHI) {
                        $menu.hoverIntent(over, out, targets);
                    }
                    else {
                        $menu
                            .on('mouseenter.superfish', targets, over)
                            .on('mouseleave.superfish', targets, out);
                    }
                    var touchevent = 'MSPointerDown.superfish';
                    if (!ios) {
                        touchevent += ' touchend.superfish';
                    }
                    if (wp7) {
                        touchevent += ' mousedown.superfish';
                    }
                    $menu
                        .on('focusin.superfish', 'li', over)
                        .on('focusout.superfish', 'li', out)
                        .on(touchevent, 'a', o, touchHandler);
                },

                getMenu = function ($el) {
                    return $el.closest('.' + c.menuClass);
                },
                getOptions = function ($el) {
                    return getMenu($el).data('sf-options');
                };
        })();
        var t = 0;
        $(".search").click(function () {
            if (t == 0) {
                $(".movie-search").slideDown();
                $(".navbar").css("padding-top", "46px");
                t = 1
            }
            else {
                $(".movie-search").slideUp();
                $(".navbar").css("padding-top", "0px");
                t = 0
            }
        })
        $('.venobox').venobox({
            autoplay: true
        });
    </script>

@endsection
