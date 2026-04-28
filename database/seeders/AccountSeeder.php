<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {

            // 1) DATA COA (pakai parent_code)
            $accounts = [
                // ===== ASSET =====
                ['code' => '1000', 'name' => 'Aset', 'type' => 'ASSET', 'parent_code' => null],

                ['code' => '1100', 'name' => 'Aset Lancar', 'type' => 'ASSET', 'parent_code' => '1000'],
                ['code' => '1110', 'name' => 'Kas', 'type' => 'ASSET', 'parent_code' => '1100'],
                ['code' => '1120', 'name' => 'Bank', 'type' => 'ASSET', 'parent_code' => '1100'],
                ['code' => '1130', 'name' => 'Piutang Usaha', 'type' => 'ASSET', 'parent_code' => '1100'],

                ['code' => '1200', 'name' => 'Aset Tetap', 'type' => 'ASSET', 'parent_code' => '1000'],
                ['code' => '1210', 'name' => 'Peralatan', 'type' => 'ASSET', 'parent_code' => '1200'],
                ['code' => '1220', 'name' => 'Kendaraan', 'type' => 'ASSET', 'parent_code' => '1200'],

                // ===== LIABILITY =====
                ['code' => '2000', 'name' => 'Liabilitas', 'type' => 'LIABILITY', 'parent_code' => null],

                ['code' => '2100', 'name' => 'Liabilitas Jangka Pendek', 'type' => 'LIABILITY', 'parent_code' => '2000'],
                ['code' => '2110', 'name' => 'Hutang Usaha', 'type' => 'LIABILITY', 'parent_code' => '2100'],
                ['code' => '2120', 'name' => 'Hutang Lain-lain', 'type' => 'LIABILITY', 'parent_code' => '2100'],

                // ===== EQUITY =====
                ['code' => '3000', 'name' => 'Ekuitas', 'type' => 'EQUITY', 'parent_code' => null],

                ['code' => '3100', 'name' => 'Modal Pemilik', 'type' => 'EQUITY', 'parent_code' => '3000'],
                ['code' => '3110', 'name' => 'Modal Disetor', 'type' => 'EQUITY', 'parent_code' => '3100'],
                ['code' => '3120', 'name' => 'Prive', 'type' => 'EQUITY', 'parent_code' => '3100'],

                // ===== INCOME =====
                ['code' => '4000', 'name' => 'Pendapatan', 'type' => 'INCOME', 'parent_code' => null],

                ['code' => '4100', 'name' => 'Pendapatan Operasional', 'type' => 'INCOME', 'parent_code' => '4000'],
                ['code' => '4110', 'name' => 'Pendapatan Jasa', 'type' => 'INCOME', 'parent_code' => '4100'],
                ['code' => '4120', 'name' => 'Pendapatan Penjualan', 'type' => 'INCOME', 'parent_code' => '4100'],

                // ===== EXPENSE =====
                ['code' => '5000', 'name' => 'Beban', 'type' => 'EXPENSE', 'parent_code' => null],

                ['code' => '5100', 'name' => 'Beban Operasional', 'type' => 'EXPENSE', 'parent_code' => '5000'],
                ['code' => '5110', 'name' => 'Beban Listrik', 'type' => 'EXPENSE', 'parent_code' => '5100'],
                ['code' => '5120', 'name' => 'Beban Air', 'type' => 'EXPENSE', 'parent_code' => '5100'],
                ['code' => '5130', 'name' => 'Beban Internet', 'type' => 'EXPENSE', 'parent_code' => '5100'],
                ['code' => '5140', 'name' => 'Beban Transport', 'type' => 'EXPENSE', 'parent_code' => '5100'],
                ['code' => '5150', 'name' => 'Beban ATK', 'type' => 'EXPENSE', 'parent_code' => '5100'],
                ['code' => '5160', 'name' => 'Beban Gaji', 'type' => 'EXPENSE', 'parent_code' => '5100'],
                ['code' => '5170', 'name' => 'Beban Sewa', 'type' => 'EXPENSE', 'parent_code' => '5100'],
                ['code' => '5180', 'name' => 'Beban Makan', 'type' => 'EXPENSE', 'parent_code' => '5100'],
            ];

            // 2) INSERT SEMUA (tanpa parent_id dulu)
            foreach ($accounts as $acc) {
                DB::table('accounts')->updateOrInsert(
                    ['code' => $acc['code']],
                    [
                        'name' => $acc['name'],
                        'type' => $acc['type'],
                        'parent_id' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }

            // 3) BUILD MAP: code → id
            $map = DB::table('accounts')->pluck('id', 'code')->toArray();

            // 4) UPDATE parent_id berdasarkan parent_code
            foreach ($accounts as $acc) {
                if (!empty($acc['parent_code']) && isset($map[$acc['parent_code']])) {
                    DB::table('accounts')
                        ->where('code', $acc['code'])
                        ->update([
                            'parent_id' => $map[$acc['parent_code']],
                            'updated_at' => now(),
                        ]);
                }
            }

        });
    }
}
