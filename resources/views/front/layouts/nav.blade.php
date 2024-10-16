<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('uploads/logo.png') }}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('uploads/logo.png') }}" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Request::is('/')? 'active': '' }}">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item {{ Request::is('about')? 'active': '' }}">
                            <a href="{{ route('about') }}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item {{ Request::is('events')? 'active': '' }}">
                            <a href="{{ route('events') }}" class="nav-link ">Events</a>
                        </li>
                        <li class="nav-item {{ Request::is('causes') ? 'active' : '' }}">
                            <a href="{{ route('causes') }}" class="nav-link">Causes</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('volunteers') }}" class="nav-link {{ Request::is('volunteers')? 'active': '' }}">Volunteers</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void;" id="galleryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                                <li><a class="dropdown-item" href="{{ route('photo_gallery') }}">Photo Gallery</a></li>
                                <li><a class="dropdown-item" href="{{ route('video_gallery') }}">Video Gallery</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faq') }}" class="nav-link {{ Request::is('faq')? 'active': '' }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog') }}" class="nav-link {{ Request::is('post/*') || Request::is('blog')? 'active': '' }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
