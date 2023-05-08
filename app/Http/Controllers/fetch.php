<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class fetch extends Controller
{
    //
    public function fetch_word()
    {
        // Retrieve the words from the URL
        // $words_url = 'http://sandbox.mc.edu/~bennet/php/hangwords.txt';
        // $words = file($words_url, FILE_IGNORE_NEW_LINES);

        // // Insert the words into the database
        // foreach ($words as $word) {
        //     DB::table('words_s')->insert(['words' => $word]);
        // }
        // Get the last inserted word id from the database
// $lastWordId = DB::table('words_s')->max('idd');

// // Get all the words from the URL starting from the last inserted word id
// $words_url = 'http://sandbox.mc.edu/~bennet/php/hangwords.txt';
// $words = file($words_url, FILE_IGNORE_NEW_LINES);
// $words = array_slice($words, $lastWordId);

// Insert the words into the database
// foreach ($words as $word) {
//     DB::table('words_s')->insert(['words' => $word]);
// }
     

        $random_word = DB::table('words_s')
        ->whereRaw('LENGTH(words) > 4')
        ->orderByRaw('RAND()')
        ->limit(1)
        ->value('words');

        return view('hangman_home',['word'=>$random_word]);
    }
    
}
