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
use App\Models\Operational\Doctor;
use App\Models\Masterdata\Specialist;


// request with method here
use App\Http\Requests\Doctor\StoredoctorRequest;
use App\Http\Requests\Doctor\UpdatedoctorRequest;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

// third party

class DoctorController extends Controller
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

        $doctor = Doctor::orderBy('created_at','desc')->get();

        // select 2(milih specialist apa) order bay name asc
        $specialist = Specialist::orderBy('name','asc')->get();

        // dd($specialist);
        return view('pages.backsite.operational.doctor.index', compact('doctor','specialist')); //bawa 2 data model (doctor dan specialist id)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //karena create nya di index
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredoctorRequest $request)
    {
        $data = $request->all();

        // store data
        $doctor = Doctor::create($data);

        alert()->success('success message', 'succesfull added new doctor');
        return Redirect::route('backsite.operational.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        
        // select 2(milih specialist apa) order bay name asc
        $specialist = Specialist::orderBy('name','asc')->get();
        return view('pages.backsite.operational.doctor.edit', compact('doctor','specialist')); //bawa 2 data model (doctor dan specialist id)

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedoctorRequest $request, Doctor $doctor)
    {
        
          // crete variabel Penampung for get all request
          $data = $request->all();

          // update to DB
          $doctor->update($data);
  
         Alert()->success('Succes message', 'successfull update doctor');
  
        //    redirect to index specialist
        Redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor$doctor)
    {
        //delete paksa
        $doctor->forceDelete();

        Alert()->success('Succes message','succesful deleted doctor');
        return back();
    }
}
