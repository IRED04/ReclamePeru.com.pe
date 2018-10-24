<?php
class zh_api{

    public static function POST($url,$username,$password,$parameter){

        $options = [
            CURLOPT_URL             => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS      => $parameter,
            CURLOPT_HTTPHEADER      =>array(
                "Authorization: Basic ". base64_encode($username. ":" . $password),
                "Content-Type: application/json",
                "cache-control: no-cache"
                                        ),
            CURLOPT_VERBOSE         =>true
        ];



        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $result = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            return $error;
        } else {
            return $result;
        }
    }

    static function convert_json_array($json){
        return json_decode($json);
    }
    static function convert_array_json($array){
        return json_encode($array);
    }
    

}