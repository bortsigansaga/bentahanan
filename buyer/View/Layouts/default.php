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
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php

		echo $this->Html->css(array(
				'bootstrap',
				'jquery.fancybox',
				'flexslider',
				'style',
				'buyer-default',
				'datepicker'
			));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
	<?php
	echo $this->Html->script(array(
					'jquery',
					'bootstrap',
					'jquery.fancybox.pack',
					'jquery.fancybox-media',
					'bootstrap-datepicker',
					//'prettify',
					//'portfolio/jquery.quicksand.js',
					//'portfolio/setting.js',
					'jquery.flexslider',
					//'animate',
					'custom'
				));

	?>
</head>
<body>	

	<header>
		<div id="wrapper">
	
	        <div class="navbar navbar-default navbar-static-top">
	            <div class="container">
	            	<div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	                    <a class="navbar-brand" href="index.php">House Seller</a>
						</div>
            		<div class="navbar-collapse collapse">
	                   	<ul class="nav navbar-nav navbar-right">
	                   		
	                        <!--<li><a href="about.php">Products and Services</a></li>!-->
	                        <li><a href="<?php echo $this->Html->url('/login'); ?>"><button type="button" class="btn btn-default btn-sm navbar-btn btnMenu">Login</button></a></li>
		                      <li><a href="<?php echo $this->Html->url('/register'); ?>"><button type="button" class="btn btn-default btn-sm navbar-btn btnMenu">Sign up</button></a></li>
	                    </ul>
	                </div>

                </div>
               
            </div>
        </div>
	</header>
	
	<?php echo $this->fetch('content'); ?>

	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Visit Us</h5>
					<address>
					<strong>HouseOfGolds</strong><br>
					 Unit 913, Tough Flour, Keep peel Building,<br/>
					 Rest Least Loop,<br/>
					 Nonetheless, 8741 Philippines
					 </address>
					<p>
						<i class="icon-phone"></i> Telephone: <strong>032 111 2345</strong> <br>
						<i class="icon-envelope-alt"></i> Email: <strong>nowyouseeme@nothing.com</strong>
					</p>
				</div>
			</div>
			<div class="col-lg-3">
				<!-- Vacant !-->
				<div class="col-lg-4">
        	<div class="fb-like-box" data-href="https://www.facebook.com/FortyDegreesCelsiusInc" data-width="85%" data-height="350" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>    
          <div class="clr"></div>
        </div>
			</div>
			<div class="col-lg-3">
				<!-- Vacant !-->
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Banners</h5>
					<div class="flickr_badge">
						<!-- vacant !-->
					</div>
					<div class="clear">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	

</body>
</html>
