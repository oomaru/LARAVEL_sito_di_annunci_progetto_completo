<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RevisorMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        Alert::success(__('ui.GrazieHaiAccettatoLannuncio'));
        return redirect()->back();
    }

    public function rejectAnnouncement(Announcement $announcement){
        
        $announcement->setAccepted(false);
        Alert::success('Grazie!', 'Hai rigettato con successo l\'annuncio.');
        return redirect()->back();
    }

    public function becomeRevisor(Request $request){

        $description = $request->input('description');

        Mail::To('admin@presto.it')->send(new RevisorMail(Auth::user(), $description));
        Alert::success('Grazie!', __('ui.AbbiamoRicevutoLaTuaCandidatura'));
        return redirect()->back();
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:MakeUserRevisor', ['email'=> $user->email]);
        return redirect()->back();
    }


}