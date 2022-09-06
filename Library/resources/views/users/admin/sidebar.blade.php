<div class="sidebar-wrapper active "  >
    <div > <!-- class="sidebar-header" divin clası-->
        <div class="d-flex justify-content-center" >
            <div class="logo">
                <a href="{{ route('assistant.main') }}">
                    <img height="150px" src="/assets/images/logo/bookgiff.gif" alt="Logo"  srcset="">
                </a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active ">
                <a href="{{ route('admin.main') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Admin Panel</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person"></i>
                    <span>Üye İşlemleri</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('admin.users') }}">Kayıt İşlemleri</a>
                    </li>
                    <li class="submenu-item ">
                        <form method="POST" action="http://kutuphane.test/logout">
                            @csrf
                            <a class="text-danger" href="http://kutuphane.test/logout" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            Çıkış </a>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>