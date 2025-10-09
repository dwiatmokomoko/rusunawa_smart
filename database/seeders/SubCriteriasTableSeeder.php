<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_criterias')->insert([
            // criteria_id = 1 (Penghasilan)
            [
                'id' => 1,
                'criteria_id' => 1,
                'name' => '500.000 - 2.250.000',
                'weight' => 70,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 2,
                'criteria_id' => 1,
                'name' => '2.251.000 - 4.500.000',
                'weight' => 100,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 3,
                'criteria_id' => 1,
                'name' => '4.501.000 - 6.750.000',
                'weight' => 35,
                'created_by' => 1,
                'updated_by' => 1,
            ],

            // criteria_id = 2 (Pekerjaan)
            [
                'id' => 4,
                'criteria_id' => 2,
                'name' => 'Buruh',
                'weight' => 100,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 5,
                'criteria_id' => 2,
                'name' => 'Petani / Pekebun',
                'weight' => 80,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 6,
                'criteria_id' => 2,
                'name' => 'Karyawan Swasta',
                'weight' => 60,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 7,
                'criteria_id' => 2,
                'name' => 'Wiraswasta',
                'weight' => 40,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 8,
                'criteria_id' => 2,
                'name' => 'PNS/TNI/POLRI',
                'weight' => 20,
                'created_by' => 1,
                'updated_by' => 1,
            ],

            // criteria_id = 3 (Perkawinan)
            [
                'id' => 9,
                'criteria_id' => 3,
                'name' => 'Belum Kawin',
                'weight' => 35,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 10,
                'criteria_id' => 3,
                'name' => 'Kawin',
                'weight' => 100,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 11,
                'criteria_id' => 3,
                'name' => 'Cerai Hidup/Mati',
                'weight' => 70,
                'created_by' => 1,
                'updated_by' => 1,
            ],

            // criteria_id = 4 (Tinggal bersama)
            [
                'id' => 12,
                'criteria_id' => 4,
                'name' => 'Sendiri',
                'weight' => 50,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 13,
                'criteria_id' => 4,
                'name' => 'Bersama Keluarga',
                'weight' => 100,
                'created_by' => 1,
                'updated_by' => 1,
            ],

            // criteria_id = 5 (Status kependudukan)
            [
                'id' => 14,
                'criteria_id' => 5,
                'name' => 'Warga Kota Yogyakarta',
                'weight' => 100,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'id' => 15,
                'criteria_id' => 5,
                'name' => 'Warga Luar Kota Yogyakarta',
                'weight' => 50,
                'created_by' => 1,
                'updated_by' => 1,
            ],

            // criteria_id = 6 (Status kepemilikan rumah)
            [
                'id' => 16,
                'criteria_id' => 6,
                'name' => 'Tidak Memiliki Rumah',
                'weight' => 100,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'id' => 17,
                'criteria_id' => 6,
                'name' => 'Memiliki Rumah Tidak Layak Huni',
                'weight' => 70,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'id' => 18,
                'criteria_id' => 6,
                'name' => 'Memiliki Rumah Pribadi dan Layak Huni',
                'weight' => 35,
                'created_by' => 1,
                'updated_by' => null,
            ],
        ]);
    }
}
