# inav_checker
### inav config safety checker for quadcopter
#### install php first

1. run "dump" command in INAV Configurator
2. copy command output to a txt file ,eg config.txt
3. run php config.txt

    
$ php inav_chk.php config.txt  
!!! do not USE ARM channel to arm, use stick to arm ,this message always show ,check it yourself  
!!! failsafe_throttle_low_delay not 0,you may got disarm in air when failsafe !  
!!! failsafe_procedure  : SET-THR  failsafe procedure not RTH !  
failsafe_stick_threshold  : 50  
!!! disarm_kill_switch is ON, better disable it  
nav_use_midthr_for_althold is OFF  
!!! nav_auto_speed for （RTH ， WP）:3m/s maybe too slow ！  
nav_auto_climb_rate  :5m/s  
!!! nav_manual_speed   ：5m/s maybe too slow！  
nav_manual_climb_rate  :2m/s  
nav_landing_speed : 2m/s  
!!! nav_emerg_landing_speed : 5m/s maybe too fast  
nav_min_rth_distance   : 5m  
nav_rth_alt_mode  RTH mode: AT_LEAST  
!!! nav_rth_altitude : 10 maybe too low  
max_angle_inclination_rll   :30  
max_angle_inclination_pit  :30  
