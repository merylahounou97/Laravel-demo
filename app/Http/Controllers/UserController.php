<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tinify\Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->select(['id', 'name', 'role', 'email'])->get();
        // $users = User::all();
        return response()->json($users, 201);
    }

    public function index_web()
    {
        $users = User::all();
        return view('auth.index', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string']
        ]);

        // if ($request->role != 'admin' && $request->role != 'user') {
        //     return redirect()->route('users.create');
        // }

        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrfail($id);
        return response()->json($user, 201);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('auth.update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string'],
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('users.index_web');
    }

    public function update_picture(Request $request, $id)
    {
        $request->validate([
            'picture' => ['image', 'mimes:jpeg,png,jpg']
        ]);
        var_dump($request->file('picture'));
        $user = User::find($id);

        if ($request->hasFile('picture')) {
            try {
                \Tinify\setKey(env("TINY_API_KEY"));

                $tempPath = $request->file('picture')->path();

                $sourceData = file_get_contents($tempPath);
                $resultData = \Tinify\fromBuffer($sourceData)->toBuffer();

                $file_location = $request->file('picture')->store();
                Storage::put('' . $file_location, $resultData);

                $user->update([
                    'picture' => $file_location
                ]);
                return redirect()->route('users.index_web');
            } catch (Exception $e) {
                return redirect()->route('users.index_web', ['users' => $user])->withErrors(['picture' => 'L\'image ne correspond pas']);
            }
        } else {
            //     return view('auth.update_picture', ['user' => $user])
            return view('auth.update_picture', ['user' => $user]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès']);
    }
}
