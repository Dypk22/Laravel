<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\userAddress;
use App\Models\Groups;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set("Asia/Kolkata");
        $time=date("Y-m-d H:i:s");       

        $Groups = new Groups;
        $Groups->name = 'Super Admin';
        $Groups->created_at = $time;
        $Groups->updated_at = $time;
        $Groups->save();

        $Groups = new Groups;
        $Groups->name = 'Normal User';
        $Groups->created_at = $time;
        $Groups->updated_at = $time;
        $Groups->save();        

        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->mobile = rand(9999999999, 1111111111);
        $user->password = Hash::make(123);
        $user->group_id = 1;
        $user->email_verified = 1;
        $user->created_at = $time;
        $user->updated_at = $time;
        $user->save();

        $Faker = Faker::create();
        for ($i=0; $i < 2000 ; $i++) {         
            date_default_timezone_set("Asia/Kolkata");
            $time=date("Y-m-d H:i:s");       
            $user = new User;
            $user->name = $Faker->name;
            $user->email = $Faker->email;
            $user->mobile = rand(9999999999, 1111111111);
            $user->password = Hash::make($Faker->password);
            $user->group_id = 1;
            $user->email_verified = 0;
            $user->created_at = $time;
            $user->updated_at = $time;
            $user->save();

            $userAddress = new userAddress;
            $userAddress->user_id = $user->id;
            $userAddress->address = $Faker->address;
            $userAddress->created_at = $time;
            $userAddress->updated_at = $time;
            $userAddress->save();
        }
    }
}
