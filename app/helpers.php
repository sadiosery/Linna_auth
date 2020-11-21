<?php

use Illuminate\Support\Facades\DB;

if(!function_exists('getEdocument'))
{
    function getEdocument($index)
    {
        if($index == 'yes')
        {
            return '<span class="badge badge-success">Autorisé</span>';
        }
        else
        {
            return '<span class="badge badge-danger">Refusé</span>';
        }
    }
}

if(!function_exists('sqlDate'))
{
    function sqlDate($input_date){
    
        $month = substr($input_date,3,2);
        $day = substr($input_date,0,2);
        $year = substr($input_date,6,4);
        $output_date = $year.'-'.$month.'-'.$day;
        
        return $output_date;
    }
}

if(!function_exists('getMonth'))
{
    function getMonth($date)
    {
        return substr($date,5,2);
    }
}

if(!function_exists('getDay'))
{
    function getDay($date)
    {
        return substr($date,8,2);
    }
}

if(!function_exists('getYear'))
{
    function getYear($date)
    {
        return substr($date,0,4);
    }
}

if(!function_exists('returnDate'))
{
    function returnDate($input_date)
    {
            $month = substr($input_date,5,2);
            $day = substr($input_date,8,2);
            $year = substr($input_date,0,4);
            $time = substr($input_date,10);
            $output_date = $day ."/". $month. "/". $year. $time;
            
            return $output_date;
    }
}

if(!function_exists('maxDate'))
{
    function maxDate($date1, $date2)
    {
        if($date1 > $date2) { return $date1; }
        else { return $date2; }
    }
}

if(!function_exists('minDate'))
{
    function minDate($date1, $date2)
    {
        if($date1 > $date2) { return $date2; }
        else { return $date1; }
    }
}

if(!function_exists('url_mg'))
{
    function url_mg($index)
    {
        return  strtolower(str_replace(" ","-",$index));
    }
}

if(!function_exists('returnNumberOp'))
{
    function returnNumberOp($op, $value)
    {
        return ($op == 'n')? '-'.$value: '+'.$value;
    }
}

if(!function_exists('percent'))
{
    function percent($v1, $v2)
    {
        if($v1 == 0)
        {
            return 'no-val';
        }
        else
        {
            return round(((100*(max($v1,$v2) - min($v1,$v2)))/$v1),1);
        }
    }
}

if(!function_exists('compareValue'))
{
    function compareValue($v1, $v2)
    {
        if($v1 > $v2)
        {
            return 'up';
        }
        elseif ($v2 > $v1)
        {
            return 'down';
        }
        else
        {
            return 'fixed';
        }
    }
}

if(!function_exists('removeSpace'))
{
    function removeSpace($index, $mark)
    {
        return  strtolower(str_replace(" ",$mark,$index));
    }
}

if(!function_exists('remove_accent'))
{
    function remove_accent($text)
    {
        /*for($i=0;$i<strlen($text);$i++)
        {
            if($text[$i] == 'é')
            {
                str_replace('é',['e','e','à'],$text[$i]);
            }
            elseif($text[$i] == 'è')
            {
                
            }
            elseif($text[$i] == 'à')
            {
                
            }
        }*/
        str_replace('é','e',$text);
        str_replace('è','e',$text);
        str_replace('à','a',$text);

        return $text;
    } 
}

/************************************* categorisation rules functions ************************************************/
if(!function_exists('contains'))
{
    function contains($label, $value)
    {
        if(strpos($label,$value) !== false)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists('notcontains'))
{
    function notcontains($label, $value)
    {
        if(strpos($label,$value) !== false)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}

if(!function_exists('_equal'))
{
    function _equal($label, $value)
    {
        if($label == $value)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists('superior'))
{
    function superior($label, $value)
    {
        if($label > $value)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists('inferior'))
{
    function inferior($label, $value)
    {
        if($label < $value)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists('different'))
{
    function different($label, $value)
    {
        if($label != $value)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists('between'))
{
    function between($label, $value)
    {
        if((intval(substr($label,0,2)) >= intval(substr($value,0,2))) && (intval(substr($label,0,2)) <= intval(substr($value,3,2))))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}



