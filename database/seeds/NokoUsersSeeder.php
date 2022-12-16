<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\DatabaseManager\DB;
use App\User;
use App\Models\ateModel;


class NokoUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(ateModel::all() as $ate){
            $pass = rand(11111111,99999999);
            $user = User::create(['pass' => md5($pass), 'ate' => $ate->id,'type' => 0]);
            echo $user->id,$ate->name,"=",$pass,"\n";
        }
    }
}
