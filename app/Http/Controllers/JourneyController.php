<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Journey;

class JourneyController extends Controller
{
    public function store()
    {
        return [
            'content' => request('content')
        ];
    }

    public function search()
    {
        return view('search', [
            'start_code' => request('start_code'),
            'end_code' => request('end_code')
        ]);
    }
}
