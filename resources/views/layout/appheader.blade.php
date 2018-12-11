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