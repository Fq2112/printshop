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
            ['Kartu Nama Standar', 'Standard Business Cards'],
            ['Kartu Nama Premium', 'Premium Business Cards'],
            ['Kartu Nama Eksklusif', 'Exclusive Business Cards']
        ];

        $clust[] = [
            ['Kartu Undangan Standar', 'Standard Invitation Cards'],
            ['Kartu Undangan Premium', 'Premium Invitation Cards'],
        ];
        $clust[] = [
            ['Kartu Terima Kasih Standar', 'Standard Gratitude Cards'],
            ['Kartu Terima Kasih Premium', 'Premium Gratitude Cards'],
        ];
        $clust[] = [
            ['Kartu Identitas Standar', 'Standard ID Cards'],
            ['Kartu RFID', 'RFID Cards'],
        ];
        $clust[] = [
            ['Kartu Ucapan Standar', 'Standard Greeting Cards'],
            ['Kartu Ucapan Premium', 'Premium Greeting Cards'],
        ];
        $clust[] = [
            ['Kartu Stamp Flat', 'Flat Stamp Cards'],
            ['Kartu Stamp Folding', 'Folding Stamp Cards'],
        ];
        $clust[] = [
            ['Kartu Pos Standar', 'Standard Postcards'],
            ['Kartu Pos Premium', 'Premium Postcards'],
        ];
        $clust[] = [
            //Kartu E
        ];

        $clust[] = [
            ['Kop Surat Standar', 'Standard Letterheads'],
            ['Kop Surat Premium', 'Premium Letterheads']
        ];

        $clust[] = [
            ['Amplop DL', 'DL Envelopes'],
            ['Amplop F4', 'F4 Envelopes']
        ];

        $clust[] = [
            ['Lanyard Standar', 'Standard Lanyards'],
            ['Lanyard Premium', 'Premium Lanyards']
        ];

        $clust[] = [
            ['Map Folder Standar', 'Standard Map Folders'],
            ['Map Folder Premium', 'Premium Map Folders']
        ];

        $clust[] = [
            //Nota NCR
        ];

        $clust[] = [
            //Cetak Doc
        ];

        $clust[] = [
            ['Hot Paper Cup', 'Hot Paper Cups'],
            ['Cold Paper Cup', 'Cold Paper Cups'],
            ['Cup Es Krim', 'Ice Cream Cups'],
            ['Bowl Paper Cup', 'Bowl Paper Cups']
        ];

        $clust[] = [
            ['Shopping Bag Standar', 'Standard Shopping Bags'],
            ['Shopping Bag Premium', 'Premium Shopping Bags'],
            ['Shopping Bag Cokelat', 'Brown Shopping Bags']
        ];

        $clust[] = [
            ['Lakban Custom Solid', 'Solid Custom Duct Tapes'],
            ['Lakban Custom Transparan', 'Transparent Custom Duct Tapes'],
        ];

        $clust[] = [
            ['Gelas Plastik PP', 'PP Plastic Cups'],
            ['Gelas Plastik PET', 'PET Plastic Cups'],
        ];

        $clust[] = [
            ['Snack Box Kecil', 'Small Snack Boxes'],
            ['Snack Box Besar', 'Large Snack Boxes'],
            ['Snack Box Persegi', 'Square Snack Boxes'],
        ];

        $clust[] = [
            ['Label Harga Standar', 'Standard Price Tags'],
            ['Label Harga Premium', 'Premium Price Tags']
        ];

        $clust[] = [
            ['Lunch Box Food Pail', 'Food Pail Lunch Boxes'],
            ['Lunch Box Bento', 'Bento Lunch Boxes'],
            ['Lunch Box Standard', 'Standard Lunch Boxes'],
        ];
        $clust[] = [
            ['Kardus Box Kecil', 'Small Cardboard Boxes'],
            ['Kardus Box Standar', 'Standard Cardboard Boxes'],
            ['Kardus Box Pengiriman', 'Shipping Cardboard Boxes']
        ];
        $clust[] = [
            ['Food Paper Bag Flat Standar', 'Standard Flat Food Paper Bags'],
            ['Food Paper Bag Flat Premium', 'Premium Flat Food Paper Bags'],
            ['Satchel Paper Bag  Standar', 'Standard Satchel Paper Bags'],
            ['Satchel Paper Bag  Premium', 'Premium Satchel Paper Bags'],
        ];
        $clust[] = [
            ['Kardus Box Duplex Kecil', 'Small Duplex Cardboard Boxes'],
            ['Kardus Box Duplex Besar', 'Large Duplex Cardboard Boxes'],
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
            ['Flyer Standar', 'Standard Flyers'],
            ['Flyer Premium', 'Premium Flyers'],
            ['Flyer Eknomis', 'Economic Flyers'],
        ];
        $clust[] = [
            ['Poster Standar', 'Standard Posters'],
            ['Poster Backlit', 'Backlit Posters']
        ];
        $clust[] = [
            ['Tent Card Lipatan Segitiga', 'Triangle Fold Tent Cards'],
            ['Tent Card Sisipan Lembar', 'Sheet Insertion Tent Cards'],

        ];
        $clust[] = [
            ['Brosur Standard', 'Standard Brochures'],
            ['Brosur Premium', 'Premium Brochures'],
            ['Brosur Eknomis', 'Economic Brochures'],
        ];
        $clust[] = [
            ['X Banner', 'X Banners'],
            ['Y Banner', 'Y Banners'],
            ['Big Roll Up Banner', 'Big Roll Up Banners'],
            ['Roll Up Banner', 'Roll Up Banners'],
            ['Tripod Banner', 'Tripod Banners'],
            ['Spanduk Indoor', 'Indoor Banners'],
            ['Spanduk Outdoor', 'Outdoor Banners'],
        ];
        $clust[] = [
            ['Booklet Standar', 'Standard Booklets'],
            ['Booklet Premium', 'Premium Booklets'],
        ];
        $clust[] = [
            ['Stiker Label Bulat', 'Round Label Stickers'],
            ['Stiker Label Toples', 'Jar Label Stickers'],
            ['Stiker Decal', 'Decal Stickers'],
            ['Stiker Label Botol', 'Bottle Label Stickers'],
            ['Stiker Label Lunch Box', 'Lunch Box Label Stickers'],
        ];
        $clust[] = [
            ['Sertifikat Standar', 'Standard Certificates'],
            ['Sertifikat Premium', 'Premium Certificates'],
        ];
        $clust[] = [
            ['Majalah Standar', 'Standard Magazines'],
            ['Majalah Premium', 'Premium Magazines'],
        ];
        $clust[] = [
            ['Kalender Meja Standar', 'Standard Desk Calendars'],
            ['Kalender Poster', 'Poster Calendars'],
            ['Kalender Dinding', 'Wall Calendars'],
        ];
        $clust[] = [
            ['Voucher Buku', 'Book Vouchers'],
            ['Voucher Satuan', 'Unit Vouchers'],
        ];
        $clust[] = [
            ['Company Profile Standar', 'Standard Company Profiles'],
            ['Company Profile Premium', 'Premium Company Profiles'],
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
//        $clust[] = [
//            ['Kartu Undangan Standar', 'Standard Invitation Cards'],
//            ['Kartu Undangan Premium', 'Premium Invitation Cards'],
//        ];
//        $clust[] = [
//            ['Kartu Terima Kasih Standar', 'Standard Gratitude Cards'],
//            ['Kartu Terima Kasih Premium', 'Premium Gratitude Cards'],
//        ];
//        $clust[] = [
//            ['Kartu Identitas Standar', 'Standard ID Cards'],
//            ['Kartu RFID', 'RFID Cards'],
//        ];
//        $clust[] = [
//            ['Kartu Ucapan Standar', 'Standard Greeting Cards'],
//            ['Kartu Ucapan Premium', 'Premium Greeting Cards'],
//        ];
//        $clust[] = [
//            ['Kartu Stamp Flat', 'Flat Stamp Cards'],
//            ['Kartu Stamp Folding', 'Folding Stamp Cards'],
//        ];
//        $clust[] = [
//            ['Kartu Pos Standar', 'Standard Postcards'],
//            ['Kartu Pos Premium', 'Premium Postcards'],
//        ];
//        $clust[] = [
//            //Kartu E
//        ];
        $clust[] = [
            ['Tote Bag Standar', 'Standard Tote Bags'],
            ['Tote Bag Premium', 'Premium Tote Bags'],
        ];
        $clust[] = [
            ['Tas Goodie Standar', 'Standard Goodie Bags'],
            ['Tas Goodie Premium', 'Premium Goodie Bags'],
        ];
        $clust[] = [
            ['Kaos Polo Bordir', 'Embroidery Polo Shirts'],
            ['Kaos Polo PolyFlex', 'PolyFlex Polo Shirts'],
        ];
        $clust[] = [
            //tshirt
        ];

        for ($i = 0; $i < count($clust); $i++) {
            if (!empty($clust[$i])) {
                foreach ($clust[$i] as $data) {
                    ClusterKategori::create([
                        'subkategori_id' => $i + 1,
                        'name' => [
                            'en' => $data[1],
                            'id' => $data[0]
                        ],
                    ]);
                }
            }
        }

    }
}
