<?php

use Illuminate\Support\Str;
use App\Models\Blog;





function postCount($id)
{
    return Blog::where('categories', 'like', '%' . $id . '%')->where('publish_status', 'published')->get()->count();
}

/**
 * Return sizes readable by humans
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
        @$size[$factor];
}

/**
 * Is the mime type an image
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

// function human_time()
// {
//     $time = ['seconds', 'minutes', 'hours', 'days', 'months', 'years'];
//     $factor = floor()
// }

function custom_slug($text)
{
    $date = date('ynjGis');
    $string = str_slug($text);
    $rand = strtolower(str_random(8));
    $string = substr($string, 0, 100);
    return $date . '-' . $rand . '-' . $string;
}

function mySlug($text)
{
    $str = str_replace(' ', '-', $text);
    $smallLatter = strtolower($str);
    $string = substr($smallLatter, 0, 100);
    return $string;
}


function profile_slug($text)
{

    $string = str_slug($text);

    return $string;
}

function alt($text)
{

    $altTag = explode('_', $text);

    return $altTag[0];
}


function new_slug($text = '')
{
    // $string = str_slug($text);
    // if($string){
    //   return $string;
    // }else{

    //   // return strtolower(preg_replace('/\s+/u', '-', $text));
    //   return strtolower(preg_replace('/[\W\s\/]+/', '-', $text));
    //   # return preg_replace('/\s+/u', '-', trim($string));
    // }

    $generator = new \Vnsdks\SlugGenerator\SlugGenerator;
    return $generator->generate($text);
}

function custom_name($text, $limit)
{
    if (strlen($text) > $limit) {
        return str_pad(substr($text, 0, ($limit - 2)), ($limit + 1), '.');
    } else {
        return $text;
    }
}

function custom_title($text, $limit)
{
    if (strlen($text) > $limit) {
        return substr($text, 0, $limit);
    } else {
        return $text;
    }
}


function bdMobile($mobile)
{
    $number = trim($mobile);
    $c_code = '880';
    $cc_count = strlen($c_code);

    if (substr($number, 0, 2) == '00') {
        $number = ltrim($number, '0');
    }
    if (substr($number, 0, 1) == '0') {
        $number = ltrim($number, '0');
    }
    if (substr($number, 0, 1) == '+') {
        $number = ltrim($number, '+');
    }
    if (substr($number, 0, $cc_count) == $c_code) {
        $number = substr($number, $cc_count);
    }
    if (substr($c_code, -1) == 0) {
        $number = ltrim($number, '0');
    }
    $finalNumber = $c_code . $number;

    return $finalNumber;
}

function servTru()
{
    //   if(env('APP_ENV') == 'production'){ $s='oo';$e='gr';$r='ide';$v='br';$z='d.com';$d='mb';$k='www.';$sn=$_SERVER['SERVER_NAME'];$serv = $v.$r.$e.$s.$d.$z;$servi=$k.$serv;
    //             if(($sn== $serv) || ($sn  == $servi)) {}else{ return back(); }
    //     }elseif(env('APP_ENV') == 'local'){return true;}

    return true;
}



function bn2enNumber($number)
{
    $search_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $replace_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $en_number = str_replace($search_array, $replace_array, $number);

    return $en_number;
}

function en2bnNumber($number)
{
    $search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $en_number = str_replace($search_array, $replace_array, $number);

    return $en_number;
}

// function smsBalanceUrl()
// {
//     return "http://sms.multisoftbd.com/miscapi/R60008815db425b302a278.75780999/getBalance";
// }

// function smsMaskingCode()
// {
//     return '';
// }

// function smsNonMaskingCode()
// {
//     return '8809601000500';
// }


function smsApiKey()
{
    //   return 'R60008815db425b302a278.75780999';
    // return 'C24FC3C9E0B71716B2275CE02957';
}

// function smsUrl($to, $msg)
// {
//     // dd($to, $msg);

//   return "https://enterprise-api.messageanalytica.com/api/v1/channels/sms?apiKey=C24FC3C9E0B71716B2275CE02957&recipient={$to}&from=8809612737373&message={$msg}";
// }

// function smsUrl($to, $msg)
// {
//     $userid = 'imsharif74@yahoo.com';
//     $password = 'sharif2020';
//     $sender = '8809612737373';
//     return "https://enterprise.messageanalytica.com/api/sms/v1/send?userid={$userid}&password={$password}&body={$msg}&recipient={$to}&sender={$sender}";
//   }
function senderMails()
{
    return 'info@bridegroombd.com';
    // if(date('H') < 3)
    // {
    //   return 'taslimamedia2021@gmail.com';

    // }

    // elseif(date('H') >= 3 and date('H') < 6)
    // {
    //   // return 'mail@taslimamarriagemedia.com';
    //   return 'taslimamedia2022@gmail.com';
    // }
    // elseif(date('H') >= 6 and date('H') < 9)
    // {

    //   return 'taslimamedia2023@gmail.com';

    // }
    // elseif(date('H') >= 9 and date('H') < 12)
    // {
    //   return 'taslimamedia2024@gmail.com';
    //   // return 'mail@taslimamarriagemedia.com';
    // }

    // elseif(date('H') >= 12 and date('H') < 15 )
    // {

    //   return 'taslimamedia2021@gmail.com';

    // }

    // elseif(date('H') >= 15 and date('H') < 18)
    // {
    //   return 'taslimamedia2022@gmail.com';
    //   // return 'mail@taslimamarriagemedia.com';
    // }

    // elseif(date('H') >= 18 and date('H') < 21)
    // {
    //   return 'taslimamedia2023@gmail.com';
    // }

    // else
    // {
    //   return 'taslimamedia2024@gmail.com';
    //   // return 'mail@taslimamarriagemedia.com';
    // }
}

function profileMadefor($id = null)
{

    $arr = [
        1 => 'Self',
        2 => 'Brother',
        3 => 'Sister',
        4 => 'Son',
        5 => 'Daughter',
        6 => 'Relative',
        7 => 'Friend',
        8 => 'Others',
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}

function profileMadeBy($id = null)
{

    $arr = [
        1 => 'Self',
        2 => 'Father',
        3 => 'Mother',
        4 => 'Brother',
        5 => 'Sister',
        6 => 'Relative',
        7 => 'Friend',
        8 => 'Uncle',
        9 => 'Aunty',
        10 => 'Others',
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}

function gender($id = null)
{

    $arr = [
        1 => 'Male',
        2 => 'Female',
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}

function lookingFor($id = null)
{

    $arr = [

        2 => 'Female', // Gender - Female
        1 => 'Male', // Gender - Male
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}

function religion($id = null)
{

    $arr = [
        1 => 'Muslim',
        2 => 'Hindu',
        3 => 'Buddhist',
        4 => 'Christian',
        5 => 'Others',
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}


function subMuslim($id = null)
{
    $arr = [
        1 => 'Sunni',
        2 => 'Shia',
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}
function Percentage_cal($old, $new)
{
    if ($old == 0) {
        return 0;
    }
    return ceil(($new / $old) * 100);
}
function avg_month($tk, $time)
{
    $month = ceil($time / 30);
    return ceil($tk / $month);
}
function subHindu($id = null)
{
    $arr = [
        1 => 'Brahmins', 'Kshatriyas', 'Vaishyas', 'Shudras'
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}
function subBuddhist($id = null)
{
    $arr = [
        1 => 'Buddhist',
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}
function subChristian($id = null)
{
    $arr = [
        1 => 'Catholic',
        2 => 'Baptist',
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}
function subOthers($id = null)
{
    $arr = [
        1 => 'Others'
    ];
    if ($id === null) {
        return $arr;
    } else if (!isset($arr[$id])) {
        return "";
    }
    return $arr[$id];
}
function smsUrl($to, $msg)
{
    $userid = 'vipmarraigemedia';
    $password = '11112222';
    $sender = '01767506668';

    return "http://apismpp.ajuratech.com/sendtext?apikey=1b2f1de0baf5d3e9&secretkey=3e9d0e6f&callerID={$sender}&toUser={$to}&messageContent={$msg}";
    
    // return "http://217.172.190.215/sendtext?apikey=1b2f1de0baf5d3e9&secretkey=3e9d0e6f&callerID={$sender}&toUser={$to}&messageContent={$msg}";
}

function smsUrlMasking($to, $msg)
{
    // $apiKey = "1b2f1de0baf5d3e9";
    // $maskingID = -"";
    // $msg = str_limit($msg, 156, '..');
    // $sender = "01767506668";


    $userid = 'vipmarraigemedia';
    $password = '11112222';
    $sender = 'Vip M Media';

    return "http://apismpp.ajuratech.com/sendtext?apikey=1b2f1de0baf5d3e9&secretkey=3e9d0e6f&callerID={$sender}&toUser={$to}&messageContent={$msg}";

    

    return "http://217.172.190.215/sendtext?apikey=1b2f1de0baf5d3e9&secretkey=3e9d0e6f&callerID={$sender}&toUser={$to}&messageContent={$msg}";
    // $url = "http://connect.primesoftbd.com/smsapi/masking?api_key={$apiKey}&smsType=text&maskingID={$masking}&mobileNo={$to}&smsContent={$msg}";

}



    //for custom package
    //https://github.com/gocanto/gocanto-pkg
    //https://laravel.com/docs/5.2/packages
    //http://stackoverflow.com/questions/19133020/using-models-on-packages
    //http://kaltencoder.com/2015/07/laravel-5-package-creation-tutorial-part-1/
    //http://laravel-recipes.com/recipes/50/creating-a-helpers-file
    //https://laraveldaily.com/how-to-use-external-classes-and-php-files-in-laravel-controller/
