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
        $contribution = new Donation();
        $response = $contribution->donate($amount);

        $url = "";

        foreach($response as $respond)
        {
            $url =  $respond['transaction_url'];
        }
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
}
