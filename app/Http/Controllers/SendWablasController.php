<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\WablasTrait;

class SendWablasController extends Controller
{
    public function index()
    {
        return view('wablas.form_send');
    }

    public function store()
    {
        $kumpulan_data = [];
        $data['phone'] = request('no_wa');
        $data['message'] = request('pesan');
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($kumpulan_data, $data);
        WablasTrait::sendText($kumpulan_data);
        return redirect()->back();
    }
}
