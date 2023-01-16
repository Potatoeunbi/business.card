<?php

namespace application\controllers;

class ApiController{

    public function get($url, $data){
        $method = "GET";
        if($data == 0){
            $url = "http://220.69.240.130:3000" .$url;
        }
        else{
            $url = "http://220.69.240.130:3000" .$url. "?" . http_build_query($data, '', );
        }
        $ch = curl_init();                                 //curl 초기화
		curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		$response = curl_exec($ch);
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$error = curl_error($ch);
		curl_close($ch);
        $result = json_decode($response,true);
        return $result;
    }

    public function post($url,$data){
        // $data = [
        //     'ID' => '100',
        //     'Content' => 'JUNWONLEE',
        //     'Pwd' => 'pass00',
        //     'Name' => "LEEJUNWON",
        //     'Coin' => 8,
        //     'Time' => 'now'
        // ];
        // 위의 형식으로 매개변수로 넘겨주면 됨
        $url = "http://220.69.240.130:3000".$url;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);	//connection timeout 15 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));	//POST data
        curl_setopt($ch, CURLOPT_POST, true);
        $response = curl_exec($ch);
        curl_close($ch);	 

        $result = json_decode($response,true);
        return $result;
    }


}