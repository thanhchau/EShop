<div class="menu-desktop">
    <ul class="main-menu">
        {{--<li class="active-menu">
           --}}{{-- <a href="/">Home</a>
         --}}{{----}}{{--   <ul class="sub-menu">
                <li><a href="index.html">Homepage 1</a></li>
                <li><a href="home-02.html">Homepage 2</a></li>
                <li><a href="home-03.html">Homepage 3</a></li>
            </ul>--}}{{----}}{{--
        </li>--}}
        {!! \App\Helper\Menu\Helper::ShowMenu($menus) !!}



        <li>
            <a href="contact.html">Contact</a>
        </li>
    </ul>
</div>
