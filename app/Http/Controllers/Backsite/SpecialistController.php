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
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

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

        // dd($specialist);
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

       Alert()->success('Succes message', 'successfull added specialist');

    //    redirect to index specialist
    Redirect()->route('backsite.specialist.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist) //$specialist=(id)
    {
        return view('pages.backsite.master-data.specialist.show', compact('specialist')); //kita bawa id ($specialist)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        //
        return view('pages.backsite.master-data.specialist.edit', compact('specialist')); //kita bawa id ($specialist)

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  call request update
    public function update(updatespecialistRequest $request, Specialist $specialist)
    {
        

          // crete variabel Penampung for get all request
          $data = $request->all();

          // update to DB
          $specialist->update($data);
  
         Alert()->success('Succes message', 'successfull update specialist');
  
      //    redirect to index specialist
      Redirect()->route('backsite.specialist.index');
  
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        //
        $specialist->delete();

        Alert()->success('Succes message','succesful deleted specialist');
        return back();
    }
}
