<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class PublicController extends Controller
{
    //
    public function campaigns(){
      $campaigns = Campaign::get();
      return view("frontend.campaigns", compact("campaigns"));
    }

      public function showCampaign($id){
        $campaign = Campaign::findOrFail($id);
        return view("frontend.show-campaign", compact("campaign"));
      }
}
