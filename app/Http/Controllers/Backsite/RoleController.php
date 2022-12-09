<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreroleRequest;
use App\Http\Requests\Role\UpdateroleRequest;
use App\Models\ManagementAccess\Permision;
use App\Models\ManagementAccess\PermisionRole;
use App\Models\ManagementAccess\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::orderBy('created_at', 'desc')->get();
        return view('pages.backsite.management-access.role.index');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreroleRequest $request)
    {
        $data = $request->all();

        $role = Role::create($data);
        alert()->success('success message', 'success store role');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // why use load orm?
        // jadi kalo kita klik role nya nanti akan d tunjukin permision apa yang dia punya
        $role->load('permision');
        return view('pages.backsite.management-access.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // tampilin semua permision
        $permision = Permision::all();
        $role->load('permision');
        return view('pages.backsite.management-access.role.edit', compact('permision','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateroleRequest $request, Role $role)
    {
      $role->update($request->all());
      $role->permision()->sync($request->input('permision',[]));
      alert()->success('success message','success update role');
      return redirect()->route('backsite.role.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->forceDelete();
        return back();
    }
}
