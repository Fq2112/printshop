<?php

use Illuminate\Database\Seeder;

class PromoCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            \App\Models\PromoCode::create([
                'promo_code' => strtoupper(uniqid('PRM')),
                'start' => now(),
                'end' => now()->addMonth(),
                'description' => \Faker\Factory::create()->sentence,
                'discount' => rand(5, 15),
            ]);
        }

        \App\Models\PromoCode::find(1)->update(['promo_code' => 'versapremier']);
        \App\Models\PromoCode::find(2)->update([
            'promo_code' => 'welcome10',
            'start' => now(),
            'end' => now()->addCentury(),
            'description' => 'New user 10% off!',
            'discount' => 10,
        ]);
    }
}
