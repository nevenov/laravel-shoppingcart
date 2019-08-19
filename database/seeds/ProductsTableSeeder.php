<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->productsData()['products'] as $product)
        {
            DB::table('products')->insert([
                    'name' => $product['name'],
                    'subname' => $product['subname'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'url72' => $product['url72'],
                    'url256' => $product['url256']
            ]);
        }
    }


    public function productsData()
    {
        return $database = [

            'products' => [

                1 => [
                    'id'=>1,
                    'name'=>'Watch',
                    'subname'=>'by Rolex',
                    'description'=>'Very good exclusive Rolex wrist watch.',
                    'price'=>1450.55,
                    'url72'=>'http://icons.iconarchive.com/icons/r34n1m4ted/chanel/72/WATCH-icon.png',
                    'url256'=>'http://icons.iconarchive.com/icons/r34n1m4ted/chanel/256/WATCH-icon.png'
                ],

                2 => [
                    'id'=>2,
                    'name'=>'Smartphone',
                    'subname'=>'by Apple',
                    'description'=>'Nice smartphone from Apple.',
                    'price'=>250.45,
                    'url72'=>'http://icons.iconarchive.com/icons/jonathan-rey/devices-pack-3/72/Smartphone-Android-Jelly-Bean-Samsung-Galaxy-S4-icon.png',
                    'url256'=>'http://icons.iconarchive.com/icons/jonathan-rey/devices-pack-3/256/Smartphone-Android-Jelly-Bean-Samsung-Galaxy-S4-icon.png'
                ],

                3 => [
                    'id'=>3,
                    'name'=>'TV',
                    'subname'=>'by Panasonic',
                    'description'=>'The best TV ever made by Panasonic.',
                    'price'=>600,
                    'url72'=>'http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/72/Devices-video-television-icon.png',
                    'url256'=>'http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/256/Devices-video-television-icon.png'
                ]

            ]


        ];
    }
}
