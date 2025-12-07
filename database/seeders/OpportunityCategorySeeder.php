<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OpportunityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Beasiswa',
                'description' => 'Kategori untuk berbagai peluang beasiswa nasional maupun internasional.',
            ],
            [
                'name' => 'Lomba',
                'description' => 'Kategori untuk kompetisi akademik, kreatif, teknologi, dan lainnya.',
            ],
            [
                'name' => 'Magang',
                'description' => 'Kategori untuk peluang internship di perusahaan atau organisasi.',
            ],
            [
                'name' => 'Volunteer',
                'description' => 'Kategori untuk kegiatan sukarela dalam berbagai bidang.',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('opportunity_categories')->insert([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
