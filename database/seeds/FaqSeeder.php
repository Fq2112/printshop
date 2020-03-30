<?php

use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FaqCategory::create([
            'name' => [
                'id' => 'Ketentuan Printing',
                'en' => 'Printing Requirement',
            ],
        ]);

        \App\Models\FaqCategory::create([
            'name' => [
                'id' => 'Desain',
                'en' => 'Design',
            ],
        ]);

        \App\Models\FaqCategory::create([
            'name' => [
                'id' => 'Pesanan',
                'en' => 'Order',
            ],
        ]);

        \App\Models\FaqCategory::create([
            'name' => [
                'id' => 'Pembayaran',
                'en' => 'Payment',
            ],
        ]);

        \App\Models\FaqCategory::create([
            'name' => [
                'id' => 'Akun',
                'en' => 'Account',
            ],
        ]);

        for ($i = 0; $i < 25; $i++) {
            \App\Models\Faq::create([
                'category_id' => rand(\App\Models\FaqCategory::min('id'), \App\Models\FaqCategory::max('id')),
                'question' => [
                    'id' => 'Bagaimana cara ' . strtolower(str_replace('.', '?', \Faker\Factory::create('id')->sentence)),
                    'en' => 'How to ' . strtolower(str_replace('.', '?', \Faker\Factory::create()->sentence)),
                ],
                'answer' => [
                    'id' => '<p>Jawabannya adalah menggnakan ' . \Faker\Factory::create('id')->paragraph(rand(1, 3), true) . '.</p>',
                    'en' => '<p>The answer is using ' . \Faker\Factory::create()->paragraph(rand(1, 3), true) . '.</p>',
                ],
            ]);
        }
    }
}
