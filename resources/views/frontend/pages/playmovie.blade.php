@extends('frontend.layout.layout')
@section('title',$name_episode)
@section('content')
<div class="container">
      <div class="row container" id="wrapper">
         <div class="halim-panel-filter">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-xs-6">
                     <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">Phim hay</a> » <span><a href="{{route('movie',$episode->episode_movie->slug)}}">{{$episode->episode_movie->name}}</a> » <span class="breadcrumb_last uppercase" aria-current="page">{{$episode->description_name}}</span></span></span></span></div>
                  </div>
               </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
               <div class="ajax"></div>
            </div>
         </div>
         <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
               <div class="clearfix wrap-content">
                  
                  <iframe width="100%" height="500" src="{{$episode->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  
                  <div class="button-watch">
                     <ul class="halim-social-plugin col-xs-4 hidden-xs">
                        <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                     </ul>
                     <ul class="col-xs-12 col-md-8">
                        <div id="autonext" class="btn-cs autonext">
                           <i class="icon-autonext-sm"></i>
                           <span><i class="fas fa-forward"></i> Autonext: <span id="autonext-status">On</span></span>
                        </div>
                        <div id="report" class="halim-switch"><i class="fas fa-attention"></i> Report</div>
                        <div class="luotxem"><i class="fas fa-eye"></i>
                           <span>1K</span> lượt xem 
                        </div>
                        <div class="luotxem">
                           <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="hl-forward"></i> Share</a>
                        </div>
                     </ul>
                  </div>
                  <div class="collapse" id="moretool">
                     <ul class="nav nav-pills x-nav-justified">
                        <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                        <div class="fb-save" data-uri="" data-size="small"></div>
                     </ul>
                  </div>
               
                  <div class="clearfix"></div>
                  <div class="clearfix"></div>
                  <div class="title-block">
                     
                     <div class="title-wrapper-xem full">
                        <h3 class="entry-title"><a href="" title="Tôi Và Chúng Ta Ở Bên Nhau" class="tl">{{$episode->name}}</a></h3>
                     </div>
                  </div>
                  <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                     <article id="post-37976" class="item-content post-37976"></article>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                     <div id="halim-ajax-list-server"></div>
                  </div>
                  <div id="halim-list-server">
                     <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="fas fa-server"></i> Vietsub</a></li>
                     </ul>
                     <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                           <div class="halim-server">
                              <ul class="halim-list-eps">
                                 @foreach($all_episode as $value)
                                 <li class="halim-episode"><span class="halim-btn {{route('playmovie',$value->slug)==URL::current()?'active':''}} halim-btn-2 halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="{{$loop->index+1}}" data-position="first" data-embed="0" data-title="Xem phim Tôi Và Chúng Ta Ở Bên Nhau - Tập 1 - Be Together - vietsub + Thuyết Minh" data-h1="Tôi Và Chúng Ta Ở Bên Nhau - tập 1">{{$loop->index+1}}</span></li>
                                 @endforeach
                              </ul>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="htmlwrap clearfix">
                     <div id="lightout"></div>
                  </div>
            </section>
            <section class="related-movies">
                  <div id="halim_related_movies-2xx" class="wrap-slider">
                     <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                     </div>
                     <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($can_view_movie as $value)
                        <article class="thumb grid-item post-38498">
                           <div class="halim-item">
                              <a class="halim-thumb" href="chitiet.php" title="Đại Thánh Vô Song">
                                 <figure><img class="lazy img-responsive" src="{{url('public/uploads')}}/{{$value->image}}" alt="{{$value->name}}" title="{{$value->name}}"></figure>
                                 <span class="status">{{$value->movie_episode()->orderby('created_at','desc')->first()->description_name}}/{{$value->all_episode}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$value->movie_episode()->orderby('created_at','desc')->first()->tran_episode->name}}</span> 
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                       <p class="entry-title">{{$value->name}}</p>
                                       <p class="original_title">{{$value->substitute_name}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </article>
                        @endforeach
                     </div>
                     <script>
                        jQuery(document).ready(function($) {            
                        var owl = $('#halim_related_movies-2');
                        owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
                     </script>
                  </div>
               </section>
         </main>
        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
               <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
                  <div class="section-bar clearfix">
                     <div class="section-title">
                        <span>Top Views</span>
                        <ul class="halim-popular-tab" role="tablist">
                           <li role="nav-item" class="active">
                              <a href="#tabs-link-1" class="nav-link" role="tab" data-toggle="tab" data-type="today" aria-selected="true">Day</a>
                           </li>
                           <li role="nav-item">
                              <a href="#tabs-link-2" class="nav-link" role="tab" data-toggle="tab" data-type="week" aria-selected="false">Week</a>
                           </li>
                           <li role="nav-item">
                              <a class="nav-link" role="tab" data-toggle="tab" data-type="month" aria-selected="false">Month</a>
                           </li>
                           <li role="nav-item">
                              <a class="nav-link" role="tab" data-toggle="tab" data-type="all" aria-selected="false">All</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <section class="tab-content">
                     <div role="tabpanel" id="tabs-link-1" class="tab-pane active">
                        <div class="popular-post">
                           @foreach($top_view_this_day as $value)
                           <div class="item post-37176">
                              <a href="{{route('movie',$value->slug)}}" title="{{$value->name}}">
                                 <div class="item-link">
                                    <img src="{{url('public/uploads')}}/{{$value->image}}" class="lazy post-thumb" title="{{$value->name}}" />
                                 </div>
                                 <p class="title">{{$value->name}}</p>
                              </a>
                              <div class="viewsCount" style="color: #9d9d9d;">{{$value->total_view}} lượt xem</div>
                              <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                     <div role="tabpanel" id="tabs-link-2" class="tab-pane">
                        <div class="popular-post">
                           @foreach($top_view_this_Week as $value)
                           <div class="item post-37176">
                              <a href="{{route('movie',$value->slug)}}" title="{{$value->name}}">
                                 <div class="item-link">
                                    <img src="{{url('public/uploads')}}/{{$value->image}}" class="lazy post-thumb" title="{{$value->name}}" />
                                 </div>
                                 <p class="title">{{$value->name}}</p>
                              </a>
                              <div class="viewsCount" style="color: #9d9d9d;">{{$value->total_view}} lượt xem</div>
                              <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                     <div role="tabpanel" id="tabs-link-3" class="tab-pane">
                        <div class="popular-post">
                           @foreach($top_view_this_Month as $value)
                           <div class="item post-37176">
                              <a href="{{route('movie',$value->slug)}}" title="{{$value->name}}">
                                 <div class="item-link">
                                    <img src="{{url('public/uploads')}}/{{$value->image}}" class="lazy post-thumb" title="{{$value->name}}" />
                                 </div>
                                 <p class="title">{{$value->name}}</p>
                              </a>
                              <div class="viewsCount" style="color: #9d9d9d;">{{$value->total_view}} lượt xem</div>
                              <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                     <div role="tabpanel" id="tabs-link-4" class="tab-pane">
                        <div class="popular-post">
                           @foreach($top_view_all as $value)
                           <div class="item post-37176">
                              <a href="{{route('movie',$value->slug)}}" title="{{$value->name}}">
                                 <div class="item-link">
                                    <img src="{{url('public/uploads')}}/{{$value->image}}" class="lazy post-thumb" title="{{$value->name}}" />
                                 </div>
                                 <p class="title">{{$value->name}}</p>
                              </a>
                              <div class="viewsCount" style="color: #9d9d9d;">{{$value->total_view}} lượt xem</div>
                              <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                  </section>
                  <div class="clearfix"></div>
               </div>
            </aside>
      </div>
      </div>
@endsection