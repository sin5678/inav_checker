<?php
$param = file_get_contents($argv[1]);
if(!strlen($param))
{
    echo "error open file \n";
}

$param = str_replace("\r", "", $param);
$param = explode("\n", $param);

echo "!!! do not USE ARM channel to arm, use stick to arm ,this message always show ,check it yourself\n";
foreach($param as $a)
{
    if(strpos($a, "set") === 0)
    {
        $a = explode(" ", $a);
       // echo $a[1]." => ".$a[3]."\n";
        check($a[1], $a[3]);
    }
}


function check($param, $value)
{
    if($param =="nav_disarm_on_landing" && $value == "ON")
    {
        echo "nav_disarm_on_landing is ON\t\t\n";
    }
    if($param == "nav_use_midthr_for_althold" && $value == "OFF")
    {
        echo "nav_use_midthr_for_althold is OFF\t\t\n";
    }
    if($param == "disarm_kill_switch" && $value == "ON")
    {
        echo "!!! disarm_kill_switch is ON, better disable it \n";
    }
    if($param == "failsafe_throttle_low_delay" && $value != 0)
    {
        echo "!!! failsafe_throttle_low_delay not 0,you may got disarm in air when failsafe !\n";
    }
    if($param == "nav_extra_arming_safety" && $value == "OFF")
    {
        echo "nav_extra_arming_safety is OFF\t\t check the GPS state yourself when arm\n";
    }
    if($param == "nav_auto_speed" )
    {
        $msg = "nav_auto_speed for （RTH ， WP）:". intval($value)/100 . "m/s ";
        if(intval($value)/100 < 10)
        {
            echo "!!! ".$msg."maybe too slow ！\n";
        }
        else
        {
            echo $msg ."\n";
        }
    }
    if($param == "nav_auto_climb_rate")
    {
        echo "nav_auto_climb_rate  :". intval($value)/100 . "m/s \n";
    }
    if($param == "nav_manual_speed")
    {
        $msg = "nav_manual_speed   ：".intval($value)/100 . "m/s ";
        if(intval($value)/100 < 10)
        {
            echo "!!! ".$msg . "maybe too slow！\n";
        }
        else
        {
            echo $msg ."\n";
        }
    }
    if($param == "nav_manual_climb_rate")
    {
        echo "nav_manual_climb_rate  :".intval($value)/100 . "m/s \n";
    }
    if($param == "nav_landing_speed")
    {
        echo "nav_landing_speed : ".intval($value)/100 . "m/s \n";
    }
    if($param == "nav_emerg_landing_speed")
    {
        $msg = "nav_emerg_landing_speed : ".intval($value)/100 . "m/s ";
        if(intval($value)/100 > 3)
        {
            echo "!!! ".$msg."maybe too fast \n";
        }
        else
        {
            echo $msg."\n";
        }
    }
    if($param == "nav_min_rth_distance")
    {
        echo "nav_min_rth_distance   : ".intval($value)/100 . "m\n";
    }
    if($param == "nav_rth_climb_first" && $value == "OFF")
    {
        echo "!!! nav_rth_climb_first is OFF  \n";
    }
    if($param == "nav_rth_allow_landing" && $value == "OFF")
    {
        echo "!!! nav_rth_allow_landing is OFF \n";
    }
    if($param == "nav_rth_alt_mode")
    {
        echo "nav_rth_alt_mode  RTH mode: ". $value ."\n";

    }
    if($param == "nav_rth_altitude")
    {
        $msg = "nav_rth_altitude : ".intval($value)/100 . " ";
        if(intval($value)/100 < 50)
        {
            echo "!!! ".$msg."maybe too low \n";
        }
        else
        {
            echo $msg."\n";
        }
    }
    if($param == "max_angle_inclination_rll")
    {
        $msg = "max_angle_inclination_rll   :".intval($value)/10 . "  ";
        if(intval($value)/10 < 10)
        {
            echo "!!! ".$msg."maybe too small roll angle\n";
        }
        else
        {
            echo $msg."\n";
        }
    }
    if($param == "max_angle_inclination_pit")
    {
        $msg = "max_angle_inclination_pit  :".intval($value)/10 . "  ";
        if(intval($value)/10  < 10)
        {
            echo "!!! ".$msg ."maybe too small pitch angle \n";
        }
        else
        {
            echo $msg ."\n";
        }
    }
    if($param == "failsafe_procedure")
    {
        $msg = "failsafe_procedure  : $value  ";
        if($value != "RTH")
        {
            echo "!!! ".$msg."failsafe procedure not RTH ! \n";
        }
        else
        {
            echo $msg."\n";
        }
    }
    if($param == "failsafe_stick_threshold")
    {
        if($value == "0")
            echo "!!! failsafe_stick_threshold is 0 , better use the default value \n";
        else
            echo "failsafe_stick_threshold  : ". intval($value). "\n"; 
    }
}
