<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    /**
     * Send donate request to the api.
     *
     * @return \Illuminate\Http\Response
     */
    public function donate(Request $request)
    {
        //
        $amount = $request['amount'];
        $campaign_id = $request['campaign_id'];
        $contribution = new Donation();
        $url = $contribution->donate($campaign_id,$amount);

        return redirect()->away($url);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function index(){
        $donations = Donation::where('user_id', auth()->user()->id)->get();
        return view('dashboard.donations.index', compact('donations'));
    }
}
