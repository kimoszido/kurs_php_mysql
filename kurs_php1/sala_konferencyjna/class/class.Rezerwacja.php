<?php
//require_once("../db.php");

    class Reservation
    {
        protected $dateOfReservation;
        protected $time_start;
        protected $time_stop;

        public function __construct($dateOfReservation, $time_start, $time_stop)
        {
            $this->dateOfReservation = $dateOfReservation;
            $this->time_start = $time_start;
            $this->time_stop = $time_stop;
        }
        public function getReservationDate ()
        {
            return $this->dateOfReservation;
        }
        public function getReservationTime_start ()
        {
            return $this->time_start;
        }
        public function getReservationTime_stop ()
        {
            return $this->time_stop;
        }
        public function setReservation ($dateOfReservation, $time_start, $time_stop)
        {
            $this->dateOfReservation = $dateOfReservation;
            $this->time_start = $time_start;
            $this->time_stop = $time_stop;
        }
        public function saveToBaseReservation($db, $reservation)
        {
            if($reservation->checkFreeTerm($db, $reservation))
            {
                $time_stop_new = new DateTime($this->time_stop);
                $time_stop_new->add(new DateInterval('PT1H'));
                //$time_stop_new->format('H:i:s');
                //print_r($time_stop_new);
                $db->query("INSERT INTO reservations (dateOfReservation, time_start, time_stop) 
                    VALUE (?, ?, ?);"
                    , $this->dateOfReservation, $this->time_start, date_format($time_stop_new, 'H:i:s'));
            }
        }
        public function checkFreeTerm ($db, $reservation)
        {
            $dateOfReservation = new DateTime($this->dateOfReservation);
            if(!$reservation->isThatDateWorkingDay(date_format($dateOfReservation, 'Y-m-d')))
            {
                echo "W ten dzień mamy zamknięte <br/>";
                return false;
            }

            $query = $db->query("SELECT time_start, time_stop FROM reservations WHERE dateOfReservation = ?;", $this->dateOfReservation);
            $tab = $query->fetchAll();
            
            if(!empty($tab))
            {
                foreach($tab as $valueArray)
                {
                    $time_start_new = new DateTime($this->time_start);
                    $time_stop_new = new DateTime($this->time_stop);
                    $time_start_db = new DateTime($valueArray['time_start']);
                    $time_stop_db = new DateTime($valueArray['time_stop']);
                    $time_open = new DateTime('08:00:00');
                    $time_close = new DateTime('20:00:00');
                    if($time_start_new > $time_stop_new)
                    {
                        echo "Zły przedział czasowy <br/>";
                        return false;
                    }
                    elseif($time_start_new < $time_open or $time_stop_new > $time_close)
                    {
                        echo "O tej godzinie sala jest zamknięta <br/>";
                        return false;
                    }
                    elseif($time_start_new <= $time_start_db and $time_stop_new >= $time_stop_db)
                    {
                        echo "Termin jest już zajęty <br/>";
                        return false;
                    }
                    elseif($time_start_new >= $time_start_db and $time_start_new <= $time_start_db)
                    {
                        echo "Termin jest już zajęty <br/>";
                        return false;
                    }
                    elseif($time_stop_db <= $time_stop_new and $time_stop_db >= $time_start_new)
                    {
                        echo "Termin jest już zajęty <br/>";
                        return false;
                    }
                    else
                    {
                        echo "Udało się! Zarezerwowałeś/aś salę <br/>";
                        return true;
                    }
                }
            }
            else
            {
                echo "Udało się! Zarezerwowałeś/aś salę <br/>";
                return true;
            }
        }

        function isThatDateWorkingDay($date) 
        {
            $time = strtotime($date);
            $dayOfWeek = (int)date('w',$time);
            $year = (int)date('Y',$time);
         
            if($dayOfWeek==0 ) 
            {
                return false;
            }
         
            $freeDays=array('01-01', '01-06','05-01','05-03','08-15','11-01','11-11','12-25','12-26');
         
            $easter = date('m-d', easter_date( $year ));
            $easterSec = date('m-d', strtotime('+1 day', strtotime( $year . '-' . $easter) ));
            $corpusChristi = date('m-d', strtotime('+60 days', strtotime( $year . '-' . $easter) ));
            $whitSunday = date('m-d', strtotime('+49 days', strtotime( $year . '-' . $easter) ));
         
            $freeDays[] = $easter;
            $freeDays[] = $easterSec;
            $freeDays[] = $corpusChristi;
            $freeDays[] = $whitSunday;
         
            $md = date('m-d',strtotime($date));
            if(in_array($md, $freeDays)) return false;
         
            return true;
        }
    }
?>