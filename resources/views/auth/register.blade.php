<x-layout>
  {{-- INIZIO HEADER CON FORM DI REGISTRAZIONE --}}
  <header class="container-fluid height-custom">
    <div id="wrapperAuth" class="row wrapper-auth">

      <div class="col-12 wrapper-form right-panel-active">
        <!-- Sign Up -->
        <div class="container__form container--signup">
          <form action="{{route('register')}}" method="POST" class="form">
            @csrf
            <h2 class="form__title text-dark">{{__('ui.Registrati')}}</h2>
            <input type="text" name="name" placeholder="{{__('ui.NomeUtente')}}" class="input" />
            <input type="email" name="email" placeholder="{{__('ui.Email')}}" class="input" />
            <input type="password" name="password" placeholder="{{__('ui.Password')}}" class="input" />
            <input type="password" name="password_confirmation" placeholder="{{__('ui.ConfermaPassword')}}" class="input">
            <button type="submit" class="btn-auth">{{__('ui.Registrati')}}</button>
          </form>
        </div>
      
        <!-- Sign In -->
        <div class="container__form container--signin">
          <form action="{{route('login')}}" method="POST" class="form">
            @csrf
            <h2 class="form__title text-dark">{{__('ui.Accedi')}}</h2>
            <input type="email" name="email" placeholder="{{__('ui.Email')}}" class="input" />
            <input type="password" name="password" placeholder="{{__('ui.Password')}}" class="input" />
            <button type="submit" class="btn-auth">{{__('ui.Accedi')}}</button>
          </form>
        </div>
      
        <!-- Overlay -->
        <div class="container__overlay">
          <div class="overlay">
            <div class="overlay__panel overlay--left">
              <button class="btn-auth" id="signIn">{{__('ui.Accedi')}}</button>
            </div>
            <div class="overlay__panel overlay--right">
              <button class="btn-auth" id="signUp">{{__('ui.Registrati')}}</button>
            </div>
          </div>
        </div>
    </div>
  </header>
  {{-- FINE HEADER --}}
</x-layout>