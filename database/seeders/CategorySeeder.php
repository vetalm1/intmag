<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'name' => 'main',
            'parent_id' => null,
        ]);

        DB::table('categories')->insert([
            'name' => 'FirstCategory',
            'parent_id' => 0,
        ]);

        DB::table('categories')->insert([
            'name' => 'SecondCategory',
            'parent_id' => 0,
        ]);


        Category::factory()
            ->count(6)
            ->create();
    }
}
