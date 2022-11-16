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
        ];

        return view('admin.program.evnadd', $data);
    }

    public function evninsert()
    {
        Request()->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
            'foto' => 'required',
        ]);
        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);
        $data = [
            'nama' => Request()->nama,
            'lokasi' => Request()->lokasi,
            'tanggal' => Request()->tanggal,
            'isi' => Request()->isi,
            'foto' => $filename,
        ];
        $this->Event->InsertData($data);
        return redirect()->route('event')->with('pesan', 'Data Berhasil Ditambahkan');
    }


    public function evnedit($id)
    {
        $data = [
            'title' => 'Event',
            'event' => $this->Event->DetailData($id),
        ];

        return view('admin.program.evnedit', $data);
    }

    public function evnupdate($id)
    {
        Request()->validate([
            'nama' => 'required',
            'lokasi' => 'required',
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
                'lokasi' => Request()->lokasi,
                'tanggal' => Request()->tanggal,
                'isi' => Request()->isi,
                'foto' => $filename,
            ];
            $this->Event->UpdateData($id, $data);
        } else {
            $data = [
                'nama' => Request()->nama,
                'lokasi' => Request()->lokasi,
                'tanggal' => Request()->tanggal,
                'isi' => Request()->isi,
            ];
            $this->Event->UpdateData($id, $data);
        }
        return redirect()->route('event')->with('pesan', 'Data Berhasil Di Update');
    }
    public function evndelete($id)
    {
        $event = $this->Event->DetailData($id);
        if ($event->foto <> "") {
            unlink(public_path('foto') . '/' . $event->foto);
        }
        $this->Event->DeleteData($id);
        return redirect()->route('event')->with('pesan', 'Data Berhasil Di Hapus');
    }

    public function pelatihanlist()
    {
        $data = [
            'title' => 'Pelatihan',
            'event' => $this->Event->AllDataPelatihan(),
        ];

        return view('admin.program.pelatihan', $data);
    }
    public function pelatihanadd()
    {
        $data = [
            'title' => 'Pelatihan',
            'event' => $this->Event->AllDataPelatihan(),
        ];

        return view('admin.program.pelatihanadd', $data);
    }
    public function pelatihaninsert()
    {
        Request()->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
            'foto' => 'required',
        ]);
        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);
        $data = [
            'nama' => Request()->nama,
            'lokasi' => Request()->lokasi,
            'tanggal' => Request()->tanggal,
            'isi' => Request()->isi,
            'foto' => $filename,
        ];
        $this->Event->InsertDataPelatihan($data);
        return redirect()->route('pelatihan')->with('pesan', 'Data Berhasil Ditambahkan');
    }
}
