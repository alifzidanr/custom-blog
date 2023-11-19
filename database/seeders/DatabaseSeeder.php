<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call([
            CategorySeeder::class, // Add this line to call the CategorySeeder
        ]);

        $kecamatan = [
            'Bojongsari',
            'Cilodong',
            'Cimanggis',
            'Cinere',
            'Jatijajar',
            'Limo',
            'Pancoran Mas',
            'Sawangan',
            'Sukmajaya',
            'Tapos',
            'Beji',
            // Add more kecamatan as needed
        ];
        foreach ($kecamatan as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                // Add other columns if necessary
            ]);
        }
    }
}
