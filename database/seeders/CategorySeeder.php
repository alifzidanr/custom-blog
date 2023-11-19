<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    public function run()
{
    $categories = [
        'Senam',
        'Sepak Bola',
        'Bulu Tangkis',
        'Renang',
        'Atletik',
        'Bisbol',
        'Tenis Meja',
        'Basket',
        'Gulat',
        'Angkat Berat',
        'Panahan',
        // Add more categories as needed
    ];

    foreach ($categories as $category) {
        DB::table('categories')->insert([
            'name' => $category,
        ]);
    }
}
}