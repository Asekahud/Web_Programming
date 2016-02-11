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
        // $this->call(UserTableSeeder::class);
        $this->call(CategoriesSeeder::class);
    }
}
class CategoriesSeeder extends Seeder {
    
    public function run() {
        DB::table('categories')->delete();
        Post::create([
            'category_name' => 'title',            
        ]);
        Post::create([
            'category_name' => 'slug',            
        ]);
        Post::create([
            'category_name' => 'excerpt',            
        ]);
    }
    
}
