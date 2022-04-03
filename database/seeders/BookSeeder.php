<?php

namespace Database\Seeders;

use App\Models\Book;
use Ramsey\Uuid\Uuid;
use Faker\Factory as Dummy;
use Illuminate\Support\Str;
use App\Models\CategoryBook;
use App\Models\PublisherBook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct() {
        $this->faker = Dummy::create('id_ID');
        $this->category = json_decode(file_get_contents('database/data/category.json'));
        $this->publisher = json_decode(file_get_contents('database/data/publisher.json'));
    }

    public function run()
    {
        if(App::environment(['local','testing','production']))
        {
            // create category book    
            $this->command->info('Initial Category Book');
            $this->command->getOutput()->progressStart(count($this->category));

            foreach($this->category as $category) {
                $category = $this->createCategory($category);
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            

            // create publsher book
            $this->command->info('Initial Publisher Book');
            $this->command->getOutput()->progressStart(count($this->publisher));
        
            // $publisher = $this->createPublisher();
            foreach($this->publisher as $publisher) {
                $publisher = $this->createPublisher($publisher);
                $this->command->getOutput()->progressAdvance();
            }
        
            $this->command->getOutput()->progressFinish();

            // create book
            $this->command->info('Initial Book');
            $this->command->getOutput()->progressStart(50);
        
            $category = CategoryBook::inRandomOrder()->first();
            $publisher = PublisherBook::inRandomOrder()->first();
    
            foreach(range(1, rand(40,50)) as $value)
            {
                $this->createBook($value,$category,$publisher);
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();


        } else {

            $this->command->info('Skip');
            
        }
    }

    public function createCategory($category)
    {
        CategoryBook::create([
            'title' => $category->title,
            'is_active' => true
        ]);
    }

    public function createPublisher($publisher)
    {
        PublisherBook::create([
            'title' => $publisher->title,
            'is_active' => true
        ]);
    }

    public function createBook($book, $category, $publisher)
    {   
        $title = $this->faker->sentence;

        Book::create([
            'uuid' => Uuid::uuid1(),
            'category_books_id' => $category->id,
            'publisher_books_id' => $publisher->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'synopsis' => $this->faker->paragraph,
            'author' => $this->faker->name,
            'total_page' => rand(50,200),
            'total_stock' => rand(1,10),
            'publish_year' => date('Y')
        ]);
    }
}
