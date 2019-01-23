<?php

namespace App\Http\Controllers\Admin;

use App\Events\UsuarioFueCreado;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::Permitidos()->get();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = new User;

        $this->authorize('create', $user);

        $roles = Role::with('permissions')->get(); // para listar también los permisos
        $permisos = Permission::pluck('name','id');

        return view('admin.users.create', compact('user','roles','permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $data['password']= str_random(8);

        $user = User::create($data);

        $user->assignRole($request->roles);
        $user->givePermissionTo($request->permissions);

        // enviar email
        //UsuarioFueCreado::dispatch($user, $data['password']);

        return redirect()->route('admin.users.index')->withFlash('El usuario ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get(); // para listar también los permisos
        $permisos = Permission::pluck('name','id');

        return view('admin.users.edit', compact('user','roles','permisos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $this->authorize('update', $user);
           // dd($request);
        $user->update($request->validated());

        //return back()->withFlash('Usuario actualizado');
        return redirect()->route('admin.users.edit', $user)
             ->withFlash('El usuario ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user de esta manera inyectamos el modelo y de esta forma
     *          laravel busca el usuario automáticamente
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('admin.users.index')->withFlash('El usuario ha sido eliminado');
    }
}
