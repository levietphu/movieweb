@extends('frontend.layout.layout')
@section('title','Phim '.$name_movie)
@section('content')
<div class="container">
         <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="danhmuc.php">Phim hay</a> » <span><a href="danhmuc.php">{{$movie->nationals->name}}</a> » <span class="breadcrumb_last" aria-current="page">{{$movie->name}}</span></span></span></span></div>
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
                    
                     <div class="halim-movie-wrapper">
                        <div class="title-block">
                           <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                              <div class="halim-pulse-ring"></div>
                           </div>
                        </div>
                        <div class="movie_info col-xs-12">
                           <div class="movie-poster col-md-3">
                              <img class="movie-thumb" src="{{url('public/uploads')}}/{{$movie->image}}">
                              <div class="bwa-content">
                                 <div class="loader"></div>
                                 <a href="{{route('playmovie',$movie->movie_episode()->first()->slug)}}" class="bwac-btn">
                                 <i class="fa fa-play" style="margin-left: 16px;margin-top: 10px; font-size: 28px;"></i>
                                 </a>
                              </div>
                           </div>
                           <div class="film-poster col-md-9">
                              <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->name}}</h1>
                              <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->substitute_name}}</h2>
                              <ul class="list-info-group">
                                 <li class="list-info-group-item"><span>Trạng Thái</span> : 
                                    @foreach($movie->tran_movies as $value)
                                    <span class="{{$value->type==0?'episode':'quality'}}">{{$value->name}}</span>
                                    @endforeach
                                 </li>
                                 <li class="list-info-group-item"><span>Điểm IMDb</span> : <span class="imdb">{{$movie->IMDb==''?'N/a':$movie->IMDb}}</span></li>
                                 <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->type==1?$movie->movie_duration.' Phút '.'/ Tập':$movie->movie_duration.' Phút'}}</li>
                                 <li class="list-info-group-item"><span>Thể loại</span> : 
                                    @foreach($movie->cate_movies as $value)
                                    <a href="" rel="category tag">{{$value->name}}</a>{{$loop->index+1==count($movie->cate_movies)?'.':','}} 
                                    @endforeach
                                 </li>
                                 <li class="list-info-group-item"><span></span>Quốc gia : <a href="" rel="tag">{{$movie->nationals->name}}</a></li>
                                 <li class="list-info-group-item"><span>Đạo diễn</span> : <a class="director" rel="nofollow">{{$movie->director==''?'N/a':
                           $movie->director}}</a></li>
                                 <li class="list-info-group-item last-item" style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;"><span>Diễn viên</span> : 
                                    @foreach($movie->actor_movies as $value)
                                    <a href="{{route('actor',$value->slug)}}" rel="nofollow" title="{{$value->name}}">{{$value->name}}</a>{{$loop->index+1==count($movie->actor_movies)?'.':','}}
                                    @endforeach
                                 </li>
                              </ul>
                              <div class="movie-trailer hidden"></div>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div id="halim_trailer"></div>
                     <div class="clearfix"></div>
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                              Phim <a href="">{{$movie->name}}</a> - {{$movie->release->name}} - {{$movie->nationals->name}}:
                              <p>{!!$movie->content!!}</p>
                           </article>
                        </div>
                     </div>
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
            <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
         </div>
      </div>
@endsection