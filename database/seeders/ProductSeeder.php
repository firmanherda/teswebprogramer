<?php

    namespace Database\Seeders;

    use App\Models\Product;
    use Carbon\Carbon;
    use Illuminate\Database\Seeder;

    class ProductSeeder extends Seeder
    {
        public function run()
        {
            $products = [
                [
                    'name' => 'Jersey Barcelona',
                    'category_id' => 1,
                    'purchase_price' => 1250000,
                    'selling_price' => 1625000,
                    'stock' => 120,
                    'image' => 'jersey-barcelona.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Dumbbell 5 Kg',
                    'category_id' => 1,
                    'purchase_price' => 80000,
                    'selling_price' => 104000,
                    'stock' => 25,
                    'image' => 'dumbbell.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Yoga Mat',
                    'category_id' => 1,
                    'purchase_price' => 120000,
                    'selling_price' => 156000,
                    'stock' => 30,
                    'image' => 'yogamat.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Gitar Akustik',
                    'category_id' => 2,
                    'purchase_price' => 1000000,
                    'selling_price' => 1300000,
                    'stock' => 10,
                    'image' => 'gitar-akustik.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Drum Set',
                    'category_id' => 2,
                    'purchase_price' => 2200000,
                    'selling_price' => 2860000,
                    'stock' => 5,
                    'image' => 'drumset.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Bola Basket',
                    'category_id' => 1,
                    'purchase_price' => 60000,
                    'selling_price' => 78000,
                    'stock' => 40,
                    'image' => 'bolabasket.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Piano Elektrik',
                    'category_id' => 2,
                    'purchase_price' => 3000000,
                    'selling_price' => 3900000,
                    'stock' => 3,
                    'image' => 'pianoelektrik.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'TreadMill',
                    'category_id' => 1,
                    'purchase_price' => 2000000,
                    'selling_price' => 2600000,
                    'stock' => 7,
                    'image' => 'treadmill.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Biola',
                    'category_id' => 2,
                    'purchase_price' => 1400000,
                    'selling_price' => 1820000,
                    'stock' => 8,
                    'image' => 'biola.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Sepatu Lari',
                    'category_id' => 1,
                    'purchase_price' => 200000,
                    'selling_price' => 260000,
                    'stock' => 20,
                    'image' => 'sepatulari.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ];

            Product::insert($products);
        }
    }
