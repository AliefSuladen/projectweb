<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;

class KelurahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Kelurahan = new Kelurahan();
    }
    public function kelurahanlist()
    {
        $data = [
            'title' => 'Data Kelurahan',
            'kelurahan' => $this->Kelurahan->AllData(),
        ];

        return view('admin.kelurahan.kelurahanlist', $data);
    }
    public function kelurahanadd()
    {
        $data = [
            'title' => 'Tambah Data Kelurahan',
            'kelurahan' => $this->Kelurahan->AllData(),

        ];

        return view('admin.kelurahan.kelurahanadd', $data);
    }

    public function kelurahaninsert()
    {
        Request()->validate([
            'nama' => 'required',
            'luas' => 'required',
            'jml_penduduk' => 'required',
            'kepadatan' => 'required',
            'kdpos' => 'required',
            'kdmendagri' => 'required',
            'alamat' => 'required',
            'isi' => 'required',
        ]);
        $data = [
            'nama' => Request()->nama,
            'luas' => Request()->luas,
            'jml_penduduk' => Request()->jml_penduduk,
            'kepadatan' => Request()->kepadatan,
            'kdpos' => Request()->kdpos,
            'kdmendagri' => Request()->kdmendagri,
            'alamat' => Request()->alamat,
            'isi' => Request()->isi,
        ];
        $this->Kelurahan->InsertData($data);
        return redirect()->route('kelurahan')->with('pesan', 'Data Berhasil Ditambahkan');
    }


    public function kelurahanedit($id)
    {
        $data = [
            'title' => 'Edit Kelurahan',
            'kelurahan' => $this->Kelurahan->DetailData($id),
        ];

        return view('admin.kelurahan.kelurahanedit', $data);
    }

    public function kelurahanupdate($id)
    {
        Request()->validate([
            'nama' => 'required',
            'luas' => 'required',
            'jml_penduduk' => 'required',
            'kepadatan' => 'required',
            'kdpos' => 'required',
            'kdmendagri' => 'required',
            'alamat' => 'required',
            'isi' => 'required',
        ]);
        $data = [
            'nama' => Request()->nama,
            'luas' => Request()->luas,
            'jml_penduduk' => Request()->jml_penduduk,
            'kepadatan' => Request()->kepadatan,
            'kdpos' => Request()->kdpos,
            'kdmendagri' => Request()->kdmendagri,
            'alamat' => Request()->alamat,
            'isi' => Request()->isi,
        ];
        $this->Kelurahan->UpdateData($id, $data);
        return redirect()->route('kelurahan')->with('pesan', 'Data Berhasil Di Update');
    }
    public function kelurahandelete($id)
    {
        $this->Kelurahan->DeleteData($id);
        return redirect()->route('kelurahan')->with('pesan', 'Data Berhasil Di Hapus');
    }

    public function pegawailist()
    {
        $data = [
            'title' => 'Pegawai Kelurahan',
            'pegawai' => $this->Kelurahan->AllDataPegawai(),


        ];

        return view('admin.kelurahan.pegawailist', $data);
    }
    public function pegawaiadd()
    {
        $data = [
            'title' => 'Pegawai Kelurahan',
            'pegawai' => $this->Kelurahan->AllDataPegawai(),
            'kelurahan' => $this->Kelurahan->AllData(),

        ];

        return view('admin.kelurahan.pegawaiadd', $data);
    }
    public function pegawaiinsert()
    {
        Request()->validate([
            'nama_pegawai' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'id_kelurahan' => 'required',
            'foto' => 'required',
        ]);
        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);
        $data = [
            'nama_pegawai' => Request()->nama_pegawai,
            'nip' => Request()->nip,
            'jabatan' => Request()->jabatan,
            'id_kelurahan' => Request()->id_kelurahan,
            'foto' => $filename,
        ];
        $this->Kelurahan->InsertDataPegawai($data);
        return redirect()->route('pegawai')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    public function pegawaiedit($id)
    {
        $data = [
            'title' => 'Edit Pegawai',
            'pegawai' => $this->Kelurahan->DetailDataPegawai($id),
            'kelurahan' => $this->Kelurahan->AllData(),
        ];

        return view('admin.kelurahan.pegawaiedit', $data);
    }

    public function pegawaiupdate($id)
    {
        Request()->validate([
            'nama_pegawai' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'id_kelurahan' => 'required',
        ]);
        if (Request()->foto <> "") {
            $pegawai = $this->Kelurahan->DetailDataPegawai($id);
            if ($pegawai->foto <> "") {
                unlink(public_path('foto') . '/' . $pegawai->foto);
            }
            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);
            $data = [
                'nama_pegawai' => Request()->nama_pegawai,
                'nip' => Request()->nip,
                'jabatan' => Request()->jabatan,
                'id_kelurahan' => Request()->id_kelurahan,
                'foto' => $filename,
            ];
            $this->Kelurahan->UpdateDataPegawai($id, $data);
        } else {
            $data = [
                'nama_pegawai' => Request()->nama_pegawai,
                'nip' => Request()->nip,
                'jabatan' => Request()->jabatan,
                'id_kelurahan' => Request()->id_kelurahan,
            ];
            $this->Kelurahan->UpdateDataPegawai($id, $data);
        }
        return redirect()->route('pegawai')->with('pesan', 'Data Berhasil Di Update');
    }
    public function pegawaidelete($id)
    {
        $pegawai = $this->Kelurahan->DetailDataPegawai($id);
        if ($pegawai->foto <> "") {
            unlink(public_path('foto') . '/' . $pegawai->foto);
        }
        $this->Kelurahan->DeleteDataPegawai($id);
        return redirect()->route('pegawai')->with('pesan', 'Data Berhasil Di Hapus');
    }
}
