<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(App::environment(['local','testing','production']))
        {
            // create profile & users    
            $this->command->info('Initial User');
            $this->command->getOutput()->progressStart(20);
            Profile::factory(20)->create()->each(function ($profile) {
                $user= User::factory()->make();
                $profile->user()->save($user);
            });
            $this->command->getOutput()->progressFinish();
     
        } else {
            $this->command->info('Skip');
        }
    }
}
