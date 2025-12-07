<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $opportunities = [
            [
                'category_id' => 1,
                'title' => 'Beasiswa Prestasi Nusantara 2025',
                'organization' => 'Yayasan Cendekia Nusantara',
                'description' => 'Program beasiswa bagi siswa dan mahasiswa berprestasi.',
                'requirements' => '- IPK minimal 3.3\n- Surat rekomendasi dosen\n- Essay motivasi',
                'benefits' => '- Bantuan biaya pendidikan\n- Pelatihan leadership\n- Mentoring profesional',
                'location' => 'Indonesia',
                'education_level' => 'S1',
                'field' => 'Pendidikan',
                'difficulty' => 'medium',
                'start_date' => '2025-01-01',
                'end_date' => '2025-02-28',
                'registration_link' => 'https://contoh.com/beasiswa-nusantara',
                'poster_url' => 'https://example.com/poster1.jpg',
            ],
            [
                'category_id' => 2,
                'title' => 'Lomba Inovasi Teknologi 2025',
                'organization' => 'Tech Innovators Indonesia',
                'description' => 'Kompetisi teknologi terbesar untuk mahasiswa seluruh Indonesia.',
                'requirements' => '- Proposal inovasi\n- Tim maksimal 3 orang',
                'benefits' => '- Uang pembinaan\n- Inkubasi startup\n- Networking industri',
                'location' => 'Jakarta',
                'education_level' => 'S1',
                'field' => 'Teknologi Informasi',
                'difficulty' => 'hard',
                'start_date' => '2025-03-01',
                'end_date' => '2025-04-15',
                'registration_link' => 'https://contoh.com/lomba-teknologi',
                'poster_url' => 'https://example.com/poster2.jpg',
            ],
            [
                'category_id' => 3,
                'title' => 'Program Magang UI/UX Designer',
                'organization' => 'Creative Studio Labs',
                'description' => 'Kesempatan magang untuk mahasiswa di bidang UI/UX design.',
                'requirements' => '- Portofolio minimum 5 karya\n- Kemampuan Figma dasar',
                'benefits' => '- Sertifikat magang\n- Pengalaman kerja nyata',
                'location' => 'Bandung',
                'education_level' => 'D3',
                'field' => 'Desain Digital',
                'difficulty' => 'easy',
                'start_date' => '2025-01-10',
                'end_date' => '2025-03-10',
                'registration_link' => 'https://contoh.com/magang-uiux',
                'poster_url' => 'https://example.com/poster3.jpg',
            ],
        ];

        foreach ($opportunities as $item) {
            DB::table('opportunities')->insert([
                'category_id' => $item['category_id'],
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'organization' => $item['organization'],
                'description' => $item['description'],
                'requirements' => $item['requirements'],
                'benefits' => $item['benefits'],
                'location' => $item['location'],
                'education_level' => $item['education_level'],
                'field' => $item['field'],
                'difficulty' => $item['difficulty'],
                'start_date' => $item['start_date'],
                'end_date' => $item['end_date'],
                'registration_link' => $item['registration_link'],
                'poster_url' => $item['poster_url'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
