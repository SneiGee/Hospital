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
        2 => 'title',
        3 => 'amount',
        1 => 'patient_name',
        7 => 'date',
        6 => 'status'
    ); // create colunm like table
  
    $sql = "SELECT * FROM invoice";
    $query = mysqli_query($conn, $sql);
    
    $totalData = mysqli_num_rows($query);
    
    $totalFilter = $totalData;
    
    $sql = "SELECT * FROM invoice WHERE 1=1";
    // Search
    if (!empty($request['search']['value'])) {
        $sql.=" AND (patient_name Like '".$request['search']['value']."%' ";
        $sql.=" OR status Like '".$request['search']['value']."%' )";
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
        $subdata[]=$row[2]; // title
        $subdata[]=$row[3]; // amount
        $subdata[]=$row[1]; // patient_name
        $subdata[]=$row[7]; // date
        $subdata[]="<div style='background:#4CAF50;color:#fff;width: 45px;text-align: center'>".$row[6]."</div>"; // status    event on button edit in cell database for display
        $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalEdit" data-id="'.$row[0].'"><i class="fa fa-pencil">&nbsp;</i>Edit</button>
            <a href="accountant_takePayment.php?delete='.$row[0].'" onclick="return confirm(\'Are you sure you want to delete this data?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash">&nbsp;</i>Delete</button>';
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