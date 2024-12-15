<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin Dashboard</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard.index') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Home</li>
        <li>
            <a href="{{ route('admin.home-banners.index') }}">
                <div class="parent-icon"><i class='bx bx-carousel'></i>
                </div>
                <div class="menu-title">Home Banner</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.sizes.index') }}">
                <div class="parent-icon"><i class='lni lni-ruler'></i>
                </div>
                <div class="menu-title">Manage Size</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.colors.index') }}">
                <div class="parent-icon"><i class='lni lni-pallet'></i>
                </div>
                <div class="menu-title">Manage Color</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class='lni lni-tag'></i>
                </div>
                <div class="menu-title">Attributes</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.attribute.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        Attribute Name
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.attribute_value.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        Attribute Value
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class='lni lni-grid-alt'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.category.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>
                        Category Name
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Pages</li>
        <li>
            <a href="{{ url('admin/profile') }}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
        <li class="menu-label">Others</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">Menu Levels</div>
            </a>
            <ul>
                <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level
                        One</a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level
                                Two</a>
                            <ul>
                                <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level
                                        Three</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
