<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taman;
use App\Event;
use App\Review;
use App\Partisipasi;

class GuestController extends Controller
{
    public function home() {
        $mapData = [];
        $tamans = Taman::all();
        $tamanSlides = Taman::take(5)->orderBy('created_at', 'desc')->get();
        foreach($tamans as $taman) {
            $arr = [];
            $arr['id'] = $taman->id;
            $arr['name'] = $taman->nama;
            $arr['profileImage'] = 'uploads/taman/' . $taman->foto;
            $arr['pos'] = explode(',', $taman->latlng);
            $arr['contentString'] = $taman->deskripsi_pendek;
            array_push($mapData, $arr);
        }

    	return view('pages.index')
    	    ->with('mapData', json_encode($mapData))
    	    ->with('tamanSlides', $tamanSlides);
    }

    public function tamanList() {
        $tamanList = [];
        $tamans = Taman::all();
        foreach($tamans as $taman) {
            $arr = [];
            $arr['id'] = $taman->id;
            $arr['name'] = $taman->nama;
            $arr['alamat'] = $taman->alamat;
            $arr['profileImage'] = 'uploads/taman/' . $taman->foto;
            $arr['pos'] = explode(',', $taman->latlng);
            $arr['contentString'] = $taman->deskripsi_pendek;
            array_push($tamanList, $arr);
        }
    	return view('pages.taman-list')
        ->with('tamanList', json_encode($tamanList));
    }

    public function tamanSearch(Request $req) {
        $q = $req->input('q');
        $tamanList = [];
        $tamans = Taman::where(function($query) use ($q) {
            $query->where('nama', 'like', '%' . $q . '%')
                ->orWhere('deskripsi_pendek', 'like', '%' . $q . '%')
                ->orWhere('deskripsi_panjang', 'like', '%' . $q . '%');
        })->get();
        foreach($tamans as $taman) {
            $arr = [];
            $arr['id'] = $taman->id;
            $arr['name'] = $taman->nama;
            $arr['alamat'] = $taman->alamat;
            $arr['profileImage'] = 'uploads/taman/' . $taman->foto;
            $arr['pos'] = explode(',', $taman->latlng);
            $arr['contentString'] = $taman->deskripsi_pendek;
            array_push($tamanList, $arr);
        }
        return view('pages.taman-list')
        ->with('tamanList', json_encode($tamanList));
    }

    public function taman($id) {
    	$taman = Taman::find($id);
        $reviews = Review::where('taman_id', $id)->orderBy('created_at', 'desc');
    	return view('pages.taman')->with('taman', $taman)
            ->with('reviews', $reviews->get())
            ->with('sum', $reviews->sum('skor'))
            ->with('count', $reviews->count());
    }



    // Events
    public function eventList() {
        $events = Event::all();
        return view('pages.event-list')
        ->with('events', $events);
    }

    public function eventSearch(Request $req) {
        $q = $req->input('q');
        $events = Event::where(function($query) use ($q) {
            $query->where('nama', 'like', '%' . $q . '%')
                ->orWhere('deskripsi', 'like', '%' . $q . '%');
        })->get();
        return view('pages.event-list')
        ->with('events', $events);
    }

    public function event($id) {
        $event = Event::find($id);
        return view('pages.event')->with('event', $event);
    }

    public function partisipasi() {
        $data = Partisipasi::orderBy('tanggapan')->get();
        return view('pages.partisipasi')->with('data', $data);
    }

    public function partisipasiDetail($id) {
        $data = Partisipasi::find($id);
        return view('pages.partisipasi-detail')->with('data', $data);
    }
}
