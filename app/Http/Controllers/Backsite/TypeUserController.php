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
use App\Models\Masterdata\TypeUser;


// third party

class TypeUserController extends Controller
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
        $type_user = TypeUser::all();

        // debug data
        // dd($type_user);

        return view('pages.backsite.management-access.type-user.index', compact('type_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
