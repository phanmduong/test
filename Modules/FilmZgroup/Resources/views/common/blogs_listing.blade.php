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
                        <a href="tel:123456789">
                            <i class="fa fa-phone"></i> 123 456 789 </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="navbar-header">
            <a href="/" title="Ledahlia" class="logo">
                <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525421236EE6Two3Gmcm7zec.png" alt="Ledahlia"
                     style="margin-top: -20px;  width: 178px">
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
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown ">
                    <a title="Movies" href="/film" class="dropdown-toggle" aria-haspopup="false">Phim mới</a>
                    <ul role="menu" class="dropdown-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-246">
                            <a title="All movies" style="color: white!important" href="/film">Tất cả phim</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-229  menu-item-194 active">
                    <a title="News" href="/blog">Tin tức</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254"><a title="Coffee"
                                                                                                      href="Coffee.html">Cà
                        phê</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254"><a title="Events"
                                                                                                      href="Events.thml">Sự
                        kiện</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-210 "><a title="Contact us"
                                                                                                             href="/contact-us">Liên
                        hệ</a></li>
            </ul>
        </div>
    </div>
</div>
<body class="archive post-type-archive post-type-archive-movie masthead-fixed list-view full-width">
<div id="content_hero"
     style="background-image: url(http://specto.klevermedia.co.uk/wp-content/uploads/2017/11/her-whatson.png);">
    <img src="http://specto.klevermedia.co.uk/wp-content/themes/specto/images/scroll-arrow.svg" alt="Scroll down"
         class="scroll">
    <div class="container">
        <div class="row blurb">
            <div class="col-md-9">
                <span class="title">{{$sm_title}}</span>
                <header>
                    <h1>{{$title}}</h1>
                </header>
            </div>
        </div>
    </div>
</div>


<div class="container section news">
    <div class="row">
        <div class="col-sm-8 col-md-8" style="padding-top: 61px">
            <?php $limit_summary = 500;?>
            @if(count($blogs) > 0)
                @foreach($blogs as $blog)
                    <article
                            class="post post-239 type-post status-publish format-standard has-post-thumbnail hentry category-awards category-whats-hot tag-tag-1 tag-tag-2">
                        <a href="/blog/post/{{$blog['id']}}" class="img">
                            <aside>
                                <div>
                                    <i class="fa fa-link"></i>
                                    <span class="date">{{$blog['title']}}</span>
                                </div>
                            </aside>
                            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1526147127mwbjsNl1VSh2OLH.png">
                            <span class="image" href="/blog/post/{{$blog['id']}}"
                                  style="background: url({{$blog['url']}}) center center / cover;"></span>
                        </a>
                        <span class="categories">
                            @if($blog['category'])
                                    <a href="/blog?category={{$blog['category']}}"
                                       rel="category tag">{{$blog['category']}}</a>
                            @endif
                        </span>
                        <h2>{{$blog['title']}}</h2>
                        <p>{{substr($blog['content'],0,$limit_summary) . '...'}}</p>
                        <a href="/blog/post{{$blog['id']}}" class="btn btn-ghost"
                           title="{{$blog['title']}}">
                            <span>Xem tất cả</span>
                        </a>
                    </article>
                @endforeach
                <div id="pagination-blogs" style="margin-top: 40px">

                    <nav class="navigation pagination" role="navigation">
                        <div class="nav-links">
                            <a href="/blog?page=1&search={{$search}}" class=" page-numbers">
                                Đầu
                            </a>
                            <a v-for="page in pages" v-bind:href="'/blog?page='+page+'&search={{$search}}'"
                               v-bind:class="'page-numbers ' + (page=={{$current_page}} ? 'current' : '')">
                                @{{page}}
                            </a>
                            <a href="/blog?page={{$total_pages}}&search={{$search}}" class=" next page-numbers">
                                Cuối
                            </a>
                        </div>
                    </nav>

                </div>
            @else
                <div>Nothing</div>
            @endif

        </div>
        <aside class="col-sm-3 col-sm-push-1 sidebar">
             <div class="gdlr-item-start-content sidebar-right-item">


                <div id="text-2" class="widget widget_text gdlr-item gdlr-widget"><h4
                            class="gdlr-widget-title">Film Zgroup</h4>
                    <div class="clear"></div>
                    <div class="textwidget">Mini cinema.
                    </div>
                </div>
                <div id="gdlr-recent-portfolio-widget-2"
                     class="widget widget_gdlr-recent-portfolio-widget gdlr-item gdlr-widget"><h4
                            class="gdlr-widget-title">Bài viết mới nhất</h4>
                    <div class="clear"></div>
                    <div class="gdlr-recent-port-widget">
                        @foreach($topNewBlogs as $blog)
                            <div class="recent-post-widget cat-item">
                                <div class="recent-post-widget-thumbnail"><a
                                            href="/blog/post/{{$blog['id']}}"><img
                                                src="{{generate_protocol_url($blog['url'])}}"
                                                alt="" width="150" height="150"></a></div>
                                <div class="recent-post-widget-content">
                                    <div class="recent-post-widget-title"><a
                                                href="/blog/post/{{$blog['id']}}">{{$blog['title']}}</a>
                                    </div>
                                    <div class="recent-post-widget-info">
                                        <div class="blog-info blog-date"><i class="fa fa-clock-o"></i><a
                                            >{{timeCal(date($blog['created_at']))}}</a></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        @endforeach
                        <div class="clear"></div>
                    </div>
                </div>
                <div id="gdlr-recent-portfolio-widget-3"
                     class="widget widget_gdlr-recent-portfolio-widget gdlr-item gdlr-widget"><h4
                            class="gdlr-widget-title">Bài viết nổi bật</h4>
                    <div class="clear"></div>
                    <div class="gdlr-recent-port-widget">
                        @foreach($topViewBlogs as $blog)
                            <div class="recent-post-widget">
                                <div class="recent-post-widget-thumbnail"><a
                                            href="/blog/post/{{$blog['id']}}"><img
                                                src="{{generate_protocol_url($blog['url'])}}"
                                                alt="" width="150" height="150"></a></div>
                                <div class="recent-post-widget-content">
                                    <div class="recent-post-widget-title"><a
                                                href="/blog/post/{{$blog['id']}}">{{$blog['title']}}</a>
                                    </div>
                                    <div class="recent-post-widget-info">
                                        <div class="blog-info blog-date"><i class="fa fa-clock-o"></i><a
                                            >{{timeCal(date($blog['created_at']))}}</a></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        @endforeach
                        <div class="clear"></div>
                    </div>
                </div>
                <div id="tag_cloud-2" class="widget widget_tag_cloud gdlr-item gdlr-widget"><h4
                            class="gdlr-widget-title ">Tags</h4>
                    <div class="clear"></div>
                    <div class="tagcloud">
                        @foreach($topTags as $tag)
                            <a href="/{{$link}}?page=1&search=&tag={{$tag->tag}}"
                               class="tag-cloud-link tag-link-11 tag-link-position-1"
                               style="font-size: 8pt;" aria-label="{{$tag->tag}}">{{$tag->tag}}</a>
                        @endforeach
                    </div>
                </div>
            </div>

        </aside>
    </div>
</div>
</body>
<link rel='stylesheet' id='style-custom-css'
      href='http://demo.goodlayers.com/hotelmaster/dark/wp-content/themes/hotelmaster/stylesheet/style-custom.css?1522574846&#038;ver=5ed7c316c9b1ef9b04fe581cf7839fe5'
      type='text/css' media='all'/>
<link rel='stylesheet' id='style-css'
      href='http://demo.goodlayers.com/hotelmaster/dark/wp-content/themes/hotelmaster/style.css?ver=5ed7c316c9b1ef9b04fe581cf7839fe5'
      type='text/css' media='all'/>
<style>
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

    /*    .owl-carousel .owl-dots.disabled,.owl-carousel .owl-nav.disabled{display:none}
    */
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

    @media (max-width: 991px) {
        .sidebar .widget h4 {
            font-size: 17px
        }
    }

    @media (max-width: 991px) and (min-width: 767px ) {
        .sidebar {
            padding: 2px 11px;
        }
    }

    .section {
        padding-top: 30px
    }

    .owl-carousel .item {
        position: relative;
        z-index: 100;
        -webkit-backface-visibility: hidden;
    }

    .slick-slide .movie-poster span {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }

    /* end fix */
    .owl-nav > div {
        margin-top: -26px;
        position: absolute;
        top: 50%;
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

    owl-carousel .owl-dots, .owl-carousel .owl-nav {
        display: none
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

    .pagination .nav-links {
        margin-top: 50px;
        padding-top: 30px;
        border-top: 1px solid #d8d8d8;
    }

    .img > span {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }

    ::-moz-selection {
        background-color: #ec7532;
    }

    ::selection {
        background-color: #ec7532;
    }

    a:active, a:visited, .btn-ghost, input[type="submit"], .btn-ghost i, a.arrow-button, .tabs ul li.ui-state-active a, .accordion h2.ui-state-active, .accordion h3.ui-state-active, .accordion h4.ui-state-active, .live-search i, .comingSoon-slides span.title, .news article .categories, .single-tags i, .single-tags a:hover, .social-share a, .pagination a:hover, .sidebar .widget .search-form label:before, .sidebar .widget h4, .sidebar .widget ul li a:hover, .sidebar .widget .tagcloud a:hover, .sidebar .movie-search-btn, ul.show-times li.today i, .icon-row span i, .icon-box i, .comments .date, .comment-respond #submit, .news-carousel .date, footer h6, footer .copyright a:hover, .single-post .leave-comment, .single-post .comments .comments-count, .site-name, .movie-tabs span.title {
        color: #ec7532;

    }

    .movie-tabs span.title {
        color:
    }

    blockquote:before, .error-search .search-submit, ul.social-profiles li a:hover, .btn-default:before, .btn-ghost:before, .btn-primary, input[type="submit"]:hover, ul.show-times li.today .time, .comment-respond #submit:hover, .fw-testimonials .fw-testimonials-pagination a:hover, .fw-testimonials .fw-testimonials-pagination a.selected, .edit-link:hover a {
        background-color: #ec7532;
    }

    h2:after, h3:after, h4:after, h5:after, .edit-link a, .nav li:after, .nav li.active a:after, .nav li.current_page_parent a:after, .nav .dropdown-menu, .btn-default, .slick-slider .slick-arrow, .tabs ul li a:after, .tabs.pill-style ul li.ui-state-active a, .movie-search .btn {
        background-image: linear-gradient(to right, #fbbd61, #ec7532);
    }

    .slick-slide .movie-poster:before, .accordion.pill-style h2.ui-state-active:before, .accordion.pill-style h3.ui-state-active:before, .accordion.pill-style h4.ui-state-active:before, .news article .img:before, .comments::-webkit-scrollbar-thumb {
        background-image: linear-gradient(to bottom, #fbbd61, #ec7532);
    }

    .btn-ghost, input[type="submit"], .comingSoon-slides .video i, .pagination a:hover, .pagination .current, .sidebar .widget .tagcloud a:hover, .comment-respond #submit {
        border-color: #ec7532;
    }

    span.title, .heading .search a:hover i, .navbar.banner--clone .nav li.active a, .navbar.banner--clone .nav li.current_page_parent a, .comingSoon-slides a.arrow-button:hover, .social-share a:hover, .social-share a:hover i, .sidebar .widget ul li.current-cat a, .share a:hover, footer ul li a:hover, footer ul li a:hover .fa, a:hover {
        color: #fbbd61;
    }

    input:focus, input:active, textarea:focus, textarea:active, select:focus, select:active, .share a:hover {
        border-color: #fbbd61;
    }

    .navbar-toggle .icon-bar, button.btn-default:hover, button.btn-primary:hover {
        background-color: #fbbd61;
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

    .search {
        display: none !important
    }

    .movie-tabs .image {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }

    @media (max-width: 767px) {
        .movie-tabs img {
            width: 100%
        }

        .movie-tabs > div > div {
            margin-bottom: 40px
        }
    }

</style>
@push('scripts')
    <script>
        var pagination = new Vue({
            el: '#pagination-blogs',
            data: {
                pages: []
            },
        });

        pagination.pages = paginator({{$current_page}},{{$total_pages}});
    </script>
@endpush