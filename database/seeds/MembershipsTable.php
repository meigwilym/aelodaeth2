<?php

use Illuminate\Database\Seeder;

class MembershipsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('memberships')->insert([
           [
               'name' => 'Aelod Llawn',
               'description' => 'Aelodaeth am 1 mlynedd. ',
               'status' => true,
               'cost' => 30,
               'duration' => 12,
               'admin_only' => false,
           ],[
               'name' => 'Aelodaeth Chwaraewr',
               'description' => 'Aelodaeth am 1 mlynedd i chwaraewyr. Dim hawliau tocynnau rhyngwladol. ',
               'status' => true,
               'cost' => 20,
               'duration' => 12,
               'admin_only' => false,
           ],[
               'name' => 'Aelodaeth Ieuenctid',
               'description' => 'Aelodaeth am 1 mlynedd i rhywun dan 18. Dim hawliau tocynnau rhyngwladol. ',
               'status' => true,
               'cost' => 10,
               'duration' => 12,
               'admin_only' => false,
           ],[
               'name' => 'Aelod Llawn 5 mlynedd',
               'description' => 'Aelodaeth Llawn am 5 mlynedd. ',
               'status' => true,
               'cost' => 120,
               'duration' => 60,
               'admin_only' => false,
           ],[
               'name' => 'Aelod Oes',
               'description' => 'Aelod am oes. ',
               'status' => true,
               'cost' => 0,
               'duration' => null,
               'admin_only' => true,
           ],
       ]);
    }
}
