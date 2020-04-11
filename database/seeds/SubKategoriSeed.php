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
            [
                'Kartu Nama', 'Business Cards',
                'Dapatkan perhatian pelanggan Anda mulai dari mencetak kartu bisnis profesional Anda, tersedia dalam berbagai varian bahan dan laminasi.',
                'Get your customer\'s attention starts from printing your professional business cards, available in various material and laminate variants.'
            ],
            [
                'Kartu Undangan', 'Invitation Cards',
                'Kejutkan tamu Anda dengan mencetak kartu undangan berkualitas tinggi yang memukau.',
                'Surprise your guests by printing a stunning high-quality invitation card.'
            ],
            [
                'Kartu Terima Kasih', 'Gratitude Cards',
                'Tingkatkan dampak terima kasih Anda dengan mencetak dan memberikan kartu terima kasih berkualitas tinggi yang memukau.',
                'Enhance your gratitude impact by printing and giving a stunning high-quality gratitude card.'
            ],
            [
                'Kartu Identitas', 'ID Cards',
                'Tunjukkan profesionalisme anggota tim Anda dengan mencetak kartu identitas berkualitas tinggi yang memukau.',
                'Show your team members professionalism by printing a stunning high-quality identity cards.'
            ],
            [
                'Kartu Ucapan', 'Greeting Cards',
                'Buat klien atau pelanggan Anda merasa dihargai dengan mencetak dan memberikannya kartu ucapan berkualitas tinggi yang memukau.',
                'Make your clients or customers feel appreciated by printing and giving them high-quality and stunning greeting cards.'
            ],
            [
                'Kartu Stamp', 'Stamp Cards',
                'Buat pelanggan Anda merasa dihargai atas kesetiaanya dengan mencetak dan memberikannya kartu stamp berkualitas tinggi yang memukau.',
                'Make your customers feel appreciated for their loyalty by printing and giving them high-quality and stunning stamp cards.'
            ],
            [
                'Kartu Pos', 'Postcards',
                'Bagikan kenangan Anda di suatu tempat dengan mencetak dan memberikan kartu pos yang berkualitas tinggi yang memukau.',
                'Share your memories somewhere by printing and giving a stunning high-quality postcard.'
            ],
            [
                'Kartu Elektronik', 'Electronic Cards',
                'Buat kartu elektronik Anda terlihat memukau dengan mencetak kartu elektronik kustom berkualitas tinggi, tersedia dengan pilihan jumlah saldo.',
                'Make your electronic cards look stunning by printing a high-quality custom electronic cards, available with the balance amount choice.'
            ]
        ];

        $sub[] = [
            [
                'Kop Surat', 'Letterheads',
                'Tunjukkan profesionalisme Anda bahkan dalam detail kecil dengan mencetak kop surat berkualitas tinggi yang memukau.',
                'Show your professionalism even in a small details by printing a stunning high-quality letterhead.'
            ],
            [
                'Amplop', 'Envelopes',
                'Tunjukkan profesionalisme perusahaan Anda dengan mencetak amplop kustom berkualitas tinggi yang memukau.',
                'Show your company professionalism by printing a stunning high-quality custom envelopes.'
            ],
            [
                'Lanyard', 'Lanyards',
                'Tingkatkan profesionalisme anggota tim Anda dengan mencetak lanyard sebagai pasangan kartu identitas yang berkualitas tinggi yang memukau.',
                'Enhance the professionalism of your team members by printing lanyards as a stunning high-quality identity card pair.'
            ],
            [
                'Map Folder', 'Map Folders',
                'Cetak map folder kustom berkualitas tinggi yang memukau, lalu berikan dokumen Anda bersamanya.',
                'Print a stunning high-quality custom map folder, then provide your document along with it.'
            ],
            [
                'Nota NCR', 'NCR Notes',
                'Cetak nota NCR berkualitas tinggi untuk kebutuhan administrasi perusahaan Anda.',
                'Print a high-quality custom NCR notes for your company\'s administrative needs.'
            ],
            [
                'Cetak Dokumen', 'Document Printing',
                'Cetak dokumen Anda dengan beberapa pilihan bahan, ukuran, dan jilid sesuai kebutuhan Anda.',
                'Print your document with several material, size and binding options according to your needs.'
            ]
        ];

        $sub[] = [
            [
                'Paper Cup', 'Paper Cups',
                'Lengkapi kebutuhan bisnis F&B Anda dengan mencetak paper cup berkualitas tinggi yang memukau.',
                'Complete your F&B business needs by printing a stunning high-quality paper cups.'
            ],
            [
                'Shopping Paper Bag', 'Shopping Paper Bags',
                'Cetak shopping paper bag berkualitas tinggi yang memukau, lalu kemas produk Anda ke dalamnya.',
                'Print a stunning high-quality shopping paper bags, then pack your products into them.'
            ],
            [
                'Lakban Custom', 'Custom Duct Tapes',
                'Buat kemasan produk Anda lebih memukau dengan mencetak dan merekatkannya dengan lakban kustom berkualitas tinggi.',
                'Make your product packaging more stunning by printing and glue it on with a high-quality custom duct tape.'
            ],
            [
                'Gelas Plastik', 'Plastic Cups',
                'Lengkapi kebutuhan bisnis F&B Anda dengan mencetak gelas plastik berkualitas tinggi yang memukau.',
                'Complete your F&B business needs by printing a stunning high-quality plastic cups.'
            ],
            [
                'Snack Box', 'Snack Boxes',
                'Cetak snack box berkualitas tinggi yang memukau, lalu kemas produk makanan Anda ke dalamnya.',
                'Print a stunning high-quality snack boxes, then pack your makanan products into them.'
            ],
            [
                'Label Harga', 'Price Tags',
                'Berikan informasi harga produk Anda dengan mencetak label harga berkualitas tinggi yang memukau.',
                'Provide your product price information by printing a stunning high-quality price tags.'
            ],
            [
                'Lunch Box', 'Lunch Boxes',
                'Cetak lunch box berkualitas tinggi yang memukau, lalu kemas produk makanan Anda ke dalamnya.',
                'Print a stunning high-quality lunch boxes, then pack your food products into them.'
            ],
            [
                'Kardus Box', 'Cardboard Boxes',
                'Cetak kardus box kustom berkualitas tinggi yang memukau, lalu kemas produk Anda ke dalamnya.',
                'Print a stunning high-quality custom cardboard boxes, then pack your products into them.'
            ],
            [
                'Paper Bag Makanan', 'Food Paper Bags',
                'Cetak paper bag makanan berkualitas tinggi yang memukau, lalu sajikan produk makanan Anda di dalamnya.',
                'Print a stunning high-quality food paper bags, then serve your food products in them.'
            ],
            [
                'Kardus Box Duplex', 'Duplex Cardboard Boxes',
                'Cetak kardus box duplex kustom berkualitas tinggi yang memukau, lalu kemas produk Anda ke dalamnya.',
                'Print a stunning high-quality custom duplex cardboard boxes, then pack your products into them.'
            ],
            [
                'Food Wrapping Paper', 'Food Wrapping Papers',
                'Cetak food wrapping paper berkualitas tinggi yang memukau, lalu sajikan produk makanan Anda di atasnya.',
                'Print a stunning high-quality food wrapping papers, then serve your food products on them.'
            ],
            [
                'Placemat', 'Placemats',
                'Tingkatkan branding restoran Anda dengan mencetak placemat berkualitas tinggi yang memukau.',
                'Enhance your restaurant\'s branding by printing a stunning high-quality placemats.'
            ],
            [
                'Sealer', 'Sealers',
                'Tingkatkan branding bisnis F&B Anda dengan mencetak beverage sealer atau plastik pembungkus minuman berkualitas tinggi yang memukau.',
                'Enhance your F&B business branding by printing a stunning high-quality beverage sealers or plastic wrappers.'
            ]
        ];

        $sub[] = [
            [
                'Flyer', 'Flyers',
                'Lengkapi kebutuhan promosi bisnis Anda dengan mencetak dan menyebarkan flyer berkualitas tinggi yang memukau.',
                'Complete your business promotion needs by printing and spreading a stunning high-quality flyers.'
            ],
            [
                'Poster', 'Posters',
                'Bagikan informasi atau lengkapi kebutuhan promosi Anda dengan mencetak poster berkualitas tinggi yang memukau.',
                'Share information or complete your promotion needs by printing a stunning high-quality posters.'
            ],
            [
                'Tent Card', 'Tent Cards',
                'Bagikan menu andalan atau tingkatkan branding restoran Anda dengan mencetak tent card berkualitas tinggi yang memukau.',
                'Share featured menu or enhance your restaurant\'s branding by printing a stunning high-quality tent cards.'
            ],
            [
                'Brosur', 'Brochures',
                'Perkenalkan produk atau jasa Anda secara detail dengan mencetak dan membagikan brosus berkualitas tinggi yang memukau.',
                'Introduce your product or service in detail by printing and sharing a stunning high-quality brochures.'
            ],
            [
                'Banner', 'Banners',
                'Bagikan informasi atau lengkapi kebutuhan promosi Anda dengan mencetak banner berkualitas tinggi yang memukau.',
                'Share information or complete your promotion needs by printing a stunning high-quality banners.'
            ],
            [
                'Booklet', 'Booklets',
                'Lengkapi kebutuhan promosi bisnis Anda dengan mencetak dan membagikan booklet berkualitas tinggi yang memukau.',
                'Complete your business promotion needs by printing and sharing a stunning high-quality booklets.'
            ],
            [
                'Stiker', 'Stickers',
                'Tingkatkan branding bisnis Anda dengan mencetak stiker berkualitas tinggi yang memukau.',
                'Enhance your business branding by printing a stunning high-quality stickers.'
            ],
            [
                'Sertifikat', 'Certificates',
                'Hargai pemenang maupun peserta dengan mencetak dan memberikannya sertifikat berkualitas tinggi yang memukau.',
                'Appreciate the winners and participants by printing and giving them a stunning high-quality certificates.'
            ],
            [
                'Majalah', 'Magazines',
                'Tingkatkan minat pembaca dengan mencetak dan menyajikannya majalah berkualitas tinggi yang memukau.',
                'Enhance the readers\' interest by printing and giving them a stunning high-quality magazines.'
            ],
            [
                'Company Profile', 'Company Profiles',
                'Bagikan informasi perusahaan Anda dengan mencetak dan menyajikannya ke dalam company profile berkualitas tinggi yang memukau.',
                'Share your company information by printing and presenting it in a stunning high-quality company profiles.'
            ],
            [
                'Kalender', 'Calendars',
                'Sambut tahun baru dengan mencetak dan menyajikan kalender berkualitas tinggi yang memukau.',
                'Welcome the new year by printing and presenting a stunning high-quality calendar.'
            ],
            [
                'Voucher', 'Vouchers',
                'Lengkapi kebutuhan promosi Anda dengan mencetak dan membagikan voucher berkualitas tinggi yang memukau.',
                'Complete your promotion needs by printing and sharing a stunning high-quality vouchers.'
            ],
            [
                'Wobbler', 'Wobblers',
                'Dapatkan perhatian lebih dari konsumen akan produk Anda dengan mencetak wobbler berkualitas tinggi yang memukau.',
                'Get more attention from consumers about your product by printing a stunning high-quality wobblers.'
            ],
            [
                'Backdrop Portable', 'Portable Backdrops',
                'Meriahkan event Anda dengan mencetak dan menyediakan backdrop portable berkualitas tinggi yang memukau.',
                'Enliven your event by printing and providing a stunning high-quality portable backdrops.'
            ],
            [
                'Meja Promosi', 'Promotion Tables',
                'Lengkapi kebutuhan promosi Anda dalam suatu event dengan mencetak dan menyediakan meja promosi berkualitas tinggi yang memukau.',
                'Complete your promotion needs at the event by printing and providing a stunning high-quality promotion tables.'
            ],
            [
                'Pop up Counter', 'Pop Up Counters',
                'Promosikan produk Anda dengan mencetak dan menyajikannya melalui pop up counter berkualitas tinggi yang memukau.',
                'Promote your product by printing and presenting it with a stunning high-quality pop up counters.'
            ]
        ];

        /*$sub[] = [
            ['Kartu Undangan', 'Invitation Cards'],
            ['Kartu Terima Kasih', 'Gratitude Cards'],
            ['Kartu Identitas', 'ID Cards'],
            ['Kartu Ucapan', 'Greeting Cards'],
            ['Kartu Stamp', 'Stamp Cards'],
            ['Kartu Pos', 'Postcards'],
            ['Kartu Elektronik', 'Electronic Cards']
        ];*/

        $sub[] = [
            [
                'Tote Bag', 'Tote Bags',
                'Cetak tote bag yang ramah lingkungan, berkualitas tinggi, dan memukau sesuai kebutuhan Anda.',
                'Print eco-friendly, high-quality, and stunning tote bags according to your needs.'
            ],
            [
                'Tas Goodie', 'Goodie Bags',
                'Cetak tas goodie yang ramah lingkungan, berkualitas tinggi, dan memukau sesuai kebutuhan Anda.',
                'Print eco-friendly, high-quality, and stunning goodie bags according to your needs.'
            ],
            [
                'Kaos Polo', 'Polo Shirts',
                'Lengkapi kebutuhan branding bisnis Anda dengan mencetak dan menggunakan kaos polo kustom berkualitas tinggi yang memukau.',
                'Complete your business branding needs by printing and using high-quality and stunning custom polo shirts.'
            ],
            [
                'T-Shirt', 'T-Shirts',
                'Lengkapi kebutuhan branding bisnis Anda dengan mencetak dan menggunakan kaos kustom berkualitas tinggi yang memukau.',
                'Complete your business branding needs by printing and using high-quality and stunning custom t-shirts.'
            ]
        ];

        for ($i = 0; $i < count($sub); $i++) {
            foreach ($sub[$i] as $item) {
                SubKategori::create([
                    'kategoris_id' => $i + 1,
                    'name' => [
                        'id' => $item[0],
                        'en' => $item[1],
                    ],
                    'permalink' => [
                        'id' => preg_replace("![^a-z0-9]+!i", "-", strtolower($item[0])),
                        'en' => preg_replace("![^a-z0-9]+!i", "-", strtolower($item[1])),
                    ],
                    'banner' => preg_replace("![^a-z0-9]+!i", "-", strtolower($item[1])) . '.jpg',
                    'caption' => [
                        'id' => $item[2],
                        'en' => $item[3],
                    ],
                    'guidelines' => preg_replace("![^a-z0-9]+!i", "-", strtolower($item[1])) . '.zip',
                ]);
            }
        }
    }
}
