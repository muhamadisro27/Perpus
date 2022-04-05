<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // Initial System Activity

         $this->command->info(PHP_EOL);
         $this->command->info('⚙️ initial'.PHP_EOL);
         $this->command->info('********** Initial System **********'.PHP_EOL);
         $this->command->info('************************************'.PHP_EOL);
         
         $this->call(UserSeeder::class);

         // Initial Default System

         $this->command->info(PHP_EOL);
         $this->command->info('⚙️ initial'.PHP_EOL);
         $this->command->info('********** Initial Default System **********'.PHP_EOL);
         $this->command->info('************************************'.PHP_EOL);
         
         $this->call(DefaultMasterSeeder::class);

          // Initial Student Activity

          $this->command->info(PHP_EOL);
          $this->command->info('⚙️ initial'.PHP_EOL);
          $this->command->info('********** Initial Student **********'.PHP_EOL);
          $this->command->info('************************************'.PHP_EOL);
          
          $this->call(StudentSeeder::class);

         // Initial Book Activity

         $this->command->info(PHP_EOL);
         $this->command->info('⚙️ initial'.PHP_EOL);
         $this->command->info('********** Initial Book **********'.PHP_EOL);
         $this->command->info('************************************'.PHP_EOL);
         
         $this->call(BookSeeder::class);
    }
}
