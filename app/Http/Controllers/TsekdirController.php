<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TsekdirController extends Controller
{
    //
    public function index()
    {
        return view('sekdir.Dsekdir');
    }

    public function persetujuan()
    {
        return view('sekdir.persetujuan');
    }

    public function detail()
    {
        $review = DB::table('vsetujusekdir')->where('isSekdirAcc', '0')->get();
        return view('sekdir.persetujuan', ['review' => $review]);
    }
    public function edit(Request $request, $ID)
    {
        $ID = DB::table('tkompetisi')->where("ID", "$ID")->first();
        return view('sekdir.edit', ['ID' => $ID]);
    }

    public function update(Request $request, $ID)
    {
        $proposal = $request->file('proposal')->getClientOriginalName();
        $request->file('proposal')->storeAs('proposal/', $proposal);

        DB::table('tkompetisi')->where("ID", $ID)->update([
            'proposal' => $request->proposal->getClientOriginalName(),
            // 'isSekdirAcc' => $request->isSekdirAcc,
        ]);
        if ($request->oldProposal) {
            Storage::delete($request->oldProposal);
        };
        return redirect()->route('sekdir.persetujuan')->with('success', 'Data Berhasil Disetujui');
    }

    public function upload()
    {
        return view('sekdir.upload');
    }
}