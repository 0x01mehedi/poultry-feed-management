<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Popup Login Form Design | Devmehedi</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="center" style="background-color: #214a80;">
         <input type="checkbox" id="show">
         <label for="show" class="show-btn">Click Here</label>
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
			<div class="illustration">
				<!-- <i class="icon ion-ios-locked-outline"></i> -->
				<img src="img/01.gif" alt="" style="width:130px;">
			</div>
            </div>
			<div style="text-align:center;color:orange;font-weight:bold"> <?php echo isset($error)?$error:"";?></div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
               <div class="data">
                  <label>Email or Phone</label>
                  <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="User name">
               </div>
               <div class="data">
                  <label>Password</label>
                  <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password">
               </div>
               <div class="forgot-pass">
                  <a href="#">Forgot Password?</a>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit" name="btnSignIn">login</button>
               </div>
               <div class="signup-link">
                  Not a member? <a href="#">Signup now</a>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>