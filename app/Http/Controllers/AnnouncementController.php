<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnnouncementController extends Controller
{
    public function create(){
        return view('announcement.create');
    }

    public function showAnnouncement(Announcement $announcement){
        return view('announcement.show', compact('announcement'));
    }

    public function indexAnnouncement(){
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at','desc')->paginate(9);
        return view('announcement.index', compact('announcements'));
    }


    public function destroy(Announcement $announcement)
    {
    $announcement->delete();
    Alert::success(__('ui.HaiRigettatoLannuncio'));
    return redirect()->route('welcome');
    }

    public function edit($id){
        $announcement = Announcement::findOrFail($id);
        return view('announcement.edit' , compact('announcement'));
        }


}
