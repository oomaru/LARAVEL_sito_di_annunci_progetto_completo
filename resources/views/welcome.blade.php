<x-layout>
    {{-- INIZIO HEADER HOMEPAGE --}}
    <header class="container-fluid">
        <div id="header" class="row vh-100 align-items-center justify-content-center bg-custom">
            <div data-aos="fade-up" class="col-6 d-flex align-items-center flex-column justify-content-center">
                <h1 class="h1-custom display-2 mt-5">PRESTO</h1>
                <h3 class="display-3 text-white text-center font-custom2">{{__('ui.IlTuoShoppingOnline')}}</h3>
                <a href="{{route('announcement.create')}}" class="btn btn-lg  btn-custom mt-5"><i class="fa-solid fa-plus"></i> {{__('ui.InserisciAnnuncio')}}</a>
            </div>
        </div>
    </header>
    {{-- FINE HEADER --}}
    
    
    {{-- INIZIO MAIN CON VARIE SECTION --}}
    <main class="py-5">
        {{-- BOTTONI CATEGORIE --}}
       <div class="container">
        <div class="row justify-content-around mb-5">
            <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center my-2">
                <div class="btn-group">
                    <button class=" category-card btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.Motori')}}
                    </button>
                    <ul class="dropdown-menu cat-dropdowns">
                        <li><button class="dropdown-item" type="button">
                            @foreach($categories->take(1) as $category)
                            <div class="col-4">
                            <a class="btn btn-custom-cat shadow rounded-pill text-white btn-custom-cat mb-5" href="{{route('categoryShow',compact('category'))}}"><i class="fa-solid fa-{{$category->icon()}}"></i>
                                @if(Config::get('app.locale')=='it')
                                {{$category->name}}
                                @elseif(Config::get('app.locale')=='en')
                                {{$category->name_en}}
                                @else
                                {{$category->name_es}}
                                @endif
                            </a>
                            
                            </div>
                        @endforeach</button></li>
                    </ul>
                  </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center my-2">
                <div class="btn-group">
                    <button class=" category-card btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.Casa')}}
                    </button>
                    <ul class="dropdown-menu cat-dropdowns">
                        <li><button class="dropdown-item" type="button">
                            @foreach($categories->slice(2, 1) as $category)
                                <div class="col-4">
                                    <a class="btn rounded-pill btn-custom-cat text-white mx-2 mb-5" href="{{route('categoryShow',compact('category'))}}">
                                        <i class="fa-solid fa-{{$category->icon()}}"></i>
                                        @if(Config::get('app.locale')=='it')
                                        {{$category->name}}
                                        @elseif(Config::get('app.locale')=='en')
                                        {{$category->name_en}}
                                        @else
                                        {{$category->name_es}}
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </button></li>

                        <li><button class="dropdown-item" type="button">
                            @foreach($categories->slice(6, 1) as $category)
                                <div class="col-4">
                                    <a class="btn  rounded-pill btn-custom-cat text-white  mx-2 mb-5" href="{{route('categoryShow',compact('category'))}}">
                                        <i class="fa-solid fa-{{$category->icon()}}"></i>
                                        @if(Config::get('app.locale')=='it')
                                        {{$category->name}}
                                        @elseif(Config::get('app.locale')=='en')
                                        {{$category->name_en}}
                                        @else
                                        {{$category->name_es}}
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </button></li>

                        <li><button class="dropdown-item" type="button">
                            @foreach($categories->slice(8, 1) as $category)
                                <div class="col-4">
                                    <a class="btn rounded-pill btn-custom-cat text-white mx-2 mb-5" href="{{route('categoryShow',compact('category'))}}">
                                        <i class="fa-solid fa-{{$category->icon()}}"></i>
                                        @if(Config::get('app.locale')=='it')
                                        {{$category->name}}
                                        @elseif(Config::get('app.locale')=='en')
                                        {{$category->name_en}}
                                        @else
                                        {{$category->name_es}}
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </button></li>
                    </ul>
                  </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3  d-flex justify-content-center my-2">
                <div class="btn-group">
                    <button class=" category-card btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.Elettronica')}}
                    </button>
                    <ul class="dropdown-menu cat-dropdowns">
                        <li><button class="dropdown-item" type="button">
                            @foreach($categories->slice(1, 1) as $category)
                                <div class="col-4">
                                    <a class="btn rounded-pill btn-custom-cat text-white  mx-2 mb-5" href="{{route('categoryShow',compact('category'))}}">
                                        <i class="fa-solid fa-{{$category->icon()}}"></i>
                                        @if(Config::get('app.locale')=='it')
                                        {{$category->name}}
                                        @elseif(Config::get('app.locale')=='en')
                                        {{$category->name_en}}
                                        @else
                                        {{$category->name_es}}
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </button></li>
                        <li><button class="dropdown-item" type="button">
                            @foreach($categories->slice(4, 1) as $category)
                                <div class="col-4">
                                    <a class="btn rounded-pill btn-custom-cat text-white  mx-2 mb-5" href="{{route('categoryShow',compact('category'))}}">
                                        <i class="fa-solid fa-{{$category->icon()}}"></i>
                                        @if(Config::get('app.locale')=='it')
                                        {{$category->name}}
                                        @elseif(Config::get('app.locale')=='en')
                                        {{$category->name_en}}
                                        @else
                                        {{$category->name_es}}
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </button></li>
                        <li><button class="dropdown-item" type="button">
                            @foreach($categories->slice(7, 1) as $category)
                                <div class="col-4">
                                    <a class="btn rounded-pill btn-custom-cat text-white  mx-2 mb-5" href="{{route('categoryShow',compact('category'))}}">
                                        <i class="fa-solid fa-{{$category->icon()}}"></i>
                                        @if(Config::get('app.locale')=='it')
                                        {{$category->name}}
                                        @elseif(Config::get('app.locale')=='en')
                                        {{$category->name_en}}
                                        @else
                                        {{$category->name_es}}
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </button></li>
                    </ul>
                  </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3  d-flex justify-content-center my-2">
                <div class="btn-group">
                    <button class=" category-card btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.TempoLibero')}}
                    </button>
                    <ul class="dropdown-menu cat-dropdowns">
                        <li><button class="dropdown-item" type="button">
                            @foreach($categories->slice(3, 1) as $category)
                                <div class="col-4">
                                    <a class="btn rounded-pill btn-custom-cat text-white  mx-2 mb-5" href="{{route('categoryShow',compact('category'))}}">
                                        <i class="fa-solid fa-{{$category->icon()}}"></i>
                                        @if(Config::get('app.locale')=='it')
                                        {{$category->name}}
                                        @elseif(Config::get('app.locale')=='en')
                                        {{$category->name_en}}
                                        @else
                                        {{$category->name_es}}
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </button></li>
                        <li><button class="dropdown-item" type="button">
                            @foreach($categories->slice(5, 1) as $category)
                                <div class="col-4">
                                    <a class="btn rounded-pill btn-custom-cat text-white  mx-2 mb-5" href="{{route('categoryShow',compact('category'))}}">
                                        <i class="fa-solid fa-{{$category->icon()}}"></i>
                                        @if(Config::get('app.locale')=='it')
                                        {{$category->name}}
                                        @elseif(Config::get('app.locale')=='en')
                                        {{$category->name_en}}
                                        @else
                                        {{$category->name_es}}
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </button></li>
                    </ul>
                  </div>
            </div>
            {{-- FINE CARD CATEGORIE --}}
{{--             
                @foreach($categories as $category)
                    <div class="col-4">
                    <a class="btn btn-lg shadow rounded-pill text-white cat_btn_custom  mx-2 mb-5" href="{{route('categoryShow',compact('category'))}}"><i class="fa-solid fa-{{$category->icon()}}"></i> {{$category->name}}</a>
                    </div>
                @endforeach --}}
                
        </div>
       </div>
        {{-- INIZIO SECTION CON CARD ARTICOLI --}}
        <section class="container">
            <div class="row">
                <h2 class="display-3 text-center mb-5 font-custom">{{__('ui.AnnunciPiùRecenti')}}</h2>

                {{-- CARD ARTICOLI --}}
                @forelse ($announcements as $announcement)
                <div data-aos="fade-up" class="col-12 col-md-4 my-4 d-flex justify-content-center">
                    <a href="{{route('announcement.show', compact('announcement'))}}" class="a-decoration">
                    <div class="card-custom d-flex justify-content-center align-items-center flex-column cardsArticle">
                      <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400, 400) : '/media/default.jpg'}}" class="img-fluid img-custom" alt="">
                      <div class="text-center mt-3">
                          <p class="h4">{{$announcement->title}}</p>
                          <p class="lead">{{$announcement->body}}</p>
                          <p class="lead">{{$announcement->price}}€</p>
                      </div>
                      {{-- <div class="d-flex justify-content-around">
                          <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-custom shadow mb-1 mx-2">{{__('ui.Visualizza')}}</a>
                          <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="btn btn-custom mb-1 shadow"> {{$announcement->category->name}}</a>
                      </div> --}}
                  </div>
                </a>
              </div>
                @empty
                @endforelse 
                {{-- FINE CARD ARTICOLI --}}
                
            </div>
        </section>
        {{-- FINE SECTION CON CARD ARTICOLI --}}
        
        {{-- INIZIO SECTION CON BOTTONI (TUTTI GLI ANNUNCI) --}}
        <section class="container py-5">
            <div class="row justify-content-center">
                <div class="col-6 d-flex justify-content-center">
                    <a href="{{route('announcement.index')}}" class="btn btn-custom">{{__('ui.ScopriTuttiGliAnnunci')}}</a>
                </div>
            </div>
        </section>
        {{-- FINE SECTION CON BOTTONI --}}
        
    </main>
    {{-- FINE MAIN --}}
    
</x-layout>