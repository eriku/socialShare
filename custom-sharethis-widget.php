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

	// Create Widget Form (Admin Area)
	function form( $instance ) {

		// Check values
		if( $instance) {
			$share_title = esc_attr($instance['share_title']);
			$share_type = esc_attr($instance['share_type']);
			$shareSiteFacebook = esc_attr($instance['share_site_facebook']);
			$shareSiteGooglePlus = esc_attr($instance['share_site_googleplus']);
			$shareSiteTwitter = esc_attr($instance['share_site_twitter']);
			$shareSiteLinkedin = esc_attr($instance['share_site_linkedin']);
		} else {
			$share_title = '';
			$shareType = '';
			$shareSiteFacebook = '';
			$shareSiteGooglePlus = '';
			$shareSiteTwitter = '';
			$shareSiteLinkedin = '';
		}
		?>

		<!-- Title -->
		<p>
			<label for="<?php echo $this->get_field_id('share_title'); ?>"><?php _e('Title', 'wp_widget_plugin'); ?>:</label><br/>
			<input id="<?php echo $this->get_field_id('share_title'); ?>" name="<?php echo $this->get_field_name('share_title'); ?>" type="text" value="<?php echo $share_title; ?>" />
		</p>

		<!-- Share Link Type -->
		<!--p>
		<label for="<?php echo $this->get_field_id('share_type'); ?>"><?php _e('Share Type', 'wp_widget_plugin'); ?></label>
		<select name="<?php echo $this->get_field_name('share_type'); ?>" id="<?php echo $this->get_field_id('share_type'); ?>">
			<?php
				// Color options that match your theme scss variables
				$share_type_options = array('icons_words', 'words_only', 'icons_only');
				// Loop through above colors and add as options
				foreach ($share_type_options as $option) {
					echo '<option value="' . $option . '" id="' . $option . '"', $share_type == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
			?>
		</select>
		</p-->

		<!-- Share Site Checkboxes -->
		<p>
			<label for="<?php echo $this->get_field_id('share_site_facebook'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_facebook'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_facebook'); ?>" name="<?php echo $this->get_field_name('share_site_facebook'); ?>" /> 
				Facebook
			</label><br/>
			
			<label for="<?php echo $this->get_field_id('share_site_googleplus'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_googleplus'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_googleplus'); ?>" name="<?php echo $this->get_field_name('share_site_googleplus'); ?>" /> 
				Google Plus
			</label><br/>
			
			<label for="<?php echo $this->get_field_id('share_site_twitter'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_twitter'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_twitter'); ?>" name="<?php echo $this->get_field_name('share_site_twitter'); ?>" /> 
				Twitter
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_linkedin'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_linkedin'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_linkedin'); ?>" name="<?php echo $this->get_field_name('share_site_linkedin'); ?>" /> 
				LinkedIn
			</label>
		</p>
		<?php
	}


	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['share_title'] = strip_tags($new_instance['share_title']);
		$instance['share_type'] = strip_tags($new_instance['share_type']);
		$instance['share_site_facebook'] = strip_tags($new_instance['share_site_facebook']);
		$instance['share_site_googleplus'] = strip_tags($new_instance['share_site_googleplus']);
		$instance['share_site_twitter'] = strip_tags($new_instance['share_site_twitter']);
		$instance['share_site_linkedin'] = strip_tags($new_instance['share_site_linkedin']);
		return $instance;
	}


	// Widget Display (Markup)
	function widget($args, $instance) {
		extract( $args );
		
		$share_title = $instance['share_title'];
		$share_type = $instance['share_type'];
		$share_facebook = $instance['share_site_facebook'];
		$share_googleplus = $instance['share_site_googleplus'];
		$share_twitter = $instance['share_site_twitter'];
		$share_linkedin = $instance['share_site_linkedin'];

		wp_enqueue_script( 'sharethis-style', plugins_url('custom-sharethis-widget.js', __FILE__) );

		$urls = array(
			'facebook' => 'http://www.facebook.com/sharer/sharer.php?u=' . urlencode(get_the_permalink()),
			'twitter' => 'http://twitter.com/share?text=' . urlencode(get_the_title() . ' from @vaneconomic') . '&url=' . urlencode(get_the_permalink()) . '&hashtags=vancouver',
			'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode(get_the_permalink()) . '&title=' . urlencode(get_the_title()) . '&source=' . urlencode(get_bloginfo('url')) . '&summary=' . urlencode(strip_tags(custom_excerpt(35, false, false))),
			'googleplus' => 'https://plus.google.com/share?url=' . urlencode(get_the_permalink()) . '&appkey=&title=' . urlencode(get_the_title())
		);

		echo $before_widget;
		?>
		<div class="social-share <?php echo $share_type; ?>">
			<span class="social-share-text"><?php echo $share_title; ?></span>
			<ul class="social-share-links">
				<?php if ( $share_facebook ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['facebook'] ?>" class="social-share-item js-share_link facebook" data-vec-share-site="Facebook">Facebook</a></li>
				<?php endif; ?>
				<?php if ( $share_googleplus ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['twitter'] ?>" class="social-share-item js-share_link twitter" data-vec-share-site="Twitter">Twitter</a></li>
				<?php endif; ?>
				<?php if ( $share_twitter ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['googleplus'] ?>" class="social-share-item js-share_link googleplus" data-vec-share-site="GooglePlus">Google+</a></li>
				<?php endif; ?>
				<?php if ( $share_linkedin ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['linkedin'] ?>" class="social-share-item js-share_link linkedin" data-vec-share-site="LinkedIn">LinkedIn</a></li>
				<?php endif; ?>
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
