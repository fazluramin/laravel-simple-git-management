@section('sidebar')

<!-- Sidebar navigation-->
<nav class="sidebar-nav">
        <ul id="sidebarnav">
             <li class="nav-devider"></li>
            <li class="nav-small-cap">MANAGE SYSTEM</li>
            <li> 
                <a class="has-arrow waves-effect waves-dark" href="{{route('super.server.list')}}" aria-expanded="false">
                    <i class="mdi mdi-gauge"></i>
                    <span class="hide-menu">Server List
                        
                    </span>
                </a>
            </li>
            <li> 
                <a class="has-arrow waves-effect waves-dark" href="{{route('super.git.project')}}" aria-expanded="false">
                    <i class="mdi mdi-gauge"></i>
                    <span class="hide-menu">Git Project
                        
                    </span>
                </a>
            </li>
            <li class="nav-devider"></li>
            <li class="nav-small-cap">MANAGE ACCOUNT</li>
            <li> <a class="has-arrow waves-effect waves-dark" href="{{route('super.admin.account')}}" aria-expanded="false">
                    <i class="mdi mdi-bullseye"></i>
                        <span class="hide-menu">Admin Account</span>
                </a>
            </li>
    
            <li> <a class="has-arrow waves-effect waves-dark" href="{{route('super.user.account')}}" aria-expanded="false">
                    <i class="mdi mdi-chart-bubble"></i>
                        <span class="hide-menu">User Account</span>
                </a>
            </li>
            <li class="nav-devider"></li>
            <li class="nav-small-cap">PROFILE</li>
            <li> <a class="has-arrow waves-effect waves-dark" href="{{route('super.index')}}" aria-expanded="false">
                <i class="mdi mdi-chart-bubble"></i>
                    <span class="hide-menu">My Account</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
        
@endsection