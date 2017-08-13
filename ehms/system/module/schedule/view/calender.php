<?php
/**
*@author  Xu Ding
*@email   thedilab@gmail.com
*@website http://www.StarTutorial.com
**/
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
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show() {
        $year  == null;
         
        $month == null;
         
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
        $y=$this->currentYear;
        $m=$this->currentMonth;
        $d=$this->currentDate;
        
        $con=new mysqli("localhost","root","","ehms");
        
        $sql1="SELECT * FROM schedule WHERE sch_date='$d' AND ts_id=1";
        $result1=$con->query($sql1);
        $no1=$result1->num_rows;
        
        $sql2="SELECT * FROM schedule WHERE sch_date='$d' AND ts_id=2";
        $result2=$con->query($sql2);
        $no2=$result2->num_rows;
        
        $sql3="SELECT * FROM schedule WHERE sch_date='$d' AND ts_id=3";
        $result3=$con->query($sql3);
        $no3=$result3->num_rows;
        
        $sql4="SELECT * FROM schedule WHERE sch_date='$d' AND ts_id=4";
        $result4=$con->query($sql4);
        $no4=$result4->num_rows;
        
        $sql5="SELECT * FROM schedule WHERE sch_date='$d' AND ts_id=5";
        $result5=$con->query($sql5);
        $no5=$result5->num_rows;
         
        $a='<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">';
        if($cellContent!=null){
        if($no1==0){
           $s1="<a href='bookschedule.php?date=".$d."&id=1'>"
                   . "<span class='alert-success'>BF : Available</span></a>";
        }else{
            $row1=$result1->fetch_assoc();
            $sch_id=$row1['sch_id'];
        $s1="<a href='viewschedule.php?sch_id=".$sch_id."'>"
                . "<span class='alert-danger'>BF :Booked<span></a>";
         
        }
        
        if($no2==0){
           $s2="<a href='bookschedule.php?date=".$d."&id=2'>"
                   . "<span class='alert-success'>MT : Available</span></a>";
        }else{
            $row2=$result2->fetch_assoc();
            $sch_id=$row2['sch_id'];
             $s2="<a href='viewschedule.php?sch_id=".$sch_id."'>"
                . "<span class='alert-danger'>MT :Booked<span></a>";       
        
        }
        if($no3==0){
           $s3="<a href='bookschedule.php?date=".$d."&id=3'>"
                   . "<span class='alert-success'>L : Available</span></a>";
        }else{
            $row3=$result3->fetch_assoc();
            $sch_id=$row3['sch_id'];
             $s3="<a href='viewschedule.php?sch_id=".$sch_id."'>"
                . "<span class='alert-danger'>L :Booked<span></a>";       
        
        }
        if($no4==0){
           $s4="<a href='bookschedule.php?date=".$d."&id=4'>"
                   . "<span class='alert-success'>ET : Available</span></a>";
        }else{
            $row4=$result4->fetch_assoc();
            $sch_id=$row4['sch_id'];
             $s4="<a href='viewschedule.php?sch_id=".$sch_id."'>"
                . "<span class='alert-danger'>ET :Booked<span></a>";       
        
        }
        if($no5==0){
           $s5="<a href='bookschedule.php?date=".$d."&id=5'>"
                   . "<span class='alert-success'>D: Available</span></a>";
        }else{
            $row5=$result5->fetch_assoc();
            $sch_id=$row5['sch_id'];
             $s5="<a href='viewschedule.php?sch_id=".$sch_id."'>"
                . "<span class='alert-danger'>D :Booked<span></a>";        
        } 
        
        }
        $a.=$cellContent."<br />".$s1.'<br/>'.$s2.'<br />'.$s3.'<BR />'.$s4.'<br />'.$s5.'</li>';
        
        return $a;
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
//- See more at: http://www.startutorial.com/articles/view/how-to-build-a-web-calendar-in-php#sthash.tewvaAdP.dpuf
