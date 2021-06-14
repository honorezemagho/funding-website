<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Donation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function generateTransaction($campaign_id, $amount)
    {


        $transaction_id = Str::random(19);

        $validator = Validator::make(['transaction_id' => $transaction_id], ['$transaction_id' => 'unique:payments,transaction_id']);

        while ($validator->fails()) {
            $transaction_id = Str::random(19);
            $validator = Validator::make(['transaction_id' => $transaction_id], ['$transaction_id' => 'unique:payments,transaction_id']);
        }

        $random = Str::random(6);
        $transaction_id = Hash::make($random, ['rounds' => 12]);

        $user_id = auth()->user()->id;

        $this->create(['transaction_id' => $transaction_id, 'campaign_id' => $campaign_id,
         'user_id' => $user_id, 'amount' => $amount ]);

        return $transaction_id;
    }




    public function donate($campaign_id, $amount)
    {
        $transaction_id = $this->generateTransaction($campaign_id, $amount);
        $root_url = url('/');

        $response = Http::withBasicAuth(env('PAYUNIT_USER'), env('PAYUNIT_PASSWORD'))->withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => env('PAYUNIT_APIKEY'),
                    'mode' => 'test',
                  ])->post(env('PAYUNIT_BASEURL').'/gateway/initialize', [
                    'total_amount' => $amount,
                    'currency' => 'XAF',
                    'transaction_id' => $transaction_id,
                    'return_url' => $root_url.'/success',
                  ]);

        $results = $response->getBody()->getContents();
        $results = json_decode($results);
        return $results->data->transaction_url;
    }

    public function donator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}
