<?php
/**
 * 获取用户真实 IP
 * @Return string IP地址
 */
function getIP()
{
    static $realip;
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }

    return $realip;
}


/**
 * 获取 IP  地理位置
 * 淘宝IP接口
 * @Param string $ip IP地址
 *
 * @Return: array
 */
function getCity($ip)
{
    $ip = getIp();
    $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
    $ip=json_decode(file_get_contents($url));   
    if((string)$ip->code=='1'){
       return false;
    }
    $data = (array)$ip->data;
    return $data;   
}

// --------------------------------------------------
// 分析返回用户网页浏览器名称
// 返回的第一个参数为浏览器名称，第二个参数为浏览器版本
// --------------------------------------------------
function getBrowser(){
    $sys = $_SERVER['HTTP_USER_AGENT'];
    if(stripos($sys, "NetCaptor") > 0){                     //NetCaptor浏览器
       $exp[0] = "netcaptor";
       $exp[1] = "";
    }elseif(stripos($sys, "Firefox/") > 0){                 //Firefox（火狐）浏览器
       preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);
       $exp[0] = "mozilla_firefox";
       $exp[1] = $b[1];
    }elseif(stripos($sys, "MAXTHON") > 0){                  //MAXTHON（傲游）浏览器
       preg_match("/MAXTHON\s+([^;)]+)+/i", $sys, $b);
       preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
       $exp[0] = $b[0]." (IE".$ie[1].")";
       $exp[1] = $ie[1];
    }elseif(stripos($sys, "MSIE") > 0){                     //Internet Explorer（IE）浏览器
       preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
       $exp[0] = "ie";
       $exp[1] = $ie[1];
    }elseif(stripos($sys, "Netscape") > 0){                 //Netscape（网景）浏览器
       $exp[0] = "netscape";
       $exp[1] = "";
    }elseif(stripos($sys, "Opera") > 0){                    //Opera浏览器
       $exp[0] = "opera";
       $exp[1] = "";
    }elseif(stripos($sys, "Chrome") > 0){                   //Chrome（谷歌）浏览器
        preg_match("/Chrome\/([^;) ]+)+/i", $sys, $b);
        $exp[0] = "chrome";
        $exp[1] = $b[1];
    }elseif(stripos($sys, "Safari") > 0){                   //Safari浏览器
        preg_match("/Version\/(.*?) Safari\/([^;) ]+)+/i", $sys, $b);
        $exp[0] = "safari";
        $exp[1] = $b[1];
    }else{
       $exp = "未知浏览器";
       $exp[1] = "";
    }
    
    return $exp;
}