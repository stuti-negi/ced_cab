<?php
session_start();

require "dbcon.php";
$student_id = $_POST['ID'];

// to display data on showdata.php

$show_data_query="SELECT * FROM `tbl_user` WHERE `user_id` ={$student_id}";
$showresult=mysqli_query($connect,$show_data_query) or die("SQL Query Failed.");
$output="";

if(mysqli_num_rows($showresult)>0){


      while($row= mysqli_fetch_assoc($showresult))
     
      {
        if($row['status']=="1")
        {$output.="<div class='form-group'>
          <label for='name'> USER ID:</label>
          <input type='text' class='form-control' placeholder='Enter Name' name='ID' id='edit_id' value='{$row['user_id']}' readonly>
          </div>
          <div class='form-group'>
          <label for='name'> Name:</label>
          <input type='text' class='form-control' placeholder='Enter Name' name='pname' id='euname' value='{$row['name']}' >
        </div>
        <div class='form-group'>
          <label for='email'>Email address:</label>
          <input type='email' class='form-control' placeholder='Enter email' name='email'  id='email' value='{$row['email_id']}' readonly>
        </div>
        <div class='form-group'>
          <label for='name'>Date of signup:</label>
          <input type='text' class='form-control' placeholder='Enter Name' name='name' id='name' value='{$row['dateofsignup']}' disabled>
        </div>

        <div class='form-group'>
          <label for='name'>Student Contact Number:</label>
          <input type='number' class='form-control' placeholder='Enter Contact Number' name='number'  id='number' value='{$row['mobile']}'>
        </div>
        <div >
        
 
        <div >
        <div><label >STATUS</label></div>
        <div class='form-check-inline'>
        <label class='form-check-label'>
          <input type='radio' class='form-check-input' name='status' value='1' checked> ACTIVE
        </label>
      </div>
      <div class='form-check-inline'>
        <label class='form-check-label'>
          <input type='radio' class='form-check-input' name='status' value='0' >BLOCKED
        </label>
      </div>
      </div>
        <div class='modal-footer justify-content-center'>
        <button type='submit' name='save' id='savedata' class='btn btn-primary'>UPDATE</button>
        </div>
          ";
         }
        else{
          $output.="<div class='form-group'>
          <label for='name'> USER ID:</label>
          <input type='text' class='form-control' placeholder='Enter Name' name='ID' id='edit_id' value='{$row['user_id']}' disabled>
          </div>
          <div class='form-group'>
          <label for='name'> Name:</label>
          <input type='text' class='form-control' placeholder='Enter Name' name='pname' id='euname' value='{$row['name']}' >
        </div>
        <div class='form-group'>
          <label for='email'>Email address:</label>
          <input type='email' class='form-control' placeholder='Enter email' name='email'  id='email' value='{$row['email_id']}' disabled>
        </div>
        <div class='form-group'>
          <label for='name'>Date of signup:</label>
          <input type='text' class='form-control' placeholder='Enter Name' name='name' id='name' value='{$row['dateofsignup']}' disabled>
        </div>

        <div class='form-group'>
          <label for='name'>Student Contact Number:</label>
          <input type='number' class='form-control' placeholder='Enter Contact Number' name='number'  id='number' value='{$row['mobile']}'>
        </div>
        <div >
        
        <div><label >STATUS</label></div>
        <div class='form-check-inline'>
        <label class='form-check-label'>
          <input type='radio' class='form-check-input' name='status' value='1'> ACTIVE
        </label>
      </div>
      <div class='form-check-inline'>
        <label class='form-check-label'>
          <input type='radio' class='form-check-input' name='status' value='0' checked>BLOCKED
        </label>
      </div>
      </div>
        <div class='modal-footer justify-content-center'>
        <button type='submit' name='save' id='savedata' class='btn btn-primary'>UPDATE</button>
        </div>
          ";
         }
        
          
      }
   
  mysqli_close($connect);
 echo $output;

} else
{
 echo "no record found";
}?>