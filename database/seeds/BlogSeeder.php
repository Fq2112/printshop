<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        \App\Models\BlogCategory::create([
            'name' => [
                'id' => 'Kategori A',
                'en' => 'Category A',
            ],
        ]);
        \App\Models\BlogCategory::create([
            'name' => [
                'id' => 'Kategori B',
                'en' => 'Category B',
            ],
        ]);
        \App\Models\BlogCategory::create([
            'name' => [
                'id' => 'Kategori C',
                'en' => 'Category C',
            ],
        ]);

        $x = 1;
        for ($i = 0; $i < 9; $i++) {
            $title = $faker->words(rand(2, 3), true);
            $permalink = preg_replace("![^a-z0-9]+!i", "-", strtolower($title));

            \App\Models\Blog::create([
                'admin_id' => rand(\App\Models\Admin::where('role', \App\Support\Role::ADMIN)->min('id'), \App\Models\Admin::where('role', \App\Support\Role::ADMIN)->max('id')),
                'category_id' => rand(\App\Models\BlogCategory::min('id'), \App\Models\BlogCategory::max('id')),
                'title' => [
                    'id' => strtoupper($title),
                    'en' => strtoupper($title),
                ],
                'permalink' => [
                    'id' => $permalink,
                    'en' => $permalink,
                ],
                'content' => [
                    'id' => "<p align='justify'>" . \Faker\Factory::create('id_ID')->paragraphs(rand(3, 5), true) . "</p>",
                    'en' => "<p align='justify'>" . \Faker\Factory::create()->paragraphs(rand(3, 5), true) . "</p>",
                ],
                'thumbnail' => $x++ . '.jpg',
            ]);
        }

        foreach (\App\Models\Blog::all() as $blog) {
            \App\Models\BlogGallery::create([
                'blog_id' => $blog->id,
                'type' => 'photos',
                'files' => '1.jpg'
            ]);
            \App\Models\BlogGallery::create([
                'blog_id' => $blog->id,
                'type' => 'photos',
                'files' => '2.jpg'
            ]);
            \App\Models\BlogGallery::create([
                'blog_id' => $blog->id,
                'type' => 'photos',
                'files' => '3.jpg'
            ]);
            \App\Models\BlogGallery::create([
                'blog_id' => $blog->id,
                'type' => 'photos',
                'files' => '4.jpg'
            ]);
            \App\Models\BlogGallery::create([
                'blog_id' => $blog->id,
                'type' => 'photos',
                'files' => '5.jpg'
            ]);
            \App\Models\BlogGallery::create([
                'blog_id' => $blog->id,
                'type' => 'photos',
                'files' => '6.jpg'
            ]);
        }
    }
}
