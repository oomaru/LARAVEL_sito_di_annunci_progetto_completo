<x-layout>
  @if(Auth::user()->is_revisor)
 
  <div class="container-fluid">
    <div class="row justify-content-center height-custom">
      <div class="col-12 d-flex flex-column align-items-center justify-content-center">
        <h1 class="text-center">{{__('ui.SeiUnRevisore')}}</h1>
        <img src="/media/dancing-banana.gif" alt="" class="img-fluid rounded-5" width="300" height="300">
        <a href="{{route('welcome')}}" class="btn btn-warning">{{__('ui.TornaAllaHome')}}</a>
      </div>
    </div>
  </div>

  @else  
  {{-- INIZIO HEADER CON FORM LAVORA CON NOI --}}
    <header class="container margin-custom height-custom">
        <div class="row row-custom">
          <div class="col-12 col-md-5 bg-work-img">
        
          </div>
            <div class="col-12 col-md-7">
              <div class="ghost-title">
                <h1 class="display-3 text-center text-uppercase mb-3 font-custom">{{__('ui.LavoraConNoi')}}</h1>
              </div>
                <form method="POST" action="{{route('become.revisor')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-white">{{__('ui.NomeUtente')}}</label>
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                      </div>
                    <div class="mb-3">
                      <label class="form-label text-white">{{__('ui.Email')}}</label>
                      <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label text-white">{{__('ui.PerchèVuoiLavorareConNoi')}}</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>  
                    </div>
                    <div class="w-100 d-flex align-items-center justify-content-center mt-4">
                      <button type="submit" class="btn btn-warning text-white">{{__('ui.Invia')}}</button>
                    </div>
                  </form>
            </div>
        </div>
    </header>
    @endif
      {{-- FINE HEADER --}}
</x-layout>