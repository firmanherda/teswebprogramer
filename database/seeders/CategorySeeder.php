<?php

    namespace Database\Seeders;

    use App\Models\Category;
    use Carbon\Carbon;
    use Illuminate\Database\Seeder;

    class CategorySeeder extends Seeder
    {
        public function run()
        {
            $categories = [
                [
                    'id' => 1,
                    'name' => 'Alat Olahraga',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id' => 2,
                    'name' => 'Alat Musik',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ];

            Category::insert($categories);
        }
    }
