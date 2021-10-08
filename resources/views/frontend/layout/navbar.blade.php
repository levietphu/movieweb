<div class="navbar-container">
         <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                  <span class="sr-only">Menu</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                  <span class="hl-search" aria-hidden="true"></span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                  <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i class="fas fa-filter"></i></a>
                  </button>
               </div>
               <div class="collapse navbar-collapse" id="halim">
                  <div class="menu-menu_1-container">
                     <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item {{URL::current()==route('home')?'actives':''}}"><a title="Trang Chủ" href="{{route('home')}}">Trang Chủ</a></li>
                        <li class="mega {{URL::current()==route('new_movie')?'actives':''}}"><a title="Phim Mới" href="{{route('new_movie')}}">Phim Mới</a></li>
                        <li class="mega dropdown">
                           <a title="Năm" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @foreach($release as $value)
                              <li><a title="Phim {{$value->name}}" href="{{route('release_time',$value->slug)}}">{{$value->name}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        <li class="mega dropdown">
                           <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @foreach($category as $value)
                              <li><a title="{{$value->name}}" href="{{route('cate',$value->slug)}}">{{$value->name}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        <li class="mega dropdown">
                           <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @foreach($national as $value)
                              <li><a title="{{$value->name}}" href="{{route('national',$value->slug)}}">{{$value->name}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        <li class="{{URL::current()==route('odd_movie')?'actives':''}}"><a title="Phim Lẻ" href="{{route('odd_movie')}}">Phim Lẻ</a></li>
                        <li class="{{URL::current()==route('series_movie')?'actives':''}}"><a title="Phim Bộ" href="{{route('series_movie')}}">Phim Bộ</a></li>
                        <li class="{{URL::current()==route('cate',$cate_rap->slug)?'actives':''}}"><a title="Phim Chiếu Rạp" href="{{route('cate',$cate_rap->slug)}}">Phim Chiếu Rạp</a></li>
                     </ul>
                  </div>
                  <ul class="nav navbar-nav navbar-left" style="background:#000;">
                     <li id="filter"><a href="#" style="color: #ffed4d;">Lọc Phim</a></li>
                  </ul>
               </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
               <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
               <div id="mobile-user-login"></div>
            </div>
         </div>
      </div>
      </div>