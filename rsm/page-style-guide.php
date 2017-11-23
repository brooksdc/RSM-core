<?php
/**
 * Template name: Style Guide
 *
 * @package bdc_custom
 */

function style_guide_scripts() {
	//wp_enqueue_script( 'style-guide-js',  get_template_directory_uri() . '/style-guide/style-guide-scripts.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'style_guide_scripts', 2 );

get_header(); ?>

<div class="container">
<?php while ( have_posts() ) : the_post(); ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

<?php endwhile; // end of the loop. ?>

<div class="row">
	
	<div id="secondary" class="col-sm-8">
		<ul class="section table-of-contents">
        <li><a href="#typography" class="">Typography</a></li>
        <li><a href="#colors" class="">Colors</a></li>
        <li><a href="#buttons" class="">Buttons</a></li>
        <li><a href="#forms" class="">Forms</a></li>
        <li><a href="#tables" class="">Tables</a></li>
        <li><a href="#lists" class="">Lists</a></li>
        <li><a href="#posts" class="">Posts</a></li>
        <li><a href="#wp" class="">WordPress elements</a></li>
      </ul>
	</div>

	<div id="primary" class="content-area col-sm-16">
		
		<main id="main" class="site-main" role="main">

			

			<!-- typography -->
			<section id="typography" class="section scrollspy">
				<h1>Headline One</h1>
				<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel lacus sapien. Etiam at malesuada nisi. In efficitur porttitor efficitur. Proin sed neque nibh.</p>

				<h2>Headline Two</h2>
				<p>Sed ultricies erat at purus semper, dictum laoreet lorem sollicitudin. Quisque vitae ligula in urna vestibulum rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. In euismod sem et dignissim vehicula. Sed in purus diam. Duis elit eros, aliquam vel consectetur sit amet, euismod at mi. Nam dignissim velit purus, mollis molestie urna bibendum eu. Phasellus quis mauris ut quam varius facilisis nec vitae mi. Ut lorem lorem, tincidunt a neque sodales, pulvinar dictum augue. Pellentesque pharetra mattis erat, nec porttitor ipsum mattis at. Cras vestibulum ornare velit nec varius. Suspendisse hendrerit faucibus est sit amet accumsan. Suspendisse lectus eros, suscipit ac aliquam quis, faucibus eu sem.</p>

				<h3>headline Three</h3>
				<p>Fum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut rutrum ligula eu diam convallis bibendum. Nunc leo massa, bibendum eu dui sed, sollicitudin porttitor mauris. Cras non est blandit, consequat neque et, consequat elit. Maecenas sed maximus lectus. Vivamus sed ultricies magna. Sed egestas elementum nisl eget pellentesque. Donec quis dictum magna, et porttitor arcu. Praesent ornare bibendum odio, ut ultricies eros vehicula quis. Maecenas gravida libero justo, eget tempor quam tempus a. Fusce tristique nibh sed nunc fermentum, vitae dictum ante euismod. Maecenas nec orci ornare, bibendum risus eget, faucibus ipsum. Nam commodo non augue at facilisis. Curabitur fringilla metus non hendrerit venenatis. Vivamus in turpis viverra, malesuada tellus non, elementum leo. Fusce sollicitudin nulla sed risus pretium, at congue nisl semper.</p>

				<h4>Headline Four</h4>
				<p>Mauris commodo neque justo, in volutpat libero efficitur sed. Maecenas id orci metus. Phasellus diam dolor, ornare ut urna vitae, consectetur condimentum diam. Quisque tincidunt velit at elit auctor aliquet. Integer ornare vel nulla id venenatis. Nam ut erat varius, convallis ante nec, mattis dolor. Donec sed quam ullamcorper, bibendum sem quis, auctor risus. Fusce imperdiet lacus ut lectus viverra, sit amet aliquam tortor finibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac habitasse platea dictumst.</p>

				<h4>Blockquotes</h4>
				<blockquote>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
				</blockquote>

			</section><!-- typography -->
			
			<section id="colors" class="section">
				<h2>Colours</h2>
				
				<h4>Brand Colours</h4>
				<div class="row">
					<div class="col-sm-6">
						<div class="swatch brand-primary"></div>
					</div>
					<div class="col-sm-6">
						<div class="swatch brand-secondary"></div>
					</div>
					<div class="col-sm-6">
						<div class="swatch brand-accent"></div>
					</div>
				</div>

				<h4>Neutral / Base Colours</h4>
				<div class="row">
					<div class="col-sm-6">
						<div class="swatch off-black"></div>
					</div>
					<div class="col-sm-6">
						<div class="swatch off-white"></div>
					</div>
				</div>

			</section>

			<!-- buttons -->
			<section id="buttons" class="section scrollspy">
				<h2>Buttons</h2>
				
				<h4>Default</h4>
				<div class="button-row">
					<button class="btn btn-large">Large</button>
					<button class="btn btn-large btn-hover-icon">Large Hover Icon <i class="icon fa fa-angle-down"></i></button>
					<button class="btn">Regular</button>
					<button class="btn btn-hover-icon">Regular Hover Icon <i class="icon fa fa-angle-down"></i></button>
					<button class="btn btn-raised">Raised</button>
					<button class="btn btn-raised waves-effect waves-light">Wave FX</button>
					<button class="btn btn-outline">Outline</button>
					<button class="btn btn-flat">Flat</button>
					<button class="btn btn-small">Small</button>
					<button class="btn btn-small btn-hover-icon">Small Hover Icon <i class="icon fa fa-angle-down"></i></button>
					<a class="btn btn-block">Block</a>
				</div>

				<h4>Primary</h4>
				<div class="button-row">
					<button class="btn btn-primary btn-large">Large</button>
					<button class="btn btn-primary">Regular</button>
					<button class="btn btn-primary btn-raised">Raised</button>
					<button class="btn btn-primary waves-effect waves-light">Wave FX</button>
					<button class="btn btn-primary btn-outline">Outline</button>
					<button class="btn btn-primary btn-flat">Flat</button>
					<button class="btn btn-primary btn-small">Small</button>
					<a class="btn btn-primary btn-block">Block</a>
				</div>

				<h4>Secondary</h4>
				<div class="button-row">
					<button class="btn btn-secondary btn-large">Large</button>
					<button class="btn btn-secondary">Regular</button>
					<button class="btn btn-secondary btn-raised">Raised</button>
					<button class="btn btn-secondary waves-effect waves-light">Wave FX</button>
					<button class="btn btn-secondary btn-outline">Outline</button>
					<button class="btn btn-secondary btn-flat">Flat</button>
					<button class="btn btn-secondary btn-small">Small</button>
					<a class="btn btn-secondary btn-block">Block</a>
				</div>

				<h4>Accent</h4>
				<div class="button-row">
					<button class="btn btn-accent btn-large">Large</button>
					<button class="btn btn-accent">Regular</button>
					<button class="btn btn-accent btn-raised">Raised</button>
					<button class="btn btn-accent waves-effect waves-light">Wave FX</button>
					<button class="btn btn-accent btn-outline">Outline</button>
					<button class="btn btn-accent btn-flat">Flat</button>
					<button class="btn btn-accent btn-small">Small</button>
					<a class="btn btn-accent btn-block">Block</a>
				</div>
				
			</section><!--buttons-->

			<section id="forms" class="section scrollspy">
				<h2>Forms</h2>
				
				<h4>Basic Form Elements</h4>
				<form>
					
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputFile">File input</label>
				    <input type="file" id="exampleInputFile">
				  </div>

				  <div class="form-group">
				  	<label for="selectTest">Select your choice:</label>
					<select class="form-control">
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>
				  </div>

				  <div class="form-group">
					  <div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
						    Option one is this and that&mdash;be sure to include why it's great
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
						    Option two can be something else and selecting it will deselect option one
						  </label>
						</div>
						<div class="radio disabled">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
						    Option three is disabled
						  </label>
						</div>
					</div>

				  <div class="checkbox">
				    <label>
				      <input type="checkbox"> Check me out
				    </label>
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>


				<h4>Inline Form</h4>
				<form class="form-inline">
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputEmail3">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputPassword3">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
				  </div>
				  <div class="checkbox">
				    <label>
				      <input type="checkbox"> Remember me
				    </label>
				  </div>
				  <button type="submit" class="btn btn-default">Sign in</button>
				</form>

			</section><!-- forms -->

			<section id="tables" class="section scrollspy">
				<h2>Tables</h2>

				<h4>Borderless Table (default)</h4>
				<table>
			        <thead>
			          <tr>
			              <th data-field="id">Name</th>
			              <th data-field="name">Item Name</th>
			              <th data-field="price">Item Price</th>
			          </tr>
			        </thead>

			        <tbody>
			          <tr>
			            <td>Alvin</td>
			            <td>Eclair</td>
			            <td>$0.87</td>
			          </tr>
			          <tr>
			            <td>Alan</td>
			            <td>Jellybean</td>
			            <td>$3.76</td>
			          </tr>
			          <tr>
			            <td>Jonathan</td>
			            <td>Lollipop</td>
			            <td>$7.00</td>
			          </tr>
			        </tbody>
			      </table>

			    <h4>Bordered Table</h4>
				<table class="bordered">
			        <thead>
			          <tr>
			              <th data-field="id">Name</th>
			              <th data-field="name">Item Name</th>
			              <th data-field="price">Item Price</th>
			          </tr>
			        </thead>

			        <tbody>
			          <tr>
			            <td>Alvin</td>
			            <td>Eclair</td>
			            <td>$0.87</td>
			          </tr>
			          <tr>
			            <td>Alan</td>
			            <td>Jellybean</td>
			            <td>$3.76</td>
			          </tr>
			          <tr>
			            <td>Jonathan</td>
			            <td>Lollipop</td>
			            <td>$7.00</td>
			          </tr>
			        </tbody>
			      </table>

			    <h4>Striped Table</h4>
				<table class="striped">
			        <thead>
			          <tr>
			              <th data-field="id">Name</th>
			              <th data-field="name">Item Name</th>
			              <th data-field="price">Item Price</th>
			          </tr>
			        </thead>

			        <tbody>
			          <tr>
			            <td>Alvin</td>
			            <td>Eclair</td>
			            <td>$0.87</td>
			          </tr>
			          <tr>
			            <td>Alan</td>
			            <td>Jellybean</td>
			            <td>$3.76</td>
			          </tr>
			          <tr>
			            <td>Jonathan</td>
			            <td>Lollipop</td>
			            <td>$7.00</td>
			          </tr>
			        </tbody>
			      </table>

			      <h4>Centered Table</h4>
					<table class="centered">
				        <thead>
				          <tr>
				              <th data-field="id">Name</th>
				              <th data-field="name">Item Name</th>
				              <th data-field="price">Item Price</th>
				          </tr>
				        </thead>

				        <tbody>
				          <tr>
				            <td>Alvin</td>
				            <td>Eclair</td>
				            <td>$0.87</td>
				          </tr>
				          <tr>
				            <td>Alan</td>
				            <td>Jellybean</td>
				            <td>$3.76</td>
				          </tr>
				          <tr>
				            <td>Jonathan</td>
				            <td>Lollipop</td>
				            <td>$7.00</td>
				          </tr>
				        </tbody>
				      </table>

			    <h4>Responsive Table</h4>
				<table class="responsive-table">
			        <thead>
			          <tr>
			              <th data-field="id">Name</th>
			              <th data-field="name">Item Name</th>
			              <th data-field="price">Item Price</th>
			          </tr>
			        </thead>

			        <tbody>
			          <tr>
			            <td>Alvin</td>
			            <td>Eclair</td>
			            <td>$0.87</td>
			          </tr>
			          <tr>
			            <td>Alan</td>
			            <td>Jellybean</td>
			            <td>$3.76</td>
			          </tr>
			          <tr>
			            <td>Jonathan</td>
			            <td>Lollipop</td>
			            <td>$7.00</td>
			          </tr>
			        </tbody>
			      </table>
			</section>

			<section id="lists" class="section scrollspy">
				<h2>Lists</h2>
				
				<div class="row">
					<div class="col-sm-6">
						<h4>Unordered List</h4>
						<ul>
							<li>list item #1</li>
							<li>list item #3</li>
							<li>list item #3</li>
						</ul>
					</div>
					
					<div class="col-sm-6">
						<h4>Ordered List</h4>
						<ol>
							<li>list item #1</li>
							<li>list item #2</li>
							<li>list item #3</li>
						</ol>
					</div>
					
					<div class="col-sm-6">
						<h4>Definition List</h4>
						<dl>
							<dt>Item #1</dt>
							<dd>Description</dd>
							<dt>Item #2</dt>
							<dd>Description</dd>
							<dt>Item #3</dt>
							<dd>Description</dd>
						</dl>
					</div>

					<div class="col-sm-6">
						<h4>Striped List</h4>
						<ul class="list--striped">
							<li>list item #1</li>
							<li>list item #2</li>
							<li>list item #3</li>
						</ul>
					</div>
				</div><!-- .row -->
				<div class="row">
					<div class="col-sm-6">
						<h4>Standard List</h4>
						<ul>
							<li>list item #1</li>
							<li>list item #3</li>
							<li>list item #3</li>
						</ul>
					</div>

					<div class="col-sm-6">
						<h4>.list--no-bullets</h4>
						<ul class="list--no-bullets">
							<li>list item #1</li>
							<li>list item #3</li>
							<li>list item #3</li>
						</ul>
					</div>

					<div class="col-sm-6">
						<h4>.fa-ul + .fa-li</h4>
						<ul class="fa-ul">
						  <li><i class="fa-li fa fa-check-square"></i>List icons</li>
						  <li><i class="fa-li fa fa-check-square"></i>can be used</li>
						  <li><i class="fa-li fa fa-spinner fa-spin"></i>as bullets</li>
						  <li><i class="fa-li fa fa-square"></i>in lists</li>
						</ul>
					</div>
					
					<div class="col-sm-12">
						<h4>.list--inline</h4>
						<ul class="list--inline">
							<li>list item #1</li>
							<li>list item #3</li>
							<li>list item #3</li>
						</ul>
					</div>

					<div class="col-sm-12">
						<h4>.list--inline .list--bar-after</h4>
						<ul class="list--inline list--bar-after">
							<li>list item #1</li>
							<li>list item #3</li>
							<li>list item #3</li>
						</ul>
					</div>

					
				</div><!-- .row -->
			</section>

			<section id="posts" class="scrollspy section">
				<h2>Post Styles</h2>
				
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 1,
				);

				$my_posts = new WP_Query($args);

				if ($my_posts->have_posts()) { ?> 
					
					<h4>Blog Listing</h4>
					<?php while ($my_posts->have_posts()) {
						$my_posts->the_post(); ?>
						
						<div class="col-sm-24">
							<?php get_template_part( 'content', get_post_format() ); ?>
						</div>

					<?php } //while have_posts() ?>
						

				<?php } //have_posts() 
				wp_reset_postdata();
				?>

			</section>

			<section id="wp" class="section">
				<h2>WordPress Elements</h2>
				<p>Sample of automatic markup from wordpress editor</p>

				<h4>Image with caption</h4>
				<figure id="attachment_44" class="wp-caption alignnone"><img class="size-medium wp-image-44" src="http://users-macbook.local:5757/wp-content/uploads/2016/11/iyt_staff_proofs-8823-300x200.jpg" alt="this is a caption" srcset="http://users-macbook.local:5757/wp-content/uploads/2016/11/iyt_staff_proofs-8823-300x200.jpg 300w, http://users-macbook.local:5757/wp-content/uploads/2016/11/iyt_staff_proofs-8823-768x512.jpg 768w, http://users-macbook.local:5757/wp-content/uploads/2016/11/iyt_staff_proofs-8823.jpg 1024w" sizes="(max-width: 300px) 100vw, 300px" width="300" height="200"><figcaption class="wp-caption-text">this is a caption</figcaption></figure>

				
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	
</div><!-- .row -->
	</div>	

<?php get_footer(); ?>
