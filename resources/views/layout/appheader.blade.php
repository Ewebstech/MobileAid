<div class="app-header1 header py-1 d-flex">
        <div class="container-fluid">
            <div class="d-flex" >
                <a class="header-brand" href="/" style="background: #fff; border-radius: 10px; " >
                    <img src="/site/img/MAlogo.JPG" alt="" class="header-brand-img" style="width: 80px; height: 40px !important; margin:5px">
                </a>
                <div class="menu-toggle-button">
                    <a class="nav-link wave-effect" href="#" id="sidebarCollapse">
                        <span class="fa fa-bars"></span>
                    </a>
                </div>
                <div>
                    <div class="searching">
                        <a href="javascript:void(0)" class="search-open searching1">
                            <i class="fa fa-search"></i>
                        </a>
                        <div class="search-inline">
                            <form>
                                <input type="text" class="form-control" placeholder="Searching...">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="javascript:void(0)" class="search-close">
                                    <i class="fa fa-times"></i>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex order-lg-2 ml-auto">
                    <div class="dropdown d-none d-md-flex" >
                        <a  class="nav-link icon full-screen-link">
                            <i class="fe fe-maximize floating"  id="fullscreen-button"></i>
                        </a>
                    </div>
                    <div class="dropdown d-none d-md-flex country-selector">
                        <a href="#" class="d-flex nav-link  leading-none" data-toggle="dropdown">
                            <img src="assets/images/us_flag.jpg" alt="img" class="avatar avatar-xs mr-1 align-self-center">
                            <div>
                                <strong class="text-white">English</strong>
                            </div>
                        </a>
                        
                    </div>
                    <div class="dropdown d-none d-md-flex">
                        <a class="nav-link icon" data-toggle="dropdown">
                            <i class="fa fa-bell-o floating"></i>
                            <span class=" nav-unread badge badge-danger  badge-pill">0</span>
                        </a>
                        {{-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="#" class="dropdown-item text-center">You have 4 notification</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item d-flex pb-3">
                                <div class="notifyimg">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div>
                                    <strong>2 new Messages</strong>
                                    <div class="small text-muted">17:50 Pm</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex pb-3">
                                <div class="notifyimg">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div>
                                    <strong> 1 Event Soon</strong>
                                    <div class="small text-muted">19-10-2018</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex pb-3">
                                <div class="notifyimg">
                                    <i class="fa fa-comment-o"></i>
                                </div>
                                <div>
                                    <strong> 3 new Comments</strong>
                                    <div class="small text-muted">05:34 Am</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex pb-3">
                                <div class="notifyimg">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </div>
                                <div>
                                    <strong> Application Error</strong>
                                    <div class="small text-muted">13:45 Pm</div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item text-center">See all Notification</a>
                        </div> --}}
                    </div>
                    <div class="dropdown d-none d-md-flex">
                        <a class="nav-link icon" data-toggle="dropdown">
                            <i class="fa fa-envelope-o floating"></i>
                            <span class=" nav-unread badge badge-warning  badge-pill">0</span>
                        </a>
                        {{-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="#" class="dropdown-item d-flex pb-3">
                                <img src="assets/images/faces/male/41.jpg" alt="avatar-img" class="avatar brround mr-3 align-self-center">
                                <div>
                                    <strong>Blake</strong> I've finished it! See you so.......
                                    <div class="small text-muted">30 mins ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex pb-3">
                                <img src="assets/images/faces/female/1.jpg" alt="avatar-img" class="avatar brround mr-3 align-self-center">
                                <div>
                                    <strong>Caroline</strong> Just see the my Admin....
                                    <div class="small text-muted">12 mins ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex pb-3">
                                <img src="assets/images/faces/male/18.jpg" alt="avatar-img" class="avatar brround mr-3 align-self-center">
                                <div>
                                    <strong>Jonathan</strong> Hi! I'am singer......
                                    <div class="small text-muted">1 hour ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex pb-3">
                                <img src="assets/images/faces/female/18.jpg" alt="avatar-img" class="avatar brround mr-3 align-self-center">
                                <div>
                                    <strong>Emily</strong> Just a reminder that you have......
                                    <div class="small text-muted">45 mins ago</div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item text-center">View all Messages</a>
                        </div> --}}
                    </div>
               
                    <div class="dropdown">
                        <a href="#" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
                            <img src="{{ $sessiondata['avatar'] }}" alt="profile-img" class="avatar avatar-md brround">
                            
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                            <a class="dropdown-item" href="/">
                                <i class="dropdown-icon si si-user"></i> My Profile
                            </a>
                            <a class="dropdown-item" href="/">
                                <i class="dropdown-icon si si-envelope"></i> Inbox
                            </a>
                            <a class="dropdown-item" href="/">
                                <i class="dropdown-icon  si si-settings"></i> Account Settings
                            </a>
                            <a class="dropdown-item" href="/logout">
                                <i class="dropdown-icon si si-power"></i> Log out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>