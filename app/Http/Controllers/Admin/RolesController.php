<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRolesRequest;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $this->authorize('view', new Role);

        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $this->authorize('create',$role = new Role);

        $permisos = Permission::pluck('name','id');        

        return view('admin.roles.create', compact('permisos','role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        $this->authorize('create',new Role);

        // $data = $request->validate([
        //     'name'  => 'required|unique:roles',
        //     'guard_name'  => 'required',
        // ]);

        // $role = Role::create($data);
        $role = Role::create($request->validated());       

        $role->givePermissionTo($request->permissions);

        return redirect()->route('admin.roles.index')->withFlash('Role creado');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)    {

        $this->authorize('update',$role);
        
        $permisos = Permission::pluck('name','id');        

        return view('admin.roles.edit', compact('permisos','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        $this->authorize('update',$role);
        // $data = $request->validate([
        //     'name'  => 'required|unique:roles,name,'.$role->id,
        //     'guard_name'  => 'required',
        // ]);

        $role->update($request->validated());

        $role->permissions()->detach();
        $role->givePermissionTo($request->permissions);

        return redirect()->route('admin.roles.edit', $role)->withFlash('Role actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        $this->authorize('delete',$role);

        $role->delete();

         return redirect()->route('admin.roles.index')->withFlash('Role borrado!');

    }
}
