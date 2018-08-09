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
        1 => 'bed_number',
        2 => 'bed_type',
        3 => 'patient_name',
        4 => 'allotmentTime',
        5 => 'dischargeTime'
    ); // create colunm like table
   
    $sql = "SELECT * FROM bedAllotment";
    $query = mysqli_query($conn, $sql);
    
    $totalData = mysqli_num_rows($query);
    
    $totalFilter = $totalData;
    
    $sql = "SELECT * FROM bedAllotment WHERE 1=1";
    // Search
    if (!empty($request['search']['value'])) {
        $sql.=" AND (bed_number Like '".$request['search']['value']."%' ";
        $sql.=" OR patient_name Like '".$request['search']['value']."%' )";
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
        $subdata[]=$row[1]; // bed_number
        $subdata[]=$row[2]; // bed_type
        $subdata[]=$row[3]; // patient_name
        $subdata[]=$row[4]; // allotment_time
        $subdata[]=$row[5]; // dischargeTime
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