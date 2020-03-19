<?php

use Illuminate\Database\Seeder;
use App\Models\SubKategori;

class SubKategoriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub[] = [
            ['Kartu Nama', 'Business Cards'],
            ['Kartu Undangan', 'Invitation Cards'],
            ['Kartu Terima Kasih', 'Gratitude Cards'],
            ['Kartu Identitas', 'ID Cards'],
            ['Kartu Ucapan', 'Greeting Cards'],
            ['Kartu Stamp', 'Stamp Cards'],
            ['Kartu Pos', 'Postcards'],
            ['Kartu Elektronik', 'Electronic Cards']
        ];

        $sub[] = [
            ['Kop Surat', 'Letterheads'],
            ['Amplop', 'Envelopes'],
            ['Lanyard', 'Lanyards'],
            ['Map Folder', 'Map Folders'],
            ['Nota NCR', 'NCR Notes'],
            ['Cetak Dokumen', 'Document Printing']
        ];

        $sub[] = [
            ['Paper Cup', 'Paper Cups'],
            ['Shopping Paper Bag', 'Shopping Paper Bags'],
            ['Lakban Custom', 'Custom Duct Tapes'],
            ['Gelas Plastik', 'Plastic Cups'],
            ['Snack Box', 'Snack Boxes'],
            ['Label Harga', 'Price Tags'],
            ['Lunch Box', 'Lunch Boxes'],
            ['Kardus Box', 'Cardboard Boxes'],
            ['Paper Bag Makanan', 'Food Paper Bags'],
            ['Kardus Box Duplex', 'Duplex Cardboard Boxes'],
            ['Food Wrapping Paper', 'Food Wrapping Papers'],
            ['Placemat', 'Placemats'],
            ['Sealer', 'Sealers']
        ];

        $sub[] = [
            ['Flyer', 'Flyers'],
            ['Poster', 'Posters'],
            ['Tent Card', 'Tent Cards'],
            ['Brosur', 'Brochures'],
            ['Banners', 'Banners'],
            ['Booklet', 'Booklets'],
            ['Stiker', 'Stickers'],
            ['Sertifikat', 'Certificates'],
            ['Majalah', 'Magazines'],
            ['Company Profile', 'Company Profiles'],
            ['Kalender', 'Calendars'],
            ['Voucher', 'Vouchers'],
            ['Wobblers', 'Wobblers'],
            ['Backdrop Portable', 'Portable Backdrops'],
            ['Meja Promosi', 'Promotion Tables'],
            ['Pop up Counter', 'Pop Up Counters']
        ];

//        $sub[] = [
//            ['Kartu Undangan', 'Invitation Cards'],
//            ['Kartu Terima Kasih', 'Gratitude Cards'],
//            ['Kartu Identitas', 'ID Cards'],
//            ['Kartu Ucapan', 'Greeting Cards'],
//            ['Kartu Stamp', 'Stamp Cards'],
//            ['Kartu Pos', 'Postcards'],
//            ['Kartu Elektronik', 'Electronic Cards']
//        ];

        $sub[] = [
            ['Tote Bag', 'Tote Bags'],
            ['Tas Goodie', 'Goodie Bags'],
            ['Kaos Polo', 'Polo Shirts'],
            ['T-Shirt', 'T-Shirts']
        ];

        for ($i = 0; $i < count($sub); $i++) {
            foreach ($sub[$i] as $item) {
                SubKategori::create([
                    'kategoris_id' => $i + 1,
                    'name' => [
                        'en' => $item[1],
                        'id' => $item[0]
                    ],
                    'permalink' => [
                        'en' => preg_replace("![^a-z0-9]+!i", "-", strtolower($item[1])),
                        'id' => preg_replace("![^a-z0-9]+!i", "-", strtolower($item[0])),
                    ],
                ]);
            }
        }
    }
}
