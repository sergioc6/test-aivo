<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Twitter;
use App\Tweet;
use App\Configuration;
use Redirect;

/**
 * Description of TwitterController
 *
 * @author SergioC
 */
class TwitterController  extends Controller{

    public function obtenerTweets() {
        return view('get_tweets');
    }
    
    public function descargarTweets(Request $request) {
        $inputAccount = $request->input('inputAccount');
        
        $config = Configuration::find(1);
        
        $jsonTweets = Twitter::getUserTimeline(['screen_name' => $inputAccount, 'count' => $config->value, 'format' => 'json']);

        $arrayTweets = json_decode($jsonTweets);
        
        foreach ($arrayTweets as $tw){
            $tw->account = $inputAccount;
            
            $tweetStorage = new Tweet();
            $tweetStorage->id = $tw->id;
            $tweetStorage->user_account = $inputAccount;
            $tweetStorage->text = $tw->text;
            $tweetStorage->favorite_count = $tw->favorite_count;
            $tweetStorage->retweet_count = $tw->retweet_count;
            $tweetStorage->save();
        }
        return view('get_tweets', ['tweets' => $arrayTweets]);
    }
    
    public function configuracion() {
        $configs = Configuration::get();
        return view('configuration', ['configs' => $configs]);
    }
    
    public function guardarConfiguracion(Request $request) {
        $configs = $request->except('_token');
        
        foreach ($configs as $key => $value) {
            $c = Configuration::find($key);
            $c->value = $value;
            $c->save();
        }
        
        $message = 'Cambios guardados correctamente!';
        $configs = Configuration::get();
        return view('configuration', ['configs' => $configs, 'message' => $message]);
    }
    
    public function consultarTweets() {
        $tweets = Tweet::paginate();
        
        return view('consultar_tweets', ['tweets' => $tweets]);
    }
    
    
    
    
    
    
}
