<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="">
                    <a href="{{route('admin')}}">
                        <img src="{{url('public/uploads/Config')}}/{{$logo_home->value}}" class="logo-icon-2" alt="" />
                    </a>
                </div>

            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{route('category.index')}}">
                        <div class="parent-icon icon-color-8"><i class="bx bx-task"></i>
                        </div>
                        <div class="menu-title">Quản lý thể loại</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('release_time.index')}}">
                        <div class="parent-icon icon-color-8"><i class="bx bx-task"></i>
                        </div>
                        <div class="menu-title">Quản lý năm phát hành</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('national.index')}}">
                        <div class="parent-icon icon-color-8"><i class="bx bx-task"></i>
                        </div>
                        <div class="menu-title">Quản lý quốc gia</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('actor.index')}}">
                        <div class="parent-icon icon-color-8"><i class="bx bx-task"></i>
                        </div>
                        <div class="menu-title">Quản lý diễn viên</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('seri.index')}}">
                        <div class="parent-icon icon-color-8"><i class="bx bx-task"></i>
                        </div>
                        <div class="menu-title">Quản lý seri phim</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('translate.index')}}">
                        <div class="parent-icon icon-color-8"><i class="bx bx-task"></i>
                        </div>
                        <div class="menu-title">Quản lý dịch và chất lượng</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('movie.index')}}">
                        <div class="parent-icon icon-color-4"><i class="bx bx-movie"></i>
                        </div>
                        <div class="menu-title">Quản lý Phim</div>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon icon-color-10"><i class="lni lni-cog"></i>
                        </div>
                        <div class="menu-title">Quản lý cấu hình </div>
                    </a>
                    <ul>
                        <li><a href="{{route('logo.index')}}"><div class="parent-icon icon-color-9"><i class="fadeIn animated bx bx-image"></i></div><div class="menu-title">Logo</div></a></li>

                        <li><a href="{{route('contact.index')}}"><div class="parent-icon icon-color-5"><i class="bx bx-group"></i></div><div class="menu-title">Contact</div></a></li>

                        <li><a href="{{route('ads.index')}}"><div class="parent-icon icon-color-1"><i class="fadeIn animated bx bx-spreadsheet"></i></div><div class="menu-title">Ads</div></a></li>
                    </ul>
                </li>
               {{--  <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon icon-color-4"><i class="bx bx-archive"></i>
                        </div>
                        <div class="menu-title">Quản lý sản phẩm </div>
                    </a>
                    <ul>
                        <li><a href="{{route('product.index')}}"><div class="parent-icon icon-color-6"><i class="lni lni-producthunt"></i></div><div class="menu-title">Sản phẩm</div></a></li>

                        <li><a href="{{route('attr.index')}}"><div class="parent-icon icon-color-6"><i class="fadeIn animated bx bx-battery"></i></div><div class="menu-title">Thuộc tính</div></a></li>

                        <li><a href="{{route('review.index')}}"><div class="parent-icon icon-color-6"><i class="fadeIn animated bx bx-star"></i></div><div class="menu-title">Đánh giá</div></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('blog.index')}}">
                        <div class="parent-icon icon-color-15"><i class="fadeIn animated bx bx-news"></i>
                        </div>
                        <div class="menu-title">Quản lý tin tức</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('banner.index')}}">
                        <div class="parent-icon icon-color-7"><i class="fadeIn animated bx bx-store"></i>
                        </div>
                        <div class="menu-title">Quản lý Banner</div>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon icon-color-10"><i class="lni lni-cog"></i>
                        </div>
                        <div class="menu-title">Quản lý cấu hình </div>
                    </a>
                    <ul>
                        <li><a href="{{route('logo.index')}}"><div class="parent-icon icon-color-9"><i class="fadeIn animated bx bx-image"></i></div><div class="menu-title">Logo</div></a></li>

                        <li><a href="{{route('contact.index')}}"><div class="parent-icon icon-color-5"><i class="bx bx-group"></i></div><div class="menu-title">Contact</div></a></li>

                        <li><a href="{{route('ads.index')}}"><div class="parent-icon icon-color-1"><i class="fadeIn animated bx bx-spreadsheet"></i></div><div class="menu-title">Ads</div></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('user.manager')}}">
                        <div class="parent-icon icon-color-4"><i class="bx bx-user-circle"></i>
                        </div>
                        <div class="menu-title">Quản lý Tài khoản</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('order.index')}}">
                        <div class="parent-icon icon-color-24"><i class="fadeIn animated bx bx-cart-alt"></i>
                        </div>
                        <div class="menu-title">Quản lý đơn hàng</div>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon icon-color-4"><i class="fadeIn animated bx bx-coin-stack"></i>
                        </div>
                        <div class="menu-title">Thống kê </div>
                    </a>
                    <ul>
                        <li><a href="{{route('ton-kho')}}"><div class="parent-icon icon-color-6"><i class="lni lni-producthunt"></i></div><div class="menu-title">Tồn kho</div></a></li>

                        <li><a href="{{route('ban-chay')}}"><div class="parent-icon icon-color-11"><i class="fadeIn animated bx bx-star"></i></div><div class="menu-title">Bán chạy</div></a></li>

                        <li><a href="{{route('doanh-thu')}}"><div class="parent-icon icon-color-20"><i class="fadeIn animated bx bx-cube"></i></div><div class="menu-title">Doanh thu</div></a></li>
                    </ul>
                </li> --}}

            </ul>
            <!--end navigation-->
        </div>