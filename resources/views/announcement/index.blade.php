<x-layout>
    {{-- VISTA CON TUTTI GLI ARTICOLI --}}

    {{-- INIZIO HEADER CON TITOLO --}}

    <header class="container margin-custom">
        <div class="row">
            <div class="col-12">
                <h2 class="display-1 text-center font-custom">{{__('ui.INostriAnnunci')}}</h2>
            </div>
        </div>
    </header>
    {{-- FINE HEADER --}}

    {{-- INIZIO MAIN --}}
    <main class="mt-5">
        {{-- INIZIO SECTION CON TUTTI GLI ARTICOLI --}}
        <section class="container">
            <div class="row">

                {{-- INIZIO CARD ARTICOLI --}}
                @forelse ($announcements as $announcement)
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
                                <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-custom shadow mb-1 mx-2">Visualizza</a>
                                <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="btn btn-custom mb-1 shadow"> {{$announcement->category->name}}</a>
                            </div> --}}
                        </div>
                    </a>
                    </div>
                    @empty
                        <div class="col-12 mt-5 height-custom">
                            <p class="h1">{{__('ui.NonSonoPresentiAnnunci')}}</p>
                        </div>
                @endforelse
                {{-- FINE CARD ARTICOLI --}}

                {{-- BOTTONE PER LA PAGINATION --}}
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            {{$announcements->links()}}
                        </div>
                    </div>
                </div>
                {{-- FINE FOTTONE --}}
        </section>
        {{-- FINE SECTION CON TUTTI GLI ARTICOLI --}}

    </main>
    {{-- FINE MAIN --}}

</x-layout>