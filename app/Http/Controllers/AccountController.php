<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

      public function createWalletAccount(Request $request){
        // create new account
         $accval = Input::get('account');
         $amval = Input::get('amount');

         $account = Account::create(array(
             'name' => $accval,
             'user' => Auth::user()->id
         ));

         $record = DB::table('records')
                 -> insert(array(
                     'type' => 'initial amount',
                     'amount' => $amval,
                     'account' => $account->id,
                     'balance' => $amval,
                     'user' => Auth::user()->id,
                     'describe' => 'initial amount',
                     'category' => 'initial amount',
                     'label' =>'initial amount',
                     'created_at' => now(),
                     'updated_at' => now()
                 ));

         return redirect()->route('account.all')->with('success', $accval.' Account has been successfully created!');
     }


     public function deleteWalletAccount($id){
       //  delete account
       $account = DB::table('accounts')
       ->where('id', $id)
       ->delete();
       return redirect()->route('account.all')->with('success', 'Account has been successfully deleted!');
     }


     public function getAccount(){
       // get all accounts
           $account = DB::table('users')
                     ->leftjoin('accounts', 'users.id', '=', 'accounts.user')
                     ->leftjoin('records', 'records.account', '=', 'accounts.id')
                     ->select('users.*', 'accounts.id as acc_id', 'accounts.name as acc_name', 'records.*')
                     ->where('accounts.user', Auth::user()->id)
                    //  ->groupBy('accounts.id')
                     ->get();

           $accountPages = DB::table('accounts')->orderBy('id', 'ASC')
                           ->where('accounts.user', Auth::user()->id)
                           ->get();

           $data = array(
               'accounts' => $account,
               'accountPages' => $accountPages
           );

       return view('account/all_account',$data);
     }

     public function getAccountDetail($id){
      //  get Account detail
         $records = DB::table('accounts')
                   ->leftjoin('records', 'records.account', '=', 'accounts.id')
                   ->where('accounts.id', $id)
                   ->where('accounts.user', Auth::user()->id )
                   ->get();

         $accountPages = DB::table('accounts')->orderBy('id', 'ASC')
                         ->where('accounts.user', Auth::user()->id)
                         ->get();

         // $accounts = DB::table('accounts')
         //           ->where('accounts.id', $id)
         //           ->get();
         $accounts = Account::find($id);

         $data = array(
             'accounts' => $accounts,
             'records' => $records,
             'accountPages' => $accountPages
         );
         if(count($records) == 0){ abort(404); }
         return view('account/detail_account', $data);
     }
}
