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
        for ($i =1 ; $i < 3 ; $i ++){
            \App\Models\PromoCode::create([
                'promo_code' => strtoupper(uniqid()),
                'start' => \Carbon\Carbon::now(),
                'end' => \Carbon\Carbon::now()->addMonth(),
                'description' => "BLA BLA BLA BLA BLA BLA BLA BLA",
                'discount' => 10,
            ]);
        }
    }
}
