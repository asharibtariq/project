<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $title = "User";
        return view('adminpanel.user.user')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $title = "Add User";
        $data['role_select'] = get_role();
        return view('adminpanel.user.add_user', $data)->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request){
        $userId = Auth::id();
        $insertData = $request->all();
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        $insertData['password'] = bcrypt($insertData['password']);
        User::create($insertData);
        return redirect('user')->with('success', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = User::findOrFail($id);
        $title = "Edit User";
        $data['user'] = $user;
        $data['role_select'] = get_role($user->role_id);
        return view('adminpanel.user.edit_user', $data)->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id){
        $userId = Auth::id();
        $user = User::findOrFail($id);
        $updateData = $request->all();
        $updateData['updated_by'] = $userId;
        if (!empty($updateData['password'])) {
            $updateData['password'] = bcrypt($updateData['password']);
        }
        $user->update($updateData);
        return redirect('user')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('user')->with('success', 'User Successfully Deleted');
    }
}
