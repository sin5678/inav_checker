# inav_checker
inav config safety checker for quadcopter
install php first

run "dump" command in INAV Configurator
copy command output to a txt file ,eg config.txt
run php config.txt

$ php inav_chk.php config.txt
!!! do not USE ARM channel to arm, use stick to arm
!!! failsafe_throttle_low_delay not 0,you may got disarm in air when failsafe, and your throttle is lowest !
failsafe_procedure  failsafe 设置为: SET-THR
!!! failsafe procedure not RTH !
failsafe_stick_threshold  退出failsafe 杆量为: 50
!!! disarm_kill_switch is ON, better disable it
nav_disarm_on_landing is OFF            降落后不会关闭电机
nav_use_midthr_for_althold is OFF               不使用油门中位来定高
nav_auto_speed          自动飞行速度（返航 ， 航点）:3m/s
!!! maybe too slow ！
nav_auto_climb_rate   自动爬升 下降速度:5m/s
nav_manual_speed   最大手动飞行速度 ：5m/s
!!! maybe too slow！
nav_manual_climb_rate  最大手动爬升速度 :2m/s
nav_landing_speed  自动降落速度: 2m/s
nav_emerg_landing_speed  紧急降落速度: 5m/s
nav_min_rth_distance   最短返航距离 : 5m
nav_rth_alt_mode  返航模式: 最后高度返航
nav_rth_altitude  自动返航高度: 10
max_angle_inclination_rll   横滚最大角度 :30 度
max_angle_inclination_pit   俯仰最大角度 :30 度
