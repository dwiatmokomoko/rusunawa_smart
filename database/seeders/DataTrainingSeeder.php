<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataTrainingSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel data_trainings.
     */
    public function run(): void
    {
        $dataTraining = [
            // Data dari tabel training (17 records)
            [
                'name' => 'DT001',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(3),
                'pekerjaan' => $this->convertK6(4),
                'perkawinan' => $this->convertK7(3),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 1, // Diterima
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DT002',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(1),
                'pekerjaan' => $this->convertK6(3),
                'perkawinan' => $this->convertK7(3),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(0),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Lanjutkan untuk data 3-17 dengan pola yang sama
            // Contoh data 3:
            [
                'name' => 'DT003',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(2),
                'pekerjaan' => $this->convertK6(3),
                'perkawinan' => $this->convertK7(2),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(1),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 4
            [
                'name' => 'DT004',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(0),
                'pekerjaan' => $this->convertK6(2),
                'perkawinan' => $this->convertK7(1),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 5
            [
                'name' => 'DT005',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(1),
                'pekerjaan' => $this->convertK6(1),
                'perkawinan' => $this->convertK7(3),
                'calon_penghuni' => $this->convertK5(0),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 6
            [
                'name' => 'DT006',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(2),
                'pekerjaan' => $this->convertK6(0),
                'perkawinan' => $this->convertK7(2),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 7
            [
                'name' => 'DT007',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(2),
                'pekerjaan' => $this->convertK6(3),
                'perkawinan' => $this->convertK7(3),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(0),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 8
            [
                'name' => 'DT008',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(1),
                'pekerjaan' => $this->convertK6(3),
                'perkawinan' => $this->convertK7(3),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(0),
                'status_kepemilikan_rumah' => $this->convertK2(0),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 9
            [
                'name' => 'DT009',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(2),
                'pekerjaan' => $this->convertK6(3),
                'perkawinan' => $this->convertK7(1),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 1, // Diterima
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 10
            [
                'name' => 'DT010',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(1),
                'pekerjaan' => $this->convertK6(1),
                'perkawinan' => $this->convertK7(2),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(1),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 11
            [
                'name' => 'DT011',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(1),
                'pekerjaan' => $this->convertK6(2),
                'perkawinan' => $this->convertK7(2),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 1, // Diterima
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 12
            [
                'name' => 'DT012',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(1),
                'pekerjaan' => $this->convertK6(3),
                'perkawinan' => $this->convertK7(3),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 1, // Diterima
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 13
            [
                'name' => 'DT013',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(0),
                'pekerjaan' => $this->convertK6(0),
                'perkawinan' => $this->convertK7(3),
                'calon_penghuni' => $this->convertK5(0),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(0),
                'status_kepemilikan_rumah' => $this->convertK2(0),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 14
            [
                'name' => 'DT014',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(0),
                'pekerjaan' => $this->convertK6(4),
                'perkawinan' => $this->convertK7(2),
                'calon_penghuni' => $this->convertK5(0),
                'status_penempatan' => $this->convertK3(1),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 15
            [
                'name' => 'DT015',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(0),
                'pekerjaan' => $this->convertK6(3),
                'perkawinan' => $this->convertK7(3),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(0),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 0, // Ditolak
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 16
            [
                'name' => 'DT016',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(2),
                'pekerjaan' => $this->convertK6(2),
                'perkawinan' => $this->convertK7(2),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 1, // Diterima
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Data 17
            [
                'name' => 'DT017',
                'ticket' => strtoupper(Str::random(10)),
                'penghasilan' => $this->convertK4(1),
                'pekerjaan' => $this->convertK6(4),
                'perkawinan' => $this->convertK7(2),
                'calon_penghuni' => $this->convertK5(1),
                'status_penempatan' => $this->convertK3(3),
                'status_kependudukan' => $this->convertK1(1),
                'status_kepemilikan_rumah' => $this->convertK2(1),
                'kelayakan' => 1, // Diterima
                'status' => 0,
                'created_by' => 'admin',
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('data_trainings')->insert($dataTraining);
    }

    // Helper functions untuk konversi nilai
    private function convertK1($value)
    {
        return $value == 1 ? 100 : 0;
    }

    private function convertK2($value)
    {
        return $value == 1 ? 100 : 0;
    }

    private function convertK3($value)
    {
        return $value == 3 ? 100 : ($value == 1 ? 33 : 0);
    }

    private function convertK4($value)
    {
        if ($value == 3) return 100;
        if ($value == 2) return 67;
        if ($value == 1) return 33;
        return 0;
    }

    private function convertK5($value)
    {
        return $value == 1 ? 100 : 0;
    }

    private function convertK6($value)
    {
        if ($value == 4) return 100;
        if ($value == 3) return 75;
        if ($value == 2) return 50;
        if ($value == 1) return 25;
        return 0;
    }

    private function convertK7($value)
    {
        if ($value == 3) return 100;
        if ($value == 2) return 67;
        if ($value == 1) return 33;
        return 0;
    }
}
