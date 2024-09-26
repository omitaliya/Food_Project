<?php

include '../components/connect.php';

session_start();
require('Auth.php');
$admin_id = $_SESSION['user_id'];

// if (!isset($admin_id)) {
//    header('location:admin_login.php');
// };

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);

   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `users` WHERE name = ?");
   $select_admin->execute([$name]);

   if ($select_admin->rowCount() > 0) {
      $message[] = 'username already exists!';
   } else {
      if ($pass != $cpass) {
         $message[] = 'confirm passowrd not matched!';
      } else {
         $insert_admin = $conn->prepare("INSERT INTO `users`(name, email, number, password,role) VALUES(?,?,?,?,?)");
         $insert_admin->execute([$name, $email,$number,$cpass,'admin']);
         $message[] = 'new admin registered!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/dashboard_style.css">

</head>

<body>

   <?php include '../components/admin_header.php' ?>

   <!-- register admin section starts  -->

   <section class="form-container">

      <form action="" method="POST">
         <h3>register new</h3>
         <input type="text" name="name" maxlength="20" required placeholder="enter your username" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

         <input type="number" name="number" maxlength="10" required placeholder="enter your Mo_number" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

         <input type="mail" name="email" maxlength="50" required placeholder="enter your Email" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

         <input type="password" name="pass" maxlength="20" required placeholder="enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="password" name="cpass" maxlength="20" required placeholder="confirm your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="submit" value="register now" name="submit" class="btn">
      </form>

   </section>

   <!-- register admin section ends -->

   <!-- custom js file link  -->
   <script src="../js/admin_script.js"></script>

</body>

</html>