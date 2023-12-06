<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Guru;
use App\Models\Perusahaan;
use App\Models\Siswa;
use App\Models\Siswadetail;
use App\Models\User;
use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Permintaan;
use App\Models\Lowongan;
use App\Models\Panduan;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    // ALL
    function cariDaftarsiswa(Request $request){
        $searchTerm = $request->input('search');
    
        $siswa = Siswa::where('nama_siswa', 'like', "%{$searchTerm}%")
            ->orWhere('id_siswa', 'like', "%{$searchTerm}%")
            ->orWhere('nis', 'like', "%{$searchTerm}%")
            ->paginate(10);

        return view('Pengajuan.Admin.cariDaftarsiswa')->with('datasiswa', $siswa);
    }

    function cariFormsiswa(Request $request){
        $searchTerm = $request->input('search');
    
        $formsiswa = Formulir::whereHas('siswa', function ($query) use ($searchTerm) {
            $query->where('nama_siswa', 'like', "%{$searchTerm}%")->orWhere('nis', 'like', "%{$searchTerm}%");
        })->paginate(10);

        return view('Pengajuan.Admin.cariFormsiswa')->with('dataformulir', $formsiswa);
    }

    function cariDaftarperusahaan(Request $request){
        $searchTerm = $request->input('search');
    
        $perusahaan = DB::table('perusahaan')
            ->where('nama_perusahaan', 'like', "%{$searchTerm}%")
            ->orWhere('id_perusahaan', 'like', "%{$searchTerm}%")
            ->paginate(10);

        return view('Pengajuan.Admin.cariDaftarperusahaan')->with('dataperusahaan', $perusahaan);
    }
    
    function cariDaftarguru(Request $request){
        $searchTerm = $request->input('search');
    
        $guru = Guru::where('nama_guru', 'like', "%{$searchTerm}%")
            ->orWhere('nip', 'like', "%{$searchTerm}%")
            ->paginate(10);

        return view('Pengajuan.Admin.cariDaftarguru')->with('dataguru', $guru);
    }

    function cariAkunsiswa(Request $request){
        $searchTerm = $request->input('search');
    
        $akunsiswa = User::whereHas('siswa', function ($query) use ($searchTerm) {
            $query->where('nama_siswa', 'like', "%{$searchTerm}%");
        })->paginate(10);

        return view('Pengajuan.Admin.cariAkunsiswa')->with('dataakunsiswa', $akunsiswa);
    }

    function cariAkunpembimbing(Request $request){
        $searchTerm = $request->input('search');
    
        $pembimbing = User::whereHas('guru', function ($query) use ($searchTerm) {
            $query->where('nama_guru', 'like', "%{$searchTerm}%");
        })->paginate(10);

        return view('Pengajuan.Admin.cariAkunpembimbing')->with('dataakunpembimbing', $pembimbing);
    }

    function cariAngkatan(Request $request){
        $searchTerm = $request->input('search');
    
        $angkatan = Angkatan::where('angkatan', 'like', "%{$searchTerm}%")
        ->orWhere('tahun_pembelajaran', 'like', "%{$searchTerm}%")
        ->paginate(10);

        return view('Pengajuan.Admin.cariAngkatan')->with('dataangkatan', $angkatan);
    }

    function cariPermintaan(Request $request){
        $searchTerm = $request->input('search');
    
        $permintaan = Permintaan::whereHas('siswa', function ($query) use ($searchTerm) {
            $query->where('nama_siswa', 'like', "%{$searchTerm}%");
        })->paginate(10);                                                                             

        return view('Pengajuan.Admin.cariPermintaan')->with('datapermintaan', $permintaan);
    }

    function cariLowongan(Request $request){
        $searchTerm = $request->input('search');
    
        $lowongan = Lowongan::whereHas('perusahaan', function ($query) use ($searchTerm) {
            $query->where('nama_perusahaan', 'like', "%{$searchTerm}%");
        })->paginate(10);

        return view('Pengajuan.Admin.carilowongan')->with('datalowongan', $lowongan);
    }

    function cariJurusan(Request $request){
        $searchTerm = $request->input('search');
    
        $jurusan = Jurusan::where('nama_jurusan', 'like', "%{$searchTerm}%")->paginate(10);

        return view('Pengajuan.Admin.cariJurusan')->with('datajurusan', $jurusan);
    }

    function cariPanduan(Request $request){
        $searchTerm = $request->input('search');
    
        $panduan = Panduan::where('nama_panduan', 'like', "%{$searchTerm}%")->paginate(10);
        return view('Pengajuan.Admin.cariPanduan')->with('datapanduan', $panduan);
    }

    function cariAkunkurikulum(Request $request){
        $searchTerm = $request->input('search');
    
        $kurikulum = User::whereHas('guru', function ($query) use ($searchTerm) {
            $query->where('nama_guru', 'like', "%{$searchTerm}%");
        })->paginate(10);

        return view('Pengajuan.Admin.cariAkunkurikulum')->with('dataakunkurikulum', $kurikulum);
    }

    // CRUD
    function formsiswa(){
        $user = Auth::user()->id_jurusan;

        $formsiswa = Formulir::paginate(10);
        $totalFormulirSiswa = DB::table('formulir')->count();

        $belumDiApproveKakom = DB::table('formulir')->where('approve_kakom', 0)->count();
        $sudahDiApproveKakom = DB::table('formulir')->where('approve_kakom', 1)->count();

        return view('Pengajuan.Admin.formsiswa',[
            'dataformulir' => $formsiswa,
            'totalFormulirSiswa' => $totalFormulirSiswa,
            'belumDiApproveKakom' => $belumDiApproveKakom,
            'sudahDiApproveKakom' => $sudahDiApproveKakom,
        ]);
    }

    function detailFormSiswa($id_formulir){
        $formulir = Formulir::where('id_formulir',$id_formulir)->first();

        return view('Pengajuan.Admin.formsiswadetail',['dataformulir' => $formulir]);
    }

    function tambahFormulir(){
        $user = Auth::user()->guru->id_jurusan;
        $siswa = Siswa::get()->where('id_jurusan', $user);
        $lowongan = Lowongan::get();

        return view('Pengajuan.Admin.tambahFormulir', ['siswa' => $siswa, 'lowongan' => $lowongan]);  
    }

    function lowongan(){
        $user = Auth::user()->guru; // mendapatkan data user yang sedang login
        $id_jurusan = $user->id_jurusan; // mendapatkan id_jurusan dari user
    
        $lowongan = Lowongan::where('id_jurusan', $id_jurusan)->paginate(10); // memfilter lowongan berdasarkan id_jurusan user
        $totalLowongan = Lowongan::where('id_jurusan', $id_jurusan)->count(); // menghitung lowongan berdasarkan id_jurusan user

        return view('Pengajuan.Admin.lowongan', ['datalowongan' => $lowongan, 'totalLowongan' => $totalLowongan]);
    }

    function tambahLowongan(){
        $perusahaan = Perusahaan::get();
        $angkatan = Angkatan::get();

        return view('Pengajuan.Admin.tambahLowongan', ['perusahaan' => $perusahaan, 'angkatan' => $angkatan]);
    }

    function storeLowongan(Request $request){
        $user = Auth::user()->guru->jurusan->id_jurusan;

        $lowongan = new Lowongan;
        $lowongan->id_perusahaan = $request->id_perusahaan;
        $lowongan->id_angkatan = $request->id_angkatan;
        $lowongan->jumlah_siswa = $request->jumlah_siswa;
        $lowongan->posisi = $request->posisi;
        $lowongan->id_jurusan = $user;
        $lowongan->tanggal_mulai = $request->tanggal_mulai;
        $lowongan->tanggal_selesai = $request->tanggal_selesai;
        $lowongan->save();

        return redirect('/admin/kakom/lowongan')->with('store', 'Data lowongan berhasil di tambah!');
    }

    function editLowongan($id_lowongan){
        $lowongan = Lowongan::find($id_lowongan);
        $angkatan = Angkatan::get();

        return view('Pengajuan.Admin.editLowongan', ['lowongan' => $lowongan, 'angkatan' => $angkatan]);
    }

    function updateLowongan(Request $request){
        $lowongan = Lowongan::find($request->id_lowongan);
        $lowongan->jumlah_siswa = $request->jumlah_siswa;
        $lowongan->id_angkatan = $request->id_angkatan;
        $lowongan->posisi = $request->posisi;
        $lowongan->tanggal_mulai = $request->tanggal_mulai;
        $lowongan->tanggal_selesai = $request->tanggal_selesai;
        $lowongan->save();

        return redirect('/admin/kakom/lowongan')->with('update', 'Data berhasil di Perbarui!');
    }

    function deleteLowongan($id_lowongan){
        DB::table('lowongan')->where('id_lowongan',$id_lowongan)->delete();

        return redirect('/admin/kakom/lowongan')->with('delete', 'Data berhasil di hapus!');
    }

    function permintaan(){
        $permintaan = Permintaan::paginate(10);

        return view('Pengajuan.Admin.permintaan', ['datapermintaan' => $permintaan]);
    }

    function permintaanApprove(Request $request){
        $affected = Permintaan::where('id_permintaan',$request->id_permintaan)->update(['approve' => 1]);

        if ($affected) {
            return redirect('/admin/kakom/permintaan')->with('success', 'Permintaan Siswa telah diapprove oleh Kakom!');
        }

        return redirect('/admin/kakom/permintaan')->with('error', 'Error, Data sudah diapprove!');

        return view('Pengajuan.Admin.permintaan');
    }

    function permintaanTolak(Request $request){
        Permintaan::where('id_permintaan',$request->id_permintaan)->delete();

        $siswa = Siswa::find($request->id_siswa);

        $siswa->update([
            'sudah_memilih' => '0'
        ]);

        return redirect('/admin/kakom/permintaan')->with('delete', 'Data berhasil di tolak!');
    }

    function daftarperusahaan(){
        $totalPerusahaan = DB::table('perusahaan')->count();
        $daftarperusahaan = DB::table('perusahaan')->paginate(10);

        return view('Pengajuan.Admin.daftarperusahaan',[
            'dataperusahaan'=>$daftarperusahaan,
            'totalPerusahaan'=>$totalPerusahaan
        ]);
    }

    function detailDaftarperusahaan($id_perusahaan){
        $perusahaan = DB::table('perusahaan')->where('id_perusahaan',$id_perusahaan)->get();

        return view('Pengajuan.Admin.detailDaftarperusahaan',['perusahaan'=>$perusahaan]);
    }

    function tambahDaftarperusahaan(){
        return view('Pengajuan.Admin.tambahPerusahaan');
    }

    function editPerusahaan($id_perusahaan){
        $perusahaan = DB::table('perusahaan')->where('id_perusahaan',$id_perusahaan)->first();

        return view('Pengajuan.Admin.editPerusahaan', ['perusahaan' => $perusahaan]);
    }

    function daftarsiswa(){
        $user = Auth::user(); // mendapatkan data user yang sedang login

        if ($user->guru && $user->guru->id_jurusan) {
            $id_jurusan = $user->guru->id_jurusan; // mendapatkan id_jurusan dari user
        
            $siswa = Siswa::where('id_jurusan', $id_jurusan)->paginate(10); // memfilter siswa berdasarkan id_jurusan
            $totalSiswa = DB::table('siswa')->where('id_jurusan', $id_jurusan)->count(); // menghitung jumlah siswa dengan id_jurusan yang sama

            return view('Pengajuan.Admin.daftarSiswa', [
                'datasiswa' => $siswa,
                'totalSiswa' => $totalSiswa
            ]);
        } else {
            $semuaSiswa = Siswa::paginate(10);
            $totalSiswa = Siswa::count();

            return view('Pengajuan.Admin.daftarSiswa',[
                'datasiswa' => $semuaSiswa,
                'totalSiswa' => $totalSiswa
            ]);
        }
    }

    function detailDaftarsiswa($id_siswa){
        $siswa = Siswa::where('id_siswa',$id_siswa)->get();

        return view('Pengajuan.Admin.detailDaftarsiswa',['siswa'=>$siswa]);
    }

    function tambahDaftarsiswa(){
        $guru = Guru::all();
        $jurusan = Jurusan::all();
        $angkatan = Angkatan::all();

        return view('Pengajuan.Admin.tambahSiswa', ['guru' => $guru, 'jurusan' => $jurusan, 'angkatan' => $angkatan]);  
    }

    function editSiswa($id_siswa){
        $siswa = Siswa::where('id_siswa',$id_siswa)->first();
        $guru = Guru::all();
        $jurusan = Jurusan::all();
        $angkatan = Angkatan::get();

        return view('Pengajuan.Admin.editsiswa', compact('siswa','guru','jurusan','angkatan'));
    }

    function panduan(){
        $panduan = Panduan::paginate(10);
        $totalPanduan = Panduan::count();

        return view('Pengajuan.Admin.panduan', ['datapanduan' => $panduan, 'totalPanduan' => $totalPanduan]);
    }

    function tambahPanduan(){
        return view('Pengajuan.Admin.tambahPanduan');
    }

    function preview($filename)
    {
        $path = public_path('doc/' . $filename); // Specify the path to the "data_file" folder

        if (file_exists($path)) {
            $headers = ['Content-Type: application/pdf'];
            return response()->file($path, $headers);
        } else {
            return 'File not found.';
        }
    }

    function akunsiswa(){
        $totalAkunsiswa = User::where('role', 'siswa')->count();
        $akunsiswa = User::where('role', 'siswa')->paginate(10);

        return view('Pengajuan.Admin.akunsiswa',[
            'dataakunsiswa' => $akunsiswa,
            'totalAkunsiswa' => $totalAkunsiswa,
        ]);
    }
    
    function tambahAkunsiswa()
    {
        $siswaBelumPunyaAkun = Siswa::whereDoesntHave('user')->get();

        return view('Pengajuan.Admin.tambahAkunsiswa',[
            'siswa' => $siswaBelumPunyaAkun,
        ]);
    }

    function editAkunsiswa($id){
        $siswa = Siswa::find($id);
        $akunsiswa = User::where('id_siswa', $id)->first();
    
        return view('Pengajuan.Admin.editAkunsiswa', compact('siswa', 'akunsiswa'));
    }

    function daftarguru(){
        $guru = Guru::paginate(10);
        $totalguru = DB::table('guru')->count();

        return view('Pengajuan.Admin.daftarGuru',[
            'dataguru' => $guru,
            'totalguru' => $totalguru
        ]);
    }

    function detailDaftarguru($id_guru){
        $guru = Guru::where('id_guru',$id_guru)->get();

        return view('Pengajuan.Admin.detailDaftarguru',['guru'=>$guru]);
    }

    function tambahDaftarguru(){
        $jurusan = Jurusan::all();

        return view('Pengajuan.Admin.tambahguru', ['jurusan' => $jurusan]);
    }

    function editGuru($id_guru){
        $guru = Guru::where('id_guru',$id_guru)->first();
        $jurusan = Jurusan::all();

        return view('Pengajuan.Admin.editguru', ['guru' => $guru, 'jurusan' => $jurusan]);
    }

    function akunpembimbing(){
        $totalakunpembimbing = User::where('role', 'pembimbing')->count();
        $akunpembimbing = User::where('role', 'pembimbing')->paginate(10);
        $guruBelumPunyaAkun = Guru::whereDoesntHave('user')
            ->orderBy('nama_guru', 'asc') // Mengurutkan berdasarkan nama_guru dari A ke Z
            ->get();

        return view('Pengajuan.Admin.akunpembimbing',[
            'dataakunpembimbing' => $akunpembimbing,
            'totalakunpembimbing' => $totalakunpembimbing,
            'guru' => $guruBelumPunyaAkun
        ]);
    }

    public function tambahAkunpembimbing()
    {
        $guruBelumPunyaAkun = Guru::whereDoesntHave('user')->whereHas('siswa')
            ->orderBy('nama_guru', 'asc')
            ->get();

        return view('Pengajuan.Admin.tambahAkunpembimbing', [
            'guru' => $guruBelumPunyaAkun,
        ]);
    }

    function editAkunpembimbing($id){
        $guru = Guru::find($id);
        $akunpembimbing = User::where('id_guru', $id)->first();
    
        return view('Pengajuan.Admin.editAkunpembimbing', compact('guru', 'akunpembimbing'));
    }
    // CRUD-END

    // ALL-END

    // Hubin
    function hubin(){
        $formulir = Formulir::latest()->take(3)->get();
        $pembimbing = User::latest()->where('role','pembimbing')->take(6)->get();
        $siswaMonitoring = Siswa::where('status','1')->count();
        $siswaPengajuan = Siswa::where('status','0')->count();

        return view('Pengajuan.Admin.dashboard', [
            'formulir' => $formulir,
            'pembimbing' => $pembimbing,
            'siswaMonitoring' => $siswaMonitoring,
            'siswaPengajuan' => $siswaPengajuan
        ]);
    }

    function approvehubin(Request $request) {
        $id_formulir = $request->input('id_formulir'); 

        $affected = DB::table('formulir')
        ->where('id_formulir', $id_formulir)
        ->update(['approve_hubin' => 1]);

        if ($affected) {
            return redirect('/admin/hubin/formsiswa')->with('success', 'Data Siswa telah diapprove oleh Hubin!');
        }

        return redirect('/admin/hubin/formsiswa')->with('error', 'Error, Data sudah diapprove!');
    }

    function storePerusahaanHubin(Request $request){

        $file = $request->file('gambar');
        $gambar = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'img/perusahaan';
        $file->move($tujuanupload, $gambar);

        DB::table('perusahaan')->insert([
            'id_perusahaan' => $request->id_perusahaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'deskripsi' => $request->deskripsi,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'contact_person' => $request->contact_person,
            'jurusan' => $request->jurusan,
            'gambar_perusahaan' => $gambar
        ]);


        return redirect('/admin/hubin/daftarperusahaan')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    public function updatePerusahaanHubin(Request $request, $id_perusahaan){
        $perusahaan = DB::table('perusahaan')->where('id_perusahaan', $id_perusahaan)->first();
        $old_image = asset("img/perusahaan/" . $perusahaan->gambar_perusahaan);
        if ($request->hasFile('image')) {
            if (File::exists($old_image)) { 
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move('img/perusahaan', $image_name);
        } else {
            $image_name = $perusahaan->gambar_perusahaan;
        }

        DB::table('perusahaan')->where('id_perusahaan', $id_perusahaan)->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'deskripsi' => $request->deskripsi,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'contact_person' => $request->contact_person,
            'jurusan' => $request->jurusan,
            'gambar_perusahaan' => $request->hasFile('image') ? $image_name : $perusahaan->gambar_perusahaan,
        ]);
    
        return redirect('/admin/hubin/daftarperusahaan')->with('update', 'Data berhasil di Perbarui!');
    }

    function deletePerusahaanHubin($id_perusahaan){
        DB::table('perusahaan')->where('id_perusahaan',$id_perusahaan)->delete();

        return redirect('/admin/hubin/daftarperusahaan')->with('delete', 'Data berhasil di hapus!');
    }

    function storePanduanHubin(Request $request){
        $file = $request->file('file_panduan');
        $file_panduan = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'doc/';
        $file->move($tujuanupload, $file_panduan);

        $request->validate([
            'nama_panduan'=>'required'
        ],[
            'nama_panduan.required'=>'Nama Panduan Wajib Diisi'
        ]);

        Panduan::create([
            'file_panduan' => $file_panduan,
            'nama_panduan' => $request->nama_panduan,
            'deskripsi' => $request->deskripsi
        ]);


        return redirect('/admin/hubin/panduan')->with('store', 'Data Panduan berhasil di tambah!');
    }

    function editPanduan($id_panduan){
        $panduan = Panduan::find($id_panduan);

        return view('Pengajuan.Admin.editPanduan', ['panduan' => $panduan]);
    }

    function updatePanduanHubin(Request $request, $id_panduan){
        $panduan = Panduan::find($id_panduan);
        $old_file = asset("doc/" . $panduan->file_panduan);
        if ($request->hasFile('file_panduan')) {
            if (File::exists($old_file)) { 
                unlink($old_file);
            }
            $file_panduan = $request->file('file_panduan');
            $file_panduan_name = time() . "_" . $file_panduan->getClientOriginalName();
            $file_panduan->move('doc/', $file_panduan_name);
        } else {
            $file_panduan_name = $panduan->file_panduan;
        }

        $panduan->nama_panduan = $request->nama_panduan;
        $panduan->deskripsi = $request->deskripsi;
        $panduan->file_panduan = $request->hasFile('file_panduan') ? $file_panduan_name : $panduan->file_panduan;
        $panduan->save();
    
        return redirect('/admin/hubin/panduan')->with('update', 'Data berhasil di Perbarui!');
    }

    function deletePanduanHubin($id_panduan){
        Panduan::find($id_panduan)->delete();

        return redirect('/admin/hubin/panduan')->with('delete', 'Data berhasil di hapus!');
    }
    // Hubin-END

    // Kakom
    function kakom(){
        $formulir = Formulir::latest()->take(3)->get();
        $pembimbing = User::latest()->where('role','pembimbing')->take(6)->get();
        $siswaMonitoring = Siswa::where('status','1')->count();
        $siswaPengajuan = Siswa::where('status','0')->count();

        return view('Pengajuan.Admin.dashboard', [
            'formulir' => $formulir,
            'pembimbing' => $pembimbing,
            'siswaMonitoring' => $siswaMonitoring,
            'siswaPengajuan' => $siswaPengajuan
        ]);
    }

    function storeFormulirKakom(Request $request){
        $user = Auth::user()->guru->id_jurusan;

        // Simpan formulir baru
        $formulir = new Formulir;
        $formulir->id_lowongan = $request->id_lowongan;
        $formulir->approve_kakom = '0';
        $formulir->id_jurusan = $user;
        $formulir->save();
    
        // Dapatkan ID formulir yang baru saja disimpan
        $idFormulirBaru = $formulir->id_formulir;
    
        // Ambil array id_siswa dari checkbox
        $siswaIds = $request->siswa;
    
        // Loop melalui setiap siswa yang dipilih
        foreach ($siswaIds as $siswaId) {
            $siswa = Siswa::find($siswaId);
    
            // Perbarui nilai id_formulir
            $siswa->id_formulir = $idFormulirBaru;
            $siswa->save();
        }
    
        return redirect('/admin/kakom/formsiswa')->with('store', 'Data formulir berhasil ditambahkan!');
    }    

    function approveKakom(Request $request) {
        $id_formulir = $request->input('id_formulir'); 

        $affected = DB::table('formulir')
        ->where('id_formulir', $id_formulir)
        ->update(['approve_kakom' => 1]);

        if ($affected) {
            return redirect('/admin/kakom/formsiswa')->with('success', 'Data Siswa telah diapprove oleh Kakom!');
        }

        return redirect('/admin/kakom/formsiswa')->with('error', 'Error, Data sudah diapprove!');
    }

    public function storePerusahaanKakom(Request $request)
    {
    $file = $request->file('gambar');
    $gambar = time() . "_" . $file->getClientOriginalName();
    $tujuanupload = 'img/perusahaan';
    $file->move($tujuanupload, $gambar);

    Perusahaan::create([
        'nama_perusahaan' => $request->nama_perusahaan,
        'deskripsi' => $request->deskripsi,
        'alamat_perusahaan' => $request->alamat_perusahaan,
        'contact_person' => $request->contact_person,
        'jurusan' => $request->jurusan,
        'gambar_perusahaan' => $gambar,
    ]);

    return redirect('/admin/kakom/daftarperusahaan')->with('store', 'Data perusahaan berhasil ditambahkan!');
    }

    public function updatePerusahaanKakom(Request $request, $id_perusahaan)
    {
    $perusahaan = Perusahaan::find($id_perusahaan);

    if ($perusahaan) {
        $old_image = public_path("img/perusahaan/" . $perusahaan->gambar_perusahaan);

        if ($request->hasFile('image')) {
            if (File::exists($old_image)) {
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move('img/perusahaan', $image_name);
        } else {
            $image_name = $perusahaan->gambar_perusahaan;
        }

        $perusahaan->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'deskripsi' => $request->deskripsi,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'contact_person' => $request->contact_person,
            'jurusan' => $request->jurusan,
            'gambar_perusahaan' => $request->hasFile('image') ? $image_name : $perusahaan->gambar_perusahaan,
        ]);

        return redirect('/admin/kakom/daftarperusahaan')->with('update', 'Data berhasil diperbarui!');
        }
    }

    public function deletePerusahaanKakom($id_perusahaan)
    {
        $perusahaan = Perusahaan::find($id_perusahaan);

        if ($perusahaan) {
            $image_path = public_path("img/perusahaan/" . $perusahaan->gambar_perusahaan);

        if (File::exists($image_path)) {
            unlink($image_path);
        }

            $perusahaan->delete();

            return redirect('/admin/kakom/daftarperusahaan')->with('delete', 'Data berhasil dihapus!');
        }
    }

    function storeDaftarsiswaKakom(Request $request){
        $user = Auth::user()->guru->jurusan->id_jurusan;

        $file = $request->file('gambar');
        $gambar = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'img/siswa';
        $file->move($tujuanupload, $gambar);

        $siswadetail = new Siswadetail;
        $siswadetail->nama_bapak = $request->nama_bapak ?? '-';
        $siswadetail->nama_ibu = $request->nama_ibu ?? '-';
        $siswadetail->pekerjaan_bapak = $request->pekerjaan_bapak ?? '-';
        $siswadetail->pekerjaan_ibu = $request->pekerjaan_ibu ?? '-';
        $siswadetail->umur_bapak = $request->umur_bapak ?? '-';
        $siswadetail->umur_ibu = $request->umur_ibu ?? '-';
        $siswadetail->nomor_telepon_bapak = $request->nomor_telepon_bapak ?? '-';
        $siswadetail->nomor_telepon_ibu = $request->nomor_telepon_ibu ?? '-';
        $siswadetail->umur = $request->umur ?? '-';
        $siswadetail->agama = $request->agama ?? '-';
        $siswadetail->tempat_lahir = $request->tempat_lahir ?? '-';
        $siswadetail->tanggal_lahir = $request->tanggal_lahir ?? '-';
        $siswadetail->save();

        $id_siswadetail_baru = $siswadetail->id_siswadetail;

        $siswa = new Siswa;
        $siswa->id_siswa = $request->id_siswa;
        $siswa->id_guru = $request->id_guru;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nomor_telepon = $request->nomor_telepon;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_jurusan = $user;
        $siswa->id_angkatan = $request->id_angkatan;
        $siswa->status = '0';
        $siswa->sudah_memilih = '0';
        $siswa->gambar_siswa = $gambar;

        $siswa->id_siswadetail = $id_siswadetail_baru;
        $siswa->save();

        return redirect('/admin/kakom/daftarsiswa')->with('store', 'Data siswa berhasil di tambah!');
    }

    public function updateSiswaKakom(Request $request, $id_siswa){
        $siswa = Siswa::find($id_siswa);
        $user = Auth::user()->guru->jurusan->id_jurusan;
        $old_image = asset("img/siswa/" . $siswa->gambar_siswa);
        if ($request->hasFile('image')) {
            if (File::exists($old_image)) { 
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move('img/siswa', $image_name);
        } else {
            $image_name = $siswa->gambar_siswa;
        }

        $siswadetail = Siswadetail::find($id_siswa);
        $siswadetail->nama_bapak = $request->nama_bapak ?? '-';
        $siswadetail->nama_ibu = $request->nama_ibu ?? '-';
        $siswadetail->pekerjaan_bapak = $request->pekerjaan_bapak ?? '-';
        $siswadetail->pekerjaan_ibu = $request->pekerjaan_ibu ?? '-';
        $siswadetail->umur_bapak = $request->umur_bapak ?? '-';
        $siswadetail->umur_ibu = $request->umur_ibu ?? '-';
        $siswadetail->nomor_telepon_bapak = $request->nomor_telepon_bapak ?? '-';
        $siswadetail->nomor_telepon_ibu = $request->nomor_telepon_ibu ?? '-';
        $siswadetail->umur = $request->umur ?? '-';
        $siswadetail->agama = $request->agama ?? '-';
        $siswadetail->tempat_lahir = $request->tempat_lahir ?? '-';
        $siswadetail->tanggal_lahir = $request->tanggal_lahir ?? '-';
        $siswadetail->save();

        $siswa->id_siswa = $request->id_siswa;
        $siswa->id_guru = $request->id_guru;
        $siswa->id_siswadetail = $request->id_siswadetail;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nomor_telepon = $request->nomor_telepon;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_jurusan = $user;
        $siswa->id_angkatan = $request->id_angkatan;
        $siswa->status = $request->status;
        $siswa->gambar_siswa = $request->hasFile('image') ? $image_name : $siswa->gambar_siswa;
        $siswa->save();
    
        return redirect('/admin/kakom/daftarsiswa')->with('update', 'Data berhasil di Perbarui!');
    }

    function deleteSiswaKakom($id_siswa){
        $siswa = Siswa::find($id_siswa);

        if ($siswa) {
            $user = User::where('id_siswa', $siswa->id_siswa)->first();

            if ($user) {
                $user->delete();
            }

            $siswa->delete();
        }

        return redirect('/admin/kakom/daftarsiswa')->with('delete', 'Data berhasil dihapus!');
    }

    function storeAkunsiswaKakom(Request $request){

        DB::table('users')->insert([
            'email' => $request->email,
            'password' => $request->password,
            'id_siswa' => $request->id_siswa,
            'role' => 'siswa',
            'angkatan' => $request->angkatan,
        ]);


        return redirect('/admin/kakom/akunsiswa')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    function updateAkunsiswaKakom(Request $request, $id){
        $request->validate([
            'password'=>'required'
        ],[
            'password.required'=>'Password Wajib Diisi'
        ]);

        $akunsiswa = User::find($id);
        $akunsiswa->id_siswa = $request->id_siswa;
        $akunsiswa->email = $request->email;
        $akunsiswa->password = $request->password;
        $akunsiswa->angkatan = $request->angkatan;
        $akunsiswa->save();

        return redirect('/admin/kakom/akunsiswa')->with('update', 'Data berhasil di Perbarui!');
    }

    public function deleteAkunsiswaKakom($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/kakom/akunsiswa')->with('delete', 'Data berhasil di hapus!');
    }

    function storeDaftarguruKakom(Request $request){
        $file = $request->file('gambar');
        $gambar = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'img/guru';
        $file->move($tujuanupload, $gambar);

        Guru::insert([
            'id_guru' => $request->id_guru,
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_jurusan' => $request->id_jurusan,
            'jabatan' => $request->jabatan,
            'gambar_guru' => $gambar
        ]);

        return redirect('/admin/kakom/daftarguru')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    public function updateGuruKakom(Request $request, $id_guru){
        $guru = DB::table('guru')->where('id_guru', $id_guru)->first();
        $old_image = asset("img/guru/" . $guru->gambar_guru);
        if ($request->hasFile('image')) {
            if (File::exists($old_image)) { 
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move('img/guru', $image_name);
        } else {
            $image_name = $guru->gambar_guru;
        }

        DB::table('guru')->where('id_guru', $id_guru)->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jurusan' => $request->jurusan,
            'jabatan' => $request->jabatan,
            'gambar_guru' => $request->hasFile('image') ? $image_name : $guru->gambar_guru,
        ]);
    
        return redirect('/admin/kakom/daftarguru')->with('update', 'Data berhasil di Perbarui!');
    }

    function deleteGuruKakom($id_guru){
        $guru = Guru::find($id_guru);
        $guru->delete();

        return redirect('/admin/kakom/daftarguru')->with('delete', 'Data berhasil di hapus!');
    }

    function storeAkunpembimbingKakom(Request $request){

        $user = new User;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_guru = $request->id_guru;
        $user->role = 'pembimbing';
        $user->angkatan = $request->angkatan;
        $user->save();

        return redirect('/admin/kakom/akunpembimbing')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    function updateAkunpembimbingKakom(Request $request, $id){
        $request->validate([
            'password'=>'required'
        ],[
            'password.required'=>'Error, Password Wajib Diisi!'
        ]);

        $akunpembimbing = User::find($id);
        $akunpembimbing->id_guru = $request->id_guru;
        $akunpembimbing->email = $request->email;
        $akunpembimbing->password = $request->password;
        $akunpembimbing->angkatan = $request->angkatan;
        $akunpembimbing->save();

        return redirect('/admin/kakom/akunpembimbing')->with('update', 'Data berhasil di Perbarui!');
    }

    public function deleteAkunpembimbingKakom($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/kakom/akunpembimbing')->with('delete', 'Data berhasil di hapus!');
    }
    // Kakom-END
    
    // Kurikulum
    function kurikulum(){
        $formulir = Formulir::latest()->take(3)->get();
        $pembimbing = User::latest()->where('role','pembimbing')->take(6)->get();
        $siswaMonitoring = Siswa::where('status','1')->count();
        $siswaPengajuan = Siswa::where('status','0')->count();

        return view('Pengajuan.Admin.dashboard', [
            'formulir' => $formulir,
            'pembimbing' => $pembimbing,
            'siswaMonitoring' => $siswaMonitoring,
            'siswaPengajuan' => $siswaPengajuan
        ]);
    }

    function kurikulumDetailFormSiswa($id_formulir){
        $formulir = DB::table('formulir')->where('id_formulir',$id_formulir)->get();

        return view('Pengajuan.Admin.formsiswadetail',['dataformulir' => $formulir]);
    }

    function approveKurikulum(Request $request) {
        $id_formulir = $request->input('id_formulir'); 

        $affected = DB::table('formulir')
        ->where('id_formulir', $id_formulir)
        ->update(['approve_kurikulum' => 1]);

        if ($affected) {
            return redirect('/admin/kurikulum/formsiswa')->with('success', 'Data Siswa telah diapprove oleh Kurikulum!');
        }

        return redirect('/admin/kurikulum/formsiswa')->with('error', 'Error, Data sudah diapprove!');
    }
    // Kurikulum-END

    // SuperAdmin
    function superadmin(){
        $formulir = Formulir::latest()->take(3)->get();
        $pembimbing = User::latest()->where('role','pembimbing')->take(6)->get();
        $siswaMonitoring = Siswa::where('status','1')->count();
        $siswaPengajuan = Siswa::where('status','0')->count();

        return view('Pengajuan.Admin.dashboard', [
            'formulir' => $formulir,
            'pembimbing' => $pembimbing,
            'siswaMonitoring' => $siswaMonitoring,
            'siswaPengajuan' => $siswaPengajuan
        ]);
    }

    function storeFormulirSuperadmin(Request $request){
        $formulir = new Formulir;
        $formulir->id_siswa = $request->id_siswa;
        $formulir->id_perusahaan = $request->id_perusahaan;
        $formulir->posisi = $request->posisi;
        $formulir->approve_superadmin = '0';
        $formulir->approve_hubin = '0';
        $formulir->approve_kurikulum = '0';
        $formulir->save();


        return redirect('/admin/superadmin/formsiswa')->with('store', 'Data formulir berhasil di tambah!');
    }

    function storePerusahaanSuperadmin(Request $request){

        $file = $request->file('gambar');
        $gambar = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'img/perusahaan';
        $file->move($tujuanupload, $gambar);

        DB::table('perusahaan')->insert([
            'id_perusahaan' => $request->id_perusahaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'deskripsi' => $request->deskripsi,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'contact_person' => $request->contact_person,
            'jurusan' => $request->jurusan,
            'gambar_perusahaan' => $gambar
        ]);


        return redirect('/admin/superadmin/daftarperusahaan')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    public function updatePerusahaanSuperadmin(Request $request, $id_perusahaan){
        $perusahaan = DB::table('perusahaan')->where('id_perusahaan', $id_perusahaan)->first();
        $old_image = asset("img/perusahaan/" . $perusahaan->gambar_perusahaan);
        if ($request->hasFile('image')) {
            if (File::exists($old_image)) { 
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move('img/perusahaan', $image_name);
        } else {
            $image_name = $perusahaan->gambar_perusahaan;
        }

        DB::table('perusahaan')->where('id_perusahaan', $id_perusahaan)->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'deskripsi' => $request->deskripsi,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'contact_person' => $request->contact_person,
            'jurusan' => $request->jurusan,
            'gambar_perusahaan' => $request->hasFile('image') ? $image_name : $perusahaan->gambar_perusahaan,
        ]);
    
        return redirect('/admin/superadmin/daftarperusahaan')->with('update', 'Data berhasil di Perbarui!');
    }

    function deletePerusahaanSuperadmin($id_perusahaan){
        DB::table('perusahaan')->where('id_perusahaan',$id_perusahaan)->delete();

        return redirect('/admin/superadmin/daftarperusahaan')->with('delete', 'Data berhasil di hapus!');
    }

    function storeDaftarsiswaSuperadmin(Request $request){
        $user = Auth::user()->guru->jurusan->id_jurusan;

        $file = $request->file('gambar');
        $gambar = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'img/siswa';
        $file->move($tujuanupload, $gambar);

        $siswadetail = new Siswadetail;
        $siswadetail->nama_bapak = $request->nama_bapak ?? '-';
        $siswadetail->nama_ibu = $request->nama_ibu ?? '-';
        $siswadetail->pekerjaan_bapak = $request->pekerjaan_bapak ?? '-';
        $siswadetail->pekerjaan_ibu = $request->pekerjaan_ibu ?? '-';
        $siswadetail->umur_bapak = $request->umur_bapak ?? '-';
        $siswadetail->umur_ibu = $request->umur_ibu ?? '-';
        $siswadetail->nomor_telepon_bapak = $request->nomor_telepon_bapak ?? '-';
        $siswadetail->nomor_telepon_ibu = $request->nomor_telepon_ibu ?? '-';
        $siswadetail->umur = $request->umur ?? '-';
        $siswadetail->agama = $request->agama ?? '-';
        $siswadetail->tempat_lahir = $request->tempat_lahir ?? '-';
        $siswadetail->tanggal_lahir = $request->tanggal_lahir ?? '-';
        $siswadetail->save();

        $id_siswadetail_baru = $siswadetail->id_siswadetail;

        $siswa = new Siswa;
        $siswa->id_siswa = $request->id_siswa;
        $siswa->id_guru = $request->id_guru;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nomor_telepon = $request->nomor_telepon;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_jurusan = $user;
        $siswa->id_angkatan = $request->id_angkatan;
        $siswa->status = '0';
        $siswa->sudah_memilih = '0';
        $siswa->gambar_siswa = $gambar;

        $siswa->id_siswadetail = $id_siswadetail_baru;
        $siswa->save();

        return redirect('/admin/superadmin/daftarsiswa')->with('store', 'Data siswa berhasil di tambah!');
    }

    public function updateSiswaSuperadmin(Request $request, $id_siswa){
        $siswa = Siswa::find($id_siswa);
        $old_image = asset("img/siswa/" . $siswa->gambar_siswa);
        if ($request->hasFile('image')) {
            if (File::exists($old_image)) { 
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move('img/siswa', $image_name);
        } else {
            $image_name = $siswa->gambar_siswa;
        }

        $siswadetail = Siswadetail::find($id_siswa);
        $siswadetail->nama_bapak = $request->nama_bapak ?? '-';
        $siswadetail->nama_ibu = $request->nama_ibu ?? '-';
        $siswadetail->pekerjaan_bapak = $request->pekerjaan_bapak ?? '-';
        $siswadetail->pekerjaan_ibu = $request->pekerjaan_ibu ?? '-';
        $siswadetail->umur_bapak = $request->umur_bapak ?? '-';
        $siswadetail->umur_ibu = $request->umur_ibu ?? '-';
        $siswadetail->nomor_telepon_bapak = $request->nomor_telepon_bapak ?? '-';
        $siswadetail->nomor_telepon_ibu = $request->nomor_telepon_ibu ?? '-';
        $siswadetail->umur = $request->umur ?? '-';
        $siswadetail->agama = $request->agama ?? '-';
        $siswadetail->tempat_lahir = $request->tempat_lahir ?? '-';
        $siswadetail->tanggal_lahir = $request->tanggal_lahir ?? '-';
        $siswadetail->save();

        $siswa->id_siswa = $request->id_siswa;
        $siswa->id_guru = $request->id_guru;
        $siswa->id_siswadetail = $request->id_siswadetail;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nomor_telepon = $request->nomor_telepon;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_jurusan = $request->id_jurusan;
        $siswa->id_angkatan = $request->id_angkatan;
        $siswa->status = $request->status;
        $siswa->gambar_siswa = $request->hasFile('image') ? $image_name : $siswa->gambar_siswa;
        $siswa->save();
    
        return redirect('/admin/superadmin/daftarsiswa')->with('update', 'Data berhasil di Perbarui!');
    }

    function deleteSiswaSuperadmin($id_siswa){
        $siswa = Siswa::find($id_siswa);

        if ($siswa) {
            $user = User::where('id_siswa', $siswa->id_siswa)->first();

            if ($user) {
                $user->delete();
            }

            $siswa->delete();
        }

        return redirect('/admin/superadmin/daftarsiswa')->with('delete', 'Data berhasil dihapus!');
    }

    function storeAkunsiswaSuperadmin(Request $request){

        DB::table('users')->insert([
            'email' => $request->email,
            'password' => $request->password,
            'id_siswa' => $request->id_siswa,
            'role' => 'siswa',
            'angkatan' => $request->angkatan,
        ]);


        return redirect('/admin/superadmin/akunsiswa')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    function updateAkunsiswaSuperadmin(Request $request, $id){
        $request->validate([
            'password'=>'required'
        ],[
            'password.required'=>'Error, Password Wajib Diisi!'
        ]);
        
        $akunsiswa = User::find($id);
        $akunsiswa->id_siswa = $request->id_siswa;
        $akunsiswa->email = $request->email;
        $akunsiswa->password = $request->password;
        $akunsiswa->angkatan = $request->angkatan;
        $akunsiswa->save();

        return redirect('/admin/superadmin/akunsiswa')->with('update', 'Data berhasil di Perbarui!');
    }

    public function deleteAkunsiswaSuperadmin($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/superadmin/akunsiswa')->with('delete', 'Data berhasil di hapus!');
    }

    function storeDaftarguruSuperadmin(Request $request){
        $file = $request->file('gambar');
        $gambar = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'img/guru';
        $file->move($tujuanupload, $gambar);

        DB::table('guru')->insert([
            'id_guru' => $request->id_guru,
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jurusan' => $request->jurusan,
            'jabatan' => $request->jabatan,
            'gambar_guru' => $gambar
        ]);


        return redirect('/admin/superadmin/daftarguru')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    public function updateGuruSuperadmin(Request $request, $id_guru){
        $guru = DB::table('guru')->where('id_guru', $id_guru)->first();
        $old_image = asset("img/guru/" . $guru->gambar_guru);
        if ($request->hasFile('image')) {
            if (File::exists($old_image)) { 
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move('img/guru', $image_name);
        } else {
            $image_name = $guru->gambar_guru;
        }

        DB::table('guru')->where('id_guru', $id_guru)->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jurusan' => $request->jurusan,
            'jabatan' => $request->jabatan,
            'gambar_guru' => $request->hasFile('image') ? $image_name : $guru->gambar_guru,
        ]);
    
        return redirect('/admin/superadmin/daftarguru')->with('update', 'Data berhasil di Perbarui!');
    }

    function deleteGuruSuperadmin($id_guru){
        $guru = Guru::find($id_guru);
        $guru->delete();

        return redirect('/admin/superadmin/daftarguru')->with('delete', 'Data berhasil di hapus!');
    }

    function storeAkunpembimbingSuperadmin(Request $request){

        $user = new User;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_guru = $request->id_guru;
        $user->role = 'pembimbing';
        $user->angkatan = $request->angkatan;
        $user->save();

        return redirect('/admin/superadmin/akunpembimbing')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    function updateAkunpembimbingSuperadmin(Request $request, $id){
        $request->validate([
            'password'=>'required'
        ],[
            'password.required'=>'Error, Password Wajib Diisi!'
        ]);

        $akunpembimbing = User::find($id);
        $akunpembimbing->id_guru = $request->id_guru;
        $akunpembimbing->email = $request->email;
        $akunpembimbing->password = $request->password;
        $akunpembimbing->angkatan = $request->angkatan;
        $akunpembimbing->save();

        return redirect('/admin/superadmin/akunpembimbing')->with('update', 'Data berhasil di Perbarui!');
    }

    public function deleteAkunpembimbingSuperadmin($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/superadmin/akunpembimbing')->with('delete', 'Data berhasil di hapus!');
    }

    function daftarakun(){
        return view('Pengajuan.Admin.daftarakun');
    }

    function akunkurikulum(){
        $totalAkunkurikulum = User::where('role', 'kurikulum')->count();
        $akunkurikulum = User::where('role', 'kurikulum')->paginate(10);

        return view('Pengajuan.Admin.akunkurikulum',[
            'dataakunkurikulum' => $akunkurikulum,
            'totalakunkurikulum' => $totalAkunkurikulum,
        ]);
    }

    public function tambahAkunkurikulum()
    {
        $guruBelumPunyaAkun = Guru::whereDoesntHave('user')->whereHas('siswa')
            ->orderBy('nama_guru', 'asc')
            ->get();

        return view('Pengajuan.Admin.tambahAkunkurikulum', [
            'guru' => $guruBelumPunyaAkun,
        ]);
    }

    function editAkunkurikulum($id){
        $akunkurikulum = User::where('id', $id)->first();
    
        return view('Pengajuan.Admin.editAkunkurikulum', compact('akunkurikulum'));
    }

    function storeAkunkurikulumSuperadmin(Request $request){
        $user = new User;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->nama_kurikulum = $request->nama_kurikulum;
        $user->role = 'kurikulum';
        $user->save();

        return redirect('/admin/superadmin/akunkurikulum')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    function updateAkunkurikulumSuperadmin(Request $request, $id){
        $request->validate([
            'password'=>'required'
        ],[
            'password.required'=>'Error, Password Wajib Diisi!'
        ]);

        $akunkurikulum = User::find($id);
        $akunkurikulum->id_guru = $request->id_guru;
        $akunkurikulum->email = $request->email;
        $akunkurikulum->password = $request->password;
        $akunkurikulum->angkatan = $request->angkatan;
        $akunkurikulum->save();

        return redirect('/admin/superadmin/akunkurikulum')->with('update', 'Data berhasil di Perbarui!');
    }

    public function deleteAkunkurikulumSuperadmin($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/superadmin/akunkurikulum')->with('delete', 'Data berhasil di hapus!');
    }

    function cariAkunhubin(Request $request){
        $searchTerm = $request->input('search');
    
        $hubin = User::whereHas('guru', function ($query) use ($searchTerm) {
            $query->where('nama_guru', 'like', "%{$searchTerm}%");
        })->paginate(10);

        return view('Pengajuan.Admin.cariAkunhubin')->with('dataakunhubin', $hubin);
    }

function akunhubin(){
        $totalakunhubin = User::where('role', 'hubin')->count();
        $akunhubin = User::where('role', 'hubin')->paginate(10);

        return view('Pengajuan.Admin.akunhubin',[
            'dataakunhubin' => $akunhubin,
            'totalakunhubin' => $totalakunhubin,
        ]);
    }

    public function tambahAkunhubin()
    {
        $guru = Guru::orderBy('nama_guru', 'asc') // Mengurutkan berdasarkan nama_guru dari A ke Z
        ->get();

        return view('Pengajuan.Admin.tambahAkunhubin', [
            'guru' => $guru,
        ]);
    }

    function editAkunhubin($id){
        $guru = Guru::find($id);
        $akunhubin = User::where('id_guru', $id)->first();
    
        return view('Pengajuan.Admin.editAkunhubin', compact('guru', 'akunhubin'));
    }

function storeAkunhubinSuperadmin(Request $request){

        $user = new User;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_guru = $request->id_guru;
        $user->role = 'hubin';
        $user->save();

        return redirect('/admin/superadmin/akunhubin')->with('store', 'Data hubin berhasil di tambah!');
    }

    function updateAkunhubinSuperadmin(Request $request, $id){
        $request->validate([
            'password'=>'required'
        ],[
            'password.required'=>'Error, Password Wajib Diisi!'
        ]);

        $akunhubin = User::find($id);
        $akunhubin->id_guru = $request->id_guru;
        $akunhubin->email = $request->email;
        $akunhubin->password = $request->password;
        $akunhubin->save();

        return redirect('/admin/superadmin/akunhubin')->with('update', 'Data berhasil di Perbarui!');
    }

    public function deleteakunhubinSuperadmin($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/superadmin/akunhubin')->with('delete', 'Data berhasil di hapus!');
    }

    
function cariAkunkakom(Request $request){
    $searchTerm = $request->input('search');

    $akunkakom = User::whereHas('guru', function ($query) use ($searchTerm) {
        $query->where('nama_guru', 'like', "%{$searchTerm}%");
    })->paginate(10);

    return view('Pengajuan.Admin.cariAkunkakom')->with('datakakom', $akunkakom);
}

function akunkakom(){
    $totalAkunkakom = User::where('role', 'kakom')->count();
    $akunkakom = User::where('role', 'kakom')->paginate(10);

    return view('Pengajuan.Admin.akunkakom',[
        'dataakunkakom' => $akunkakom,
        'totalAkunkakom' => $totalAkunkakom,
    ]);
}

public function tambahAkunkakom()
{
    $guru = Guru::orderBy('nama_guru', 'asc') // Mengurutkan berdasarkan nama_guru dari A ke Z
        ->get();

    return view('Pengajuan.Admin.tambahAkunkakom', [
        'guru' => $guru,
    ]);
}

function editAkunkakom($id){
    $guru = Guru::find($id);
    $akunkakom = User::where('id_guru', $id)->first();

    return view('Pengajuan.Admin.editAkunKakom', compact('guru', 'akunkakom'));
}

function storeAkunkakomSuperadmin(Request $request){

    $user = new User;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->id_guru = $request->id_guru;
    $user->role = 'kakom';
    $user->save();

    return redirect('/admin/superadmin/akunkakom')->with('store', 'Data kakom berhasil di tambah!');
}

function updateAkunkakomSuperadmin(Request $request, $id){
    $request->validate([
        'password'=>'required'
    ],[
        'password.required'=>'Error, Password Wajib Diisi!'
    ]);

    $akunkakom = User::find($id);
    $akunkakom->id_guru = $request->id_guru;
    $akunkakom->email = $request->email;
    $akunkakom->password = $request->password;
    $akunkakom->save();

    return redirect('/admin/superadmin/akunkakom')->with('update', 'Data berhasil di Perbarui!');
}

public function deleteakunkakomSuperadmin($id)
{
    $user = User::find($id);
    $user->delete();

    return redirect('/admin/superadmin/akunkakom')->with('delete', 'Data berhasil di hapus!');
}


    function angkatan(){
        $totalangkatan = DB::table('angkatan')->count();
        $daftarangkatan = DB::table('angkatan')->paginate(10);

        return view('Pengajuan.Admin.angkatan',[
            'dataangkatan'=>$daftarangkatan,
            'totalangkatan'=>$totalangkatan
        ]);
    }

    function tambahAngkatan(){
        return view('Pengajuan.Admin.tambahAngkatan');
    }

    function storeAngkatan(Request $request){
        $angkatan = new Angkatan;
        $angkatan->angkatan = $request->angkatan;
        $angkatan->tahun_pembelajaran = $request->tahun_pembelajaran;
        $angkatan->save();

        return redirect('/admin/superadmin/angkatan')->with('store', 'Data angkatan berhasil di tambah!');
    }

    function editAngkatan($id_angkatan){
        $angkatan = Angkatan::find($id_angkatan);
    
        return view('Pengajuan.Admin.editAngkatan', compact('angkatan'));
    }

    function updateAngkatan(Request $request, $id_angkatan){
        $angkatan = Angkatan::find($id_angkatan);
        $angkatan->angkatan = $request->angkatan;
        $angkatan->tahun_pembelajaran = $request->tahun_pembelajaran;
        $angkatan->save();

        return redirect('/admin/superadmin/angkatan')->with('update', 'Data berhasil di Perbarui!');
    }

    function deleteAngkatan($id_angkatan){
        DB::table('angkatan')->where('id_angkatan',$id_angkatan)->delete();

        return redirect('/admin/superadmin/angkatan')->with('delete', 'Data berhasil di hapus!');
    }

    function jurusan(){
        $totaljurusan = DB::table('jurusan')->count();
        $daftarjurusan = DB::table('jurusan')->paginate(10);

        return view('Pengajuan.Admin.jurusan',[
            'datajurusan'=>$daftarjurusan,
            'totaljurusan'=>$totaljurusan
        ]);
    }

    function tambahJurusan(){
        return view('Pengajuan.Admin.tambahJurusan');
    }

    function storeJurusan(Request $request){
        $file = $request->file('gambar');
        $gambar = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'img/jurusan';
        $file->move($tujuanupload, $gambar);

        $jurusan = new Jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->gambar_jurusan = $gambar;
        $jurusan->save();

        return redirect('/admin/superadmin/jurusan')->with('store', 'Data jurusan berhasil di tambah!');
    }

    function editJurusan($id_jurusan){
        $jurusan = Jurusan::find($id_jurusan);
    
        return view('Pengajuan.Admin.editJurusan', compact('jurusan'));
    }

    function updateJurusan(Request $request, $id_jurusan){
        $jurusan = Jurusan::find($id_jurusan);
        $old_image = asset("img/jurusan/" . $jurusan->gambar_jurusan);
        if ($request->hasFile('image')) {
            if (File::exists($old_image)) { 
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move('img/jurusan', $image_name);
        } else {
            $image_name = $jurusan->gambar_jurusan;
        }

        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->gambar_jurusan = $request->hasFile('image') ? $image_name : $jurusan->gambar_jurusan;
        $jurusan->save();

        return redirect('/admin/superadmin/jurusan')->with('update', 'Data berhasil di Perbarui!');
    }

    function deleteJurusan($id_jurusan){
        Jurusan::where('id_jurusan',$id_jurusan)->delete();

        return redirect('/admin/superadmin/jurusan')->with('delete', 'Data berhasil di hapus!');
    }

    function history(){
        $history = History::paginate(10);

        return view('Pengajuan.Admin.history', ['datahistory' => $history]);
    }

    function deleteHistorylogin($id_historylogin){
        History::find($id_historylogin)->delete();

        return redirect('/admin/superadmin/history')->with('delete', 'Data berhasil di hapus!');
    }
    // SuperAdmin-END
}
