<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function show(){

        $mark= Mark::with('user')->get();
        dd($mark);
    }
}
