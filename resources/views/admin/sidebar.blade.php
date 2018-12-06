<nav id="sidebar" class="nav-sidebar">
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{$sessiondata['avatar']}}" style="height: 50px; width: 50px;" alt="..." class="img-circle profile_img img-responsive"  />
            
            </div>
            <div class="profile_info">
            <h2>{{$sessiondata['firstname']}} {{$sessiondata['lastname']}}</h2>
            <span class="label label-success" style="color: #000; font-size: bold;">{{ $sessiondata['role'] }}</span>
            </div>
        </div>
        
        <ul class="list-unstyled components" id="accordion">
           
            <li>
                <a href="/dashboard" class="accordion-toggle  wave-effect" aria-expanded="false">
                    <i class="fa fa-television mr-2 sidebarsuccess"></i>Dashboard
                </a>
               
            </li>

            <li class="border-0"><h3>Personal Information</h3><li>
            <li>
                <a href="/view-user" class=" wave-effect accordion-toggle "><i class="fa fa-eye mr-2 sidebarpink"></i> View Profile</a>
            </li>
            <li>
                <a href="/edit-user" class=" wave-effect accordion-toggle "><i class="fa fa-pencil mr-2 sidebarpink"></i>Update Profile</a>
            </li>

            <li class="border-0"><h3>Users Data</h3><li>
            <li>
            <a href="{{route('viewPatients')}}" class=" wave-effect accordion-toggle "><i class="fa fa-users mr-2 sidebarpink"></i> Patients</a>
            </li>
            <li>
                <a href="#" class=" wave-effect accordion-toggle "><i class="fa fa-user-md mr-2 sidebarpink"></i> Doctors</a>
            </li>

            <li><h3>Subscription</h3><li>

            <li>
                <a href="#Submenu9" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-futbol-o mr-2 sidebarred"></i> My Subscription
                </a>
                <ul class="collapse list-unstyled" id="Submenu9" data-parent="#accordion">
                    <li>
                        <a href="#">Choose Subscription Plan</a>
                    </li>
                    <li>
                        <a href="#">Subscription History</a>
                    </li>
                </ul>
            </li>

            <li><h3>Medical Need</h3><li>

            <li>
                <a href="#" class=" wave-effect accordion-toggle"><i class="fa fa-ticket mr-2 sidebarlightgreen"></i>  Schedule Appointments</a>
            </li>

            <li><h3>More</h3><li>

            <li>
                <a href="#" class=" wave-effect accordion-toggle"><i class="fa fa-ticket mr-2 sidebarlightgreen"></i>  Rate Doctor</a>
            </li>
            <li>
                <a href="#" class=" wave-effect accordion-toggle"><i class="fa fa-ticket mr-2 sidebarlightgreen"></i>  Support</a>
            </li>
            <li>
                <a href="#" class=" wave-effect accordion-toggle"><i class="fa fa-ticket mr-2 sidebarlightgreen"></i>  Terms of Use</a>
            </li>
        </ul>

        <div class="sidebar-footer hidden-small">
            <a href="emailservices.html">
                <span class="fa fa-envelope" aria-hidden="true"></span>
            </a>
            <a href="profile.html">
                <span class="fa fa-user" aria-hidden="true"></span>
            </a>
            <a href="editprofile.html">
                <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <a href="login.html">
                <span class="fa fa-sign-in" aria-hidden="true"></span>
                </a>
            <a href="/logout">
                <span class="fa fa-power-off" aria-hidden="true"></span>
            </a>
        </div>
    </nav>