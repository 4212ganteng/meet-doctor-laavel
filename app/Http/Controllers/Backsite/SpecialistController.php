<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
// use library here
// storage for get image/file
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use everyting here
// for handle auth
use auth;
// use Gate;

// call model here, yang mau di tampilin
use App\Models\Masterdata\Specialist;

// request with method here
use App\Http\Requests\Specialist\storespecialistRequest;
use App\Http\Requests\Specialist\updatespecialistRequest;


// third party

class SpecialistController extends Controller
{

       // create func construct auth midleware
       public function __construct()
       {
           $this->middleware('auth');
       }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $specialist = Specialist::orderBy('created_at','desc')->get();

        dd($specialist);
        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storespecialistRequest $request)
    {
        // crete variabel Penampung for get all request
        $data = $request->all();

        // store to DB
        $specialist = Specialist::create($data);

        // return response
        return aort($specialist);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
