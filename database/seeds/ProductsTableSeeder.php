<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name'      => 'Dog 11',
                'description' => 'かわいい犬の画像集です。',
                'price'     => 1100,
                'image_extension'   => 'png',
            ],
            [
                'name'      => 'Cat 22',
                'description' => 'かわいい猫の画像集です。',
                'price'     => 2200,
                'image_extension'   => 'png',
            ],
            [
                'name'      => "'SpecialDummy'",
                'description' => 'specialダミー',
                'price'     => 330,
                'image_extension'   => 'jpg',
            ],
        ];

        foreach (range(1, 10) as $i) {
            $products[] = [
                'name'      => "Dummy $i",
                'description' => "ダミー$i",
                'price'     => 110,
                'image_extension'   => 'jpg',
            ];
        }

        foreach ($products as $p) {
            \App\Product::create($p);
        }
    }
}
