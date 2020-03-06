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
            'Kartu Nama'
        ];

        $sub[] = [
            'Kop Surat',
            'Amplop',
            'Lanyard',
            'Map Folder',
            'Nota  NCR',
            'Cetak Dokumen'
        ];

        $sub[] = [
            'Paper Cup',
            'Shopping Paper Bag',
            'Lakban Custom',
            'Gelas Plastik',
            'Snack Box',
            'Label Harga',
            'Launch Box',
            'Kardus Box',
            'Paper Bag Makanan',
            'kardus Box Duplex',
            'Food Wrapping Paper',
            'Placemat',
            'Sealer'
        ];

        $sub[] = [
            'Flyer',
            'Poster',
            'Tent Card',
            'Brosur',
            'Banners',
            'Booklet',
            'Stiker',
            'Sertifikat',
            'Majalah',
            'Company Profile',
            'Kalender Voucher',
            'Wobblers',
            'Backdrop Portable',
            'Meja Promosi',
            'Pop up Counters'
        ];

        $sub[] = [
            'Kartu Undangan',
            'Kartu Terima Kasih',
            'ID Card',
            'Kartu Ucapan',
            'Kartu Stamp',
            'PostCard',
            'Kartu Elektronik'
        ];

        $sub[] = [
            'Tote Bag',
            'Tas Goodie',
            'Kaos Polo',
            'T-Shirt'
        ];

        for ($i = 0; $i < count($sub); $i++) {
            foreach ($sub[$i] as $city) {
               SubKategori::create([
                    'kategoris_id' => $i + 1,
                    'name' => $city
                ]);
            }
        }
    }
}
