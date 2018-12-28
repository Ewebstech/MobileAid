<nav id="sidebar" class="nav-sidebar">
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{$sessiondata['avatar']}}" style="height: 50px; width: 50px;" alt="..." class="img-circle profile_img">
            
            </div>
            <div class="profile_info">
            <h2>{{$sessiondata['firstname']}} {{$sessiondata['lastname']}}</h2>
            <span class="label label-success" style="color: #000; font-size: bold;">{{ ucfirst($sessiondata['role']) }}</span>
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
                <a href="/edit-user" class=" wave-effect accordion-toggle "><i class="fa fa-pencil mr-2 sidebarpink"></i> Update Profile</a>
            </li>

            <li class="border-0"><h3>Cases &amp; Reports</h3><li>
            <li>
                <a href="{{route('handledCases')}}" class=" wave-effect accordion-toggle "><i class="fa fa-files-o mr-2 sidebarpink"></i> My Cases</a>
            </li>
            <li><h3>More</h3><li>

            <li>
                <a href="#" class=" wave-effect accordion-toggle"><i class="fa fa-ticket mr-2 sidebarlightgreen"></i>  Rate Patient</a>
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