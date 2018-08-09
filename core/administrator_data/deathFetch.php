<?php

 # ============================================
   #  MYBLOGSITE HOSPITAL MANAGEMENT SYSTEM
   #  ONINE ADVANCE MANAGEMENT SOFTWARE
   #  BUILD BY: SCHNEIDER MICHAEL 
# ==============================================


    include_once 'db.inc.php';
  
  $request = $_REQUEST;
  
    $col = array(
        0 => 'id',
        1 => 'doctor_name',
        2 => 'patient_name',
        3 => 'description',
        4 => 'date'
    ); // create column like table
  
    $sql = "SELECT * FROM death_report";
    $query = mysqli_query($conn, $sql);
    
    $totalData = mysqli_num_rows($query);
    
    $totalFilter = $totalData;
    
    $sql = "SELECT * FROM death_report WHERE 1=1";
    // Search
    if (!empty($request['search']['value'])) {
        $sql.=" AND (patient_name Like '".$request['search']['value']."%' ";
        $sql.=" OR doctor_name Like '".$request['search']['value']."%' )";
    }
    $query = mysqli_query($conn, $sql);
    $tota4lData = mysqli_num_rows($query);
  
    // Order 
    $sql.=" ORDER BY ".$col[$request['order'][0]['column']]."  ".$request['order'][0]['dir']."  LIMIT ".
          $request['start']."  ,".$request['length']."  ";
    $query = mysqli_query($conn, $sql);
  
  
    $data = array();
  
    while ($row = mysqli_fetch_array($query)) {
        $subdata=array();
        $subdata[]=$row[0]; // id
        $subdata[]=$row[1]; // namdescriptione
        $subdata[]=$row[2]; // date
        $subdata[]=$row[3]; // patient_name
        $subdata[]=$row[4]; // doctor_name
        $data[] =$subdata;
    }
  
    $json_data = array(
        "draw"             =>  intval($request['draw']),
        "recordsTotal"     =>  intval($totalData),
        "recordsFiltered"  =>  intval($totalFilter),
        "data"             =>  $data
    );
  
    echo json_encode($json_data);
  
?>