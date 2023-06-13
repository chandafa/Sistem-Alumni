<!DOCTYPE HTML>
<html>
	<head>
		<title>Sistem Informasi Alumni</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" type="image/x-icon" href="images/fav-icon.png"> 
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/animate.min.css" />
		<script src="assets/js/scrollmagic.js"></script>
		<script>
			var secone = new ScrollMagic.Controller();
			var sectwo = new ScrollMagic.Controller();
			var secthree = new ScrollMagic.Controller();
			var footer = new ScrollMagic.Controller();
		</script>
		<style>
			#one, #two, #three, #footer {
				opacity: 0;
		-webkit-transform: scale(0.9);
			 -moz-transform: scale(0.9);
				-ms-transform: scale(0.9);
				 -o-transform: scale(0.9);
						transform: scale(0.9);
		-webkit-transition: all 1s ease-in-out;
			 -moz-transition: all 1s ease-in-out;
				-ms-transition: all 1s ease-in-out;
				 -o-transition: all 1s ease-in-out;
						transition: all 1s ease-in-out;
			}
			#one.visible, #two.visible, #three.visible, #footer.visible {
				opacity: 1;
		-webkit-transform: none;
			 -moz-transform: none;
				-ms-transform: none;
				 -o-transform: none;
						transform: none;
			}
			.preloader {
				position: fixed;
				top: 0;
				left: 0;
				bottom:0;
				right:0;
				width: 100%;
				height: 100vh;
				z-index: 99999999;
				background-image: url('images/loading.gif');
				background-repeat: no-repeat;
				background-color: #FFF;
				background-position: center;
			}
			#stop-scrolling {
				height: 100% !important;
				overflow: hidden !important;
			}
			.loadtext{
				display: flex;
				justify-content: center;
				align-items: center;
				height: 50%;
				font-size:80px;
			}
			.loadtext2{
				display: flex;
				justify-content: center;
				align-items: center;
				height: 50%;
			}
			.linkusual{
				color:royalblue;
			}
			.linkusual:hover{
				color:darkblue;
			}
		</style>
	</head>
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/604866fa385de407571e7aca/1f0dd4h6v';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	<body id="stop-scrolling">
	<div class="preloader"><h1 class="loadtext">Please Wait...</h1><br>
	<h2 class="loadtext2">Too slow? <a class="linkusual" href="basic.php">Load the basic!</a></h2>
	</div>
	
		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo animate__animated animate__lightSpeedInLeft">
				<b><a href="index.php">Info Alumni</a></b></div>
				<a class="animate__animated animate__heartBeat" href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="#">Home</a></li>
					<li><a href="login/login.php">Login</a></li>
					<li><a href="login/daftar/register.php">Register</a></li>
					<li><a href="\alumni\infoalumni\dataalumni">Cari Nisn</a></li>
					<li><a href="qna.html">Help & Support</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/back3.png" alt="gambarmhs" />
					<div class="inner">
					<div class="animate__jackInTheBox animate__animated">
						<header>
							<h2 style="font-size:50px"><b>Sistem Informasi<b></h2>
						</header>
						<header>
							<h2 style="font-size:30px">Teknik Komputer Jaringan dan Telekomunikasi</h2>
						</header>
						<header>
							<h2 style="font-size:30px">SMK Negeri 1 Pangkalan Kerinci</h2>
						</header>
						<header>
							<h2 style="font-size:30px">SMK Pusat Keunggulan</h2>
						</header>
						</div>
					</div>
				</article>
				
				<article>
					<img src="images/back2.png" alt="batamviews" />
					<div class="inner">
						<header>
							<h2 style="font-size:50px">Sistem Informasi </h2>
						</header>
						<header>
							<h2 style="font-size:30px">Teknik Komputer Jaringan dan Telekomunikasi</h2>
						</header>
						<header>
							<h2 style="font-size:30px">SMK Negeri 1 Pangkalan Kerinci</h2>
						</header>
						<header>
							<h2 style="font-size:30px">SMK Pusat Keunggulan</h2>
						</header>
					</div>
				</article>
				
				<article>
					<img src="images/back1.png"  alt="batamviews" />
					<div class="inner">
						<header>
							<h2 style="font-size:50px">Sistem Informasi </h2>
						</header>
						<header>
							<h2 style="font-size:30px">Teknik Komputer Jaringan dan Telekomunikasi</h2>
						</header>
						<header>
							<h2 style="font-size:30px">SMK Negeri 1 Pangkalan Kerinci</h2>
						</header>
						<header>
							<h2 style="font-size:30px">SMK Pusat Keunggulan</h2>
						</header>
					</div>
				</article>
				
				<article>
					<img src="images/back4.png"  alt="batamviews" />
					<div class="inner">
						<header>
							<h2 style="font-size:50px">Sistem Informasi </h2>
						</header>
						<header>
							<h2 style="font-size:30px">Teknik Komputer Jaringan dan Telekomunikasi</h2>
						</header>
						<header>
							<h2 style="font-size:30px">SMK Negeri 1 Pangkalan Kerinci</h2>
						</header>
						<header>
							<h2 style="font-size:30px">SMK Pusat Keunggulan</h2>
						</header>
					</div>
				</article>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">

						<div>
							<div class="box">
								<div class="image fit">
									<img src="images/img-1.png" style="height:450px;" alt="" />
								</div>
								<div class="content">
									<header class="align-center">
										<p>Baca Selengkapnya</p>
										<h2>SMKN 1 PANGKALAN KERINCI</h2>
									</header>
									<p>SMKN 1 PANGKALAN KERINCI adalah jenjang pendidikan menengah pada pendidikan formal di Indonesia yang setara dengan sekolah menengah atas. Pengelolaannya dilakukan oleh Kementerian Pendidikan.</p>
									<footer class="align-center">
										<a href="https://smkn1pangkalankerinci.sch.id">Lebih Lengkap</a>
									</footer>
								</div>
							</div>
						</div>

						<div>
							<div class="box">
								<div class="image fit">
									<img src="images/img-2.png" style="height: 450px;" alt="" />
								</div>
								<div class="content">
									<header class="align-center">
										<p>Baca Selengkapnya</p>
										<h2>Sistem Informasi Alumni</h2>
									</header>
									<p>Sistem Informasi Alumni merupakan Aplikasi Web yang berfungsi sebagai tempat para alumni untuk mencari. Alumni merupakan hasil atau produk dari sebuah institusi pendidikan yang memiliki peran penting untuk pengembangan lembaga pendidikan.</p>
									<footer class="align-center">
										<a href="https://www.google.com/search?q=apa+itu+sistem+informasi+alumni&oq=apa+itu+sistem+informasi+alumni&aqs=chrome..69i57.4178j0j4&sourceid=chrome&ie=UTF-8" class="button alt">Lebih Lengkap</a>
									</footer>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Register User</p>
						<h2>Sistem Informasi Alumni</h2>
						<h3>Daftar Sekarang!</h3>
						<a href="login/daftar/register.php" class="button animate__animated animate__tada animate__infinite">Sign UP!</a>
					</header>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
					<header class="align-center">
						<p class="special">Login untuk mendapatkan Informasi penuh!</p>
						<h2>Gallery Alumni</h2>
					</header>
					<div class="gallery">
						<div>
							<div class="image fit">
							<a href="images/1.png" target="_body"><img src="images/1.png" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
							<a href="images/5.png" target="_body"><img src="images/5.png" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
							<a href="images/3.png" target="_body"><img src="images/3.png" alt="" id="modalpic3"/></a>
							</div>
						</div>
						<div>
							<div class="image fit">
							<a href="images/4.png" target="_body"><img src="images/4.png" alt="" id="modalpic4" /></a>
							</div>
						</div>
					</div>
				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<p style="color:white">Contact:</p>
				<div class="container">
					<ul class="icons">
						<li><a href="https://www.instagram.com/vlogger_tkj" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="ck271138gmail.com" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						<li><a href="https://github.com/chandafa" class="icon fa-github"><span class="label">Github</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> <a expr:href='data:blog.homepageUrl'><data:blog.title/></a>. All rights reserved. | Repost by <a href='https://infoitchandra.blogspot.com/' title='infoitchandra.blogspot.com' target='_blank'>Chandra IT</a>
					
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script>
			function preloaderFadeOutInit(){
				$('.preloader').fadeOut('slow');
				$('body').attr('id','');
				}
				// Window load function
				jQuery(window).on('load', function () {
				(function ($) {
				preloaderFadeOutInit();
				})(jQuery);
				});
			</script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>
				new ScrollMagic.Scene({
							triggerElement: "#one",
							triggerHook: 0.9,
							offset: 50,
							reverse: false
						})
						.setClassToggle("#one", "visible")
						.addTo(secone);
				new ScrollMagic.Scene({
							triggerElement: "#two",
							triggerHook: 0.9,
							offset: 50,
							reverse: false
						})
						.setClassToggle("#two", "visible")
						.addTo(sectwo);
				new ScrollMagic.Scene({
							triggerElement: "#three",
							triggerHook: 0.9,
							offset: 50,
							reverse: false
						})
						.setClassToggle("#three", "visible")
						.addTo(secthree);
				new ScrollMagic.Scene({
							triggerElement: "#footer",
							triggerHook: 0.9,
							offset: 50,
							reverse: false
						})
						.setClassToggle("#footer", "visible")
						.addTo(footer);
			</script>

	</body>
</html>