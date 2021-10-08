 @extends('frontend.layout.layout')
 @section('title','Phim hay 2021 - Xem phim hay nhất')
 @section('content')
 <div class="container">
         <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                  <div class="ajax"></div>
               </div>
            </div>
            <div class="col-xs-12 carausel-sliderWidget">
               <section id="halim-advanced-widget-4">
                  <div class="section-heading">
                     <a href="{{route('cate',$cate_rap->slug)}}" title="Phim Chiếu Rạp">
                     <span class="h-text">Phim Chiếu Rạp</span>
                     </a>
                     <ul class="heading-nav pull-right hidden-xs">
                        <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
                     </ul>
                  </div>
                  <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
                     @foreach($movie_chieu_rap as $value)
                     <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{route('movie',$value->slug)}}" title="{{$value->name}}">
                              <figure><img class="lazy img-responsive" src="{{url('public/uploads')}}/{{$value->image}}" title="{{$value->name}}"></figure>
                              <span class="status">{{$value->tran_movies()->orderby('created_at','desc')->first()->name}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$value->movie_episode()->orderby('created_at','desc')->first()->tran_episode->name}}</span> 
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
               </section>
               <div class="clearfix"></div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               <section id="halim-advanced-widget-2">
                  <div class="section-heading">
                     <a href="danhmuc.php" title="Phim Bộ">
                     <span class="h-text">Phim Bộ</span>
                     </a>
                  </div>
                  <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                     @foreach($movie_bo as $value)
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{route('movie',$value->slug)}}">
                              <figure><img class="lazy img-responsive" src="{{url('public/uploads')}}/{{$value->image}}" title="{{$value->name}}"></figure>
                              <span class="status uppercase">{{$value->movie_episode()->orderby('created_at','desc')->first()->description_name}}/{{$value->all_episode}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$value->movie_episode()->orderby('created_at','desc')->first()->tran_episode->name}}</span> 
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
               </section>
               <div class="clearfix"></div>
               <section id="halim-advanced-widget-2">
                  <div class="section-heading">
                     <a href="danhmuc.php" title="Phim Lẻ">
                     <span class="h-text">Phim Lẻ</span>
                     </a>
                  </div>
                  <div id="halim-advanced-widget-2-ajax-box" class="halim_box">

                     @foreach($movie_le as $value)
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{route('movie',$value->slug)}}">
                              <figure><img class="lazy img-responsive" src="{{url('public/uploads')}}/{{$value->image}}" title="{{$value->name}}"></figure>
                              <span class="status uppercase">{{$value->movie_episode()->orderby('created_at','desc')->first()->description_name}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$value->movie_episode()->orderby('created_at','desc')->first()->tran_episode->name}}</span> 
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
               </section>
               <div class="clearfix"></div>
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