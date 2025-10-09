<?php

namespace App\Http\Controllers\feature\fo\diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DiagnosisController extends Controller
{
    public function showRegistrationForm()
    {
        return view('feature.fo.diagnosis.register');
    }

    public function register(Request $request)
    {
        // Validasi data registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Simpan data ke database (jika ada model User)
        // User::create($request->all());

        // Redirect ke halaman diagnosa setelah registrasi
        return redirect()->route('feature.fo.diagnosis.index');
    }

    public function showDiagnosisForm() {
        $gejalas = DB::table('gejala')->get(); // Ambil data gejala
        return view('feature.fo.diagnosis.index', compact('gejalas')); // Kirim ke tampilan
    }



    public function submit(Request $request) {
        $selectedSymptoms = $request->input('symptoms');
        $results = $this->calculateNaiveBayes($selectedSymptoms);

        return view('feature.fo.diagnosis.result', compact('results'));
    }




    public function calculateNaiveBayes($selectedSymptoms) {
        $results = [];

        foreach ($selectedSymptoms as $symptomCode) {
            $penyakitList = DB::table('hubungan_gejala_penyakit')
                ->where('Kode_Gejala', $symptomCode)
                ->pluck('Kode_Penyakit');

            foreach ($penyakitList as $penyakit) {
                if (!isset($results[$penyakit])) {
                    $results[$penyakit] = 1; // Initialize with 1
                }
                $results[$penyakit] *= DB::table('probabilitas')
                    ->where('Nama_Penyakit', $penyakit)
                    ->where('Gejala', $symptomCode)
                    ->value('Probabilitas');
            }
        }

        // Hitung probabilitas akhir
        $totalProbability = array_sum($results);
        foreach ($results as $penyakit => $prob) {
            $results[$penyakit] = $prob / $totalProbability; // Normalisasi
        }

        return $results;
    }


}
