<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taman;
use App\Event;
use App\Partisipasi;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }

    // Taman
    public function tamanIndex() {
    	return view('pages.admin.taman-index');
    }

    public function tamanAdd() {
    	return view('pages.admin.taman-add');
    }

    // test

    public function tamanDelete($id) {
        $eventCount = Event::where('taman_id', $id)->count();
        if($eventCount > 0) {
            return redirect(route('admin.taman.index'))->with('error', 'Terdapat event pada taman ini');
        }

        $taman = Taman::find($id);
        $taman->delete();
        return redirect(route('admin.taman.index'))->with('success', 'Berhasil menghapus taman');
    }

    public function tamanPost(Request $req) {
        if($req->hasFile('foto')) {
            $originName = $req->file('foto')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('foto')->getClientOriginalExtension();

            if(in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('foto')->move(public_path('uploads/taman'), $fileName);

                $taman = new Taman;
                $taman->nama = $req->input('nama');
                $taman->alamat = $req->input('alamat');
                $taman->latlng = $req->input('latlng');
                $taman->deskripsi_pendek = $req->input('desc-pendek');
                $taman->deskripsi_panjang = $req->input('desc-lengkap');
                $taman->foto = $fileName;
                $taman->save();
                return redirect(route('admin.taman.index'))->with('success', 'Berhasil menambah taman');
            }else{
                return redirect(route('admin.taman.index'))->with('error', 'Tipe file tidak didukung');
            }
        }else{
            return redirect(route('admin.taman.index'))->with('error', 'Upload image dulu');
        }
    }

    public function tamanEdit($id) {
        $taman = Taman::find($id);
        return view('pages.admin.taman-edit')->with('taman', $taman);
    }

    public function tamanUpdate(Request $req, $id) {
        $filenameToStore = null;
        
        if($req->hasFile('foto')) {
            $originName = $req->file('foto')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('foto')->getClientOriginalExtension();
            
            if(in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('foto')->move(public_path('uploads/taman'), $fileName);
                $filenameToStore = $fileName;
            }else{
                return redirect(route('admin.taman.index'))->with('error', 'Tipe file tidak didukung');
            }
        }

        $taman = Taman::find($id);
        $taman->nama = $req->input('nama');
        $taman->alamat = $req->input('alamat');
        $taman->latlng = $req->input('latlng');
        $taman->deskripsi_pendek = $req->input('desc-pendek');
        $taman->deskripsi_panjang = $req->input('desc-lengkap');

        if($filenameToStore != null) {
            $taman->foto = $filenameToStore;
        }

        $taman->save();
        return redirect(route('admin.taman.index'))->with('success', 'Berhasil mengubah taman');
    }

    public function jsonTamanIndex() {
    	$taman = Taman::orderBy('nama', 'asc');
        return datatables()->of($taman)
        ->addIndexColumn()
        ->addColumn('action', function($taman) {
            return view('partials.action-taman-index')->with('taman', $taman);
        })
        ->rawColumns(['action'])
        ->make(true);
    }





    // Event
    public function eventIndex() {
        return view('pages.admin.event-index');
    }

    public function eventAdd() {
        $tamans = Taman::orderBy('nama', 'asc')->get();
        return view('pages.admin.event-add')->with('tamans', $tamans);
    }

    public function eventDelete($id) {
        $event = Event::find($id);
        $event->delete();
        return redirect(route('admin.event.index'))->with('success', 'Berhasil menghapus event');
    }

    public function eventPost(Request $req) {
        if($req->hasFile('foto')) {
            $originName = $req->file('foto')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('foto')->getClientOriginalExtension();

            if(in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('foto')->move(public_path('uploads/event'), $fileName);

                $event = new Event;
                $event->nama = $req->input('nama');
                $event->taman_id = $req->input('taman_id');
                $event->waktu_mulai = $req->input('waktu_mulai');
                $event->waktu_selesai = $req->input('waktu_selesai');
                $event->deskripsi = $req->input('deskripsi');
                $event->foto = $fileName;
                $event->save();
                return redirect(route('admin.event.index'))->with('success', 'Berhasil menambah event');
            }else{
                return redirect(route('admin.event.index'))->with('error', 'Tipe file tidak didukung');
            }
        }else{
            return redirect(route('admin.event.index'))->with('error', 'Upload image dulu');
        }
    }

    public function eventEdit($id) {
        $event = Event::find($id);
        $tamans = Taman::orderBy('nama', 'asc')->get();
        return view('pages.admin.event-edit')
            ->with('tamans', $tamans)
            ->with('event', $event);
    }

    public function eventUpdate(Request $req, $id) {
        $filenameToStore = null;
        
        if($req->hasFile('foto')) {
            $originName = $req->file('foto')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $req->file('foto')->getClientOriginalExtension();
            
            if(in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $fileName = $fileName.'_'.time().'.'.$extension;
                $req->file('foto')->move(public_path('uploads/event'), $fileName);
                $filenameToStore = $fileName;
            }else{
                return redirect(route('admin.event.index'))->with('error', 'Tipe file tidak didukung');
            }
        }

        $event = Event::find($id);
        $event->nama = $req->input('nama');
        $event->taman_id = $req->input('taman_id');
        $event->waktu_mulai = $req->input('waktu_mulai');
        $event->waktu_selesai = $req->input('waktu_selesai');
        $event->deskripsi = $req->input('deskripsi');

        if($filenameToStore != null) {
            $event->foto = $filenameToStore;
        }

        $event->save();
        return redirect(route('admin.event.index'))->with('success', 'Berhasil mengubah event');
    }

    public function jsonEventIndex() {
        $event = Event::orderBy('nama', 'asc');
        return datatables()->of($event)
        ->addIndexColumn()
        ->addColumn('lokasi', function($event) {
            return $event->taman->nama;
        })
        ->addColumn('waktu', function($event) {
            return date('Y-m-d H:i', strtotime($event->waktu_mulai)) . ' - ' . date('Y-m-d H:i', strtotime($event->waktu_selesai));
        })
        ->addColumn('action', function($event) {
            return view('partials.action-event-index')->with('event', $event);
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function partisipasiTanggapi(Request $req, $id) {
        $part = Partisipasi::find($id);
        $part->tanggapan = $req->input('desc-lengkap');
        if($part->save()) {
            return redirect(route('partisipasi-masyarakat'))->with('success', 'Berhasil menyimpan tanggapan');
        }else{
            return redirect(route('partisipasi-masyarakat.detail', $id))->with('error', 'Berhasil menyimpan tanggapan');
        }
        
    }

    public function partisipasiDelete($id) {
        $part = Partisipasi::find($id);
        if($part->delete()) {
            return redirect(route('partisipasi-masyarakat'))->with('success', 'Berhasil menghapus usulan');
        }else{
            return redirect(route('partisipasi-masyarakat'))->with('error', 'Gagal menghapus usulan');
        }
    }
}
