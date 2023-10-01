<?php 

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME','brightmind');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "" . mysqli_connect_error();
}

  $lastName_error = null;
  $firstName_error = null;
  $email_error = null;
  $phone_error = null;
  $success = null;
  $sizeError = null;
  $extError = null;

  if(isset($_POST['submit'])){
            
              $lastName = strip_tags($_POST['lastName']);
              $firstName = strip_tags($_POST['fisrtName']);
              
              $email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);
              $phone = $_POST['phone'];
              $password = $_POST['password'];

             
                    
              // upload pdf 
              $file = $_FILES['file']['name'];
              if(!empty($lastName) and !empty($firstName) and !empty($email) and !empty($phone) and !empty($password) and !empty($file)){

             
              
              $tmp_name=$_FILES["file"]["tmp_name"];
              $path="profResume/".$file;
              $file1=explode(".",$file);
              $ext=$file1[1];
              $allowed=array('zip', 'pdf', 'docx');
              
              if(!in_array($ext,$allowed)){
                $extError = "You file extension must be .zip, .pdf or .docx";
                
              }
              elseif($_FILES['file']['size'] > 6000000) 
              { // file shouldn't be larger than 6Megabyte
                $sizeError = "file shouldn't be larger than 1Megabyte";
               
              }
              else{
                // move the uploaded (temporary) file to the specified destination
              move_uploaded_file($tmp_name,$path);
            $query = mysqli_query($con,"INSERT INTO `profreq`(`nom`, `prenom`, `password`,`email`,`phone`, `resume`) VALUES ('$firstName','$lastName','$password','$email','$phone','$file')");
            // sweet alert after teacher registration
           ?>
            <script>
             Swal.fire(
                  'Thanks',
                  'For Your Registration!',
                  'success'
                )
            </script>
            <?php
            
            if(!$query){
              echo " error: " . mysqli_error($con) . "\n";
}
              }
       
     

      
   
  }
}

?>


<a  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="beTeacher text-white" >be teacher</a>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
      <div class="gradient-bg"></div>
											<div class="popup-logo">
												<img src="assets/img/logo/p-logo.jpg" alt="">
											</div>
                      <div class="popup-text text-center">
												<h2 class="text-center"> <span>Register</span> to be a <span> Teacher </span></h2>
												
											</div>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form method="post" action="accueil.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="lastName" class="col-form-label">Last Name</label>
            <input type="text" class="form-control" id="last-name" name="lastName" required>
   
          </div>
          <div class="form-group">
            <label for="firstName" class="col-form-label">Fisrt Name</label>
            <input type="text" class="form-control" id="last-name" name="fisrtName" required>
          
          </div>
          
          <div class="form-group">
            <label for="firstName" class="col-form-label">Password</label>
            <input type="password" class="form-control"  name="password" required>
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"required>
           
          </div>
          <div class="form-group">
            <label for="phone" class="col-form-label">Phone</label>
            <input type="phone" class="form-control" id="phone" name="phone"required>
          
          </div>
          <div class="form-group">
              <label for="resume">Resume</label>
              
              <input type="file" class="form-control-file" id="Resume" name="file" required>
              <?php echo  '<p class="text-danger">'.$extError.'</p>';
                    echo   '<p class="text-danger">'.$sizeError.'</p>';;
              ?>
          </div>
          
                  <div class="nws-button text-center white text-capitalize">
													<button type="submit" id="submit" name="submit">send</button>
									</div>
               
            
        </form>
        
      </div>
      
        
      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        
      
    </div>
  </div>
</div>

