<?php

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['Cotton Combed 30s', 'Cotton Combed 30s'],
            'description' => [
                'Bahan material dengan ketebalan 30s, sangat cocok dengan suhu tropis.',
                'Combed material with a thickness of 30s, single knit and very suitable in tropic temperature.'
            ]
        ],
        [
            'name' => ['Art Carton 260gsm', 'Art Carton 260gsm'],
            'description' => [
                'Tebal namun ekonomis. Permukaan mengkilap di kedua sisi dengan ketebalan 260gsm.',
                'Thick but vey economic, Glossy Surface on both sides with thickness 260gsm.'
            ],
        ],
        [
            'name' => ['Art Carton 310gsm', 'Art Carton 310gsm'],
            'description' => [
                'Tebal namun ekonomis. Permukaan mengkilap di kedua sisi dengan ketebalan 310gsm.',
                'Thick but vey economic, Glossy Surface on both sides with thickness 310gsm.'
            ],
        ],
        [
            'name' => ['Blues White (BW) 250gsm', 'Blues White (BW) 250gsm'],
            'description' => [
                'Kertas dengan permukaan halus, bertekstur, tidak mengkilap. Tidak bisa digunakan untuk warna block.',
                'Paper with a smooth, textured, non-glossy surface. Cannot be used for color blocks.'
            ],
        ],
        [
            'name' => ['Splendorgel Extra White 270gsm', 'Splendorgel Extra White 270gsm'],
            'description' => [
                'Kertas yang umum digunakan. Permukaan halus dan berwarna putih.',
                'Commonly used paper. The surface is smooth and white.'
            ],
        ],
        [
            'name' => ['Constellation Snow 240gsm', 'Constellation Snow 240gsm'],
            'description' => [
                'Kertas bertekstur dan bergaris halus.',
                'Textured and smooth-lined paper.'
            ],
        ],
        [
            'name' => ['Via Felt 298gsm', 'Via Felt 298gsm'],
            'description' => [
                'Kertas yang tebal dan bertekstur emboss.',
                'Thick, embossed paper.'
            ],
        ],
        [
            'name' => ['Via Linen Bright White 298gsm', 'Via Linen Bright White 298gsm'],
            'description' => [
                'Kertas bertekstur dengan garis halus dan berwarna dasar lebih putih.',
                'Textured paper with finer lines and a whiter base color.'
            ],
        ],
        [
            'name' => ['HVS 100gsm', 'HVS 100gsm'],
            'description' => [
                'Kertas HVS yang lebih tebal serta lebih kokoh.',
                'Thicker and sturdier HVS paper.'
            ],
        ],
        [
            'name' => ['HVS 80gsm', 'HVS 80gsm'],
            'description' => [
                'Kertas HVS yang umum digunakan untuk fotocopy. Ringan dan Multifungsi.',
                'HVS paper commonly used for photocopies. Light and Multifunctional.'
            ],
        ],
        [
            'name' => ['Kertas NCR', 'NCR Paper'],
            'description' => [
                'Kertas tembus warna tanpa karbon.',
                'Colorless translucent paper.'
            ],
        ],
        [
            'name' => ['Nilon Polyester', 'Polyester Nylon'],
            'description' => [
                'Tali kartu identitas dengan bahan mengkilap.',
                'Identity card strap with shiny material.'
            ],
        ],
        [
            'name' => ['PP 12 Oz / 360 ml', 'PP 12 Oz / 360 ml'],
            'description' => null
        ],
        [
            'name' => ['PP 16 Oz / 480 ml', 'PP 16 Oz / 480 ml'],
            'description' => null
        ],
        [
            'name' => ['PP 22 Oz / 660 ml', 'PP 22 Oz / 660 ml'],
            'description' => null
        ],
        [
            'name' => ['SPE 265', 'SPE 265'],
            'description' => null
        ],
        [
            'name' => ['Food Grade 350gsm', 'Food Grade 350gsm'],
            'description' => null
        ],
        [
            'name' => ['Ivory 300gsm', 'Ivory 300gsm'],
            'description' => [
                'Kokoh, berwarna putih susu dengan lapisan luar mengkilap dan bagian bawah agak kasar.',
                'Sturdy, milky white with a glossy outer layer and a somewhat rough bottom.'
            ],
        ],
        [
            'name' => ['Dupleks 350gsm', 'Duplex 350gsm'],
            'description' => [
                'Ekonomis, berwarna putih mengkilap dengan bagian bawah abu-abu.',
                'Economic, shiny white with a gray bottom.'
            ],
        ],
        [
            'name' => ['K150/M125/K125 B/F', 'K150/M125/K125 B/F'],
            'description' => null
        ],
        [
            'name' => ['WK150/M125/K125 B/F', 'WK150/M125/K125 B/F'],
            'description' => null
        ],
        [
            'name' => ['K125/M125 E/F + Duplex 250gsm', 'K125/M125 E/F + Duplex 250gsm'],
            'description' => null
        ],
        [
            'name' => ['Bopp', 'Bopp'],
            'description' => [
                'Terbuat dari plastik dan dilengkapi lem water-based acrylic sebagai perekat.',
                'Made of plastic and equipped with water-based acrylic glue as an adhesive.'
            ],
        ],
        [
            'name' => ['Brown Kraft 80gsm', 'Brown Kraft 80gsm'],
            'description' => null
        ],
        [
            'name' => ['MG 40gsm', 'MG 40gsm'],
            'description' => null
        ],
        [
            'name' => ['Matte Paper 120gsm', 'Matte Paper 120gsm'],
            'description' => [
                'Kertas dengan bahan yang halus dan tidak mengkilap dengan ketebalan 120gsm.',
                'Paper with a smooth and not shiny material with a thickness of 120gsm.'
            ],
        ],
        [
            'name' => ['Matte Paper 150gsm', 'Matte Paper 150gsm'],
            'description' => [
                'Kertas dengan bahan yang halus dan tidak mengkilap dengan ketebalan 150gsm.',
                'Paper with a smooth and not shiny material with a thickness of 150gsm.'
            ],
        ],
        [
            'name' => ['Stiker Chromo ', 'Chromo Sticker'],
            'description' => null
        ],
        [
            'name' => ['Stiker Transparan', 'Transparent Sticker'],
            'description' => null
        ],
        [
            'name' => ['Stiker Vinyl Glossy', 'Glossy Vinyl Sticker'],
            'description' => null
        ],
        [
            'name' => ['Stiker Vinyl Matte', 'Matte Vinyl Sticker'],
            'description' => null
        ],
        [
            'name' => ['Albatros (Laminasi)', 'Albatros (Laminated)'],
            'description' => [
                'Bahan Material yang memiliki permukaan halus, berkilau dan tipis',
                'Shiny material, smooth and thin surface.'
            ],
        ],
        [
            'name' => ['Flexy China Indoor', 'Flexy China Indoor'],
            'description' => [
                'Bahan ekonomis, bertekstur dan lebih tipis.',
                'Economic, textured and thinner material.'
            ],
        ],
        [
            'name' => ['Flexy Korea Indoor', 'Flexy Korea Indoor'],
            'description' => [
                'Kualitas bagus, bahan halus dan tebal. Cocok untuk penggunaaan outdoor maupun indoor.',
                'Good quality, smooth and thick material. Suitable for outdoor and indoor use.'
            ],
        ],
        [
            'name' => ['Kanvas', 'Canvas'],
            'description' => [
                'Bahan terbuat dari kapas atau linen, awet dan tahan dalam segala kondisi.',
                'Material made of cotton or linen, durable and resistant in all conditions.'
            ],
        ],
        [
            'name' => ['Flexy China UV 280', 'Flexy China UV 280'],
            'description' => [
                'Bahan ekonomis, bertekstur dan lebih tipis. Dicetak menggunakan tinta UV.',
                'Economic, textured and thinner material. Printed using UV ink.'
            ],
        ],
        [
            'name' => ['Flexy China UV 340', 'Flexy China UV 340'],
            'description' => [
                'Sama dengan Flexy China 280gsm namun lebih tebal. Dicetak menggunakan tinta UV.',
                'Same with Flexy China 280gsm but thicker. Printed using UV ink.'
            ],
        ],
        [
            'name' => ['Flexy Korea UV 440', 'Flexy Korea UV 440'],
            'description' => [
                'Kualitas bagus, halus & tebal yang dicetak dengan tinta UV. Cocok di pengunaan indoor & outdoor.',
                'Good quality, smooth & thick printed with UV ink. Suitable for indoor & outdoor use.'
            ],
        ],
        [
            'name' => ['PVC', 'PVC'],
            'description' => null
        ],
        [
            'name' => ['Blacu', 'Calico'],
            'description' => [
                'Bahan tote bag ramah lingkungan yang ekonomis. Tidak bisa digunakan untuk warna blok.',
                'Economic eco-friendly tote bag. Cannot be used for color blocks.'
            ],
        ],
        [
            'name' => ['Spunbound 100gsm', 'Spunbound 100gsm'],
            'description' => [
                'Kain dengan tekstur kaku, halus, dan berserat rapat. Umum digunakan sebagai bahan goodie bag.',
                'Fabric with a rigid texture, smooth, and tight fibers. Commonly used as a goodie bag.'
            ],
        ],
        [
            'name' => ['Lacoste Cotton Pique', 'Lacoste Cotton Pique'],
            'description' => [
                'bahan yang lembut sehingga lebih nyaman saat digunakan',
                'soft material so it is more comfortable when used'
            ],
        ],
        [
            'name' => ['Plastik Mika', 'Mica Plastic'],
            'description' => [
                'Plastik bening dan tebal untuk sampul.',
                'Clear and thick plastic for the cover.'
            ],
        ],
        [
            'name' => ['Kertas Buffalo Merah', 'Red Buffalo Paper'],
            'description' => [
                'Kertas bertekstur kasar seperti serat kayu dengan warna merah.',
                'Coarse textured paper like wood grain in red.'
            ],
        ],
        [
            'name' => ['Kertas Buffalo Hijau', 'Green Buffalo Paper'],
            'description' => [
                'Kertas bertekstur kasar seperti serat kayu dengan warna hijau.',
                'Coarse textured paper like wood grain in green.'
            ],
        ],
        [
            'name' => ['Kertas Buffalo Biru', 'Blue Buffalo Paper'],
            'description' => [
                'Kertas bertekstur kasar seperti serat kayu dengan warna biru.',
                'Coarse textured paper like wood grain in blue.'
            ],
        ],
        [
            'name' => ['Fancy Constellation Snow 240gsm', 'Fancy Constellation Snow 240gsm'],
            'description' => [
                'Kertas bertekstur garis halus.',
                'Textured paper with fine lines.'
            ],
        ],
        [
            'name' => ['Fancy EggShell 270gsm', 'Fancy EggShell 270gsm'],
            'description' => [
                'Kertas bertekstur kasar.',
                'Coarse textured paper.'
            ],
        ],
        [
            'name' => ['Concorde 90gsm', 'Concorde 90gsm'],
            'description' => [
                'Kertas bertekstur garis-garis halus.',
                'Textured paper fine lines.'
            ],
        ],
        [
            'name' => ['Everyday Smooth Bright White 270gsm', 'Everyday Smooth Bright White 270gsm'],
            'description' => [
                'Kertas bertekstur halus dan berwarna lebih putih dari Splendorgel.',
                'Paper has a fine texture and is whiter than Splendorgel.'
            ],
        ],
        [
            'name' => ['Via Linen Bright White 216gsm', 'Via Linen Bright White 216gsm'],
            'description' => [
                'Kertas bertekstur dengan garis halus dan berwarna dasar lebih putih.',
                'Textured paper with finer lines and a whiter base color.'
            ],
        ],
        [
            'name' => ['White Kraft 120gsm', 'White Kraft 120gsm'],
            'description' => null
        ],
        [
            'name' => ['Brown Craft 200gsm', 'Brown Craft 200gsm'],
            'description' => null
        ],
        [
            'name' => ['PET 14 Oz / 420 ml', 'PET 14 Oz / 420 ml'],
            'description' => null
        ],
        [
            'name' => ['PET 22 Oz / 660 ml', 'PET 22 Oz / 660 ml'],
            'description' => null
        ],
        [
            'name' => ['K125/M125X3/K125', 'K125/M125X3/K125'],
            'description' => null
        ],
        [
            'name' => ['WK150/M125X3/K125', 'WK150/M125X3/K125'],
            'description' => null
        ],
        [
            'name' => ['Samson Craft 50gsm Coated PE 12gsm', 'Samson Craft 50gsm Coated PE 12gsm'],
            'description' => null
        ],
        [
            'name' => ['Greaseproof 40gsm', 'Greaseproof 40gsm'],
            'description' => null
        ],
        [
            'name' => ['Greaseproof 50gsm', 'Greaseproof 50gsm'],
            'description' => null
        ],
        [
            'name' => ['K150/M125/K125 B/F + Duplex 250gsm', 'K150/M125/K125 B/F + Duplex 250gsm'],
            'description' => null
        ],
        [
            'name' => ['Foamboard + Stiker Vinyl', 'Foamboard + Vinyl Sticker'],
            'description' => null
        ],
        [
            'name' => ['Foamboard Direct Print', 'Direct Print Foamboard'],
            'description' => null
        ],
        [
            'name' => ['Flexy China 280gsm (Eco Solvent)', 'Flexy China 280gsm (Eco Solvent)'],
            'description' => [
                'Ekonomis, bertekstur, dan lebih tipis dengan ketebalan 280gsm.',
                'Economic, textured, and thinner with a thickness of 280gsm.'
            ],
        ],
        [
            'name' => ['Flexy China 340gsm (Eco Solvent)', 'Flexy China 340gsm (Eco Solvent)'],
            'description' => [
                'Ekonomis, bertekstur, dan lebih tebal dengan ketebalan 340gsm.',
                'Economic, textured, and thinner with a thickness of 340gsm.'
            ],
        ],
        [
            'name' => ['Flexy Korea 440gsm (Eco Solvent)', 'Flexy Korea 440gsm (Eco Solvent)'],
            'description' => [
                'Berkualitas, halus dan tebal. Bisa digunakan baik indoor maupun outdoor.',
                'Quality, smooth and thick. Can be used both indoors and outdoors.'
            ],
        ],
        [
            'name' => ['Albatros Indoor', 'Albatros Indoor'],
            'description' => [
                'Bahan mengkilat dengan permukaan yang halus.',
                'Shiny material with a smooth surface.'
            ],
        ],
        [
            'name' => ['Art Carton 210gsm', 'Art Carton 210gsm'],
            'description' => [
                'Tebal namun ekonomis. Permukaan mengkilap di kedua sisi dengan ketebalan 210gsm.',
                'Thick but vey economic, Glossy Surface on both sides with thickness 210gsm.'
            ],
        ],
        [
            'name' => ['Art Carton 230gsm', 'Art Carton 230gsm'],
            'description' => [
                'Tebal namun ekonomis. Permukaan mengkilap di kedua sisi dengan ketebalan 230gsm.',
                'Thick but vey economic, Glossy Surface on both sides with thickness 230gsm.'
            ],
        ],
        [
            'name' => ['SPE 260 gr', 'SPE 260 gr'],
            'description' => null
        ],
        [
            'name' => ['K150/M125/K125', 'K150/M125/K125'],
            'description' => null
        ],
        [
            'name' => ['WK150/M125/K125', 'WK150/M125/K125'],
            'description' => null
        ],
        [
            'name' => ['K150/M125/K125 E/F', 'K150/M125/K125 E/F'],
            'description' => null
        ],
        [
            'name' => ['WK150/M125/K125 E/F', 'WK150/M125/K125 E/F'],
            'description' => null
        ],
        [
            'name' => ['Art Paper 150gsm', 'Art Paper 150gsm'],
            'description' => [
                'Kertas mengkilap dengan ketebalan 150gsm.',
                'Glossy paper with 150gsm thickness.'
            ],
        ],
        [
            'name' => ['Everyday Smooth Bright White 148gsm', 'Everyday Smooth Bright White 148gsm'],
            'description' => [
                'Kertas bertekstur halus dan berwarna lebih putih dari Splendorgel.',
                'Paper has a fine texture and is whiter than Splendorgel.'
            ],
        ],
        [
            'name' => ['Art Paper 120gsm', 'Art Paper 120gsm'],
            'description' => [
                'Kertas mengkilap dengan ketebalan 120gsm.',
                'Glossy paper with 120gsm thickness.'
            ],
        ],
        [
            'name' => ['Splendorgel Extra White 160gsm', 'Splendorgel Extra White 160gsm'],
            'description' => [
                'Kertas yang umum digunakan. Permukaan halus dan berwarna putih.',
                'Commonly used paper. The surface is smooth and white.'
            ],
        ],
        [
            'name' => ['Constellation Snow 170gsm', 'Constellation Snow 170gsm'],
            'description' => [
                'Kertas bertekstur dan bergaris halus.',
                'Textured and smooth-lined paper.'
            ],
        ],
        [
            'name' => ['Via Felt 118gsm', 'Via Felt 118gsm'],
            'description' => [
                'Kertas yang tebal dan bertekstur emboss.',
                'Thick, embossed paper.'
            ],
        ],
        [
            'name' => ['Tissue', 'Tissue'],
            'description' => [
                'Tali kartu identitas dengan permukaan yang rata dan padat.',
                'Identity card strap with a flat, solid surface.'
            ],
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            \App\Models\Material::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => !is_null($DATUM['description']) ? 'placeholder.png' : null,
                'description' => [
                    'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                    'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
                ],
                'price' => round(rand(5000, 150000))
            ]);
        }
    }
}
