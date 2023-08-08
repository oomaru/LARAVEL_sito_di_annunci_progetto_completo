<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function announcements (){
        return $this->hasMany(Announcement::class);
    }
    // public function color()
    // {
    //     return ['red', 'green', 'black', 'blue', 'purple'][$this->id % 5];
    // }
    
    public function icon()
    {
        return ['x','car', 'desktop', 'blender', 'book', 'gamepad', 'volleyball' , 'house', 'mobile-screen', 'couch'][$this->id % 10];
    }
}
