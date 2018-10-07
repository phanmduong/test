<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Time Out</title>
    <link rel="shortcut icon" href="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525764756TOI3CROQKmr7chO.ico"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/filmzgroup.css" media="all">
    <link rel="stylesheet" id="fw-googleFonts-css"
          href="http://fonts.googleapis.com/css?family=Roboto+Condensed%3A300%2Cregular&amp;subset=latin-ext&amp;ver=4.9.4"
          media="all">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        !function (e) {
            "use strict";
            var o, t, a, i, s, n, c, r, d, l, v, u, b, p, m, f, h, g, k, x, y, w, C, _, P, B, E, O, U, D, M, N, V, z, R,
                X, Y, j, W, $;
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
                        var ne = {DOWN: "touchmousedown", UP: "touchmouseup", MOVE: "touchmousemove"},
                            ce = function (o) {
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
</head>
<style type="text/css" id="venobox">
    .vbox-overlay *, .vbox-overlay *:before, .vbox-overlay *:after {
        -webkit-backface-visibility: hidden;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .vbox-overlay {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-align-items: center;
        align-items: center;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        z-index: 1040;
        -webkit-transform: translateZ(1000px);
        transform: translateZ(1000px);
        transform-style: preserve-3d;
    }

    /* ----- navigation ----- */
    .vbox-title {
        width: 100%;
        height: 40px;
        float: left;
        text-align: center;
        line-height: 28px;
        font-size: 12px;
        padding: 6px 40px;
        overflow: hidden;
        position: fixed;
        display: none;
        left: 0;
        z-index: 1050;
    }

    .vbox-close {
        cursor: pointer;
        position: fixed;
        top: -1px;
        right: 0;
        width: 50px;
        height: 40px;
        padding: 6px;
        display: block;
        background-position: 10px center;
        overflow: hidden;
        font-size: 24px;
        line-height: 1;
        text-align: center;
        z-index: 1050;
    }

    .vbox-num {
        cursor: pointer;
        position: fixed;
        left: 0;
        height: 40px;
        display: block;
        overflow: hidden;
        line-height: 28px;
        font-size: 12px;
        padding: 6px 10px;
        display: none;
        z-index: 1050;
    }

    /* ----- navigation ARROWS ----- */
    .vbox-next, .vbox-prev {
        position: fixed;
        top: 50%;
        margin-top: -15px;
        overflow: hidden;
        cursor: pointer;
        display: block;
        width: 45px;
        height: 45px;
        z-index: 1050;
    }

    .vbox-next span, .vbox-prev span {
        position: relative;
        width: 20px;
        height: 20px;
        border: 2px solid transparent;
        border-top-color: #B6B6B6;
        border-right-color: #B6B6B6;
        text-indent: -100px;
        position: absolute;
        top: 8px;
        display: block;
    }

    .vbox-prev {
        left: 15px;
    }

    .vbox-next {
        right: 15px;
    }

    .vbox-prev span {
        left: 10px;
        -ms-transform: rotate(-135deg);
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg);
    }

    .vbox-next span {
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        right: 10px;
    }

    /* ------- inline window ------ */
    .vbox-inline {
        width: 420px;
        height: 315px;
        height: 70vh;
        padding: 10px;
        background: #fff;
        margin: 0 auto;
        overflow: auto;
        text-align: left;
    }

    /* ------- Video & iFrames window ------ */
    .venoframe {
        max-width: 100%;
        width: 100%;
        border: none;
        width: 100%;
        height: 260px;
        height: 70vh;
    }

    .venoframe.vbvid {
        height: 260px;
    }

    @media (min-width: 768px) {
        .venoframe, .vbox-inline {
            width: 90%;
            height: 360px;
            height: 70vh;
        }

        .venoframe.vbvid {
            width: 640px;
            height: 360px;
        }
    }

    @media (min-width: 992px) {
        .venoframe, .vbox-inline {
            max-width: 1200px;
            width: 80%;
            height: 540px;
            height: 70vh;
        }

        .venoframe.vbvid {
            width: 960px;
            height: 540px;
        }
    }

    /*
    Please do NOT edit this part!
    or at least read this note: http://i.imgur.com/7C0ws9e.gif
    */
    .vbox-open {
        overflow: hidden;
    }

    .vbox-container {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        overflow-x: hidden;
        overflow-y: scroll;
        overflow-scrolling: touch;
        -webkit-overflow-scrolling: touch;
        z-index: 20;
        max-height: 100%;

    }

    .vbox-content {
        text-align: center;
        float: left;
        width: 100%;
        position: relative;
        overflow: hidden;
        padding: 20px 10px;
    }

    .vbox-container img {
        max-width: 100%;
        height: auto;
    }

    .figlio {
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        max-width: 100%;
        text-align: initial;
    }

    img.figlio {
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -o-user-select: none;
        user-select: none;
    }

    .vbox-content.swipe-left {
        margin-left: -200px !important;
    }

    .vbox-content.swipe-right {
        margin-left: 200px !important;
    }

    .animated {
        webkit-transition: margin 300ms ease-out;
        transition: margin 300ms ease-out;
    }

    .animate-in {
        opacity: 1;
    }

    .animate-out {
        opacity: 0;
    }

    /* ---------- preloader ----------
     * SPINKIT
     * http://tobiasahlin.com/spinkit/
    -------------------------------- */
    .sk-double-bounce, .sk-rotating-plane {
        width: 40px;
        height: 40px;
        margin: 40px auto
    }

    .sk-rotating-plane {
        background-color: #333;
        -webkit-backface-visibility: visible;
        -moz-backface-visibility: visible;
        backface-visibility: visible;
        -webkit-animation: sk-rotatePlane 1.2s infinite ease-in-out;
        animation: sk-rotatePlane 1.2s infinite ease-in-out
    }

    @-webkit-keyframes sk-rotatePlane {
        0% {
            -webkit-transform: perspective(120px) rotateX(0) rotateY(0);
            transform: perspective(120px) rotateX(0) rotateY(0)
        }
        50% {
            -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0);
            transform: perspective(120px) rotateX(-180.1deg) rotateY(0)
        }
        100% {
            -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
            transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg)
        }
    }

    @keyframes sk-rotatePlane {
        0% {
            -webkit-transform: perspective(120px) rotateX(0) rotateY(0);
            transform: perspective(120px) rotateX(0) rotateY(0)
        }
        50% {
            -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0);
            transform: perspective(120px) rotateX(-180.1deg) rotateY(0)
        }
        100% {
            -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
            transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg)
        }
    }

    .sk-double-bounce {
        position: relative
    }

    .sk-double-bounce .sk-child {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #333;
        opacity: .6;
        position: absolute;
        top: 0;
        left: 0;
        -webkit-animation: sk-doubleBounce 2s infinite ease-in-out;
        animation: sk-doubleBounce 2s infinite ease-in-out
    }

    .sk-double-bounce .sk-double-bounce2 {
        -webkit-animation-delay: -1s;
        animation-delay: -1s
    }

    @-webkit-keyframes sk-doubleBounce {
        0%, 100% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        50% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @keyframes sk-doubleBounce {
        0%, 100% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        50% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    .sk-wave {
        width: 50px;
        height: 40px;
        text-align: center;
        font-size: 10px;
        margin: 40px auto
    }

    .sk-wave .sk-rect {
        background-color: #333;
        height: 100%;
        width: 4px;
        margin: 0 1px;
        display: inline-block;
        -webkit-animation: sk-waveStretchDelay 1.2s infinite ease-in-out;
        animation: sk-waveStretchDelay 1.2s infinite ease-in-out
    }

    .sk-wave .sk-rect1 {
        -webkit-animation-delay: -1.2s;
        animation-delay: -1.2s
    }

    .sk-wave .sk-rect2 {
        -webkit-animation-delay: -1.1s;
        animation-delay: -1.1s
    }

    .sk-wave .sk-rect3 {
        -webkit-animation-delay: -1s;
        animation-delay: -1s
    }

    .sk-wave .sk-rect4 {
        -webkit-animation-delay: -.9s;
        animation-delay: -.9s
    }

    .sk-wave .sk-rect5 {
        -webkit-animation-delay: -.8s;
        animation-delay: -.8s
    }

    @-webkit-keyframes sk-waveStretchDelay {
        0%, 100%, 40% {
            -webkit-transform: scaleY(.4);
            transform: scaleY(.4)
        }
        20% {
            -webkit-transform: scaleY(1);
            transform: scaleY(1)
        }
    }

    @keyframes sk-waveStretchDelay {
        0%, 100%, 40% {
            -webkit-transform: scaleY(.4);
            transform: scaleY(.4)
        }
        20% {
            -webkit-transform: scaleY(1);
            transform: scaleY(1)
        }
    }

    .sk-three-bounce {
        margin: 40px auto;
        width: 100px;
        text-align: center
    }

    .sk-three-bounce .sk-child {
        width: 16px;
        height: 16px;
        background-color: #333;
        border-radius: 100%;
        margin: 4px;
        display: inline-block;
        -webkit-animation: sk-three-bounce 1.4s ease-in-out 0s infinite both;
        animation: sk-three-bounce 1.4s ease-in-out 0s infinite both
    }

    .sk-cube-grid, .sk-spinner-pulse {
        width: 40px;
        height: 40px;
        margin: 40px auto
    }

    .sk-three-bounce .sk-bounce1 {
        -webkit-animation-delay: -.32s;
        animation-delay: -.32s
    }

    .sk-three-bounce .sk-bounce2 {
        -webkit-animation-delay: -.16s;
        animation-delay: -.16s
    }

    @-webkit-keyframes sk-three-bounce {
        0%, 100%, 80% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        40% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @keyframes sk-three-bounce {
        0%, 100%, 80% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        40% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    .sk-spinner-pulse {
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-pulseScaleOut 1s infinite ease-in-out;
        animation: sk-pulseScaleOut 1s infinite ease-in-out
    }

    @-webkit-keyframes sk-pulseScaleOut {
        0% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 0
        }
    }

    @keyframes sk-pulseScaleOut {
        0% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 0
        }
    }

    .sk-cube-grid .sk-cube {
        width: 33.33%;
        height: 33.33%;
        background-color: #333;
        float: left;
        -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
        animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out
    }

    .sk-cube-grid .sk-cube1 {
        -webkit-animation-delay: .2s;
        animation-delay: .2s
    }

    .sk-cube-grid .sk-cube2 {
        -webkit-animation-delay: .3s;
        animation-delay: .3s
    }

    .sk-cube-grid .sk-cube3 {
        -webkit-animation-delay: .4s;
        animation-delay: .4s
    }

    .sk-cube-grid .sk-cube4 {
        -webkit-animation-delay: .1s;
        animation-delay: .1s
    }

    .sk-cube-grid .sk-cube5 {
        -webkit-animation-delay: .2s;
        animation-delay: .2s
    }

    .sk-cube-grid .sk-cube6 {
        -webkit-animation-delay: .3s;
        animation-delay: .3s
    }

    .sk-cube-grid .sk-cube7 {
        -webkit-animation-delay: 0ms;
        animation-delay: 0ms
    }

    .sk-cube-grid .sk-cube8 {
        -webkit-animation-delay: .1s;
        animation-delay: .1s
    }

    .sk-cube-grid .sk-cube9 {
        -webkit-animation-delay: .2s;
        animation-delay: .2s
    }

    @-webkit-keyframes sk-cubeGridScaleDelay {
        0%, 100%, 70% {
            -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1)
        }
        35% {
            -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1)
        }
    }

    @keyframes sk-cubeGridScaleDelay {
        0%, 100%, 70% {
            -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1)
        }
        35% {
            -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1)
        }
    }

    .sk-wandering-cubes {
        margin: 40px auto;
        width: 40px;
        height: 40px;
        position: relative
    }

    .sk-wandering-cubes .sk-cube {
        background-color: #333;
        width: 10px;
        height: 10px;
        position: absolute;
        top: 0;
        left: 0;
        -webkit-animation: sk-wanderingCube 1.8s ease-in-out -1.8s infinite both;
        animation: sk-wanderingCube 1.8s ease-in-out -1.8s infinite both
    }

    .sk-wandering-cubes .sk-cube2 {
        -webkit-animation-delay: -.9s;
        animation-delay: -.9s
    }

    @-webkit-keyframes sk-wanderingCube {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }
        25% {
            -webkit-transform: translateX(30px) rotate(-90deg) scale(.5);
            transform: translateX(30px) rotate(-90deg) scale(.5)
        }
        50% {
            -webkit-transform: translateX(30px) translateY(30px) rotate(-179deg);
            transform: translateX(30px) translateY(30px) rotate(-179deg)
        }
        50.1% {
            -webkit-transform: translateX(30px) translateY(30px) rotate(-180deg);
            transform: translateX(30px) translateY(30px) rotate(-180deg)
        }
        75% {
            -webkit-transform: translateX(0) translateY(30px) rotate(-270deg) scale(.5);
            transform: translateX(0) translateY(30px) rotate(-270deg) scale(.5)
        }
        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg)
        }
    }

    @keyframes sk-wanderingCube {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }
        25% {
            -webkit-transform: translateX(30px) rotate(-90deg) scale(.5);
            transform: translateX(30px) rotate(-90deg) scale(.5)
        }
        50% {
            -webkit-transform: translateX(30px) translateY(30px) rotate(-179deg);
            transform: translateX(30px) translateY(30px) rotate(-179deg)
        }
        50.1% {
            -webkit-transform: translateX(30px) translateY(30px) rotate(-180deg);
            transform: translateX(30px) translateY(30px) rotate(-180deg)
        }
        75% {
            -webkit-transform: translateX(0) translateY(30px) rotate(-270deg) scale(.5);
            transform: translateX(0) translateY(30px) rotate(-270deg) scale(.5)
        }
        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg)
        }
    }
</style>
<style type="text/css">
    #content_hero .buttons {
        min-width: 266px;
    }

    #hero .carousel-inner .item:before, #content_hero:before {
        position: absolute;
        /*    top: 0;
        */
        right: 0;
        /*    bottom: 0;
        */
        left: 0;
        display: block;
        content: '';
        /*    background-image: -webkit-gradient( linear, right bottom, right top, color-stop(0, rgba(0, 0, 0, 0)), color-stop(1, rgb(0, 0, 0)) );
            background-image: -o-linear-gradient(top, rgb(0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);
            background-image: -moz-linear-gradient(top, rgb(0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);
            background-image: -webkit-linear-gradient(top, rgb(0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);
            background-image: -ms-linear-gradient(top, rgb(0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%);*/
        background-image: linear-gradient(to bottom, rgb(0, 0, 0), rgba(0, 0, 0, 0), rgb(0, 0, 0));
    }

    #content_hero:before {
        height: 100%;
    }

    .timeline_card {
        position: relative;
        background-color: #fff;
        margin-top: 30px;
        padding: 20px;
    }

    .timeline_label {
        position: relative;
        width: 33%;
        float: left;
    }

    .timeline_label:before {
        content: "";
        position: absolute;
        z-index: 1;
        right: 0;
        top: 22px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #fff;
        border: 2px #82242A solid;
    }

    .timeline_info {
        margin-top: 90px;

    }

    .timeline_line {
        position: absolute;
        right: 0;
        left: 0;
        top: 45px;
        border-bottom: 2px #eee solid;
    }

    .timeline_line:before {
        content: "";
        position: absolute;
        height: 2px;
        background-image: linear-gradient(to right, #ffa8b5, #82242A);
    }

    .timeline_input[type=radio] {
        display: none;
    }

    .timeline_input[type=radio]:checked + .timeline_label:before {
        background-color: #82242A;
    }

    .timeline_input[type=radio]:checked:nth-of-type(3) + .timeline_label + .timeline_info + .timeline_line:before {
        width: 100%;
    }

    #clock {
        margin-top: 30px;
        margin-bottom: -40px;
        display: none;
        position: relative;
        z-index: 2;
    }

    #clockdiv {
        margin: auto;
        color: #82242A;
        display: flex;
    }

    #clockdiv div > span {
        padding: 8px 10px;
        margin: 1px;
        border: 1px solid #82242A;
        font-size: 15px;
        border-radius: 3px;
    }

    ul {
        list-style: none;
    }

    li {
        position: relative;
        margin-bottom: 20px;
        text-align: justify;
    }

    .messages .error-msg li:before {
        content: "\f071";
        font-family: FontAwesome;
        position: absolute;
    }

    .messages li li:before {
        top: 47%;
        left: -40px;
        margin-top: -12px
    }

    .btn-default {
        background-image: linear-gradient(to right, #ffa8b5, #82242A) !important;
    }

    .star-rating i {
        color: #ffa8b5;
    }

    h2:after, h3:after, h4:after, h5:after {
        background-image: linear-gradient(to right, #ffa8b5, #82242A) !important;
    }

    .navbar.banner--stick {
        display: none
    }

    @media (max-width: 450px) {
        #content_hero .star-rating {
            margin-left: 108px;
        }
    }

    @media (max-width: 600px) {
        #content_hero .star-rating {
            margin-top: 10px;
        }
    }
</style>
<style type="text/css" id="footer">

    footer .footer-inner {
        margin-bottom: 15px;
    }

    .footer-inner .newsletter-wrap {
        width: 52%;
        display: inline-block;
    }

    .social h4 {
        margin: 6px 0 0px;
    }

    .footer-bottom .company-links li {
        float: left;
    }

    .footer-inner .social {
        width: 45%;
        float: right;
    }

    .footer-bottom .company-links li {
        margin-left: 10px;
    }

    .footer-top {
        padding: 30px 0px 20px;
    }

    .footer-middle .col-md-3:last-child {
        padding-bottom: 0px;
    }

    footer .footer-inner {
        margin-bottom: 10px;
    }

    .footer-bottom .company-links li {
        margin-left: 0;
        float: none;
        margin: 0 10px 5px 0;
    }

    .footer-bottom .company-links ul {
        text-align: center;
    }

    footer .coppyright {
        float: none;
        text-align: center;
        margin-bottom: 8px;
    }

    .footer-column {
        width: 100%;
        margin-bottom: 0px;
        margin-right: 0px;
    }

    .footer-middle .col-md-3 {
        padding-bottom: 0px;
    }

    .footer-middle .col-md-3:last-child {
        padding-right: 0;
        padding-bottom: 0;
    }

    .footer-top {
        padding: 20px 0 15px;
    }

    footer address span {
        float: left;
        margin-right: 8px;
    }

    footer .footer-inner {
        margin-bottom: 10px;
    }

    .footer-bottom .company-links li {
        margin-left: 0;
        float: none;
        margin: 0 10px 5px 0;
    }

    .footer-bottom .company-links ul {
        text-align: center;
    }

    footer .coppyright {
        float: none;
        text-align: center;
        margin-bottom: 8px;
    }

    .footer-column {
        width: 100%;
        margin-bottom: 0px;
        margin-right: 0px;
    }

    .footer-middle .col-md-3 {
        padding-bottom: 0px;
    }

    .email-footer {
        overflow: hidden;
        margin-top: 15px;
        font-size: 12px;
        padding-bottom: 25px;
    }

    .email-footer a {
        font-size: 14px;
        line-height: 35px;
        color: #999;
        font-weight: 300;
        -webkit-font-smoothing: antialiased;
    }

    .phone-footer {
        overflow: hidden;
        font-size: 14px;
        line-height: 35px;
        color: #999;
        margin-bottom: 15px;
        margin-top: 12px;
        font-weight: 300;
        -webkit-font-smoothing: antialiased;
    }

    .coppyright {
        color: #666;
    }

    .footer-bottom .company-links ul {
        padding: 0px;
    }

    .footer-bottom .company-links li {
        display: inline-block;
        margin-left: 20px;
        list-style: none;
        float: right;
    }

    .footer-middle a {
        color: #aaa;
        font-weight: 300;
        -webkit-font-smoothing: antialiased;
    }

    .footer-middle .col-md-3 {
        border-left: 1px solid #444;
        margin: auto;
        padding: 20px 20px;
        overflow: hidden;
    }

    .footer-middle .col-md-3:first-child {
        border-left: 0px solid #e5e5e5;
        padding-left: 15px;

    }

    .footer-middle .col-md-3:last-child {
        padding-right: 0px;
    }

    .footer a:hover {
        text-decoration: none;
    }

    .footer-bottom {
        margin: auto;
        overflow: hidden;
        padding: 20px 0 15px;
        width: 100%;
        font-weight: 500;
        border-top: 1px solid #444;
    }

    .footer-bottom a {
        color: #666;
    }

    .footer-bottom a:hover {
        color: #0ab3a3;
    }

    .footer-bottom a:hover {
        text-decoration: none;
    }

    .contacts-info address {
        border: medium none;
        color: #999;
        display: block;
        font-size: 14px;
        font-style: normal;
        line-height: 1.5em;
        margin: 5px auto 18px;
        padding-bottom: 0px;
        padding-top: 5px;
        text-align: left;
        font-weight: 300;
        -webkit-font-smoothing: antialiased;
    }

    .contacts-info {
        margin-top: 10px;
    }

    .footer-logo {
        text-align: left;
        margin: 10px 0 8px;
    }

    .payment-accept {
        text-align: right;
    }

    .payment-accept img {
        margin: 0px 10px 4px 0px;
        width: 50px;
    }

    .footer-middle p {
        font-weight: 900;
        color: #fff;
        font-size: 18px;
        letter-spacing: 2
    }

    a.buy-theme {
        text-transform: uppercase;
        font-size: 13px;
    }

    .footer-middle ul.links {
        margin: auto;
        padding: 0px;
    }

    .footer-middle .links li {
        list-style: none;
        padding: 10px 0px;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 0px
    }

    .footer-middle .links li a {
        color: #999;
        transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s;
    }

    .footer-middle .links li a:hover {
        color: #0ab3a3;
        text-decoration: none;
    }

    .footer {
        padding-top: 50px !important;
        background: #101010;
        z-index: 1000;
        position: relative;
    }

    .footer-top {
        clear: both;
        overflow: hidden;
        padding: 15px 0;
        border-top: 1px solid #444;
    }

    .footer-inner .newsletter-wrap {
        width: 52%;
        display: inline-block;
        float: left;
    }

    .social h4 {
        margin: 6px 0 5px;
    }

    .footer-inner .social {
        width: 45%;
        float: right;
    }

    .footer-middle .col-md-3 {
        border-left: 0px solid #444;
    }

    .footer .footer-middle .column.column4 .social .item .left {
        text-align: center;
        margin-bottom: 0;
    }

    .footer .footer-middle .column.column4 .social .item .left .icon {
        height: 51px;
        width: 51px;
    }

    .footer .footer-middle .column.column4 .social .item .left .icon i {
        line-height: 55px;
        font-size: 20px;
    }

    .footer .footer-middle .column.column4 .social .item .right {
        text-align: left;
    }

    .footer .footer-middle .column.column4 .social .item .right p {
        font-size: 13px;
    }

    .footer .footer-top {
        padding: 35px 0;
    }

    .footer .footer-middle .column {
        padding: 25px 10px 10px 20px;
    }

    .footer .footer-middle .column.column4 .social .item .left {
        margin-right: 0;
        margin-bottom: 10px;
    }

    .footer .footer-middle .column.column4 .social .item .right {
        text-align: center;
    }

    .footer .footer-middle .column.column4 .social .item .right p {
        font-size: 18px;
    }

    .footer .footer-top .logo-footer {
        padding-left: 0;
    }

    .footer .newsletter-wrap button.subscribe {
        font-size: 15px;
        background: #f9a514;
        border: 1px solid #f9a514;
    }

    .footer .newsletter-wrap button.subscribe:before {
        display: none;
    }

    .footer .footer-middle {
        display: table;
        width: 100%;
    }

    footer ul li a, footer ul li a:active, footer ul li a:visited {
        padding: 0px !important
    }

    .footer .footer-middle .links li a, .footer .footer-middle .links li span {
        color: white;
        font-weight: 500;
        font-size: 14px;
        color: #ccc;
        text-align: initial;
    }

    .footer .footer-middle .links li a:hover {
        color: #ffa8b5
    }

    .footer .footer-middle .column {
        display: table-cell;
        vertical-align: top;
        padding: 20px;
        padding-top: 30px;
        border-right: 1px solid #444;
    }

    .footer .footer-middle .column:first-child {
        border-left: 0px solid #e5e5e5;
    }

    .footer .footer-middle .column.column1 {
        width: 36%;
        padding-right: 60px
    }

    .footer .footer-middle .column.column2 {
        width: 12%;
        min-width: 205px
    }

    .footer .footer-middle .column.column3 {
        width: 12%;
        min-width: 215px;
    }

    .footer .footer-middle .column.column4 {
        width: 40%;
        min-width: 490px;
        vertical-align: middle;
        padding-left: 40px;
    }

    .footer .footer-middle .column.column4 .social {
        width: 100%;
    }

    .footer .footer-middle .column.column4 .social .item {
        width: 100%;
        max-width: 330px;
        display: inline-block;
    }

    .footer .footer-middle .column.column4 .social .item .left {
        display: inline-block;
        vertical-align: middle;
        margin-right: 18px;
    }

    .footer .footer-middle .column.column4 .social .item .left .icon {
        height: 71px;
        width: 71px;
        background: #3b5998;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        display: block;
    }

    .footer .footer-middle .column.column4 .social .item .left .icon i {
        line-height: 75px;
        font-size: 36px;
        color: #fff;
    }

    .footer .footer-middle .column.column4 .social .item .right {
        display: inline-block;
        vertical-align: middle;
        text-align: left;
    }

    .footer .footer-middle .column.column4 .social .item .right p {
        color: #fff;
        font-size: 30px;
        margin: 0;
        font-weight: bold;
    }

    /* line 405, scss/layout/homepage.scss */

    .footer .footer-top {
        padding: 55px 0 30px 0;
    }

    /* line 409, scss/layout/homepage.scss */

    .footer .footer-top .logo-footer img {
        max-width: 100%;
    }

    /* line 414, scss/layout/homepage.scss */

    .footer .footer-top .about h3 {
        color: #fff;
        font-size: 18px;
        margin-top: 13px;
        margin-bottom: 20px;
    }

    /* line 420, scss/layout/homepage.scss */

    .footer .footer-top .about p {
        color: #ccc;
        font-size: 15px;
        font-weight: bold;
        line-height: 2;
        margin-bottom: 35px;
        text-align: justify;

    }

    /* line 427, scss/layout/homepage.scss */

    .footer .footer-bottom a:hover {
        color: #f9a514;
    }

    /* line 431, scss/layout/homepage.scss */

    .footer .footer-bottom .coppyright {
        margin-top: 15px;
    }

    img {
        vertical-align: middle;
    }

    img {
        border: 0;
    }

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
        display: block;
    }

    .newsletter-wrap {
        padding: 20px 0;
        overflow: hidden;
        clear: both;
        border-bottom: 1px solid #444;
    }

    .footer .announced {
        width: 100%;
        text-align: center;
        margin-top: 40px;
        margin-bottom: 50px
    }

    .footer .announced img {
        width: 200px
    }

    @media (max-width: 1500px) {
        .footer .footer-middle .column.column2 ul.links, .footer .footer-middle .column.column3 ul.links {
            padding-left: 0px;
        }

        .footer .footer-middle .column4 {
            padding-left: 4%
        }
    }

    @media (max-width: 1200px) {
        .footer .footer-middle .column.column1 {
            min-width: 215px;
            width: 20%;
            padding-right: 20px
        }

        .footer .footer-middle .column.column2 {
            min-width: 180px
        }
    }

    @media (max-width: 1090px) {
        .footer .footer-middle .column.column1 {
            padding-right: 20px
        }

        .footer .footer-middle .column.column4 {
            min-width: 0px;
            padding-left: 20px
        }
    }

    @media (max-width: 900px) {
        .footer .footer-middle {
            border-right: 1px solid #444;
            width: 99.9%
        }

        .footer .footer-middle .column.column4 .social {
            padding-right: 0px !important
        }

        .footer .footer-middle .column {
            display: inline-block;
            width: 49.98% !important;
            border-width: 0px;
        }

        .footer .footer-middle .column.column3, .footer .footer-middle .column.column4 {
            border-top: 1px solid #444 !important;
        }

        .footer .footer-middle .column.column1, .footer .footer-middle .column.column3 {
            border-left: 1px solid #444 !important;
            border-right: 1px solid #444 !important;
        }

        .footer .footer-middle .column.column1 div {
            float: left !important
        }

        .footer .footer-top {
            width: 99.9%;
            border: 1px solid #444
        }

        .social iframe {
            width: 100%
        }
    }

    @media (max-width: 992px) {
        .footer .container {
            width: 100%;
            padding-left: 4%;
            padding-right: 4%
        }
    }

    @media (max-width: 900px) and (min-width: 768px) {
        .footer .announced img {
            width: 200px
        }
    }

    @media (max-width: 768px) and (min-width: 470px) {
        .footer .logo-footer div {
            width: 400px !important
        }
    }

    @media (max-width: 768px) {
        .footer .about p {
            max-width: 1000px !important
        }

        .footer .footer-top .about a {
            display: block !important
        }

        .footer .announced img {
            display: none
        }
    }

    @media (max-width: 445px) {
        .footer .footer-middle {
            border-right: 0px solid #444;
            width: 99.9%
        }

        .links #space {
            display: none;
        }

        .footer .footer-middle .column {
            display: inline-block;
            width: 99.9% !important;
            border-width: 0px;
            padding: 35px 50px 20px 50px !important
        }

        .footer .footer-middle .column.column1, .footer .footer-middle .column.column4 {
            border: 1px solid #444 !important;
        }

        .footer .footer-middle .column.column4 {
            padding: 20px !important
        }

        .footer .footer-middle .column.column2, .footer .footer-middle .column.column3 {
            border-left: 1px solid #444 !important;
            border-right: 1px solid #444 !important;
        }

        .social iframe {
            width: 100%
        }
    }

</style>
<body>


<!-- Navigation -->
<div class="navbar" role="navigation">
    <!-- Heading -->
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
                        <a href="tel:09429210090">
                            <i class="fa fa-phone"></i> 09429210090 </a>
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
                    style="display: none"><a title="Coffee" href="Coffee.html">Cà phê</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254"
                    style="display: none"><a title="Events" href="Events.thml">Sự kiện</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-210"><a title="Contact us"
                                                                                                      href="/contact-us">Liên
                        hệ</a></li>
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
                <p style="text-align: justify">{{substr($film->summary, 0, $limit_summary) . '...'}}</p>
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

<div id="clock" style="display: flex;">
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
        <input class="timeline_input" name="timeline" type="radio" id="btn1">
        <label class="timeline_label btn1" for="">
            &nbsp;
        </label>

        <input class="timeline_input" name="timeline" type="radio" id="btn2">
        <label class="timeline_label btn2" for="">
            &nbsp;
        </label>

        <input class="timeline_input" name="timeline" type="radio" id="btn3" checked="">
        <label class="timeline_label btn3" for="btn3">
            &nbsp;
        </label>
        <div class="timeline_info container">
            <section style=" padding-top: 0px; padding-bottom: 40px; border-width: 0px 0px 0px 0px"
                     id="section_b628734c43e003310ab6bd7630662c20" class="fw-main-row ">
                <div class="fw-container">
                    <div class="fw-row">

                        <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 page-1">
                            <header>
                                <h2 class="left " style="color: #82242A">
                                    Hết thời gian </h2>
                            </header>
                        </div>
                    </div>

                    <div class="fw-row"><br>
                        <div class="fw-col-xs-12 fw-col-sm-6 order-2" style="padding: 0 15px 0 15px;width: 100%">
                            <div class="form-wrapper fw-contact-form contact-form">
                                <ul class="messages">
                                    <li class="error-msg" style="font-size: 18px">
                                        <ul>
                                            <li><span>Bạn đã đạt giới hạn thời gian đặt vé cho phép. Xin vui lòng đặt vé lại.</span>
                                            </li>
                                            <li><span>Chưa có phim nào trong giỏ hàng.</span>
                                            <li><span><a href="/">Click vào đây</a> để tiếp tục mua hàng.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
        <div class="timeline_line"></div>
    </div>
</div>

<section style=" padding-top: 75px; padding-bottom: 75px; border-width: 1px 0px 0px 0px"
         id="section_b8ac59bb701c67a825f0bd748bd4618b" class="fw-main-row ">
    <div class="fw-container">
        <div class="fw-row">

            <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 ">
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
                        <p style="max-width: 425px">Giấy CNĐKDN: 0107402262, đăng ký lần đầu ngày 20/04/2016, đăng ký
                            thay đổi lần thứ 2 ngày
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
<script>
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


</body>
</html>
