<?php  
require 'classes/upload.php' ;
class time extends upload{
  public static  function arabic_date_format($timestamp)
    {
        $periods = array(
            "second"  => "ثانية",
            "seconds" => "ثواني",
            "minute"  => "دقيقة",
            "minutes" => "دقائق",
            "hour"    => "ساعة",
            "hours"   => "ساعات",
            "day"     => "يوم",
            "days"    => "أيام",
            "month"   => "شهر",
            "months"  => "شهور",
        );

        $difference = (int) abs(time() - $timestamp);

        $plural = array(3, 4, 5, 6, 7, 8, 9, 10);

        $readable_date = "منذ ";

        if ($difference < 60) // less than a minute
        {
            $readable_date .= $difference . " ";
            if (in_array($difference, $plural)) {
                $readable_date .= $periods["seconds"];
            } else {
                $readable_date .= $periods["second"];
            }
        } elseif ($difference < (60 * 60)) // less than an hour
        {
            $diff = (int) ($difference / 60);
            $readable_date .= $diff . " ";
            if (in_array($diff, $plural)) {
                $readable_date .= $periods["minutes"];
            } else {
                $readable_date .= $periods["minute"];
            }
        } elseif ($difference < (24 * 60 * 60)) // less than a day
        {
            $diff = (int) ($difference / (60 * 60));
            $readable_date .= $diff . " ";
            if (in_array($diff, $plural)) {
                $readable_date .= $periods["hours"];
            } else {
                $readable_date .= $periods["hour"];
            }
        } elseif ($difference < (30 * 24 * 60 * 60)) // less than a month
        {
            $diff = (int) ($difference / (24 * 60 * 60));
            $readable_date .= $diff . " ";
            if (in_array($diff, $plural)) {
                $readable_date .= $periods["days"];
            } else {
                $readable_date .= $periods["day"];
            }
        } elseif ($difference < (365 * 24 * 60 * 60)) // less than a year
        {
            $diff = (int) ($difference / (30 * 24 * 60 * 60));
            $readable_date .= $diff . " ";

            if (in_array($diff, $plural)) {
                $readable_date .= $periods["months"];
            } else {
                $readable_date .= $periods["month"];
            }
        } else {
            $readable_date = date("d-m-Y", $timestamp);
        }

        return $readable_date;
    }



}
?>