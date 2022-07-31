<?php
  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $email = htmlspecialchars($_POST['email']);
  $contact = htmlspecialchars($_POST['contact']);
  $amount = htmlspecialchars($_POST['amount']);
  $conn = new mysqli('localhost','root','','leafnow');
  if($conn->connect_error){
      die('Connection Failed : '.$conn->connect_error);
  }else{
      $stmt = $conn->prepare("insert into donation(fname,lname,email,contact,amount)
      values(?,?,?,?,?)");
      $stmt->bind_param("ssiss",$fname,$lname,$email,$contact,$amount);
      $stmt->execute();
      $stmt->close();
      $conn->close();
  }
?>