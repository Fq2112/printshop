<?php

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Spatie\Translatable\HasTranslations;

class KategoriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const NAME = [
        [
            'Kartu', 'Cards',
            'Produk cetak berkualitas tinggi yang berupa kartu, seperti kartu nama untuk membuktikan profesionalitas Anda, kartu undangan, kartu ucapan, dan masih banyak lainnya.',
            'High-quality print product in the form of cards, such as business cards to prove your professionalism,
             invitation cards, greeting cards and many more..'
        ],
        [
            'Peralatan Kantor', 'Office Stationeries',
            'Tingkatkan branding bisnis Anda dengan peralatan kantor yang berkualitas tinggi dan memukau.',
            'Enhance your business branding with a high-quality and stunning office stationeries.'
        ],
        [
            'Kemasan' , 'Packaging',
            'Buat pelanggan semakin tertarik pada produk Anda dengan kemasan berkualitas tinggi dan memukau.',
            'Make customers more interested in your products with a high-quality and stunning packaging.'
        ],
        [
            'Kebutuhan Marketing', 'Marketing Needs',
            'Penuhi kebutuhan promosi bisnis Anda dengan berbagai varian produk cetak berkualitas tinggi yang memukau.',
            'Meet your business promotion needs with a variety of stunning high-quality print product variants.'
        ],
//        [
//            'Kartu', 'Cards',
//            'Produk cetak berkualitas tinggi yang berupa kartu, juga digunakan untuk memenuhi kebutuhan promosi bisnis Anda.',
//            'High-quality print product in the form of cards, are also used to fulfill your business promotion needs.'
//        ],
        [
            'Garmen', 'Garments',
            'Cetak garmen Anda yang berkualitas tinggi dan memukau sesuai keinginan, tersedia dalam berbagai varian warna.',
            'Print your stunning high-quality garments as you desired, available in various colors variants.'
        ],
        //['Foto & Hadiah', 'Photos & Gifts'],
    ];

    public function run()
    {
        foreach (self::NAME as $item) {
            $faker = \Faker\Factory::create('id_ID');
            $kat = Kategori::create([
                'name' => [
                    'id' => $item[0],
                    'en' => $item[1],
                ],
                'caption' =>[
                    'id' => $item[2],
                    'en' => $item[3],
                ],
                'image' => preg_replace("![^a-z0-9]+!i", "-", strtolower($item[1])).'.jpg',
            ]);
        }
    }
}
