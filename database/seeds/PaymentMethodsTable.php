<?php

use Illuminate\Database\Seeder;

class PaymentMethodsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('payment_methods')->insert([
          [
            'name' => 'Cash',
            'type' => 1,
          ],[
            'name' => 'Cheque',
            'type' => 1,
          ],[
            'name' => 'Fast Payment/BACS',
            'type' => 1,
          ],[
            'name' => 'Standing Order Blynyddol',
            'type' => 2,
          ],[
            'name' => 'Standing Order Misol',
            'type' => 2,
          ],[
            'name' => 'GoCardless Misol',
            'type' => 2,
          ],[
            'name' => 'Cerdyn',
            'type' => 1,
          ],
      ]);
    }
}
