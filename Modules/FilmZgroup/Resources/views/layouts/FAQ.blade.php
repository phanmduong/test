<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link rel="shortcut icon" href="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525764756TOI3CROQKmr7chO.ico" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://ledahlia.vn/css/filmzgroup.css" media="all">
    <link rel="stylesheet" id="fw-googleFonts-css" href="http://fonts.googleapis.com/css?family=Roboto+Condensed%3A300%2Cregular&amp;subset=latin-ext&amp;ver=4.9.4" media="all">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        #hero .carousel-inner .item:before, #content_hero:before{
            position: absolute;
            /*    top: 0;
            */    right: 0;
            /*    bottom: 0;
            */    left: 0;
            display: block;
            content: '';
            background-image: -webkit-gradient( linear, right bottom, right top, color-stop(0, rgba(0, 0, 0, 0)), color-stop(1, rgb(0, 0, 0)) );
            background-image: -o-linear-gradient(bottom, rgb(0, 0, 0) , rgba(0, 0, 0, 0)  , rgb(0, 0, 0));
            background-image: -moz-linear-gradient(bottom, rgb(0, 0, 0) , rgba(0, 0, 0, 0)  , rgb(0, 0, 0));
            background-image: -webkit-linear-gradient(bottom, rgb(0, 0, 0) , rgba(0, 0, 0, 0)  , rgb(0, 0, 0));
            background-image: -ms-linear-gradient(bottom, rgb(0, 0, 0) , rgba(0, 0, 0, 0)  , rgb(0, 0, 0));
            background-image: linear-gradient(to bottom, rgb(0, 0, 0) , rgba(0, 0, 0, 0)  , rgb(0, 0, 0));
        }
        #content_hero:before {
            height: 100%;
        }
        #min-width {
            min-width: 177%
        }
        @media (max-width: 768px){
            #min-width { min-width: 0px }
        }
        body {
            overflow-x: initial;
        }

        .wrap-forms sup {
            font-size: 16px;
            top: 0;
            left: 2px;
        }

        .field-textarea, .field-text {
            margin-bottom: 20px;
            width: 100%
        }

        ::-moz-selection {
            background-color: #82242A;
        }

        ::selection {
            background-color: #82242A;
        }

        a:active, a:visited, .btn-ghost, input[type="submit"], .btn-ghost i, a.arrow-button, .tabs ul li.ui-state-active a, .accordion h2.ui-state-active, .accordion h3.ui-state-active, .accordion h4.ui-state-active, .live-search i, .comingSoon-slides span.title, .news article .categories, .single-tags i, .single-tags a:hover, .social-share a, .pagination a:hover, .sidebar .widget .search-form label:before, .sidebar .widget h4, .sidebar .widget ul li a:hover, .sidebar .widget .tagcloud a:hover, .sidebar .movie-search-btn, ul.show-times li.today i, .icon-row span i, .icon-box i, .comments .date, .comment-respond #submit, .news-carousel .date, footer h6, footer .copyright a:hover, .single-post .leave-comment, .single-post .comments .comments-count, .site-name, .movie-tabs span.title {
            color: #82242A;

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

        .fw-row {
            margin: 0px;
        }

        .icon-row .col {
            vertical-align: middle;
        }

        .submit {
            margin-top: 30px;
        }

        .submit input {
            margin-left: 15px;
            width: 180px;
        }
        .social {
            position: relative;
            padding-bottom: 250px;
            height: 0;
            overflow: hidden;
        }

        .social iframe {
            position: absolute;
            top:0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        @media  only screen and (max-width: 500px) {
            .submit input {
                width: 100%;
                margin-left: 0px
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








    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        body {
            overflow-x: initial;
        }
        .single-post h1:after, .single-post h2:after, .single-post h3:after, .single-post h4:after, .single-post h5:after, .single-post h6:after, :not(header) > h1:after, :not(header) > h2:after, :not(header) > h3:after, :not(header) > h4:after, :not(header) > h5:after, :not(header) > h6:after {
            background-image: linear-gradient(to right, #ffa8b5, #82242A)!important;
        }
        .sidebar .widget h4 {
            color: #82242A !important;
        }
        .nav li:after {
            background-image: linear-gradient(to right,#ffa8b5, #82242A) !important;
        }
        h2:after, h3:after, h4:after, h5:after, .edit-link a, .nav li:after, .nav li.active a:after, .nav li.current_page_parent a:after, .nav .dropdown-menu, .btn-default, .slick-slider .slick-arrow, .tabs ul li a:after, .tabs.pill-style ul li.ui-state-active a, .movie-search .btn {
            background-image: linear-gradient(to right, #ffa8b5, #82242A) !important;
        }
        footer h6 {
            color: #82242A !important;
        }
        ::selection {
            background: #82242A !important;
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
        body  {
            overflow-x: initial;
            font: Roboto Condensed latin-ext regular;
            color: #717171;
            font-size: 16px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: Roboto Condensed, latin-ext;
            font-weight: 300;
        }

        h2:after, h3:after, h4:after, h5:after, .edit-link a, .nav li:after, .nav li.active a:after, .nav li.current_page_parent a:after, .nav .dropdown-menu, .btn-default, .slick-slider .slick-arrow, .tabs ul li a:after, .tabs.pill-style ul li.ui-state-active a, .movie-search .btn {
            background-image: linear-gradient(to right, #ffa8b5, #82242A) !important;
        }

        a:active, a:visited, .btn-ghost, input[type="submit"], .btn-ghost i, a.arrow-button, .tabs ul li.ui-state-active a, .accordion h2.ui-state-active, .accordion h3.ui-state-active, .accordion h4.ui-state-active, .live-search i, .comingSoon-slides span.title, .news article .categories, .single-tags i, .single-tags a:hover, .social-share a, .pagination a:hover, .sidebar .widget .search-form label:before, .sidebar .widget h4, .sidebar .widget ul li a:hover, .sidebar .widget .tagcloud a:hover, .sidebar .movie-search-btn, ul.show-times li.today i, .icon-row span i, .icon-box i, .comments .date, .comment-respond #submit, .news-carousel .date, footer h6, footer .copyright a:hover, .single-post .leave-comment, .single-post .comments .comments-count, .site-name, .movie-tabs span.title {
            color: #82242A;

        }
        .nav li.active a:after, .nav li.current_page_parent a:after {
            background-image: linear-gradient(to right, #ffa8b5, #82242A)
        }
        a.btn-default {
            background-image: linear-gradient(to right, #ffa8b5, #82242A)
        }
        @media (max-width: 767px) {
            .nav li.active a {
                color: #82242A;
            }
        }
    </style>
</head>
<body>


<div class="movie-search" style="height: 46px; display: none; transition: transform 0.3s">
    <form role="search" method="get" id="searchform" action="{{url('/film')}}">
        <div>
            <input type="text" value="" name="search" id="search" placeholder="Tìm kiếm phim">
            <input type="submit" id="searchsubmit" class="btn btn-default" value="Search">
            <input type="hidden" name="post_type" value="movie">
        </div>
    </form>
</div>

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
                <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525421236EE6Two3Gmcm7zec.png" alt="Ledahlia" style="margin-top: -20px; width: 178px">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="margin-right: 20px">
                <span class="sr-only"></span>
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse ">
            <ul id="menu-main-navigation" class="nav navbar-nav">
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-194 current-menu-item curent_page_item dropdown">
                    <a title="Movies" href="/film?category=showing" class="dropdown-toggle" aria-haspopup="false">&nbsp;&nbsp;&nbsp;Phim&nbsp;&nbsp;&nbsp;</a>
                    <ul role="menu" class="dropdown-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-246">
                            <a title="All movies" style="color: white!important" href="/film">Tất cả phim</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-229"><a title="News" href="/blog">Tin
                        tức</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254"  style="display: none"><a title="Coffee" href="Coffee.html">Cà
                        phê</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254" style="display: none"><a title="Events" href="Events.thml">Sự
                        kiện</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-210 active"><a title="Contact us" href="/contact-us">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="content_hero" style="background-image: url(http://specto.klevermedia.co.uk/wp-content/uploads/2017/07/hero-contact.jpg);">
    <img src="http://specto.klevermedia.co.uk/wp-content/themes/specto/images/scroll-arrow.svg" alt="Scroll down" class="scroll">
    <div class="container">
        <div class="row blurb">
            <div class="col-md-9">
                <span class="title">Bạn có thắc mắc?</span>
                <header>
                    <h1>{{$title}}</h1>
                </header>
            </div>
        </div>
    </div>
</div>
<div class="fw-page-builder-content">

    @yield('content')

    <section style=" padding-top: 75px; padding-bottom: 75px; border-width: 1px 0px 0px 0px" id="section_f9b06791246240ccbba1f7b5ae56aaab" class="fw-main-row ">
        <div class="fw-container">
            <div class="fw-row">

                <div style="padding: 0 15px 0 15px;" class="fw-col-xs-12 ">
                    <header>
                        <h3 class="center  no-underline " style="color: #4a4a4a">
                            Cần giúp đỡ ? Hãy liên hệ với chúng tôi </h3>
                    </header>
                    <aside style="color: #82242A; font-size: 46px">
                        <p style="text-align: center; color: #82242A!important">0942929990</p></aside>
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
                        <p style="max-width: 425px">Giấy CNĐKDN: 0107402262, đăng ký lần đầu ngày 20/04/2016, đăng ký thay đổi lần thứ 2 ngày
                            12/06/2018, cấp bởi Sở KHĐT thành phố Hà Nội</p>
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

</body>
<script type="text/javascript">
    var t = 0;
    $(".search").click(function(){
        if (t == 0){$(".movie-search").slideDown(); $(".navbar").css("padding-top","46px"); t=1}
        else { $(".movie-search").slideUp(); $(".navbar").css("padding-top","0px"); t=0 }
    })
</script>
</html>
