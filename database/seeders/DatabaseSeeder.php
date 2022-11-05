<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UnitSeeder::class);
        $this->call(SchoolYearSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(ArticleSeeder::class);
        // $this->call(GalerySeeder::class);
        // $this->call(VideoSeeder::class);
        $this->call(IndoRegionSeeder::class);

        $content = [
            [
                'title'         => 'Persyaratan Pendaftaran',
                'cover_image'   => '/dumy/tes.jpg',
                'content'       => 'tes',
                'created_by'    => 'tes',
                'updated_by'    => 'tes',
            ],
            [
                'title'         => 'Unit Pendidikan',
                'cover_image'   => '/dumy/tes.jpg',
                'content'       => 'tes',
                'created_by'    => 'tes',
                'updated_by'    => 'tes',
            ],
            [
                'title'         => 'Alur Pendaftaran',
                'cover_image'   => '/dumy/tes.jpg',
                'content'       => 'tes',
                'created_by'    => 'tes',
                'updated_by'    => 'tes',
            ],
            [
                'title'         => 'Materi Seleksi',
                'cover_image'   => '/dumy/tes.jpg',
                'content'       => 'tes',
                'created_by'    => 'tes',
                'updated_by'    => 'tes',
            ],
        ];

        foreach ($content as $key => $value) {
            Article::create([
                'title'         => $value['title'],
                'cover_image'   => '/dumy/tes.jpg',
                'content'       => 'tes',
                'created_by'    => 'tes',
                'updated_by'    => 'tes',
            ]);
        }
        // $this->call(ArticleCategorySeeder::class);
        // $this->call(BiodataSeeder::class);
        // $this->call(DocSeeder::class);
        // $this->call(FatherSeeder::class);
        // $this->call(FeedbackSeeder::class);
        // $this->call(MotherSeeder::class);
        // $this->call(SettingSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(PaymentSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
