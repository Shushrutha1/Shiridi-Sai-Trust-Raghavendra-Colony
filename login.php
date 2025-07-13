<?php
include("config.php");
  // session_start();
     
	 $username = $password = "";
	$username_err = $password_err = "";

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	   if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    	   
        $query = mysqli_query($conn,"SELECT * FROM trustadmin WHERE username = '".$_POST['username']."' AND passcode = '".$_POST['password']."'");
 	
        if ($query == false) {
          
           		 exit; 
            }
        
        if (mysqli_num_rows($query) ===1) {

			session_start();

            $_SESSION['username'] = $username;
			
			
			 header("Location:dashboard.php");

			 exit;         
			
			}else{
				
				header("Location:Login.php");
			       echo'Kindly Check the User Name and Password';
				exit;          

				}
 
			echo'Username and password do not match';
    }
include'header.php';
?>

        <section id="hero" class="hero section light-background" style="min-height: 100vh;">
        
        
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    

        <div class="panel panel-color panel-primary panel-pages p-4" style="border-radius: 8px;">
      
<div><strong><h2 class="mb-4 text-center">SHIRIDI SAI TRUST RAGHAVENDRA COLONY WELFARE SOCIETY<h2></strong>
<h4 class="mb-4 text-center">Sri Raghavendra Colony, Nalgonda, Telangana - 508001</h4>
</div>
        
            <div class="panel-heading bg-img"> 
            
                <div class="bg-overlay"></div>
                
                <h3 class="text-center m-t-10"><strong> Admin Login</strong> </h3>
            </div>

            <div class="panel-body">
                <form method="post" class="form-horizontal m-t-20 text-center">
                    <div class="form-group">
                        <input class="form-control input-lg mx-auto" style="width: 300px;" name="username" type="text" required placeholder="Username">
                    </div><br>

                    <div class="form-group">
                        <input class="form-control input-lg mx-auto" style="width: 300px;" type="password" name="password" required placeholder="Password">
                    </div><br>

                    <div class="form-group m-t-40">
                        <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</section>

        <?php 
		include_once'footer.php';
		?>
    	


