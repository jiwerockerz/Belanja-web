<?php

use App\Account;
use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Account::create([
          'name' => 'Bank Islam',
          'user' => '1',
      ]);
    }
}
