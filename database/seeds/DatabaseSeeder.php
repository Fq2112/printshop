<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KategoriSeed::class,
            SubKategoriSeed::class,
            ClusterKategoriSeed::class,
            EdgeSeeder::class,
            SideSeeder::class,
            FrontSeeder::class,
            RightLeftSideSeeder::class,
            BackSideSeeder::class,
            ProvinceSeeder::class,
            CitiesSeeder::class,
            FoldingSeeder::class,
            LaminationSeeder::class,
            FinishingSeeder::class,
            SizeSeeder::class,
            MaterialSeeder::class,
            TypeProductSeeder::class,
            PrintingMethodsSeeder::class,
            PagesSeeder::class,
            CopiesSeeder::class,
            ColorsSeeder::class,
            BalanceSeeder::class,
            UnitSeeder::class,
            DetailSubkatSeeder::class,
            LidSeeder::class,
            DetailProductSeeder::class,
            OccupancyTypeSeeder::class,
            AdminSeeder::class,
            KontakSeeder::class,
            BlogSeeder::class,
            FaqSeeder::class,
            CartSeeder::class,
            PaymentCartSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
