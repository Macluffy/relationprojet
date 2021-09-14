<?php

namespace Database\Seeders;

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
        $this->call([
            ContinentSeeder::class,
        ]);
        $this->call([
            RoleSeeder::class,
        ]);
        \App\Models\Equipe::factory(5)->create();
        \App\Models\Joueur::factory(50)->create();
        \App\Models\Photo::factory(50)->create();
    }
}
