<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Domisili;
use App\Models\Pengajuan;
use App\Models\Skck;
use App\Models\Umum;

class wargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil ID pengguna yang login
        $userId = Auth::id();

        // Query untuk mendapatkan data pengajuan berdasarkan status dan ID pengguna
        return view('warga.dashboard', [
            'title' => 'Dashboard',
            'jml_waiting' => Pengajuan::where('status', 0)->where('user_id', $userId)->get()->count(),
            'jml_approve' => Pengajuan::where('status', 1)->where('user_id', $userId)->get()->count(),
            'jml_reject'  => Pengajuan::where('status', 2)->where('user_id', $userId)->get()->count(),
            'skcks' => Skck::select('skcks.*', 'pengajuans.id AS pid')
                ->join('pengajuans', 'pengajuans.id', '=', 'skcks.pengajuan_id')
                ->where('status', 0)
                ->where('pengajuans.user_id', $userId) // Filter berdasarkan ID pengguna
                ->get(),
            'domisilis' => Domisili::select('domisilis.*', 'pengajuans.id AS pid')
                ->join('pengajuans', 'pengajuans.id', '=', 'domisilis.pengajuan_id')
                ->where('status', 0)
                ->where('pengajuans.user_id', $userId) // Filter berdasarkan ID pengguna
                ->get(),
            'umums' => Umum::select('umums.*', 'pengajuans.id AS pid')
                ->join('pengajuans', 'pengajuans.id', '=', 'umums.pengajuan_id')
                ->where('status', 0)
                ->where('pengajuans.user_id', $userId) // Filter berdasarkan ID pengguna
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
