<?php
/**
 * 获取用户真实 IP
 * @Return string IP地址
 */
function get_iP()
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
function get_city($ip)
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
function get_browser(){
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

/**
 * 根据时间格式（时间戳）获取友好时间显示（例如：昨天 19:00，前天 19:00，三天前 19:00，七天前 19:00等等）
 * @param string $time
 * @param string $default 格式化时间
 */
function nice_time($time, $default = '') {
    $time = $time > 0 ? (int)$time : strtotime($time);
    $surplus = $time > time() ? ($time - time()) : (time() - $time);
    $ext = $time > time() ? '后' : '前';
    if ($surplus < 60) {
        if ($surplus == 0)
            $return = '刚刚';
        else
            $return = $surplus . '秒' . $ext; //3秒前
    }
    elseif ($surplus < 3600)
        $return = floor($surplus / 60) . '分钟' . $ext; //10分钟前
    elseif ($surplus < 86400)
        $return = floor($surplus / 3600) . '小时' . $ext; //23小时前
    elseif ($surplus < 2678400)
        $return = floor($surplus / 86400) . '天' . $ext; //23天前
    else
        $return = $default ? date($default, $time) : date('Y-m-d H:i:s', $time);
    return $return;
}

/**
 * 生成一个随机字符串
 */
function get_salt($cost = 10) {
    $str = '1234567890abcdefghjklmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
    $len = strlen($str) - 1;
    $string = '';
    $cost = $cost > 0 ? (int) $cost : rand(3, 8);
    for ($i = 0; $i < $cost; $i++) {
        $string .= $str[mt_rand(0, $len)];
    }
    return $string;
}

/**
 * 字符串截取，支持中文和其他编码
 * @param string $str 需要转换的字符串
 * @param int $start 开始位置
 * @param int $length 截取长度
 * @param string $charset 编码格式
 * @param bool $suffix 截断显示字符
 * @return string
 */
function msubstr($str, $length, $start = 0, $charset = "utf-8", $suffix = false) {
    $str = trim($str);
    if (function_exists("mb_substr"))
        return mb_substr(htmlspecialchars($str), $start, $length, $charset);
    elseif (function_exists('iconv_substr')) {
        return iconv_substr(htmlspecialchars($str), $start, $length, $charset);
    }
    $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], htmlspecialchars($str), $match);
    $slice = join("", array_slice($match[0], $start, $length));
    if ($suffix)
        return $slice . $suffix;
    return $slice;
}