<?php

namespace Database\Seeders;

use App\Models\UserAccount;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Facade\Ignition\Support\FakeComposer;
use Database\Factories\UserFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


class UserSeeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

            DB::table('user_accounts')->insert([
                'fullname' => Str::random(10),
                'id_number' => Str::random(10),
                'username' => Str::random(10),
                'email' => 'honcapable@gmail.com',
              
                'compound' => Str::random(10),
                'institution' => Str::random(10),
                'place_of_residence' => Str::random(10),
                'marital_status' => Str::random(10),
                'security_question' => Str::random(10),
                'answers' => Str::random(10),
                'phone' => Str::random(10),
                'stakeholder' => Str::random(10),
                'category' => Str::random(10),
               
                'post_held' => Str::random(10),
                'address' => Str::random(10),
                'gender' => Str::random(10),
                'password' => Hash::make('password'),
            ]);
    }
}
