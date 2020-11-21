<?php

namespace App\Http\Controllers;
use App\Models\User;
//use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        Return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
               'category_name' => 'admin',
               'page_name' => 'utilisateurs',
               'page_title' => 'Utilisateurs',
               'has_scrollspy' => 0,
               'scrollspy_offset' => '',
           ];

        $users= User::all();
        return view('pages.utilisateurs.utilisateurs')->with('users', $users)->with($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         // if (\Auth::attempt(['email'=>$request->email ,'password'=>$request->password])) {
          //  return redirect('/');
      //  }else{
         //   return back();
       // }

       // if (Auth()->attempt(['email'=>$request->name ,'password'=>$request->password])) {
            //return redirect('auth.home');
            //dd('ok');
      // }elseif (Auth()->attempt(['name'=>$request->name ,'password'=>$request->password])) {
             //return redirect('auth.home');
       // } else{
            //return back();
           // dd('pas ok');
       // }

     $user= User::where('name', $request->name)
     ->orwhere('name', $request->name)
     ->orwhere('email', $request->name)
     ->first();

     if ($user) {
        if(\Hash::check($request->password, $user->password)){
            auth()->login($user, $request->has('remember'));
            return redirect('/');


        }
        return $this->messageError($request);
     }
        return $this->messageError($request);

      }
      public function messageError($request)
      {
        return back();
        ('pas ok');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
      /*  if (Gate::denies('edit-users')) {
            Return redirect()->route('admin.users.index');
        }
       $roles= Role::all();
       return view('admin.users.edit',[
           'user'=>$user,
           'roles'=>$roles
        ]);
        */


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $user->roles()->sync($request->roles);
        Return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(user $user)
    {
        if (Gate::denies('delete-users')) {
            Return redirect()->route('admin.users.index');
        }
        $user->roles()->detach();// detacher les roles de l'utilisateurs
        $user->delete();
        Return redirect()->route('admin.users.index');
    }
    */
}
