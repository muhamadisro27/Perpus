<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DefaultMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct() {
        $this->major = ['Teknik Elektro','Teknik Sipil','Teknik Mesin','Akuntansi','Perhotelan'];
        $this->grade = [1,2,3,4,5,6];
    }

    public function run()
    {
        if(App::environment(['local','testing','production'])) {

             // create list major     
             $this->command->info('Initial Major');
             $this->command->getOutput()->progressStart(count($this->major));
 

             foreach($this->major as $major)
             {
                 Major::create([
                     'title' => $major
                 ]);
             }
             $this->command->getOutput()->progressFinish();

              // create grade     
              $this->command->info('Initial Grade');
              $this->command->getOutput()->progressStart(count($this->grade));
  
 
              foreach($this->grade as $grade)
              {
                  Grade::create([
                      'title' => $grade
                  ]);
              }
              $this->command->getOutput()->progressFinish();
        } else {
            $this->command->info('Skip');
        }
    }
}
