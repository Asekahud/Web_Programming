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
            'name' => 'Business Studies',
            'school' => 'Business School',
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'link' => 'http://www.amazon.co.uk/Business-Studies-editie-Dave-Hall/dp/1405892315/ref=sr_1_3?s=books&ie=UTF8&qid=1460310426&sr=1-3&keywords=business+studies',
            'price' => '£30',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Engineering: A Very Short Introduction',
            'school' => 'Engineering School',
            'excerpt' => 'If there is a successor to Make: Electronics, then I believe it would have to...',
            'description' => 'If there is a successor to Make: Electronics, then I believe it would have to be Practical Electronics for Inventors perfect for an electrical engineering student or maybe a high school student with a strong aptitude for electronics....I’ve been anxiously awaiting this update, and it was well worth the wait."',
            'link' => 'http://www.amazon.co.uk/Business-Studies-editie-Dave-Hall/dp/1405892315/ref=sr_1_3?s=books&ie=UTF8&qid=1460310426&sr=1-3&keywords=business+studies',
            'price' => '£22',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Higher Computing Science 2015/16',
            'school' => 'Computing Science',
            'excerpt' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and...',
            'description' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and 2015 Past Paper from the Scottish Qualifications Authority, and three specially-commissioned Hodder Gibson Model Papers',
            'link'=>'http://www.amazon.co.uk/Higher-Computing-Science-Specimen-Hodder/dp/1471860728/ref=sr_1_1?s=books&ie=UTF8&qid=1460310161&sr=1-1&keywords=computing+science',
            'price' => '£8',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'My Revision Notes AQA A-Level Computer Science',
            'school' => 'Computing Science',
            'excerpt' => 'AQA A-level Computer Science gives students the chance to think creatively and progress...',
            'link' => 'http://www.amazon.co.uk/Revision-Notes--Level-Computer-Science/dp/1471865827/ref=sr_1_6?s=books&ie=UTF8&qid=1460310161&sr=1-6&keywords=computing+science',
            'description' => 'AQA A-level Computer Science gives students the chance to think creatively and progress through the AQA AS and A-level Computer Science specifications. Detailed coverage of the specifications will enrich understanding of the fundamental principles of computing, whilst a range of activities help to develop the programming skills and computational thinking skills at A-level and beyon',
            'price' => '£25',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Law in Context',
            'school' => 'Law School',
            'excerpt' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking...',
            'description' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking on their studies. It provides a useful guide to those considering a law degree or conversion course and helps students prepare for what can be a daunting first year of stud',
            'link'=>'http://www.amazon.co.uk/Law-Context-Stephen-Bottomley/dp/1862878420/ref=sr_1_1?s=books&ie=UTF8&qid=1460311077&sr=1-1&keywords=law+in+context',
            'price' => '£14',                     
        ]);        
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'How to Pass National 5 Computing Science',
            'school' => 'Computing Science',
            'excerpt' => 'This book contains all the advice and support you need to revise successfully for your National 5 ex.',
            'description' => 'This book contains all the advice and support you need to revise successfully for your National 5 exam. It combines an overview of the course syllabus with advice from a top expert on how to improve exam performance, so you have the best chance of success.',
            'link'=>'http://www.amazon.co.uk/Pass-National-Computing-Science-HTP5/dp/144418203X/ref=sr_1_2?s=books&ie=UTF8&qid=1460310161&sr=1-2&keywords=computing+science',
            'price' => '£35',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'National 4 & 5 Computing Science',
            'school' => 'Computing Science',
            'excerpt' => 'This comprehensive textbook provides full coverage of the Computing Science courses.',
            'description' => 'This comprehensive textbook provides full coverage of the Computing Science courses offered by the Scottish Qualifications Authority at both National 4 and 5 levels. The book is divided into two core units of the syllabus, Software Design and Development and Information Systems Design and Development.',
            'link'=>'http://www.amazon.co.uk/National-Computing-Science-Hodder-Specimen/dp/1471860531/ref=sr_1_5?s=books&ie=UTF8&qid=1460310161&sr=1-5&keywords=computing+science',
            'price' => '£29',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'GCSE Computing Theory: for the OCR Exam Board',
            'school' => 'Computing Science',
            'excerpt' => 'This covers the theory part of the GCSE Computing course and follows the OCR specification....',
            'description' => 'This covers the theory part of the GCSE Computing course and follows the OCR specification. The book has the following sections: 1. Fundamentals of computer systems 2. Computer Hardware 3. Software',
            'link'=>'http://www.amazon.co.uk/GCSE-Computing-Theory-Exam-Board-ebook/dp/B00JU5HBN0/ref=sr_1_7?s=books&ie=UTF8&qid=1460310161&sr=1-7&keywords=computing+science',
            'price' => '£12',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'How to Pass Higher Computing Science for CfE',
            'school' => 'Computing Science',
            'excerpt' => 'Get your best grade with the SQA endorsed guide to Higher Computing Science for CfE...',
            'description' => 'Get your best grade with the SQA endorsed guide to Higher Computing Science for CfE. This book contains all the advice and support you need to revise successfully for your Higher (for CfE) exam. It combines an overview',
            'link'=>'http://www.amazon.co.uk/How-Pass-Higher-Computing-Science/dp/1471836037/ref=sr_1_9?s=books&ie=UTF8&qid=1460310161&sr=1-9&keywords=computing+science',
            'price' => '£15',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Moffats Trusts Law: Text and Materials',
            'school' => 'Law School',
            'excerpt' => 'This latest edition of Moffats Trusts Law has been fully revised and updated to cover recent statutory...',
            'description' => 'This latest edition of Moffats Trusts Law has been fully revised and updated to cover recent statutory developments and explores the impact of a wealth of new cases including the Supreme Court decisions in Pitt v. Holt (2013)',
            'link'=>'http://www.amazon.co.uk/Moffats-Trusts-Law-Materials-Context/dp/1107512832/ref=sr_1_3?s=books&ie=UTF8&qid=1460311077&sr=1-3&keywords=law+in+context',
            'price' => '£24',                     
        ]);       
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Business Studies For Dummies',
            'school' => 'Business School',
            'excerpt' => 'Whether you′re deciding on a course of study, headed to university, or...',
            'description' => 'Whether you′re deciding on a course of study, headed to university, or settling down to your first year, Business Studies For Dummies provides you with a thorough overview of the subjects that form the.',
            'link'=>'http://www.amazon.co.uk/Business-Studies-Dummies-Richard-Pettinger/dp/1118348117/ref=sr_1_1?s=books&ie=UTF8&qid=1460310426&sr=1-1&keywords=business+studies',
            'price' => '£34',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Mechanical Engineering Principles',
            'school' => 'Engineering School',
            'excerpt' => 'This book introduces mechanical principles and technology through examples and...',
            'description' => 'This book introduces mechanical principles and technology through examples and applications, enabling students to develop a sound understanding of both engineering principles and their use in practice."',
            'link'=>'http://www.amazon.co.uk/Mechanical-Engineering-Principles-John-Bird/dp/1138781576/ref=sr_1_4?s=books&ie=UTF8&qid=1460310545&sr=1-4&keywords=engineering',
            'price' => '£32',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'OCR Computing for GCSE Students Book',
            'school' => 'Computing Science',
            'excerpt' => 'OCR Computing for GCSE adopts an approach that provides comprehensive coverage of...',
            'description' => 'OCR Computing for GCSE adopts an approach that provides comprehensive coverage of the specification, providing a cohesive and fully contextualised guide through the key content',
            'link'=>'http://www.amazon.co.uk/OCR-Computing-GCSE-Students-Book/dp/1444177796/ref=sr_1_11?s=books&ie=UTF8&qid=1460310161&sr=1-11&keywords=computing+science',
            'price' => '£18',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'BrightRED Study Guide: CfE Higher Computing Science',
            'school' => 'Computing Science',
            'excerpt' => 'Completely new titles from our bestselling author to meet all the tweaks and changes...',
            'description' => 'Completely new titles from our bestselling author to meet all the tweaks and changes in the new CfE Higher course. Fully supported by our FREE BrightRED Digital Zone at www.brightredbooks.net. ',
            'link'=>'http://www.amazon.co.uk/BrightRED-Study-Guide-Computing-Science/dp/190673660X/ref=sr_1_12?s=books&ie=UTF8&qid=1460310161&sr=1-12&keywords=computing+science',
            'price' => '£42',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'An Introduction to Law',
            'school' => 'Law School',
            'excerpt' => 'Extensively updated throughout, this new edition introduces students to a wide range of modern...',
            'description' => 'Extensively updated throughout, this new edition introduces students to a wide range of modern legal issues. Written in a clear and engaging style, the book expertly addresses the ways in which the rules and structures of law respond to and influence',
            'link'=>'http://www.amazon.co.uk/Introduction-Law-Context/dp/052113207X/ref=sr_1_4?s=books&ie=UTF8&qid=1460311077&sr=1-4&keywords=law+in+context',
            'price' => '£44',                     
        ]);      
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'AQA GCSE Business Studies: Textbook1',
            'school' => 'Business School',
            'excerpt' => 'TThis title has been written for the latest AQA GCSE Business Studies...',
            'description' => 'This title has been written for the latest AQA GCSE Business Studies specification. It covers Unit 1: Setting up a Business and Unit 2: Growing as a Business and provides detailed advice on how to .',
            'link'=>'http://www.amazon.co.uk/AQA-GCSE-Business-Studies-Textbook/dp/1844894142/ref=sr_1_10?s=books&ie=UTF8&qid=1460310426&sr=1-10&keywords=business+studies',
            'price' => '£17',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'A Dictionary of Mechanical Engineering',
            'school' => 'Engineering School',
            'excerpt' => 'lA Dictionary of Mechanical Engineering is one of the latest additions to the...',
            'description' => 'lA Dictionary of Mechanical Engineering is one of the latest additions to the market leading Oxford Paperback Reference series. In over 8,500 clear and concise A to Z entries, it provides definitions',
            'link'=>'http://www.amazon.co.uk/Dictionary-Mechanical-Engineering-Oxford-Reference/dp/0199587434/ref=sr_1_5?s=books&ie=UTF8&qid=1460310545&sr=1-5&keywords=engineering',
            'price' => '£12',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'National 5 Computing Science Success Guide',
            'school' => 'Computing Science',
            'excerpt' => 'National 5 Computing Success Guide provides easy-to-use and value-for-money revision..',
            'description' => 'National 5 Computing Success Guide provides easy-to-use and value-for-money revision for all abilities and learning styles. Guidance on how the new National 5 course and assessments',
            'link'=>'http://www.amazon.co.uk/National-Computing-Science-Success-Guide/dp/0007504845/ref=sr_1_15?s=books&ie=UTF8&qid=1460310161&sr=1-15&keywords=computing+science',
            'price' => '£48',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'New GCSE Computer Science OCR Revision Guide',
            'school' => 'Computing Science',
            'excerpt' => 'This fantastic CGP Revision Guide covers everything students will need for the Grade...',
            'description' => 'This fantastic CGP Revision Guide covers everything students will need for the Grade 9-1 OCR GCSE Computer Science exams, from Software Systems to Pseudocode! Each topic is clearly explained',
            'link'=>'http://www.amazon.co.uk/GCSE-Computer-Science-Revision-Guide/dp/1782946020/ref=sr_1_18?s=books&ie=UTF8&qid=1460314041&sr=1-18&keywords=computing+science',
            'price' => '£39',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Trusts Law: Text and Materials',
            'school' => 'Law School',
            'excerpt' => 'Always the serious students choice of a Trusts Law textbook, this new edition once again provides...',
            'description' => 'Always the serious students choice of a Trusts Law textbook, this new edition once again provides a clear examination of the rules in the detail required by the advanced undergraduate. ',
            'link'=>'http://www.amazon.co.uk/Trusts-Law-Text-Materials-Context/dp/0521743826/ref=sr_1_5?s=books&ie=UTF8&qid=1460311077&sr=1-5&keywords=law+in+context',
            'price' => '£34',                     
        ]);      
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'The Business Book (Big Ideas)',
            'school' => 'Business School',
            'excerpt' => 'Learning about business can be daunting, but The Business Book makes...',
            'description' => 'Learning about business can be daunting, but The Business Book makes it easier than ever by giving you all the big ideas simply explained',
            'link'=>'http://www.amazon.co.uk/The-Business-Book-Big-Ideas/dp/1409341267/ref=sr_1_11?s=books&ie=UTF8&qid=1460310426&sr=1-11&keywords=business+studies',
            'price' => '£20',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Engineering Mathematics',
            'school' => 'Engineering School',
            'excerpt' => 'Engineering Mathematics is the best-selling introductory mathematics text for...',
            'description' => 'Engineering Mathematics is the best-selling introductory mathematics text for students on science and engineering degree and pre-degree courses. Sales of previous editions',
            'link'=>'http://www.amazon.co.uk/Engineering-Mathematics-K-Stroud/dp/1137031204/ref=sr_1_9?s=books&ie=UTF8&qid=1460310545&sr=1-9&keywords=engineering',
            'price' => '£37',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Site Reliability Engineering: How Google Runs Production Systems',
            'school' => 'Computing Science',
            'excerpt' => 'Building and operating distributed systems is fundamental to large-scale production...',
            'description' => 'Building and operating distributed systems is fundamental to large-scale production infrastructure, but doing so in a scalable, reliable, and efficient way requires a lot of trial and error.',
            'link'=>'http://www.amazon.co.uk/Site-Reliability-Engineering-Production-Systems/dp/149192912X/ref=sr_1_20?s=books&ie=UTF8&qid=1460315830&sr=1-20&keywords=computing+science',
            'price' => '£35',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Empires of EVE: A History of the Great Wars of EVE Online',
            'school' => 'Computing Science',
            'excerpt' => 'Since 2003, this sci-fi virtual world has been ruled by player-led governments commanding...',
            'description' => 'Since 2003, this sci-fi virtual world has been ruled by player-led governments commanding tens of thousands of real people. The conflict and struggle for power between these diverse governments has ',
            'link'=>'http://www.amazon.co.uk/Empires-EVE-History-Great-Online-ebook/dp/B01DONPR0M/ref=sr_1_23?s=books&ie=UTF8&qid=1460315830&sr=1-23&keywords=computing+science',
            'price' => '£39',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Sexual Offences: Law and Context',
            'school' => 'Law School',
            'excerpt' => 'Sexual Offences: Law and Context presents the substantive law governing sexual offending in England...',
            'description' => 'Sexual Offences: Law and Context presents the substantive law governing sexual offending in England and Wales in its socio-legal and historical context. It outlines the complexities',
            'link'=>'http://www.amazon.co.uk/Sexual-Offences-Context-Samantha-Pegg/dp/1138806072/ref=sr_1_7?s=books&ie=UTF8&qid=1460311077&sr=1-7&keywords=law+in+context',
            'price' => '£54',                     
        ]);        
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'AQA Business for A Level 1 (Surridge & Gillespie)',
            'school' => 'Business School',
            'excerpt' => 'Surridge and Gillespie are back, helping students of all abilities reach...',
            'description' => 'Surridge and Gillespie are back, helping students of all abilities reach their goal; develop students quantitative and analytical skills, knowledge and ability to apply theoretical .',
            'link'=>'http://www.amazon.co.uk/AQA-Business-Level-Surridge-Gillespie/dp/1471836134/ref=sr_1_16?s=books&ie=UTF8&qid=1460315112&sr=1-16&keywords=business+studies',
            'price' => '£40',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Higher Engineering Mathematics',
            'school' => 'Engineering School',
            'excerpt' => 'A practical introduction to the core mathematics principles required at higher...',
            'description' => 'A practical introduction to the core mathematics principles required at higher engineering level John Bird’s approach to mathematics, based on numerous worked examples and interactive problems, ',
            'link'=> 'http://www.amazon.co.uk/Higher-Engineering-Mathematics-John-Bird/dp/0415662826/ref=sr_1_13?s=books&ie=UTF8&qid=1460310545&sr=1-13&keywords=engineering',
            'price' => '£42',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'C#: Learn The Basics of C# Quickly - Beginners Guide',
            'school' => 'Computing Science',
            'excerpt' => 'Interested In Learning C# Programming, I got Your Covered!...',
            'description' => 'C++ is a middle-level programming language developed by Bjarne Stroustrup starting in 1979 at Bell Labs. C++ runs on a variety of platforms,',
            'link'=> 'http://www.amazon.co.uk/Learn-Basics-Quickly-Beginners-Coding-ebook/dp/B01D9BHINI/ref=sr_1_26?s=books&ie=UTF8&qid=1460315830&sr=1-26&keywords=computing+science',
            'price' => '£28',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Sets, Logic and Maths for Computing',
            'school' => 'Computing Science',
            'excerpt' => 'This easy-to-follow textbook introduces the mathematical language, knowledge and problem-solving...',
            'description' => 'This easy-to-follow textbook introduces the mathematical language, knowledge and problem-solving skills that undergraduates need to study computing. The language is in part qualitative,',
            'link'=> 'http://www.amazon.co.uk/Computing-Undergraduate-Topics-Computer-Science/dp/1447124995/ref=sr_1_28?s=books&ie=UTF8&qid=1460315830&sr=1-28&keywords=computing+science',
            'price' => '£41',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Company Law in Context: Text and materials',
            'school' => 'Law School',
            'excerpt' => 'Company Law in Context is an ideal main text for company law and corporate governance courses at...',
            'description' => 'Company Law in Context is an ideal main text for company law and corporate governance courses at both undergraduate and postgraduate level. In this sophisticated book,',
            'link'=> 'http://www.amazon.co.uk/Company-Law-Context-Text-materials/dp/0199609322/ref=sr_1_8?s=books&ie=UTF8&qid=1460311077&sr=1-8&keywords=law+in+context',
            'price' => '£47',                     
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Business 1',
            'school' => 'Business Studies',
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'link'=> '',
            'price' => '£30',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Engineering 1',
            'school' => 'Engineering',
            'excerpt' => 'If there is a successor to Make: Electronics, then I believe it would have to...',
            'description' => 'If there is a successor to Make: Electronics, then I believe it would have to be Practical Electronics for Inventors perfect for an electrical engineering student or maybe a high school student with a strong aptitude for electronics....I’ve been anxiously awaiting this update, and it was well worth the wait."',
            'link'=> '',
            'price' => '£22',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 1',
            'school' => 'Computing Science',
            'excerpt' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and...',
            'description' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and 2015 Past Paper from the Scottish Qualifications Authority, and three specially-commissioned Hodder Gibson Model Papers',
            'link'=> '',
            'price' => '£8',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 2',
            'school' => 'Computing Science',
            'excerpt' => 'AQA A-level Computer Science gives students the chance to think creatively and progress...',
            'description' => 'AQA A-level Computer Science gives students the chance to think creatively and progress through the AQA AS and A-level Computer Science specifications. Detailed coverage of the specifications will enrich understanding of the fundamental principles of computing, whilst a range of activities help to develop the programming skills and computational thinking skills at A-level and beyon',
            'link'=> '',
            'price' => '£25',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Law 1',
            'school' => 'School of Law',
            'excerpt' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking...',
            'description' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking on their studies. It provides a useful guide to those considering a law degree or conversion course and helps students prepare for what can be a daunting first year of stud',
            'link'=> '',
            'price' => '£14',                     
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Business 1',
            'school' => 'Business Studies',
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'link'=> '',
            'price' => '£30',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Engineering 1',
            'school' => 'Engineering',
            'excerpt' => 'If there is a successor to Make: Electronics, then I believe it would have to...',
            'description' => 'If there is a successor to Make: Electronics, then I believe it would have to be Practical Electronics for Inventors perfect for an electrical engineering student or maybe a high school student with a strong aptitude for electronics....I’ve been anxiously awaiting this update, and it was well worth the wait."',
            'link'=> '',
            'price' => '£22',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 1',
            'school' => 'Computing Science',
            'excerpt' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and...',
            'description' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and 2015 Past Paper from the Scottish Qualifications Authority, and three specially-commissioned Hodder Gibson Model Papers',
            'link'=> '',
            'price' => '£8',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 2',
            'school' => 'Computing Science',
            'excerpt' => 'AQA A-level Computer Science gives students the chance to think creatively and progress...',
            'description' => 'AQA A-level Computer Science gives students the chance to think creatively and progress through the AQA AS and A-level Computer Science specifications. Detailed coverage of the specifications will enrich understanding of the fundamental principles of computing, whilst a range of activities help to develop the programming skills and computational thinking skills at A-level and beyon',
            'link'=> '',
            'price' => '£25',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Law 1',
            'school' => 'School of Law',
            'excerpt' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking...',
            'description' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking on their studies. It provides a useful guide to those considering a law degree or conversion course and helps students prepare for what can be a daunting first year of stud',
            'link'=> '',
            'price' => '£14',                     
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Business 1',
            'school' => 'Business Studies',
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'link'=> '',
            'price' => '£30',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Engineering 1',
            'school' => 'Engineering',
            'excerpt' => 'If there is a successor to Make: Electronics, then I believe it would have to...',
            'description' => 'If there is a successor to Make: Electronics, then I believe it would have to be Practical Electronics for Inventors perfect for an electrical engineering student or maybe a high school student with a strong aptitude for electronics....I’ve been anxiously awaiting this update, and it was well worth the wait."',
            'link'=> '',
            'price' => '£22',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 1',
            'school' => 'Computing Science',
            'excerpt' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and...',
            'description' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and 2015 Past Paper from the Scottish Qualifications Authority, and three specially-commissioned Hodder Gibson Model Papers',
            'link'=> '',
            'price' => '£8',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 2',
            'school' => 'Computing Science',
            'excerpt' => 'AQA A-level Computer Science gives students the chance to think creatively and progress...',
            'description' => 'AQA A-level Computer Science gives students the chance to think creatively and progress through the AQA AS and A-level Computer Science specifications. Detailed coverage of the specifications will enrich understanding of the fundamental principles of computing, whilst a range of activities help to develop the programming skills and computational thinking skills at A-level and beyon',
            'link'=> '',
            'price' => '£25',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Law 1',
            'school' => 'School of Law',
            'excerpt' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking...',
            'description' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking on their studies. It provides a useful guide to those considering a law degree or conversion course and helps students prepare for what can be a daunting first year of stud',
            'link'=> '',
            'price' => '£14',                     
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Business 1',
            'school' => 'Business Studies',
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'link'=> '',
            'price' => '£30',          
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '2',
            'name' => 'Engineering 1',
            'school' => 'Engineering',
            'excerpt' => 'If there is a successor to Make: Electronics, then I believe it would have to...',
            'description' => 'If there is a successor to Make: Electronics, then I believe it would have to be Practical Electronics for Inventors perfect for an electrical engineering student or maybe a high school student with a strong aptitude for electronics....I’ve been anxiously awaiting this update, and it was well worth the wait."',
            'link'=> '',
            'price' => '£22',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 1',
            'school' => 'Computing Science',
            'excerpt' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and...',
            'description' => 'Accept no imitations! Practise for your exams on the genuine Higher Specimen Paper and 2015 Past Paper from the Scottish Qualifications Authority, and three specially-commissioned Hodder Gibson Model Papers',
            'link'=> '',
            'price' => '£8',           
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '3',
            'name' => 'Computing 2',
            'school' => 'Computing Science',
            'excerpt' => 'AQA A-level Computer Science gives students the chance to think creatively and progress...',
            'description' => 'AQA A-level Computer Science gives students the chance to think creatively and progress through the AQA AS and A-level Computer Science specifications. Detailed coverage of the specifications will enrich understanding of the fundamental principles of computing, whilst a range of activities help to develop the programming skills and computational thinking skills at A-level and beyon',
            'link'=> '',
            'price' => '£25',            
        ]);
        Product::create([
            'category_id' => '1',
            'user_id' => '4',
            'name' => 'Law 1',
            'school' => 'School of Law',
            'excerpt' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking...',
            'description' => 'Letters to a Law Student relays all that a prospective law student needs to know before embarking on their studies. It provides a useful guide to those considering a law degree or conversion course and helps students prepare for what can be a daunting first year of stud',
            'link'=> '',
            'price' => '£14',                     
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
        ]);
        Event::create([
            'title' => 'Event 2',
            'place' => '2',            
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'user_id' => '1',
            'space_remained' => 25,                     
        ]);
        Event::create([
            'title' => 'Event 3',
            'place' => '2',            
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'user_id' => '2',
            'space_remained' => 30,                    
        ]);
        Event::create([
            'title' => 'Event 4',
            'place' => '2',            
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'user_id' => '2',
            'space_remained' => 15,                     
        ]);
        Event::create([
            'title' => 'Event 5',
            'place' => '2',            
            'excerpt' => 'This bestselling textbook has been extensively revised, reorganised...',
            'description' => 'This bestselling textbook has been extensively revised, reorganised and updated for the AS and A Level Business Studies specifications from September 2008. The 4th edition of this market-leading text from the respected and trusted team of authors - Dave Hall, Carlo Raffo and Rob Jones.',
            'user_id' => '3',
            'space_remained' => 12,                     
        ]);
    }    
}
