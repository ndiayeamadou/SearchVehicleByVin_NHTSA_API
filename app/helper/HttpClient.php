<?php
/**
 * 
 */

namespace App\helper;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class HttpClient
{
    private static $httpClient;
    private static function getHttpClient() : Client{
        if(static::$httpClient === null)
        {
            //disable ssl verification
            self::$httpClient = new Client(['verify' => false]);
        }
        return self::$httpClient  ;
    }
    public static function get($url,$options = ['data'=>[],'headers'=> [] ]){
        return static::precess($url,$options,'get',true);
    }
    public static function post($url,$options = ['data'=>[],'headers'=> [] ]){

        return static::precess($url,$options,'post');
    }
    public static function put($url,$options = ['data'=>[],'headers'=> [] ]){

        return static::precess($url,$options,'put');
    }
    public static function delete($url,$options = ['data'=>[],'headers'=> [] ]){

        return static::precess($url,$options,'delete',true);
    }
    private static function setDefault($options,$get = false){

        if(!isset($options['headers']['Content-Type'])){
            $options['headers']['Content-Type'] = 'application/json';
        }
        if(!isset($options['headers']['Accept'])){
            $options['headers']['Accept'] = 'application/json';
        }
        if($get === true){
            return [
                RequestOptions::HEADERS =>$options['headers'],
                'query' => $options['data']
            ];
        }
        return [
            RequestOptions::HEADERS =>$options['headers'],
            RequestOptions::JSON => $options['data']
        ];


    }
    public static function precess($url,$options,$methode,$isGet= false){
        try{
            $response =static::getHttpClient()->$methode( $url,static::setDefault($options,$isGet));
            if($response->getStatusCode() === 200)
            {
                $responseBody = \GuzzleHttp\json_decode($response->getBody());
                return (array)$responseBody;
            }else{
                return false;//self::respond('error',$response->getBody(),true);
            }
        }catch (\Exception $exception){
            dd($exception);
            return false; //self::respond('error',$exception->getMessage(),true);
        }
    }
    public static function getOptions($request){
        $headers = [];
        foreach ((array)$request->headers as $headers_){
            $headers = $headers_ ;
            break;
        }
        $data = (array)$request->all();
        $h = [];
        array_walk($headers,function ($value,$key)use(&$headers,&$h){
            $_ = explode('-',$key);
            $_ = ucfirst(@$_[1]) ?  ucfirst(@$_[0]) .'-'. ucfirst(@$_[1]) : ucfirst(@$_[0]);
            if(strtolower($key) !=='host')
                $h[$_]= @$value[0];
        });
        //  dd( $h);

        return ['data'=>$data,"headers"=>$h] ;
    }
    public static function overiteParams($option,$newData){
        //overide the first array |
        $option['data'] = array_merge($option['data']?:[],$newData) ;
        return $option;
    }
    public static function concate($option,$newData){
        foreach ($newData as $key=> $itemData){
            if(@$option['data'][$key]){
                $option['data'][$key] = $option['data'][$key] . ','.$itemData;
            }else{
                $option['data'][$key] = $itemData;
            }
        }
        return $option;
    }
}
