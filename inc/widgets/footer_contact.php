<?php 

// register sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(
        array(
        'name' => 'Footer Right About Content',
        'id' => 'footer_right_about',
        'description' => 'Widget Area for Footer Quick Link 2column',
        'before_widget' => '    <div class="col-md-4"><div class="footer_widget padding_top_60 padding_bottom_60"><div class="footer_content">',
        'after_widget' => '</div></div></div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',

        )
    );

}
// Creating the widget 
class footer_about_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'footer_about_widget', 

// Widget name will appear in UI
__('WCL: Footer About Content', 'wclacrosse'), 

// Widget description
array( 'description' => __( 'Add footer Right About content is here', 'wclacrosse' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$f_content = apply_filters( 'widget_content', $instance['f_content'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];


$a = htmlentities($f_content);
echo $a;

echo $args['after_widget'];
}
        
// Widget Backend 
public function form( $instance ) {
  
if ( isset( $instance[ 'title' ] ) ){
    $title = $instance[ 'title' ];
}
else
{
    $title = __( 'General questions', 'wclacrosse' );
}

if ( isset( $instance[ 'f_content' ] )) {
    $f_content = $instance['f_content'];
}
else {
    $f_content = __( 'add content', 'wclacrosse' );
}
?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
  

<p>
    <label for="<?php echo $this->get_field_id('f_content'); ?>">
    Text:   <textarea class="widefat" rows="16" cols="16" id="<?php echo $this->get_field_id('f_content'); ?>" name="<?php echo $this->get_field_name('f_content'); ?>">
    <?php echo esc_attr($f_content); ?>
    
    </textarea></label>
</p>

<?php 
}
    
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['f_content'] = array();
$instance['f_content'] = ( ! empty( $new_instance['f_content'] ) ) ? strip_tags( $new_instance['f_content'] ) : '';
       
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function footer_about_load_widget() {
    register_widget( 'footer_about_widget' );
}
add_action( 'widgets_init', 'footer_about_load_widget' );






















