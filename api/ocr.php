﻿<?php
                error_reporting(0);
                function BMN2312($url) //Func Bypass Captcha
        {
                $ch = curl_init($url);
                curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie.txt');       
                curl_setopt($ch,CURLOPT_REFERER,$url);                 
                curl_setopt($ch,CURLOPT_COOKIEFILE,'cookie.txt');                      
                curl_setopt($ch,CURLOPT_COOKIESESSION,true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch,CURLOPT_REFERER,$img);
                curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36');
                curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
                curl_setopt($ch,CURLOPT_HEADER,0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $data = curl_exec($ch);
                curl_close($ch);
                $tmpFile = uniqid();
                $file = $tmpFile;
                $handle = fopen($file, 'a');
                fwrite($handle,$data);
                fclose($handle);
                shell_exec("convert ".$tmpFile." -colorspace Gray -depth 8 -resample 200x200 -verbose -antialias ".$tmpFile);
                shell_exec("convert ".$tmpFile."  -resize 116x56\>  ".$tmpFile);
                $cmd = "tesseract $tmpFile $tmpFile";
                exec($cmd);
                unlink($tmpFile);
                $res = file_get_contents("$tmpFile.txt");
                unlink("$tmpFile.txt");
                $capcay = trim(str_replace("\n\n","",$res,count($res)));
 
                echo $capcay;
        }
                $url = $_GET['img'];
                if($_GET['img']){
                BMN2312($url);
        }
                else
        {
                echo "Liên Hệ FB : -https://www.facebook.com/BMN.2312- Để Lấy Key OCR";
        }
?>