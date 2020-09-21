<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use App\Partisipasi;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postReview(Request $req) {
    	$skor = $req->input('skor');
    	$ulasan = $req->input('ulasan');
    	$taman_id = $req->input('taman_id');

    	if($skor < 1) $skor = 1;
    	if($skor > 5) $skor = 5;

    	$review = new Review;
    	$review->user_id = auth()->user()->id;
    	$review->taman_id = $taman_id;
    	$review->komentar = $ulasan;
    	$review->skor = $skor;
    	$review->save();

    	return redirect(route('taman', $taman_id))->with('success', 'Berhasil menambah ulasan');
    }

    public function profile() {
    	return view('pages.profile');
    }

    public function profileUpdate(Request $req) {
    	$user = User::find(auth()->user()->id);
    	$user->name = $req->input('name');
    	$user->email = $req->input('email');
    	$user->save();
    	return redirect(route('profile'))->with('success', 'Berhasil mengubah profil');
    }

    public function partisipasiAdd() {
        return view('pages.partisipasi-add');
    }

    public function partisipasiPost(Request $req) {
        $partisipasi = new Partisipasi;
        $partisipasi->user_id = auth()->user()->id;
        $partisipasi->lokasi = $req->input('lokasi');
        $partisipasi->keterangan = $req->input('desc-lengkap');
        $partisipasi->koordinat = $req->input('koordinat');
        if($partisipasi->save()) {
            return redirect(route('partisipasi-masyarakat'))->with('success', 'Berhasil menambah usulan');
        }else{
            return redirect(route('partisipasi-add'))->with('error', 'Gagal menambah usulan');
        }
    }
}
