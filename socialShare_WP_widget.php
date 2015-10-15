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
			$shareSiteTwitterUsername = esc_attr($instance['share_site_twitter_username']);
			$shareSiteLinkedin = esc_attr($instance['share_site_linkedin']);
			$shareSitePinterest = esc_attr($instance['share_site_pinterest']);
			$shareSiteTumblr = esc_attr($instance['share_site_tumblr']);
			$shareSiteBuffer = esc_attr($instance['share_site_buffer']);
			$shareSiteDigg = esc_attr($instance['share_site_digg']);
			$shareSiteReddit = esc_attr($instance['share_site_reddit']);
			$shareSiteStumbleupon = esc_attr($instance['share_site_stumbleupon']);
			$shareSiteDelicious = esc_attr($instance['share_site_delicious']);
		} else {
			$share_title = '';
			$shareType = '';
			$shareSiteFacebook = '';
			$shareSiteGooglePlus = '';
			$shareSiteTwitter = '';
			$shareSiteTwitterUsername = '';
			$shareSiteLinkedin = '';
			$shareSitePinterest = '';
			$shareSiteTumblr = '';
			$shareSiteBuffer = '';
			$shareSiteDigg = '';
			$shareSiteReddit = '';
			$shareSiteStumbleupon = '';
			$shareSiteDelicious = '';
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
			
			<label for"<?php echo $this->get_field_id('share_site_twitter_username'); ?>">
				Twitter Username<br/>
				<input id="<?php echo $this->get_field_id('share_site_twitter_username') ?>" name="<?php echo $this->get_field_name('share_site_twitter_username'); ?>" type="text" value="<?php echo $shareSiteTwitterUsername; ?>" class="textfield" />
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_twitter'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_twitter'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_twitter'); ?>" name="<?php echo $this->get_field_name('share_site_twitter'); ?>" /> 
				Twitter
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_linkedin'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_linkedin'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_linkedin'); ?>" name="<?php echo $this->get_field_name('share_site_linkedin'); ?>" /> 
				LinkedIn
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_pinterest'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_pinterest'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_pinterest'); ?>" name="<?php echo $this->get_field_name('share_site_pinterest'); ?>" /> 
				Pinterest
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_tumblr'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_tumblr'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_tumblr'); ?>" name="<?php echo $this->get_field_name('share_site_tumblr'); ?>" /> 
				Tumblr
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_buffer'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_buffer'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_buffer'); ?>" name="<?php echo $this->get_field_name('share_site_buffer'); ?>" /> 
				Buffer
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_digg'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_digg'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_digg'); ?>" name="<?php echo $this->get_field_name('share_site_digg'); ?>" /> 
				Digg
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_reddit'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_reddit'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_reddit'); ?>" name="<?php echo $this->get_field_name('share_site_reddit'); ?>" /> 
				Reddit
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_stumbleupon'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_stumbleupon'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_stumbleupon'); ?>" name="<?php echo $this->get_field_name('share_site_stumbleupon'); ?>" /> 
				StumbleUpon
			</label><br/>

			<label for="<?php echo $this->get_field_id('share_site_delicious'); ?>">
				<input class="checkbox" type="checkbox" <?php checked($instance['share_site_delicious'], 'on'); ?> id="<?php echo $this->get_field_id('share_site_delicious'); ?>" name="<?php echo $this->get_field_name('share_site_delicious'); ?>" /> 
				Delicious
			</label><br/>
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
		$instance['share_site_twitter_username'] = strip_tags($new_instance['share_site_twitter_username']);
		$instance['share_site_linkedin'] = strip_tags($new_instance['share_site_linkedin']);
		$instance['share_site_pinterest'] = strip_tags($new_instance['share_site_pinterest']);
		$instance['share_site_tumblr'] = strip_tags($new_instance['share_site_tumblr']);
		$instance['share_site_buffer'] = strip_tags($new_instance['share_site_buffer']);
		$instance['share_site_digg'] = strip_tags($new_instance['share_site_digg']);
		$instance['share_site_reddit'] = strip_tags($new_instance['share_site_reddit']);
		$instance['share_site_stumbleupon'] = strip_tags($new_instance['share_site_stumbleupon']);
		$instance['share_site_delicious'] = strip_tags($new_instance['share_site_delicious']);
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
		$share_twitter_username = $instance['share_site_twitter_username'];
		$share_linkedin = $instance['share_site_linkedin'];
		$share_pinterest = $instance['share_site_pinterest'];

		$share_tumblr = $instance['share_site_tumblr'];
		$share_buffer = $instance['share_site_buffer'];
		$share_digg = $instance['share_site_digg'];
		$share_reddit = $instance['share_site_reddit'];
		$share_stumbleupon = $instance['share_site_stumbleupon'];
		$share_delicious = $instance['share_site_delicious'];

		wp_enqueue_script( 'sharethis-style', plugins_url('custom-sharethis-widget.js', __FILE__) );

		$hashtags = 'Vancouver';
		$link = urlencode(get_the_permalink());
		$title = urlencode(get_the_title());
		$url = urlencode(get_bloginfo('url'));
		$desc = urlencode(strip_tags(custom_excerpt(35, false, false)));
		
		// Image
		$image = false;
		if ( isset(get_field('hero_images')[0]['hero_image']) && get_the_ID() ) {
			$heroes = get_field('hero_images');
		} else if ( is_home() ) {
			$heroes = get_field('hero_images', 'option');
		}
		if ($heroes) {
			$image = $heroes[0]['hero_image']['url'];
		} elseif ( has_post_thumbnail() && !is_archive() ) {
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
			$image = $image[0];
		} else {
			$image = get_bloginfo('template_url') . '/images/og-logo.png';
		}

		$urls = array(
			'facebook' => 'http://www.facebook.com/sharer/sharer.php?u=' . $link,
			'googleplus' => 'https://plus.google.com/share?url=' . $link . '&amp;appkey=&title=' . $title,
			'twitter' => 'https://twitter.com/share?url=' . $link . '&amp;text=' . $title . '&amp;via=' . $share_twitter_username . '&amp;hashtags=' . $hashtags,
			'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&amp;title=' . $title . '&amp;source=' . $url . '&amp;summary=' . $desc,
			'pinterest' => 'https://pinterest.com/pin/create/bookmarklet/?url=' . $link . '&amp;image=' . $image . '&amp;description=' . $title,
			'tumblr' => 'http://www.tumblr.com/share/link?url=' . $link . '&amp;name=' . $title . '&amp;description=' . $desc,
			'buffer' => 'http://bufferapp.com/add?text=' . $title . '&url=' . $link . '',
			'digg' => 'http://digg.com/submit?url=' . $link . '&title=' . $title,
			'reddit' => 'http://reddit.com/submit?url=' . $link . '&title=' . $title,
			'stumbleupon' => 'http://www.stumbleupon.com/submit?url=' . $link . '&title=' . $title,
			'delicious' => 'https://delicious.com/save?v=5&provider={provider}&noui&jump=close&url=' . $link . '&title=' . $title
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
				<?php if ( $share_pinterest ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['pinterest'] ?>" class="social-share-item js-share_link pinterest" data-vec-share-site="Pinterest">Pinterest</a></li>
				<?php endif; ?>
				<?php if ( $share_tumblr ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['tumblr'] ?>" class="social-share-item js-share_link tumblr" data-vec-share-site="tumblr">tumblr</a></li>
				<?php endif; ?>
				<?php if ( $share_buffer ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['buffer'] ?>" class="social-share-item js-share_link buffer" data-vec-share-site="buffer">buffer</a></li>
				<?php endif; ?>
				<?php if ( $share_digg ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['digg'] ?>" class="social-share-item js-share_link digg" data-vec-share-site="digg">digg</a></li>
				<?php endif; ?>
				<?php if ( $share_reddit ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['reddit'] ?>" class="social-share-item js-share_link reddit" data-vec-share-site="reddit">reddit</a></li>
				<?php endif; ?>
				<?php if ( $share_stumbleupon ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['stumbleupon'] ?>" class="social-share-item js-share_link stumbleupon" data-vec-share-site="stumbleupon">stumbleupon</a></li>
				<?php endif; ?>
				<?php if ( $share_delicious ) : ?>
					<li class="social-share-li"><a href="<?php echo $urls['delicious'] ?>" class="social-share-item js-share_link delicious" data-vec-share-site="delicious">delicious</a></li>
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
