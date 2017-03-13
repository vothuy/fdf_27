<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    protected function uploadImage($request)
    {
        if (!($request->hasFile('avatar'))) {           
            return null;
        }
 
        $file = $request->file('avatar');
        $fileName = $file->getClientOriginalName();
        if (Storage::exists(config('settings.userAvatar') . $fileName)) {
            $fileName = md5(time()) . $fileName;
        }
 
        $userAvatar = $file->storeAs(config('settings.userAvatar'), $fileName);
        return $userAvatar; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $userAvatar = $this->uploadImage($request);
        $input = $request->all();
        if (!isset($userAvatar)) {
            unset($input['avatar']);
        } else {
            $input['avatar'] = $userAvatar;
        }
        $user = $this->user->create($input);    
        if ($user) {
            return redirect()->action('Admin\UserController@index')->with('notification', trans('admin.notification.addsuccess'));
        }

        return redirect()->action('Admin\UserController@index')->with('notification', trans('admin.notification.fail'));
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
        try {
            $user = User::find($id);
            return view('admin.user.edit', compact('user'));
        } catch(\Exception $e){
            return redirect()->action('Admin\UserController@index')->with('notification', trans('admin.notification.failchoose'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->user->find($id);
        $input = $request->all();
        $user->update($input);
        if ($user) {
            return redirect()->action('Admin\UserController@index')->with('notification', trans('admin.notification.editsuccess'));
        }
 
        return redirect()->action('Admin\UserController@index')->with('notification', trans('admin.notification.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();  
            return redirect()->action('Admin\UserController@index')->with('notification', trans('admin.notification.userDelete'));
        } catch(\Exception $e){
            return redirect()->action('Admin\UserController@index')->with('notification', trans('admin.notification.fail'));
        }
    }
}
