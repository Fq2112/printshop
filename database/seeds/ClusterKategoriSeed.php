<?php

use Illuminate\Database\Seeder;
use App\Models\ClusterKategori;

class ClusterKategoriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clust[] = [
            'Kartu Nama Standar',
            'Kartu Nama Premium',
            'Kartu Nama Eks Eksklusif'
        ];

        $clust[] = [
            'Kop Surat Standar',
            'Kop Surat Premium'
        ];

        $clust[] = [
            'Amplop DL',
            'Amplop F4'
        ];

        $clust[] = [
            'Lanyard Standard',
            'Lanyard Premium'
        ];

        $clust[] = [
            'Map Folder Standard',
            'Map Folder Premium'
        ];

        $clust[] = [
            //Nota NCR
        ];

        $clust[] = [
            //Cetak Doc
        ];

        $clust[] = [
            'Hot Paper Cup',
            'Cold Paper Cup',
            'Cup Es krim',
            'Bowl Paper Cup'
        ];

        $clust[] = [
            'Shopping Bag Standar',
            'Shopping Bag Premium',
            'Shopping Bag Cokelat'
        ];

        $clust[] = [
            'Lakban Custom Solid',
            'Lakban Custom Transparen',
        ];

        $clust[] = [
            'Gelas Plastik PP',
            'Gelas Plastik PET',
        ];

        $clust[] = [
            'Snack Box Kecil',
            'Snack Box Besar',
            'Snack Box Persegi',
        ];

        $clust[] = [
            'Label Harga Standard',
            'Label Harga Premium'
        ];

        $clust[] = [
            'Lunch Box Kecil',
            'Lunch Box Bento',
            'Lunch Box Standard',
        ];
        $clust[] = [
            'Kardus Box Kecil',
            'Kardus Box Standard',
            'Kardus Box Pengiriman'
        ];
        $clust[] = [
            'Food Paper Bag Flat Standard',
            'Food Paper Bag Flat Premium',
            'Satchel Paper Bag  Standard',
            'Satchel Paper Bag  Premium',
        ];
        $clust[] = [
            'Kardus Box Duplex Kecil',
            'Kardus Box Duplex Besar',
        ];
        $clust[] = [
            //Food Wrapping paper
        ];
        $clust[] = [
            //Placemet
        ];
        $clust[] = [
            //sealer
        ];
        $clust[] = [
            'Flyer Standard',
            'Flyer Premium',
            'Flyer Eknomis',
        ];
        $clust[] = [
            'Poster Standard',
            'Poster Backlit'
        ];
        $clust[] = [
            'Tent Card Lipatan Segitiga',
            'Tent Card Sisipan Lembar',

        ];
        $clust[] = [
            'Brosur Standard',
            'Brosur Premium',
            'Brosur Eknomis',
        ];
        $clust[] = [
            'X Banner',
            'Y Banner',
            'Big Roll up Banner',
            'Roll up Banner',
            'Tripod Banner',
            'Spanduk Indoor',
            'Spanduk Outdoor',
        ];
        $clust[] = [
            'Booklet Standard',
            'Booklet Premium',
        ];
        $clust[] = [
            'Stiker Label Bulat',
            'Stiker Label Toples',
            'Stiker Decal',
            'Stiker Label Botol',
            'Stiker Label Lunch Box',
        ];
        $clust[] = [
            'Sertifikat Standard',
            'Sertifikat Premium',
        ];
        $clust[] = [
            'Majalah Standard',
            'Majalah Premium',
        ];
        $clust[] = [
            'Kalender Meja Standar',
            'Kalender Poster',
            'Kalender Dinding',
        ];
        $clust[] = [
            'Voucher Buku',
            'Voucher Satuan',
        ];
        $clust[] = [
            'Company Profile Standard',
            'Company Profile Premium',
        ];
        $clust[] = [
            //Wobblers
        ];
        $clust[] = [
            //backdrop
        ];
        $clust[] = [
            //Meja Promosi
        ];
        $clust[] = [
            //Popup Counter
        ];
        $clust[] = [
            'kartu Undangan Standard',
            'kartu Undangan  Premium',
        ];
        $clust[] = [
            'kartu Terima Kasih Standard',
            'kartu Terima Kasih  Premium',
        ];
        $clust[] = [
            'ID Card Standard',
            'kartu RFID',
        ];
        $clust[] = [
            'kartu Ucapan Standard',
            'kartu Ucapan  Premium',
        ];
        $clust[] = [
            'kartu Stamp Flat',
            'kartu Stamp Folding',
        ];
        $clust[] = [
            'Postcard Standard',
            'Postcard  Premium',
        ];
        $clust[] = [
            //Kartu E
        ];
        $clust[] = [
            'Tote Bag Standard',
            'Tote Bag  Premium',
        ];
        $clust[] = [
            'Tas Goodie Standard',
            'Tas Goodie  Premium',
        ];
        $clust[] = [
            'Kaos Polo Bordir',
            'Kaos Polo PolyFlex',
        ];
        $clust[] = [
            //tshirt
        ];

        for ($i = 0; $i < count($clust); $i++) {
            if(!empty($clust[$i])){
                foreach ($clust[$i] as $data) {
                    ClusterKategori ::create([
                        'subkategori_id' => $i + 1,
                        'name' => $data
                    ]);
                }
            }
        }

    }
}
