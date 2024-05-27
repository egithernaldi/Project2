<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Domisili;
use App\Models\Layanan;
use App\Models\LogPengajuan;
use App\Models\Pengajuan;
use App\Models\Skck;
use App\Models\Tentang;
use App\Models\Umum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PDF;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'jml_waiting' => Pengajuan::where('status', 0)->count(),
            'jml_approve' => Pengajuan::where('status', 1)->count(),
            'jml_reject'  => Pengajuan::where('status', 2)->count(),
            'jml_user' => User::where('role', 'warga')->count(),
            'skcks' => Skck::join('pengajuans', 'pengajuans.id', '=', 'skcks.pengajuan_id')
                ->join('users', 'users.id', '=', 'skcks.id_user')
                ->where('pengajuans.status', 0)
                ->get(),
            'domisilis' => Domisili::join('pengajuans', 'pengajuans.id', '=', 'domisilis.pengajuan_id')
                ->join('users', 'users.id', '=', 'domisilis.id_user')
                ->where('pengajuans.status', 0)
                ->get(),
            'umums' => Umum::join('pengajuans', 'pengajuans.id', '=', 'umums.pengajuan_id')
                ->join('users', 'users.id', '=', 'umums.id_user')
                ->where('pengajuans.status', 0)
                ->get(),
        ]);
    }

    public function laporan(){
        $laporan = Pengajuan::select('pengajuans.*')
            ->join('users', 'users.id', '=', 'pengajuans.user_id')
            ->where('pengajuans.status', 1)
            ->get();
        return view('admin.laporan.index', compact('laporan'));
    }

    public function filter(Request $request){
        $start_date =$request->start_date;
        $end_date = $request->end_date;

        $laporan = Pengajuan::whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date)
                ->get();
        return view('admin.laporan.index', compact('laporan'));
    }
    
    public function cetak(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $laporan = Pengajuan::whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date)
                        ->get();
        
        // Memuat view PDF tanpa menampilkan view di browser
        $pdf = PDF::loadView('admin.laporan.cetak', compact('laporan', 'start_date', 'end_date'));

        // Memberikan nama file PDF yang akan diunduh
        $fileName = 'Surat Keterangan domisili_' . '.pdf';

        // Menggunakan metode stream agar tidak menyimpan file sementara di server
        return $pdf->stream($fileName);

        // // Di sini Anda bisa mengembalikan halaman cetak atau format data yang sesuai untuk dicetak
        // return view('admin.laporan.cetak', compact('laporan', 'start_date', 'end_date'));
    }

    public function user(){

        $user = User::where('role', 'warga')->get();

        return view('admin.user.index', compact('user'));
    }

    public function edituser($id){
        $user = User::findorfail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function updateuser(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('admin-user-index')->with('success', 'Surat updated successfully');
    }

    public function storeuser(Request $request)
    {
        $validatedData = $request->validate([
            'NIK'=> 'required|max:255',
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'created_at' => now(),
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        return redirect()->route('admin-user-index')->with('success', 'User berhasil dibuat');
    }

    public function createuser(){
        return view('admin.user.create');
    }
    public function deleteuser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin-user-index')->with('success', 'User berhasil dihapus');
    }

    //Frontend

    public function indextentang(){

        $tentangs = Tentang::all();


        return view('admin.depan.tentang.index', compact('tentangs'));
    }

    public function indexlayanan(){

        $layanans = Layanan::all();


        return view('admin.depan.layanan.index', compact('layanans'));
    }


    public function createtentang(){


        return view('admin.depan.tentang.create');
    }

    public function createlayanan(){


        return view('admin.depan.layanan.create');
    }

    public function storetentang(Request $request){

        $request->validate([
            'judul' => 'required',
            'Deskripsi' => 'required',
        ]);

        $tentangs = new Tentang();
        $tentangs->judul = $request->input('judul');
        $tentangs->Deskripsi = $request->input('Deskripsi');

        $tentangs->save();

        return redirect()->route('admin-tentang-index')->with('success', 'experience entry created successfully!');


    }

    public function storelayanan(Request $request){

        $request->validate([
            'judul' => 'required',
            'Deskripsi' => 'required',
        ]);

        $layanans = new Layanan();
        $layanans->judul = $request->input('judul');
        $layanans->Deskripsi = $request->input('Deskripsi');

        $layanans->save();

        return redirect()->route('admin-layanan-index')->with('success', 'experience entry created successfully!');

    }


    public function edittentang($id){

        $tentangs = Tentang::findorfail($id);

        return view('admin.depan.tentang.edit', compact('tentangs'));

    }

    public function editlayanan($id){

        $layanans = Layanan::findorfail($id);

        return view('admin.depan.layanan.edit', compact('layanans'));
    }

    public function editkontak(){

        $id = 1;
        $kontak = Contact::find($id);

        return view('admin.depan.kontak', compact('kontak'));

    }

    public function updatetentang(Request $request, $id){
        $tentangs = Tentang::find($id);
        $data = $request->all();
        
        $tentangs->update($data);

        // Redirect back to the edit page with a success message (you can customize this)
        return redirect()->route('admin-tentang-index')->with('success', 'Section updated successfully!');
    }

    public function updatelayanan(Request $request, $id){

        $layanans = Layanan::find($id);
        $data = $request->all();
        
        $layanans->update($data);

        // Redirect back to the edit page with a success message (you can customize this)
        return redirect()->route('admin-layanan-index')->with('success', 'Section updated successfully!');
    }

    public function updatekontak(Request $request ){
        {
            $id = 1;
            $kontak = Contact::find($id);
            $data = $request->all();
            
            

            if (!empty($data['gambar'])) {
                // Check if the old image exists and delete it
                if (Storage::disk('public')->exists($kontak->gambar)) {
                    Storage::disk('public')->delete($kontak->gambar);
                }
                // Store the new image
                $imageName = basename($request->file('gambar')->store('kontak', 'public'));
                $data['gambar'] = $imageName;
                
                
            } else {
                unset($data['image']);
            }

            $kontak->update($data);
    
            // Redirect back to the edit page with a success message (you can customize this)
            return redirect()->route('admin-kontak-index')->with('success', 'Section updated successfully!');
        }
    }

    public function destroytentang($id){

        $tentangs = Tentang::findOrFail($id);
        $tentangs->delete();

        // Redirect back to the skills page with a success message
        return redirect()->route('admin-tentang-index')->with('successdelete', 'deleted successfully!');
    }

    public function destroylayanan($id){
        
        $layanans = Layanan::findOrFail($id);
        $layanans->delete();

        // Redirect back to the skills page with a success message
        return redirect()->route('admin-layanan-index')->with('successdelete', 'Skill deleted successfully!');
    }



}
