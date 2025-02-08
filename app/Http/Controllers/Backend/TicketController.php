<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Auth;


class TicketController extends Controller
{
    public function index()
    {
        //Show Admin Role Only With
        if(Auth::user()->hasRole('Super-Admin'))
        {
            $tickets = Ticket::all();
            return view('backend.support-tickets.index', compact('tickets'));
        } else {
            $tickets = Ticket::where('status', 'open')->OrWhere('status','pending')->get();
            return view('backend.support-tickets.index', compact('tickets'));
        }

    }


    public function create()
    {
        return view ('backend.support-tickets.create');
    }

    public function mytickets()
    {
        //Show Admin Role Only With
        $tickets = Ticket::where('user_id', Auth::user()->id)->all();
        return view('backend.support-tickets.index', compact('tickets'));
    }
}
