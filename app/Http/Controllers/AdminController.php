<?php

namespace App\Http\Controllers;

use App\Multimedia;
use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Riwayat;
// use App\KasKeluar;
// use App\KasMasuk;
use App\Pesan;
use Auth;
use Image;
use DB;
use PDF;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Home Admin
    public function index()
    {
        $masuk = DB::table('kas_masuk')->sum('bayar');
        $keluar = DB::table('kas_keluar')->sum('bayar');
        $pesan = Pesan::count();
        $bendahara = User::where('level', 'bendahara')->count();
        $siswa = Siswa::count();

        return view('admin/index', compact('masuk', 'keluar', 'bendahara', 'pesan', 'siswa'));
    }

    // Setting Akun
    public function setting_akun()
    {
        return view('admin/akun/setting');
    }

    public function update_akun(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->foto) {
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $filename = time() . '.' . $foto->getClientOriginalExtension();
                Image::make($foto)->save(public_path('/img/user/' . $filename));
            }
            $user->foto = $filename;
        }

        $user->update([
            'name' => $request->get('name'),
        ]);

        Riwayat::create([
            'users_id' => Auth::user()->id,
            'riwayat' => ' Merubah akun profile.'
        ]);

        return redirect('/admin/akun');
    }

    public function update_password(Request $request, $id)
    {
        User::find($id)
            ->update([
                'password' => bcrypt($request->new_password),
            ]);
        return redirect('/admin/akun');
    }


    // Data User
    public function get_data_user($id)
    {
        $user = User::where('id', $id)->first();
        return $user;
    }

    public function user()
    {
        $user = User::where('level', 'bendahara')->get();
        return view('admin/user/index', compact('user'));
    }

    public function user_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:3',
            'kelas' => 'required',
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password')),
            'kelas' => $request->get('kelas'),
            'level' => 'bendahara',
            'foto' => 'default.png',
        ]);

        Riwayat::create([
            'users_id' => Auth::user()->id,
            'riwayat' => 'Menambahkan bendahara ' . $request->get('name'),
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Akun berhasil buat!',
        ]);
    }

    public function user_update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->foto) {
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $filename = time() . '.' . $foto->getClientOriginalExtension();
                image::make($foto)->save(public_path('/img/user/' . $filename));
            }
            $user->foto = $filename;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->kelas = $request->kelas;
        $user->save();

        Riwayat::create([
            'users_id' => Auth::user()->id,
            'riwayat' => 'Mengubah bendahara ' . $request->get('name'),
        ]);

        return redirect()->route('user');
    }

    public function user_show($id)
    {
        $riwayat = Riwayat::where('users_id', $id)->get();
        $user = User::find($id);

        return view('admin/user/show', compact('riwayat', 'user'));
    }

    public function user_delete($id)
    {
        User::find($id)->delete();

        Riwayat::create([
            'users_id' => Auth::user()->id,
            'riwayat' => 'Menghapus bendahara',
        ]);

        return redirect()->route('user');
    }


    // Data Siswa
    // public function get_data_siswa($id)
    // {
    //     $siswa = Siswa::where('id', $id)->first();
    //     return $siswa;
    // }

    public function siswa()
    {
        $siswa = Siswa::get()->count();
        $user = User::where('level', 'bendahara')->get();
        return view('admin/siswa/index', compact('user', 'siswa'));
    }

    public function siswa_show($id)
    {
        $user = User::find($id);
        $siswa = Siswa::where('users_id', $id)->get();
        return view('admin/siswa/show', compact('siswa', 'user'));
    }


    // Riwayat
    public function riwayat()
    {
        $riwayat = Riwayat::where('users_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin/riwayat/index', compact('riwayat'));
    }

    // public function riwayat_delete()
    // {
    //     $riwayat = Riwayat::where('users_id', Auth::user()->id)->delete();
    //     return redirect('/admin/riwayat');
    // }


    // Pembayaran
    public function pembayaran_masuk()
    {
        $kas_masuk = DB::table('kas_masuk')
            ->join('siswa', 'siswa.id', 'kas_masuk.siswa_id')
            ->join('users', 'users.id', 'kas_masuk.users_id')
            ->select('kas_masuk.*', 'siswa.nama_siswa', 'users.name', 'users.kelas')
            ->orderBy('created_at', 'desc')
            ->get();
        $user = User::where('level', 'bendahara')->get();

        return view('/admin/pembayaran/masuk', compact('kas_masuk', 'user'));
        // return $kas_masuk;
    }

    public function pembayaran_show_masuk($id)
    {
        $user = User::find($id);
        $kas_masuk = DB::table('kas_masuk')
            ->where('kas_masuk.users_id', $id)
            ->join('siswa', 'siswa.id', 'kas_masuk.siswa_id')
            ->select('kas_masuk.*', 'siswa.nama_siswa')
            ->get();
        $total = DB::table('kas_masuk')
            ->where('users_id', $id)
            ->sum('bayar');

        return view('/admin/pembayaran/masuk_show', compact('user', 'kas_masuk', 'total'));
    }

    public function pembayaran_keluar()
    {
        $kas_keluar = DB::table('kas_keluar')
            ->join('users', 'users.id', 'kas_keluar.users_id')
            ->select('kas_keluar.*', 'users.name')
            ->orderBy('created_at', 'desc')
            ->get();
        $user = User::where('level', 'bendahara')->get();

        return view('/admin/pembayaran/keluar', compact('kas_keluar', 'user'));
        // return $kas_masuk;
    }

    public function pembayaran_show_keluar($id)
    {
        $user = User::find($id);
        $kas_keluar = DB::table('kas_keluar')
            ->where('users_id', $id)
            ->get();
        $total = DB::table('kas_keluar')
            ->where('users_id', $id)
            ->sum('bayar');

        return view('/admin/pembayaran/keluar_show', compact('user', 'kas_keluar', 'total'));
    }

    public function cetak_kas_masuk_all()
    {
        $kas_masuk = DB::table('kas_masuk')
            ->join('siswa', 'siswa.id', 'kas_masuk.siswa_id')
            ->select('kas_masuk.*', 'siswa.nama_siswa')
            ->get();
        $total_masuk = DB::table('kas_masuk')->sum('bayar');
        set_time_limit(300);
        $pdf = PDF::loadview('admin/pembayaran/all-kas-masuk-pdf', compact('kas_masuk', 'total_masuk'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function cetak_kas_keluar_all()
    {
        $kas_keluar = DB::table('kas_keluar')
            ->join('users', 'users.id', 'kas_keluar.users_id')
            ->select('kas_keluar.*', 'users.name')
            ->orderBy('created_at', 'desc')
            ->get();
        $total_keluar = DB::table('kas_keluar')
            ->sum('bayar');
        set_time_limit(300);
        $pdf = PDF::loadview('admin/pembayaran/all-kas-keluar-pdf', compact('kas_keluar', 'total_keluar'))->setPaper('A4', 'potrait');;
        return $pdf->stream();
    }

    public function cetak_pembayaran_masuk($id)
    {
        $user = User::find($id);
        $kas_masuk = DB::table('kas_masuk')
            ->where('kas_masuk.users_id', $id)
            ->join('siswa', 'siswa.id', 'kas_masuk.siswa_id')
            ->select('kas_masuk.*', 'siswa.nama_siswa')
            ->get();
        $total_masuk = DB::table('kas_masuk')
            ->where('users_id', $id)
            ->sum('bayar');
        set_time_limit(300);
        $pdf = PDF::loadview('admin/pembayaran/kas-masuk-pdf', compact('kas_masuk', 'user', 'total_masuk'))->setPaper('A4', 'potrait');;
        return $pdf->stream();
    }

    public function cetak_pembayaran_keluar($id)
    {
        $user = User::find($id);
        $kas_keluar = DB::table('kas_keluar')
            ->join('users', 'users.id', 'kas_keluar.users_id')
            ->select('kas_keluar.*', 'users.name')
            ->where('users_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        $total_keluar = DB::table('kas_keluar')
            ->where('users_id', $id)
            ->sum('bayar');
        set_time_limit(300);
        $pdf = PDF::loadview('admin/pembayaran/kas-keluar-pdf', compact('kas_keluar', 'user', 'total_keluar'))->setPaper('A4', 'potrait');;
        return $pdf->stream();
    }


    // Pesan
    public function pesan()
    {
        $pesan = Pesan::get();
        return view('/admin/pesan/index', compact('pesan'));
    }

    public function pesan_read(Request $request, $id)
    {
        Pesan::find($id)->update([
            'status' => 'true',
        ]);

        return redirect('/admin/pesan');
    }

    public function multimedia_index()
    {
        $multimedia = Multimedia::get();
        return view('admin/multimedia/index', compact('multimedia'));
    }

    public function multimedia_store(Request $request)
    {
        $video = $request->get('video');
        $exp = explode("=", $video);

        Multimedia::create([
            'judul' => $request->get('judul'),
            'video' => $exp[1],
        ]);

        Riwayat::create([
            'users_id' => Auth::user()->id,
            'riwayat' => 'Menambah multimedia',
        ]);

        return redirect('/admin/multimedia');
    }

    public function multimedia_delete($id)
    {
        Multimedia::find($id)->delete();
        return redirect('/admin/multimedia');
    }
}
