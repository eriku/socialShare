<?php
	
/*
Plugin Name: UWLM Social Share Widget
Description: Adds the social share widget
*/

// Creating the widget 
class sharethis_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget, each widget will have a value attached
			'sharethis_widget', 
			// Widget name to appear in UI
			__('Social Share', 'sharethis_widget_custom'), 
			array(
				// Widget Description
				'description' => __(
					'UWLM Social Share Widget',
					'sharethis_widget_custom'
				),
				// Widget Class
				'classname' => 'widget_sharethis'
			) 
		);
	}

	// Widget Display (Markup)
	function widget($args, $instance) {

		wp_enqueue_script( 'sharethis-style', plugins_url('custom-sharethis-widget.js', __FILE__) );

		$urls = array(
			'facebook' => 'http://www.facebook.com/sharer/sharer.php?u=' . urlencode(get_the_permalink()),
			'twitter' => 'http://twitter.com/share?text=' . urlencode(get_the_title() . ' from @vaneconomic') . '&url=' . urlencode(get_the_permalink()) . '&hashtags=vancouver',
			'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode(get_the_permalink()) . '&title=' . urlencode(get_the_title()) . '&source=' . urlencode(get_bloginfo('url')) . '&summary=' . urlencode(strip_tags(custom_excerpt(35, false, false))),
			'googleplus' => 'https://plus.google.com/share?url=' . urlencode(get_the_permalink()) . '&appkey=&title=' . urlencode(get_the_title())
		);

		echo $before_widget;
		?>
		<div class="social-share widget">
			<span class="social-share-text">Share this</span>
			<ul class="social-share-links">
				<li class="social-share-li"><a href="<?php echo $urls['facebook'] ?>" class="social-share-item js-share_link facebook" data-vec-share-site="Facebook">Facebook</a></li>
				<li class="social-share-li"><a href="<?php echo $urls['twitter'] ?>" class="social-share-item js-share_link twitter" data-vec-share-site="Twitter">Twitter</a></li>
				<li class="social-share-li"><a href="<?php echo $urls['googleplus'] ?>" class="social-share-item js-share_link googleplus" data-vec-share-site="GooglePlus">Google+</a></li>
				<li class="social-share-li"><a href="<?php echo $urls['linkedin'] ?>" class="social-share-item js-share_link linkedin" data-vec-share-site="LinkedIn">LinkedIn</a></li>
			</ul>
		</div>
		<?php
		echo $after_widget;
	}

} // Class End

// Register and load the widget
function custom_sharethis_load_widget() {
	register_widget( 'sharethis_widget' );
}

add_action( 'widgets_init', 'custom_sharethis_load_widget' );
