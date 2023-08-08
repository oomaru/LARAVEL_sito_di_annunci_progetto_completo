<x-layout>
    {{-- INIZIO MAIN --}}
    <main class="height-custom pb-5 margin-custom">
        {{-- INIZIO SECTION CON COMPONENTE FORM LIVEWIRE PER LA CREAZIONE DEGLI ARTICOLI --}}
        <section class="container pb-5">
            <div class="row row-custom">
                <h1 class="display-4 text-uppercase text-center font-custom mb-5">{{__('ui.InserisciUnAnnuncio')}}</h1>
                <div class="col-12 col-md-5 bg-img">
                </div>
                <div class="col-12 col-md-7">
                    <livewire:announcement-form/>
                </div>
            </div>
        </section>
        {{-- FINE SECTION CON FORM --}}
    </main>
    {{-- FINE MAIN --}}
</x-layout>