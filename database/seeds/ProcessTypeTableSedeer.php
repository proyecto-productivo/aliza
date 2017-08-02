<?php

use Illuminate\Database\Seeder;
use App\ProcessType;

class ProcessTypeTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pt = new ProcessType();
        $pt->description = 'Perdió';
        $pt->save();

        $pt2 = new ProcessType();
        $pt2->description = 'Encontró';
        $pt2->save();
    }
}
