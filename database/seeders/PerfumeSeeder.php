<?php

namespace Database\Seeders;

use App\Models\Admin\Perfume;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //  // لانشاء fake row طريقة1
        // DB::table('perfumes')->insert([
        //     'name' => 'Bashar',
        //     'picture' => 'imagesOfPerfume/1744996612.jpg',
        //     'description' => 'A smoky and woody scent' ,
        //     'gender' => 'male',
        //     'size' => 150 ,
        //     'price' => 310.5 ,
        //     'created_at' =>'2025-04-20 18:03:21' ,
        //     'updated_at' => '2025-05-20 19:03:21' ,
        //     'deleted_at' => '2025-06-25 16:58:21' ,
        // ]);


        //  // لانشاء fake row طريقة2
        // Perfume::create([
        //     'name' => 'nower',
        //     'picture' => 'imagesOfPerfume/1744996612.jpg',
        //     'description' => 'A smoky and woody scent' ,
        //     'gender' => 'male',
        //     'size' => 150 ,
        //     'price' => 310.5 ,
        //     'created_at' => now() ,
        //     'updated_at' => now() ,
        //     'deleted_at' => '2025-06-25 16:58:21' ,
        // ]);

        // Perfume::create([
        //     'name' => 'rahaf',
        //     'picture' => 'imagesOfPerfume/1744996612.jpg',
        //     'description' => 'A smoky and woody scent' ,
        //     'gender' => 'female',
        //     'size' => 150 ,
        //     'price' => 310.5 ,
        //     'created_at' => now() ,
        //     'updated_at' => now() ,
        //     'deleted_at' => '2025-06-25 16:58:21' ,
        // ]);


        // $this->call([
        //     PerfumeSeeder::class,
        //     DatabaseSeeder::class
        // ]);
    }
}
