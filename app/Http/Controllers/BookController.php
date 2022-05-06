<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $user = User::find(Auth::id());
        $search_param = $request->get('search');
        $books = Book::where('naziv_knjige', 'LIKE', "%{$search_param}%")->get();

        if($user->role == "member"){
            return view('dashboard', [
                'books' => $books
            ]);
        } else {
            return view('adminDashboard', [
                'books' => $books
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $value = $request->get('age');
        $user = User::find(Auth::id());

        if($user->role == "admin"){
            
            if($value == 5){
                $books = Book::where('godina_izdanja', '>=', Carbon::now()->subYears(5))->get();
                return view('adminDashboard', [
                    'books' => $books
                ]);
            } else if($value == 10){
                $books = Book::where('godina_izdanja', '>=', Carbon::now()->subYears(10))->get();
                return view('adminDashboard', [
                    'books' => $books
                ]);
            } else if($value == 0){
                $books = Book::all();
                return view('adminDashboard', [
                    'books' => $books
                ]);
            }
            else if($value == 15) {
                $books = Book::where('godina_izdanja', '<', Carbon::now()->subYears(10))->get();
                return view('adminDashboard', [
                    'books' => $books
                ]);
            }
        } else{
            
            if($value == 5){
                $books = Book::where('godina_izdanja', '>=', Carbon::now()->subYears(5))->get();
                return view('dashboard', [
                    'books' => $books
                ]);
            } else if($value == 0){
                $books = Book::all();
                return view('adminDashboard', [
                    'books' => $books
                ]);
            } else if($value == 10){
                $books = Book::where('godina_izdanja', '>=', Carbon::now()->subYears(10))->get();
                return view('dashboard', [
                    'books' => $books
                ]);
            }
            else {
                $books = Book::where('godina_izdanja', '<', Carbon::now()->subYears(10))->get();
                return view('dashboard', [
                    'books' => $books
                ]);
            }
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

}
