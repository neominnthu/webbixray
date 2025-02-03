<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;


class PermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','show']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $data = Permission::latest()->paginate(8);

        return view('backend.permissions.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 8);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('backend.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse

    {

        $this->validate($request, [

            'name' => 'required|unique:permissions,name',

        ]);

        $permission = Permission::create(['name' => $request->input('name')]);

        return redirect()->route('permissions.index')->with('success','User updated successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id): View

    {

        $permission = Permission::find($id);
        return view('permissions.show',compact('permission'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View

    {

        $permission = Permission::find($id);
        return view('permissions.edit',compact('permission'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse

    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();


        return redirect()->route('permissions.index')->with('success','User updated successfully');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success','User deleted successfully');
    }
}

