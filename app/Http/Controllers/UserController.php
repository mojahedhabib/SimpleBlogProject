<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'min:6|confirmed',
            )
        );

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->password);

        $user->save();
       /* //$input = $request->all();
        //dd($request->email);
        //dd($input); // dd() helper function is print_r alternative
*/
    /*    User::create(array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        )); */

        Session::flash('success', 'User registration successful!');

        //return redirect()->back();
        //return redirect('user');
        return redirect()->route('post.index');
    }


    public function login() {
        return view('auth.login', ['title' => 'Login']);
    }

    public function authenticate(Request $request) {
      /*  if(Auth::check(array(
            'email'=>$request->email,
            'password'=>$request->password,
        )))*/

      $credentials = $request->only('email', 'password');
        //$errors = new MessageBag;
        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);


        if (Auth::attempt($credentials))
       {
            Session::flash('success', 'Welcome! you are successfully login');
            return redirect()->route('post.index');
        }
        else
            return back()->withErrors($errors);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('user.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
