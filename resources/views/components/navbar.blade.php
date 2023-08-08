<nav class="navbar navbar-expand-lg bgNav-custom fixed-top navMode" id="navbar">
    <div class="container-fluid">
    {{-- LOGO --}}
    <a class="navbar-brand logoWidth-custom font-custom" href="{{route('welcome')}}">
        <img class="logo-custom" src="/media/PROVALOGO.png" alt="">
        PRESTO
      </a>
    {{-- FINE LOGO --}}
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{-- INIZIO SEARCHBAR --}}
        <form action="{{route('announcements.search')}}" method="GET" class="d-flex mx-auto">
            <div class="wave-group me-3">
              <input required="" autocomplete="off" type="search" name="searched" class="input">
              <span class="bar"></span>
              <label class="label">
                <span class="label-char" style="--index: 0">{{__('ui.PrimaLettera')}}</span>
                <span class="label-char" style="--index: 1">{{__('ui.SecondaLettera')}}</span>
                <span class="label-char" style="--index: 2">{{__('ui.TerzaLettera')}}</span>
                <span class="label-char" style="--index: 3">{{__('ui.QuartaLettera')}}</span>
                <span class="label-char" style="--index: 4">{{__('ui.QuintaLettera')}}</span>
                <span class="label-char" style="--index: 5">{{__('ui.SestaLettera')}}</span>
                <span class="label-char" style="--index: 6">{{__('ui.SettimaLettera')}}</span>
              </label>
            </div>
            <button type="submit" class="btn-searchbar"><i class="fa-solid fa-magnifying-glass fa-2x"></i></button>
        </form>
        {{-- FINE SEARCHBAR --}}

        <ul class="navbar-nav">
            {{-- INIZIO DROPDOWN CON ICONA UTENTE --}}
            @guest
            {{-- UTENTE NON LOGGATO --}}
                <li class="nav-item dropdown logoWidth-custom2 text-end">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                    <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.Registrati')}}</a></li>
                    <li><a class="dropdown-item" href="{{route('login')}}">{{__('ui.Accedi')}}</a></li>
                </ul>
                </li>
            {{-- FINE UTENTE NON LOGGATO --}}
            @else
            {{-- UTENTE LOGGATO REVISORE --}}
                @if(Auth::user()->is_revisor)
                <li class="nav-item dropdown logoWidth-custom2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}  <i class="fa-solid fa-user"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-1">
                            {{App\Models\Announcement::toBeRevisionedCount()}}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                        <li>
                            <a class="dropdown-item position-relative" aria-current="page" href="{{route('revisor.index')}}">
                                {{__('ui.ZonaRevisore')}}
                                <span class="position-absolute translate-middle badge rounded-pill bg-danger badge-custom">
                                    {{App\Models\Announcement::toBeRevisionedCount()}}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </li>

                        @if (Route::currentRouteName()!='welcome')
                            <li><a class="dropdown-item" href="{{route('announcement.create')}}">{{__('ui.InserisciAnnuncio')}}</a></li>
                        @endif

                        <li>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();document.querySelector('#form-logout').submit();">{{__('ui.Disconnettiti')}}</a>
                            <form action="{{route('logout')}}" class="d-none" id="form-logout" method="post">@csrf</form>
                        </li>
                    </ul>
                </li>
            {{-- FINE UTENTE LOGGATO REVISORE --}}

            {{-- UTENTE LOGGATO NON REVISORE --}}
                @else
                    <li class="nav-item dropdown logoWidth-custom2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('ui.Ciao')}} {{Auth::user()->name}}  <i class="fa-solid fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">

                            @if (Route::currentRouteName()!='welcome')
                                <li><a class="dropdown-item" href="{{route('announcement.create')}}">{{__('ui.InserisciAnnuncio')}}</a></li>
                            @endif

                            <li>
                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();document.querySelector('#form-logout').submit();">{{__('ui.Disconnettiti')}}</a>
                                <form action="{{route('logout')}}" class="d-none" id="form-logout" method="post">@csrf</form>
                            </li>
                        </ul>
                    </li>
                @endif
            {{-- FINE UTENTE LOGGATO NON REVISORE --}}
            @endguest
            {{-- FINE DROPDOWN CON ICONA UTENTE --}}

            {{-- INIZIO DROPDOWN CON CAMBIO LINGUA --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (session()->has('locale'))
                        <img src="{{asset('vendor/blade-flags/language-' .session('locale'). '.svg') }}" width="25" height="25" alt="flag">
                    @else
                        <img src="{{ asset('vendor/blade-flags/language-it.svg') }}" width="25" height="25" alt="flag">
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                    <li class="margin-custom-flag"><x-_locale lang="it"/></li>
                    <li class="margin-custom-flag"><x-_locale lang="en"/></li>
                    <li class="margin-custom-flag"><x-_locale lang="es"/></li>
                </ul>
              </li>
            {{-- FINE DROPDOWN CON CAMBIO LINGUA --}}

            <li class="nav-item">
                <button id="modeActivator" class="btn">
                    <i class="fa-solid fa-circle-half-stroke text-white icon-custom"></i>
                </button>
            </li>
          </ul>
      </div>
    </div>
  </nav>