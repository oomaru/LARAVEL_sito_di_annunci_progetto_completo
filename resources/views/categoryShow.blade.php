<x-layout>

    {{-- INIZIO HEADER CON TITOLO PER CATEGORIE --}}
    <header class="container">
        <div class="row  margin-custom">
            <div class="col-12">
                <h1 class="display-2 text-center font-custom">{{__('ui.EsploraLaCategoria')}}: {{$category->name}}</h1>
            </div>
        </div>
    </header>
    {{-- FINE HEADER CON TITOLO PER CATEGORIE --}}

    {{-- INIZIO MAIN CON CARD ARTICOLI PER CATEGORIA --}}
    <main>

        {{-- INIZIO SECTION CON CARD ARTICOLI --}}
        <section class="container">
            <div class="row">
                {{-- INIZIO CARD --}}
                @forelse ($category->announcements->where('is_accepted', true)->sortByDesc('created_at') as $announcement)
                    <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                        <a href="{{route('announcement.show', compact('announcement'))}}" class="a-decoration">
                            <div class="card-custom d-flex justify-content-center align-items-center flex-column cardsArticle">
                                <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400, 400) : '/media/default.jpg'}}" class="img-fluid img-custom" alt="">
                                <div class="text-center mt-3">
                                    <p class="h4">{{$announcement->title}}</p>
                                    <p class="lead">{{$announcement->body}}</p>
                                    <p class="lead">{{$announcement->price}}€</p>
                                </div>
                                {{-- <div class="d-flex justify-content-around">
                                    <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-custom shadow mb-1">Visualizza</a>
                                    <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="btn btn-custom mb-1 shadow">Categoria: {{$announcement->category->name}}</a>
                                </div> --}}
                            </div>
                            {{-- <small class="mb-2 text-end">Pubblicato il : {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? "Autore sconosciuto"}}</small> --}}
                        </a>
                        </div>
                    @empty
                    <div class="col-12 mt-5 height-custom text-center">
                        <p class="h1">{{__('ui.NonSonoPresentiAnnunciPerQuestaCategoria')}}</p>
                        <p class="h2">{{__('ui.PubblicaneUno')}}:<a href="{{route('announcement.create')}}" class="btn btn-warning shadow"> {{__('ui.NuovoAnnuncio')}}</a></p>
                    </div>
                @endforelse
                {{-- FINE CARD --}}
            </div>
        </section>
        {{-- FINE SECTION CON CARD ARTICOLI --}}

    </main>
    {{-- FINE MAIN --}}
</x-layout>