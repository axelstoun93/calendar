<?php
class DateAssistant
{

    static function getDate($month = false,$years = false)
    {
        $date = date('t',mktime(0, 0, 0, (!empty($month)) ? $month : date('n'), 1, (!empty($years)) ? $years: date('Y')));
        return $date;
    }
    static function transFrontDate($str)
    {
        $date = explode('-',$str);
        $fdate = $date[1].'/'.$date[2].'/'.$date[0];
        return $fdate;
    }
    static function transBackDate($str,$sim = '/')
    {
        if (!is_array($str) || !is_object($str)) {
            $date = explode('/',$str);
            $fdate = $date[2].'-'.$date[0].'-'.$date[1];
            return $fdate;
        }
        throw new \Exception('Произошла ошибка в '.__METHOD__);
    }
    static function renderingDate($data,$month,$years)
    {
        $years = (!empty($years)) ? $years : date('Y');
        $month = (!empty($month)) ?  (10 > $month) ? '0'.$month  : $month  : date('m');
        $data  = (10 > $data) ? '0'.$data : $data;
        $res = $years.'-'.$month.'-'.$data;
        return $res;
    }
    static function navigateDate($month = false,$years = false)
    {
        $nav = [];
        $years = (!empty($years)) ? $years : date('Y');
        $month = (!empty($month)) ? $month : date('n');
        $m_arr = [1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'];
        $nextDate = ($month == 12) ? 'month=1&years='.($years + 1) : 'month='.($month + 1).'&years='.$years;
        $previousDate = ($month == 1) ? 'month=12&years='.($years - 1) : 'month='.($month-1).'&years='.$years;
        $nav = ['month' => $m_arr[$month],'years'=> $years,'nextDate' => $nextDate,'previousDate'=> $previousDate];
        return (object)$nav;

    }
    static function oneDay($str,$time = true)
    {
        if($time)
        {
            $res =   explode(' ',$str);
            return $res[1];
        }
        $res =   explode(' ',$str);
        $changeDate =  explode('-',$res[0]);
        $res = (!empty($changeDate[2])) ? $changeDate[2] : '';
        return $res;
    }
}