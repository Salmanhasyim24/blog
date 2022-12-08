<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Blog Sall</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Category Menu</div>
            </a>
            <ul>
                <li> <a href="{{ route('category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">SubCategory Menu</div>
            </a>
            <ul>
                <li> <a href="{{ route('subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All Sub Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Post Menu</div>
            </a>
            <ul>
                <li> <a href="{{ route('post') }}"><i class="bx bx-right-arrow-alt"></i>All Post</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Shipping Area </div>
            </a>
            <ul>
                <li> <a href="{{ route('district') }}"><i class="bx bx-right-arrow-alt"></i>All District</a>
                </li>
                <li> <a href="{{ route('subdistrict') }}"><i class="bx bx-right-arrow-alt"></i>All SubDistrict</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">Manage Setting</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-support'></i>
                </div>
                <div class="menu-title">Setting</div>
            </a>
            <ul>
                <li> <a href="{{ route('social.setting') }}"><i class="bx bx-right-arrow-alt"></i> Social Setting</a>
                </li>
                <li> <a href="{{ route('seo.setting') }}"><i class="bx bx-right-arrow-alt"></i>Seo Setting</a>
                </li>
                <li> <a href="{{ route('prayer.setting') }}"><i class="bx bx-right-arrow-alt"></i>Prayer Setting</a>
                </li>
                <li> <a href="{{ route('livetv.setting') }}"><i class="bx bx-right-arrow-alt"></i>LiveTv Setting</a>
                </li>
                <li> <a href="{{ route('notice.setting') }}"><i class="bx bx-right-arrow-alt"></i>Notice Setting</a>
                </li>
                <li> <a href="{{ route('all.website') }}"><i class="bx bx-right-arrow-alt"></i>All Web List</a>
                </li>
                <li> <a href="{{ route('list.add') }}"><i class="bx bx-right-arrow-alt"></i>All Advertisement List</a>
                </li>
                <li> <a href="{{ route('website.setting') }}"><i class="bx bx-right-arrow-alt"></i>All WebSetting</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Gallery Video</div>
            </a>
            <ul>
                <li> <a href="{{ route('photo.gallery') }}"><i class="bx bx-right-arrow-alt"></i>Photo Gallery</a>
                </li>
                <li> <a href="{{ route('video.gallery') }}"><i class="bx bx-right-arrow-alt"></i>Video Gallery</a>
                </li>

            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
