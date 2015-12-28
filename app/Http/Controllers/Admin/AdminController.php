<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth as JWTAuth;

class AdminController extends Controller
{

    /**
     * Show admin attributes for dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dashboard()
    {
        $admin = Auth::user();
        return response()->json(compact('admin'));
    }

    /**
     * Display a listing of Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(compact('users'));
    }

    /**
     * Show the form for creating a new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created User in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required|numeric',
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role_id' => $request['role_id'],
            'password' => bcrypt($request['password'])
        ]);
        $user->jwt_token = JWTAuth::fromUser($user);

        if ($user->save()) {
            return response()->json(compact('user'));
        } else {
            $message = 'Something went wrong, please try again!';
            return response()->json(compact('message'));
        }
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(compact('user'));
    }

    /**
     * Show the form for editing specified User.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update User in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,id,' . $request->segment(2),
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required|numeric',
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json(compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (User::destroy($id)) {
            $message = 'User deleted';
        } else {
            $message = 'Something went wrong, please try again!';
        };

        return response()->json(compact('message'));
    }
}
