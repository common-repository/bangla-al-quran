<?php
/*
Plugin Name: Bangla Quraner Bani
Plugin URI: http://studioarrival.com
Description: Random Al-Quran Sura
Author: Jabed Bhuiyan
Version: 2.5
Author URI: http://studioarrival.com/
*/
 
 
class BanglaAlQuranWidget extends WP_Widget
{
  function BanglaAlQuranWidget()
  {
    $widget_ops = array('classname' => 'BanglaAlQuranWidget', 'description' => 'Displays a random Al-Quran Sura' );
    $this->WP_Widget('BanglaAlQuranWidget', 'Bangla Al-Quran', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
//    echo "<h1>Bangla Al-Quran</h1>";



function get_data($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
$returned_content = get_data('http://studioarrival.com/widget/islamic/ramadan/plugin.php'); 
echo $returned_content;
    echo $after_widget;
  }
 
}
function bdalquran_handler() {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, 'http://studioarrival.com/widget/islamic/ramadan/plugin.php');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
//  echo $ch;
  return $data;
}
add_shortcode('bd-al-quran', 'bdalquran_handler');
add_action( 'widgets_init', create_function('', 'return register_widget("BanglaAlQuranWidget");') );

?>