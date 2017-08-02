<?php

use Illuminate\Database\Seeder;
use App\TypePet;

class TypePetTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typePet1 = new TypePet();
        $typePet1->description = 'Perro';
        $typePet1->save();

        $typePet2 = new TypePet();
        $typePet2->description = 'Gato';
        $typePet2->save();
    }
}
