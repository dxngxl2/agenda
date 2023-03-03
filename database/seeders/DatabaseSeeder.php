<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // CREAR ROLES

        $adminRole = Role::factory()->create([
            'name' => 'Admin',
        ]);

        $normalRole = Role::factory()->create([
            'name' => 'Normal',
        ]);



        // CREAR USERS

        User::factory()->create([
            'name' => 'Adminito',
            'email' => 'adminito@agenda.com',
            'password' => '$2y$10$pl72Nl1GHtyCsHhIT2gHG.X/Rx9YpGxsQw.tMBlES4VBMNCgrYvLO', // Es "contraseña" cifrado.
            'role_id' => $adminRole,
        ]);

        User::factory()->create([
            'name' => 'Normalete',
            'email' => 'normalete@agenda.com',
            'password' => '$2y$10$pl72Nl1GHtyCsHhIT2gHG.X/Rx9YpGxsQw.tMBlES4VBMNCgrYvLO', // Es "contraseña" cifrado.
            'role_id' => $normalRole,
        ]);



        //  CREAR CATEGORÍAS

        $amigosTag = Tag::factory()->create([
           'name' => 'Amigos'
        ]);

        $trabajoTag = Tag::factory()->create([
            'name' => 'Trabajo'
        ]);

        $estudiosTag = Tag::factory()->create([
            'name' => 'Estudios'
        ]);

        $familiaresTag = Tag::factory()->create([
            'name' => 'Familiares'
        ]);

        $otrosTag = Tag::factory()->create([
            'name' => 'Otros'
        ]);



        // CREAR PERSONAS

        Contact::factory(12)->create();

        $contacts = Contact::all();



        // ASOCIAR PERSONAS A (NINGUNA, UNA O VARIAS) CATEGORÍAS.

        $contacts[0]->tags()->attach($amigosTag, ['intensity' => 90]);
        $contacts[0]->tags()->attach($estudiosTag, ['intensity' => 30]);
        $contacts[1]->tags()->attach($amigosTag, ['intensity' => 90]);
        $contacts[3]->tags()->attach($otrosTag, ['intensity' => 90]);
        $contacts[5]->tags()->attach($amigosTag, ['intensity' => 20]);
        $contacts[5]->tags()->attach($familiaresTag, ['intensity' => 90]);
        $contacts[5]->tags()->attach($estudiosTag, ['intensity' => 30]);
        $contacts[8]->tags()->attach($familiaresTag, ['intensity' => 100]);
   }
}
