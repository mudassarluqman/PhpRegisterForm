<?php 

// header file
include "includes/header.php";
include "classes/ValidateForm.php";


if(isset($_POST['submit'])){
    $validate =new ValidateForm($_POST);
    
}

?>

<!-- signUp form -->
<section class="form">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="fname" placeholder="Enter Your First Name" value="<?php echo $_POST['fname'] ?? "" ?>">
        <p style="color: red"><?php echo $validate->errors["fname"] ?? "";?></p>
        <input type="text" name="lname" placeholder="Enter Your Last Name" value="<?php echo $_POST['lname'] ?? "" ?>">
        <p style="color: red"><?php echo $validate->errors["lname"] ?? "";?></p>
        <input type="text" name="email" placeholder="Enter Your Email" value="<?php echo $_POST['email'] ?? "" ?>">
        <p style="color: red"><?php echo $validate->errors["email"] ?? "";?></p>
        <input type="password" name="pass" placeholder="Enter Your Password">
        <input type="submit" value="SignUp" name="submit">


    </form>
</section>