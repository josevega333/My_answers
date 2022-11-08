<?php
//Number of seconds to format
$seconds = 32090001;

class format
{
    protected $time = 0;
   
    function __construct($argument)
    {
        $this->time = $argument;
    }
   
    function seconds_to_format()
    {
        $argument = $this->time;
        //this variable will contain the final result
        $result = array();
       
        //units of time in seconds
        $year_int = 60*60*24*365;
        $day_int = 60*60*24;
        $hour_int = 60*60;
        $minute_int = 60;
       
        //the following variables contain the units of time in singular, the code below shows/transform these variables depending on multiple conditions
        $year = "year";
        $day = "day";
        $minute = "minute";
        $second = "second";
        //if the user input 0 seconds
        if($argument == 0)
        {
            $result = "now";
        }//We verify the data entered
        else if(is_int($argument) and $argument >= 0)  
        {
            //we identify the different parts of $argument
            $years = intdiv($argument,$year_int);
            $argument = $argument % $year_int;
           
            $days = intdiv($argument,$day_int);
            $argument = $argument % $day_int;
           
            $hours = intdiv($argument,$hour_int);
            $argument = $argument % $hour_int;
           
            $minutes = intdiv($argument,$minute_int);
            $argument = $argument % $minute_int;
           
            $seconds = $argument;
           
            if($years != 0)
            {
                if($years == 1)
                {
                    array_push($result,"1 year");
                }
                else
                {
                    array_push($result,"$years years");
                }
            }
           
            if($days != 0)
            {
                if($days == 1)
                {
                    array_push($result,"1 day");
                }
                else
                {
                    array_push($result,"$days days");
                }
            }
           
            if($hours != 0)
            {
                if($hours == 1)
                {
                    array_push($result,"1 hour");
                }
                else
                {
                    array_push($result,"$hours hours");
                }
            }
           
            if($minutes != 0)
            {
                if($minutes == 1)
                {
                    array_push($result,"1 minute");
                }
                else
                {
                    array_push($result,"$minutes minutes");
                }
            }
           
            if($seconds != 0)
            {
                if($seconds == 1)
                {
                    array_push($result,"1 second");
                }
                else
                {
                    array_push($result,"$seconds seconds");
                }
            }
           
            //array to formatted string
            if(count($result) == 1)
            {
                $result = $result[0];
            }
            else if(count($result) == 2)
            {
                $result = $result[0] . " and ". $result[1];
            }
            else if(count($result) == 3)
            {
                $result = $result[0] . ", " . $result[1] . " and ".$result[2];
            }
            else if(count($result) == 4)
            {
                $result = $result[0] . ", " . $result[1] . ", " . $result[2] . " and ".$result[3];
            }
            else
            {
                $result = $result[0] . ", ". $result[1] . ", " . $result[2] . ", " . $result[3] . " and ".$result[4];
            }
           
        }
        //we show the result
        return $result;
    }
}

$my_object = new format($seconds);
echo $my_object->seconds_to_format();
?>
