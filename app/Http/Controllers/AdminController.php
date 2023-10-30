<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Guru;
use App\Models\Perusahaan;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Angkatan;
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

    // CRUD
    function formsiswa(){
        $formsiswa = Formulir::paginate(10);
        $totalFormulirSiswa = DB::table('formulir')->count();

        $belumDiApproveKakom = DB::table('formulir')->where('approve_kakom', 0)->count();
        $sudahDiApproveKakom = DB::table('formulir')->where('approve_kakom', 1)->count();

        $belumDiApproveHubin = DB::table('formulir')->where('approve_hubin', 0)->count();
        $sudahDiApproveHubin = DB::table('formulir')->where('approve_hubin', 1)->count();

        $belumDiApproveKurikulum = DB::table('formulir')->where('approve_kurikulum', 0)->count();
        $sudahDiApproveKurikulum = DB::table('formulir')->where('approve_kurikulum', 1)->count();
        $sudahDiApproveSemua = 0;
        foreach ($formsiswa as $item) {
            if ($item->approve_kakom == 1 && $item->approve_hubin == 1 && $item->approve_kurikulum == 1) {
                $sudahDiApproveSemua++;
            }
        }

        return view('Pengajuan.Admin.formsiswa',[
            'dataformulir' => $formsiswa,
            'totalFormulirSiswa' => $totalFormulirSiswa,
            'belumDiApproveKakom' => $belumDiApproveKakom,
            'sudahDiApproveKakom' => $sudahDiApproveKakom,
            'belumDiApproveHubin' => $belumDiApproveHubin,
            'sudahDiApproveHubin' => $sudahDiApproveHubin,
            'belumDiApproveKurikulum' => $belumDiApproveKurikulum,
            'sudahDiApproveKurikulum' => $sudahDiApproveKurikulum,
            'sudahDiApproveSemua' => $sudahDiApproveSemua,
        ]);
    }

    function detailFormSiswa($id_formulir){
        $formulir = Formulir::where('id_formulir',$id_formulir)->first();

        return view('Pengajuan.Admin.formsiswadetail',['dataformulir' => $formulir]);
    }

    function tambahFormulir(){
        $siswa = Siswa::whereDoesntHave('formulir')->get();
        $perusahaan = Perusahaan::get();

        return view('Pengajuan.Admin.tambahFormulir', ['siswa' => $siswa, 'perusahaan' => $perusahaan]);  
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
        $siswa = Siswa::paginate(10);
        $totalSiswa = DB::table('siswa')->count();

        return view('Pengajuan.Admin.daftarSiswa',[
            'datasiswa' => $siswa,
            'totalSiswa' => $totalSiswa
        ]);
    }

    function detailDaftarsiswa($id_siswa){
        $siswa = Siswa::where('id_siswa',$id_siswa)->get();

        return view('Pengajuan.Admin.detailDaftarsiswa',['siswa'=>$siswa]);
    }

    function tambahDaftarsiswa(){
        $guru = Guru::all();

        return view('Pengajuan.Admin.tambahSiswa', ['guru' => $guru]);  
    }

    function editSiswa($id_siswa){
        $siswa = Siswa::where('id_siswa',$id_siswa)->first();
        $guru = Guru::all();

        return view('Pengajuan.Admin.editsiswa', compact('siswa','guru'));
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
        $siswa = Siswa::all();
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
        return view('Pengajuan.Admin.tambahguru');
    }

    function editGuru($id_guru){
        $guru = DB::table('guru')->where('id_guru',$id_guru)->first();

        return view('Pengajuan.Admin.editguru', ['guru' => $guru]);
    }

    function akunpembimbing(){
        $totalakunpembimbing = User::where('role', 'pembimbing')->count();
        $akunpembimbing = User::where('role', 'pembimbing')->paginate(10);

        return view('Pengajuan.Admin.akunpembimbing',[
            'dataakunpembimbing' => $akunpembimbing,
            'totalakunpembimbing' => $totalakunpembimbing,
        ]);
    }

    public function tambahAkunpembimbing()
    {
        $guruBelumPunyaAkun = Guru::whereDoesntHave('user')->whereHas('siswa')
            ->orderBy('nama_guru', 'asc') // Mengurutkan berdasarkan nama_guru dari A ke Z
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
        $formulir = Formulir::latest()->where('approve_kakom',1)->take(3)->get();
        $pembimbing = User::latest()->where('role','pembimbing')->take(6)->get();
        $siswaMonitoring = User::where('is_choosen','1')->count();
        $siswaPengajuan = User::where('is_choosen','0')->count();

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
    // Hubin-END

    // Kakom
    function kakom(){
        $formulir = Formulir::latest()->take(3)->get();
        $pembimbing = User::latest()->where('role','pembimbing')->take(6)->get();
        $siswaMonitoring = User::where('is_choosen','1')->count();
        $siswaPengajuan = User::where('is_choosen','0')->count();

        return view('Pengajuan.Admin.dashboard', [
            'formulir' => $formulir,
            'pembimbing' => $pembimbing,
            'siswaMonitoring' => $siswaMonitoring,
            'siswaPengajuan' => $siswaPengajuan
        ]);
    }

    function storeFormulirKakom(Request $request){
        $formulir = new Formulir;
        $formulir->id_siswa = $request->id_siswa;
        $formulir->id_perusahaan = $request->id_perusahaan;
        $formulir->posisi = $request->posisi;
        $formulir->approve_kakom = '0';
        $formulir->approve_hubin = '0';
        $formulir->approve_kurikulum = '0';
        $formulir->save();


        return redirect('/admin/kakom/formsiswa')->with('store', 'Data formulir berhasil di tambah!');
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

    function storePerusahaanKakom(Request $request){

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


        return redirect('/admin/kakom/daftarperusahaan')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    public function updatePerusahaanKakom(Request $request, $id_perusahaan){
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
    
        return redirect('/admin/kakom/daftarperusahaan')->with('update', 'Data berhasil di Perbarui!');
    }

    function deletePerusahaanKakom($id_perusahaan){
        DB::table('perusahaan')->where('id_perusahaan',$id_perusahaan)->delete();

        return redirect('/admin/kakom/daftarperusahaan')->with('delete', 'Data berhasil di hapus!');
    }

    function storeDaftarsiswaKakom(Request $request){
        $file = $request->file('gambar');
        $gambar = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'img/siswa';
        $file->move($tujuanupload, $gambar);

        $siswa = new Siswa;
        $siswa->id_siswa = $request->id_siswa;
        $siswa->id_guru = $request->id_guru;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->jurusan = $request->jurusan;
        $siswa->angkatan = $request->angkatan;
        $siswa->gambar_siswa = $gambar;
        $siswa->save();


        return redirect('/admin/kakom/daftarsiswa')->with('store', 'Data siswa berhasil di tambah!');
    }

    public function updateSiswaKakom(Request $request, $id_siswa){
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

        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->jurusan = $request->jurusan;
        $siswa->angkatan = $request->angkatan;
        $siswa->id_guru = $request->id_guru;
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
            'username' => $request->username,
            'password' => $request->password,
            'id_siswa' => $request->id_siswa,
            'role' => 'siswa',
            'angkatan' => $request->angkatan,
            'is_choosen' => '0',
        ]);


        return redirect('/admin/kakom/akunsiswa')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    function updateAkunsiswaKakom(Request $request, $id){
        $akunsiswa = User::find($id);
        $akunsiswa->id_siswa = $request->id_siswa;
        $akunsiswa->username = $request->username;
        $akunsiswa->password = $request->password;
        $akunsiswa->angkatan = $request->angkatan;
        $akunsiswa->is_choosen = $request->is_choosen;
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
        $user->username = $request->username;
        $user->password = $request->password;
        $user->id_guru = $request->id_guru;
        $user->role = 'pembimbing';
        $user->angkatan = $request->angkatan;
        $user->save();

        return redirect('/admin/kakom/akunpembimbing')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    function updateAkunpembimbingKakom(Request $request, $id){
        $akunpembimbing = User::find($id);
        $akunpembimbing->id_guru = $request->id_guru;
        $akunpembimbing->username = $request->username;
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
        $formulir = Formulir::latest()->where('approve_hubin',1)->take(3)->get();
        $pembimbing = User::latest()->where('role','pembimbing')->take(6)->get();
        $siswaMonitoring = User::where('is_choosen','1')->count();
        $siswaPengajuan = User::where('is_choosen','0')->count();

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
        $siswaMonitoring = User::where('is_choosen','1')->count();
        $siswaPengajuan = User::where('is_choosen','0')->count();

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
        $file = $request->file('gambar');
        $gambar = time() . "_" . $file->getClientOriginalName();
        $tujuanupload = 'img/siswa';
        $file->move($tujuanupload, $gambar);

        $siswa = new Siswa;
        $siswa->id_siswa = $request->id_siswa;
        $siswa->id_guru = $request->id_guru;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->jurusan = $request->jurusan;
        $siswa->angkatan = $request->angkatan;
        $siswa->gambar_siswa = $gambar;
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

        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->jurusan = $request->jurusan;
        $siswa->angkatan = $request->angkatan;
        $siswa->id_guru = $request->id_guru;
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
            'username' => $request->username,
            'password' => $request->password,
            'id_siswa' => $request->id_siswa,
            'role' => 'siswa',
            'angkatan' => $request->angkatan,
            'is_choosen' => '0',
        ]);


        return redirect('/admin/superadmin/akunsiswa')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    function updateAkunsiswaSuperadmin(Request $request, $id){
        $akunsiswa = User::find($id);
        $akunsiswa->id_siswa = $request->id_siswa;
        $akunsiswa->username = $request->username;
        $akunsiswa->password = $request->password;
        $akunsiswa->angkatan = $request->angkatan;
        $akunsiswa->is_choosen = $request->is_choosen;
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
        $user->username = $request->username;
        $user->password = $request->password;
        $user->id_guru = $request->id_guru;
        $user->role = 'pembimbing';
        $user->angkatan = $request->angkatan;
        $user->save();

        return redirect('/admin/superadmin/akunpembimbing')->with('store', 'Data perusahaan berhasil di tambah!');
    }

    function updateAkunpembimbingSuperadmin(Request $request, $id){
        $akunpembimbing = User::find($id);
        $akunpembimbing->id_guru = $request->id_guru;
        $akunpembimbing->username = $request->username;
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
        $totalangkatan = DB::table('angkatan')->count();
        $daftarangkatan = DB::table('angkatan')->paginate(10);

        return view('Pengajuan.Admin.angkatan',[
            'dataangkatan'=>$daftarangkatan,
            'totalangkatan'=>$totalangkatan
        ]);
    }

    function tambahJurusan(){
        return view('Pengajuan.Admin.tambahJurusan');
    }

    function storeJurusan(Request $request){
        $angkatan = new Angkatan;
        $angkatan->angkatan = $request->angkatan;
        $angkatan->tahun_pembelajaran = $request->tahun_pembelajaran;
        $angkatan->save();

        return redirect('/admin/superadmin/angkatan')->with('store', 'Data angkatan berhasil di tambah!');
    }

    function editJurusan($id_angkatan){
        $angkatan = Angkatan::find($id_angkatan);
    
        return view('Pengajuan.Admin.editJurusan', compact('angkatan'));
    }

    function updateJurusan(Request $request, $id_angkatan){
        $angkatan = Angkatan::find($id_angkatan);
        $angkatan->angkatan = $request->angkatan;
        $angkatan->tahun_pembelajaran = $request->tahun_pembelajaran;
        $angkatan->save();

        return redirect('/admin/superadmin/angkatan')->with('update', 'Data berhasil di Perbarui!');
    }

    function deleteJurusan($id_angkatan){
        DB::table('angkatan')->where('id_angkatan',$id_angkatan)->delete();

        return redirect('/admin/superadmin/angkatan')->with('delete', 'Data berhasil di hapus!');
    }
    // SuperAdmin-END
}
