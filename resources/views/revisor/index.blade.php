<x-layout>
  {{-- INIZIO HEADER CON TITOLO DEGLI ARTICOLI DA REVISIONARE --}}
  <header class="container-fluid mt-5 pt-5">
    <div class="row align-items-center justify-content-center">
      <div class="col-12">
        <h1 class="text-center display-4 mt-5 text-uppercase font-custom">{{__('ui.AnnunciDaRevisionare')}}</h1>
      </div>
    </div>
  </header>
  {{-- FINE HEADER   --}}
  
  
  {{-- INIZIO MAIN --}}
  <main class="pb-5 height-custom-revisor">
    {{-- INIZIO SECTION CON ARTICOLI DA REVISIONARE --}}
    <section class="container">
      <div class="row">
        @if(!$announcement_to_check)
        <p class="text-center mt-5 display-3 height-custom">{{__('ui.NonCiSonoAnnunciDaRevisionare')}}</p>
        @endif
        {{-- INIZIO COLONNA CON CAROUSEL --}}
        @if($announcement_to_check)
        <div class="col-12 col-md-6">
          <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
            <div class="swiper-wrapper" >
              @if(count($announcement_to_check->images))
              @foreach ($announcement_to_check->images as $image)
              <div class="swiper-slide">
                <img src="{{$image->getUrl(400, 400)}}"/>
              </div>
              @endforeach
              @else
              <div class="swiper-slide">
                <img src="/media/default.jpg" />
              </div>
              @endif
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
              @if(count($announcement_to_check->images))
              @foreach ($announcement_to_check->images as $image)
              <div class="swiper-slide">
                <img src="{{$image->getUrl(400, 400)}}" />
              </div>
              @endforeach
              @else
              <div class="swiper-slide">
                <img src="/media/default.jpg"/>
              </div>
              
              @endif
            </div>
          </div>
        </div>
        {{-- FINE COLONNA CON CAROUSEL --}}
        
        {{-- INIZIO COLONNA CON DATI DETTAGLIO ARTICOLO --}}
        <div class="col-12 col-md-6 d-flex justify-content-around bg-revisor-custom">
          
          {{-- INIZIO SECTION CON VALIDAZIONE IMMAGINI --}}
          @foreach ($announcement_to_check->images as $image)
          <div class="d-flex flex-column align-items-center justify-content-center">
            <div>
              @if($image->labels)
              <p class="h4 text-center">Tags:</p>
              <ul>
                @foreach($image->labels as $label)
                <li>{{$label}}</li>
                @endforeach
              </ul>
              @endif
            </div>
            <div class="text-center">
              <p>{{__('ui.Adulti')}}: <span class="{{$image->adult}}"></span></p>
              <p>{{__('ui.Satira')}}: <span class="{{$image->spoof}}"></span></p>
              <p>{{__('ui.Medicina')}}: <span class="{{$image->medical}}"></span></p>
              <p>{{__('ui.Violenza')}}: <span class="{{$image->violence}}"></span></p>
              <p>{{__('ui.ContenutoEsplicito')}}: <span class="{{$image->racy}}"></span></p>
            </div>
          </div>  
          @endforeach
          {{-- INIZIO SECTION CON VALIDAZIONE IMMAGINI --}}
          
          <div class="d-flex flex-column align-items-center justify-content-center text-center">
            <div class="mb-3">
              <p class="h4">{{__('ui.Titolo')}}:</p>
              <p class="lead">{{$announcement_to_check->title}}</p>
            </div>
            <div class="mb-3">
              <p class="h4">{{__('ui.Descrizione')}}:</p>
              <p class="lead">{{$announcement_to_check->body}}</p>
            </div>
            <div class="mb-3">
              <p class="h4">{{__('ui.Prezzo')}}:</p>
              <p class="lead">{{$announcement_to_check->price}}€</p>
              <p class="h4">{{__('ui.Categoria')}}:</p>
              <p class="lead">{{$announcement_to_check->category->name}}</p>
            </div>
            <div class="mb-3 d-flex justify-content-around w-100">
              {{-- FORM ACCETTA ARTICOLO --}}
              <form method="POST" action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}">
                 @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success radius"><i class="fa-regular fa-thumbs-up fa-2x"></i></button>
              </form>
              {{-- RIFIUTA ARTICOLO --}}
              <form method="POST" action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger radius confirm"><i class="fa-solid fa-ban fa-2x"></i></button>
              </form>
              <script src="sweetalert2.all.min.js"></script>
            </div>
            {{-- FINE SECTION CON BOTTONI ACCETTA E RIFIUTA ARTICOLO --}}
          </div>
        </div>
        {{-- FINE COLONNA CON DATI DETTAGLIO ARTICOLO --}}

        
        
      </div>
    </div>
  </section>
  {{-- FINE SECTION CON ARTICOLI DA REVISIONARE --}}
  
  @endif
  
</main>
<script>
  //the confirm class that is being used in the delete button
  $('.confirm').click(function(event) {

      //This will choose the closest form to the button
      var form =  $(this).closest("form");

      //don't let the form submit yet
      event.preventDefault();

      //configure sweetalert alert as you wish
      Swal.fire({
          title: {{__('ui.SeiSicuro')}},
          text: {{__('ui.LaDecisioneNonEReversibile')}},
          cancelButtonText: {{__('ui.NoTornaIndietro')}},
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: {{__('ui.SiVoglioRigettarlo')}}
      }).then((result) => {
          
          //in case of deletion confirm then make the form submit
          if (result.isConfirmed) {
              form.submit();
          }
      })
  });
</script>
</x-layout>

