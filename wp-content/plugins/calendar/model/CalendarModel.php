<?php
include CALENDAR_DIR.'model/assistans/DateAssistant.php';
class CalendarModel
{
    protected $wpdb;
    function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
    }
    public function renderingCalendar($month = false, $years = false)
    {
        $date = DateAssistant::getDate($month, $years);
        $arrayCourse = $this->getMonthDate($month, $years);
        $week = [];
        // Вычисляем число дней в текущем месяце
        $dayofmonth = $date;

        // Счётчик для дней месяца
        $day_count = 1;
        // 1. Первая неделя
        $num = 0;
        foreach ($arrayCourse as $key => $v) {
            $num = 0;
            $day_count = 1;
            for ($i = 0; $i < 7; $i++) {


                $dayofweek = date('w', mktime(0, 0, 0, (!empty($month)) ? $month : date('m'), $day_count, (!empty($years)) ? $years : date('Y')));

                $dayofweek = $dayofweek - 1;

                if ($dayofweek == -1) $dayofweek = 6;

                if ($dayofweek == $i) {
                    // Если дни недели совпадают,
                    // заполняем массив $week
                    // числами месяца
                    $week[$num][$i]['day'] = $day_count;
                    $week[$num][$i]['fullDate'] = DateAssistant::renderingDate($day_count, $month, $years);
                    if ($v->date == $day_count) {
                        $week[$num][$i]['events'] = true;
                    }
                    $day_count++;
                } else {
                    $week[$num][$i]['day'] = "";
                }
            }
            // 2. Последующие недели месяца
            while (true) {
                $num++;
                for ($i = 0; $i < 7; $i++) {
                    $week[$num][$i]['day'] = $day_count;
                    $week[$num][$i]['fullDate'] = DateAssistant::renderingDate($day_count, $month, $years);
                    if ($v->date == $day_count) {
                        $week[$num][$i]['events'][] = $v;
                    }
                    $day_count++;
                    // Если достигли конца месяца - выходим
                    // из цикла
                    if ($day_count > $dayofmonth) break;
                }
                // Если достигли конца месяца - выходим
                // из цикла
                if ($day_count > $dayofmonth) break;
            }
        }
        if (!empty($week)) {
            return $week;
        } else {
            for ($i = 0; $i < 7; $i++) {
                $dayofweek = date('w', mktime(0, 0, 0, (!empty($month)) ? $month : date('m'), $day_count, (!empty($years)) ? $years : date('Y')));

                $dayofweek = $dayofweek - 1;

                if ($dayofweek == -1) $dayofweek = 6;

                if ($dayofweek == $i) {
                    // Если дни недели совпадают,
                    // заполняем массив $week
                    // числами месяца
                    $week[$num][$i]['day'] = $day_count;
                    $week[$num][$i]['fullDate'] = DateAssistant::renderingDate($day_count, $month, $years);
                    $day_count++;
                } else {
                    $week[$num][$i]['day'] = "";
                }
            }
            // 2. Последующие недели месяца
            while (true) {
                $num++;
                for ($i = 0; $i < 7; $i++) {
                    $week[$num][$i]['day'] = $day_count;
                    $week[$num][$i]['fullDate'] = DateAssistant::renderingDate($day_count, $month, $years);
                    $day_count++;
                    // Если достигли конца месяца - выходим
                    // из цикла
                    if ($day_count > $dayofmonth) break;
                }
                // Если достигли конца месяца - выходим
                // из цикла
                if ($day_count > $dayofmonth) break;
            }
            return $week;
        }
    }
    public function getNavigate($month = false,$years = false)
    {
        return  $res = DateAssistant::navigateDate($month,$years);
    }
    function saveDate($request)
    {
        $setRequest = $request.' %%:%%:%%';
        $sql = "SELECT `id` FROM `wp_calendar` WHERE `date` LIKE '$setRequest'";
        if($res = $this->wpdb->get_row($sql))
        {
            $this->wpdb->query("DELETE FROM wp_calendar WHERE `id` = $res->id");
        }
        else
        {
            $this->wpdb->insert('wp_calendar',['date' => $request],['%s']);
        }
    }
    function getMonthDate($month, $years)
    {
        $strYears = (!empty($years)) ? $years : date('Y');
        $strYears.= '-';
        $strYears.= (!empty($month)) ? (10 > $month) ? '0'.$month  : $month  : date('m');
        $strYears.= '-% %%:%%:%%';
        $sql = "SELECT `id`,`date` FROM `wp_calendar` WHERE `date` LIKE '$strYears'";
        if($res = $this->wpdb->get_results($sql))
        {
            foreach($res as $val)
            {
                if($val->date)
                {
                    $val->date = DateAssistant::oneDay($val->date,false);
                }
            }
            return $res;
        }
        else
        {
            return [];
        }
    }
}