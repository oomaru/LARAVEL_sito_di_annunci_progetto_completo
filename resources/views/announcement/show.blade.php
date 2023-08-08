<x-layout>
  {{-- INIZIO HEADER CON TITOLO DELL'ARTICOLO --}}
  <header class="container margin-custom">
    <div class="row">
      <div class="col-12 pt-5 text-center">
        <h1 class="text-uppercase display-3 font-custom">{{$announcement->title}}</h1>
      </div>
    </div>
  </header>
  {{-- FINE HEADER --}}
  
  {{-- INIZIO MAIN --}}
  <main class="my-5">
    
    {{-- INIZIO SECTION CON DETTAGLIO ARTICOLO --}}
    <section class="container">
      <div class="row justify-content-between">
        
        {{-- INIZIO COLONNA CON CAROUSEL --}}
        <div class="col-12 col-md-6">
          <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
            <div class="swiper-wrapper" >
              @if(count($announcement->images))
              @foreach ($announcement->images as $image)
              <div class="swiper-slide">
                <img src="{{$image->getUrl(400, 400)}}"/>
              </div>
              @endforeach
              @else
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
              </div>
              @endif
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
              @if(count($announcement->images))
              @foreach ($announcement->images as $image)
              <div class="swiper-slide">
                <img src="{{$image->getUrl(400, 400)}}" />
              </div>
              @endforeach
              @else
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
              </div>
              <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
              </div>
              @endif
            </div>
          </div>
        </div>
        {{-- FINE COLONNA CON CAROUSEL --}}
        
        {{-- INIZIO COLONNA CON DATI DETTAGLIO ARTICOLO --}}
        <div class="col-12 col-md-6">
          <div class="border d-flex flex-column align-items-center justify-content-center text-center cardShow-custom">
            <div class="mb-3">
              <p class="h4">{{__('ui.Descrizione')}}</p>
              <p class="lead">{{$announcement->body}}</p>
            </div>
            <div class="mb-3">
              <p class="h4">{{__('ui.Prezzo')}}</p>
              <p class="lead">{{$announcement->price}}€</p>
              <p class="h4">{{__('ui.Categoria')}}</p>
              <p class="lead">{{$announcement->category->name}}</p>
            </div>
          </div>
          <div class="border d-flex flex-column align-items-center justify-content-center text-center cardShow-custom2 mt-3">
            <p class="h4 mt-3">Autore:</p>
            <p class="lead">{{$announcement->user->name}}</p>
            <p class="h4">Contattalo tramite mail:</p>
            <p class="lead">{{$announcement->user->email}}</p>
            @if (Auth::user() == $announcement->user)
              <form method="post" action="{{route('announcement.delete', compact('announcement'))}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger confirm">{{__('ui.Cancella')}}</button>
              </form>
              <script src="sweetalert2.all.min.js"></script>
              @endif
          </div>
        </div>
        {{-- FINE COLONNA CON DATI DETTAGLIO ARTICOLO --}}
      </div>
    </section>
    {{-- FINE SECTION CON DETTAGLIO ARTICOLO --}}
    
  </main>
  {{-- FINE MAIN --}}
  
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