<?php

function validate_product($paramether) {
  // echo json_encode($paramether);
  // exit;

    $error =array();
    $valid = true;
    $filter= array(
      'event_id'=> array(
          'filter'=> FILTER_VALIDATE_REGEXP,
          'options'=> array('regexp'=>'/^[E]{1}[0-9]{10}+$/'),
      ),//end of band_id array

        'band_id'=> array(
            'filter'=> FILTER_VALIDATE_REGEXP,
            'options'=> array('regexp'=>'/^[B]{1}[0-9]{10}+$/'),
        ),//end of band_id array

        'band_name'=> array(
            'filter'=> FILTER_VALIDATE_REGEXP,
            'options'=> array('regexp'=>'/^(.){1,50}$/'),
        ),//end of band_name array

        'description'=> array(
            'filter'=> FILTER_VALIDATE_REGEXP,
            'options'=> array('regexp'=>'/^(.){20,500}$/'),
        ),//end of description array

        'n_participants'=> array(
            'filter'=> FILTER_VALIDATE_REGEXP,
            'options'=> array('regexp'=>'/^[1-9]{1,3}$/'),
        ),//end of description array


    );//end of filter array

    $result_1=filter_var_array($paramether,$filter);

    //return json_encode($result_1);
    $result_1['country']=$paramether['country'];
    $result_1['province']=$paramether['province'];
    $result_1['town']=$paramether['town'];
    $result_1['type_event']=$paramether['type_event'];
    $result_1['date_event']=$paramether['date_event'];
    $result_1['type_access']=$paramether['type_access'];
    $result_1['date_ticket']=$paramether['date_ticket'];
    $result_1['openning']=$paramether['openning'];
    $result_1['start']=$paramether['start'];
    $result_1['end']=$paramether['end'];
    // echo json_encode($result_1);
    // exit;



    /*IF CHECK $result*/
     if($result_1 !=null && $result_1){

        if(!$result_1['event_id']){

            $error['event_id']='Event ID must have one E follow by 10 digits';
            $valid=false;

        }

        if(!$result_1['band_id']){

            $error['band_id']='Band ID must have one B follow by 10 digits';
            $valid=false;

        }

         if(!$result_1['band_name']){

            $error['band_name']='Band name must have between 1 and 50 characters';
            $valid=false;

        }

        if(!$result_1['description']){

            $error['description']='Description must have between 20 and 500 characters';
            $valid=false;

        }

        if($result_1['country']==null || $result_1['country']=='Select a country'){
          $error['country']='Please select a country';
          $valid=false;

        }

        if($result_1['province']==null || $result_1['province']=='Select a province'){
          $error['province']='Please select a province';
          $valid=false;

        }

        if($result_1['town']==null || $result_1['town']=='Select a town'){
          $error['town']='Please select a town';
          $valid=false;

        }

        if( $result_1['type_event']==null){

            $error['type_event']='You must select one option at least';
            $valid=false;
        }

        if(!$result_1['n_participants']){

            $error['n_participants']='Number of participants must be between 1 and 999';
            $valid=false;

        }

        if(($result_1['date_event']==null)||($result_1['date_event']=='Enter date of event')){

            $error['date_event']='Event date field can\'t be empty';
            $valid=false;

        }

        if($result_1['type_access']==null){

            $error['type_access']='You must select one option at least';
            $valid=false;

        }

        if(($result_1['date_event']==null)||($result_1['date_event']=='Enter date of event')){

            $error['date_event']='Event date field can\'t be empty';
            $valid=false;

        }elseif(($result_1['date_ticket']==null)||($result_1['date_ticket']=='Enter date of ticket sales')){

            $error['date_ticket']='Ticket sales date field can\'t be empty';
            $valid=false;

        }else{
            if($result_1['date_ticket']!="Free admission"){

            $check_dates= compare_dates($result_1['date_ticket'],$result_1['date_event']);


            if(!$check_dates){

                $error['date_ticket']='Date of ticket sales can \'t be later than the event date ';
                $valid=false;
            }
          }
        }

        if($result_1['openning']==null){
            $error['openning']="You must select one option at least";
            $valid=false;
        }

        if($result_1['start']==null){
            $error['start']="You must select one option at least";
            $valid=false;
        }

        if($result_1['start']<$result_1['openning']){
            $error['start']="Start time cannot be less than the time of opening doors";
            $valid=false;
        }

        if($result_1['end']==null){
            $error['end']="You must select one option at least";
            $valid=false;
        }

        if($result_1['end']<=$result_1['start']){
            $error['start']="Ending time must be greater than the start time";
            $valid=false;
        }

    }else{
        $valid=false;
    };/*END IF CHECK $result*/
     return $return=array('result'=> $valid, 'error'=>$error, 'data'=>$result_1);


}//End of validate_user function

function compare_dates($date_ticket,$date_event){


    $date_ticket1=date("d/m/Y", strtotime($date_ticket));
    $date_event1=date("d/m/Y", strtotime($date_event));


    list($day_1, $month_1,  $year_1)=split('/',$date_ticket);
    list($day_2, $month_2,  $year_2)=split('/',$date_event);

    $date_ticket2=new DateTime($year_1 ."-" . $month_1 ."-" .$day_1);
    $date_event2=new DateTime($year_2 ."-" . $month_2 ."-" .$day_2);

    if($date_ticket2 <= $date_event2){
        return true;
    }
    return false;


}
