<!doctype html>
<html class="maintenance-mode">
<head>
<meta charset="UTF-8">
<title><?php echo get_bloginfo('name');?></title>

<link rel='stylesheet' id='style-css'  href='<?php echo get_bloginfo('template_directory'); ?>/css/main-min.css' type='text/css' media='all' />

<?php wp_head(); ?>
</head>

<body class="maintenance-page">
	
	<div class="container">
		
		<div class="maintenance-page__content">
			<?php
			$maintenance_page_content = get_field('maintenance_page_content', 'option');

			if(!empty($maintenance_page_content)) {
				echo $maintenance_page_content;
			} ?>
		</div>

	</div><!-- .container -->

</body>
</html>
