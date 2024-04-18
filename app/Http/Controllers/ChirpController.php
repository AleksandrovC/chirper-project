<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Chirp;
use App\Models\ChirpClap;



class ChirpController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    // public function index(): Response
    // {
    //     return response('Hello, World!');
    // }


    public function index(): View
    {
        return view('chirps', [
            //
        ]);
    }

 public function clap(Chirp $chirp, Request $request)
    {

        if ($chirp->claps()->where('user_id', $request->user()->id)->count() > 50) {
            return redirect()->back()->with('error', 'You have already clapped for this chirp.');
        }

        // Create a new clap for the chirp
        ChirpClap::create([
            'user_id' => $request->user()->id,
            'chirp_id' => $chirp->id,
        ]);

        return redirect()->back()->with('success', 'Clap added successfully.');
    }
}
