<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = Users::all();
        return view('contents.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ];

        if (Request($data)) {
            $request->validate([
                'name' => 'required',
                'email' => 'unique:users,email|required',
                'password' => 'required',
                'role' => 'required',
            ]);
        }

        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        Users::create($data);

        return redirect()
            ->route('users.index')
            ->with('message', 'Success Added Data!');
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
        $data['user'] = Users::find($id);
        return view('contents.users.edit', $data);
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
        $user = Users::find($id);
        if ($user) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ];
            if ($request->password != '') {
                $data['password'] = Hash::make($request->password);
            }
            $user->update($data);
            return redirect()
                ->route('users.index')
                ->with('message', 'Success Edit Data!');
        } else {
            return redirect()->route('users.index');
        }

        $data = $request->all();
        $user->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
