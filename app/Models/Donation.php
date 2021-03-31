<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;



class Donation extends Model
{
    use HasFactory;

    public function donate($amount){

        $random = Str::random(6);
        $transaction_id = Hash::make($random,[
                      'rounds' => 12,
                  ]);
        // $token = base64_encode("env('PAYUNIT_USER'):env('PAYUNIT_PASSWORD')");

        $response = Http::withBasicAuth(env('PAYUNIT_USER'), env('PAYUNIT_PASSWORD'))->withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => env('PAYUNIT_APIKEY'),
                    'mode' => 'test',
                  ])->post(env('PAYUNIT_BASEURL').'/gateway/initialize', [
                    'total_amount' => $amount,
                    'currency' => 'XAF',
                    'transaction_id' => $transaction_id,
                    'return_url' => 'http://127.0.0.1:8000/success',
                  ]);

    return $response->json();

    }
}
