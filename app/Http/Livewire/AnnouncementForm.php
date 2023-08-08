<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AnnouncementForm extends Component
{
    
    use WithFileUploads;
    use LivewireAlert;
    
    public $title;
    
    public $body;
    
    public $price;
    
    public $category;
    
    public $images = [];
    
    public $temporary_images;
    
    public $validated;

    public $announcement;
    
    protected $rules = [
        'title' => 'required|min:4|max:25',
        'body' => 'required|min:10|max:1000',
        'price' => 'required|numeric',
        'category'=> 'required',
        'images.*' => 'image|max:8000',
        'temporary_images.*' => 'image|max:8000'

    ];
    // o lo si commenta o ce lo teniamo in italiano 
    protected $messages = [
        'title.required' => 'Campo obbligatorio',
        'body.required' => 'Campo obbligatorio',
        'price.required' => 'Campo obbligatorio',
        'title.min' => 'Minimo 4 caratteri',
        'body.min' => 'Minimo 10 caratteri',
        'title.max' => 'Massimo 25 caratteri',
        'body.max' => 'Massimo 1000 caratteri',
        'category.required' => 'Campo obbligatorio',
        'images.max' => 'L\'immagine è troppo grande',
        'images.image' => 'Il file delle essere un\'immagine',
        'temporary_images.*.max' => 'L\'immagine è troppo grande'
    ];
    
    public function updated($propertyname)
    {
        $this->validateOnly($propertyname);
    }
    
    public function render()
    {
        return view('livewire.announcement-form');
    }
    
    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*'=> 'image|max: 8000',
            ])) {
                foreach ($this->temporary_images as $image) {
                    $this->images[] = $image;
                }
            }
        }
        
    public function removeImage($key){
        if (in_array($key, array_keys($this->images))){
            unset ($this->images[$key]);
        }
    }
        
    public function store(){
        
        $this->validate();    
        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
            if(count($this->images)){
                foreach($this->images as $image){
                    // $this->announcement->images()->create(['path'=>$image->store('images','public')]);
                    $newFileName = "announcement/{$this->announcement->id}";
                    $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                    RemoveFaces::withChain([
                        new ResizeImage($newImage->path, 400, 400),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id),
                    ])->dispatch($newImage->id);
                    
                }

                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }

        
        $this->announcement->user()->associate(Auth::user());

        $this->announcement->save();
            
            
        $this->flash('success',__('ui.AnnuncioCreatoConSuccesso'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => false,
            'text' => __('ui.AspettaCheVengaRevisionato'),
            'width' => '500',
           ], '/nuovo/annuncio');
           
        $this->reset();

    }

        
}
