<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$email, $pass]);
   $rowCount = $stmt->rowCount();  

   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   if($rowCount > 0){

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }else{
         $message[] = 'no user found!';
      }

   }else{
      // $message[] = 'incorrect email or password!';
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
    <link rel="icon" type="image/x-icon" href="images/logo.png">
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
                <h2>Chào mừng</h2>
                <h6>Chưa có tài khoản? Hãy đăng ký</h6>
                <a href="register.php" class="toggle">Tại đây</a>
              </div>

              <div class="actual-form">
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
                  <label>Password</label>
                </div>

                <input type="submit" value="Đăng Nhập" class="sign-btn" name="submit"/>

                <p class="text">
                  Quên tài khoản rồi ư?
                  <br>
                  <a href="#">Tìm lại tài khoản</a> của mình
                </p>
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