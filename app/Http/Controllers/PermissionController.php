<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    function __construct()
    {
        // $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        // $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // menuSubmenu('role', 'allPermission');
        $paginate = 20;
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'rolePermission', 'lsbsm' => 'allPermission']);
        $permissions = Permission::orderBy('name')->paginate($paginate);
        return view('permissions.index', compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'rolePermission', 'lsbsm' => 'newPermission']);
        // menuSubmenu('role', 'newPermission');
        $permissions = Permission::get();
        return view('permissions.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = Permission::create(['name' => $request->input('name')]);
        // $role->syncPermissions($request->input('permission'));

        return redirect()->route('permissions.index')
            ->with('success', 'Permission created successfully');
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
        $permission = Permission::find($id);

        return view('permissions.edit', compact('permission'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();



        return redirect()->route('permissions.index')
            ->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('role_has_permissions')->where('permission_id', $id)->delete();
        DB::table("permissions")->where('id', $id)->delete();
        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permission deleted successfully');
    }
}