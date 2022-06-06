<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function sayHi(){
        $message = "From DB";

        return response()->json([
            "status" => "Success",
            "message" => $message
        ], 200);
    }

    public function Palindrome(){ 
        $palindrome_count=0;
        $array = ["madam","hello","malak","balab","malam"];
        for($i=0; $i<count($array); $i++)
            if (strrev($array[$i]) == $array[$i]){ 
                $palindrome_count++;
            }
        return response()->json([
            "status" => "Success",
            "palindrome" => $palindrome_count
        ], 200);
    }

    public function seconds(){ 
        $diff = microtime(true)- mktime(0,0,0,4,14,1732);
        return response()->json([
            "status" => "Success",
            "seconds" => $diff
        ], 200);
    }

    // public function callAPI(){ 
    //     $curl = curl_init();
    //     $url="https://icanhazdadjoke.com/slack";
    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 4);
    //     $json = curl_exec($curl);
    //     if(!$json) {
    //         echo curl_error($curl);
    //     }
    //     curl_close($curl);
    //     $result = json_decode($json);
    //     $text = "text";
    //     return response()->json([
    //         "status" => "Success",
    //         "callAPI" => $result
    //     ], 200);
    // }
    public function callAPI(){ 
        $curl = curl_init();
        $url="https://icanhazdadjoke.com/slack";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 4);
        $json = curl_exec($curl);
        if(!$json) {
            echo curl_error($curl);
        }
        curl_close($curl);
        $result = json_decode($json);
        $text = "text";
        $c="attachments";
        return response()->json([
            "status" => "Success",
            "callAPI" => $result
        ], 200);
    }
}