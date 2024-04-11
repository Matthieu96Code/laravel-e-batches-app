<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            
            // user1->firstProject 
            [
                'name' => 'Création de site web',
                'batches' => 5,
                'description' => 'Ce project est destiné à la création d\'un site web',
                'user_id' => 2,
            ],

            // user1->secondProject 
            [
                'name' => 'Création d\'affiche',
                'batches' => 3,
                'description' => 'Ce project est destiné à la création d\'une affiche',
                'user_id' => 2,
            ],

            // user2->secondProject 
            [
                'name' => 'Création de logo',
                'batches' => 4,
                'description' => 'Ce project est destiné à la création d\'un logo',
                'user_id' => 3,
            ],

            // user2->secondProject 
            [
                'name' => 'Publication sur les réseaux',
                'batches' => 1,
                'description' => 'Ce project est destiné à la publication sur les reseaux',
                'user_id' => 3,
            ],
        ]);
    }
}
