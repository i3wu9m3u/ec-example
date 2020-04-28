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
                'description' => 'かわいい犬の写真集です。',
                'price'     => 1100,
                'image_extension'   => 'png',
            ],
            [
                'name'      => 'Cat 22',
                'description' => 'かわいい猫の写真集です。',
                'price'     => 2200,
                'image_extension'   => 'png',
            ],
            [
                'name'      => "'SpecialDummy'",
                'description' => "'special'なダミー説明文です。'special'なダミー説明文です。'special'なダミー説明文です。",
                'price'     => 3300,
                'image_extension'   => 'png',
            ],
        ];

        foreach (range(1, 20) as $i) {
            $products[] = [
                'name'      => "Dummy $i",
                'description' => "ダミー説明文その{$i}です。",
                'price'     => 110 * $i,
                'image_extension'   => 'png',
            ];
        }

        foreach ($products as $i => $p) {
            $m = \App\Product::create($p);
        }
    }
}
