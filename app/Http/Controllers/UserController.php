<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {

        $users = $this->userRepository->index();
        return view('admin.users', ['users' => $users]);
    }
    public function login()
    {
        return view('admin.auth.login');
    }
    public function auth(Request $request)
    {

        $user = $this->userRepository->authentication($request);
        if (auth()->check()) {
            return redirect()->intended('/home');
        } else {
            return back()->withErrors(['email' => 'Invalid creditional'])->onlyInput('email');
        }
    }
    public function register()
    {
        $users = User::all();
        return view('admin.auth.register');
    }
    public function create(Request $request)
    {
        $user = $this->userRepository->store($request);
        if ($user) {
            return redirect('/login');
        }
    }
    public function edit($id)
    {
        $user = $this->userRepository->edit($id);
        return view('admin.updateuser', ['user' => $user]);
    }
    public function update(Request $request)
    {
        // dd($request);
        $user = $this->userRepository->update($request);
        if ($user) {
            return back();
        }
        return redirect('/home');
    }
    public function delete($id) {
        $user = $this->userRepository->destory($id);
        if($user){
            return back();
        }
        return redirect('home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/home');
    }

    public function profile()
    {
        return view('profile');
    }
    public function products()
    {
        $products = Product::all();
        return view('admin.Products.products', ['products' => $products]);
    }

}
