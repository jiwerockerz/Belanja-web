<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RecordController extends Controller
{
  public function addRecord($id){
    // create new record
    $category_rec = "";
    $label_rec = "";

     $type_rec = Input::get('type_rec');
     $amount_rec = Input::get('amount_rec');
     $desc_rec = Input::get('desc_rec');
     $label_rec = Input::get('label_rec');
     $category_rec = Input::get('category_rec');

      $latest = DB::table('records')
              ->where('account', $id)
              ->orderBy('updated_at', 'desc')
              ->first();
    $latestBal= 0;
    try {
      if ($type_rec == 'in') {
        $latestBal = $latest->balance + $amount_rec;
      }elseif ($type_rec == 'out') {
        $latestBal = $latest->balance - $amount_rec;
      }

       $record = DB::table('records')
               -> insert(array(
                   'type' => $type_rec,
                   'amount' => $amount_rec,
                   'account' => $id,
                   'balance' => $latestBal,
                   'user' => Auth::user()->id,
                   'describe' => $desc_rec,
                   'category' => $category_rec,
                   'label' => $label_rec,
                   'created_at' => now(),
                   'updated_at' => now()
               ));
    } catch (Exception $e) {
      echo $e;
    }



     return redirect()->route('account.all')->with('success', ' Record created successfully!');
 }

}
