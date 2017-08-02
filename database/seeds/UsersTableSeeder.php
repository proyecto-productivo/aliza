<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'type_id' => '1',
            'status_id' => '1'
        ]);*/

        $user = new User();
        $user->name = 'Diego';
        $user->email = 'diego-jbs@hotmail.com';
        $user->password = bcrypt('123456');
        $user->type_id = 1;
        $user->status_id = 1;
        $user->save();
    }
}
