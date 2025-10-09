<?php

namespace App\Http\Controllers\feature\fo\count;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreEligibilityController extends Controller
{
    public function check(Request $request)
    {
        $isWarga = $request->is_warga_kota;     // 'ya' atau 'tidak'
        $isAparat = $request->is_aparat;        // 'ya' atau 'tidak'
        $isPunyaRumah = $request->is_punya_rumah; // 'ya' atau 'tidak'

        // Logika: hanya jika semua sesuai (ya, tidak, tidak) => lanjut
        if (
            $isWarga === 'ya' &&
            $isAparat === 'tidak' &&
            $isPunyaRumah === 'tidak'
        ) {
            // Lolos kriteria, arahkan ke form kelayakan
            return redirect()->route('fo.count.index');
        }

        // Jika tidak sesuai, tampilkan pesan error
        return redirect()->route('pre-eligibility.form')
            ->withInput()
            ->with('error', 'Mohon maaf, Anda tidak termasuk dalam kriteria penerima program RUSUNAWA');
    }
}
