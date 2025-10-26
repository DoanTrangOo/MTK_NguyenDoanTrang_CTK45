<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'user email already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $pass, $image]);

         if($insert){
            if($image_size > 2000000){
               $message[] = 'image size is too large!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'registered successfully!';
               header('location:login.php');
            }
         }

      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tham gia với chúng tôi ❤</title>
    <link rel="stylesheet" href="css/login_regis.css"/>
  </head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
   
   <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="" autocomplete="on" class="sign-in-form" method="POST">
            <div class="logo">
                <img src="images/logo.png" alt=""/>
                <h4>Dalala Pet</h4>
              </div>

              <div class="heading">
                <h2>Đăng ký</h2>
                <h6>Đã có tài khoản? Đăng nhập</h6>
                <a href="login.php" class="toggle">ở đây</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    name="name"
                    class="input-field"
                    required
                  />
                  <label>Tên</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="email"
                    name="email"
                    class="input-field"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="pass"
                    class="input-field"
                    required
                  />
                  <label>Mật khẩu</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="password"
                    name="cpass"
                    class="input-field"
                    required
                  />
                  <label>Nhập lại mật khẩu</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="file"
                    name="image"
                    class="input-field"
                    required accept="image/jpg, image/jpeg, image/png"
                  />
                </div>

                <input type="submit" value="Xác nhận" class="sign-btn" name="submit"/>
              </div>
            </form>
         </div>

         <div class="carousel">
            <div class="images-wrapper">
              <img src="./images/login1.png" class="image img-1 show" alt=""/>
              <img src="./images/login2.png" class="image img-2" alt="" />
              <img src="./images/login3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Ở đây có dịch vụ chăm sóc thú cưng</h2>
                  <h2>Trở nên bảnh hơn!!</h2>
                  <h2>Cùng với những đồ ăn ngon</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="js/login_regis.js"></script>


</body>
</html>