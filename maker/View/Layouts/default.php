<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		//echo $this->Html->meta('icon');

		echo $this->Html->css(array(
				'bootstrap',
				'font-awesome.min.css',
				'font-awesome.css',
				'jquery.fancybox.css',
				'isotope',
				'style'
			));
		
		
		echo $this->Html->script(array(
				'jquery.min',
				'bootstrap',
				'jquery.isotope.min',
				'jquery.fancybox.pack',
				'wow.min',
				'functions'

			));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
</head>
<body>
	<div class="">
		<header>
			<div class="main-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-4">						
							<h1><a class="navbar-brand" href="index.html" data-0="line-height:90px;" data-300="line-height:50px;">BENTAHAN
							</a></h1>   						
						</div>						
						<div class="col-md-8">
							<div class="dropdown">
								<ul class="nav nav-pills">
								    <li><a href="index.html">Home</a></li>							    
									<li><a href="Portfolio.html">Products</a></li>
								    <li><a href="Blog.html">Services</a></li>
									<li><a href="Contact.html">Contact</a></li>
								</ul>
							</div>
						</div>	
					</div>				
				</div>
			</div>
		</header>
			<div class="alert alert-danger">ADMIN</div>
			<?php echo $this->fetch('content'); ?>
	</div>
	<footer>
		<section id="footer" class="section footer">
			<div class="container">
				<div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
					<div class="col-sm-12 align-center">
						<ul class="social-network social-circle">
							<li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
							<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						</ul>				
					</div>
				</div>
				<div class="row align-center copyright">
					<div class="col-sm-12"><p>All Rights Reserved &copy; 2015 Bentahan <a href="http://bootstraptaste.com">Bootstraptaste</a></p></div>
				</div>
			</div>
		</section>
		<a href="#" class="scrollup"><i class="fa fa-chevron-up"> </i></a>
	</footer>
	
</body>
</html>
