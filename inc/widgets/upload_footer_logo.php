<?php
// register sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(
        array(
        'name' => 'Footer Logo Sidebar',
        'id' => 'footer-logo-sidebar',
        'description' => 'Widget Area for Footer Logo',
        'before_widget' => '<div class="col-md-3"><div class="footer_widget padding_top_60 padding_bottom_60"><div id="one" class="two">',
        'after_widget' => '</div></div></div>',
        )
    );
}
                         

// register widget
add_action('widgets_init', 'Register_footer_logo_widget_fun');
function Register_footer_logo_widget_fun() {
    register_widget( 'footer_logo_widget' );
}

// add admin scripts
add_action('admin_enqueue_scripts', 'footer_logo_wpscript');
function footer_logo_wpscript() {
    wp_enqueue_media();
    wp_enqueue_script('uploader-widget', get_template_directory_uri() . '/js/uploader-widget.js', false, '1.0', true);
}

// widget class
class footer_logo_widget extends WP_Widget {

    function footer_logo_widget() {
        $widget_ops = array('classname' => 'wcl_footer_logo');
        $this->WP_Widget('wcl_footer_logo_widget', 'WCL: Footer Logo', $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;
?>

    <!--<h1>--><?php //echo apply_filters('widget_title', $instance['text'] ); ?><!--</h1>-->
    <a href="#">

        <div class="footer_logo">
            <img src="<?php echo esc_url($instance['image_uri']); ?>" class="img-responsive">
        </div>
                            
    </a>

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['text'] = strip_tags( $new_instance['text'] );
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        return $instance;
    }

    function form($instance) {
?>

    <p>
        <label for="<?php echo $this->get_field_id('text'); ?>">Text</label><br />
        <input type="text" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $instance['text']; ?>" class="widefat" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />

        <?php
            if ( $instance['image_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>

        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;">

        <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
    </p>

<?php
    }
}
?>