<!-- start sidebar -->
<div class="sidebar-panel">
    <div class="gull-brand pr-3 text-center mt-4 mb-2 d-flex justify-content-center align-items-center">
        <img class="pl-3" src="{{ asset('assets/images/hackathon-footer-logo-transparent.png') }}" alt="">
        <!-- <span class=" item-name text-20 text-primary font-weight-700">GULL</span> -->
        <div class="sidebar-compact-switch ml-auto"><span></span></div>

    </div>
    <!-- user -->
    <div class="scroll-nav" data-perfect-scrollbar data-suppress-scroll-x="true">

        <!-- user close -->
        <!-- side-nav start -->
        <div class="side-nav">

            <div class="main-menu">

                <!-- <ul>
                            <li>
                                <a href="*" class="active-color">
                                    <span class="item-name ">Dashboard</span>
                                    <span class="spacer"></span>
                                    <span class="item-badge badge badge-warning">100+</span>
                                </a>
                            </li>
                            
                        </ul>-->
                <ul class="metismenu" id="menu">
                    <!-- <p class="main-menu-title text-muted ml-3 font-weight-700 text-13 mt-4 mb-2">Apps</p> -->
                    @auth
                    @cannot('approver-priv')
                    <li class="Ul_li--hover">
                        <a class="" href="{{ route('dashboard') }}">
                            <i class="i-Bar-Chart text-20 mr-2 text-muted"></i>
                            <span class="item-name text-muted">Dashboard</span>
                        </a>
                    </li>
                    @endcan
                    @can('admin-manager')
                    <li class="Ul_li--hover">
                        <a class="" href="{{ route('viewUser')}}">
                            <i class="i-Business-Mens text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Users</span>
                        </a>
                    </li>
                    <li class="Ul_li--hover">
                        <a class="" href="{{ route('viewChecklist')}}">
                            <i class="i-Check text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Checklist</span>
                        </a>
                    </li>
                    @endcan
                    @cannot('approver-priv')
                    <li class="Ul_li--hover">
                        <a class="" href="{{ route('viewCompany') }}">
                            <i class="i-Building text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Companies</span>
                        </a>
                    </li>
                    @endcannot
                    <li class="Ul_li--hover">
                        <a class="" href="{{ route('allApplication') }}">
                            <i class="i-Receipt-4 text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Application</span>
                        </a>
                    </li>
                    @can('create-acc')
                    <li class="Ul_li--hover">
                        <a class="" href="{{ route('viewIndustry') }}">
                            <i class="i-Shop text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Industry</span>
                        </a>
                    </li>
                    <li class="Ul_li--hover">
                        <a class="" href="{{ route('viewAuditLogs') }}">
                            <i class="i-Search-People text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Audit</span>
                        </a>
                    </li>
                    @endcan
                    @can('manager-rm')
                    <li class="Ul_li--hover">
                        <a class="" href="{{ route('loadCalendar') }}">
                            <i class="i-Calendar-4 text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Calendar</span>
                        </a>
                    </li>
                    @endcan
                    @endauth
                </ul>
            </div>
        </div>
    </div>

    <!-- side-nav-close -->
</div>
<!-- end sidebar -->
<div class="switch-overlay"></div>