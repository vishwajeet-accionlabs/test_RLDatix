<?php
include ("include/database.php");
class Weather_report{
    public function report_by_zip_country(){

        $weather_api_key = "69f4eff7f154442119d38f64763aed36";
        $zip=$_REQUEST['zip'];
        $country_code=$_REQUEST['country_code'];
        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.openweathermap.org/data/2.5/weather?zip='.$zip.','.$country_code.'&appid='.$weather_api_key,
            
        ]);
        
        $resp = curl_exec($curl);
        
        curl_close($curl);
        
        $rep_data = json_decode($resp, true);
        
        $city_data = array(
            'weather_id'=>$rep_data['weather'][0]['id'],
            'zip'=>$zip,
            'country_code'=>"'".$country_code."'",
            'lon'=>$rep_data['coord']['lon'],
            'lat'=>$rep_data['coord']['lat'],
            'weather_date_time'=>"'".date('Y-m-d H:i:s',$rep_data['dt'])."'"
        );
        $weather_data = array(
            'weather_id'=>$rep_data['weather'][0]['id'],
            'main'=>"'".$rep_data['weather'][0]['main']."'",
            'description'=>"'".$rep_data['weather'][0]['description']."'",
            'visibility'=>$rep_data['visibility'],
            'clouds'=>$rep_data['clouds']['all']
        );
        $temprature_data = array(
            'weather_id'=>$rep_data['weather'][0]['id'],
            'temp'=>$rep_data['main']['temp'],
            'feels_like'=>$rep_data['main']['feels_like'],
            'temp_min'=>$rep_data['main']['temp_min'],
            'temp_max'=>$rep_data['main']['temp_max'],
            'pressure'=>$rep_data['main']['pressure'],
            'humidity'=>$rep_data['main']['humidity'],
            
        );
        
        $obj=new Database_weather();
        $db = $obj->database_conn(); 

        $insert_to_db = array(
            'city'=>$city_data,
            'weather'=>$weather_data,
            'temprature'=>$temprature_data
        );
        $inserted_array = array();
        foreach($insert_to_db as $table_name => $tables){

            $sth = $db->prepare("INSERT INTO ".$table_name." (".implode(',',array_keys($tables)).") VALUES (".implode(',',array_values($tables)).")");
            $res = $sth->execute();
            $inserted_array[$table_name]=$sth->insert_id;
        }

        echo "Inserted records:<br>";
        echo json_encode($inserted_array);
    }
}

$obj = new Weather_report();
$obj->report_by_zip_country();
