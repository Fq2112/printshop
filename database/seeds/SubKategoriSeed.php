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
        $sub [] = [
            ['Kartu Nama', 'Name Cards']
        ];

        $sub[] = [
            ['Kop Surat','Letterhead'],
            ['Amplop','Envelope'],
            ['Lanyard','Lanyard'],
            ['Map Folder','Map Folder'],
            ['Nota  NCR','Note NCR'],
            ['Cetak Dokumen','Print Dokumen']
        ];

        $sub[] = [
            ['Paper Cup','Paper Cup'],
            ['Shopping Paper Bag','Shopping Paper Bag'],
            ['Lakban Custom','Lakban Custom'],
            ['Gelas Plastik','Plastic Cups'],
            ['Snack Box','Snack Box'],
            ['Label Harga','Price Tag'],
            ['Launch Box','Launch Box'],
            ['Kardus Box','Cardboard Box'],
            ['Paper Bag Makanan','Food Paper Bag'],
            ['kardus Box Duplex','Duplex Cardboard Box'],
            ['Food Wrapping Paper','Food Wrapping Paper'],
            ['Placemat','Placemat'],
            ['Sealer','Sealer']
        ];

        $sub[] = [
            ['Flyer','Flyer'],
            ['Poster','Poster'],
            ['Tent Card','Tent Card'],
            ['Brosur','Brochure'],
            ['Banners','Banners'],
            ['Booklet','Booklet'],
            ['Stiker','Sticker'],
            ['Sertifikat','Certificate'],
            ['Majalah','Magazine'],
            ['Company Profile','Profil perusahaan'],
            ['Kalender Voucher','Voucher Calender'],
            ['Wobblers','Wobblers'],
            ['Backdrop Portable','Backdrop Portable'],
            ['Meja Promosi','Promotion Table'],
            ['Pop up Counters','Pop Up Counters']
        ];

        $sub[] = [
            ['Kartu Undangan','Invitation cards'],
            ['Kartu Terima Kasih',''],
            ['ID Card','ID Card'],
            ['Kartu Ucapan','Greeting Card'],
            ['Kartu Stamp','Stamp Card'],
            ['PostCard','PostCard'],
            ['Kartu Elektronik','Electronic Card']
        ];

        $sub[] = [
            ['Tote Bag','Tote Bag'],
            ['Tas Goodie','Goodie Bag'],
            ['Kaos Polo','Polo Shirt'],
            ['T-Shirt','T-Shirt']
        ];

        for ($i = 0; $i < count($sub); $i++) {
            foreach ($sub[$i] as $city) {
                SubKategori::create([
                    'kategoris_id' => $i + 1,
                    'name' => [
                        'en' => $city[1],
                        'id' => $city[0]
                    ],
                ]);
            }
        }
    }
}
