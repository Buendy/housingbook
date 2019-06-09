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
                <li class="nav-item">
                    <a href="{{route('profile.reservations')}}" class="nav-link">
                        <i class="now-ui-icons education_agenda-bookmark" aria-hidden="true"></i>
                        <p>{{__('menu.reservations')}}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('apartments.public')}}" class="nav-link">
                        <i class="now-ui-icons design_image" aria-hidden="true"></i>
                        <p>{{__('menu.apartment')}}</p>
                    </a>
                </li>

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


                        <a href="{{route('dashboard')}}" class="dropdown-item">
                            <i class="now-ui-icons design_bullet-list-67" aria-hidden="true"></i>
                            <p>{{__('menu.dashboard')}}</p>
                        </a>


                            <a href="{{url('profile/'. Auth::user()->name)}}" class="dropdown-item">
                                <i class="now-ui-icons users_circle-08" aria-hidden="true"></i>
                                <p>{{__('menu.profile')}}</p>
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="now-ui-icons arrows-1_share-66" aria-hidden="true"></i>
                            <p>{{ __('menu.Logout') }}</p>

                        </a>

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
