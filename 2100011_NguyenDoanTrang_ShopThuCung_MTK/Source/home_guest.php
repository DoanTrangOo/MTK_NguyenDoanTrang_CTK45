<?php

@include 'config.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang chủ nè</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="css/home_guest.css">

</head>

<body>
	<header class="header" id="header">
		<nav class="nav container">
			<a href="#" class="nav__logo">
				<i class="nav__logo-icon"></i> Dalala Pet Store
			</a>

			<div class="nav__menu" id="nav-menu">
				<ul class="nav__list">
					<li class="nav__item">
						<a href="home_guest.php" class="nav__link active-link">Trang chủ</a>
					</li>
					<li class="nav__item">
						<a href="login.php" class="nav__link">Cửa hàng</a>
					</li>
					<li class="nav__item">
						<a href="login.php" class="nav__link">Đặt hàng</a>
					</li>
					<li class="nav__item">
						<a href="login.php" class="nav__link">Đăng nhập</a>
					</li>

				</ul>

			</div>
		</nav>
	</header>

	<main class="main">
		<!--==================== HOME ====================-->
		<section class="home" id="home">
			<div class="home__container container grid">
				<img src="./img/home.png" alt="" class="home__img">

				<div class="home__data">
					<h1 class="home__title">
						Tạo sự kết nối chủ và thú nuôi
					</h1>
					<p class="home__description">
						Bạn đang tìm các dịch vụ chăm sóc thú cưng an toàn.
						<br>
						Đáng tin cậy để có chỗ vui chơi cho thú cưng miễn phí.
						<br>
						Giá cả phải chăng?
					</p>
					<a href="#about" class="button button--flex">
						Khám phá <i class="ri-arrow-right-down-line button__icon"></i>
					</a>
				</div>


			</div>
		</section>

		<!--==================== ABOUT ====================-->
		<section class="about section container" id="about">
			<div class="about__container grid">
				<img src="images/about1.jpg" alt="" class="about__img">
				<div class="about__data">
					<h2 class="section__title about__title">
						Dalala đảm bảo rằng!!!
						<br>
						Boss vui,
						<br>Sen cũng vui💕
					</h2>
					<p class="about__description">
						Dalala là một cửa hàng đặc biệt cung cấp và tuyển chọn các sản phẩm chất lượng cho thú cưng. Với
						cửa hàng truyền thống và cửa hàng trực tuyến, Dalala luôn đảm bảo cho thú cưng bạn có nguồn dinh
						dưỡng tốt, thuốc phục hồi chức năng để cho thú cưng của bạn luôn trong tình trạng khoẻ mạnh.
					</p>

					<p class="about__description">
						Dalala cũng thiết kế và sản xuất dòng sản phẩm dành cho thú cưng, bao gồm lồng, vòng cổ, dây
						dắt, phụ kiện, quần áo, đồ ăn vặt, v.v. Khi hợp tác với các nhà sản xuất có tiếng, thương hiệu
						Dalala được thiết kế với tính thẩm mỹ hiện đại nhưng vẫn cổ điển, mỗi sản phẩm đều được chế tạo
						có tính hình thức và chức năng.
					</p>

					<a href="login.php" class="button--link button--flex">
						Khám phá <i class="fa-solid fa-arrow-turn-down button__icon"></i>
					</a>
				</div>
			</div>
		</section>

		<!--==================== STEPS ====================-->
		<section class="steps section container">
			<div class="steps__bg">
				<h2 class="section__title-center steps__title">
					Dalala chuyên về
				</h2>

				<div class="steps__container grid">
					<div class="steps__card">
						<div class="steps__card-number">01</div>
						<h3 class="steps__card-title">Nhà giữ "Boss"</h3>
						<p class="steps__card-description">
							Thứ hai - Thứ sáu / 7:30 - 19:30
							<br>
							Thứ bảy + Chủ nhật / 9:00 - 17:00
							<br>
							Thú cưng sẽ được chơi đùa cùng các người bạn lông xù khác trong phòng dưới sự giám sát của
							chúng tôi. Bạn không chỉ thấy chúng qua máy quay tại phòng chơi, mà chúng tôi còn kèm theo
							hình hằng ngày đảm bảo khách hàng yên tâm khi chúng tận hưởng vui chơi.
						</p>
					</div>

					<div class="steps__card">
						<div class="steps__card-number">02</div>
						<h3 class="steps__card-title">Đi dạo</h3>
						<p class="steps__card-description">
							Thứ hai - Thứ sáu / 8:00 - 18:00
							<br>
							Các chuyên gia sẽ cho chúng đi dạo theo từng nhóm 3 bạn.
						</p>
					</div>

					<div class="steps__card">
						<div class="steps__card-number">03</div>
						<h3 class="steps__card-title">Làm đẹp</h3>
						<p class="steps__card-description">
							Thứ hai - Thứ sáu / 9:00 - 19:00
							<br>
							Dịch vụ làm đẹp mang đến sự tiện lợi, thoải mái và phong cách. Chúng tôi sử dụng dầu gội bột
							yến mạch hoàn toàn tự nhiên và không gây dị ứng để mang lại trải nghiệm an toàn và sang
							trọng.
						</p>
					</div>

					<div class="steps__card">
						<div class="steps__card-number">04</div>
						<h3 class="steps__card-title">Khách sạn của "Boss"</h3>
						<p class="steps__card-description">
							Thứ hai - Thứ bảy / 24h
							<br>
							Dịch vụ khách sạn của chúng tôi cung cấp giải pháp thuận lợi cho các sen khi đi công tác và
							không có thời gian chăm sóc các boss của mình. Nhân viên của chúng tôi giám sát đầy đủ và
							bao gồm dịch vụ chăm sóc, đi bộ và tất cả các hoạt động cho ăn.
						</p>
					</div>

					<div class="steps__card">
						<div class="steps__card-number">05</div>
						<h3 class="steps__card-title">Huấn luyện</h3>
						<p class="steps__card-description">
							Mỗi buổi huấn luyện sẽ kéo dài 60 phút.
							<br>
							Cho dù các boss của bạn mắc phải một số thói quen xấu, chúng tôi luôn sẵn sàng trợ giúp. Đội
							ngũ huấn luyện của chúng tôi có hơn 1000 giờ kinh nghiệm, bao gồm những kiến thức cơ bản về
							chó con, sự vâng lời nâng cao và sửa đổi hành vi ở tuổi vị thành niên.
						</p>
					</div>

					<div class="steps__card">
						<div class="steps__card-number">06</div>
						<h3 class="steps__card-title">Thú y</h3>
						<p class="steps__card-description">
							Thứ hai - Chủ nhật / 8:00 - 18:00
							<br>
							Mục tiêu của chúng tôi là giúp đỡ các Boss có vấn đề sức khỏe phổ biến gây khó chịu. Là nhà
							cung cấp dịch vụ chăm sóc thú y, hoạt động của Dalala là một môi trường tiếp xúc nhiều, hãy
							liên lạc với chúng tôi để biết thêm về nhu cầu sức khoẻ của thú cưng.
						</p>
					</div>
				</div>
			</div>
		</section>

		<!--==================== PRODUCTS ====================-->
		<section class="product section container" id="products">
			<h2 class="section__title-center">
				Một số sản phẩm nổi bật
			</h2>

			<p class="product__description">
				Dưới đây là một số sản phẩm được tin dùng nhiều nhất ở Dalala Pet Store.
			</p>

			<div class="product__container grid">
				<article class="product__card">
					<div class="product__circle"></div>
					<img src="images/product1.png" alt="" class="product__img">
					<h3 class="product__title">Khay vệ sinh</h3>
					<span class="product__price">15.000.000 vnđ</span>

					<button class="button--flex product__button">
						<i class="fa-solid fa-bag-shopping"></i>
					</button>
				</article>

				<article class="product__card">
					<div class="product__circle"></div>

					<img src="images/product2.png" alt="" class="product__img">

					<h3 class="product__title">Cát vệ sinh</h3>
					<span class="product__price">230.000 vnđ</span>

					<button class="button--flex product__button">
						<i class="fa-solid fa-bag-shopping"></i>
					</button>
				</article>

				<article class="product__card">
					<div class="product__circle"></div>

					<img src="images/product3.png" alt="" class="product__img">

					<h3 class="product__title">Balo di chuyển</h3>
					<span class="product__price">400.000 vnđ</span>

					<button class="button--flex product__button">
						<i class="fa-solid fa-bag-shopping"></i>
					</button>
				</article>

				<article class="product__card">
					<div class="product__circle"></div>

					<img src="images/product4.png" alt="" class="product__img">

					<h3 class="product__title">Sữa tắm</h3>
					<span class="product__price">499.000 vnđ</span>

					<button class="button--flex product__button">
						<i class="fa-solid fa-bag-shopping"></i>
					</button>
				</article>

				<article class="product__card">
					<div class="product__circle"></div>

					<img src="images/product5.png" alt="" class="product__img">

					<h3 class="product__title">Combo dây và vòng</h3>
					<span class="product__price">350.000 vnđ</span>

					<button class="button--flex product__button">
						<i class="fa-solid fa-bag-shopping"></i>
					</button>
				</article>

				<article class="product__card">
					<div class="product__circle"></div>

					<img src="images/product6.png" alt="" class="product__img">

					<h3 class="product__title">Thuốc ngừa bọ chét</h3>
					<span class="product__price">200.000 vnđ</span>

					<button class="button--flex product__button">
						<i class="fa-solid fa-bag-shopping"></i>
					</button>
				</article>
			</div>
		</section>


		<!--==================== QUESTIONS ====================-->
		<section class="questions section" id="faqs">
			<h2 class="section__title-center questions__title container">
				Tại sao bạn nên lựa chọn Dalala
			</h2>

			<div class="questions__container container grid">
				<div class="questions__group">
					<div class="questions__item">
						<header class="questions__header">
							<i class="ri-add-line questions__icon"></i>
							<h3 class="questions__item-title">
								Dalala là một tập thể yêu thương động vật
							</h3>
						</header>

						<div class="questions__content">
							<p class="questions__description">
								Chúng tôi hiểu rằng những người bạn lông xù này là một phần trong gia đình của bạn, và
								chúng xứng đáng để được nhận sự quan tâm và chăm sóc tốt nhất.
							</p>
						</div>
					</div>

					<div class="questions__item">
						<header class="questions__header">
							<i class="ri-add-line questions__icon"></i>
							<h3 class="questions__item-title">
								Sự yên tâm
							</h3>
						</header>

						<div class="questions__content">
							<p class="questions__description">
								Việc rời xa người bạn lông xù cảm giác rất bất an và lo lắng, Dalala ở đây để đảm bảo
								cho bạn rằng thú cưng sẽ được chăm sóc một cách tốt nhất khi bạn phải đi vắng.
							</p>
						</div>
					</div>

					<div class="questions__item">
						<header class="questions__header">
							<i class="ri-add-line questions__icon"></i>
							<h3 class="questions__item-title">
								Sự thuận lợi
							</h3>
						</header>

						<div class="questions__content">
							<p class="questions__description">
								Ngoài thời gian hẹn thuận tiện, Dalala còn cung cấp dịch vụ đặt lịch trực tuyến tiện lợi
								và dễ dàng.
							</p>
						</div>
					</div>
				</div>

				<div class="questions__group">
					<div class="questions__item">
						<header class="questions__header">
							<i class="ri-add-line questions__icon"></i>
							<h3 class="questions__item-title">
								Tính minh bạch
							</h3>
						</header>

						<div class="questions__content">
							<p class="questions__description">
								Chúng tôi muốn bạn cảm thấy tin tưởng vào sự chăm sóc của Dalala; cung cấp và tin tưởng
								rằng chúng tôi luôn quan tâm đến lợi ích tốt nhất cho thú cưng của bạn.
							</p>
						</div>
					</div>

					<div class="questions__item">
						<header class="questions__header">
							<i class="ri-add-line questions__icon"></i>
							<h3 class="questions__item-title">
								Chăm sóc tích cực
							</h3>
						</header>

						<div class="questions__content">
							<p class="questions__description">
								Đội ngũ chuyên gia được đào tạo của chúng tôi tận tâm cung cấp dịch vụ chăm sóc cá nhân
								cho mọi thú cưng khi đến với chúng tôi.
							</p>
						</div>
					</div>

					<div class="questions__item">
						<header class="questions__header">
							<i class="ri-add-line questions__icon"></i>
							<h3 class="questions__item-title">
								Kỹ năng làm việc
							</h3>
						</header>

						<div class="questions__content">
							<p class="questions__description">
								Đội ngũ bác sĩ thú y, kỹ thuật viên và các chuyên gia chăm sóc thú cưng khác của chúng
								tôi làm việc cùng nhau để đảm bảo rằng chú chó của bạn nhận được sự chăm sóc tốt nhất có
								thể.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--==================== FOOTER ====================-->
		<footer class="footer section" id="contact">
			<div class="footer__container container grid">
				<div class="footer__content">
					<a href="#" class="footer__logo">
						<i class="footer__logo-icon"></i>Dalala Pet Store
					</a>

					<h3 class="footer__title">
						Đăng nhập để chăm sóc<br>thú cưng của mình
					</h3>

					<div class="footer__subscribe">
						<input type="email" placeholder="Đăng nhập ngay" class="footer__input">

						<button class="button button--flex footer__button">
							<a href="/Đăng nhập/IndexLogin.html">Đăng nhập</a>
							<i class="ri-arrow-right-up-line button__icon"></i>
						</button>
					</div>
				</div>

				<div class="footer__content">
					<h3 class="footer__title">Truy cập nhanh</h3>

					<ul class="footer__data">
						<li class="footer__information"><a href="home_guest.php">Trang chủ</a></li>
						<li class="footer__information"><a href="login.php">Cửa hàng</a></li>
						<li class="footer__information"><a href="login.php">Đặt hàng</a></li>
					</ul>
				</div>

				<div class="footer__content">
					<h3 class="footer__title">Thành viên</h3>

					<ul class="footer__data">
						<li class="footer__information">Nguyễn Đoan Trang</li>
					</ul>
				</div>
			</div>

		</footer>

		<!--=============== SCROLL UP ===============-->
		<a href="#" class="scrollup" id="scroll-up">
			<i class="fa-solid fa-arrow-up scrollup__icon"></i>
		</a>

		<!--=============== SCROLL REVEAL ===============-->
		<script src="js/scrollreveal.min.js"></script>

		<!--=============== MAIN JS ===============-->
		<script src="js/home_guest.js"></script>
</body>

</html>