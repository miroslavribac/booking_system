<?php


class Calendar {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    /********************* PROPERTY ********************/
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");

    private $currentYear=0;

    private $currentMonth=0;

    private $currentDay=0;

    private $currentDate=null;

    private $daysInMonth=0;

    private $naviHref= null;

    const HOURS_IN_DAY = 24;

    /********************* PUBLIC **********************/

    /**
     * print out the calendar
     */
    public function show() {
        $year  = null;

        $month = null;

        $hours = null;

        if(null==$year&&isset($_GET['year'])){

            $year = $_GET['year'];

        }else if(null==$year){

            $year = date("Y",time());

        }

        if(null==$month&&isset($_GET['month'])){

            $month = $_GET['month'];

        }else if(null==$month){

            $month = date("m",time());

        }

        $this->currentYear=$year;

        $this->currentMonth=$month;

        $this->daysInMonth=$this->_daysInMonth($month,$year);

        $content='<div id="calendar">'.
            '<div class="box">'.
            $this->_createNavi().
            '</div>'.
            '<div class="box-content">'.
            '<ul class="label">'.$this->_createLabels().'</ul>';
        $content.='<div class="clear"></div>';
        $content.='<ul class="dates">';

        $weeksInMonth = $this->_weeksInMonth($month,$year);
        // Create weeks in a month
        for( $i=0; $i<$weeksInMonth; $i++ ){

            //Create days in a week
            for($j=1;$j<=7;$j++){
                $content.=$this->_showDay($i*7+$j);
            }
        }

        $content.='</ul>';

        $content.='<div class="clear"></div>';

        $content.='</div>';

        $content.='</div>';
        return $content;
    }

    /**
     * Prints out daily calendar
     */
    public function showDaily()
    {
        $year  = null;

        $month = null;

        $day = null;

        if(null==$year && isset($_GET['year'])){
            $this->currentYear = $_GET['year'];
        }else{
            $this->currentYear = date("Y", time());
        }

        if(null==$month && isset($_GET['month'])){
            $this->currentMonth = $_GET['month'];
        }else{
            $this->currentMonth = date("m", time());
        }

        if(null==$day&& isset($_GET['day'])){
            $this->currentDay = $_GET['day'];
        }else{
            $this->currentDay = date("d", time());
        }

        $days_in_month = date("t");
        $month = date('M', mktime(0, 0, 0, $this->currentMonth, 10));

        $nextDay = $this->currentDay == $days_in_month ? 01 : $this->currentDay+1;
        $prevDay = $this->currentDay == 01 ? $this->_previousMonthLastDay() : $this->currentDay-1;

        $prevMonth = $this->currentMonth == 01 ? 12 : $this->currentMonth-1;

        return
            '<a href="'.$this->naviHref.'?month='.$this->_prevMonth().'&day='.$prevDay.'">Prev</a>'.
            '<span>'.$this->_currentMonth() . " " . $this->_currentDay().'</span>'.
            '<a href="'.$this->naviHref.'?month='.$this->_nextMonth().'&day='.$nextDay.'">Next</a>';

    }

    private function _prevMonth()
    {
        if($this->currentMonth == 01){
            $this->currentMonth = 12;
        }else if($this->currentDay == 01){
            $this->currentMonth = $this->currentMonth-1;
        }
        return $this->currentMonth;
    }

    private function _nextMonth()
    {
        if((date("t") == $this->currentDay) && ($this->currentMonth == 12)){
            $this->currentMonth = 01;
            return $this->currentMonth;
        }elseif(date("t") == $this->currentDay){
            $this->currentMonth = $this->currentMonth+1;
            return $this->currentMonth;
        }else{
            return $this->currentMonth;
        }



//        if($this->currentDay == date("t")){
//            $this->currentMonth = $this->currentMonth+1;
//        }elseif(($this->currentMonth == 12) && ($this->currentDay == date("t"))){
//            $this->currentMonth = 1;
//        }
//        return $this->currentMonth;
    }

    private function _previousMonthLastDay()
    {
        return date("d", strtotime("last day of " . strval($this->currentMonth-1) . " month"));
    }

    private function _currentMonth()
    {
       return date('M', mktime(0, 0, 0, $this->currentMonth, 10));
    }

    private function _currentDay()
    {
        return $this->currentDay;
    }


    /********************* PRIVATE **********************/
    /**
     * create the li element for ul
     */
    private function _showDay($cellNumber){

        if($this->currentDay==0){

            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));

            if(intval($cellNumber) == intval($firstDayOfTheWeek)){

                $this->currentDay=1;

            }
        }

        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){

            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

            $cellContent = $this->currentDay;

            $this->currentDay++;

        }else{

            $this->currentDate =null;

            $cellContent=null;
        }

        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
        ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
    }

    /**
     * create navigation
     */
    private function _createNavi(){

        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;

        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;

        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;

        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;

        return
            '<div class="header">'.
            '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
            '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
            '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
            '</div>';
    }

    /**
     * create daily navigation
     */
    private function _createDayNavi()
    {
        $nextDay = $this->currentDay==24?1:intval($this->currentDay)+1;

        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;

        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;

        $preDay = $this->currentDay==1?24:intval($this->currentDay)-1;

        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;

        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;

        return
            '<div class="header">'.
            '<a class="prev" href="'.$this->naviHref.'?day='.sprintf('%02d',$preDay).'&month='.$preMonth.'">Prev</a>'.
            '<span class="title">'.date('M d',strtotime($this->currentMonth.'-'.$this->currentDay.'-1')).'</span>'.
            '<a class="next" href="'.$this->naviHref.'?day='.sprintf("%02d", $nextDay).'&month='.$nextMonth.'">Next</a>'.
            '</div>';

    }

    /**
     * create calendar week labels
     */
    private function _createLabels(){

        $content='';

        foreach($this->dayLabels as $index=>$label){

            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';

        }

        return $content;
    }



    /**
     * calculate number of weeks in a particular month
     */
    private function _weeksInMonth($month=null,$year=null){

        if( null==($year) ) {
            $year =  date("Y",time());
        }

        if(null==($month)) {
            $month = date("m",time());
        }

        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);

        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);

        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));

        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));

        if($monthEndingDay<$monthStartDay){

            $numOfweeks++;

        }

        return $numOfweeks;
    }

    /**
     * calculate number of days in a particular month
     */
    private function _daysInMonth($month=null,$year=null){

        if(null==($year))
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        return date('t',strtotime($year.'-'.$month.'-01'));
    }

}