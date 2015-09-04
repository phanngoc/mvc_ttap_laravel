<?php

function echo_me($var)
{
    if(isset($var)) echo $var;
}
function string_to_date_mysql($date)
{
    $dates = split('/', $date);
    $month = $dates[0];
    $day = $dates[1];
    $year = $dates[2];
    $sql = $year."-".$month."-".$day." 00:00:00";
    return $sql;
}

function date_mysql_to_string($date)
{
    $temp = split(' ', $date);
    $temp1 = split('-',$temp[0]);
    $month = $temp1[1];
    $day = $temp1[2];
    $year = $temp1[0];
    $sql = $month.'/'.$day.'/'.$year;
    return $sql;
}