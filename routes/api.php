<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/get_tweets', function(){
    $twitter_account = Input::get('twitter_account', 'SCabral6');
    $count = Input::get('count', '10');
    $format = Input::get('format', 'json');

    $json_tweets = Twitter::getUserTimeline(['screen_name' => $twitter_account, 'count' => $count, 'format' => $format]);
    
    $array_tweets = json_decode($json_tweets);
    $array_result = array();
    
    foreach ($array_tweets as $tw) {
        $e['created_at'] = $tw->created_at;
        $e['text'] = $tw->text;
        if($tw->in_reply_to_user_id != null) {
            $e['in_reply']['id'] = $tw->in_reply_to_user_id;
            $e['in_reply']['user'] = $tw->in_reply_to_screen_name;
        }
        
        $array_result[] = $e;
    } 
    return json_encode($array_result);
});