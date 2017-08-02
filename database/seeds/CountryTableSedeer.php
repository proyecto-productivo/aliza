<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountryTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Country();
        $c->code = 57;
        $c->name = 'Colombia';
        $c->save();
    }
}
