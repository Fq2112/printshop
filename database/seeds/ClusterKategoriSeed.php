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
            ['Kartu Nama Standar','Standard Business Card'],
            ['Kartu Nama Premium','Premium Business Card'],
            ['Kartu Nama Eks Eksklusif','Exclusive Business Card']
        ];

        $clust[] = [
            ['Kop Surat Standar','Standard Letterhead'],
            ['Kop Surat Premium','Premium Letterhead']
        ];

        $clust[] = [
            ['Amplop DL','Envelope DL'],
            ['Amplop F4','Envelope F4']
        ];

        $clust[] = [
            ['Lanyard Standard','Standard Lanyard'],
            ['Lanyard Premium','Premium Lanyard']
        ];

        $clust[] = [
            ['Map Folder Standard','Map Folder Standard'],
            ['Map Folder Premium','Map Folder Premium']
        ];

        $clust[] = [
            //Nota NCR
        ];

        $clust[] = [
            //Cetak Doc
        ];

        $clust[] = [
            ['Hot Paper Cup','Hot Paper Cup'],
            ['Cold Paper Cup','Cold Paper Cup'],
            ['Cup Es krim','Ice Cream Cup'],
            ['Bowl Paper Cup','Bowl Paper Cup']
        ];

        $clust[] = [
            ['Shopping Bag Standar','Standard Shopping Bag'],
            ['Shopping Bag Premium','Premium Shopping Bag'],
            ['Shopping Bag Cokelat','Brown Shopping Bag']
        ];

        $clust[] = [
            ['Lakban Custom Solid','Custom Solid Duct Tape'],
            ['Lakban Custom Transparen','Custom Transparent Duct Tape'],
        ];

        $clust[] = [
            ['Gelas Plastik PP','PP Plastic Cups'],
            ['Gelas Plastik PET','PET Plastic Cups'],
        ];

        $clust[] = [
            ['Snack Box Kecil','Small Snack Box'],
            ['Snack Box Besar','Large Snack Bag'],
            ['Snack Box Persegi','Square Snack Box'],
        ];

        $clust[] = [
            ['Label Harga Standard','Standard Price Tag'],
            ['Label Harga Premium','Premium Price Tag']
        ];

        $clust[] = [
            ['Lunch Box Kecil','Small Lunch Box'],
            ['Lunch Box Bento','Bento Lunch Box'],
            ['Lunch Box Standard','Standard Lunch Box'],
        ];
        $clust[] = [
            ['Kardus Box Kecil','Small Cardboard Box'],
            ['Kardus Box Standard','Standard Cardboard Box'],
            ['Kardus Box Pengiriman','Cardboard Shipping Box']
        ];
        $clust[] = [
            ['Food Paper Bag Flat Standard','Standard Food Paper Bag Flat'],
            ['Food Paper Bag Flat Premium','Premium Food Paper Bag Flat'],
            ['Satchel Paper Bag  Standard','Standard Satchel Paper Bag'],
            ['Satchel Paper Bag  Premium','Premium Satchel Paper Bag'],
        ];
        $clust[] = [
            ['Kardus Box Duplex Kecil','Small Duplex Cardboard Boxes'],
            ['Kardus Box Duplex Besar','Large Duplex Cardboard Boxes'],
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
            ['Flyer Standard','Flyer Standard'],
            ['Flyer Premium','Flyer Premium'],
            ['Flyer Eknomis','Flyer Eknomis'],
        ];
        $clust[] = [
            ['Poster Standard','Poster Standard'],
            ['Poster Backlit','Poster Backlit']
        ];
        $clust[] = [
            ['Tent Card Lipatan Segitiga','Tent Card Folds Triangle'],
            ['Tent Card Sisipan Lembar','Tent Card Sheet Inserts'],

        ];
        $clust[] = [
            ['Brosur Standard','Standard Brochure '],
            ['Brosur Premium','Premium Brochure'],
            ['Brosur Eknomis','Economic Brochure'],
        ];
        $clust[] = [
            ['X Banner','X Banner'],
            ['Y Banner','Y Banner'],
            ['Big Roll up Banner','Big Roll up Banner'],
            ['Roll up Banner','Roll up Banner'],
            ['Tripod Banner','Tripod Banner'],
            ['Spanduk Indoor','Indoor Banner'],
            ['Spanduk Outdoor','Outdoor Banner'],
        ];
        $clust[] = [
            ['Booklet Standard','Standard Booklet'],
            ['Booklet Premium','Premium Booklet'],
        ];
        $clust[] = [
            ['Stiker Label Bulat','Round Label Sticker'],
            ['Stiker Label Toples','Jar Label Sticker'],
            ['Stiker Decal','Decal Sticker'],
            ['Stiker Label Botol','Bottle Label Sticker'],
            ['Stiker Label Lunch Box','Lunch Box Label Sticker'],
        ];
        $clust[] = [
            ['Sertifikat Standard','Standard Certificate'],
            ['Sertifikat Premium','Premium Sertificate'],
        ];
        $clust[] = [
            ['Majalah Standard','Standard Magazine'],
            ['Majalah Premium','Premium Magazine'],
        ];
        $clust[] = [
            ['Kalender Meja Standar','Standard Desk Calender'],
            ['Kalender Poster','Poster Calender'],
            ['Kalender Dinding','Wall Calender'],
        ];
        $clust[] = [
            ['Voucher Buku','Book Voucher'],
            ['Voucher Satuan','Unit Voucher'],
        ];
        $clust[] = [
            ['Company Profile Standard','Standard Company Profile '],
            ['Company Profile Premium','Premium Company Profile '],
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
            ['kartu Undangan Standard','Standard Invitation Card'],
            ['kartu Undangan  Premium','Premium Invitation card'],
        ];
        $clust[] = [
            ['kartu Terima Kasih Standard','Standard Thank You Card'],
            ['kartu Terima Kasih  Premium','Premium Thank You Card '],
        ];
        $clust[] = [
            ['ID Card Standard','Standard ID Card'],
            ['kartu RFID','RFID Card'],
        ];
        $clust[] = [
            ['kartu Ucapan Standard','Standard Greeting card'],
            ['kartu Ucapan  Premium','Premium Greeting Card'],
        ];
        $clust[] = [
            ['kartu Stamp Flat','Flat Stamp Card'],
            ['kartu Stamp Folding','Folding Stamp Card'],
        ];
        $clust[] = [
            ['Postcard Standard','Standard Postcard '],
            ['Postcard  Premium','Premium Postcard  '],
        ];
        $clust[] = [
            //Kartu E
        ];
        $clust[] = [
            ['Tote Bag Standard','Standard Tote Bas'],
            ['Tote Bag  Premium','Premium Tote bag'],
        ];
        $clust[] = [
            ['Tas Goodie Standard','Standard Goodie bag'],
            ['Tas Goodie  Premium','Premium Goodie bag'],
        ];
        $clust[] = [
            ['Kaos Polo Bordir','Standard Polo Shirt'],
            ['Kaos Polo PolyFlex','PolyFlex Polo Shirt'],
        ];
        $clust[] = [
            //tshirt
        ];

        for ($i = 0; $i < count($clust); $i++) {
            if(!empty($clust[$i])){
                foreach ($clust[$i] as $data) {
                    ClusterKategori ::create([
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
