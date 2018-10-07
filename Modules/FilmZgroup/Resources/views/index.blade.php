@extends('filmzgroup::layouts.master')
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Ledahlia Cinema</title>
<meta property="og:url"           content="http://ledahlia.vn/" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Welcome to Ledahlia" />


<?php $f_f = 0; ?>
@foreach($favoriteFilms as $favoriteFilm)
    <?php
    $f_f++;?>
    @if ($f_f == 1) 
    <meta property="og:description"   content="{{$favoriteFilm->summary}}" />
    <meta property="og:image"         content="{{$favoriteFilm->cover_url}}" />
    @endif
@endforeach




<link rel="shortcut icon" href="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525764756TOI3CROQKmr7chO.ico" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/filmzgroup.css" media="all">
<link rel="stylesheet" id="fw-googleFonts-css" href="http://fonts.googleapis.com/css?family=Roboto+Condensed%3A300%2Cregular&amp;subset=latin-ext&amp;ver=4.9.4" media="all">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    !function(e){"use strict";var o,t,a,i,s,n,c,r,d,l,v,u,b,p,m,f,h,g,k,x,y,w,C,_,P,B,E,O,U,D,M,N,V,z,R,X,Y,j,W,$;e.fn.extend({venobox:function(q){var I=this,A={arrowsColor:"#B6B6B6",autoplay:!1,bgcolor:"#fff",border:"0",closeBackground:"#161617",closeColor:"#d2d2d2",framewidth:"",frameheight:"",infinigall:!1,htmlClose:"&times;",htmlNext:"<span>Next</span>",htmlPrev:"<span>Prev</span>",numeratio:!1,numerationBackground:"#161617",numerationColor:"#d2d2d2",numerationPosition:"top",overlayClose:!0,overlayColor:"rgba(23,23,23,0.85)",spinner:"double-bounce",spinColor:"#d2d2d2",titleattr:"title",titleBackground:"#161617",titleColor:"#d2d2d2",titlePosition:"top",cb_pre_open:function(){return!0},cb_post_open:function(){},cb_pre_close:function(){return!0},cb_post_close:function(){},cb_post_resize:function(){},cb_after_nav:function(){},cb_init:function(){}},H=e.extend(A,q);return H.cb_init(I),this.each(function(){function q(){y=O.data("gall"),h=O.data("numeratio"),b=O.data("infinigall"),p=e('.vbox-item[data-gall="'+y+'"]'),w=p.eq(p.index(O)+1),C=p.eq(p.index(O)-1),p.length>1?(U=p.index(O)+1,a.html(U+" / "+p.length)):U=1,h===!0?a.show():a.hide(),""!==x?i.show():i.hide(),w.length||b===!0?(e(".vbox-next").css("display","block"),_=!0):(e(".vbox-next").css("display","none"),_=!1),p.index(O)>0||b===!0?(e(".vbox-prev").css("display","block"),P=!0):(e(".vbox-prev").css("display","none"),P=!1),(P===!0||_===!0)&&(r.on(ne.DOWN,T),r.on(ne.MOVE,Z),r.on(ne.UP,F))}function A(e){return e.length<1?!1:m?!1:(m=!0,g=e.data("overlay")||e.data("overlaycolor"),v=e.data("framewidth"),u=e.data("frameheight"),s=e.data("border"),t=e.data("bgcolor"),d=e.data("href")||e.attr("href"),o=e.data("autoplay"),x=e.attr(e.data("titleattr"))||"",e===C&&r.addClass("animated").addClass("swipe-right"),e===w&&r.addClass("animated").addClass("swipe-left"),void r.animate({opacity:0},500,function(){k.css("background",g),r.removeClass("animated").removeClass("swipe-left").removeClass("swipe-right").css({"margin-left":0,"margin-right":0}),"iframe"==e.data("vbtype")?J():"inline"==e.data("vbtype")?oe():"ajax"==e.data("vbtype")?G():"video"==e.data("vbtype")||"vimeo"==e.data("vbtype")||"youtube"==e.data("vbtype")?K(o):(r.html('<img src="'+d+'">'),te()),O=e,q(),m=!1,H.cb_after_nav(O,U,w,C)}))}function Q(e){27===e.keyCode&&S(),37==e.keyCode&&P===!0&&A(C),39==e.keyCode&&_===!0&&A(w)}function S(){var o=H.cb_pre_close(O,U,w,C);return o===!1?!1:(e("body").off("keydown",Q).removeClass("vbox-open"),O.focus(),void k.animate({opacity:0},500,function(){k.remove(),m=!1,H.cb_post_close()}))}function T(e){r.addClass("animated"),V=R=e.pageY,z=X=e.pageX,D=!0}function Z(e){if(D===!0){X=e.pageX,R=e.pageY,j=X-z,W=R-V;var o=Math.abs(j),t=Math.abs(W);o>t&&100>=o&&(e.preventDefault(),r.css("margin-left",j))}}function F(e){if(D===!0){D=!1;var o=O,t=!1;Y=X-z,0>Y&&_===!0&&(o=w,t=!0),Y>0&&P===!0&&(o=C,t=!0),Math.abs(Y)>=$&&t===!0?A(o):r.css({"margin-left":0,"margin-right":0})}}function G(){e.ajax({url:d,cache:!1}).done(function(e){r.html('<div class="vbox-inline">'+e+"</div>"),te()}).fail(function(){r.html('<div class="vbox-inline"><p>Error retrieving contents, please retry</div>'),ae()})}function J(){r.html('<iframe class="venoframe" src="'+d+'"></iframe>'),ae()}function K(e){var o,t=L(d),a=e?"?rel=0&autoplay=1":"?rel=0",i=a+ee(d);"vimeo"==t.type?o="https://player.vimeo.com/video/":"youtube"==t.type&&(o="https://www.youtube.com/embed/"),r.html('<iframe class="venoframe vbvid" webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder="0" src="'+o+t.id+i+'"></iframe>'),ae()}function L(e){if(e.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/),RegExp.$3.indexOf("youtu")>-1)var o="youtube";else if(RegExp.$3.indexOf("vimeo")>-1)var o="vimeo";return{type:o,id:RegExp.$6}}function ee(e){var o="",t=decodeURIComponent(e),a=t.split("?");if(void 0!==a[1]){var i,s,n=a[1].split("&");for(s=0;s<n.length;s++)i=n[s].split("="),o=o+"&"+i[0]+"="+i[1]}return encodeURI(o)}function oe(){r.html('<div class="vbox-inline">'+e(d).html()+"</div>"),ae()}function te(){N=r.find("img"),N.length?N.each(function(){e(this).one("load",function(){ae()})}):ae()}function ae(){i.html(x),r.find(">:first-child").addClass("figlio").css({width:v,height:u,padding:s,background:t}),e("img.figlio").on("dragstart",function(e){e.preventDefault()}),ie(),r.animate({opacity:"1"},"slow",function(){})}function ie(){var o=r.outerHeight(),t=e(window).height();f=t>o+60?(t-o)/2:"30px",r.css("margin-top",f),r.css("margin-bottom",f),H.cb_post_resize()}if(O=e(this),O.data("venobox"))return!0;I.VBclose=function(){S()},O.addClass("vbox-item"),O.data("framewidth",H.framewidth),O.data("frameheight",H.frameheight),O.data("border",H.border),O.data("bgcolor",H.bgcolor),O.data("numeratio",H.numeratio),O.data("infinigall",H.infinigall),O.data("overlaycolor",H.overlayColor),O.data("titleattr",H.titleattr),O.data("venobox",!0),O.on("click",function(b){b.preventDefault(),O=e(this);var p=H.cb_pre_open(O);if(p===!1)return!1;switch(I.VBnext=function(){A(w)},I.VBprev=function(){A(C)},g=O.data("overlay")||O.data("overlaycolor"),v=O.data("framewidth"),u=O.data("frameheight"),o=O.data("autoplay")||H.autoplay,s=O.data("border"),t=O.data("bgcolor"),_=!1,P=!1,m=!1,d=O.data("href")||O.attr("href"),l=O.data("css")||"",x=O.attr(O.data("titleattr"))||"",B='<div class="vbox-preloader">',H.spinner){case"rotating-plane":B+='<div class="sk-rotating-plane"></div>';break;case"double-bounce":B+='<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div>';break;case"wave":B+='<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>';break;case"wandering-cubes":B+='<div class="sk-wandering-cubes"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div></div>';break;case"spinner-pulse":B+='<div class="sk-spinner sk-spinner-pulse"></div>';break;case"three-bounce":B+='<div class="sk-three-bounce"><div class="sk-child sk-bounce1"></div><div class="sk-child sk-bounce2"></div><div class="sk-child sk-bounce3"></div></div>';break;case"cube-grid":B+='<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>'}return B+="</div>",E='<a class="vbox-next">'+H.htmlNext+'</a><a class="vbox-prev">'+H.htmlPrev+"</a>",M='<div class="vbox-title"></div><div class="vbox-num">0/0</div><div class="vbox-close">'+H.htmlClose+"</div>",n='<div class="vbox-overlay '+l+'" style="background:'+g+'">'+B+'<div class="vbox-container"><div class="vbox-content"></div></div>'+M+E+"</div>",e("body").append(n).addClass("vbox-open"),e(".vbox-preloader .sk-child, .vbox-preloader .sk-rotating-plane, .vbox-preloader .sk-rect, .vbox-preloader .sk-cube, .vbox-preloader .sk-spinner-pulse").css("background-color",H.spinColor),k=e(".vbox-overlay"),c=e(".vbox-container"),r=e(".vbox-content"),a=e(".vbox-num"),i=e(".vbox-title"),i.css(H.titlePosition,"-1px"),i.css({color:H.titleColor,"background-color":H.titleBackground}),e(".vbox-close").css({color:H.closeColor,"background-color":H.closeBackground}),e(".vbox-num").css(H.numerationPosition,"-1px"),e(".vbox-num").css({color:H.numerationColor,"background-color":H.numerationBackground}),e(".vbox-next span, .vbox-prev span").css({"border-top-color":H.arrowsColor,"border-right-color":H.arrowsColor}),r.html(""),r.css("opacity","0"),k.css("opacity","0"),q(),k.animate({opacity:1},250,function(){"iframe"==O.data("vbtype")?J():"inline"==O.data("vbtype")?oe():"ajax"==O.data("vbtype")?G():"video"==O.data("vbtype")||"vimeo"==O.data("vbtype")||"youtube"==O.data("vbtype")?K(o):(r.html('<img src="'+d+'">'),te()),H.cb_post_open(O,U,w,C)}),e("body").keydown(Q),e(".vbox-prev").on("click",function(){A(C)}),e(".vbox-next").on("click",function(){A(w)}),!1});var se=".vbox-overlay";H.overlayClose||(se=".vbox-close"),e(document).on("click",se,function(o){(e(o.target).is(".vbox-overlay")||e(o.target).is(".vbox-content")||e(o.target).is(".vbox-close")||e(o.target).is(".vbox-preloader"))&&S()}),z=0,X=0,Y=0,$=50,D=!1;var ne={DOWN:"touchmousedown",UP:"touchmouseup",MOVE:"touchmousemove"},ce=function(o){var t;switch(o.type){case"mousedown":t=ne.DOWN;break;case"mouseup":t=ne.UP;break;case"mouseout":t=ne.UP;break;case"mousemove":t=ne.MOVE;break;default:return}var a=de(t,o,o.pageX,o.pageY);e(o.target).trigger(a)},re=function(o){var t;switch(o.type){case"touchstart":t=ne.DOWN;break;case"touchend":t=ne.UP;break;case"touchmove":t=ne.MOVE;break;default:return}var a,i=o.originalEvent.touches[0];a=t==ne.UP?de(t,o,null,null):de(t,o,i.pageX,i.pageY),e(o.target).trigger(a)},de=function(o,t,a,i){return e.Event(o,{pageX:a,pageY:i,originalEvent:t})};"ontouchstart"in window?(e(document).on("touchstart",re),e(document).on("touchmove",re),e(document).on("touchend",re)):(e(document).on("mousedown",ce),e(document).on("mouseup",ce),e(document).on("mouseout",ce),e(document).on("mousemove",ce)),e(window).resize(function(){e(".vbox-content").length&&setTimeout(ie(),800)})})}})}(jQuery);
</script>

<style type="text/css" id="venobox">
    .vbox-overlay *, .vbox-overlay *:before, .vbox-overlay *:after{
        -webkit-backface-visibility: hidden;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
    }
    .vbox-overlay{
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
        -webkit-transform:translateZ(1000px);
        transform: translateZ(1000px);
        transform-style: preserve-3d;
    }

    /* ----- navigation ----- */
    .vbox-title{
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
    .vbox-close{
        cursor: pointer;
        position: fixed;
        top: -1px;
        right: 0;
        width: 50px;
        height: 40px;
        padding: 6px;
        display: block;
        background-position:10px center;
        overflow: hidden;
        font-size: 24px;
        line-height: 1;
        text-align: center;
        z-index: 1050;
    }
    .vbox-num{
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
    .vbox-next, .vbox-prev{
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
    .vbox-next span, .vbox-prev span{
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
    .vbox-prev{
        left: 15px;
    }
    .vbox-next{
        right: 15px;
    }
    .vbox-prev span{
        left: 10px;
        -ms-transform: rotate(-135deg);
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg);
    }
    .vbox-next span{
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        right: 10px;
    }
    /* ------- inline window ------ */
    .vbox-inline{
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
    .venoframe{
        max-width: 100%;
        width: 100%;
        border: none;
        width: 100%;
        height: 260px;
        height: 70vh;
    }
    .venoframe.vbvid{
        height: 260px;
    }
    @media (min-width: 768px) {
        .venoframe, .vbox-inline{
            width: 90%;
            height: 360px;
            height: 70vh;
        }
        .venoframe.vbvid{
            width: 640px;
            height: 360px;
        }
    }
    @media (min-width: 992px) {
        .venoframe, .vbox-inline{
            max-width: 1200px;
            width: 80%;
            height: 540px;
            height: 70vh;
        }
        .venoframe.vbvid{
            width: 960px;
            height: 540px;
        }
    }
    /*
    Please do NOT edit this part!
    or at least read this note: http://i.imgur.com/7C0ws9e.gif
    */
    .vbox-open{
        overflow: hidden;
    }
    .vbox-container{
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

    .vbox-content{
        text-align: center;
        float: left;
        width: 100%;
        position: relative;
        overflow: hidden;
        padding: 20px 10px;
    }
    .vbox-container img{
        max-width: 100%;
        height: auto;
    }
    .figlio{
        box-shadow: 0 0 12px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        max-width: 100%;
        text-align: initial;
    }
    img.figlio{
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -o-user-select: none;
        user-select: none;
    }
    .vbox-content.swipe-left{
        margin-left: -200px !important;
    }
    .vbox-content.swipe-right{
        margin-left: 200px !important;
    }
    .animated{
        webkit-transition: margin 300ms ease-out;
        transition: margin 300ms ease-out;
    }
    .animate-in{
        opacity: 1;
    }
    .animate-out{
        opacity: 0;
    }
    /* ---------- preloader ----------
     * SPINKIT
     * http://tobiasahlin.com/spinkit/
    -------------------------------- */
    .sk-double-bounce,.sk-rotating-plane{width:40px;height:40px;margin:40px auto}.sk-rotating-plane{background-color:#333;-webkit-backface-visibility:visible;-moz-backface-visibility:visible;backface-visibility:visible;-webkit-animation:sk-rotatePlane 1.2s infinite ease-in-out;animation:sk-rotatePlane 1.2s infinite ease-in-out}@-webkit-keyframes sk-rotatePlane{0%{-webkit-transform:perspective(120px) rotateX(0) rotateY(0);transform:perspective(120px) rotateX(0) rotateY(0)}50%{-webkit-transform:perspective(120px) rotateX(-180.1deg) rotateY(0);transform:perspective(120px) rotateX(-180.1deg) rotateY(0)}100%{-webkit-transform:perspective(120px) rotateX(-180deg) rotateY(-179.9deg);transform:perspective(120px) rotateX(-180deg) rotateY(-179.9deg)}}@keyframes sk-rotatePlane{0%{-webkit-transform:perspective(120px) rotateX(0) rotateY(0);transform:perspective(120px) rotateX(0) rotateY(0)}50%{-webkit-transform:perspective(120px) rotateX(-180.1deg) rotateY(0);transform:perspective(120px) rotateX(-180.1deg) rotateY(0)}100%{-webkit-transform:perspective(120px) rotateX(-180deg) rotateY(-179.9deg);transform:perspective(120px) rotateX(-180deg) rotateY(-179.9deg)}}.sk-double-bounce{position:relative}.sk-double-bounce .sk-child{width:100%;height:100%;border-radius:50%;background-color:#333;opacity:.6;position:absolute;top:0;left:0;-webkit-animation:sk-doubleBounce 2s infinite ease-in-out;animation:sk-doubleBounce 2s infinite ease-in-out}.sk-double-bounce .sk-double-bounce2{-webkit-animation-delay:-1s;animation-delay:-1s}@-webkit-keyframes sk-doubleBounce{0%,100%{-webkit-transform:scale(0);transform:scale(0)}50%{-webkit-transform:scale(1);transform:scale(1)}}@keyframes sk-doubleBounce{0%,100%{-webkit-transform:scale(0);transform:scale(0)}50%{-webkit-transform:scale(1);transform:scale(1)}}.sk-wave{width:50px;height:40px;text-align:center;font-size:10px;margin:40px auto}.sk-wave .sk-rect{background-color:#333;height:100%;width:4px;margin:0 1px;display:inline-block;-webkit-animation:sk-waveStretchDelay 1.2s infinite ease-in-out;animation:sk-waveStretchDelay 1.2s infinite ease-in-out}.sk-wave .sk-rect1{-webkit-animation-delay:-1.2s;animation-delay:-1.2s}.sk-wave .sk-rect2{-webkit-animation-delay:-1.1s;animation-delay:-1.1s}.sk-wave .sk-rect3{-webkit-animation-delay:-1s;animation-delay:-1s}.sk-wave .sk-rect4{-webkit-animation-delay:-.9s;animation-delay:-.9s}.sk-wave .sk-rect5{-webkit-animation-delay:-.8s;animation-delay:-.8s}@-webkit-keyframes sk-waveStretchDelay{0%,100%,40%{-webkit-transform:scaleY(.4);transform:scaleY(.4)}20%{-webkit-transform:scaleY(1);transform:scaleY(1)}}@keyframes sk-waveStretchDelay{0%,100%,40%{-webkit-transform:scaleY(.4);transform:scaleY(.4)}20%{-webkit-transform:scaleY(1);transform:scaleY(1)}}.sk-three-bounce{margin:40px auto;width:100px;text-align:center}.sk-three-bounce .sk-child{width:16px;height:16px;background-color:#333;border-radius:100%;margin:4px;display:inline-block;-webkit-animation:sk-three-bounce 1.4s ease-in-out 0s infinite both;animation:sk-three-bounce 1.4s ease-in-out 0s infinite both}.sk-cube-grid,.sk-spinner-pulse{width:40px;height:40px;margin:40px auto}.sk-three-bounce .sk-bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.sk-three-bounce .sk-bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes sk-three-bounce{0%,100%,80%{-webkit-transform:scale(0);transform:scale(0)}40%{-webkit-transform:scale(1);transform:scale(1)}}@keyframes sk-three-bounce{0%,100%,80%{-webkit-transform:scale(0);transform:scale(0)}40%{-webkit-transform:scale(1);transform:scale(1)}}.sk-spinner-pulse{background-color:#333;border-radius:100%;-webkit-animation:sk-pulseScaleOut 1s infinite ease-in-out;animation:sk-pulseScaleOut 1s infinite ease-in-out}@-webkit-keyframes sk-pulseScaleOut{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}@keyframes sk-pulseScaleOut{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}.sk-cube-grid .sk-cube{width:33.33%;height:33.33%;background-color:#333;float:left;-webkit-animation:sk-cubeGridScaleDelay 1.3s infinite ease-in-out;animation:sk-cubeGridScaleDelay 1.3s infinite ease-in-out}.sk-cube-grid .sk-cube1{-webkit-animation-delay:.2s;animation-delay:.2s}.sk-cube-grid .sk-cube2{-webkit-animation-delay:.3s;animation-delay:.3s}.sk-cube-grid .sk-cube3{-webkit-animation-delay:.4s;animation-delay:.4s}.sk-cube-grid .sk-cube4{-webkit-animation-delay:.1s;animation-delay:.1s}.sk-cube-grid .sk-cube5{-webkit-animation-delay:.2s;animation-delay:.2s}.sk-cube-grid .sk-cube6{-webkit-animation-delay:.3s;animation-delay:.3s}.sk-cube-grid .sk-cube7{-webkit-animation-delay:0ms;animation-delay:0ms}.sk-cube-grid .sk-cube8{-webkit-animation-delay:.1s;animation-delay:.1s}.sk-cube-grid .sk-cube9{-webkit-animation-delay:.2s;animation-delay:.2s}@-webkit-keyframes sk-cubeGridScaleDelay{0%,100%,70%{-webkit-transform:scale3D(1,1,1);transform:scale3D(1,1,1)}35%{-webkit-transform:scale3D(0,0,1);transform:scale3D(0,0,1)}}@keyframes sk-cubeGridScaleDelay{0%,100%,70%{-webkit-transform:scale3D(1,1,1);transform:scale3D(1,1,1)}35%{-webkit-transform:scale3D(0,0,1);transform:scale3D(0,0,1)}}.sk-wandering-cubes{margin:40px auto;width:40px;height:40px;position:relative}.sk-wandering-cubes .sk-cube{background-color:#333;width:10px;height:10px;position:absolute;top:0;left:0;-webkit-animation:sk-wanderingCube 1.8s ease-in-out -1.8s infinite both;animation:sk-wanderingCube 1.8s ease-in-out -1.8s infinite both}.sk-wandering-cubes .sk-cube2{-webkit-animation-delay:-.9s;animation-delay:-.9s}@-webkit-keyframes sk-wanderingCube{0%{-webkit-transform:rotate(0);transform:rotate(0)}25%{-webkit-transform:translateX(30px) rotate(-90deg) scale(.5);transform:translateX(30px) rotate(-90deg) scale(.5)}50%{-webkit-transform:translateX(30px) translateY(30px) rotate(-179deg);transform:translateX(30px) translateY(30px) rotate(-179deg)}50.1%{-webkit-transform:translateX(30px) translateY(30px) rotate(-180deg);transform:translateX(30px) translateY(30px) rotate(-180deg)}75%{-webkit-transform:translateX(0) translateY(30px) rotate(-270deg) scale(.5);transform:translateX(0) translateY(30px) rotate(-270deg) scale(.5)}100%{-webkit-transform:rotate(-360deg);transform:rotate(-360deg)}}@keyframes sk-wanderingCube{0%{-webkit-transform:rotate(0);transform:rotate(0)}25%{-webkit-transform:translateX(30px) rotate(-90deg) scale(.5);transform:translateX(30px) rotate(-90deg) scale(.5)}50%{-webkit-transform:translateX(30px) translateY(30px) rotate(-179deg);transform:translateX(30px) translateY(30px) rotate(-179deg)}50.1%{-webkit-transform:translateX(30px) translateY(30px) rotate(-180deg);transform:translateX(30px) translateY(30px) rotate(-180deg)}75%{-webkit-transform:translateX(0) translateY(30px) rotate(-270deg) scale(.5);transform:translateX(0) translateY(30px) rotate(-270deg) scale(.5)}100%{-webkit-transform:rotate(-360deg);transform:rotate(-360deg)}}
</style>

<style>

    a {
        text-decoration-line: none!important;
    }
    button.navbar-toggle {
        margin-right: 20px;
    }

    .banner--stick {
        display: none;
    }

    .owl-carousel {
        display: none;
        width: 100%;
        z-index: 1;
        -webkit-tap-highlight-color: transparent;
        position: relative
    }

    .owl-carousel .owl-stage-outer {
        overflow: hidden;
        -webkit-transform: translate3d(0, 0, 0)
    }

    .owl-carousel .owl-item {
        float: left
    }

    .owl-carousel .owl-item img {
    }

    .owl-carousel.owl-loaded {
        display: block
    }

    .owl-carousel.owl-loading {
        opacity: 0;
        display: block
    }

    .owl-carousel.owl-drag .owl-item {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .owl-carousel.owl-grab {
    }

    @-webkit-keyframes fadeOut {
        0% {
            opacity: 1
        }
        100% {
            opacity: 0
        }
    }

    @keyframes fadeOut {
        0% {
            opacity: 1
        }
        100% {
            opacity: 0
        }
    }

    .owl-carousel .item {
        position: relative;
        z-index: 100;
        -webkit-backface-visibility: hidden;
    }

    /* end fix */
    .owl-nav > div {
        margin-top: -26px;
        position: absolute;
        top: 43%;
        color: #cdcbcd;
    }

    .owl-nav i {
        font-size: 52px;
    }

    .owl-nav .owl-prev {
        left: 0px;
    }

    .owl-nav .owl-next {
        right: 0px;
    }

    #comingSoon:before {
        width: 100%
    }

    .time {
        cursor: pointer;
        padding: 8px 10px 7px 10px !important
    }

    .time-past {
        opacity: 0.5;
        cursor: not-allowed !important;
    }

    .fw-tabs ul li {
        width: 90px
    }

    .fw-tabs ul li a {
        letter-spacing: 4;
        padding-right: 0px;
        padding-left: 0px;
        text-align: center
    }

    .fw-tabs ul li[aria-controls="Mon"] {
        width: 120px;
    }

    .fw-tabs ul li[aria-controls="Tue"] {
        width: 110px;
    }

    .fw-tabs ul li[aria-controls="Mon"] a, .fw-tabs ul li[aria-controls="Tue"] a {
        letter-spacing: 2;
    }

    .slick-slide {
        width: 100%;
        padding: 15px;
        margin: 0px
    }

    .fw-container {
        padding-left: 30px;
        padding-right: 30px;
    }

    ::-moz-selection {
        background-color: #82242A;
    }

    ::selection {
        background: #82242A !important;
    }

    a:active, a:visited, .btn-ghost, input[type="submit"], .btn-ghost i, a.arrow-button, .tabs ul li.ui-state-active a, .accordion h2.ui-state-active, .accordion h3.ui-state-active, .accordion h4.ui-state-active, .live-search i, .comingSoon-slides span.title, .news article .categories, .single-tags i, .single-tags a:hover, .social-share a, .pagination a:hover, .sidebar .widget .search-form label:before, .sidebar .widget h4, .sidebar .widget ul li a:hover, .sidebar .widget .tagcloud a:hover, .sidebar .movie-search-btn, ul.show-times li.today i, .icon-row span i, .icon-box i, .comments .date, .comment-respond #submit, .news-carousel .date, footer h6, footer .copyright a:hover, .single-post .leave-comment, .single-post .comments .comments-count, .site-name, .movie-tabs span.title {
        color: #82242A;
    }

    #comingSoon .slick-slide img {
        width: 100%
    }

    .slick-slide .movie-poster aside .play {
        display: flex
    }

    .slick-slide .movie-poster aside .play i {
        margin: auto
    }

    .slick-slide {
        height: auto
    }

    blockquote:before, .error-search .search-submit, ul.social-profiles li a:hover, .btn-default:before, .btn-ghost:before, .btn-primary, input[type="submit"]:hover, ul.show-times li.today .time, .comment-respond #submit:hover, .fw-testimonials .fw-testimonials-pagination a:hover, .fw-testimonials .fw-testimonials-pagination a.selected, .edit-link:hover a {
        background-color: #82242A;
    }

    h2:after, h3:after, h4:after, h5:after, .edit-link a, .nav li:after, .nav li.active a:after, .nav li.current_page_parent a:after, .nav .dropdown-menu, .btn-default, .slick-slider .slick-arrow, .tabs ul li a:after, .tabs.pill-style ul li.ui-state-active a, .movie-search .btn {
        background-image: linear-gradient(to right, #ffa8b5, #82242A);
    }

    .slick-slide .movie-poster:before, .accordion.pill-style h2.ui-state-active:before, .accordion.pill-style h3.ui-state-active:before, .accordion.pill-style h4.ui-state-active:before, .news article .img:before, .comments::-webkit-scrollbar-thumb {
        background-image: linear-gradient(to bottom, #ffa8b5, #82242A);
    }

    .btn-ghost, input[type="submit"], .comingSoon-slides .video i, .pagination a:hover, .pagination .current, .sidebar .widget .tagcloud a:hover, .comment-respond #submit {
        border-color: #82242A;
    }

    span.title, .heading .search a:hover i, .navbar.banner--clone .nav li.active a, .navbar.banner--clone .nav li.current_page_parent a, .comingSoon-slides a.arrow-button:hover, .social-share a:hover, .social-share a:hover i, .sidebar .widget ul li.current-cat a, .share a:hover, footer ul li a:hover, footer ul li a:hover .fa, a:hover {
        color: #ffa8b5;
    }

    input:focus, input:active, textarea:focus, textarea:active, select:focus, select:active, .share a:hover {
        border-color: #ffa8b5;
    }

    .navbar-toggle .icon-bar, button.btn-default:hover, button.btn-primary:hover {
        background-color: #ffa8b5;
    }

    html,
    body {
        overflow-x: unset!important;
        font: Roboto Condensed latin-ext regular;
        color: #717171;
        font-size: 16px;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: Roboto Condensed, latin-ext;
        font-weight: 300;
    }

    footer {
        background: #101010;
    }

    @media (max-width: 767px) {
        .comingSoon-slides .single-slide {
            flex-wrap: wrap;
        }
        .movie-tabs img {
            width: 100%
        }
    }

    .comingSoon-slides .bg {
        opacity: 0.15;
    }

    .slick-slide.slick-cloned span {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }

    .slick-slide .movie-poster span {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }

    .movie-tabs .image {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }

    .single-slide span, .slide-video span {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
    }

    .single-slide {
        opacity: 0;
        height: 0px;
        padding-bottom: 0px;
        padding-right: 10px;
        padding-left: 10px
    }

    .comingSoon-slides .single-slide {
        padding-bottom: 0px
    }

    .slide-content .title {
        font-size: 14px;
        color: #82242A;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 0px
    }

    .left.no-underline {
        color: white
    }

    .slide-content, .slide-video {
        padding: 5px
    }


    .blurb-content p {
        text-align: justify;
    }

    ::-moz-selection {
        background-color: #82242A;
    }

    .movie-tabs .image {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }

    .star-rating i.grey {
        color: #d8d8d8 !important;
    }

    .star-rating i {
        color: #ffa8b5 !important;
    }

    h1 a {    color: white! important}

    .single-post h2:after, .single-post h3:after, .single-post h4:after, .single-post h5:after, .single-post h6:after, :not(header) > h2:after, :not(header) > h2:after, :not(header) > h3:after, :not(header) > h4:after, :not(header) > h5:after, :not(header) > h6:after {
        background-image: linear-gradient(to right, #ffa8b5, #82242A);
    }

    #hero .scroll, #content_hero .scroll {
        bottom: -1px !important;
    }

    .fw-tabs ul li.ui-state-active a {
        color: #82242A !important;
    }

    ::selection {
        color: #fff !important;
        background: #82242A !important;
    }

    .fw-tabs ul li a:after {
        background-image: linear-gradient(to right, #ffa8b5, #82242A) !important;
    }

    @media (max-width: 845px ) {
        .running-time {
            margin-top: 0px
        }

        .movies-tab img {
            margin-bottom: 20px
        }
    }

    .movie-tabs p {
        text-align: justify;
    }

    .movie-tabs header {
        margin-top: 8px;
    }

    .movie-tabs .title {
        font-size: 13px;
    }

    .tagcloud {
        cursor: pointer;;
        white-space: nowrap
    }

    .tagcloud #time {
        font-weight: bold;
        font-size: 15px;
        border-radius: 5px 0px 0px 5px;
        background-color: #82242A;
        display: inline-block;
        color: white;
        padding: 7px 10px 7px 10px;
    }

    .tagcloud #quality {
        margin: 0 5px 5px -7px;
        padding: 5px 8px 5px 9px;
        display: inline-block;
        font-size: 15px !important;
        width: auto;
        text-align: center;
        color: #82242A;
        border: 2px solid #82242A;
        background: transparent;
        border-radius: 0px 5px 5px 0px
    }

    .tagcloud a:hover {
        border-color: #bbbbbb;
        color: #8f8f8f
    }

    .time-past > span {
        background-color: #bbbbbb;
    }

    .time-past > .tagcloud > a {
        color: #8f8f8f;
        border-color: #bbbbbb;
    }

    .time-wrap {
        margin-top: 10px;
    }

    .running-time {
        padding: 0px;
        white-space: nowrap;
    }

    @media (max-width: 767px) {
        .running-times {
            margin-right: 15px;
        }

        .movie-tabs img {
            width: 100%
        }

        .movie-tabs > div > div {
            margin-bottom: 40px
        }
    }
    @media (max-width: 768px) and (min-width: 446px) {
        .movie-tabs > .col-sm-4 > div {
            width: max-content;
        }
    }
    @media (max-width: 600px) {
        .viewing-times {
            margin-top: 20px;
            margin-bottom: 5px !important;
        }

        .running-time {
            text-align: right !important;
            margin-top: -15px !important;
        }
    }

    @media only screen and (max-width: 723px) {
        .fw-tabs ul li[aria-controls="Mon"] a, .fw-tabs ul li[aria-controls="Tue"] a {
            letter-spacing: 0;
        }

        .fw-tabs ul li[aria-controls="Mon"] {
            width: 90px;
        }

        .fw-tabs ul li[aria-controls="Tue"] {
            width: 90px;
        }

    }

    @media only screen and (max-width: 374px) and (min-width: 260px) {
        .fw-tabs ul li {
            width: 50% !important;;
        }
    }

    @media only screen and (max-width: 434px) and (min-width: 374px) {
        .fw-tabs ul li {
            width: 33.3% !important;;
        }
    }

    @media only screen and (max-width: 850px) {
        owl-carousel .owl-dots, .owl-carousel .owl-nav {
            display: none
        }
    }

    @media only screen and (max-width: 1105px) and (min-width: 990px) {
        owl-carousel .owl-dots, .owl-carousel .owl-nav {
            display: none
        }
    }

    @media only screen and (max-width: 1305px) and (min-width: 1200px) {
        owl-carousel .owl-dots, .owl-carousel .owl-nav {
            display: none
        }
    }
    .carousel-inner .buttons {
        min-width: 266px;
    }
    @media (max-width: 600px) {
        .dark, #hero {
            margin-right: 0px;
            margin-left: 0px;
        }
        .carousel-inner .star-rating {
            margin-top: 10px;
        }
    }
    @media (max-width: 450px) {
        .carousel-inner .star-rating {
            margin-left: 102px;
        }
    }
</style>
{{--footer style--}}
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
        padding-top: 50px!important;
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
        padding: 0px!important
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
        padding-top: 35px;
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
        .footer .footer-middle .column.column1 { min-width: 215px; width: 20%; padding-right: 20px }
        .footer .footer-middle .column.column2 { min-width: 180px }
    }

    @media (max-width: 1090px) {
        .footer .footer-middle .column.column1 { padding-right: 20px }
        .footer .footer-middle .column.column4 { min-width: 0px; padding-left: 20px }
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

        .footer .footer-middle .column.column1 div { float: left!important }

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
        .footer .about p { max-width: 1000px!important }
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
            padding: 30px 50px 20px 50px!important
        }

        .footer .footer-middle .column.column1, .footer .footer-middle .column.column4 {
            border: 1px solid #444 !important;
        }

        .footer .footer-middle .column.column4 {
            padding: 20px!important
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
@section('content')
    <div class="navbar" role="navigation">
        <div class="heading">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="search">
                            <a href="#">
                                <i class="fa fa-search" style="display: block!important"></i>
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
                         style="margin-top: -20px; margin-left: 15px; width: 178px">
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
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-194 current-menu-item curent_page_item dropdown active">
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
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254" style="display: none"><a title="Coffee"
                                                                                                          href="Coffee.html">Cà
                            phê</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254" style="display: none"><a title="Events"
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
    <body class="home page-template page-template-page-templates page-template-page-builder page-template-page-templatespage-builder-php page page-id-35 masthead-fixed full-width grid">
    <div class="fw-page-builder-content">

        <section style=" padding-top: 0px; padding-bottom: 0px; border-width: 0px 0px 0px 0px"
                 id="section_e81e6b53dc8f4b725a6b5710b892282e" class="fw-main-row ">
            <div class="fw-container-fluid">
                <div class="fw-row">

                    <div style="padding: 0;" class="fw-col-xs-12 ">

                        <div id="hero" class="carousel slide carousel-fade" data-ride="carousel" style="height: 772px;">

                            <img src="http://specto.klevermedia.co.uk/wp-content/themes/specto/images/scroll-arrow.svg"
                                 alt="Scroll down" class="scroll">

                            <!-- Hero content -->

                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <!--film yeu thich-->
                                <!-- Indicators -->
                                <div class="container">
                                    <ol class="carousel-indicators">
                                        <?php use Carbon\Carbon;$j = 0;?>
                                        @foreach($favoriteFilms as $favoriteFilm)
                                            <?php
                                            $j++;
                                            if ($j == 1) {
                                                $class = "active";
                                            } else {
                                                $class = "";
                                            }?>
                                            <li data-target="#carousel" data-slide-to="{{$j-1}}"
                                                class="{{$class}}"></li>
                                        @endforeach
                                    </ol>
                                </div>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <!-- Slides -->
                                    <?php $i = 0; $class = "";?>
                                    @foreach($favoriteFilms as $favoriteFilm)
                                        <?php
                                        $limit_summary = (strlen($favoriteFilm->summary) > 337) ? 337 : strlen($favoriteFilm->summary) - 1;
                                        $i++;
                                        if ($i == 1) {
                                            $class = "active";
                                        } else {
                                            $class = "";
                                        }?>
                                        <div class="item {{$class}}"
                                             style="background-image: url({{$favoriteFilm->cover_url}}); padding-top: 0px;">
                                            <div class="container">
                                                <div class="row blurb">
                                                    <div class="col-md-8 col-sm-12 blurb-content">
                                                        <span class="title">{{$favoriteFilm->film_genre}}</span>
                                                        <header>
                                                            {{--<a href="/film/{{$favoriteFilm->id}}">--}}
                                                                {{--<h1>{{$favoriteFilm->name}}</h1></a>--}}
                                                            <h1><a href="/film/{{$favoriteFilm->id}}">{{$favoriteFilm->name}}</a></h1>
                                                        </header>
                                                        {{--<p>{{$favoriteFilm->summary}}</p>--}}
                                                        <p>{{mb_substr($favoriteFilm->summary,0,$limit_summary) . "..."}}</p>
                                                        <div class="buttons">
                                                            <span class="certificate">{{$favoriteFilm->film_rated}}</span>
                                                            <a href="{{$favoriteFilm->trailer_url}}" data-vbtype="video" class="venobox btn btn-default vbox-item" style="margin-right: 15px">
                                                                <i class="fa fa-play"></i>
                                                                <span>Xem trailer</span>
                                                            </a>
                                                            <div class="star-rating">
                                                                @for($j = 1; $j <=  $favoriteFilm->rate; $j++)
                                                                    <i class="fa fa-star"></i>
                                                                @endfor
                                                                @for($j = 1; $j <=  5 - $favoriteFilm->rate; $j++)
                                                                    <i class="fa fa-star grey"></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach


                                <!-- Slides end -->
                                </div>
                            </div>
                            <script>
                                jQuery(document).ready(function ($) {
                                    // Hero slider
                                    $('.carousel').carousel({
                                        interval: 8000,
                                        keyboard: true,
                                        pause: "hover"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section style=" padding-top: 75px; padding-bottom: 75px; border-width: 0px 0px 0px 0px"
                 id="section_f3b614c41e478eb79170d1a9ef523af7" class="fw-main-row ">
            <div class="fw-container">
                <div class="fw-row">

                    <div style="padding: 0;" class="fw-col-xs-12 ">
                        <header>
                            <h2 style="color: #82242A">
                                Phim đang chiếu </h2>
                        </header>

                        <div class="slick-slider" style="margin-left: -15px; margin-right: -15px">
                            <div id="current-film" class="owl-carousel slick-carousel slick-initialized">
                                @if($filmsShowing)
                                    @foreach($filmsShowing as $filmShowing)
                                        <div class="slick-slide">
                                            <div class="movie-poster">
                                                <aside>
                                                    <div>
                                                        <a href="{{$filmShowing->trailer_url}}" data-vbtype="video"
                                                           class="venobox play vbox-item" tabindex="-1">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                        <a href="/film/{{$filmShowing->id}}"
                                                           title="It’s over" class="read-more" tabindex="-1">
                                                            Xem thêm </a>
                                                            @if($filmShowing->release_date)
                                                        <p class="date">{{Carbon::createFromFormat('Y-m-d', $filmShowing->release_date)->format('d/m/Y')}}</p>
                                                        @endif
                                                    </div>
                                                </aside>
                                                <div style="position: relative;">
                                                    <img src="http://d2xbg5ewmrmfml.cloudfront.net/files/15300190044jGz0ckGMi2DtIO.png">
                                                    <span style="background: url({{$filmShowing->avatar_url}}) center center / cover;"></span>
                                                </div>
                                            </div>
                                            <header>
                                                <h4 class="no-underline">{{$filmShowing->name}}</h4>
                                            </header>
                                            <div class="star-rating">
                                                @for($j = 1; $j <=  $filmShowing->rate; $j++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                                @for($j = 1; $j <=  5 - $filmShowing->rate; $j++)
                                                    <i class="fa fa-star grey"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </section>


        <section style=" padding-top: 75px; padding-bottom: 75px; border-width: 0px 0px 0px 0px"
                 id="section_cb13ca722b641edebc99e432fd755e61" class="fw-main-row ">
            <div class="fw-container">
                <div class="fw-row">

                    <div style="padding: 0;" class="fw-col-xs-12 ">

                        <div class="fw-tabs movies ui-tabs ui-widget ui-widget-content ui-corner-all">
                            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                                role="tablist">
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Mon"
                                    aria-labelledby="ui-id-1" aria-selected="false" aria-expanded="false">
                                    <a href="#Mon" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                       id="ui-id-1">
                                        Hôm nay </a>
                                </li>
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Tue"
                                    aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
                                    <a href="#Tue" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                       id="ui-id-2">
                                        Ngày mai </a>
                                </li>
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="0" aria-controls="Wed"
                                    aria-labelledby="ui-id-3" aria-selected="true" aria-expanded="true">
                                    <a href="#Wed" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                       id="ui-id-3">
                                        <?php echo($day->addDays(2)->format('d/m'))?> </a>
                                </li>
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Thu"
                                    aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
                                    <a href="#Thu" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                       id="ui-id-4">
                                        <?php echo($day->addDays(1)->format('d/m'))?> </a>
                                </li>
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Fri"
                                    aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false">
                                    <a href="#Fri" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                       id="ui-id-5">
                                        <?php echo($day->addDays(1)->format('d/m'))?>     </a></li>
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Sat"
                                    aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false">
                                    <a href="#Sat" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                       id="ui-id-6">
                                        <?php echo($day->addDays(1)->format('d/m'))?> </a></li>
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Sun"
                                    aria-labelledby="ui-id-7" aria-selected="false" aria-expanded="false">
                                    <a href="#Sun" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                       id="ui-id-7">
                                        <?php echo($day->addDays(1)->format('d/m'))?> </a></li>
                            </ul>

                            <div id="Mon" aria-labelledby="ui-id-1"
                                 class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel"
                                 aria-hidden="true" style="display: none;">
                                <?php $today = Carbon::today();?>
                                @foreach($todaySessions as $session)
                                    <div class="row movie-tabs">
                                        <div class="col-md-2 col-sm-4">
                                            <div style="position: relative;">
                                                <img src="http://d2xbg5ewmrmfml.cloudfront.net/files/15300190044jGz0ckGMi2DtIO.png"
                                                     alt="">
                                                <a class="image" href="/film/{{$session->film->id}}"
                                                   style="background: url({{$session->film->avatar_url}}) center center / cover;"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-8">
                                            <span class="title">{{$session->film->film_genre}}</span>
                                            <header>
                                                <h3 class="no-underline"><a href="/film/{{$session->film->id}}" style="color: black">{{$session->film->name}}</a></h3>
                                            </header>
                                            <p>{{mb_substr($session->film->summary,0,$limit_summary). '...'}}</p>
                                            <a href="/film/{{$session->film->id}}"
                                               class="arrow-button">
                                                Chi tiết</a>

                                            <div class="row">
                                                <div class="col-md-8 col-sm-9">
                                                    <hr class="space-10">
                                                    <span class="viewing-times"><i class="fa fa-clock-o"></i>&#160;Lịch chiếu&#160;</span>
                                                    <div class="time-wrap today" style="display: inline-block;">
                                                        @foreach($session->film->film_sessions()->where('start_date','=', Carbon::createFromFormat('Y-m-d H:i:s', $today->toDateString() . ' 00:00:00'))->orderBy('start_time')->get() as $subsession)
                                                            <?php $time_parse = Carbon::createFromFormat('Y-m-d H:i:s', $subsession->start_date . $subsession->start_time);
                                                            $now = Carbon::now();
                                                            $class = ''; if ($time_parse->lessThan($now)) {
                                                                $class = 'time-past';
                                                            }?>
                                                            <a class="tagcloud {{$class}}"
                                                               href="/session/{{$subsession->id}}">
                                                                <span id="time">{{substr($subsession->start_time,0,5)}}</span>
                                                                <span id="quality">{{$subsession->film_quality}}</span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-3 running-time" style="margin-top: 12px">
                                                    <hr class="space-10"> {{$session->film->running_time}}
                                                    <span class="certificate">{{$session->film->film_rated}}</span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div id="Tue" aria-labelledby="ui-id-2"
                                 class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel"
                                 aria-hidden="true" style="display: none;">
                                <?php $today->addDay();?>
                                @foreach($after1DaySessions as $session)
                                    <div class="row movie-tabs">
                                        <div class="col-md-2 col-sm-4">
                                            <div style="position: relative;">
                                                <img src="http://d2xbg5ewmrmfml.cloudfront.net/files/15300190044jGz0ckGMi2DtIO.png">
                                                <a class="image" href="/film/{{$session->film->id}}" 
                                                   style="background: url({{$session->film->avatar_url}}) center center / cover;"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-8">
                                            <span class="title">{{$session->film->film_genre}}</span>
                                            <header>
                                                <h3 class="no-underline"><a href="/film/{{$session->film->id}}" style="color: black">{{$session->film->name}}</a></h3>
                                            </header>
                                            <p>{{mb_substr($session->film->summary,0,$limit_summary). '...'}}</p>
                                            <a href="/film/{{$session->film->id}}"
                                               class="arrow-button">
                                                Chi tiết</a>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-9">
                                                    <hr class="space-10">
                                                    <span class="viewing-times"><i class="fa fa-clock-o"></i>&#160;Lịch chiếu&#160;</span>
                                                    <div class="time-wrap today" style="display: inline-block;">
                                                        @foreach($session->film->film_sessions()->where('start_date','=', Carbon::createFromFormat('Y-m-d H:i:s', $today->toDateString() . ' 00:00:00'))->get() as $subsession)
                                                            <?php $time_parse = Carbon::createFromFormat('Y-m-d H:i:s', $subsession->start_date . $subsession->start_time);
                                                            $now = Carbon::now();
                                                            $class = ''; if ($time_parse->lessThan($now)) {
                                                                $class = 'time-past';
                                                            }?>
                                                            <a class="tagcloud {{$class}}"
                                                               href="/session/{{$subsession->id}}">
                                                                <span id="time">{{substr($subsession->start_time,0,5)}}</span>
                                                                <span id="quality">{{$subsession->film_quality}}</span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-3 running-time" style="margin-top: 12px">
                                                    <hr class="space-10"> {{$session->film->running_time}}
                                                    <span class="certificate">{{$session->film->film_rated}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="Wed" aria-labelledby="ui-id-3"
                                 class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel"
                                 aria-hidden="true">
                                <?php $today->addDay();?>
                                @foreach($after2DaySessions as $session)
                                    <div class="row movie-tabs">
                                        <div class="col-md-2 col-sm-4">
                                            <div style="position: relative;">
                                                <img src="http://d2xbg5ewmrmfml.cloudfront.net/files/15300190044jGz0ckGMi2DtIO.png">
                                                <a class="image" href="/film/{{$session->film->id}}" 
                                                   style="background: url({{$session->film->avatar_url}}) center center / cover;"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-8">
                                            <span class="title">{{$session->film->film_genre}}</span>
                                            <header>
                                                <h3 class="no-underline"><a href="/film/{{$session->film->id}}" style="color: black">{{$session->film->name}}</a></h3>
                                            </header>
                                            <p>{{mb_substr($session->film->summary,0,$limit_summary). '...'}}</p>
                                            <a href="/film/{{$session->film->id}}"
                                               class="arrow-button">
                                                Chi tiết</a>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-9">
                                                    <hr class="space-10">
                                                    <span class="viewing-times"><i class="fa fa-clock-o"></i>&#160;Lịch chiếu&#160;</span>
                                                    <div class="time-wrap today" style="display: inline-block;">
                                                        @foreach($session->film->film_sessions()->where('start_date','=', Carbon::createFromFormat('Y-m-d H:i:s', $today->toDateString() . ' 00:00:00'))->get() as $subsession)
                                                            <?php $time_parse = Carbon::createFromFormat('Y-m-d H:i:s', $subsession->start_date . $subsession->start_time);
                                                            $now = Carbon::now();
                                                            $class = ''; if ($time_parse->lessThan($now)) {
                                                                $class = 'time-past';
                                                            }?>
                                                            <a class="tagcloud {{$class}}"
                                                               href="/session/{{$subsession->id}}">
                                                                <span id="time">{{substr($subsession->start_time,0,5)}}</span>
                                                                <span id="quality">{{$subsession->film_quality}}</span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-3 running-time" style="margin-top: 12px">
                                                    <hr class="space-10"> {{$session->film->running_time}}
                                                    <span class="certificate">{{$session->film->film_rated}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="Thu" aria-labelledby="ui-id-4"
                                 class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel"
                                 aria-hidden="true" style="display: none;">
                                <?php $today->addDay();?>
                                @foreach($after3DaySessions as $session)
                                    <div class="row movie-tabs">
                                        <div class="col-md-2 col-sm-4">
                                            <div style="position: relative;">
                                                <img src="http://d2xbg5ewmrmfml.cloudfront.net/files/15300190044jGz0ckGMi2DtIO.png">
                                                <a class="image" href="/film/{{$session->film->id}}"
                                                   title="{{$session->film->name}}"
                                                   style="background: url({{$session->film->avatar_url}}) center center / cover;"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-8">
                                            <span class="title">{{$session->film->film_genre}}</span>
                                            <header>
                                                <h3 class="no-underline"><a href="/film/{{$session->film->id}}" style="color: black">{{$session->film->name}}</a></h3>
                                            </header>
                                            <p>{{mb_substr($session->film->summary,0,$limit_summary). '...'}}</p>
                                            <a href="/film/{{$session->film->id}}"
                                               class="arrow-button">
                                                Chi tiết</a>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-9">
                                                    <hr class="space-10">
                                                    <span class="viewing-times"><i class="fa fa-clock-o"></i>&#160;Lịch chiếu&#160;</span>
                                                    <div class="time-wrap today" style="display: inline-block;">
                                                        @foreach($session->film->film_sessions()->where('start_date','=', Carbon::createFromFormat('Y-m-d H:i:s', $today->toDateString() . ' 00:00:00'))->get() as $subsession)
                                                            <?php $time_parse = Carbon::createFromFormat('Y-m-d H:i:s', $subsession->start_date . $subsession->start_time);
                                                            $now = Carbon::now();
                                                            $class = ''; if ($time_parse->lessThan($now)) {
                                                                $class = 'time-past';
                                                            }?>
                                                            <a class="tagcloud {{$class}}"
                                                               href="/session/{{$subsession->id}}">
                                                                <span id="time">{{substr($subsession->start_time,0,5)}}</span>
                                                                <span id="quality">{{$subsession->film_quality}}</span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-3 running-time" style="margin-top: 12px">
                                                    <hr class="space-10"> {{$session->film->running_time}}
                                                    <span class="certificate">{{$session->film->film_rated}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="Fri" aria-labelledby="ui-id-5"
                                 class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel"
                                 aria-hidden="true" style="display: none;">
                                <?php $today->addDay();?>
                                @foreach($after4DaySessions as $session)
                                    <div class="row movie-tabs">
                                        <div class="col-md-2 col-sm-4">
                                            <div style="position: relative;">
                                                <img src="http://d2xbg5ewmrmfml.cloudfront.net/files/15300190044jGz0ckGMi2DtIO.png"
                                                     alt="{{$session->film->name}}">
                                                <a class="image" href="/film/{{$session->film->id}}"
                                                   title="{{$session->film->name}}"
                                                   style="background: url({{$session->film->avatar_url}}) center center / cover;"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-8">
                                            <span class="title">{{$session->film->film_genre}}</span>
                                            <header>
                                                <h3 class="no-underline"><a href="/film/{{$session->film->id}}" style="color: black">{{$session->film->name}}</a></h3>
                                            </header>
                                            <p>{{mb_substr($session->film->summary,0,$limit_summary). '...'}}</p>
                                            <a href="/film/{{$session->film->id}}"
                                               class="arrow-button">
                                                Chi tiết</a>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-9">
                                                    <hr class="space-10">
                                                    <span class="viewing-times"><i class="fa fa-clock-o"></i>&#160;Lịch chiếu&#160;</span>
                                                    <div class="time-wrap today" style="display: inline-block;">
                                                        @foreach($session->film->film_sessions()->where('start_date','=', Carbon::createFromFormat('Y-m-d H:i:s', $today->toDateString() . ' 00:00:00'))->get() as $subsession)
                                                            <?php $time_parse = Carbon::createFromFormat('Y-m-d H:i:s', $subsession->start_date . $subsession->start_time);
                                                            $now = Carbon::now();
                                                            $class = ''; if ($time_parse->lessThan($now)) {
                                                                $class = 'time-past';
                                                            }?>
                                                            <a class="tagcloud {{$class}}"
                                                               href="/session/{{$subsession->id}}">
                                                                <span id="time">{{substr($subsession->start_time,0,5)}}</span>
                                                                <span id="quality">{{$subsession->film_quality}}</span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-3 running-time" style="margin-top: 12px">
                                                    <hr class="space-10"> {{$session->film->running_time}}
                                                    <span class="certificate">{{$session->film->film_rated}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="Sat" aria-labelledby="ui-id-6"
                                 class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel"
                                 aria-hidden="true" style="display: none;">
                                <?php $today->addDay();?>
                                @foreach($after5DaySessions as $session)
                                    <div class="row movie-tabs">
                                        <div class="col-md-2 col-sm-4">
                                            <div style="position: relative;">
                                                <img src="http://d2xbg5ewmrmfml.cloudfront.net/files/15300190044jGz0ckGMi2DtIO.png">
                                                <a class="image" href="/film/{{$session->film->id}}"
                                                   style="background: url({{$session->film->avatar_url}}) center center / cover;"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-8">
                                            <span class="title">{{$session->film->film_genre}}</span>
                                            <header>
                                                <h3 class="no-underline"><a href="/film/{{$session->film->id}}" style="color: black">{{$session->film->name}}</a></h3>
                                            </header>
                                            <p>{{mb_substr($session->film->summary,0,$limit_summary). '...'}}</p>
                                            <a href="film/{{$session->film->id}}"
                                               class="arrow-button">
                                                Chi tiết</a>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-9">
                                                    <hr class="space-10">
                                                    <span class="viewing-times"><i class="fa fa-clock-o"></i>&#160;Lịch chiếu&#160;</span>
                                                    <div class="time-wrap today" style="display: inline-block;">
                                                        @foreach($session->film->film_sessions()->where('start_date','=', Carbon::createFromFormat('Y-m-d H:i:s', $today->toDateString() . ' 00:00:00'))->get() as $subsession)
                                                            <?php $time_parse = Carbon::createFromFormat('Y-m-d H:i:s', $subsession->start_date . $subsession->start_time);
                                                            $now = Carbon::now();
                                                            $class = ''; if ($time_parse->lessThan($now)) {
                                                                $class = 'time-past';
                                                            }?>
                                                            <a class="tagcloud {{$class}}"
                                                               href="/session/{{$subsession->id}}">
                                                                <span id="time">{{substr($subsession->start_time,0,5)}}</span>
                                                                <span id="quality">{{$subsession->film_quality}}</span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-3 running-time" style="margin-top: 12px">
                                                    <hr class="space-10"> {{$session->film->running_time}}
                                                    <span class="certificate">{{$session->film->film_rated}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="Sun" aria-labelledby="ui-id-7"
                                 class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel"
                                 aria-hidden="true" style="display: none;">
                                <?php $today->addDay();?>
                                @foreach($after6DaySessions as $session)
                                    <div class="row movie-tabs">
                                        <div class="col-md-2 col-sm-4">
                                            <div style="position: relative;">
                                                <img src="http://d2xbg5ewmrmfml.cloudfront.net/files/15300190044jGz0ckGMi2DtIO.png">
                                                <a class="image" href="/film/{{$session->film->id}}" 
                                                   style="background: url({{$session->film->avatar_url}}) center center / cover;"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-8">
                                            <span class="title">{{$session->film->film_genre}}</span>
                                            <header>
                                                <h3 class="no-underline"><a href="/film/{{$session->film->id}}" style="color: black">{{$session->film->name}}</a></h3>
                                            </header>
                                            <p>{{mb_substr($session->film->summary,0,$limit_summary). '...'}}</p>
                                            <a href="film/{{$session->film->id}}"
                                               class="arrow-button">
                                                Chi tiết</a>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-9">
                                                    <hr class="space-10">
                                                    <span class="viewing-times"><i class="fa fa-clock-o"></i>&#160;Lịch chiếu&#160;</span>
                                                    <div class="time-wrap today" style="display: inline-block;">
                                                        @foreach($session->film->film_sessions()->where('start_date','=', Carbon::createFromFormat('Y-m-d H:i:s', $today->toDateString() . ' 00:00:00'))->get() as $subsession)
                                                            <?php $time_parse = Carbon::createFromFormat('Y-m-d H:i:s', $subsession->start_date . $subsession->start_time);
                                                            $now = Carbon::now();
                                                            $class = ''; if ($time_parse->lessThan($now)) {
                                                                $class = 'time-past';
                                                            }?>
                                                            <a class="tagcloud {{$class}}"
                                                               href="/session/{{$subsession->id}}">
                                                                <span id="time">{{substr($subsession->start_time,0,5)}}</span>
                                                                <span id="quality">{{$subsession->film_quality}}</span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-3 running-time" style="margin-top: 12px">
                                                    <hr class="space-10"> {{$session->film->running_time}}
                                                    <span class="certificate">{{$session->film->film_rated}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <script>
                            jQuery(function ($) {
                                $('.movies').tabs({
                                    active: 0
                                });
                                // $('.movies ul li.ui-tabs-active a').each(function(index, el) {
                                //     $(this).text('Today');
                                // });
                                $('.movies #Mon').find('.mon-time').css('display', 'inline-block');
                                $('.movies #Tue').find('.tue-time').css('display', 'inline-block');
                                $('.movies #Wed').find('.wed-time').css('display', 'inline-block');
                                $('.movies #Thu').find('.thu-time').css('display', 'inline-block');
                                $('.movies #Fri').find('.fri-time').css('display', 'inline-block');
                                $('.movies #Sat').find('.sat-time').css('display', 'inline-block');
                                $('.movies #Sun').find('.sun-time').css('display', 'inline-block');
                            });
                        </script>
                    </div>
                </div>

            </div>
        </section>


        <section style="background-color:#101010; padding-top: 0px; padding-bottom: 0px; border-width: 0px 0px 0px 0px"
                 id="section_148d52dc9b40bdc547bb644e06685a1e" class="fw-main-row ">
            <div class="fw-container-fluid">
                <div class="fw-row">

                    <div style="padding: 0px; " class="fw-col-xs-12 ">
                        <div class="container section remove-bottom-padding dark">
                            <div class="row comingSoon-slides">
                                <div class="col-sm-12">

                                    <header><h2>Phim sắp chiếu</h2></header>
                                    <?php $i = 0; $classes = array("1 demo");
                                    for ($j = 2; $j <= count($filmsComing); $j++) {
                                        array_push($classes, $j);
                                    }
                                    ?>
                                    <style>
                                        .row.single-slide.demo {
                                            padding-bottom: 40px;
                                            opacity: 1;
                                            height: auto;
                                        }
                                    </style>

                                    @foreach($filmsComing as $film)
                                        <div class="row single-slide {{$classes[$i++]}}">
                                            <div class="bg"
                                                 style="background-image: url({{$film->cover_url}});"></div>
                                            <div class="col-sm-5 col-xs-12 slide-content" style="margin-top: -15px">
                                                <p class="title">{{$film->film_genre}}</p>
                                                <header>
                                                    <h3 class="no-underline"><a href="/film/{{$film->id}}" style="color:white">{{$film->name}}</a></h3>
                                                </header>
                                                <div class="star-rating">
                                                    @for($j = 1; $j <=  $film->rate; $j++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for($j = 1; $j <=  5 - $film->rate; $j++)
                                                        <i class="fa fa-star grey"></i>
                                                    @endfor
                                                </div>
                                                <div class="date">
                                                    @if($film->release_date)
                                                        <i class="fa fa-calendar-o"></i> {{Carbon::createFromFormat('Y-m-d', $film->release_date)->format('d/m/y')}}
                                                    @endif
                                                </div>
                                                <p/>
                                                <p style="text-align: justify;">{{mb_substr($film->summary, 0, 305) . '...'}}</p>
                                                <p><a href="/film/{{$film->id}}"
                                                      class="arrow-button">
                                                        Thêm thông tin </a></p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-sm-push-1 slide-video">
                                                <a href="{{$film->trailer_url}}" data-vbtype="video"
                                                   class="venobox video vbox-item" style="position: relative;">
                                                    <span style="background: url({{$film->cover_url}}) center center / cover;"></span>
                                                    <i class="fa fa-play"></i>
                                                    <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525743052pGjRzVKJERttHfW.png">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div style="margin-right: -15px;margin-left: -15px" class="slick-slider">

                            <div id="comingSoon" class="owl-carousel slick-carousel slick-initialized">
                                <?php $i = 1;?>
                                @foreach($filmsComing as $film)
                                    <div data-dynamicclass="{{$i}}" class="slick-slide slick-cloned"
                                         data-slick-index="{{$i}}"
                                         aria-hidden="true" tabindex="-1">
                                        <div style="position: relative;">
                                            <img src="http://d2xbg5ewmrmfml.cloudfront.net/files/15300190044jGz0ckGMi2DtIO.png">
                                            <span style="background: url({{$film->avatar_url}}) center center / cover;"></span>
                                        </div>
                                        <header><h5 class="left no-underline">{{$film->name}}</h5>
                                        </header>
                                        @if($film->release_date)
                                            <p class="release-date">{{Carbon::createFromFormat('Y-m-d', $film->release_date)->format('d/m/y')}}</p>
                                        @endif
                                    </div>
                                    <?php $i++?>
                                @endforeach

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </section>


        <section style=" padding-top: 75px; padding-bottom: 75px; border-width: 0px 0px 0px 0px"
                 id="section_629a6e7822cb34310f76d9c72f4b6aa9" class="fw-main-row ">
            <div class="fw-container">
                <div class="fw-row">

                    <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 ">
                        <header>
                            <h3 class="center  no-underline " style="color: #4a4a4a">
                                Cần giúp đỡ ? Hãy liên hệ với chúng tôi </h3>
                        </header>
                        <aside style="color: #82242A; font-size: 46px">
                            <p style="text-align: center; color: #82242A!important ">0942929990</p></aside>
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
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/LeDahliaCoffee/&amp;tabs=timeline&amp;width=400&amp;height=250&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="400" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true">

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
                                    <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525421236EE6Two3Gmcm7zec.png" alt="Ledahlia" style="width: 300px">
                                </a>
                            </div>
                            <div class="announced">
                                <a href="#">
                                    <img src="http://online.gov.vn/PublicImages/2015/08/27/11/20150827110756-dathongbao.png" alt="logo-footer">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="about">
                            <p style="color: #fff; font-size: 27px; font-weight: 1000; letter-spacing: 3; margin-bottom: 30px">
                                CÔNG TY CỔ PHẦN ZGROUP</p>
                            <p style="max-width: 425px">Giấy CNĐKDN: 0107402262, đăng ký lần đầu ngày 20/04/2016, đăng ký thay đổi lần thứ 2 ngày 12/06/2018, cấp bởi Sở KHĐT thành phố Hà Nội</p>
                            <p>Địa chỉ: 106 Yết Kiêu, Phường Nguyễn Du, Quận Hai Bà Trừng, Hà Nội</p>
                            <p style="margin-bottom: 0px">COPYRIGHT 2018 ZGROUP JOINT STOCK COMPANY</p>
                            <p>ALL RIGHTS RESERVED</p>
                            <a href="#" style="display: none">
                                <img src="http://online.gov.vn/PublicImages/2015/08/27/11/20150827110756-dathongbao.png" alt="logo-footer" style="width: 150px; margin-top: -20px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{--<script src="http://specto.klevermedia.co.uk/wp-content/themes/specto/js/headhesive.min.js?ver=1.2.4"></script>--}}

    {{--<script src="http://specto.klevermedia.co.uk/wp-content/themes/specto/js/matchHeight.min.js?ver=0.7.0"></script>--}}

    {{--<script src="http://specto.klevermedia.co.uk/wp-content/themes/specto/js/venobox.min.js?ver=1.6.0"></script>--}}

    {{--<script src="http://specto.klevermedia.co.uk/wp-content/themes/specto/js/doubletaptogo.js?ver=3.0.2"></script>--}}

    {{--<script src="http://specto.klevermedia.co.uk/wp-content/themes/specto/js/custom.js?ver=1.0"></script>--}}

    {{--để show session--}}
    {{--<script src="http://specto.klevermedia.co.uk/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4"></script>--}}
    {{--<script src="http://specto.klevermedia.co.uk/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4"></script>--}}
    {{--<script src="http://specto.klevermedia.co.uk/wp-includes/js/jquery/ui/tabs.min.js?ver=1.11.4"></script>--}}
    <script src="js/filmzgroup-homepage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>

    <script>
        $('#current-film').owlCarousel({
            loop: true,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left left left-1 slick-arrow'></i>",
                "<i class='fa fa-angle-right right right-1 slick-arrow'></i>"
            ],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 2
                },
                900: {
                    items: 3
                },
                1200: {
                    items: 4
                },
                1500: {
                    items: 5
                },
            }
        });
        $('#comingSoon').owlCarousel({
            loop: true,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left left left-1 slick-arrow'></i>",
                "<i class='fa fa-angle-right right right-1 slick-arrow'></i>"
            ],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                300: {
                    items: 2
                },
                500: {
                    items: 3
                },
                700: {
                    items: 4
                },
                900: {
                    items: 5
                },
            }
        })

        $('#comingSoon .slick-slide').click(function () {
            var currentClass = $(this).data("dynamicclass");
            $("div." + currentClass).css({
                opacity: '1',
                height: 'auto',
                paddingBottom: '40px'
            }).siblings('.single-slide').css({opacity: '0', height: '0', paddingBottom: '0'});
            $(".slick-cloned").css('opacity', '.2');
            $("[data-dynamicclass=" + currentClass + "]").css('opacity', '1');
            return false;
        });

        jQuery(document).ready(function ($) {
            $('[data-dynamicclass="1"]').css('opacity', '1');
        })

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
        $(".time-past").click(function (event) {
            $(this).removeAttr("href")
        })
        var t = 0;
        $(".search").click(function(){
            if (t == 0){$(".movie-search").slideDown(); $(".navbar").css("padding-top","46px"); t=1}
            else { $(".movie-search").slideUp(); $(".navbar").css("padding-top","0px"); t=0 }
        })
        $('.venobox').venobox({
            autoplay: true
        });
    </script>


    </body>
@endsection
