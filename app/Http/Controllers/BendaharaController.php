<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;
use App\Riwayat;
use App\Pesan;
use App\KasMasuk;
use App\KasKeluar;
use App\Multimedia;
use Carbon\Carbon;
use Auth;
use Image;
use DB;
use PDF;

class BendaharaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Home Bendahara
    public function index()
    {
        $masuk = DB::table('kas_masuk')
            ->where('users_id', Auth::user()->id)
            ->sum('bayar');

        $keluar = DB::table('kas_keluar')
            ->where('users_id', Auth::user()->id)
            ->sum('bayar');

        $multimedia = Multimedia::get();

        return view('user/index', compact('masuk', 'keluar', 'multimedia'));
    }

    // Setting Akun
    public function setting_akun()
    {
        return view('user/akun/setting');
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

        return redirect('/user/akun/');
    }

    // Siswa
    public function siswa()
    {
        $siswa = Siswa::where('users_id', Auth::user()->id)->orderBy('nama_siswa', 'asc')->get();
        return view('/user/siswa/index', compact('siswa'));
    }

    public function siswa_store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'jk' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'users_id' => 'required',
        ]);

        Siswa::create([
            'nama_siswa' => $request->get('nama_siswa'),
            'jk' => $request->get('jk'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'users_id' => Auth::user()->id,
        ]);

        Riwayat::create([
            'users_id' => Auth::user()->id,
            'riwayat' => 'Menambah siswa yang bernama ' . $request->get('nama_siswa'),
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Siswa berhasil ditambahkan.',
        ]);
    }

    public function siswa_delete($id)
    {
        $siswa = Siswa::find($id)->delete();
        Riwayat::create([
            'users_id' => Auth::user()->id,
            'riwayat' => 'Menghapus siswa',
        ]);

        return redirect('/user/siswa');
    }

    // Riwayat
    public function riwayat()
    {
        $riwayat = Riwayat::where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(50);
        return view('user/riwayat/index', compact('riwayat'));
    }

    // public function riwayat_delete()
    // {
    //     $riwayat = Riwayat::where('users_id', Auth::user()->id)->delete();
    //     return redirect('/user/riwayat');
    // }

    // Pembayaran
    public function pembayaran()
    {
        $siswa = Siswa::where('users_id', Auth::user()->id)
            ->orderBy('nama_siswa', 'asc')
            ->get();

        return view('user/pembayaran/index', compact('siswa'));
    }

    public function pembayaran_user($id)
    {
        $siswa = Siswa::find($id);
        $bayar = DB::table('kas_masuk')->where('siswa_id', $id)->get();
        // $bayar = DB::table('kas_masuk')->where('siswa_id', $id)
        //     ->orderBy('created_at', 'desc')
        //     ->limit(1)
        //     ->get();

        // return $bayar;
        return view('/user/pembayaran/show', compact('siswa', 'bayar'));
    }

    public function pembayaran_store(Request $request)
    {
        $bayar = DB::table('kas_masuk')->insert([
            'users_id' => Auth::user()->id,
            'siswa_id' => $request->siswa_id,
            'bayar' => $request->bayar,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        Riwayat::create([
            'users_id' => Auth::user()->id,
            'riwayat' => 'Menambah pembayaran siswa ' . $request->nama_siswa,
        ]);

        return redirect('/user/pembayaran/masuk');
    }

    // public function pembayaran_delete($id)
    // {
    //     DB::table('bayar')->where('id', $id)->delete();
    //     return redirect('/user/pembayaran');
    // }

    public function get_data_bayar($id)
    {
        $bayar = Bayar::where('id', $id)->first();
        return $bayar;
    }

    // Jumlah kas
    public function pembayaran_masuk()
    {
        $auth = Auth::user()->id;
        $masuk = DB::table('kas_masuk')
            ->join('siswa', 'siswa.id', 'kas_masuk.siswa_id')
            ->select('kas_masuk.*', 'siswa.nama_siswa')
            ->where('kas_masuk.users_id', $auth)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        // ->get();

        return view('user/pembayaran/masuk', compact('masuk'));
    }

    public function pembayaran_keluar()
    {
        $auth = Auth::user()->id;
        $keluar = DB::table('kas_keluar')
            ->where('users_id', $auth)
            ->get();
        $masuk = DB::table('kas_masuk')
            ->where('users_id', $auth)
            ->sum('bayar');

        return view('user/pembayaran/keluar', compact('keluar', 'masuk'));
    }

    public function pembayaran_keluar_store(Request $request)
    {
        if ($request->file('bukti')) {
            $file = $request->file('bukti');
            $nama_file = uniqid() . "." . $file->getClientOriginalExtension();
            $tujuan_upload = 'img/bukti';
            $file->move($tujuan_upload, $nama_file);
        } else {
            $nama_file = NULL;
        }

        DB::table('kas_keluar')->insert([
            'users_id' => Auth::user()->id,
            'bayar' => $request->bayar,
            'ket' => $request->ket,
            'bukti' => $nama_file,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        return redirect('/user/pembayaran/keluar');
    }

    // public function pembayaran_keluar_delete($id)
    // {
    //     DB::table('kas_keluar')->where('id', $id)->delete();

    //     Riwayat::create([
    //         'users_id' => Auth::user()->id,
    //         'riwayat' => 'Menghapus pembayaran keluar',
    //     ]);

    //     return redirect('/user/pembayaran/keluar');
    // }

    public function cetak_kas_masuk()
    {
        $kas_masuk = DB::table('kas_masuk')
            ->where('kas_masuk.users_id', Auth::user()->id)
            ->join('siswa', 'siswa.id', 'kas_masuk.siswa_id')
            ->select('kas_masuk.*', 'siswa.nama_siswa')
            ->get();
        set_time_limit(300);
        $pdf = PDF::loadview('user/pembayaran/kas-masuk-pdf', compact('kas_masuk'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function cetak_kas_masuk_siswa($id)
    {
        $siswa = Siswa::find($id);
        $kas_masuk = DB::table('kas_masuk')
            ->where('kas_masuk.users_id', Auth::user()->id)
            ->where('kas_masuk.siswa_id', $id)
            ->join('siswa', 'siswa.id', 'kas_masuk.siswa_id')
            ->select('kas_masuk.*', 'siswa.nama_siswa')
            ->get();
        set_time_limit(300);
        $pdf = PDF::loadview('user/pembayaran/kas-masuk-siswa-pdf', compact('kas_masuk', 'siswa'))->setPaper('A4', 'potrait');;
        return $pdf->stream();
        // return $kas_masuk;
    }

    public function cetak_kas_keluar()
    {
        $kas_keluar = DB::table('kas_keluar')
            ->join('users', 'users.id', 'kas_keluar.users_id')
            ->select('kas_keluar.*', 'users.name')
            ->where('users_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        set_time_limit(300);
        $pdf = PDF::loadview('user/pembayaran/kas-keluar-pdf', compact('kas_keluar',))->setPaper('A4', 'potrait');;
        return $pdf->stream();
    }

    // Pesan
    public function pesan()
    {
        $pesan = Pesan::where('users_id', Auth::user()->id)->get();

        return view('/user/pesan/index', compact('pesan'));
    }

    public function pesan_create()
    {
        return view('/user/pesan/create');
    }

    public function pesan_store(Request $request)
    {
        Pesan::create([
            'users_id' => Auth::user()->id,
            'status' => 'false',
            'isi' => $request->isi,
        ]);

        Riwayat::create([
            'users_id' => Auth::user()->id,
            'riwayat' => 'Mengirim pesan ke admin',
        ]);

        return redirect()->back();
    }

    public function get_data_pesan($id)
    {
        $pesan = Pesan::find($id);
        return $pesan;
    }
}
