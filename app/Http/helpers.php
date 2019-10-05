<?php


function is_base64($s)
{
    // Check if there are valid base64 characters
    if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s)) return false;

    // Decode the string in strict mode and check the results
    $decoded = base64_decode($s, true);
    if (false === $decoded) return false;

    // Encode the string again
    if (base64_encode($decoded) != $s) return false;

    return true;
}


//application date format
function changeDateFormat($date)
{
    return \Carbon\Carbon::parse($date)->format('d.m.Y');
}


//array to string
function arrayToString($arr)
{
    $string = '[';
    foreach ($arr as $element) {
        $string .= $element . ',';
    }
    $string = rtrim($string, ", ");
    $string .= ']';
    return $string;
}

//youtube embed url
function youtubeUrl($url)
{
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
    return $matches[1];
}

function percnetage($degree)
{
    if ($degree >= 85 && $degree <= 100)
        return 'Excellent';
    elseif ($degree >= 75)
        return 'Very Good';
    elseif ($degree >= 65)
        return 'Good';
    elseif ($degree >= 50)
        return 'Pass';
    else
        return 'Failed';
}
