<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

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
        $this->call(ArticleCategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(BiodataSeeder::class);
        $this->call(DocSeeder::class);
        $this->call(FatherSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(GalerySeeder::class);
        $this->call(MotherSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VideoSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
