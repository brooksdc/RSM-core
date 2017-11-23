<!doctype html>
<html class="maintenance-mode">
<head>
<meta charset="UTF-8">
<title><?php echo get_bloginfo('name');?></title>

<link rel='stylesheet' id='style-css'  href='<?php echo get_bloginfo('template_directory'); ?>/css/main-min.css' type='text/css' media='all' />


</head>

<body class="maintenance-page">
	
	<div class="maintenance__wrap">
		<div class="maintenance__message">
			
			<div class="logo"></div>
			
			<h1 class="maintenance__title">Website Maintenance Underway!</h1>
			<!-- <p>In the meantime, please contact the store directly:</p> -->

			<ul class="maintenance__contact-options">
				<li>Email the <a href="mailto:<?php echo get_option('admin_email'); ?>">site admin</a></li>
			</ul>

		</div><!--#maintenance__message-->
	</div><!-- .maintenance__wrap -->

</body>
</html>
