<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //Palindrome
    public function palindrome(){ 
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

    //Difference in seconds
    public function seconds(){ 
        $diff = microtime(true)- mktime(0,0,0,4,14,1732);
        return response()->json([
            "status" => "Success",
            "seconds" => $diff
        ], 200);
    }

    public function callApi(){ 
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
        $jsonArray = json_decode($json,true);
        $second_arr = $jsonArray["attachments"];
        $first_element=reset($second_arr);
        $string=json_encode($first_element,true);
        $array=json_decode($string,true);
        $result = $array["text"];
        return response()->json([
            "status" => "Success",
            "callAPI" => $result
        ], 200);
    }

    //beer API
    public function beerApi(){ 
        $curl = curl_init();
        $url="https://api.punkapi.com/v2/beers";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 4);
        $json = curl_exec($curl);
        if(!$json) {
            echo curl_error($curl);
        }
        curl_close($curl);
        $jsonArray = json_decode($json,true);
        $result = $jsonArray[rand(0,count($jsonArray)-1)]["ingredients"];
        return $result;
    }

    //Groups of students
    public function students(){ 
        $groups = array();
        $students = array("malak","huda","hassan","ali","tarek");
        for($i=0; $i<count($students)-1; $i++){
            array_push($groups,array($students[$i],$students[$i+1]));
            if(count($students)%2!=0 && $i==count($students)-3){
                array_push($groups,array($students[$i+2]));
            }
            $i++;
        }
        return $groups;
    }

    //Random nominee
    public function nominee(){ 
        $students = array("malak","huda","pablo","pablo","tarek","pablo");
        $nominee = $students[rand(0,count($students)-1)];
        return $nominee;
    }
}