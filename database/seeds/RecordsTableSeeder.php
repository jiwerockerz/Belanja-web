<?php

use App\Record;
use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Record::create([
          'type' => 'income',
          'user' => '1',
          'amount' => '1500',
          'balance' => '1500',
          'describe' => 'Gaji Pertama Ku',
          'category' => 'Income',
          'label'	=> 'Gaji',
          'account' => '1',
      ]);
    }
}
