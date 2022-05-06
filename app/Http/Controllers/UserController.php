<?php

namespace App\Http\Controllers;

use App\Imports\BooksImport;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $user = User::find(Auth::id());
            if($user->role == "admin"){
                return redirect()->to('/admin/dashboard');
            }else {
                return redirect()->to('/dashboard');
            }
        }else {
            return redirect()->to('/login')->with(['error' => 'Pogresan email ili password']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('/');
    }

    public function store(Request $request)
    {
        $params = $request->only('name', 'email', 'password');
        $user = new User;

        foreach($params as $param => $value){ 
            $user->$param = $value;
        }
        $user->role = "member";
        $user->save();
        return redirect()->to('/')->with('message', 'Your account is created successfully');
    }

    public function dashboard()
    {
        $books = Book::all();
        return view('dashboard', [
            'books' => $books
        ]);
    }

    public function adminDashboard()
    {
        $books = Book::all();
        return view('adminDashboard',[
            'books' => $books
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function importBooks(Request $request)
    {
        Excel::import(new BooksImport, $request->file('file'));
        return redirect()->to('/admin/dashboard')->with('message', 'Books are successfully imported');
    }
}
