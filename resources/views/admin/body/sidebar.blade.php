<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Easy</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    @php
        $abc = session('SideBarMenu');
        if ($abc == 'true') {
            $abc = 'wow';
        } else {
            $abc = 'not match';
        }

    @endphp
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li>
            <a href="widgets.html">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard {{ $abc }}</div>
            </a>
        </li>

        {{-- @php
            dd('hello');
            @endphp --}}

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                {{--  --}}
                @php
                $userid=Illuminate\Support\Facades\Auth::user()->user_id;
                            $menumodule = Illuminate\Support\Facades\DB::select(
                                "select module_id,module_description 
                                from sys_module m
                                where exists(select '' from vw_sys_users_module um where user_id=$userid and um.module_id=m.module_id)
                                and module_active='Y' order by sequence");
                        @endphp
                    
                    @foreach ($menumodule as $erpmodule)
                <li>
                        
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="bx bx-category"></i>
                            </div>
                            <div class="menu-title">{{$erpmodule->module_description}}</div>
                        </a>

                    <ul>

                            @php
                            $moduleid=$erpmodule->module_id;
                            $menudata = Illuminate\Support\Facades\DB::select(
                                "select ACTION_RUNTIME,ACTION_NAME from vw_sys_users_module where module_id='$moduleid' and active='Y' and is_allow='Y' and user_id=$userid order by seq");
                            @endphp

                        @foreach ($menudata as $md)
                            <li> <a href="{{$md->ACTION_RUNTIME}}"><i
                                        class='bx bx-radio-circle'></i>{{ $md->ACTION_NAME }}</a>
                            </li>
                        @endforeach
                          
                    </ul>
                   
                </li>
                 @endforeach
                {{--  --}}

            </ul>
        </li>


        <li class="menu-label">UI Elements</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">eCommerce</div>
            </a>
            <ul>
                <li> <a href="route('SEC_0003.index')"><i class='bx bx-radio-circle'></i>Products</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product Details</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Components</div>
            </a>
            <ul>
                <li> <a href="component-alerts.html"><i class='bx bx-radio-circle'></i>Alerts</a>
                </li>
                <li> <a href="component-accordions.html"><i class='bx bx-radio-circle'></i>Accordions</a>
                </li>

            </ul>
        </li>


        <li class="menu-label">Others</li>


        <li>
            <a href="#" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
