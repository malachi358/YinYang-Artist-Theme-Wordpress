<?php
/*
Template Name: Homepage
*/
 get_header(); ?>

	<div class="container">
			<div id="splitlayout" class="splitlayout">
				<div class="intro">

					<div class="side side-left">
						<div class="leftBg">
							<h1 class="malachi-top roboto">Malachi</h1>

							<div class="intro-content">
								<div class="profile"><!--<img src="<?php echo get_template_directory_uri(); ?>/img/profile1.jpg" alt="profile1">--></div>
								<h1><span>Art </span><span class="subhead-intro"></span></h1>
								<p>Drawing Painting Sculpting</p>
							</div>
							<div class="overlay"></div>
						</div>
						
					</div>

					<div class="side side-right">
						<h1 class="simonyan-top roboto">Simonyan</h1>
						<div class="intro-content">
							<div class="profile profile2"></div>
							<h1><span>Design</span><span class="subhead-intro"></span></h1>
							<p>Graphic Web Development</p>
						</div>
						<div class="overlay"></div>
						<div class="svg-holder">
			              <div class='gallery' id='chart'></div>
			            </div>
					</div>
				</div><!-- /intro -->
				<div class="page page-right">
					<div class="the-menus art-menu"><?php wp_nav_menu( array('menu' => 'design' )); ?></div>
					<div class="page-inner">
						<section>
							<h2>Test One</h2>
						</section>

						<section>
							<h2>Test Two</h2>	
						</section>

						<section>
							<h2>Test Three</h2>
							
						</section>

						<section>
							<h2>Test Four</h2>
							
						</section>

					</div><!-- /page-inner -->
				</div><!-- /page-right -->
				<div class="page page-left">
					<div class="the-menus design-menu"><?php wp_nav_menu( array('menu' => 'art' )); ?></div>
					<div class="page-inner">

						<section class="pageLeft" id="myDrawings">
							<h2>Drawing</h2>
								<? $the_query = new WP_Query( 'page_id=154' );
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
								        the_content();
								endwhile;
								wp_reset_postdata();
								?>
						</section>

						<section class="pageLeft hiddenLeft" id="myPaintings">
							<h2>Painting</h2>
								<? $the_query = new WP_Query( 'page_id=156' );
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
								        the_content();
								endwhile;
								wp_reset_postdata();
								?>
						</section>

						<section class="pageLeft hiddenLeft" id="mySculptures">
							<h2>Sculpture</h2>
								<? $the_query = new WP_Query( 'page_id=158' );
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
								        the_content();
								endwhile;
								wp_reset_postdata();
								?>
						</section>
					</div><!-- /page-inner -->
				</div><!-- /page-left -->
				<a href="#" class="back back-right" title="back to intro">&rarr;</a>
				<a href="#" class="back back-left" title="back to intro">&larr;</a>
			</div><!-- /splitlayout -->
		</div><!-- /container -->

<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script type="text/javascript">
  var width = 2000,
  height = 1200;

var vertices = d3.range(50).map(function(d) {
  return [Math.random() * width, Math.random() * height];
});

var svg = d3.select("#chart")
  .append("svg")
   .attr("width", width)
   .attr("height", height)
   .attr("class", "PiYG")
   .on("mousemove", update);

svg.selectAll("path")
  .data(d3.geom.voronoi(vertices))
  .enter().append("path")
  .attr("class", function(d, i) { return i ? "q" + (i % 100) + "-9" : null; })
  .attr("d", function(d) { return "M" + d.join("L") + "Z"; });

svg.selectAll("circle")
  .data(vertices.slice(1))
  .enter().append("circle")
  .attr("transform", function(d) {   return "translate(" + d + ")"; })
  .attr("r", 0);

function update() {
  vertices[0] = d3.mouse(this);
  svg.selectAll("path")
  .data(d3.geom.voronoi(vertices)
  .map(function(d) { return "M" + d.join("L") + "Z"; }))
  .filter(function(d) { return this.getAttribute("d") != d; })
  .attr("d", function(d) { return d; });
}

</script>



