<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = [

            [
                'name' => 'Motori','name_en' => 'Automotive', 'name_es' => 'Motor'

            ],

            [
                'name' => 'Informatica','name_en' => 'Informatics', 'name_es' => 'Informatica'

            ],

            [
                'name' => 'Elettrodomestici','name_en' => 'Home appliances', 'name_es' => 'Electrodomésticos'

            ],

            [
                'name' => 'Libri','name_en' => 'Books', 'name_es' => 'Libros'

            ],

            [
                'name' => 'Giochi','name_en' => 'Games', 'name_es' => 'Juegos'

            ],

            [
                'name' => 'Sport','name_en' => 'Sport', 'name_es' => 'Deporte'

            ],

            [
                'name' => 'Immobili','name_en' => 'Properties', 'name_es' => 'Propiedades'

            ],

            [
                'name' => 'Telefonia','name_en' => 'Telephony', 'name_es' => 'Telefonía'

            ],

            [
                'name' => 'Arredamento','name_en' => 'Furnitures', 'name_es' => 'Muebles'

            ],


        ];

        foreach($categories as $category){
            Category::create([
                'name'=>$category['name'],
                'name_en'=>$category['name_en'],
                'name_es'=>$category['name_es'],


            ]);
        }
    }

    
}
