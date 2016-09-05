<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;
use App\Photo;
use App\Category;
use Carbon\Carbon;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
       
       return view('admin.users.index',compact('users','admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $roles = Role::lists('name','id')->all();// lists zwraca array a nie collection jak przy all()
     //kolejnosc name id bo na odwrot wartosci sa pozamieniane w formie (zbadaj element)
     return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $trimmed = trim($request->password);
          if( $trimmed = '') {
            $input = $request->except('password');
        }else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        
        
    
        if($file = $request->file('photo_id')) {
           $now = Carbon::now()->toFormattedDateString();
           
           $name = $now. $file->getClientOriginalName();
           $file->move('images',$name);
           $photo = Photo::create(['file'=>$name]);
           $input['photo_id'] = $photo->id;
           
        }
        $input['password'] = bcrypt($request->password);
      User::create($input);
      return redirect('/admin/users');
   
       
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
        $user = User::findOrFail($id);
        $roles = Role::lists('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        
         $user = User::findOrFail($id);
        $trimmed = trim($request->password);
        if($trimmed = '') {
            $input = $request->except('password');
        }else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        
        
       
    
       if($file = $request->file('photo_id')) {
           $now = Carbon::now()->toFormattedDateString();
           
           $name = $now. $file->getClientOriginalName();
           $file->move('images',$name);
           $photo = Photo::create(['file'=>$name]);
           $input['photo_id'] = $photo->id;
       }
       $user->update($input);
       return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user =User::findOrFail($id);
       //usuwanie zdjecia razem z userem
       //nie trzeba podawac folderu bo idzie on z accessora
     unlink(public_path().$user->photo->file);
      $user->delete();
       Session::flash('deleted_user', 'The user has been deleted');
       return redirect('/admin/users');
    }
}
