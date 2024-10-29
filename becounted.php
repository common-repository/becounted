<?php
/*
Plugin Name: beCounted
Plugin URI: http://www.beautomated.com/becounted/
Description: A plugin to create a multi-item count-up widget in WordPress.
Version: 1.1
Author: beAutomated
Author URI: http://www.beautomated.com/
License: GPLv2
*/

// WP Hooks
add_action('widgets_init', array('becounted', 'register'));
add_action('init', array('becounted', 'printjs'));
add_action('wp_print_footer_scripts', array('becounted', 'loadjs'));

// Widget Class
class becounted extends WP_Widget {
	static $enqueue = false;
	static $defaults = array(
		'page' => '',
		'title' => 'beCounted',
		'stats' => "23,199,336 Centaurs\n1,501,799 Dragons\n301,275,455 Gorgons\n49,877,536,490 Mermaids\n2,676,365,000 Minotaurs\n402,611,664 Pegasuses\n5,018,470 Unicorns\n1,375,940,758 Vampires\n564,785,251 Werewolves\n635,382,008 Zombies",
		'footer' => "Number of mythological creatures created since you opened this webpage.\n\nBased on fictitious 2011 statistics gleaned solely from the minds of the <a href=\"http://www.beautomated.com/team/\">WordPress plugin developers at beAutomated</a>.",
		'filter' => 1,
		'width' => '170px',
		'background-color' => '#000000',
		'color' => '#ffffff',
		'font-size' => '1em',
		'padding' => '4px 0 4px 10px',
		'margin' => '0 0 10px 0'
	);

	// Register
	static function register() { register_widget('becounted'); }

	// Widget Instance
	function __construct() {
		$widget_ops = array(
			'classname' => 'becounted',
			'description' => 'A plugin to create a multi-item count-up widget in WordPress.'
		);
		$control_ops = array('width' => 400);
		parent::__construct('becounted', 'beCounted', $widget_ops, $control_ops);
	}

	// Load JavaScript only if Widget is Enabled and Present
	static function loadjs() {
		if (!self::$enqueue || !is_active_widget('', '', 'becounted') || is_admin()) { return; }
		wp_enqueue_script('becounted', site_url() . '?becountedjs=1', array(), false, true);
		wp_print_scripts('becounted');
	}

	// Settings Form
	function form($instance) {
		$instance = wp_parse_args((array) $instance, self::$defaults);
		$page = $instance['page'];
		$title = $instance['title'];
		$stats = $instance['stats'];
		$footer = $instance['footer'];
		$filter = $instance['filter'];
		$width = $instance['width'];
		$backgroundcolor = $instance['background-color'];
		$color = $instance['color'];
		$fontsize = $instance['font-size'];
		$padding = $instance['padding'];
		$margin = $instance['margin'];
?>
		<p>
			<label for="<?php echo $this->get_field_name('title'); ?>-title"><?php echo __('Title'); ?></label>
			<input id="<?php echo $this->get_field_name('title'); ?>-title" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('stats'); ?>"><?php echo __('Occurences per Year (one per line)'); ?></label><br /><small><em>best between 10,000 and 1,000,000,000,000</em></small>
			<textarea class="widefat" cols="20" rows="8" id="<?php echo $this->get_field_name('stats'); ?>" name="<?php echo $this->get_field_name('stats'); ?>"><?php echo esc_attr($stats); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('footer'); ?>"><?php echo __('Credit Text'); ?></label>
			<textarea class="widefat" cols="20" rows="8" id="<?php echo $this->get_field_name('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>"><?php echo esc_attr($footer); ?></textarea><br />
			<input type="checkbox" id="<?php echo $this->get_field_name('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" value="1" <?php checked($filter, 1); ?> />
			<label for="<?php echo $this->get_field_name('filter'); ?>"><?php echo __('Automatically add paragraphs'); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('footer'); ?>"><?php echo __('Limit to Page'); ?></label>
			<?php wp_dropdown_pages("name={$this->get_field_name('page')}&show_option_none=".__('- Show Everywhere -')."&selected=" . esc_attr($page)); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('width'); ?>"><?php echo __('Counter Width'); ?></label><br />
			<small>default: <em><?php echo self::$defaults['width']; ?></em></small>
			<input id="<?php echo $this->get_field_name('width'); ?>" class="widefat" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo esc_attr($width); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('background-color'); ?>"><?php echo __('Counter Background Color'); ?></label><br />
			<small>default: <em><?php echo self::$defaults['background-color']; ?></em></small>
			<input id="<?php echo $this->get_field_name('background-color'); ?>" class="widefat" name="<?php echo $this->get_field_name('background-color'); ?>" type="text" value="<?php echo esc_attr($backgroundcolor); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('color'); ?>"><?php echo __('Counter Font Color'); ?></label><br />
			<small>default: <em><?php echo self::$defaults['color']; ?></em></small>
			<input id="<?php echo $this->get_field_name('color'); ?>" class="widefat" name="<?php echo $this->get_field_name('color'); ?>" type="text" value="<?php echo esc_attr($color); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('font-size'); ?>"><?php echo __('Counter Font Size'); ?></label><br />
			<small>default: <em><?php echo self::$defaults['font-size']; ?></em></small>
			<input id="<?php echo $this->get_field_name('font-size'); ?>" class="widefat" name="<?php echo $this->get_field_name('font-size'); ?>" type="text" value="<?php echo esc_attr($fontsize); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('padding'); ?>"><?php echo __('Counter Inner Padding'); ?></label><br />
			<small>format: <em>top right bottom left</em><br />default: <em><?php echo self::$defaults['padding']; ?></em></small>
			<input id="<?php echo $this->get_field_name('padding'); ?>" class="widefat" name="<?php echo $this->get_field_name('padding'); ?>" type="text" value="<?php echo esc_attr($padding); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('margin'); ?>"><?php echo __('Counter Outer Margin'); ?></label><br />
			<small>format: <em>top right bottom left</em><br />default: <em><?php echo self::$defaults['margin']; ?></em></small>
			<input id="<?php echo $this->get_field_name('margin'); ?>" class="widefat" name="<?php echo $this->get_field_name('margin'); ?>"  type="text" value="<?php echo esc_attr($margin); ?>" />
		</p>
<?php
	}

	// Save Settings
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['page'] = sanitize_text_field($new_instance['page']);
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['stats'] = wp_strip_all_tags($new_instance['stats']);
		$instance['footer'] = wp_kses_data($new_instance['footer']);
		$instance['filter'] = intval($new_instance['filter']);
		$instance['width'] = sanitize_text_field($new_instance['width']);
		$instance['background-color'] = sanitize_text_field($new_instance['background-color']);
		$instance['color'] = sanitize_text_field($new_instance['color']);
		$instance['font-size'] = sanitize_text_field($new_instance['font-size']);
		$instance['padding'] = sanitize_text_field($new_instance['padding']);
		$instance['margin'] = sanitize_text_field($new_instance['margin']);
		return $instance;
	}

	// Display Widget
	function widget($args, $instance) {
		global $post;
		extract($args);
		if ($instance['page'] && $instance['page'] != $post->ID) { return false; }
		self::$enqueue = true;
		echo $before_widget;
		$title = apply_filters('widget_title', $instance['title']);
		if (!empty($title)) {
			echo "{$before_title}{$title}{$after_title}";
		}
		$styles = "width:{$instance['width']};background-color:{$instance['background-color']};"
			. "color:{$instance['color']};font-size:{$instance['font-size']};"
			. "padding:{$instance['padding']};margin:{$instance['margin']};";
		$items = '';
		$i = 0;
		foreach (explode("\n", $instance['stats']) as $stat) {

			// Skip any items that don't lead with numeric values and contain labels
			if (!$num = self::extract_number($stat)) { continue; }
			$items .= "	<div id=\"{$widget_id}-" . $i++ . '">&nbsp;</div>';
		}
		$instance['footer'] = ($instance['filter'] == 1) ? wpautop($instance['footer']) : $instance['footer'];
		echo "<div id=\"{$widget_id}\" style=\"{$styles}\">{$items}</div>{$instance['footer']}{$after_widget}";
	}

	// Output JavaScript
	static function printjs() {
		if (!array_key_exists('becountedjs', $_GET) || $_GET['becountedjs'] != 1) { return; }
		$instances = get_option('widget_becounted');
echo
"// Common Functions
var seconds_per_year = 365.256366 * 24 * 60 * 60;
var items_per_year = new Array();
var seconds_elapsed = new Array();
function runbecounted(counter) {
for (var i = 0; i < items_per_year[counter].length; i++) {
var current = items_per_year[counter][i][1] / seconds_per_year * seconds_elapsed[counter];
document.getElementById('becounted-' + counter + '-' + i).innerHTML
= add_commas('' + Math.floor(current)) + ' ' + items_per_year[counter][i][0];
}
seconds_elapsed[counter] += 0.25;
setTimeout('runbecounted(' + counter + ');', 250);
}
function add_commas(sValue) {
var sRegExp = new RegExp('(-?[0-9]+)([0-9]{3})');
while (sRegExp.test(sValue)) { sValue = sValue.replace(sRegExp, '$1,$2'); }
return sValue;
}
";
		foreach ($instances as $i => $instance) {
			if (!$instance || $instance == 1) { continue; }
			$items = '';
			foreach (explode("\n", $instance['stats']) as $stat) {

				// Skip any items that don't lead with numeric values
				if (!$num = self::extract_number($stat)) { continue; }
				$stat = explode(' ', $stat);
				array_shift($stat);
				$stat = addcslashes(trim(implode(' ', $stat)), "'");
				$items .= "new Array('{$stat}', {$num}),\n";
			}
			$items = substr($items, 0, strlen($items) - 2);
			echo "
// Start Counter #{$i}
items_per_year.push({$i});
items_per_year[{$i}] = new Array(
{$items}
);
seconds_elapsed.push({$i});
seconds_elapsed[{$i}] = 0;
if (document.getElementById('becounted-{$i}')) { runbecounted({$i}); }
";
		}
		exit;
	}

	// Formatting Utility
	static function extract_number($str) {
		$str = explode(' ', $str);
		$num = preg_replace("/[^0-9]/", '', array_shift($str));
		return is_numeric($num) ? $num : false;
	}
}

?>
