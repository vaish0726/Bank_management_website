<?php
session_start();
if(!isset($_SESSION['userId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mini Project Bank</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>

</head>
<body style="background:#96D678;background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    
   <!--  <i class="d-inline-block  fa fa-building fa-fw"></i> -->
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">  <a class="nav-link" href="accounts.php">Accounts</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">Account Statements</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">Funds Transfer</a></li>
      <!-- <li class="nav-item ">  <a class="nav-link" href="profile.php">Profile</a></li> -->


    </ul>
    <?php include 'sideButton.php'; ?>
   
  </div>
</nav><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Your account Information
  </div>
  <div class="card-body">
    <table class="table table-striped table-dark w-75 mx-auto">
  <thead>
    <?php
      $i=0;
      $array = $con->query("select * from useraccounts where id = '$_SESSION[userId]'");
      if ($array->num_rows > 0)
      {
        $row = $array->fetch_assoc();
        {$i++;
    ?>
    <tr>
      <th scope="col">Account No.</th>
      <th scope="row">Branch</th>
      
      <th scope="row">Account Type</th>
      <th scope="row">Account Created</th>
    </tr>
    </thead>
    <tbody>
    
      <tr>
        
        <td><?php echo $row['accountNo'] ?></td>
        
        <td><?php echo $row['branch'] ?></td>
  
        <td><?php echo $row['accountType'] ?></td>
        <td><?php echo $row['date'] ?></td>
        
        
      </tr>
    <?php
        }
      }   
    ?>
  </tbody>
</table>
      
  </div>
  <div class="card-footer text-muted">
  
  </div>
</div>

</div>
</body>
</html>