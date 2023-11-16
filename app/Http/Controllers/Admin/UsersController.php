<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Gallery;
use App\Models\Localization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $keyword = $request->get('search');
        $perPage = 25;

        $builder = User::select('id', 'name', 'email');

        if (!empty($keyword)) {
            $builder->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%");
        }

        $users = $builder->where('locale_id', $domainId)->latest()->paginate($perPage);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        
        if ($requestData['avatar'] != null) {
            $requestData['avatar'] = explode('/',$requestData['avatar']);
            $imageId = Gallery::where('url', $requestData['avatar'][3])->first();
            $requestData['avatar'] = $imageId->id;
        }

        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $requestData['locale_id'] = $domainId;
        $requestData['password'] = Hash::make($requestData['password']);

        User::create($requestData);

        return redirect('admin/users')->with('flash_message', 'User added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->all();

        if (isset($requestData['password'])) {
            $requestData['password'] = Hash::make($requestData['password']);
        }

        if ($requestData['avatar'] != null) {
            $check = strripos($requestData['avatar'], "/");
            if (is_numeric($check)) {
                $url = explode('/',$requestData['avatar']);
                $url = $url[3];
            } else {
                $url = $requestData['avatar'];
            }
            
            $imageId = Gallery::where('url', $url)->first();
            $requestData['avatar'] = $imageId->id;
        }

        $user = User::findOrFail($id);
        $user->update($requestData);

        return redirect('admin/users')->with('flash_message', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
