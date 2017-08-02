<?php

use Illuminate\Database\Seeder;
use App\TypeDoc;

class TypeDocTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeDoc1 = new TypeDoc();
        $typeDoc1->description = 'Cedula';
        $typeDoc1->save();

        $typeDoc2 = new TypeDoc();
        $typeDoc2->description = 'Licencia de conducción';
        $typeDoc2->save();

        $typeDoc3 = new TypeDoc();
        $typeDoc3->description = 'Carnet de institución';
        $typeDoc3->save();

        $typeDoc4 = new TypeDoc();
        $typeDoc4->description = 'Otro';
        $typeDoc4->save();
    }
}
