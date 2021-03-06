@section('sidebar')

<!-- Sidebar navigation-->
<nav class="sidebar-nav">
    <ul id="sidebarnav">
         <li class="nav-devider"></li>
        <li class="nav-small-cap">MAIN MENU</li>
        <li> 
            <a class="has-arrow waves-effect waves-dark" href="{{route('admin.admin.account')}}" aria-expanded="false">
                <i class="mdi mdi-gauge"></i>
                <span class="hide-menu">My Account
                    <!--<span class="label label-rouded label-themecolor pull-right">4</span>-->
                </span>
            </a>
        </li>
        
        <li> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.git.project') }}" aria-expanded="false">
                <i class="mdi mdi-bullseye"></i>
                    <span class="hide-menu">Manage Git List 
                        <!--<span class="label label-rouded label-danger pull-right">25</span>-->
                    </span>
                </a>
        </li>
        <li class="nav-devider"></li>
            <li class="nav-small-cap">MANAGE ACCOUNT</li>
            <li> <a class="has-arrow waves-effect waves-dark" href="{{route('admin.user.account')}}" aria-expanded="false">
                    <i class="mdi mdi-chart-bubble"></i>
                        <span class="hide-menu">User Account</span>
                </a>
            </li>
    </ul>
</nav>
<!-- End Sidebar navigation -->

@endsection