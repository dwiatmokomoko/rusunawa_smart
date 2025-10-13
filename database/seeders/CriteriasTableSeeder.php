<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CriteriasTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $rows = [
            ['id'=>1,'name'=>'Penghasilan','weight'=>16,'created_by'=>1,'updated_by'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['id'=>2,'name'=>'Pekerjaan','weight'=>8,'created_by'=>1,'updated_by'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['id'=>3,'name'=>'Perkawinan','weight'=>8,'created_by'=>1,'updated_by'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['id'=>4,'name'=>'Calon Penghuni','weight'=>12,'created_by'=>1,'updated_by'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['id'=>5,'name'=>'Status kependudukan','weight'=>20,'created_by'=>1,'updated_by'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['id'=>6,'name'=>'Status kepemilikan rumah','weight'=>20,'created_by'=>1,'updated_by'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['id'=>7,'name'=>'Status Penempatan','weight'=>16,'created_by'=>1,'updated_by'=>1,'created_at'=>$now,'updated_at'=>$now],
        ];

        // Kunci unik berdasarkan PRIMARY KEY 'id'
        DB::table('criterias')->upsert(
            $rows,
            ['id'], // conflict target
            ['name','weight','updated_by','updated_at'] // kolom yang di-update jika sudah ada
        );
    }
}
