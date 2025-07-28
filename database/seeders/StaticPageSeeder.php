<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StaticPage;
use Illuminate\Support\Facades\DB;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('static_pages')->insert([
            [
                'slug' => 'tentang',
                'title' => 'Tentang STIFIn',
                'content' => '<p>Ini adalah halaman Tentang STIFIn.</p>',
            ],
            [
                'slug' => 'sensing',
                'title' => 'Sensing',
                'content' => '<p>Penjelasan tentang tipe Sensing dalam STIFIn.</p>',
            ],
            [
                'slug' => 'thinking',
                'title' => 'Thinking',
                'content' => '<p>Penjelasan tentang tipe Thinking dalam STIFIn.</p>',
            ],
            [
                'slug' => 'intuiting',
                'title' => 'Intuiting',
                'content' => '<p>Penjelasan tentang tipe Intuiting dalam STIFIn.</p>',
            ],
            [
                'slug' => 'feeling',
                'title' => 'Feeling',
                'content' => '<p>Penjelasan tentang tipe Feeling dalam STIFIn.</p>',
            ],
            [
                'slug' => 'insting',
                'title' => 'Insting',
                'content' => '<p>Penjelasan tentang tipe Insting dalam STIFIn.</p>',
            ],
        ]);
    }
}
