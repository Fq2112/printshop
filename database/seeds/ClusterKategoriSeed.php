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
            [
                'Kartu Nama Standar', 'Standard Business Cards',
                'Kartu nama harga ekonomis dengan bahan berkualitas.',
                'Economic price business cards with a high-quality material.',
            ],
            [
                'Kartu Nama Premium', 'Premium Business Cards',
                'Kartu nama premium dengan bahan yang mewah.',
                'Premium business cards with a fancy material.'
            ],
            [
                'Kartu Nama Eksklusif', 'Exclusive Business Cards',
                'Kartu nama eksklusif dengan bahan yang lebih tebal dan mewah.',
                'Exclusive business cards with a thicker and fancier material.'
            ]
        ];

        $clust[] = [
            [
                'Kartu Undangan Standar', 'Standard Invitation Cards',
                'Kartu undangan harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price invitation cards, available in various variants of art carton.'
            ],
            [
                'Kartu Undangan Premium', 'Premium Invitation Cards',
                'Kartu undangan premium dengan bahan yang lebih mewah.',
                'Premium invitation cards with a fancier materials.'
            ],
        ];

        $clust[] = [
            [
                'Kartu Terima Kasih Standar', 'Standard Gratitude Cards',
                'Kartu terima kasih harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price gratitude cards, available in various variants of art carton.'
            ],
            [
                'Kartu Terima Kasih Premium', 'Premium Gratitude Cards',
                'Kartu terima kasih premium dengan bahan yang lebih mewah.',
                'Premium gratitude cards with a fancier materials.'
            ],
        ];

        $clust[] = [
            [
                'Kartu Identitas Standar', 'Standard ID Cards',
                'Kartu identitas standar berbahan dasar PVC, tersedia dengan pilihan jumlah box.',
                'Standard PVC-based identity cards, available with the box amount choice.'
            ],
            [
                'Kartu RFID', 'RFID Cards',
                'Kartu identitas kustom dengan mikrocip di dalamnya untuk kebutuhan identifikasi.',
                'Custom identity cards with a microchip inside for identification needs.'
            ],
        ];

        $clust[] = [
            [
                'Kartu Ucapan Standar', 'Standard Greeting Cards',
                'Kartu ucapan harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price greeting cards, available in various variants of art carton.'
            ],
            [
                'Kartu Ucapan Premium', 'Premium Greeting Cards',
                'Kartu ucapan premium dengan bahan yang lebih mewah.',
                'Premium greeting cards with a fancier materials.'
            ],
        ];

        $clust[] = [
            [
                'Kartu Stamp Flat', 'Flat Stamp Cards',
                'Kartu stamp flat atau standar, tersedia dengan pilihan jumlah sisi cetak.',
                'Flat or standard stamp cards, available with the sides printed choice.'
            ],
            [
                'Kartu Stamp Lipat', 'Folding Stamp Cards',
                'Kartu stamp lipat untuk periode promosi yang lebih lama, juga tersedia dengan pilihan jumlah sisi cetak.',
                'Folding stamp cards for a longer promotion period, are also available with the sides printed choice.'
            ],
        ];

        $clust[] = [
            [
                'Kartu Pos Standar', 'Standard Postcards',
                'Kartu pos harga ekonomis dengan bahan berkualitas.',
                'Economic price postcards with a high-quality material.'
            ],
            [
                'Kartu Pos Premium', 'Premium Postcards',
                'Kartu pos premium dengan bahan yang lebih mewah.',
                'Premium postcards with a fancier materials.'
            ],
        ];

        $clust[] = [
            //Kartu E
        ];

        $clust[] = [
            [
                'Kop Surat Standar', 'Standard Letterheads',
                'Kop surat harga ekonomis, tersedia dengan pilihan ketebalan HVS.',
                'Economic price letterheads, available with the HVS thickness choice.'
            ],
            [
                'Kop Surat Premium', 'Premium Letterheads',
                'Kop surat premium dengan bahan concorde.',
                'Premium letterheads with concorde material.'
            ],
        ];

        $clust[] = [
            [
                'Amplop DL', 'DL Envelopes',
                'Amplop standar untuk dokumen berukuran A4 yang dilipat menjadi tiga.',
                'Standard envelopes for A4-sized documents folded into three.'
            ],
            [
                'Amplop F4', 'F4 Envelopes',
                'Amplop F4 untuk menyimpan dokumen berukuran folio.',
                'F4 envelopes for storing folio-sized documents.'
            ],
        ];

        $clust[] = [
            [
                'Lanyard Standar', 'Standard Lanyards',
                'Lanyard standar berbahan dasar polyester dengan teknik cetak sablon.',
                'Standard lanyards made from polyester with screen printing techniques.'
            ],
            [
                'Lanyard Premium', 'Premium Lanyards',
                'Lanyard premium berbahan dasar tissue atau polyester dengan teknik cetak digital.',
                'Premium lanyards made from tissue or polyester with digital printing techniques.'
            ],
        ];

        $clust[] = [
            [
                'Map Folder Standar', 'Standard Map Folders',
                'Map folder harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price map folders, available in various variants of art carton.'
            ],
            [
                'Map Folder Premium', 'Premium Map Folders',
                'Map folder premium dengan bahan yang lebih mewah.',
                'Premium map folders with a fancier materials.'
            ],
        ];

        $clust[] = [
            //Nota NCR
        ];

        $clust[] = [
            //Cetak Doc
        ];

        $clust[] = [
            [
                'Hot Paper Cup', 'Hot Paper Cups',
                'Paper cup untuk produk minuman hangat atau panas.',
                'Paper cups for hot or warm beverage products.'
            ],
            [
                'Cold Paper Cup', 'Cold Paper Cups',
                'Paper cup untuk produk minuman dingin.',
                'Paper cups for cold beverage products.'
            ],
            [
                'Cup Es Krim', 'Ice Cream Cups',
                'Paper cup untuk produk es krim.',
                'Paper cups for ice cream products.'
            ],
            [
                'Paper Bowl', 'Paper Bowls',
                'Paper cup berbentuk mangkok untuk kebutuhan bisnis makanan.',
                'Bowl-shaped paper cups for food business needs.'
            ],
        ];

        $clust[] = [
            [
                'Shopping Bag Standar', 'Standard Shopping Bags',
                'Shopping bag harga ekonomis dengan bahan dasar art carton.',
                'Economic price shopping bags with art carton material based.'
            ],
            [
                'Shopping Bag Premium', 'Premium Shopping Bags',
                'Shopping bag premium dengan bahan yang lebih mewah, tersedia dengan pilihan tali pegangan.',
                'Premium shopping bags with a fancier materials, available with the handle straps choice.'
            ],
            [
                'Shopping Bag Cokelat', 'Brown Shopping Bags',
                'Shopping bag coklat, tersedia dengan pilihan tali pegangan.',
                'Brown shopping bags, available with the handle straps choice.'
            ],
        ];

        $clust[] = [
            [
                'Lakban Custom Transparan', 'Transparent Custom Duct Tapes',
                'Lakban kustom dengan warna dasar transparan.',
                'Custom duct tapes with transparent base color.'
            ],
            [
                'Lakban Custom Solid', 'Solid Custom Duct Tapes',
                'Lakban kustom dengan warna dasar solid.',
                'Custom duct tapes with solid base color.'
            ],
        ];

        $clust[] = [
            [
                'Gelas Plastik PP', 'PP Plastic Cups',
                'Gelas plastik berbahan dasar polipropilena berkualitas tinggi.',
                'High quality polypropylene-based plastic cups.'
            ],
            [
                'Gelas Plastik PET', 'PET Plastic Cups',
                'Gelas plastik yang terbuat dari polietilena tereftalat berkualitas tinggi.',
                'Plastic cups made from high quality polyethylene terephthalate.'
            ],
        ];

        $clust[] = [
            [
                'Snack Box Kecil', 'Small Snack Boxes',
                'Snack box berukuran kecil untuk mengemas berbagai jenis makanan.',
                'Small snack boxes to pack various types of food.'
            ],
            [
                'Snack Box Besar', 'Large Snack Boxes',
                'Snack box berukuran besar untuk mengemas berbagai jenis makanan.',
                'Large snack boxes to pack various types of food.'
            ],
            [
                'Snack Box Persegi', 'Square Snack Boxes',
                'Snack box berbentuk persegi untuk mengemas berbagai jenis makanan.',
                'Square-shaped snack boxes to pack various types of food.'
            ],
        ];

        $clust[] = [
            [
                'Label Harga Standar', 'Standard Price Tags',
                'Label harga ekonomis dengan bahan berkualitas.',
                'Economic price tags with a high-quality material.'
            ],
            [
                'Label Harga Premium', 'Premium Price Tags',
                'Label harga premium dengan bahan yang lebih mewah.',
                'Premium price tags with a fancier materials.'
            ],
        ];

        $clust[] = [
            [
                'Lunch Box Standar', 'Standard Lunch Boxes',
                'Lunch box standar dengan bahan food grade.',
                'Standard lunch boxes with a food grade materials.'
            ],
            [
                'Lunch Box Bento', 'Bento Lunch Boxes',
                'Bento box dengan bahan berkualitas tinggi.',
                'Bento boxes with a high-quality materials.'
            ],
            [
                'Lunch Box Food Pail', 'Food Pail Lunch Boxes',
                'Lunch box unik dengan bahan food grade.',
                'Unique lunch boxes with a food grade materials.'
            ],
        ];

        $clust[] = [
            [
                'Kardus Box Kecil', 'Small Cardboard Boxes',
                'Kardus box untuk mengemas produk berukuran kecil.',
                'Cardboard boxes for packaging small products.'
            ],
            [
                'Kardus Box Standar', 'Standard Cardboard Boxes',
                'Kardus box standar yang biasa digunakan untuk mengemas produk dalam berbagai ukuran.',
                'Standard cardboard boxes that used to package products in various sizes.'
            ],
            [
                'Kardus Box Pengiriman', 'Shipping Cardboard Boxes',
                'Kardus box untuk kebutuhan pengiriman dengan bahan yang lebih aman dan kuat.',
                'Cardboard boxes for shipping needs with safer and stronger materials.'
            ]
        ];

        $clust[] = [
            [
                'Satchel Paper Bag  Standar', 'Standard Satchel Paper Bags',
                'Food paper bag harga ekonomis tanpa dasar, jadi tidak bisa dibuat berdiri.',
                'Economic price food paper bag without a base, so it can\'t be stand up.'
            ],
            [
                'Satchel Paper Bag  Premium', 'Premium Satchel Paper Bags',
                'Food paper bag yang juga tanpa dasar dengan bahan anti minyak.',
                'Food paper bags that also without a base with anti-oil materials.'
            ],
            [
                'Food Paper Bag Flat Standar', 'Standard Flat Food Paper Bags',
                'Food paper bag standar yang memiliki dasar, jadi bisa dibuat berdiri.',
                'Standard food paper bags that have a base, so it can be stand up.'
            ],
            [
                'Food Paper Bag Flat Premium', 'Premium Flat Food Paper Bags',
                'Food paper bag yang juga memiliki dasar dengan bahan anti minyak.',
                'Food paper bags that also have a base with anti-oil materials.'
            ],
        ];

        $clust[] = [
            [
                'Kardus Box Duplex Kecil', 'Small Duplex Cardboard Boxes',
                'Kardus box berbahan dasar duplex untuk mengemas produk berukuran kecil.',
                'Duplex-based cardboard boxes for packaging small products.'
            ],
            [
                'Kardus Box Duplex Besar', 'Large Duplex Cardboard Boxes',
                'Kardus box berbahan dasar duplex untuk mengemas produk berukuran besar.',
                'Duplex-based cardboard boxes for packaging large products.'
            ],
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
            [
                'Flyer Standar', 'Standard Flyers',
                'Flyer harga ekonomis dengan bahan berkualitas.',
                'Economic price flyers with a high-quality material.'
            ],
            [
                'Flyer Premium', 'Premium Flyers',
                'Flyer premium dengan bahan yang lebih mewah.',
                'Premium flyers with a fancier materials.'
            ],
            [
                'Flyer Eknomis', 'Economic Flyers',
                'Flyer dengan harga termurah untuk kebutuhan cetak massal.',
                'Cheapest price flyers for mass printing needs.'
            ],
        ];

        $clust[] = [
            [
                'Poster Standar', 'Standard Posters',
                'Poster harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price posters, available in various variants of art carton.'
            ],
            [
                'Poster Backlit', 'Backlit Posters',
                'Poster dengan bahan dasar albatros yang dipasang di dalam box LED untuk menarik pengunjung',
                'Posters with albatross-based materials mounted in LED box to attract visitors.'
            ],
        ];

        $clust[] = [
            [
                'Tent Card Lipatan Segitiga', 'Triangle Fold Tent Cards',
                'Tent card standar dengan lipatan segitiga untuk memberikan informasi promosi kepada pengunjung.',
                'Standard tent cards with triangular folds to provide promotional information to visitors.'
            ],
            [
                'Tent Card Sisipan Lembar', 'Sheet Insertion Tent Cards',
                'Tent card berbentuk lembaran yang disisipkan ke dalam tent holder.',
                'Sheet-shaped tent cards that inserted into tent holder.'
            ],
        ];

        $clust[] = [
            [
                'Brosur Standar', 'Standard Brochures',
                'Brosur harga ekonomis dengan bahan berkualitas.',
                'Economic price brochures with a high-quality material.'
            ],
            [
                'Brosur Premium', 'Premium Brochures',
                'Brosur premium dengan bahan yang lebih mewah.',
                'Premium brochures with a fancier materials.'
            ],
            [
                'Brosur Eknomis', 'Economic Brochures',
                'Brosur dengan harga termurah untuk kebutuhan cetak massal.',
                'Cheapest price brochures for mass printing needs.'
            ],
        ];

        $clust[] = [
            [
                'X Banner', 'X Banners',
                'Banner dengan penyangga berbentuk X, tersedia dalam berbagai varian bahan dan ukuran.',
                'Banners with X-shaped cantilever, available in various variants of materials and sizes.'
            ],
            [
                'Y Banner', 'Y Banners',
                'Banner dengan penyangga berbentuk Y, tersedia dalam berbagai varian bahan dan ukuran.',
                'Banners with Y-shaped cantilever, available in various variants of materials and sizes.'
            ],
            [
                'Roll Up Banner', 'Roll Up Banners',
                'Banner roll up standar yang penggunaannya ditarik dari bawah ke atas pada bagian headernya.',
                'Standard roll up banners which is pulled from the bottom up in the header.'
            ],
            [
                'Big Roll Up Banner', 'Big Roll Up Banners',
                'Banner roll up besar yang penggunaannya ditarik dari bawah ke atas pada bagian headernya.',
                'Large roll up banners which is pulled from the bottom up in the header.'
            ],
            [
                'Tripod Banner Standar', 'Standard Tripod Banners',
                'Tripod banner harga ekonomis berbahan dasar foam board dan stiker vinil dengan teknik tempel manual.',
                'Economic price tripod banners made from foam board and vinyl stickers with manual patch techniques.'
            ],
            [
                'Tripod Banner Premium', 'Premium Tripod Banners',
                'Tripod banner premium berbahan dasar foam board dengan teknik cetak digital.',
                'Premium tripod banners made from foam board with digital printing techniques.'
            ],
            [
                'Spanduk Indoor Standar', 'Standard Indoor Banners',
                'Spanduk harga ekonomis untuk kebutuhan di dalam ruangan dengan bahan berkualitas.',
                'Economic price banners for indoor needs with a high-quality material.'
            ],
            [
                'Spanduk Indoor Premium', 'Premium Indoor Banners',
                'Spanduk premium untuk kebutuhan di dalam ruangan dengan bahan dan finishing yang lebih kuat.',
                'Premium banners for indoor needs with a stronger materials and finishing.'
            ],
            [
                'Spanduk Outdoor Standar', 'Standard Outdoor Banners',
                'Spanduk harga ekonomis untuk kebutuhan di luar ruangan dengan bahan berkualitas.',
                'Economic price banners for outdoor needs with a high-quality material.'
            ],
            [
                'Spanduk Outdoor Premium', 'Premium Outdoor Banners',
                'Spanduk premium untuk kebutuhan di luar ruangan dengan bahan dan finishing yang lebih kuat.',
                'Premium banners for outdoor needs with a stronger materials and finishing.'
            ],
        ];

        $clust[] = [
            [
                'Booklet Standar', 'Standard Booklets',
                'Booklet ekonomis dengan bahan berkualitas.',
                'Economic booklets with a high-quality material.'
            ],
            [
                'Booklet Premium', 'Premium Booklets',
                'Booklet premium dengan bahan yang lebih mewah.',
                'Premium booklets with a fancier materials.'
            ],
        ];

        $clust[] = [
            [
                'Stiker Label Bulat', 'Round Label Stickers',
                'Stiker label berbentuk bulat dengan bahan berkualitas.',
                'Rounded label stickers with a high-quality materials.'
            ],
            [
                'Stiker Label Toples', 'Jar Label Stickers',
                'Stiker label untuk toples dengan bahan berkualitas.',
                'Label stickers for jars with a high-quality materials.'
            ],
            [
                'Stiker Decal', 'Decal Stickers',
                'Stiker vinil berkualitas yang dicetak dengan metode decal.',
                'High-quality vinyl stickers that are printed by the decal method.'
            ],
            [
                'Stiker Label Botol', 'Bottle Label Stickers',
                'Stiker label untuk botol minuman dengan bahan berkualitas.',
                'Label stickers for beverage bottles with a high-quality materials.'
            ],
            [
                'Stiker Label Lunch Box', 'Lunch Box Label Stickers',
                'Stiker label untuk lunch box dengan bahan berkualitas.',
                'Label stickers for lunch boxes with a high-quality materials.'
            ],
        ];

        $clust[] = [
            [
                'Sertifikat Standar', 'Standard Certificates',
                'Sertifikat ekonomis dengan bahan berkualitas.',
                'Economic certificates with a high-quality material.'
            ],
            [
                'Sertifikat Premium', 'Premium Certificates',
                'Sertifikat premium dengan bahan yang lebih mewah.',
                'Premium certificates with a fancier materials.'
            ],
        ];

        $clust[] = [
            [
                'Majalah Standar', 'Standard Magazines',
                'Majalah ekonomis dengan bahan berkualitas.',
                'Economic magazines with a high-quality material.'
            ],
            [
                'Majalah Premium', 'Premium Magazines',
                'Majalah premium dengan bahan yang lebih mewah.',
                'Premium magazines with a fancier materials.'
            ],
        ];

        $clust[] = [
            [
                'Company Profile Standar', 'Standard Company Profiles',
                'Company profile ekonomis dengan bahan berkualitas.',
                'Economic company profiles with a high-quality material.'
            ],
            [
                'Company Profile Premium', 'Premium Company Profiles',
                'Company profile premium dengan bahan yang lebih mewah.',
                'Premium company profiles with a fancier materials.'
            ],
        ];

        $clust[] = [
            [
                'Kalender Meja Standar', 'Standard Desk Calendars',
                'Kalender meja harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price desk calendars, available in various variants of art carton.'
            ],
            [
                'Kalender Poster', 'Poster Calendars',
                'Kalender berupa poster yang lebih praktis, tersedia dalam berbagai varian bahan art carton.',
                'Calendar in the form of a poster that is more practical, available in various variants of art carton.'
            ],
            [
                'Kalender Dinding', 'Wall Calendars',
                'Kalender yang dipasang di dinding dengan bahan yang lebih mewah.',
                'Wall-mounted calendars with a fancier materials.'
            ],
        ];

        $clust[] = [
            [
                'Voucher Satuan', 'Single Vouchers',
                'Voucher untuk kebutuhan promosi jangka pendek dan terbatas dengan bahan berkualitas.',
                'Vouchers for short-term and limited promotional needs with a high-quality materials.'
            ],
            [
                'Voucher Buku', 'Book Vouchers',
                'Voucher untuk kebutuhan promosi jangka panjang dengan bahan berkualitas.',
                'Vouchers for long-term promotional needs with a high-quality materials.'
            ],
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
            [
                'Tote Bag Standar', 'Standard Tote Bags',
                'Tote bag harga ekonomis dengan bahan berkualitas dan ramah lingkungan.',
                'Economic price tote bags with a high-quality and eco-friendly materials.'
            ],
            [
                'Tote Bag Premium', 'Premium Tote Bags',
                'Tote bag premium berbahan dasar kanvas berkualitas.',
                'Premium tote bags made from high-quality canvas.'
            ],
        ];

        $clust[] = [
            [
                'Tas Goodie Standar', 'Standard Goodie Bags',
                'Tas goodie ekonomis berbahan dasar spunbound dengan teknik cetak sablon.',
                'Economic goodie bags made from spunbound with screen printing techniques.'
            ],
            [
                'Tas Goodie Premium', 'Premium Goodie Bags',
                'Tas goodie premium berbahan dasar spunbound dengan teknik cetak digital.',
                'Premium goodie bags made from spunbound with digital printing techniques.'
            ],
        ];

        $clust[] = [
            [
                'Kaos Polo Bordir', 'Embroidery Polo Shirts',
                'Kaos polo berbahan dasar katun dengan teknik cetak bordir.',
                'Cotton-based polo shirt with embroidery printing techniques.'
            ],
            [
                'Kaos Polo PolyFlex', 'PolyFlex Polo Shirts',
                'Kaos polo berbahan dasar katun dengan teknik cetak sablon polyflex.',
                'Cotton-based polo shirt with polyflex screen printing techniques.'
            ],
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
                            'id' => $data[0],
                            'en' => $data[1],
                        ],
                        'permalink' => [
                            'id' => preg_replace("![^a-z0-9]+!i", "-", strtolower($data[0])),
                            'en' => preg_replace("![^a-z0-9]+!i", "-", strtolower($data[1])),
                        ],
                        'banner' => preg_replace("![^a-z0-9]+!i", "-", strtolower($data[1])) . '.jpg',
                        'caption' => [
                            'id' => $data[2],
                            'en' => $data[3],
                        ],
                        'thumbnail' => preg_replace("![^a-z0-9]+!i", "-", strtolower($data[1])) . '.jpg',
                        'features' => [
                            'id' => '<ul><li>' . \Faker\Factory::create()->words(rand(4, 7), true) . '</li><li>' . \Faker\Factory::create()->words(rand(4, 5), true) . '</li><li>' . \Faker\Factory::create()->words(rand(4, 5), true) . '</li></ul>',
                            'en' => '<ul><li>' . \Faker\Factory::create()->words(rand(4, 7), true) . '</li><li>' . \Faker\Factory::create()->words(rand(4, 5), true) . '</li><li>' . \Faker\Factory::create()->words(rand(4, 5), true) . '</li></ul>',
                        ],
                    ]);
                }
            }
        }
    }
}
