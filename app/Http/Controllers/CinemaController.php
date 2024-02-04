<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CinemaService;

class CinemaController extends Controller{
    public function __construct(private CinemaService $cinemaService)
    {
    }

    public function store(Request $request){
        $valid = $request ->validate([
            'title' => 'required',
            'poster' => 'required',
            'director' => 'required'
        ]);

        $this->cinemaService->savePost($valid);
        return redirect('addfilm')->with('success','done');
    }
}
