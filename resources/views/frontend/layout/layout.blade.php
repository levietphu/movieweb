<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta name="theme-color" content="#234556">
      <meta http-equiv="Content-Language" content="vi" />
      <meta content="VN" name="geo.region" />
      <meta name="DC.language" scheme="utf-8" content="vi" />
      <meta name="language" content="Việt Nam">
      <link rel="shortcut icon" href="{{url('public/uploads/Config')}}/{{$logo_title->value}}" type="image/x-icon" />
      <meta name="revisit-after" content="1 days" />
      <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
      <title>@yield('title')</title>
      <meta name="description" content="Phim hay 2021 - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh" />
      <link rel="canonical" href="">
      <link rel="next" href="" />
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:title" content="Phim hay 2020 - Xem phim hay nhất" />
      <meta property="og:description" content="Phim hay 2020 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp" />
      <meta property="og:url" content="" />
      <meta property="og:site_name" content="Phim hay 2021- Xem phim hay nhất" />
      <meta property="og:image" content="" />
      <meta property="og:image:width" content="300" />
      <meta property="og:image:height" content="55" />
      {{-- Css --}}
      @include('frontend.layout.css')
   </head>
   <body class="home blog halimthemes halimmovies" data-masonry="">
      {{-- Header --}}
      @include('frontend.layout.header')
      {{-- Nav Bar --}}
      @include('frontend.layout.navbar')
      
      <div class="container">
         <div class="row fullwith-slider"></div>
         <div id="filter_show" class="halim-panel-filter" style="display: none;">

            <div id="ajax-filter" class="panel-collapse collapse in" aria-expanded="true" role="menu">    <div class="halim-search-filter">
                    <div class="btn-group col-md-12">
                        <form id="form-filter" class="form-inline" method="GET" action="{{route('filter')}}">
                            <div class="col-md-1 col-xs-12 col-sm-6">
                                <div class="filter-box">
                                <div class="filter-box-title">Sắp xếp</div>
                                    <select class="form-control select-2" id="sort" name="sort">
                                        <option value="">Sắp xếp</option>
                                        <option value="new">Mới nhất</option>
                                        <option value="viewcount">Xem nhiều</option>
                                        </select>              
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12 col-sm-6">   
                                <div class="filter-box">            
                                <div class="filter-box-title">Hình thức</div>                     
                                    <select class="form-control" id="type" name="type">
                                        <option value="">Hình thức</option>
                                        <option value="0">Phim lẻ</option>
                                        <option value="1">Phim bộ</option>
                                    </select>
                                </div>
                            </div>                  
                            <div class="col-md-1 col-xs-12 col-sm-6">   
                                <div class="filter-box">
                                <div class="filter-box-title">Tình trạng</div>    
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Tình trạng</option>
                                        <option value="0">Đang phát</option>
                                        <option value="1">Hoàn thành</option>
                                    </select>                                   
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12 col-sm-6">   
                                <div class="filter-box">
                                <div class="filter-box-title">Quốc gia</div>
                                    <select class="form-control" name="id_national">
                                        <option value="">Quốc gia</option>
                                        @foreach($national as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                  
                            <div class="col-md-1 col-xs-12 col-sm-6">   
                                <div class="filter-box">
                                <div class="filter-box-title">Năm</div>   
                                    <select class="form-control" name="id_release_time">
                                        <option value="">Năm</option>
                                        @foreach($release as $value)
                                        <option value="{{$value->id}}">Năm {{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                  
                            
                            <div class="col-md-3 col-xs-12 col-sm-6">   
                                <div class="filter-box">
                                <div class="filter-box-title">Thể loại</div>
                                    <select class="form-control" name="id_cate"> 
                                        <option value="">Thể loại</option>
                                       @foreach($category as $value)
                                       <option value="{{$value->id}}">{{$value->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>  

                            <div class="col-md-2 col-xs-12 col-sm-6">                       
                                <button type="submit" id="btn-movie-filter" class="btn btn-danger" style="background: #000;border-color: #000;color: #ffed4d;">Lọc phim</button>
                            </div>                                                    
                        </form>
                    </div>
                </div><!-- end panel-body -->
                </div>
         </div>
      </div>
       @yield('content')
      <div class="clearfix"></div>
      {{-- Footer --}}
      @include('frontend.layout.footer')
      <div id='easy-top'></div>
      {{-- JS  --}}
      @include('frontend.layout.js')
   </body>
</html>