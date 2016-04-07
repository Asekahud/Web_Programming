<?php

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Product;
use App\Models\User;

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
        $this->call(UsersSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(EventsSeeder::class); 
    }
}
class CategoriesSeeder extends Seeder {    
    public function run() {
        DB::table('categories')->delete();
        DB::table('categories')->insert(['category_name' => 'Books',]);
        DB::table('categories')->insert(['category_name' => 'Others',]);
        DB::table('categories')->insert(['category_name' => 'Events',]);      
    }    
}
class AdminsSeeder extends Seeder {    
    public function run() {
        DB::table('admins')->delete();
        DB::table('admins')->insert([ 'admin_id' => '1',]);            
    }    
}
class UsersSeeder extends Seeder {
    public function run() {
        DB::table('users')->delete();
        User::create([
            'student_id' => 'u1277006',
            'firstname' => 'Asset',
            'lastname' => 'Aitbayev',
            'email' => 'asekahud@gmail.com',
            'password' => bcrypt('lss412'),                       
        ]);
        User::create([
            'student_id' => 'u1143507',
            'firstname' => 'Ali',
            'lastname' => 'Tursungaliev',
            'email' => 'alikhan@gmail.com',
            'password' => bcrypt('lss412'),                          
        ]);
        User::create([
            'student_id' => 'u1361218',
            'firstname' => 'Alimzhan',
            'lastname' => 'Amangeldiev',
            'email' => 'a_alimzhan@gmail.com',
            'password' => bcrypt('lss412'),                          
        ]);
        User::create([
            'student_id' => 'u1427219',
            'firstname' => 'Artur',
            'lastname' => 'Semeyutin',
            'email' => 'semeyutin@gmail.com',
            'password' => bcrypt('lss412'),                         
        ]);
        User::create([
            'student_id' => 'u1251317',
            'firstname' => 'Alisher',
            'lastname' => 'Amangeldiev',
            'email' => 'alisher@gmail.com',
            'password' => bcrypt('lss412'),                        
        ]); 
    }
}
class ProductsSeeder extends Seeder {
    public function run() {
        DB::table('products')->delete();
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Business 1',
            'school' => 'Business Studies',
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'price' => '£30',
            'image' => 'url(/images/business1.jpg)',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Engineering 1',
            'school' => 'Engineering',
            'excerpt' => 'If there is a successor to Make: Electronics, then I believe it would have to...',
            'description' => 'If there is a successor to Make: Electronics, then I believe it would have to be Practical Electronics for Inventors perfect for an electrical engineering student or maybe a high school student with a strong aptitude for electronics....I’ve been anxiously awaiting this update, and it was well worth the wait."',
            'price' => '£22',
            'image' => 'url(/images/engineering1.jpg)',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 1',
            'school' => 'Computing Science',
            'excerpt' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and...',
            'description' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and 2015 Past Paper from the Scottish Qualifications Authority, and three specially-commissioned Hodder Gibson Model Papers',
            'price' => '£8',
            'image' => 'url(/images/computing1.jpg)',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 2',
            'school' => 'Computing Science',
            'excerpt' => 'AQA A-level Computer Science gives students the chance to think creatively and progress...',
            'description' => 'AQA A-level Computer Science gives students the chance to think creatively and progress through the AQA AS and A-level Computer Science specifications. Detailed coverage of the specifications will enrich understanding of the fundamental principles of computing, whilst a range of activities help to develop the programming skills and computational thinking skills at A-level and beyon',
            'price' => '£25',
            'image' => 'url(/images/computing2.jpg)',             
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Law 1',
            'school' => 'School of Law',
            'excerpt' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking...',
            'description' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking on their studies. It provides a useful guide to those considering a law degree or conversion course and helps students prepare for what can be a daunting first year of stud',
            'price' => '£14',
            'image' => 'url(/images/law1.jpg)',          
        ]);
    }
}

class EventsSeeder extends Seeder {    
    public function run() {
        DB::table('events')->delete();
        Event::create([
            'title' => 'Event 1',
            'place' => '2',            
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'user_id' => '1',
            'space_remained' => 18,
            'image' => 'url(/images/business1.jpg)',          
        ]);
        Event::create([
            'title' => 'Event 2',
            'place' => '2',            
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'user_id' => '1',
            'space_remained' => 25,
            'image' => 'url(/images/business1.jpg)',          
        ]);
        Event::create([
            'title' => 'Event 3',
            'place' => '2',            
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'user_id' => '2',
            'space_remained' => 30,
            'image' => 'url(/images/business1.jpg)',          
        ]);
        Event::create([
            'title' => 'Event 4',
            'place' => '2',            
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'user_id' => '2',
            'space_remained' => 15,
            'image' => 'url(/images/business1.jpg)',          
        ]);
        Event::create([
            'title' => 'Event 5',
            'place' => '2',            
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'user_id' => '3',
            'space_remained' => 12,
            'image' => 'url(/images/business1.jpg)',          
        ]);
    }    
}
