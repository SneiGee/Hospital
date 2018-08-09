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
        4 => 'price',
        5 => 'manufacturing_company',
        7 => 'status'
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
        $subdata[]=$row[4]; // price
        $subdata[]=$row[5]; // manufacturing_company 
        $subdata[]=$row[7]; // status    event on button edit in cell database for display
        $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalEdit" data-id="'.$row[0].'"><i class="fa fa-pencil">&nbsp;</i>Edit</button>
        <a href="pharmacist_manageMedicine.php?delete='.$row[0].'" onclick="return confirm(\'Are you sure you want to delete this data?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash">&nbsp;</i>Delete</a>';
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