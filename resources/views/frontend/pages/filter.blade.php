@extends('frontend.layout.layout')
@section('title','Lọc Phim')
@section('content')
      <div class="container">
         <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">Phim hay</a> » <span class="breadcrumb_last" aria-current="page">Filter Movies</span></span></span></div>
                     </div>
                  </div>
               </div>
               <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                  <div class="ajax"></div>
               </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               <section>
                  <div class="section-bar clearfix">
                     <h1 class="section-title"><span>Danh sách Filter movie</span></h1>
                  </div>
                  <div class="halim_box">
                     @foreach($movie as $value)
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{route('movie',$value->slug)}}" title="{{$value->name}}">
                              <figure><img class="lazy img-responsive" src="{{url('public/uploads')}}/{{$value->image}}" title="{{$value->name}}"></figure>
                              <span class="status uppercase">{{$value->type==1?\App\Models\Episode::where('id_movie',$value->id)->orderby('created_at','desc')->first()->description_name:\App\Models\Episode::where('id_movie',$value->id)->first()->description_name}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{\App\Models\Episode::where('id_movie',$value->id)->first()->tran_episode->name}}</span> 
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
                  <div class="clearfix"></div>
                  @if($movie->lastPage()>1)
                  <div class="text-center">
                     <ul class='page-numbers'>
                        <li class="{{$movie->currentPage()<=1?'hidden':''}}"><a class="next page-numbers" href="{{$movie->previousPageUrl()}}"><i class="fas fa-arrow-left"></i></a></li>
                        @for($i=1;$i<=$movie->lastPage();$i++)
                           @if ($from < $i && $i <= $to)
                           <li>
                              @if($i==$movie->currentPage())
                              <<span aria-current="page" class="page-numbers current">{{$i}}</span>
                              @else
                              <a class="page-numbers" href="{{$movie->url($i)}}">{{$i}}</a>
                              @endif
                           </li>
                           
                           @endif
                        @endfor
                        {{-- <li><span class="page-numbers dots">&hellip;</span></li>
                        <li><a class="page-numbers" href="">55</a></li> --}}
                        <li class="{{$movie->lastPage()==$movie->currentPage()?'hidden':''}}"><a class="next page-numbers" href="{{$movie->nextPageUrl()}}"><i class="fas fa-arrow-right"></i></a></li>
                     </ul>
                  </div>
                  @endif
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