<?php

use Illuminate\Database\Seeder;
use App\ProcessStatus;

class ProcessStatusTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ps = new ProcessStatus();
        $ps->description = 'Registrado';
        $ps->save();

        $ps2 = new ProcessStatus();
        $ps2->description = 'Resuelto';
        $ps2->save();
    }
}
