<?php
$servername = "localhost";
$username = "qendrimvllasa";
$password = "Dominim123_!";
$dbname = "qendrimvllasa";






try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // insert a row
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone=$_POST['phone'];
  $subject=$_POST['subject'];
  $text=$_POST['message'];
  $timestamp = time();


  $isFormSubmitted = (!empty($_POST['name']) &&
      !empty($_POST['email']) &&
      !empty($_POST['subject']) &&
      !empty($_POST['message']));

  if(empty($_POST['phone'])){
    $phone=01;
  }


if($isFormSubmitted){
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO `messages` (`name`, `email`, `phone`, `subject`, `text`, `timestamp`)
    VALUES (:name, :email, :phone, :subject, :text, :timestamp )");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':phone', $phone);
  $stmt->bindParam(':subject', $subject);
  $stmt->bindParam(':text', $text);
  $stmt->bindParam(':timestamp', $timestamp);

  $stmt->execute();


  $to = "qendrim.vllasa@gmail.com";


    $headers = "From: ".$email."\r\n";
    $headers .= "Reply-To: \r\n";
    $headers .= "Return-Path: \r\n";
    $headers .= "CC: \r\n";
    $headers .= "BCC: \r\n";


    $header[] = 'MIME-Version: 1.0';
    $header[] = 'Content-type: text/html; charset=iso-8859-1';




  mail($to, $subject, $text, $headers);







  echo "New records created successfully and E-Mail sent!";
}

}
catch(PDOException $e)
{
  echo "Error: " . $e->getMessage();
}
$conn = null;

header("Location: index.php?contact=success#my-contact-section");

