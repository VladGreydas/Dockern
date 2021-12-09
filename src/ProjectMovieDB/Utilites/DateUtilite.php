<?php
/**
 * Returns month name fron its number
 * @param int $month month number
 * @return string month name
 */
function GetMonthNameFromNumber(int $month){
    $result = "";
    switch($month){
        case 1:{$result = "January"; break;}
        case 2:{$result = "February"; break;}
        case 3:{$result = "March"; break;}
        case 4:{$result = "April"; break;}
        case 5:{$result = "May"; break;}
        case 6:{$result = "June"; break;}
        case 7:{$result = "July"; break;}
        case 8:{$result = "August"; break;}
        case 9:{$result = "September"; break;}
        case 10:{$result = "October"; break;}
        case 11:{$result = "November"; break;}
        case 12:{$result = "December"; break;}
    }
    return $result;
}
/**
 * Transforming from yyyy-mm-dd to mm-dd-yyyy
 * @param string $date Input Date
 * @return string Transformed Date
 */
function ProcessSingleDate (string $date){
    $splitteDate = explode('-', $date);
    $month = (int)$splitteDate[1];
    $textMonth = GetMonthNameFromNumber($month);
    $result = $textMonth.' '.$splitteDate[2].' '.$splitteDate[0];
    return $result;
}