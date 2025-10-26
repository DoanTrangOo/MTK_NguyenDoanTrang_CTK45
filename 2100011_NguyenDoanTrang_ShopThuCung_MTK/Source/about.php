<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:home_guest.php');
 };

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thông tin</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about2.jpg" alt="">
         <h3>Dalala là ai</h3>
         <p>Dalala là một cửa hàng đặc biệt cung cấp và tuyển chọn các sản phẩm chất lượng cho thú cưng. Với cửa hàng truyền thống và cửa hàng trực tuyến, Dalala luôn đảm bảo cho thú cưng bạn có nguồn dinh dưỡng tốt, thuốc phục hồi chức năng để cho thú cưng của bạn luôn trong tình trạng khoẻ mạnh.
            <br>
            Dalala cũng thiết kế và sản xuất sản phẩm dành cho thú cưng, bao gồm lồng, vòng cổ, dây dắt, phụ kiện, quần áo, đồ ăn vặt, v.v. Khi hợp tác với các nhà sản xuất có tiếng, thương hiệu Dalala được thiết kế với tính thẩm mỹ hiện đại nhưng vẫn cổ điển, mỗi sản phẩm đều được chế tạo có tính hình thức và chức năng.
         </p>
      </div>

      <div class="box">
         <img src="images/about3.jpg" alt="">
         <h3>Sứ mệnh & Lời hứa</h3>
         <p>Sứ mệnh của Dalala là cung cấp nhiều loại sản phẩm cho vật nuôi hiện đại tốt nhất trên thị trường, tập trung vào thiết kế và sản xuất chu đáo. 
            <br>
            Lời hứa của chúng tôi là cung cấp cho bạn nhiều loại sản phẩm chất lượng, an toàn hàng đầu được sản xuất dành cho thú cưng quý giá của chúng tôi. Dalala không dự trữ bất cứ thứ gì mà chúng tôi sẽ không - hoặc chưa - sử dụng cho thú cưng của mình
        </p>
         <a href="shop.php" class="btn">Mua sắm ngay</a>
      </div>

   </div>

</section>

<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>