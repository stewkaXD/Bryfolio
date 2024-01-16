<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entry;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name'=>'Bryan Amadeus',
        //     'email'=>'bryan.amadeus45@gmail.com',
        //     'password'=>bcrypt('12345')
        // ]);

        // User::create([
        //     'name'=>'Furina de Fontaine',
        //     'email'=>'furina.fontaine@gmail.com',
        //     'password'=>bcrypt('54321')
        // ]);

        User::factory(3)->create();

        User::create([
            'name' => "Bryan Amadeus",
            'username' => 'stewka',
            'email' => "bryan.amadeus45@gmail.com",
            'password' => bcrypt('fuckingadmin')
        ]);

        Category::create([
            'name'=>"Web Programming",
            'slug'=>"web-programming"
        ]);

        Category::create([
            'name'=>"Web Design",
            'slug'=>"web-design"
        ]);

        Category::create([
            'name'=>"Personal Stuff",
            'slug'=>"personal-stuff"
        ]);

        Entry::factory(30)->create();

        // Entry::create([
        //     'title'=>'First Title',
        //     'slug'=>'first-title',
        //     'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, rerum.',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam sit quibusdam nulla aut aliquam, exercitationem ad distinctio pariatur quis reprehenderit laborum in dolorem at consequuntur iusto consequatur voluptatibus labore sed nobis. Distinctio modi ut nihil voluptate odit maxime eligendi doloremque odio impedit veritatis exercitationem ratione quidem quam reiciendis iusto molestias quaerat laborum neque quos, tempora recusandae maiores at enim! Debitis exercitationem quidem commodi natus repellendus distinctio amet tenetur, maiores blanditiis ut ipsum quasi suscipit ipsam, quaerat voluptates sit eos!',
        //     'category_id'=>1,
        //     'user_id'=>1
        // ]);

        // Entry::create([
        //     'title'=>'Second Title',
        //     'slug'=>'second-title',
        //     'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, rerum.',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam sit quibusdam nulla aut aliquam, exercitationem ad distinctio pariatur quis reprehenderit laborum in dolorem at consequuntur iusto consequatur voluptatibus labore sed nobis. Distinctio modi ut nihil voluptate odit maxime eligendi doloremque odio impedit veritatis exercitationem ratione quidem quam reiciendis iusto molestias quaerat laborum neque quos, tempora recusandae maiores at enim! Debitis exercitationem quidem commodi natus repellendus distinctio amet tenetur, maiores blanditiis ut ipsum quasi suscipit ipsam, quaerat voluptates sit eos!',
        //     'category_id'=>1,
        //     'user_id'=>1
        // ]);

        // Entry::create([
        //     'title'=>'Third Title',
        //     'slug'=>'third-title',
        //     'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, rerum.',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam sit quibusdam nulla aut aliquam, exercitationem ad distinctio pariatur quis reprehenderit laborum in dolorem at consequuntur iusto consequatur voluptatibus labore sed nobis. Distinctio modi ut nihil voluptate odit maxime eligendi doloremque odio impedit veritatis exercitationem ratione quidem quam reiciendis iusto molestias quaerat laborum neque quos, tempora recusandae maiores at enim! Debitis exercitationem quidem commodi natus repellendus distinctio amet tenetur, maiores blanditiis ut ipsum quasi suscipit ipsam, quaerat voluptates sit eos!',
        //     'category_id'=>2,
        //     'user_id'=>2
        // ]);

        // Entry::create([
        //     'title'=>'Fourth Title',
        //     'slug'=>'fourth-title',
        //     'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, rerum.',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam sit quibusdam nulla aut aliquam, exercitationem ad distinctio pariatur quis reprehenderit laborum in dolorem at consequuntur iusto consequatur voluptatibus labore sed nobis. Distinctio modi ut nihil voluptate odit maxime eligendi doloremque odio impedit veritatis exercitationem ratione quidem quam reiciendis iusto molestias quaerat laborum neque quos, tempora recusandae maiores at enim! Debitis exercitationem quidem commodi natus repellendus distinctio amet tenetur, maiores blanditiis ut ipsum quasi suscipit ipsam, quaerat voluptates sit eos!',
        //     'category_id'=>2,
        //     'user_id'=>2
        // ]);
    }
}
