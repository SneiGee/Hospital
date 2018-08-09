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
        1 => 'medicine_name',
        2 => 'category_name',
        3 => 'description',
        4 => 'price',
        5 => 'manufacturing_company',
        6 => 'status'
    ); // create colunm like table
   
    $sql = "SELECT * FROM medicine";
    $query = mysqli_query($conn, $sql);
    
    $totalData = mysqli_num_rows($query);
    
    $totalFilter = $totalData;
    
    $sql = "SELECT * FROM medicine WHERE 1=1";
    // Search
    if (!empty($request['search']['value'])) {
        $sql.=" AND (medicine_name Like '".$request['search']['value']."%' ";
        $sql.=" OR category_name Like '".$request['search']['value']."%' )";
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
        $subdata[]=$row[1]; // medicine_name
        $subdata[]=$row[2]; // category_name
        $subdata[]=$row[3]; // description
        $subdata[]=$row[4]; // price
        $subdata[]=$row[5]; // manufacturing_company
        $subdata[]=$row[6]; // status
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