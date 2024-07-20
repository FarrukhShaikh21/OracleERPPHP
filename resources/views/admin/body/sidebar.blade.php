 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!-- User details -->


         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="index.html" class="waves-effect">
                         <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                         <span>Dashboard</span>
                     </a>
                 </li>

                 <li>
                     <a href="calendar.html" class=" waves-effect">
                         <i class="ri-calendar-2-line"></i>
                         <span>Calendar</span>
                     </a>
                 </li>

                 {{-- email start --}}
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-layout-3-line"></i>
                         <span>Application</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="true">
                         {{--  --}}
                         @php
                             $userid = Illuminate\Support\Facades\Auth::user()->USER_ID;
                             $menumodule = Illuminate\Support\Facades\DB::select(
                                 "select module_id,module_description 
                                from sys_module m
                                where exists(select '' from vw_sys_users_module um where user_id=$userid and um.module_id=m.module_id)
                                and module_active='Y' and 2=1 order by sequence",
                             );
                         @endphp

                         @foreach ($menumodule as $erpmodule)
                             <li>

                                 <a href="javascript: void(0);" class="has-arrow">{{ $erpmodule->module_description }}</a>
                                    
                                 <ul class="sub-menu" aria-expanded="true">

                                     @php
                                         $moduleid = $erpmodule->module_id;
                                         $menudata = Illuminate\Support\Facades\DB::select(
                                             "select ACTION_RUNTIME,ACTION_NAME from vw_sys_users_module where module_id='$moduleid' and active='Y' and is_allow='Y' and user_id=$userid and 2=1 order by seq",
                                         );
                                     @endphp
                                    
                                     @foreach ($menudata as $md)
                                         <li> <a href="{{ $md->ACTION_RUNTIME }}"><i></i>{{ $md->ACTION_NAME }}</a></li>
                                     @endforeach

                                 </ul>

                             </li>
                         @endforeach
                         {{--  --}}

                     </ul>
                 </li>
                 {{-- email end --}}

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-layout-3-line"></i>
                         <span>Layouts</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="true">
                         <li>
                             <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                             <ul class="sub-menu" aria-expanded="true">
                                 <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                 <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                 <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                 <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                 <li><a href="layouts-preloader.html">Preloader</a></li>
                                 <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                             </ul>
                         </li>

                         <li>
                             <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                             <ul class="sub-menu" aria-expanded="true">
                                 <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                 <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                                 <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                 <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                 <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                             </ul>
                         </li>
                     </ul>
                 </li>

                 <li class="menu-title">Pages</li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-account-circle-line"></i>
                         <span>Authentication</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="auth-login.html">Login</a></li>
                         <li><a href="auth-register.html">Register</a></li>
                         <li><a href="auth-recoverpw.html">Recover Password</a></li>
                         <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-profile-line"></i>
                         <span>Utility</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="pages-starter.html">Starter Page</a></li>
                         <li><a href="pages-timeline.html">Timeline</a></li>
                         <li><a href="pages-directory.html">Directory</a></li>
                         <li><a href="pages-invoice.html">Invoice</a></li>
                         <li><a href="pages-404.html">Error 404</a></li>
                         <li><a href="pages-500.html">Error 500</a></li>
                     </ul>
                 </li>






             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
