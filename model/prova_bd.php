<?php
print_r("Hola");
    $host="127.0.0.1";
    $user="sergio";
    $pass="";
    $db="Who_plays";
    $port="3306";
    //$tabla="t_test";

    $conexion=mysqli_connect($host, $user,$pass, $db, $port)or die(mysql_error());
      // $sql="create database test";
      // $res=mysqli_query($conexion, $sql);
      // print_r($res);

      // $sql="use Who_plays";
      // $res=mysqli_query($conexion, $sql);
      // print_r($res);

      $sql="INSERT INTO event ( event_id,band_id, band_name, description,type_event,n_participants,date_event,type_access,date_ticket, openning, start, end,poster)
      VALUES ('E1234567890','B1234567890', 'Banda','Concierto de presentción','Concierto','4','31/11/2016','Ticket','31/10/2016','22:00','23:00','02:00','/media/cartel.jpg')";
      $res=mysqli_query($conexion,$sql);
      print_r($res);

      mysqli_close($conexion);
      print_r($cad);
