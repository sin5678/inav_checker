<?php
$param = file_get_contents($argv[1]);
if(!strlen($parm))
{
    echo "error open file \n";
}

$param = str_replace("\r", "", $param);
$param = explode("\n", $param);

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
    if($param =="nav_disarm_on_landing" && $value == "OFF")
    {
        echo "nav_disarm_on_landing is OFF\t\t";
        echo "降落后不会关闭电机\n";
    }
    if($param == "nav_use_midthr_for_althold" && $value == "OFF")
    {
        echo "nav_use_midthr_for_althold is OFF\t\t";
        echo "不使用油门中位来定高 \n";
    }
    if($param == "nav_extra_arming_safety" && $value == "OFF")
    {
        echo "nav_extra_arming_safety is OFF\t\t电机安全启动功能被关闭\n";
    }
    if($param == "nav_user_control_mode" && $value == "ATTI")
    {
        echo "nav_user_control_mode is ATTI\t\t定点模式不能平移 建议设置成 CRUISE \n";
    }
    if($param == "nav_auto_speed" )
    {
        echo "nav_auto_speed\t\t自动飞行速度（返航 ， 航点）:". intval($value)/100 . "m/s \n";
    }
    if($param == "nav_auto_climb_rate")
    {
        echo "nav_auto_climb_rate   自动爬升 下降速度:". intval($value)/100 . "m/s \n";
    }
    if($param == "nav_manual_speed")
    {
        echo "nav_manual_speed   最大手动飞行速度 ：".intval($value)/100 . "m/s \n";
    }
    if($param == "nav_manual_climb_rate")
    {
        echo "nav_manual_climb_rate  最大手动爬升速度 :".intval($value)/100 . "m/s \n";
    }
    if($param == "nav_landing_speed")
    {
        echo "nav_landing_speed  自动降落速度: ".intval($value)/100 . "m/s \n";
    }
    if($param == "nav_emerg_landing_speed")
    {
        echo "nav_emerg_landing_speed  紧急降落速度: ".intval($value)/100 . "m/s \n";
    }
    if($param == "nav_min_rth_distance")
    {
        echo "nav_min_rth_distance   最短返航距离 : ".intval($value)/100 . "m\n";
    }
    if($param == "nav_rth_climb_first" && $value == "OFF")
    {
        echo "nav_rth_climb_first is OFF  未设置 返航先爬升 \n";
    }
    if($param == "nav_rth_allow_landing" && $value == "OFF")
    {
        echo "nav_rth_allow_landing is OFF  自动返航后 不允许降落\n";
    }
    if($param == "nav_rth_alt_mode")
    {
        echo "nav_rth_alt_mode  返航模式: ";
        if($value == "AT_LEAST") echo "最后高度返航\n";

    }
    if($param == "nav_rth_altitude")
    {
        echo "nav_rth_altitude  自动返航高度: ".intval($value)/100 . "\n";
    }
    if($param == "max_angle_inclination_rll")
    {
        echo "max_angle_inclination_rll   横滚最大角度 :".intval($value)/10 . " 度 \n";
    }
    if($param == "max_angle_inclination_pit")
    {
        echo "max_angle_inclination_pit   俯仰最大角度 :".intval($value)/10 . " 度 \n";
    }
    if($param == "failsafe_procedure")
    {
        echo "failsafe_procedure  failsafe 设置为: $value  \n";
        if($value != "RTH")
            echo "请设置为自动返航！ RTH\n";
    }
    if($param == "failsafe_stick_threshold")
    {
        if($value == "0")
            echo "failsafe_stick_threshold 获取信号后 立马退出返航 建议设置大于0的数\n";
        else
            echo "failsafe_stick_threshold  退出failsafe 杆量为: ". intval($value). "\n"; 
    }
}