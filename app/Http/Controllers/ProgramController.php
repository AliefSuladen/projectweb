<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Event = new Event();
    }
    public function evnlist()
    {
        $data = [
            'title' => 'Event',
            'event' => $this->Event->AllData(),
        ];

        return view('admin.program.evnlist', $data);
    }
    public function evnadd()
    {
        $data = [
            'title' => 'Event',
            'event' => $this->Event->AllData(),
            'kategori' => $this->Event->AllDataKategori(),

        ];

        return view('admin.program.evnadd', $data);
    }

    public function evninsert()
    {
        Request()->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'lokasi' => 'required',
            'url' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
            'foto' => 'required',
        ]);
        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);
        $data = [
            'nama' => Request()->nama,
            'id_kategori' => Request()->id_kategori,
            'lokasi' => Request()->lokasi,
            'url' => Request()->url,
            'tanggal' => Request()->tanggal,
            'isi' => Request()->isi,
            'foto' => $filename,
        ];
        $this->Event->InsertData($data);
        return redirect()->route('berita')->with('pesan', 'Data Berhasil Ditambahkan');
    }


    public function evnedit($id)
    {
        $data = [
            'title' => 'Event',
            'event' => $this->Event->DetailData($id),
            'kategori' => $this->Event->AllDataKategori(),

        ];

        return view('admin.program.evnedit', $data);
    }

    public function evnupdate($id)
    {
        Request()->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'lokasi' => 'required',
            'url' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
        ]);
        if (Request()->foto <> "") {
            $event = $this->Event->DetailData($id);
            if ($event->foto <> "") {
                unlink(public_path('foto') . '/' . $event->foto);
            }
            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);
            $data = [
                'nama' => Request()->nama,
                'id_kategori' => Request()->id_kategori,
                'lokasi' => Request()->lokasi,
                'url' => Request()->url,
                'tanggal' => Request()->tanggal,
                'isi' => Request()->isi,
                'foto' => $filename,
            ];
            $this->Event->UpdateData($id, $data);
        } else {
            $data = [
                'nama' => Request()->nama,
                'id_kategori' => Request()->id_kategori,
                'lokasi' => Request()->lokasi,
                'url' => Request()->url,
                'tanggal' => Request()->tanggal,
                'isi' => Request()->isi,
            ];
            $this->Event->UpdateData($id, $data);
        }
        return redirect()->route('berita')->with('pesan', 'Data Berhasil Di Update');
    }
    public function evndelete($id)
    {
        $event = $this->Event->DetailData($id);
        if ($event->foto <> "") {
            unlink(public_path('foto') . '/' . $event->foto);
        }
        $this->Event->DeleteData($id);
        return redirect()->route('berita')->with('pesan', 'Data Berhasil Di Hapus');
    }

    public function kategorilist()
    {
        $data = [
            'title' => 'Kategori Program',
            'kategori' => $this->Event->AllDataKategori(),
        ];

        return view('admin.program.kategorilist', $data);
    }
    public function kategoriadd()
    {
        $data = [
            'title' => 'Tambah Data Kategori Program',
            'kategori' => $this->Event->AllDataKategori(),

        ];

        return view('admin.program.kategoriadd', $data);
    }

    public function kategoriinsert()
    {
        Request()->validate([
            'nama_kategori' => 'required',

        ]);
        $data = [
            'nama_kategori' => Request()->nama_kategori,

        ];
        $this->Event->InsertDataKategori($data);
        return redirect()->route('kategori')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    public function kategoridelete($id)
    {
        $this->Event->DeleteDataKategori($id);
        return redirect()->route('kategori')->with('pesan', 'Data Berhasil Di Hapus');
    }

    public function nopelist()
    {
        $data = [
            'title' => 'Nomor Penting',
            'event' => $this->Event->AllDataNope(),
        ];

        return view('admin.program.nopelist', $data);
    }
    public function nopeadd()
    {
        $data = [
            'title' => 'Tambah Data Nomor Penting',
            'kategori' => $this->Event->AllDataNope(),

        ];

        return view('admin.program.nopeadd', $data);
    }
    public function nopeinsert()
    {
        Request()->validate([
            'nama' => 'required',
            'nope' => 'required',

        ]);
        $data = [
            'nama' => Request()->nama,
            'nope' => Request()->nope,

        ];
        $this->Event->InsertDataNope($data);
        return redirect()->route('nope')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    public function nopedelete($id)
    {
        $this->Event->DeleteDataNope($id);
        return redirect()->route('nope')->with('pesan', 'Data Berhasil Di Hapus');
    }
}
