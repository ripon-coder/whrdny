<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow admin-bg" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main admin-bg" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item @active('admin/dashboard')"><a
                    href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span class="menu-title"
                        data-i18n="Dashboard">Dashboard</span></a>
            </li>

            <li class="nav-item @active('admin/slider-admin*')">
                <a href="{{ route('admin.slider-admin.index') }}"><i class="la la-image"></i></i><span class="menu-title"
                        data-i18n="Starter kit">Sliders</span></a>
            </li>

            <li class="nav-item @active('admin/fund-raise-admin*')">
                <a href="{{ route('admin.fund-raise-admin.index') }}"><i class="la la-dollar"></i><span class="menu-title"
                        data-i18n="Starter kit">Fund Raising</span></a>
            </li>

            <li class="nav-item @active('admin/posts*')">
                <a href="{{ route('admin.posts.index') }}"><i class="la la-file"></i><span class="menu-title"
                        data-i18n="Starter kit">Blog Posts</span></a>
            </li>

            <li class="nav-item @active('admin/photo-gallery*')">
                <a href="{{ route('admin.photo-gallery.index') }}"><i class="la la-image"></i><span class="menu-title"
                        data-i18n="Starter kit">Photo Gallery</span></a>
            </li>
            <li class="nav-item @active('admin/video-gallery*')">
                <a href="{{ route('admin.video-gallery.index') }}"><i class="la la-youtube"></i><span class="menu-title"
                        data-i18n="Starter kit">Video Gallery</span></a>
            </li>
            <li class="nav-item @active('admin/learning*')">
                <a href="{{ route('admin.learning.index') }}"><i class="la la-book"></i><span class="menu-title"
                        data-i18n="Starter kit">Learning</span></a>
            </li>
            <li class="nav-item @active('admin/admission-form*')">
                <a href="{{ route('admin.admission-form.index') }}"><i class="la la-graduation-cap"></i><span class="menu-title"
                        data-i18n="Starter kit">Admission Form</span></a>
            </li>

            <li class="nav-item @active('admin/join-request*')">
                <a href="{{ route('admin.join-request') }}"><i class="la la-plus"></i><span class="menu-title"
                        data-i18n="Starter kit">Join Request</span></a>
            </li>
            <li class="nav-item @active('admin/contact-message*')">
                <a href="{{ route('admin.contact-message') }}"><i class="la la-envelope"></i><span class="menu-title"
                        data-i18n="Starter kit">Contact Message</span></a>
            </li>



            <li class="nav-item @active('admin/donation-admin*')">
                <a href="{{ route('admin.donation-admin.index') }}"><i class="la la-money"></i><span class="menu-title"
                        data-i18n="Starter kit">Donations</span></a>
            </li>

            <li class="nav-item @active('admin/event-admin*')">
                <a href="{{ route('admin.event-admin.index') }}"><i class="la la-server"></i><span class="menu-title"
                        data-i18n="Starter kit">Event</span></a>
            </li>

            <li class="nav-item @active('admin/brand-admin*')">
                <a href="{{ route('admin.brand-admin.index') }}"><i class="la la-tablet"></i><span class="menu-title"
                        data-i18n="Starter kit">Brand</span></a>
            </li>

            <li class="nav-item ">
                <a href="#"><i class="la la-user"></i><span class="menu-title" data-i18n="Starter kit">Who We
                        Are</span></a>
                <ul class="menu-content">
                    <li class="nav-item @active('admin/mission-admin*')">
                        <a href="{{ route('admin.mission') }}"><i class="la la-arrow-right"></i><span class="menu-title"
                                data-i18n="Starter kit">Mission</span></a>
                    </li>
                    <li class="nav-item @active('admin/vission-admin*')">
                        <a href="{{ route('admin.vission') }}"><i class="la la-arrow-right"></i><span class="menu-title"
                                data-i18n="Starter kit">Vission</span></a>
                    </li>
                    <li class="nav-item @active('admin/objective-admin*')">
                        <a href="{{ route('admin.objective') }}"><i class="la la-arrow-right"></i><span
                                class="menu-title" data-i18n="Starter kit">Objective</span></a>
                    </li>
                    <li class="nav-item @active('admin/history-admin*')">
                        <a href="{{ route('admin.history') }}"><i class="la la-arrow-right"></i><span class="menu-title"
                                data-i18n="Starter kit">History</span></a>
                    </li>
                    <li class="nav-item @active('admin/board-trust-admin*')"><a href="{{ route('admin.board-trust-admin.index') }}">
                            <i class="la la-arrow-right"></i><span class="menu-title" data-i18n="Dashboard">Board Of
                                Trustee</span></a>
                    </li>
                    <li class="nav-item @active('admin/faq-admin*')"><a href="{{ route('admin.faq-admin.index') }}">
                            <i class="la la-arrow-right"></i><span class="menu-title"
                                data-i18n="Dashboard">Faq</span></a>
                    </li>
                    <li class="nav-item @active('admin/how-we-work-admin*')"><a href="{{ route('admin.howWork') }}">
                        <i class="la la-arrow-right"></i><span class="menu-title"
                            data-i18n="Dashboard">How We Work</span></a>
                    </li>
                    <li class="nav-item @active('admin/overview-admin*')"><a href="{{ route('admin.overview') }}">
                            <i class="la la-arrow-right"></i><span class="menu-title"
                                data-i18n="Dashboard">Overview</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item @active('admin/settings*')">
                <a href="{{ route('admin.setting') }}"><i class="la la-cogs"></i><span class="menu-title"
                        data-i18n="Starter kit">Settings</span></a>
            </li>

        </ul>
    </div>
</div>
