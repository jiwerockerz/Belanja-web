<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $accountCount = DB::table('accounts')
                       ->where('accounts.user', Auth::user()->id)
                       ->count();
       $accountPages = DB::table('accounts')->orderBy('id', 'ASC')
                       ->where('accounts.user', Auth::user()->id)
                       ->get();

       $data = array(
           'accountCount' => $accountCount,
           'accountPages' => $accountPages
       );
       return view('home', $data);
     }



   //     $this->validate($request, [
   //     'title' => 'required|max:48',
   //     'body' => 'required',
   //     'image' => 'required',
   //     'tags' => 'required|max:200'
   // ]);

   // if ($request->ajax()) {
   //      $books = $request->books;
   //      foreach ($books as $book) {
   //          if (!empty($book)) {
   //              $add = new Book;
   //              $add->name = $book;
   //              $add->user_id = Auth::user()->id;
   //              $add->save();
   //          }
   //      }
   //  }


     



}
