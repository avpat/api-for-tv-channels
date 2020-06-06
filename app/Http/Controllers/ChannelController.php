<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class ChannelController extends Controller
{
    public function showAll()
    {
        return Channel::all();
    }
}
