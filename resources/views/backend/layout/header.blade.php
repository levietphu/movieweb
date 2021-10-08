<header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="left-topbar d-flex align-items-center">
                    <a href="" class="toggle-btn">  <i class="bx bx-menu"></i>
                    </a>
                </div>
                <div class="flex-grow-1 search-bar">
                    <div class="input-group">
                        <div class="input-group-prepend search-arrow-back">
                            <button class="btn btn-search-back" type="button"><i class="bx bx-arrow-back"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="right-topbar ml-auto">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown dropdown-user-profile">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="" data-toggle="dropdown">
                                <div class="media user-box align-items-center">
                                    <div class="media-body user-info">
                                        <p class="designattion mb-0"></p>
                                    </div>
                                    <img src="{{url('public/backend')}}/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="">
                                <div class="dropdown-divider mb-0"></div>   <a class="dropdown-item" href="{{route('logout')}}"><i
                                        class="bx bx-power-off"></i><span>Logout</span></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>