<nav id="sidebar" class="nav-sidebar">
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{$sessiondata['avatar']}}" alt="..." style="height: 50px; width: 50px;" class="img-circle profile_img">
            
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
                <a href="/edit-user" class=" wave-effect accordion-toggle "><i class="fa fa-pencil mr-2 sidebarpink"></i> Update Profile</a>
            </li>

            <li>
                <a href="#" class=" wave-effect accordion-toggle"><i class="fa fa-ticket mr-2 sidebarlightgreen"></i>  Rate Doctor</a>
            </li>

            <li class="border-0"><h3>Subscription & Payment</h3><li>

            <li>
                <a href="{{route('selectSub')}}" class=" wave-effect accordion-toggle "><i class="fa fa-futbol-o mr-2 sidebarpink"></i> Select Subscription Plan</a>
            </li>
            <li>
                <a href="{{route('getRenewable')}}" class=" wave-effect accordion-toggle "><i class="fa fa-money mr-2 sidebarpink"></i> Subscription Payment</a>
             </li>
            <li>
                <a href="{{route('viewTransactions')}}#" class=" wave-effect accordion-toggle "><i class="fa fa-file mr-2 sidebarpink"></i>Transaction History</a>
            </li>

           
           
            <li><h3>Medicals</h3><li>
            <li>
                <a href="{{route('viewCases')}}" class=" wave-effect accordion-toggle"><i class="fa fa-files-o mr-2 sidebarlightgreen"></i>  My Cases</a>
            </li>
            <li>
                <a href="#" class=" wave-effect accordion-toggle"><i class="fa fa-ticket mr-2 sidebarlightgreen"></i>  Schedule Appointments</a>
            </li>

            <li><h3>More</h3><li>

            
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