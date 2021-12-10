<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Category::truncate();
        Post::truncate();
        Schema::enableForeignKeyConstraints();

        //Create posts for the single user

//    $user = User::factory()->create([
//      'name' => "Roman Kiashko"
//    ]);

//    Post::factory(5)->create([
//      'user_id' => $user->id
//    ]);

        Post::factory(25)->create();

        //Usage of DB seeder

//    $user = User::factory()->create();
//
//    $personal = Category::create([
//      'name' => "Personal",
//      'slug' => "personal"
//    ]);
//
//    $work = Category::create([
//      'name' => "Work",
//      'slug' => "work"
//    ]);
//
//    $family = Category::create([
//      'name' => "Family",
//      'slug' => "family"
//    ]);
//
//    Post::create([
//      'user_id' => $user->id,
//      'category_id' => $family->id,
//      'title' => "My family post",
//      'slug' => "my-family-post",
//      'excerpt' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
//      'body' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."
//    ]);
//
//    Post::create([
//      'user_id' => $user->id,
//      'category_id' => $personal->id,
//      'title' => "My personal post",
//      'slug' => "my-personal-post",
//      'excerpt' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
//      'body' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."
//    ]);
//
//    Post::create([
//      'user_id' => $user->id,
//      'category_id' => $work->id,
//      'title' => "My work post",
//      'slug' => "my-work-post",
//      'excerpt' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
//      'body' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."
//    ]);
//  }
    }
}
