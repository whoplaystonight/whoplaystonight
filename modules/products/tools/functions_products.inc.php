<?php

function validate_product($paramether) {
    $error =array();
    $valid = true;
    $filter= array(
        'event_id'=> array(
            'filter'=> FILTER_VALIDATE_REGEXP,
            'options'=> array('regexp'=>'/^[E]{1}[0-9]{10}+$/'),
        ),//end of event_id array

        // 'band_id'=> array(
        //     'filter'=> FILTER_VALIDATE_REGEXP,
        //     'options'=> array('regexp'=>'/^[B]{1}[0-9]{10}+$/'),
        // ),//end of band_id array
        //
        // 'band_name'=> array(
        //     'filter'=> FILTER_VALIDATE_REGEXP,
        //     'options'=> array('regexp'=>'/^(.){1,50}$/'),
        // ),//end of band_name array
        //
        // 'description'=> array(
        //     'filter'=> FILTER_VALIDATE_REGEXP,
        //     'options'=> array('regexp'=>'/^(.){20,500}$/'),
        // ),//end of description array
        //
        // 'n_participants'=> array(
        //     'filter'=> FILTER_VALIDATE_REGEXP,
        //     'options'=> array('regexp'=>'/^[1-9]{1,3}$/'),
        // ),//end of description array


    );//end of filter array

    $result_1=filter_input_array(INPUT_POST,$filter);
    $result_1['type_event']=$_POST['type_event'];
    $result_1['date_event']=$_POST['date_event'];
    $result_1['type_access']=$_POST['type_access'];
    $result_1['date_ticket']=$_POST['date_ticket'];
    $result_1['openning']=$_POST['openning'];
    $result_1['start']=$_POST['start'];
    $result_1['end']=$_POST['end'];



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

            $error['band_name']='Band name must not have more than 50 characters';
            $valid=false;

        }

        if(!$result_1['description']){

            $error['description']='Description must have between 20 and 500 characters';
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

            $check_dates= compare_dates($_POST['date_ticket'],$_POST['date_event']);


            if(!$check_dates){

                $error['date_ticket']='Date of ticket sales can \'t be later than the event date ';
                $valid=false;
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

        if($result_1['end']==null){
            $error['end']="You must select one option at least";
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
