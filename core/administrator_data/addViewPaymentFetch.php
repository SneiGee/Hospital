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
        1 => 'patient_name',
        2 => 'title',
        3 => 'amount',
        7 => 'date',
        5 => 'method',
        4 => 'description'
    ); // create colunm like table
  
    $sql = "SELECT * FROM invoice";
    $query = mysqli_query($conn, $sql);
    
    $totalData = mysqli_num_rows($query);
    
    $totalFilter = $totalData;
    
    $sql = "SELECT * FROM invoice WHERE 1=1";
    // Search
    if (!empty($request['search']['value'])) {
        $sql.=" AND (patient_name Like '".$request['search']['value']."%' ";
        $sql.=" OR method Like '".$request['search']['value']."%' )";
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
        $subdata[]=$row[1]; // title
        $subdata[]=$row[2]; // amount
        $subdata[]=$row[3]; // patient_name
        $subdata[]=$row[7]; // date
        $subdata[]="<div style='background:#ff9800;color:#fff;width: 45px;text-align: center'>".$row[5]."</div>"; // status    event on button edit in cell database for display
        $subdata[]=$row[4]; // date
        $data[]=$subdata;
    }
  
    $json_data = array(
        "draw"             =>  intval($request['draw']),
        "recordsTotal"     =>  intval($totalData),
        "recordsFiltered"  =>  intval($totalFilter),
        "data"             =>  $data
    );
  
    echo json_encode($json_data);
  
?>