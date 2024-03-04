<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Tag;
use Illuminate\Database\Seeder;
//Para crear ka carpeta Posts
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('posts');
        // Crear el directorio 'posts' si no existe
        $publicPostsDirectory = public_path('storage/posts');
        if (!file_exists($publicPostsDirectory)) {
            mkdir($publicPostsDirectory, 0755, true);
        }

        // Llamar a otras semillas
        $this->call(UserSeeder::class);
        Categoria::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}
