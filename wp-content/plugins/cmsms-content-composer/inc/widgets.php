<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version 	1.4.4
 * 
 * CMSMasters Custom Widgets
 * Created by CMSMasters
 * 
 */


/**
 * Advertisement Widget Class
 */
class WP_Widget_Custom_Advertisement extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_advertisement_entries', 
			'description' => 	esc_attr__('Your advertisement', 'cmsms_content_composer') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-advertisement', esc_attr__('Advertisement', 'cmsms_content_composer'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Advertisement', 'cmsms_content_composer') : $instance['title'], $instance, $this->id_base);
        $image1 = isset($instance['image1']) ? $instance['image1'] : '';
        $link1 = isset($instance['link1']) ? $instance['link1'] : '';
        $image2 = isset($instance['image2']) ? $instance['image2'] : '';
        $link2 = isset($instance['link2']) ? $instance['link2'] : '';
        $image3 = isset($instance['image3']) ? $instance['image3'] : '';
        $link3 = isset($instance['link3']) ? $instance['link3'] : '';
        $image4 = isset($instance['image4']) ? $instance['image4'] : '';
        $link4 = isset($instance['link4']) ? $instance['link4'] : '';
        $image5 = isset($instance['image5']) ? $instance['image5'] : '';
        $link5 = isset($instance['link5']) ? $instance['link5'] : '';
        $image6 = isset($instance['image6']) ? $instance['image6'] : '';
        $link6 = isset($instance['link6']) ? $instance['link6'] : '';
		
		echo wp_kses_post($before_widget);
		
		if ($title) { 
			echo wp_kses_post($before_title . $title . $after_title);
		}
		
		echo '<div class="adv_image_wrap">';
		
		if ($image1 != '' && $link1 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link1) . '" target="_blank">' . 
					'<img src="' . esc_url($image1) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image2 != '' && $link2 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link2) . '" target="_blank">' . 
					'<img src="' . esc_url($image2) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image3 != '' && $link3 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link3) . '" target="_blank">' . 
					'<img src="' . esc_url($image3) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image4 != '' && $link4 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link4) . '" target="_blank">' . 
					'<img src="' . esc_url($image4) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image5 != '' && $link5 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link5) . '" target="_blank">' . 
					'<img src="' . esc_url($image5) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image6 != '' && $link6 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link6) . '" target="_blank">' . 
					'<img src="' . esc_url($image6) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}
		
        echo '</div>';
		
        echo wp_kses_post($after_widget);
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['image1'] = strip_tags($new_instance['image1']);
        $instance['link1'] = strip_tags($new_instance['link1']);
        $instance['image2'] = strip_tags($new_instance['image2']);
        $instance['link2'] = strip_tags($new_instance['link2']);
        $instance['image3'] = strip_tags($new_instance['image3']);
        $instance['link3'] = strip_tags($new_instance['link3']);
        $instance['image4'] = strip_tags($new_instance['image4']);
        $instance['link4'] = strip_tags($new_instance['link4']);
        $instance['image5'] = strip_tags($new_instance['image5']);
        $instance['link5'] = strip_tags($new_instance['link5']);
        $instance['image6'] = strip_tags($new_instance['image6']);
        $instance['link6'] = strip_tags($new_instance['link6']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$image1 = isset($instance['image1']) ? esc_attr($instance['image1']) : '';
		$link1 = isset($instance['link1']) ? esc_attr($instance['link1']) : '';
		$image2 = isset($instance['image2']) ? esc_attr($instance['image2']) : '';
		$link2 = isset($instance['link2']) ? esc_attr($instance['link2']) : '';
		$image3 = isset($instance['image3']) ? esc_attr($instance['image3']) : '';
		$link3 = isset($instance['link3']) ? esc_attr($instance['link3']) : '';
		$image4 = isset($instance['image4']) ? esc_attr($instance['image4']) : '';
		$link4 = isset($instance['link4']) ? esc_attr($instance['link4']) : '';
		$image5 = isset($instance['image5']) ? esc_attr($instance['image5']) : '';
		$link5 = isset($instance['link5']) ? esc_attr($instance['link5']) : '';
		$image6 = isset($instance['image6']) ? esc_attr($instance['image6']) : '';
		$link6 = isset($instance['link6']) ? esc_attr($instance['link6']) : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image1')); ?>"><?php esc_html_e('Image', 'cmsms_content_composer'); ?> #1:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image1')); ?>" name="<?php echo esc_attr($this->get_field_name('image1')); ?>" type="text" value="<?php echo esc_attr($image1); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link1')); ?>"><?php esc_html_e('Link', 'cmsms_content_composer'); ?> #1:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link1')); ?>" name="<?php echo esc_attr($this->get_field_name('link1')); ?>" type="text" value="<?php echo esc_attr($link1); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image2')); ?>"><?php esc_html_e('Image', 'cmsms_content_composer'); ?> #2:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image2')); ?>" name="<?php echo esc_attr($this->get_field_name('image2')); ?>" type="text" value="<?php echo esc_attr($image2); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link2')); ?>"><?php esc_html_e('Link', 'cmsms_content_composer'); ?> #2:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link2')); ?>" name="<?php echo esc_attr($this->get_field_name('link2')); ?>" type="text" value="<?php echo esc_attr($link2); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image3')); ?>"><?php esc_html_e('Image', 'cmsms_content_composer'); ?> #3:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image3')); ?>" name="<?php echo esc_attr($this->get_field_name('image3')); ?>" type="text" value="<?php echo esc_attr($image3); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link3')); ?>"><?php esc_html_e('Link', 'cmsms_content_composer'); ?> #3:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link3')); ?>" name="<?php echo esc_attr($this->get_field_name('link3')); ?>" type="text" value="<?php echo esc_attr($link3); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image4')); ?>"><?php esc_html_e('Image', 'cmsms_content_composer'); ?> #4:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image4')); ?>" name="<?php echo esc_attr($this->get_field_name('image4')); ?>" type="text" value="<?php echo esc_attr($image4); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link4')); ?>"><?php esc_html_e('Link', 'cmsms_content_composer'); ?> #4:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link4')); ?>" name="<?php echo esc_attr($this->get_field_name('link4')); ?>" type="text" value="<?php echo esc_attr($link4); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image5')); ?>"><?php esc_html_e('Image', 'cmsms_content_composer'); ?> #5:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image5')); ?>" name="<?php echo esc_attr($this->get_field_name('image5')); ?>" type="text" value="<?php echo esc_attr($image5); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link5')); ?>"><?php esc_html_e('Link', 'cmsms_content_composer'); ?> #5:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link5')); ?>" name="<?php echo esc_attr($this->get_field_name('link5')); ?>" type="text" value="<?php echo esc_attr($link5); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image6')); ?>"><?php esc_html_e('Image', 'cmsms_content_composer'); ?> #6:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image6')); ?>" name="<?php echo esc_attr($this->get_field_name('image6')); ?>" type="text" value="<?php echo esc_attr($image6); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link6')); ?>"><?php esc_html_e('Link', 'cmsms_content_composer'); ?> #6:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link6')); ?>" name="<?php echo esc_attr($this->get_field_name('link6')); ?>" type="text" value="<?php echo esc_attr($link6); ?>" />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Divider Widget Class
 */
class WP_Widget_Custom_Divider extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_divider_entries', 
			'description' => 	esc_html__('Divider for widgets rows', 'cmsms_content_composer') 
		);
		
		parent::__construct('custom-divider', esc_attr__('Divider', 'cmsms_content_composer'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
        $divider = isset($instance['divider']) ? $instance['divider'] : false;
        $divider_bdr = isset($instance['divider_bdr']) ? $instance['divider_bdr'] : 'solid';
		
		if ($divider) {
			echo '<div class="cmsms_widget_divider ' . esc_attr($divider_bdr) . '"></div>';
		} else {
			echo '<div class="cl"></div>';
		}
    }
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		
		$instance = array( 
			'divider' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['divider_bdr'] = strip_tags($new_instance['divider_bdr']);
		
		return $instance;
	}
	
	function form($instance) {
		$instance = wp_parse_args((array) $instance, array( 
			'divider' => false 
		) );
		$divider_bdr = isset($instance['divider_bdr']) ? esc_attr($instance['divider_bdr']) : 'solid';
        ?>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['divider'], true); ?> id="<?php echo esc_attr($this->get_field_id('divider')); ?>" name="<?php echo esc_attr($this->get_field_name('divider')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('divider')); ?>"><?php esc_html_e('Show Divider Line', 'cmsms_content_composer'); ?></label>
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('divider_bdr')); ?>"><?php esc_html_e('Divider Type', 'cmsms_content_composer'); ?>:<br />
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('divider_bdr')); ?>" name="<?php echo esc_attr($this->get_field_name('divider_bdr')); ?>">
					<option value="solid"<?php if ($divider_bdr == 'solid') { echo ' selected="selected"'; } ?>><?php esc_html_e('Solid Line', 'cmsms_content_composer'); ?></option>
					<option value="dashed"<?php if ($divider_bdr == 'dashed') { echo ' selected="selected"'; } ?>><?php esc_html_e('Dashed Line', 'cmsms_content_composer'); ?></option>
					<option value="dotted"<?php if ($divider_bdr == 'dotted') { echo ' selected="selected"'; } ?>><?php esc_html_e('Dotted Line', 'cmsms_content_composer'); ?></option>
					<option value="transparent"<?php if ($divider_bdr == 'transparent') { echo ' selected="selected"'; } ?>><?php esc_html_e('Transparent Line', 'cmsms_content_composer'); ?></option>
				</select>
            </label>
        </p>
		<?php
	}
}


/**
 * Embedded Video Widget Class
 */
class WP_Widget_Custom_Video extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_video_entries', 
			'description' => 	esc_attr__('Video from youtube, vimeo or dailymotion', 'cmsms_content_composer') 
		);
		
		parent::__construct('custom-video', esc_attr__('Embedded Widget', 'cmsms_content_composer'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		global $wp_embed;
		
		$wrap_embed = isset($instance['wrap_embed']) ? $instance['wrap_embed'] : true;
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Embedded Widget', 'cmsms_content_composer') : $instance['title'], $instance, $this->id_base);
        $url = isset($instance['url']) ? $instance['url'] : '';
        $width = isset($instance['width']) ? $instance['width'] : '';
        $height = isset($instance['height']) ? $instance['height'] : '';
		
		echo wp_kses_post($before_widget);
		
		if ($title) { 
			echo wp_kses_post($before_title . $title . $after_title);
		}
		
		if ($url != '') {
			if ($wrap_embed) {
				echo '<div class="cmsms_video_wrap">';
			}
			
			echo cmsms_return_content($wp_embed->run_shortcode('[embed' . 
				(($width != '' && $wrap_embed == '') ? ' width="' . $width . '"' : '') . 
				(($height != '' && $wrap_embed == '') ? ' height="' . $height . '"' : '') . 
			']' . $url . '[/embed]'));
			
			if ($wrap_embed) {
				echo '</div>';
			}
		}
		
        echo wp_kses_post($after_widget);
    }
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		
		$instance = array( 
			'wrap_embed' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['width'] = strip_tags($new_instance['width']);
        $instance['height'] = strip_tags($new_instance['height']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$url = isset($instance['url']) ? esc_attr($instance['url']) : '';
		$width = isset($instance['width']) ? esc_attr($instance['width']) : '';
		$height = isset($instance['height']) ? esc_attr($instance['height']) : '';
		$instance = wp_parse_args((array) $instance, array( 
			'wrap_embed' => true 
		) );
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Embed URL', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('width')); ?>"><?php esc_html_e('Max Width', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('width')); ?>" name="<?php echo esc_attr($this->get_field_name('width')); ?>" type="text" value="<?php echo esc_attr($width); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('height')); ?>"><?php esc_html_e('Max Height', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('height')); ?>" name="<?php echo esc_attr($this->get_field_name('height')); ?>" type="text" value="<?php echo esc_attr($height); ?>" />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['wrap_embed'], true); ?> id="<?php echo esc_attr($this->get_field_id('wrap_embed')); ?>" name="<?php echo esc_attr($this->get_field_name('wrap_embed')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('wrap_embed')); ?>"><?php esc_html_e('If checked, ignore default video height/max-height and set a 16:9 proportion instead', 'cmsms_content_composer'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Facebook Widget Class
 */
class WP_Widget_Custom_Facebook extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_facebook_entries', 
			'description' => 	esc_attr__('Your Facebook like box', 'cmsms_content_composer') 
		);
		
		parent::__construct('custom-facebook', esc_attr__('Facebook', 'cmsms_content_composer'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Facebook', 'cmsms_content_composer') : $instance['title'], $instance, $this->id_base);
		$url = isset($instance['url']) ? esc_url($instance['url']) : '';
		
		echo wp_kses_post($before_widget);
		
		if ($title) { 
			echo wp_kses_post($before_title . $title . $after_title);
		}
		
		echo '<div id="fb-root"></div>' . 
		'<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));
		</script>' . 
		'<div class="fb-page" data-href="' . esc_url($url) . '" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="' . esc_url($url) . '"><a href="' . esc_url($url) . '">Facebook</a></blockquote></div></div>' . 
		'<div class="cl"></div>' . 
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $url = isset($instance['url']) ? esc_attr($instance['url']) : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Facebook Page URL', 'cmsms_content_composer'); ?> :<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Flickr Widget Class
 */
class WP_Widget_Custom_Flickr extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_flickr_entries', 
			'description' => 	esc_attr__('Your Flickr account latest images', 'cmsms_content_composer') 
		);
		
		parent::__construct('custom-flickr', esc_attr__('Flickr', 'cmsms_content_composer'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Flickr', 'cmsms_content_composer') : $instance['title'], $instance, $this->id_base);
		$user = isset($instance['user']) ? $instance['user'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 6;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
		echo wp_kses_post($before_widget) . 
			'<div id="flickr">';
		
		if ($title) { 
			echo wp_kses_post($before_title . $title . $after_title);
		}
		
		echo '<div class="wrap">' . 
				'<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=' . $number . '&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=' . $user . '"></script>' . 
			'</div>' . 
			'<div class="cl"></div>' . 
			'<a href="http://www.flickr.com/photos/' . $user . '" class="more_button" target="_blank"><span>' . esc_html__('More flickr images', 'cmsms_content_composer') . '</span></a>' . 
			'</div>' . 
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['user'] = strip_tags($new_instance['user']);
        $instance['number'] = absint($new_instance['number']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $user = isset($instance['user']) ? esc_attr($instance['user']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 6;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>

		<?php _deprecated_function( 'Flickr widget', '' ); ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('user')); ?>"><?php esc_html_e('Flickr ID', 'cmsms_content_composer'); ?> (<a href="https://www.webfx.com/tools/idgettr" target="_blank">idGettr</a>):<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('user')); ?>" name="<?php echo esc_attr($this->get_field_name('user')); ?>" type="text" value="<?php echo esc_attr($user); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Enter the number of latest flickr images you'd like to display", 'cmsms_content_composer'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'cmsms_content_composer'); ?> 6</small><br />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * HTML5 Audio Widget Class
 */
class WP_Widget_Custom_HTML5_Audio extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_html5_audio_entries', 
			'description' => 	esc_attr__('Your HTML5 Audio', 'cmsms_content_composer') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-html5-audio', esc_attr__('HTML5 Audio', 'cmsms_content_composer'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('HTML5 Audio', 'cmsms_content_composer') : $instance['title'], $instance, $this->id_base);
        $srcmp3 = isset($instance['srcmp3']) ? $instance['srcmp3'] : '';
        $srcogg = isset($instance['srcogg']) ? $instance['srcogg'] : '';
        $srcwebm = isset($instance['srcwebm']) ? $instance['srcwebm'] : '';
        $preload = isset($instance['preload']) ? $instance['preload'] : 'none';
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
        $loop = isset($instance['loop']) ? $instance['loop'] : false;
		
		echo wp_kses_post($before_widget);
		
		if ($title) { 
			echo wp_kses_post($before_title . $title . $after_title);
		}
		
		$attrs = array( 
			'preload' => esc_attr($preload) 
		);
		
		if ($autoplay) {
			$attrs['autoplay'] = 'on';
		}
		
		if ($loop) {
			$attrs['loop'] = 'on';
		}
		
		if ($srcmp3 != '') {
			$attrs[substr(strrchr($srcmp3, '.'), 1)] = esc_url($srcmp3);
		}
		
		if ($srcogg != '') {
			$attrs[substr(strrchr($srcogg, '.'), 1)] = esc_url($srcogg);
		}
		
		if ($srcwebm != '') {
			$attrs[substr(strrchr($srcwebm, '.'), 1)] = esc_url($srcwebm);
		}
		
		$out = '<div class="cmsms_audio">' . 
			wp_audio_shortcode($attrs) . 
		'</div>';
		
		echo cmsms_return_content($out) . 
		wp_kses_post($after_widget);
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance = array( 
			'autoplay' 	=> 0, 
			'loop' 		=> 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['srcmp3'] = strip_tags($new_instance['srcmp3']);
        $instance['srcogg'] = strip_tags($new_instance['srcogg']);
		$instance['srcwebm'] = strip_tags($new_instance['srcwebm']);
		$instance['preload'] = strip_tags($new_instance['preload']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$srcmp3 = isset($instance['srcmp3']) ? esc_attr($instance['srcmp3']) : '';
		$srcogg = isset($instance['srcogg']) ? esc_attr($instance['srcogg']) : '';
		$srcwebm = isset($instance['srcwebm']) ? esc_attr($instance['srcwebm']) : '';
		$preload = isset($instance['preload']) ? esc_attr($instance['preload']) : 'none';
		
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' 	=> false, 
			'loop' 		=> false 
		) );
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcmp3')); ?>"><?php echo esc_html__('Audio', 'cmsms_content_composer') . ' .mp3 ' . esc_html__('File Format URL', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcmp3')); ?>" name="<?php echo esc_attr($this->get_field_name('srcmp3')); ?>" type="text" value="<?php echo esc_attr($srcmp3); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcogg')); ?>"><?php echo esc_html__('Audio', 'cmsms_content_composer') . ' .ogg ' . esc_html__('File Format URL', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcogg')); ?>" name="<?php echo esc_attr($this->get_field_name('srcogg')); ?>" type="text" value="<?php echo esc_attr($srcogg); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcwebm')); ?>"><?php echo esc_html__('Audio', 'cmsms_content_composer') . ' .webm ' . esc_html__('File Format URL', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcwebm')); ?>" name="<?php echo esc_attr($this->get_field_name('srcwebm')); ?>" type="text" value="<?php echo esc_attr($srcwebm); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('preload')); ?>"><?php esc_html_e('Preload', 'cmsms_content_composer'); ?>:<br />
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('preload')); ?>" name="<?php echo esc_attr($this->get_field_name('preload')); ?>">
					<option value="none"<?php if ($preload == 'none') { echo ' selected="selected"'; } ?>><?php esc_html_e('Not Preload', 'cmsms_content_composer'); ?></option>
					<option value="auto"<?php if ($preload == 'auto') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload Auto', 'cmsms_content_composer'); ?></option>
					<option value="metadata"<?php if ($preload == 'metadata') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload as Metadata', 'cmsms_content_composer'); ?></option>
				</select>
            </label>
        </p>
		<p class="l_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo esc_attr($this->get_field_id('autoplay')); ?>" name="<?php echo esc_attr($this->get_field_name('autoplay')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('autoplay')); ?>"><?php esc_html_e('Enable Autoplay', 'cmsms_content_composer'); ?></label>
		</p>
		<p class="r_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['loop'], true); ?> id="<?php echo esc_attr($this->get_field_id('loop')); ?>" name="<?php echo esc_attr($this->get_field_name('loop')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('loop')); ?>"><?php esc_html_e('Enable Repeat', 'cmsms_content_composer'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * HTML5 Video Widget Class
 */
class WP_Widget_Custom_HTML5_Video extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_html5_video_entries', 
			'description' => 	esc_attr__('Your HTML5 Video', 'cmsms_content_composer') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-html5-video', esc_attr__('HTML5 Video', 'cmsms_content_composer'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('HTML5 Video', 'cmsms_content_composer') : $instance['title'], $instance, $this->id_base);
        $srcmp4 = isset($instance['srcmp4']) ? $instance['srcmp4'] : '';
        $srcogg = isset($instance['srcogg']) ? $instance['srcogg'] : '';
        $srcwebm = isset($instance['srcwebm']) ? $instance['srcwebm'] : '';
        $poster = isset($instance['poster']) ? $instance['poster'] : '';
        $text = (isset($instance['text']) && $instance['text'] != '') ? $instance['text'] : esc_attr__('Your browser does not support the video tag.', 'cmsms_content_composer');
        $preload = isset($instance['preload']) ? $instance['preload'] : 'none';
        $loop = isset($instance['loop']) ? $instance['loop'] : false;
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
		
		echo wp_kses_post($before_widget);
		
		if ($title) { 
			echo wp_kses_post($before_title . $title . $after_title);
		}
		
		$out = '<div class="cmsms_video_wrap">';
		
		$attrs = array( 
			'preload' => esc_attr($preload) 
		);
		
		if ($poster != '') {
			$attrs['poster'] = esc_url($poster);
		}
		
		if ($autoplay) {
			$attrs['autoplay'] = 'on';
		}
		
		if ($loop) {
			$attrs['loop'] = 'on';
		}
		
		if ($srcmp4 != '') {
			$attrs[substr(strrchr($srcmp4, '.'), 1)] = esc_url($srcmp4);
		}
		
		if ($srcogg != '') {
			$attrs[substr(strrchr($srcogg, '.'), 1)] = esc_url($srcogg);
		}
		
		if ($srcwebm != '') {
			$attrs[substr(strrchr($srcwebm, '.'), 1)] = esc_url($srcwebm);
		}
		
		$out .= '<div class="cmsms_video">' . 
				wp_video_shortcode($attrs) . 
			'</div>' . 
		'</div>';
		
		echo cmsms_return_content($out) . 
		wp_kses_post($after_widget);
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance = array( 
			'autoplay' 	=> 0, 
			'loop' 		=> 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['srcmp4'] = strip_tags($new_instance['srcmp4']);
        $instance['srcogg'] = strip_tags($new_instance['srcogg']);
		$instance['srcwebm'] = strip_tags($new_instance['srcwebm']);
		$instance['poster'] = strip_tags($new_instance['poster']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['preload'] = strip_tags($new_instance['preload']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$srcmp4 = isset($instance['srcmp4']) ? esc_attr($instance['srcmp4']) : '';
		$srcogg = isset($instance['srcogg']) ? esc_attr($instance['srcogg']) : '';
		$srcwebm = isset($instance['srcwebm']) ? esc_attr($instance['srcwebm']) : '';
		$poster = isset($instance['poster']) ? esc_attr($instance['poster']) : '';
		$text = (isset($instance['text']) && $instance['text'] != '') ? esc_attr($instance['text']) : esc_attr__('Your browser does not support the video tag.', 'cmsms_content_composer');
		$preload = isset($instance['preload']) ? esc_attr($instance['preload']) : 'none';
		
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' 	=> false, 
			'loop' 		=> false 
		) );
        ?>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcmp4')); ?>"><?php echo esc_html__('Video', 'cmsms_content_composer') . ' .mp4 ' . esc_html__('File Format Source', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcmp4')); ?>" name="<?php echo esc_attr($this->get_field_name('srcmp4')); ?>" type="text" value="<?php echo esc_attr($srcmp4); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcogg')); ?>"><?php echo esc_html__('Video', 'cmsms_content_composer') . ' .ogg ' . esc_html__('File Format Source', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcogg')); ?>" name="<?php echo esc_attr($this->get_field_name('srcogg')); ?>" type="text" value="<?php echo esc_attr($srcogg); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcwebm')); ?>"><?php echo esc_html__('Video', 'cmsms_content_composer') . ' .webm ' . esc_html__('File Format Source', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcwebm')); ?>" name="<?php echo esc_attr($this->get_field_name('srcwebm')); ?>" type="text" value="<?php echo esc_attr($srcwebm); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('poster')); ?>"><?php esc_html_e('Poster URL', 'cmsms_content_composer'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('poster')); ?>" name="<?php echo esc_attr($this->get_field_name('poster')); ?>" type="text" value="<?php echo esc_attr($poster); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('preload')); ?>"><?php esc_html_e('Preload', 'cmsms_content_composer'); ?>:<br />
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('preload')); ?>" name="<?php echo esc_attr($this->get_field_name('preload')); ?>">
					<option value="none"<?php if ($preload == 'none') { echo ' selected="selected"'; } ?>><?php esc_html_e('Not Preload', 'cmsms_content_composer'); ?></option>
					<option value="auto"<?php if ($preload == 'auto') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload Auto', 'cmsms_content_composer'); ?></option>
					<option value="metadata"<?php if ($preload == 'metadata') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload as Metadata', 'cmsms_content_composer'); ?></option>
				</select>
            </label>
        </p>
        <p class="l_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo esc_attr($this->get_field_id('autoplay')); ?>" name="<?php echo esc_attr($this->get_field_name('autoplay')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('autoplay')); ?>"><?php esc_html_e('Enable Autoplay', 'cmsms_content_composer'); ?></label>
        </p>
        <p class="r_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['loop'], true); ?> id="<?php echo esc_attr($this->get_field_id('loop')); ?>" name="<?php echo esc_attr($this->get_field_name('loop')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('loop')); ?>"><?php esc_html_e('Enable Repeat', 'cmsms_content_composer'); ?></label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * PayPal Donations Widget Class
 */
class WP_Widget_Custom_PayPalDonations extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_custom_paypal_donations',
			'description' => esc_html__(
				'PayPal Donation Button',
				'cmsms_content_composer'
			)
		);
		parent::__construct('paypal_donations', 'PayPal Donations', $widget_ops);
	}
	
	public function widget($args, $instance) {
		extract($args);
		
		$paypal_donations = PayPalDonations::getInstance();
		
		$title = 		apply_filters('widget_title', $instance['title']);
		$text = 		$instance['text'];
		$purpose = 		$instance['purpose'];
		$reference = 	$instance['reference'];
		$amount = 		$instance['amount'];
		$button_text = 	$instance['button_text'];

		echo wp_kses_post($before_widget) . 
			'<div class="cmsms_paypal_donations_widget">' . "\n";
				if ($title) {
					echo wp_kses_post($before_title . $title . $after_title) . "\n";
				}
				
				
				if ($text) {
					echo wpautop($text) . "\n";
				}
				
				echo '<div class="cmsms_paypal_donations">' . "\n" . 
					$paypal_donations->generateHtml($purpose, $reference, $amount) . "\n" . 
					'<span class="button">' . ($button_text ? $button_text : 'Donate') . '</span>' . "\n" . 
				'</div>' . "\n" . 
			'</div>' . "\n" . 
		wp_kses_post($after_widget);
    }
	
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = 		strip_tags(stripslashes($new_instance['title']));
		$instance['text'] = 		$new_instance['text'];
		$instance['purpose'] = 		strip_tags(stripslashes($new_instance['purpose']));
		$instance['reference'] = 	strip_tags(stripslashes($new_instance['reference']));
		$instance['amount'] = 		strip_tags(stripslashes($new_instance['amount']));
		$instance['button_text'] = 	strip_tags(stripslashes($new_instance['button_text']));

		return $instance;
	}
	
    public function form($instance) {
		$defaults = array(
			'title' => 			__('Donate', 'cmsms_content_composer'),
			'text' => 			'',
			'purpose' => 		'',
			'reference' => 		'',
			'amount' => 		'',
			'button_text' => 	''
		);
		
		$instance = wp_parse_args((array) $instance, $defaults);

		$data = array(
			'instance' => 			$instance,
			'title_id' => 			$this->get_field_id('title'),
			'title_name' => 		$this->get_field_name('title'),
			'text_id' => 			$this->get_field_id('text'),
			'text_name' => 			$this->get_field_name('text'),
			'purpose_id' => 		$this->get_field_id('purpose'),
			'purpose_name' => 		$this->get_field_name('purpose'),
			'reference_id' => 		$this->get_field_id('reference'),
			'reference_name' => 	$this->get_field_name('reference'),
			'amount_id' => 			$this->get_field_id('amount'),
			'amount_name' => 		$this->get_field_name('amount'),
			'button_text_id' => 	$this->get_field_id('button_text'),
			'button_text_name' => 	$this->get_field_name('button_text')
		);
		
		($data) ? extract($data) : null;
		?>
		<p>
			<label for="<?php echo esc_attr($title_id); ?>"><?php esc_html_e('Title:', 'cmsms_content_composer'); ?> 
			<input class="widefat" id="<?php echo esc_attr($title_id); ?>" name="<?php echo esc_attr($title_name); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($text_id); ?>"><?php esc_html_e('Text:', 'cmsms_content_composer'); ?> 
			<textarea class="widefat" id="<?php echo esc_attr($text_id); ?>" name="<?php echo esc_attr($text_name); ?>"><?php echo esc_html($instance['text']); ?></textarea>
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($purpose_id); ?>"><?php esc_html_e('Purpose:', 'cmsms_content_composer'); ?> 
			<input class="widefat" id="<?php echo esc_attr($purpose_id); ?>" name="<?php echo esc_attr($purpose_name); ?>" type="text" value="<?php echo esc_attr($instance['purpose']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($reference_id); ?>"><?php esc_html_e('Reference:', 'cmsms_content_composer'); ?> 
			<input class="widefat" id="<?php echo esc_attr($reference_id); ?>" name="<?php echo esc_attr($reference_name); ?>" type="text" value="<?php echo esc_attr($instance['reference']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($amount_id); ?>"><?php esc_html_e('Amount:', 'cmsms_content_composer'); ?> 
			<input class="widefat" id="<?php echo esc_attr($amount_id); ?>" name="<?php echo esc_attr($amount_name); ?>" type="text" value="<?php echo esc_attr($instance['amount']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($button_text_id); ?>"><?php esc_html_e('Button Text:', 'cmsms_content_composer'); ?> 
			<input class="widefat" id="<?php echo esc_attr($button_text_id); ?>" name="<?php echo esc_attr($button_text_name); ?>" type="text" value="<?php echo esc_attr($instance['button_text']); ?>" />
			</label>
		</p>
		<?php 
	}
}


function cmsms_composer_wp_custom_widgets_init() {
	if (!is_blog_installed()) {
		return;
	}
	
	$cmsms_custom_widgets = array();
	
	$cmsms_custom_widgets = apply_filters('cmsms_custom_widgets_filter', $cmsms_custom_widgets);
	
	
	if (!empty($cmsms_custom_widgets)) {
		foreach ($cmsms_custom_widgets as $cmsms_custom_widget) {
			register_widget($cmsms_custom_widget);
		}
	}
}

add_action('widgets_init', 'cmsms_composer_wp_custom_widgets_init', 1);


function cmsms_composer_add_custom_widgets($widgets) {
	$widgets[] = 'WP_Widget_Custom_Advertisement';
	
	$widgets[] = 'WP_Widget_Custom_Divider';
	
	$widgets[] = 'WP_Widget_Custom_Facebook';
	
	$widgets[] = 'WP_Widget_Custom_Flickr';
	
	
	if (class_exists('PayPalDonations_Widget')) {
		$widgets[] = 'WP_Widget_Custom_PayPalDonations';
	}
	
	
	if (class_exists('PayPalDonations')) {
		unregister_widget('PayPalDonations_Widget');
	}
	
	
	if (version_compare(get_bloginfo('version'), '4.8', '<')) {
		$widgets[] = 'WP_Widget_Custom_Video';
		
		$widgets[] = 'WP_Widget_Custom_HTML5_Audio';
		
		$widgets[] = 'WP_Widget_Custom_HTML5_Video';
	}
	
	return $widgets;
}

add_filter('cmsms_custom_widgets_filter', 'cmsms_composer_add_custom_widgets');

