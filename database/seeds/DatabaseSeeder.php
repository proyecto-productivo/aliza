<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypeDocTableSedeer::class);
        $this->call(TypePetTableSedeer::class);
        $this->call(SubTypePetTableSedeer::class);
        $this->call(ProcessTypeTableSedeer::class);
        $this->call(ProcessStatusTableSedeer::class);
        $this->call(CountryTableSedeer::class);
        
    }
}
