<?php

use Illuminate\Database\Seeder;
use App\SubTypePet;

class SubTypePetTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stp = new SubTypePet();
        $stp->type_id = '1';
        $stp->description = 'Raza 1';
        $stp->save();

        $stp2 = new SubTypePet();
        $stp2->type_id = '2';
        $stp2->description = 'Raza 2';
        $stp2->save();
    }
}
