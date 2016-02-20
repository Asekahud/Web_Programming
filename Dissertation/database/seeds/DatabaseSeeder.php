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
        DB::table('categories')->insert([ 'category_name' => 'title',]);
        DB::table('categories')->insert([ 'category_name' => 'slug',]);
        DB::table('categories')->insert([ 'category_name' => 'excerpt',]);      
    }
    
}
