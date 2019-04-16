<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="500">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{url('./')}}">
                HousingBook
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar top-bar"></span>
                <span class="navbar-toggler-bar middle-bar"></span>
                <span class="navbar-toggler-bar bottom-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" data-nav-image="./assets/img//blurred-image-1.jpg" data-color="orange">
            <ul class="navbar-nav ml-auto">


                @guest


                @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
                        <i class="now-ui-icons design_app"></i>
                        <p>Components</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                        <a class="dropdown-item" href="./index.html">
                            <i class="now-ui-icons business_chart-pie-36"></i> All components
                        </a>
                        <a class="dropdown-item" target="_blank" href="https://demos.creative-tim.com/now-ui-kit-pro/docs/1.0/getting-started/introduction.html">
                            <i class="now-ui-icons design_bullet-list-67"></i> Documentation
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <i class="now-ui-icons files_paper" aria-hidden="true"></i>
                        <p>Sections</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./sections.html#headers">
                            <i class="now-ui-icons shopping_box"></i> Headers
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <i class="now-ui-icons design_image" aria-hidden="true"></i>
                        <p>Examples</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./examples/about-us.html">
                            <i class="now-ui-icons business_bulb-63"></i> About-us
                        </a>

                    </div>
                </li>
                <li>
                    <a href="{{route('apartments.public')}}" class="nav-link">
                        <i class="now-ui-icons design_image" aria-hidden="true"></i>
                        <p>{{__('menu.apartment')}}</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('profile.index')}}" class="nav-link">
                        <i class="now-ui-icons design_image" aria-hidden="true"></i>
                        <p>{{__('menu.profile')}}</p>
                    </a>
                </li>

                @endguest

                @guest
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="{{ route('login') }}">{{ __('menu.login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="{{ route('register') }}">{{ __('menu.register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

                @endguest
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span>{{__('menu.language')}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="navbarDropdown" role="menu">
                        <li>
                            <a href="{{route('set_language', ['es'])}}" class="dropdown-item">
                                {{__('menu.spain')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('set_language', ['en'])}}" class="dropdown-item">
                                {{__('menu.english')}}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>