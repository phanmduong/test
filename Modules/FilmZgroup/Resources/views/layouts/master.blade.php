<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525764756TOI3CROQKmr7chO.ico" />

    <style>
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

    body {
        overflow-y: initial;
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
        overflow-x: unset!important;
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
</style>
</head>
<body>

@yield('content')

{{--<script src="http://specto.klevermedia.co.uk/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script>--}}
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/vue.min.js"></script>
<script type="text/javascript">
    function paginator(currentPageData, totalPagesData) {
        var page = [];
        var currentPage = currentPageData;
        var totalPages = totalPagesData;

        var startPage = (currentPage - 2 > 0 ? currentPage - 2 : 1);
        for (var i = startPage; i <= currentPage; i++) {
            page.push(i);
        }

        var endPage = (5 - page.length + currentPage >= totalPages ? totalPages : 5 - page.length + currentPage);

        for (var i = currentPage + 1; i <= endPage; i++) {
            page.push(i);
        }

        if (page && page.length < 5) {
            var pageData = Object.assign(page);
            for (var i = page[0] - 1; i >= (page[0] - (5 - page.length) > 0 ? page[0] - (5 - page.length) : 1); i--) {
                pageData.unshift(i);
            }
            page = pageData;
        }
        return page;
    }
</script>
<script type="text/javascript">
    $('.social-share > a').click(function () {
        $('.social-share > a').css('display', 'none');
        $('.social-share > .share').slideDown()
    })
</script>
@stack('scripts')
</body>
</html>