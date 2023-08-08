<div>
    @if (session()->has('message'))
    <div class="flex justify-content-center my-2 alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <form wire:submit.prevent="store">
        @csrf
        <div class="mb-3">
            <input type="text" placeholder="{{__('ui.InserisciTitolo')}}" class="form-control" wire:model.lazy="title">
            @error('title')
            <div class="error alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <textarea placeholder="{{__('ui.InserisciDescrizione')}}" class="form-control" cols="30" rows="5" wire:model.lazy="body"></textarea>
            @error('body')
            <div class="error alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="number" step="0.1" placeholder="{{__('ui.InserisciPrezzo')}}" class="form-control" wire:model.lazy="price">
            @error('price')
            <div class="error alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select" wire:model="category">
                <option hidden >{{__('ui.InserisciCategoria')}}</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
            <div class="error alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input wire:model="temporary_images" type='file' name='images' multiple class="form-control shadow @error ('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
             @error ('temporary_images.*')
                <p class="text-danger mt-2">{{$message}}</p> 
            @enderror
        </div>
        
        @if(!empty($images))
        <div class="row">
            <div class="col-12">
                <p class="text-white">{{__('ui.AnteprimaImmagine')}}:</p>
                <div class="row border border-4 border-info rounded shadow p-4"> 
                    @foreach ($images as $key => $image)
                    <div class="col-3 my-3">
                        <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}}); background-position:center; background-size:cover; background-repeat: no-repeat;"></div> 
                        <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.Cancella')}}</button>
                    </div> 
                    @endforeach 
                </div>
            </div> 
        </div>
        @endif
        <div wire:loading>
            <h2 class="display-5 text-white"> Caricamento</h1>
             <div class="custom-loader"></div>
         </div>
         <div class="w-100 d-flex align-items-center justify-content-center mt-4">
         <div wire:loading.remove>
             <div class="w-100 d-flex align-items-center justify-content-center mt-4">
                 <button type="submit" id="iii" class="btn btn-warning text-white">INSERISCI</button>
             </div>
             </div>
        {{-- <div class="w-100 d-flex align-items-center justify-content-center mt-4">
            <button type="submit" class="btn btn-warning text-white">{{__('ui.BottoneInserisci')}}</button> --}}
        </div>
    </form>
</div>
