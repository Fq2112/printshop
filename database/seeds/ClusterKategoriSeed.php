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
                '<ul><li>Berbahan Art Carton, standar kartu nama</li><li>Harga ekonomis dan berkualitas tinggi</li><li>Tersedia dalam pilihan laminasi doff dan glossy</li></ul>',
                '<ul><li>Commonly used Art Carton material</li><li>Low-price and high-quality results</li><li>Available in choices doff and glossy lamination</li></ul>',
            ],
            [
                'Kartu Nama Premium', 'Premium Business Cards',
                'Kartu nama premium dengan bahan yang mewah.',
                'Premium business cards with a fancy material.',
                '<ul><li>Tersedia pilihan bahan-bahan bertekstur istimewa</li><li>Kartu nama dengan tampilan premium</li><li>Non-laminasi</li></ul>',
                '<ul><li>Available in premium textured materials</li><li>Designed with premium look</li><li>Available in choices of square and rounded corner</li></ul>',
            ],
            [
                'Kartu Nama Eksklusif', 'Exclusive Business Cards',
                'Kartu nama eksklusif dengan bahan yang lebih tebal dan mewah.',
                'Exclusive business cards with a thicker and fancier material.',
                '<ul><li>Tersedia Pilihan Bahan-Bahan Istimewa</li><li>Ketebalan 2 kali lipat kartu nama premium</li><li>Tampilan mewah memberi kesan profesional</li></ul>',
                '<ul><li>Available in exclusive materials</li><li>Strong and thick</li><li>Designed for professional and luxury look</li></ul>',
            ]
        ];

        $clust[] = [
            [
                'Kartu Undangan Standar', 'Standard Invitation Cards',
                'Kartu undangan harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price invitation cards, available in various variants of art carton.',
                '<ul><li>Bahan Art Carton berkualitas</li><li>Tersedia dalam warna dasar putih</li><li>Tersedia pilihan Laminasi Doff dan Glossy</li><li>Harga terjangkau dengan kualitas tinggi</li></ul>',
                '<ul><li>High-quality Art Carton materials</li><li>Available in white base color</li><li>Available in choices of Doff and Glossy lamination </li><li>Low-price and high-quality results</li></ul>',
            ],
            [
                'Kartu Undangan Premium', 'Premium Invitation Cards',
                'Kartu undangan premium dengan bahan yang lebih mewah.',
                'Premium invitation cards with a fancier materials.',
                '<ul><li>Bahan premium bertekstur dan mewah</li><li>Tersedia dalam warna dasar broken white</li><li>Bahan premium untuk hasil cetak lebih natural</li><li>Kartu undangan dengan design mewah</li></ul>',
                '<ul><li>Premium textured and fancy materials</li><li>Available in broken white base color</li><li>Premium materials for more natural printing color</li><li>For a more luxurious invitation cards look</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Kartu Terima Kasih Standar', 'Standard Gratitude Cards',
                'Kartu terima kasih harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price gratitude cards, available in various variants of art carton.',
                '<ul><li>Bahan Art Carton berkualitas</li><li>Tersedia dalam warna dasar putih</li><li>Tersedia pilihan Laminasi Doff dan Glossy</li><li>Harga terjangkau dengan kualitas tinggi</li></ul>',
                '<ul><li>High-quality Art Carton materials</li><li>Available in white base color</li><li>Available in choices of Doff and Glossy lamination</li><li>Low-price and high-quality results</li></ul>',
            ],
            [
                'Kartu Terima Kasih Premium', 'Premium Gratitude Cards',
                'Kartu terima kasih premium dengan bahan yang lebih mewah.',
                'Premium gratitude cards with a fancier materials.',
                '<ul><li>Bahan premium bertekstur dan mewah</li><li>Tersedia dalam warna dasar broken white</li><li>Bahan premium untuk hasil cetak lebih natural</li><li>Tampilan kartu terima kasih yang mewah</li></ul>',
                '<ul><li>Premium textured and fancy materials</li><li>Available in broken white base color</li><li>Premium materials for more natural printing color</li><li>For a more luxurious gratitude cards look</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Kartu Identitas Standar', 'Standard ID Cards',
                'Kartu identitas standar berbahan dasar PVC, tersedia dengan pilihan jumlah box.',
                'Standard PVC-based identity cards, available with the box amount choice.',
                '<ul><li>ID Card standar</li><li>Terbuat dari bahan PVC berkualitas</li><li>Pilihan finishing dengan lubang oval</li></ul>',
                '<ul><li>Standard ID Card</li><li>Made from high-quality PVC</li><li>Available in oval holes finishing</li></ul>',
            ],
            [
                'Kartu RFID', 'RFID Cards',
                'Kartu identitas kustom dengan mikrocip di dalamnya untuk kebutuhan identifikasi.',
                'Custom identity cards with a microchip inside for identification needs.',
                '<ul><li>ID Card yang dilengkapi teknologi RFID 125 kHz</li><li>Terbuat dari bahan PVC berkualitas</li><li>Pilihan finishing dengan lubang oval</li></ul>',
                '<ul><li>ID Card with 125 kHz RFID technology</li><li>Made from high-quality PVC</li><li>Available in oval holes finishing</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Kartu Ucapan Standar', 'Standard Greeting Cards',
                'Kartu ucapan harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price greeting cards, available in various variants of art carton.',
                '<ul><li>Bahan Art Carton berkualitas</li><li>Tersedia dalam warna dasar putih</li><li> Tersedia pilihan Laminasi Doff dan Glossy</li><li>Pilihan kartu ucapan yang ekonomis</li></ul>',
                '<ul><li>High-quality Art Carton materials</li><li>Available in white base color</li><li>Available in choices of Doff and Glossy lamination</li><li>Low-price and high-quality results</li></ul>',
            ],
            [
                'Kartu Ucapan Premium', 'Premium Greeting Cards',
                'Kartu ucapan premium dengan bahan yang lebih mewah.',
                'Premium greeting cards with a fancier materials.',
                '<ul><li>Bahan premium bertekstur dan mewah</li><li>Tersedia dalam warna dasar broken white</li><li>Bahan premium untuk hasil cetak yang lebih natural</li><li>Tampilan kartu ucapan yang lebih mewah</li></ul>',
                '<ul><li>Premium textured and fancy materials</li><li>Available in broken white base color</li><li>Premium materials for more natural printing color</li><li>For a more luxurious greeting card looks</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Kartu Stamp Flat', 'Flat Stamp Cards',
                'Kartu stamp flat atau standar, tersedia dengan pilihan jumlah sisi cetak.',
                'Flat or standard stamp cards, available with the sides printed choice.',
                '<ul><li>Berukuran sebesar kartu nama yang praktis dibawa kemana-mana</li><li>Harga ekonomis dan berkualitas tinggi</li></ul>',
                '<ul><li>Business card size, easy to carry</li><li>Low-price and high-quality stamp cards</li></ul>',
            ],
            [
                'Kartu Stamp Lipat', 'Folding Stamp Cards',
                'Kartu stamp lipat untuk periode promosi yang lebih lama, juga tersedia dengan pilihan jumlah sisi cetak.',
                'Folding stamp cards for a longer promotion period, are also available with the sides printed choice.',
                '<ul><li>Berukuran lebih besar dan berbentuk lipatan</li><li>Harga terjangkau untuk kualitas premium</li></ul>',
                '<ul><li>Larger in size and in the form of folding cards</li><li>Affordable price for premium look</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Kartu Pos Standar', 'Standard Postcards',
                'Kartu pos harga ekonomis dengan bahan berkualitas.',
                'Economic price postcards with a high-quality material.',
                '<ul><li>Terbuat dari bahan berkualitas tinggi</li><li>Cocok untuk promosi dalam jumlah besar</li></ul>',
                '<ul><li>Made from high-quality materials</li><li>Suitable for promotions in large numbers</li></ul>',
            ],
            [
                'Kartu Pos Premium', 'Premium Postcards',
                'Kartu pos premium dengan bahan yang lebih mewah.',
                'Premium postcards with a fancier materials.',
                '<ul><li>Terbuat dari bahan spesial yang mewah</li></ul>',
                '<ul><li>Made from extra fancy materials for more elegant look</li></ul>',
            ],
        ];

        $clust[] = [
            //Kartu E
        ];

        $clust[] = [
            [
                'Kop Surat Standar', 'Standard Letterheads',
                'Kop surat harga ekonomis, tersedia dengan pilihan ketebalan HVS.',
                'Economic price letterheads, available with the HVS thickness choice.',
                '<ul><li>Menggunakan bahan standar berkualitas</li><li>Tersedia dalam warna dasar putih</li><li>Pilihan kop surat dengan harga ekonomis</li></ul>',
                '<ul><li>Made from high-quality materials</li><li>Available in white base color</li><li>High-quality and budget-friendly</li></ul>',
            ],
            [
                'Kop Surat Premium', 'Premium Letterheads',
                'Kop surat premium dengan bahan concorde.',
                'Premium letterheads with concorde material.',
                '<ul><li>Menggunakan bahan premium bertekstur dan tebal</li><li>Tersedia dalam warna dasar broken white</li><li>Pilihan kop surat dengan tampilan lebih mewah</li></ul>',
                '<ul><li>Made from thick and textured premium materials</li><li>Available in broken white base color</li><li>Premium designed for luxurious look</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Amplop DL', 'DL Envelopes',
                'Amplop standar untuk dokumen berukuran A4 yang dilipat menjadi tiga.',
                'Standard envelopes for A4-sized documents folded into three.',
                '<ul><li>Amplop dengan ukuran standar untuk berbagai keperluan.</li><li>Harga ekonomis dan berkualitas tinggi</li></ul>',
                '<ul><li>Standard-sized envelopes for various purposes. </li><li>Low-price and high-quality envelopes</li></ul>',
            ],
            [
                'Amplop F4', 'F4 Envelopes',
                'Amplop F4 untuk menyimpan dokumen berukuran folio.',
                'F4 envelopes for storing folio-sized documents.',
                '<ul><li>Amplop berukuran folio untuk menyimpan dokumen.</li><li>Harga ekonomis dan berkualitas tinggi</li></ul>',
                '<ul><li>Folio-sized envelopes for keeping documents.</li><li>Low-price and high-quality envelopes</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Lanyard Standar', 'Standard Lanyards',
                'Lanyard standar berbahan dasar polyester dengan teknik cetak sablon.',
                'Standard lanyards made from polyester with screen printing techniques.',
                '<ul><li>Terbuat dari bahan Polyester</li><li>Tersedia pilihan warna cetak 1 warna dan 2 warna</li><li>Dicetak dengan metode sablon</li></ul>',
                '<ul><li>Made from Polyester material</li><li>Available in choices of 1 and 2 print colors</li><li>Printed with screen printing technique</li></ul>',
            ],
            [
                'Lanyard Premium', 'Premium Lanyards',
                'Lanyard premium berbahan dasar tissue atau polyester dengan teknik cetak digital.',
                'Premium lanyards made from tissue or polyester with digital printing techniques.',
                '<ul><li>Terbuat dari bahan Polyester/Tissue</li><li>Tersedia dalam warna cetak full color</li><li>Dicetak dengan metode digital</li></ul>',
                '<ul><li>Made from Polyester/Tissue material</li><li>Full color print color</li><li>Printed with digital method</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Map Folder Standar', 'Standard Map Folders',
                'Map folder harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price map folders, available in various variants of art carton.',
                '<ul><li>Bahan Art Carton berkualitas tinggi</li><li>Tersedia pilihan laminasi Doff dan Glossy</li><li>Pilihan map folder dengan harga ekonomis</li></ul>',
                '<ul><li>Made from high-quality Art Carton materials</li><li>Availabe in choices of Doff and Glossy laminations</li><li>Low-price and high-quality folders</li></ul>',
            ],
            [
                'Map Folder Premium', 'Premium Map Folders',
                'Map folder premium dengan bahan yang lebih mewah.',
                'Premium map folders with a fancier materials.',
                '<ul><li>Menggunakan bahan istimewa</li><li>Non-laminasi</li><li>Tersedia dalam tampilan yang lebih mewah</li></ul>',
                '<ul><li>Made from fancy materials</li><li>Non-laminated</li><li>Premium designed for more luxurious look</li></ul>',
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
                'Paper cups for hot or warm beverage products.',
                '<ul><li>Paper cup untuk minuman hangat atau panas.</li></ul>',
                '<ul><li>Paper cups for hot beverages.</li></ul>',
            ],
            [
                'Cold Paper Cup', 'Cold Paper Cups',
                'Paper cup untuk produk minuman dingin.',
                'Paper cups for cold beverage products.',
                '<ul><li>Paper Cup untuk minuman dingin.</li></ul>',
                '<ul><li>Paper cups for cold beverages.</li></ul>',
            ],
            [
                'Cup Es Krim', 'Ice Cream Cups',
                'Paper cup untuk produk es krim.',
                'Paper cups for ice cream products.',
                '<ul><li>Paper cup untuk produk es krim.</li></ul>',
                '<ul><li>Paper cups for ice cream products.</li></ul>',
            ],
            [
                'Paper Bowl', 'Paper Bowls',
                'Paper cup berbentuk mangkok untuk kebutuhan bisnis makanan.',
                'Bowl-shaped paper cups for food business needs.',
                '<ul><li>Paper cup berbentuk mangkok.</li></ul>',
                '<ul><li>Bowl-shaped paper cups.</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Shopping Bag Standar', 'Standard Shopping Bags',
                'Shopping bag harga ekonomis dengan bahan dasar art carton.',
                'Economic price shopping bags with art carton material based.',
                '<ul><li>Bahan Art Carton berkualitas tinggi</li><li>Tali kur untuk bahan pegangan</li><li>Tersedia pilihan laminasi Doff dan Glossy</li></ul>',
                '<ul><li>Made from high-quality Art Carton</li><li>Kur rope for the handle material</li><li>Availabe in choices of Doff and Glossy laminations</li></ul>',
            ],
            [
                'Shopping Bag Premium', 'Premium Shopping Bags',
                'Shopping bag premium dengan bahan yang lebih mewah, tersedia dengan pilihan tali pegangan.',
                'Premium shopping bags with a fancier materials, available with the handle straps choice.',
                '<ul><li>Bahan White Kraft, lebih kokoh</li><li>Pilihan bahan pegangan tali kur dan tali twist</li><li>Non-laminasi</li></ul>',
                '<ul><li>Made from durable White Kraft material</li><li>Available in choices of kur rope and twist rope for the handle materials</li><li>Non-laminated</li></ul>',
            ],
            [
                'Shopping Bag Cokelat', 'Brown Shopping Bags',
                'Shopping bag coklat, tersedia dengan pilihan tali pegangan.',
                'Brown shopping bags, available with the handle straps choice.',
                '<ul><li>Bahan ramah lingkungan Brown Kraft</li><li>Pilihan bahan pegangan tali kur dan tali twist</li><li>Non-laminasi</li></ul>',
                '<ul><li>Made from eco-friendly Brown Kraft material</li><li>Available in choices of kur rope and twist rope for the handle materials</li><li>Non-laminated</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Lakban Custom Transparan', 'Transparent Custom Duct Tapes',
                'Lakban kustom dengan warna dasar transparan.',
                'Custom duct tapes with transparent base color.',
                '<ul><li>Terbuat dari bahan Bopp berkualitas tinggi</li><li>Tersedia dalam warna dasar bening/transparan</li></ul>',
                '<ul><li>Made from high-quality Bopp material</li><li>Available in clear/transparent base color</li></ul>',
            ],
            [
                'Lakban Custom Solid', 'Solid Custom Duct Tapes',
                'Lakban kustom dengan warna dasar solid.',
                'Custom duct tapes with solid base color.',
                '<ul><li>Terbuat dari bahan Bopp berkualitas tinggi</li><li>Tersedia dalam warna dasar solid</li></ul>',
                '<ul><li>Made from high-quality Bopp material</li><li>Available in solid base color</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Gelas Plastik PP', 'PP Plastic Cups',
                'Gelas plastik berbahan dasar polipropilena berkualitas tinggi.',
                'High quality polypropylene-based plastic cups.',
                '<ul><li>Bahan polipropilena</li><li>Transparan dan tipis</li><li>Harga ekonomis dan berkualitas tinggi</li></ul>',
                '<ul><li>Made from polypropylene</li><li>Thin and transparent</li><li>Low-priced and high-quality plastic cups</li></ul>',
            ],
            [
                'Gelas Plastik PET', 'PET Plastic Cups',
                'Gelas plastik yang terbuat dari polietilena tereftalat berkualitas tinggi.',
                'Plastic cups made from high quality polyethylene terephthalate.',
                '<ul><li>Bahan polietilena tereftalat</li><li>Premium dan lebih kokoh</li><li>Finishing lebih halus</li><li>Memiliki daya tahan lebih baik</li></ul>',
                '<ul><li>Made from polyethylene terephthalate</li><li>Premium and strength crystal clear material</li><li>Smoother finishing</li><li>Premium designed for exclusive look</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Snack Box Kecil', 'Small Snack Boxes',
                'Snack box berukuran kecil untuk mengemas berbagai jenis makanan.',
                'Small snack boxes to pack various types of food.',
                '<ul><li>Snack box dengan ukuran kecil</li><li>Cocok untuk menjadi kemasan kue jajanan pasar atau fried chicken</li></ul>',
                '<ul><li>Small snack box</li><li>Suitable for small cakes or fried chicken</li></ul>',
            ],
            [
                'Snack Box Besar', 'Large Snack Boxes',
                'Snack box berukuran besar untuk mengemas berbagai jenis makanan.',
                'Large snack boxes to pack various types of food.',
                '<ul><li>Snack box dengan ukuran besar</li><li>Cocok untuk kemasan martabak</li></ul>',
                '<ul><li>Large size snack box</li><li>Suitable for martabak</li></ul>',
            ],
            [
                'Snack Box Persegi', 'Square Snack Boxes',
                'Snack box berbentuk persegi untuk mengemas berbagai jenis makanan.',
                'Square-shaped snack boxes to pack various types of food.',
                '<ul><li>Snack box berbentuk persegi seperti dus nasi kotak</li></ul>',
                '<ul><li>Square-shaped snack box</li><li>Similar to rice box</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Label Harga Standar', 'Standard Price Tags',
                'Label harga ekonomis dengan bahan berkualitas.',
                'Economic price tags with a high-quality material.',
                '<ul><li>Bahan Art Carton berkualitas tinggi</li><li>Tanpa laminasi</li><li>Harga ekonomis dan berkualitas tinggi</li></ul>',
                '<ul><li>Made from high quality Art Carton</li><li>Non-laminated</li><li>Low-price and high-quality price tags</li></ul>',
            ],
            [
                'Label Harga Premium', 'Premium Price Tags',
                'Label harga premium dengan bahan yang lebih mewah.',
                'Premium price tags with a fancier materials.',
                '<ul><li>Bahan premium dan mewah</li><li>Tersedia pilihan laminasi Doff dan Glossy</li><li>Premium designed for luxurious look</li></ul>',
                '<ul><li>Made from premium and fancy materials</li><li>Available in choices of Doff and Glossy lamination</li>Premium designed for luxurious look</ul>',
            ],
        ];

        $clust[] = [
            [
                'Lunch Box Standar', 'Standard Lunch Boxes',
                'Lunch box standar dengan bahan food grade.',
                'Standard lunch boxes with a food grade materials.',
                '<ul><li>Lunch box standar berbentuk kotak</li><li>Terbuat dari bahan food-grade berkualitas</li></ul>',
                '<ul><li>Standard rectangle-shaped lunch box</li><li>Made from high-quality food-grade material</li></ul>',
            ],
            [
                'Lunch Box Bento', 'Bento Lunch Boxes',
                'Bento box dengan bahan berkualitas tinggi.',
                'Bento boxes with a high-quality materials.',
                '<ul><li>Lunch box dengan penyekat</li><li>Terbuat dari bahan food-grade berkualitas</li></ul>',
                '<ul><li>Lunch box with special blockings inside</li><li>Made from high-quality food-grade material</li></ul>',
            ],
            [
                'Lunch Box Food Pail', 'Food Pail Lunch Boxes',
                'Lunch box unik dengan bahan food grade.',
                'Unique lunch boxes with a food grade materials.',
                '<ul><li>Lunch box berbentuk unik</li><li>Terbuat dari bahan food-grade berkualitas</li></ul>',
                '<ul><li>Unique-shaped lunch box</li><li>Made from high-quality food-grade material</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Kardus Box Kecil', 'Small Cardboard Boxes',
                'Kardus box untuk mengemas produk berukuran kecil.',
                'Cardboard boxes for packaging small products.',
                '<ul><li>Tersedia dalam 2 pilihan bahan berkualitas</li><li>Berbentuk seperti kotak sepatu</li></ul>',
                '<ul><li>Available in 2 high-quality material selections</li><li>Similiar to shoe box</li></ul>',
            ],
            [
                'Kardus Box Standar', 'Standard Cardboard Boxes',
                'Kardus box standar yang biasa digunakan untuk mengemas produk dalam berbagai ukuran.',
                'Standard cardboard boxes that used to package products in various sizes.',
                '<ul><li>Tersedia dalam 4 pilihan bahan berkualitas</li><li>Memiliki 3 pilihan ukuran</li></ul>',
                '<ul><li>Available in 4 high-quality material selections</li><li>Available in various size selections</li></ul>',
            ],
            [
                'Kardus Box Pengiriman', 'Shipping Cardboard Boxes',
                'Kardus box untuk kebutuhan pengiriman dengan bahan yang lebih aman dan kuat.',
                'Cardboard boxes for shipping needs with safer and stronger materials.',
                '<ul><li>Tersedia dalam 2 pilihan bahan berkualitas</li><li>Memiliki 3 pilihan ukuran</li><li>Berbentuk seperti kotak pizza</li></ul>',
                '<ul><li>Available in 2 high-quality material selections</li><li>Available in 3 size selections</li><li>Similiar to pizza box</li></ul>',
            ]
        ];

        $clust[] = [
            [
                'Satchel Paper Bag  Standar', 'Standard Satchel Paper Bags',
                'Food paper bag harga ekonomis tanpa dasar, jadi tidak bisa dibuat berdiri.',
                'Economic price food paper bag without a base, so it can\'t be stand up.',
                '<ul><li>Bahan Samson Kraft berkualitas</li><li>Hanya tersedia 1 pilihan warna dasar</li><li>Harga ekonomis</li><li>Tidak memiliki dasar</li></ul>',
                '<ul><li>Made from high-quality Samson Kraft material</li><li> Available in 1 base color</li><li>Budget friendly</li></ul>',
            ],
            [
                'Satchel Paper Bag  Premium', 'Premium Satchel Paper Bags',
                'Food paper bag yang juga tanpa dasar dengan bahan anti minyak.',
                'Food paper bags that also without a base with anti-oil materials.',
                '<ul><li>Bahan Greaseproof anti minyak berkualitas</li><li>Hanya tersedia 1 pilihan warna dasar</li><li>Harga ekonomis</li><li>Tidak memiliki dasar</li></ul>',
                '<ul><li>Made from high-quality Greaseproof material</li><li>Available in 1 base color</li><li>Budget friendly</li></ul>',
            ],
            [
                'Food Paper Bag Flat Standar', 'Standard Flat Food Paper Bags',
                'Food paper bag standar yang memiliki dasar, jadi bisa dibuat berdiri.',
                'Standard food paper bags that have a base, so it can be stand up.',
                '<ul><li>Bahan Brown Kraft berkualitas</li><li>Tersedia dalam 4 pilihan warna dasar</li><li>Memiliki dasar sehingga bisa diletakkan berdiri</li></ul>',
                '<ul><li>Made from high-quality Brown Kraft material</li><li>Available in 4 base color selections</li><li>Completed with a base to make the bag stand</li></ul>',
            ],
            [
                'Food Paper Bag Flat Premium', 'Premium Flat Food Paper Bags',
                'Food paper bag yang juga memiliki dasar dengan bahan anti minyak.',
                'Food paper bags that also have a base with anti-oil materials.',
                '<ul><li>Bahan Greaseproof yang anti minyak berkualitas</li><li>Tersedia dalam 4 pilihan warna dasar</li><li>Memiliki dasar sehingga bisa diletakkan berdiri</li></ul>',
                '<ul><li>Made from high-quality Greaseproof material</li><li>Available 4 color selections</li><li>Completed with a base to make the bag stand</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Kardus Box Duplex Kecil', 'Small Duplex Cardboard Boxes',
                'Kardus box berbahan dasar duplex untuk mengemas produk berukuran kecil.',
                'Duplex-based cardboard boxes for packaging small products.',
                '<ul><li>Kardus duplex berukuran kecil</li><li>Dilengkapi finishing dengan pond</li><li>Tersedia pilihan laminasi Glossy dan Doff</li></ul>',
                '<ul><li>Small-sized duplex-based cardboard box</li><li>Completed with pond finishing</li><li>Available in choices of Glossy and Doff lamination</li></ul>',
            ],
            [
                'Kardus Box Duplex Besar', 'Large Duplex Cardboard Boxes',
                'Kardus box berbahan dasar duplex untuk mengemas produk berukuran besar.',
                'Duplex-based cardboard boxes for packaging large products.',
                '<ul><li>Kardus duplex berukuran besar</li><li>Tersedia 3 pilihan ukuran besar</li><li>Tersedia pilihan finishing pond dan lem</li><li>Tersedia pilihan laminasi Waterbased dan UV Varnish</li></ul>',
                '<ul><li>Big-sized duplex-based cardboard box</li><li>Available in 3 size selections</li><li>Available in choices of Pond and Glue finishing<li><li>Available in choices of Waterbased and UV Varnish lamination</li></ul>',
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
                'Economic price flyers with a high-quality material.',
                '<ul><li>Bahan standar berkualitas tinggi yang umum digunakan</li><li>Harga ekonomis</li>Cocok untuk kebutuhan promosi</li></ul>',
                '<ul><li>High-quality commonly used standard materials</li><li>Affordable price</li><li>Suitable for promotions</li></ul>',
            ],
            [
                'Flyer Premium', 'Premium Flyers',
                'Flyer premium dengan bahan yang lebih mewah.',
                'Premium flyers with a fancier materials.',
                '<ul><li>Bahan tebal dan bertekstur</li><li>Memancarkan warna dengan baik</li><li>Bahan eksklusif, cocok untuk display</li></ul>',
                '<ul><li>Thicker and textured material</li><li>Radiate colors beautifully</li><li>Exclusive materials, suitable for display purpose</li></ul>',
            ],
            [
                'Flyer Eknomis', 'Economic Flyers',
                'Flyer dengan harga termurah untuk kebutuhan cetak massal.',
                'Cheapest price flyers for mass printing needs.',
                '<ul><li>Bahan standar dan murah</li><li>Harga sangat terjangkau</li><li>Cpcpk untuk kebutuhan promosi massal</li></ul>',
                '<ul><li>Standard materials</li><li>Cheap</li><li>Suitable for mass promotion needs</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Poster Standar', 'Standard Posters',
                'Poster harga ekonomis, tersedia dalam berbagai varian bahan art carton.',
                'Economic price posters, available in various variants of art carton.',
                '<ul><li>Bahan Art Carton standar berkualitas tinggi</li><li>Berukuran lebih kecil</li><li>Harga ekonomis</li></ul>',
                '<ul><li>High-quality standard Art Carton materials</li><li>Available in smaller size</li><li>High-quality and budget-friendly</li></ul>',
            ],
            [
                'Poster Backlit', 'Backlit Posters',
                'Poster dengan bahan dasar albatros yang dipasang di dalam box LED untuk menarik pengunjung',
                'Posters with albatross-based materials mounted in LED box to attract visitors.',
                '<ul><li>Bahan eksklusif</li><li>Berukuran lebih besar</li><li>Tersedia ukuran custom</li></ul>',
                '<ul><li>Exclusive materials</li><li>Available in bigger size</li><li>Available in custom size</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Tent Card Lipatan Segitiga', 'Triangle Fold Tent Cards',
                'Tent card standar dengan lipatan segitiga untuk memberikan informasi promosi kepada pengunjung.',
                'Standard tent cards with triangular folds to provide promotional information to visitors.',
                '<ul><li>Bahan tebal berkualitas tinggi</li><li>Tidak memerlukan tambahan akrilik untuk berdiri</li><li>Tersedia pilihan laminasi Doff dan Glossy</li><li>Cocok untuk promosi jangka pendek</li></ul>',
                '<ul><li>High-quality thick materials</li><li>Do not require additional acrylic to stand</li><li>Available in choices of Doff and Glossy lamination</li><li>Suitable for short-term promotions</li></ul>',
            ],
            [
                'Tent Card Sisipan Lembar', 'Sheet Insertion Tent Cards',
                'Tent card berbentuk lembaran yang disisipkan ke dalam tent holder.',
                'Sheet-shaped tent cards that inserted into tent holder.',
                '<ul><li>Bahan lebih tipis</li><li>Perlu disisipkan dalam akrilik untuk berdiri</li><li>Tersedia dalam pilihan cetak 1 sisi dan 2 sisi</li><li>Non-laminasi</li><li>Lebih awet, cocok untuk promosi jangka panjang</li></ul>',
                '<ul><li>High-quality thin materials</li><li>Need to be inserted inside an acrylic stand</li><li>Avalable in choices of 1 and 2-sided print</li>Non-laminated</li><li>More durable, suitable for long-term promotions</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Brosur Standar', 'Standard Brochures',
                'Brosur harga ekonomis dengan bahan berkualitas.',
                'Economic price brochures with a high-quality material.',
                '<ul><li>Bahan standar berkualitas yang umum digunakan</li><li>Harga ekonomis</li><li>Jumlah minimum pemesanan lebih besar</li></ul>',
                '<ul><li>High-quality standard materials</li><li>Budget-friendly</li><li>Larger minimum order quantities</li></ul>',
            ],
            [
                'Brosur Premium', 'Premium Brochures',
                'Brosur premium dengan bahan yang lebih mewah.',
                'Premium brochures with a fancier materials.',
                '<ul><li>Bahan berkualitas tinggi, lebih tebal, dan bertekstur</li><li>Harga premium</li><li>Warna cetak lebih tajam</li><li>Cocok untuk menampilkan profil perusahaan</li></ul>',
                '<ul><li>High-quality, thicker, and textured materials</li><li>Affordable price for premium look</li><li>Sharper printing colors</li><li>Suitable for company profile</li></ul>',
            ],
            [
                'Brosur Eknomis', 'Economic Brochures',
                'Brosur dengan harga termurah untuk kebutuhan cetak massal.',
                'Cheapest price brochures for mass printing needs.',
                '<ul><li>Bahan standar bekualitas dan murah</li><li>Harga sangat ekonomis</li><li>Cocok untuk kebutuhan promosi massal</li></ul>',
                '<ul><li>Cheap standard materials</li><li>Cheapest price</li><li>Suitable for mass promotion needs</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'X Banner', 'X Banners',
                'Banner dengan penyangga berbentuk X, tersedia dalam berbagai varian bahan dan ukuran.',
                'Banners with X-shaped cantilever, available in various variants of materials and sizes.',
                '<ul><li>Menggunakan teknik tempel manual</li><li>Menggunakan stiker</li><li> Tersedia dalam pilihan laminasi Doff dan Glossy</li><li>Pilihan tripod banner yang ekonomis</li></ul>',
                '<ul><li>Made with manual techniques by patching sticker to a polyfoam</li><li>Available in choices of Doff and Glossy lamination</li><li>Budget-friendly</li></ul>',
            ],
            [
                'Y Banner', 'Y Banners',
                'Banner dengan penyangga berbentuk Y, tersedia dalam berbagai varian bahan dan ukuran.',
                'Banners with Y-shaped cantilever, available in various variants of materials and sizes.',
                '<ul><li>Menggunakan teknik tempel manual</li><li>Menggunakan stiker</li><li> Tersedia dalam pilihan laminasi Doff dan Glossy</li><li>Pilihan tripod banner yang ekonomis</li></ul>',
                '<ul><li>Made with manual techniques by patching sticker to a polyfoam</li><li>Available in choices of Doff and Glossy lamination</li><li>Budget-friendly</li></ul>',
            ],
            [
                'Roll Up Banner', 'Roll Up Banners',
                'Banner roll up standar yang penggunaannya ditarik dari bawah ke atas pada bagian headernya.',
                'Standard roll up banners which is pulled from the bottom up in the header.',
                '<ul><li>Menggunakan teknik tempel manual</li><li>Menggunakan stiker</li><li> Tersedia dalam pilihan laminasi Doff dan Glossy</li><li>Pilihan tripod banner yang ekonomis</li></ul>',
                '<ul><li>Made with manual techniques by patching sticker to a polyfoam</li><li>Available in choices of Doff and Glossy lamination</li><li>Budget-friendly</li></ul>',
            ],
            [
                'Big Roll Up Banner', 'Big Roll Up Banners',
                'Banner roll up besar yang penggunaannya ditarik dari bawah ke atas pada bagian headernya.',
                'Large roll up banners which is pulled from the bottom up in the header.',
                '<ul><li>Menggunakan teknik cetak digital</li><li>Tidak menggunakan stiker</li><li>Tidak perlu dilaminasi</li><li>Memancarkan warna dengan lebih baik</li><li>Pilihan tripod banner yang lebih mewah</li></ul>',
                '<ul><li>Made with digital printing techniques</li><li>Non-laminated</li><li>Radiate colors beautifully</li><li>More luxurious choice of tripod banners</li></ul>',
            ],
            [
                'Tripod Banner Standar', 'Standard Tripod Banners',
                'Tripod banner harga ekonomis berbahan dasar foam board dan stiker vinil dengan teknik tempel manual.',
                'Economic price tripod banners made from foam board and vinyl stickers with manual patch techniques.',
                '<ul><li>Menggunakan teknik tempel manual</li><li>Menggunakan stiker</li><li> Tersedia dalam pilihan laminasi Doff dan Glossy</li><li>Pilihan tripod banner yang ekonomis</li></ul>',
                '<ul><li>Made with manual techniques by patching sticker to a polyfoam</li><li>Available in choices of Doff and Glossy lamination</li><li>Budget-friendly</li></ul>',
            ],
            [
                'Tripod Banner Premium', 'Premium Tripod Banners',
                'Tripod banner premium berbahan dasar foam board dengan teknik cetak digital.',
                'Premium tripod banners made from foam board with digital printing techniques.',
                '<ul><li>Menggunakan teknik cetak digital</li><li>Tidak menggunakan stiker</li><li>Tidak perlu dilaminasi</li><li>Memancarkan warna dengan lebih baik</li><li>Pilihan tripod banner yang lebih mewah</li></ul>',
                '<ul><li>Made with digital printing techniques</li><li>Non-laminated</li><li>Radiate colors beautifully</li><li>More luxurious choice of tripod banners</li></ul>',
            ],
            [
                'Spanduk Indoor Standar', 'Standard Indoor Banners',
                'Spanduk harga ekonomis untuk kebutuhan di dalam ruangan dengan bahan berkualitas.',
                'Economic price banners for indoor needs with a high-quality material.',
                '<ul><li>Menggunakan tinta Eco Solvent yang ramah lingkungan</li><li>Cocok untuk pilihan spanduk indoor yang ekonomis</li></ul>',
                '<ul><li>Printed with environmental-friendly Eco Solvent ink</li><li>Budget-friendly</li></ul>',
            ],
            [
                'Spanduk Indoor Premium', 'Premium Indoor Banners',
                'Spanduk premium untuk kebutuhan di dalam ruangan dengan bahan dan finishing yang lebih kuat.',
                'Premium banners for indoor needs with a stronger materials and finishing.',
                '<ul><li>Menggunakan tinta UV yang tahan lama</li><li>Cocok untuk tampilan mewah spanduk indoor</li></ul>',
                '<ul><li>Printed with long-lasting UV ink</li><li>Suitable for luxurious indoor banner look</li></ul>',
            ],
            [
                'Spanduk Outdoor Standar', 'Standard Outdoor Banners',
                'Spanduk harga ekonomis untuk kebutuhan di luar ruangan dengan bahan berkualitas.',
                'Economic price banners for outdoor needs with a high-quality material.',
                '<ul><li>Menggunakan tinta Eco Solvent yang ramah lingkungan</li><li>Cocok untuk pilihan spanduk outdoor yang ekonomis</li></ul>',
                '<ul><li>Printed with environmental-friendly Eco Solvent ink</li><li>Budget-friendly</li></ul>',
            ],
            [
                'Spanduk Outdoor Premium', 'Premium Outdoor Banners',
                'Spanduk premium untuk kebutuhan di luar ruangan dengan bahan dan finishing yang lebih kuat.',
                'Premium banners for outdoor needs with a stronger materials and finishing.',
                '<ul><li>Menggunakan tinta UV yang tahan lama</li><li>Cocok untuk tampilan mewah spanduk outdoor</li></ul>',
                '<ul><li>Printed with long-lasting UV ink</li><li>Suitable for more luxurious outdoor banner look</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Booklet Standar', 'Standard Booklets',
                'Booklet ekonomis dengan bahan berkualitas.',
                'Economic booklets with a high-quality material.',
                '<ul><li>Bahan Art Carton berkualitas</li><li>Tersedia dalam pilihan laminasi Doff, Glossy, dan non-laminasi</li><li>Harga ekonomis</li></ul>',
                '<ul><li>High-quality Art Carton materials</li><li>Available in choices of Doff, Glossy, and non-laminated lamination</li><li>Budget-friendly</li></ul>',
            ],
            [
                'Booklet Premium', 'Premium Booklets',
                'Booklet premium dengan bahan yang lebih mewah.',
                'Premium booklets with a fancier materials.',
                '<ul><li>Bahan premium untuk tampilan lebih mewah</li><li>Tanpa laminasi</li></ul>',
                '<ul><li>Made from premium materials for more exclusive look</li><li>Non-laminated</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Stiker Label Bulat', 'Round Label Stickers',
                'Stiker label berbentuk bulat dengan bahan berkualitas.',
                'Rounded label stickers with a high-quality materials.',
                '<ul><li>Berbentuk lingkaran</li><li>Tersedia dalam ukuran custom</li><li>Non-laminasi</li></ul>',
                '<ul><li>Cut in a circle shape</li><li>Available in custom sizes</li><li>Non-laminated/li></ul>',
            ],
            [
                'Stiker Label Toples', 'Jar Label Stickers',
                'Stiker label untuk toples dengan bahan berkualitas.',
                'Label stickers for jars with a high-quality materials.',
                '<ul><li>Berbentuk persegi</li><li>Tersedia dalam ukuran custom</li><li>Non-laminasi</li><li>Cocok untuk label toples</li></ul>',
                '<ul><li>Cut in a square or rectangular shape</li><li>Available in custom sizes</li><li>Non-laminated</li>Suitable for jar labels</ul>',
            ],
            [
                'Stiker Decal', 'Decal Stickers',
                'Stiker vinil berkualitas yang dicetak dengan metode decal.',
                'High-quality vinyl stickers that are printed by the decal method.',
                '<ul><li>Tersedia dalam pilihan bahan vinyl atau transparan</li><li>Dapat custom bentuk pemotongan</li><li>Dicetak menggunakan tinta UV</li><li>Non-laminasi</li></ul>',
                '<ul><li>High-quality Vinyl/transparent stickers</li><li>Cut in custom shape</li><li>APrinted with UV ink</li><li>Non-laminated</li></ul>',
            ],
            [
                'Stiker Label Botol', 'Bottle Label Stickers',
                'Stiker label untuk botol minuman dengan bahan berkualitas.',
                'Label stickers for beverage bottles with a high-quality materials.',
                '<ul><li>Tersedia dalam pilihan bahan vinyl dan vinyl transparan</li><li>Tersedia pilihan cutting Kiss Cut dan Die Cut</li><li>Non-laminasi</li></ul>',
                '<ul><li>High-quality vinyl/transparent vinyl materials</li><li>Available in choices of Kiss Cut and Die Cut cutting</li><li>Non-laminated</li></ul>',
            ],
            [
                'Stiker Label Lunch Box', 'Lunch Box Label Stickers',
                'Stiker label untuk lunch box dengan bahan berkualitas.',
                'Label stickers for lunch boxes with a high-quality materials.',
                '<ul><li>Tersedia dalam pilihan bahan chromo dan vinyl</li><li>Tersedia pilihan cutting Kiss Cut dan Die Cut</li><li>Non-laminasi</li></ul>',
                '<ul><li>High-quality Chromo/vinyl materials</li><li>Available choices of  Kiss Cut dan Die Cut cutting</li><li>Non-laminated</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Sertifikat Standar', 'Standard Certificates',
                'Sertifikat ekonomis dengan bahan berkualitas.',
                'Economic certificates with a high-quality material.',
                '<ul><li>Menggunakan bahan berkualitas yang lebih licin</li><li>Pilihan sertifikat dengan harga lebih ekonomis</li></ul>',
                '<ul><li>Made from high-quality sleek materials</li><li>Budget-friendly certificate choice</li></ul>',
            ],
            [
                'Sertifikat Premium', 'Premium Certificates',
                'Sertifikat premium dengan bahan yang lebih mewah.',
                'Premium certificates with a fancier materials.',
                '<ul><li>Menggunakan bahan lebih bertekstur</li><li>Kertas bisa langsung ditandatangan</li><li>Pilihan sertifikat dengan tampilan lebih eksklusif</li></ul>',
                '<ul><li>Made from high-quality, fancy, and textured materials</li><li>Paper can be signed directly</li><li>Premium design for luxurious look</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Majalah Standar', 'Standard Magazines',
                'Majalah ekonomis dengan bahan berkualitas.',
                'Economic magazines with a high-quality material.',
                '<ul><li>Bahan standar berkualitas</li><li>Tersedia dalam pilihan laminasi Doff dan Glossy</li><li>Tersedia pilihan jumlah halaman sebanyak 64-80 lembar</li></ul>',
                '<ul><li>Made from high-quality standard materials</li><li>Available in choices of Doff and Glossy lamination</li><li>Available in 64-80 pages selections</li></ul>',
            ],
            [
                'Majalah Premium', 'Premium Magazines',
                'Majalah premium dengan bahan yang lebih mewah.',
                'Premium magazines with a fancier materials.',
                '<ul><li>Bahan premium untuk tampilan lebih mewah</li><li>Non-laminasi</li><li>Tersedia pilihan jumlah halaman sebanyak 52-68 lembar</li></ul>',
                '<ul><li>Made from premium materials for luxurious look</li><li>Non-laminated</li><li>Available in 52-68 pages selections</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Company Profile Standar', 'Standard Company Profiles',
                'Company profile ekonomis dengan bahan berkualitas.',
                'Economic company profiles with a high-quality material.',
                '<ul><li>Bahan Art Carton/Matte Paper berkualitas</li><li>Tersedia dalam pilihan aminasi Doff, Glossy, dan non-laminasi</li><li>Harga ekonomis</li></ul>',
                '<ul><li>Made from Art Carton/Matte Paper materials</li><li>Available in choices of Doff, Glossy, and non-laminated lamination</li><li>Budget-friendly</li></ul>',
            ],
            [
                'Company Profile Premium', 'Premium Company Profiles',
                'Company profile premium dengan bahan yang lebih mewah.',
                'Premium company profiles with a fancier materials.',
                '<ul><li>Bahan istimewa dan mewah</li><li>Tanpa laminasi</li></ul>',
                '<ul><li>Made from fancy snd special materials for more exclusive look</li><li>Non-laminated</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Kalender Meja Standar', 'Standard Desk Calendars',
                'Kalender meja harga ekonomis, tersedia dalam bahan yellow board.',
                'Economic price desk calendars, available in yellow board materials.',
                '<ul><li>Terbuat dari bahan Yellow Board</li><li>Bahan dapat dilaminasi</li><li>Harga ekonomis dan berkualitas tinggi</li></ul>',
                '<ul><li>Made from Yellow Board materials</li><li>Material can be laminated</li><li>High-quality and budget-friendly</li></ul>',
            ],
            [
                'Kalender Poster', 'Poster Calendars',
                'Kalender berupa poster yang lebih praktis, tersedia dalam berbagai varian bahan art carton.',
                'Calendar in the form of a poster that is more practical, available in various variants of art carton.',
                '<ul><li>Berbentuk lembaran</li><li>Tersedia pilihan finishing jepit kaleng dan mata itik</li></ul>',
                '<ul><li>Poster-shaped calendar</li><li>Available in various finishing selections</li></ul>',
            ],
            [
                'Kalender Dinding', 'Wall Calendars',
                'Kalender yang dipasang di dinding dengan bahan yang lebih tipis berkualitas tinggi.',
                'Wall-mounted calendars with a fancier materials.',
                '<ul><li>Terbuat dari bahan lebih tipis berkualitas</li><li>Jumlah halaman lebih banyak</li><li>Tersedia pilihan finishing spiral</li></ul>',
                '<ul><li>Wall-mounted calendar</li><li>Available in more number of pages</li><li>Available in spiral finishing selections</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Voucher Satuan', 'Single Vouchers',
                'Voucher untuk kebutuhan promosi jangka pendek dan terbatas dengan bahan berkualitas.',
                'Vouchers for short-term and limited promotional needs with a high-quality materials.',
                '<ul><li>Berbentuk satuan per lembar</li><li>Tersedia dalam bahan yang tebal berkualitas tinggi</li><li>Kertas dapat ditulis secara manual</li><li>Cocok untuk promosi jangka pendek</li></ul>',
                '<ul><li>Unit-shaped (per sheet)</li><li>Available in high-quality thick materials</li><li>Paper can be written manually</li><li>Suitable for short-term promotions</li></ul>',
            ],
            [
                'Voucher Buku', 'Book Vouchers',
                'Voucher untuk kebutuhan promosi jangka panjang dengan bahan berkualitas.',
                'Vouchers for long-term promotional needs with a high-quality materials.',
                '<ul><li>Berbentuk buku berisi 100 lembar voucher satuan</li><li>Dapat diperforasi dan ditambahkan numerator</li><li>Kertas tidak dapat ditulis secara manual</li><li>Cocok untuk promosi jangka panjang</li></ul>',
                '<ul><li>Book-shaped, contains 100 pcs single vouchers</li><li>Can be perforated and added numerator</li><li>Paper cannot be written manually</li><li>Suitable for long-term promotions</li></ul>',
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
                'Economic price tote bags with a high-quality and eco-friendly materials.',
                '<ul><li>Tote Bag ekonomis yang terbuat dari bahan blacu berkualitas dan ramah lingkungan.</li></ul>',
                '<ul><li>Budget-friendly and high-quality Tote Bag made from eco-friendly Calico fabrics.</li></ul>',
            ],
            [
                'Tote Bag Premium', 'Premium Tote Bags',
                'Tote bag premium berbahan dasar kanvas berkualitas.',
                'Premium tote bags made from high-quality canvas.',
                '<ul><li>Tote Bag eksklusif dengan bahan kanvas berkualitas tinggi.</li></ul>',
                '<ul><li>Exclusive Tote Bag made from high-quality canvas materials.</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Tas Goodie Standar', 'Standard Goodie Bags',
                'Tas goodie ekonomis berbahan dasar spunbound dengan teknik cetak sablon.',
                'Economic goodie bags made from spunbound with screen printing techniques.',
                '<ul><li>Tersedia pilihan 1, 2, dan 3 warna cetak</li><li>Tersedia dalam 4 warna dasar pilihan</li><li>Menggunakan teknik cetak sablon</li></ul>',
                '<ul><li>Available in choices of 1, 2, and 3 print colors</li><li>Available in 4 basic colors</li><li>Made with screen printing techniques</li></ul>',
            ],
            [
                'Tas Goodie Premium', 'Premium Goodie Bags',
                'Tas goodie premium berbahan dasar spunbound dengan teknik cetak digital.',
                'Premium goodie bags made from spunbound with digital printing techniques.',
                '<ul><li>Warna cetak full color</li><li>Tersedia lebih banyak pilihan warna dasar</li><li>Menggunakan teknik cetak digital</li></ul>',
                '<ul><li>Premium full color print colors</li><li>Available more material color selections</li><li>Made with digital printing techniques</li></ul>',
            ],
        ];

        $clust[] = [
            [
                'Kaos Polo Bordir', 'Embroidery Polo Shirts',
                'Kaos polo berbahan dasar katun dengan teknik cetak bordir.',
                'Cotton-based polo shirt with embroidery printing techniques.',
                '<ul><li>Menggunakan teknik cetak bordir</li><li>Cocok untuk desain simpel seperti logo</li></ul>',
                '<ul><li>Made with embroidery printing techniques</li><li>Suitable for simple design, i.e., logo</li></ul>',
            ],
            [
                'Kaos Polo PolyFlex', 'PolyFlex Polo Shirts',
                'Kaos polo berbahan dasar katun dengan teknik cetak sablon polyflex.',
                'Cotton-based polo shirt with polyflex screen printing techniques.',
                '<ul><li>Menggunakan teknik cetak sablon polyflex</li><li>Cocok untuk desain yang lebih kompleks dan full color</li></ul>',
                '<ul><li>Made with polyflex screen printing techniques</li><li>Suitable for full color and complex design</li></ul>',
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
                            'id' => $data[4],
                            'en' => $data[5],
                        ],
                    ]);
                }
            }
        }
    }
}
