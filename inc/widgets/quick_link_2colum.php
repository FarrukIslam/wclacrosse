<?php

// register sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(
        array(
        'name' => 'Footer Quick Link column 2',
        'id' => 'footer_quick_link_colum_2',
        'description' => 'Widget Area for Footer Quick Link 2column',
        'before_widget' => '<div class="col-md-2"><div class="footer_widget padding_top_60 padding_bottom_60">',
        'after_widget' => '</div></div>',
        'before_title'  => '',
		'after_title'   => '',

        )
    );

}
                         
	class wclacrosse_quick_links_col2 extends WP_Widget
	{
	/**
	 * quick_links constructor.
	 */
	public function __construct()
	{
		parent::__construct(false, $name = "WCL: Quick Links col-2", array("description" => "Footer Quick Links col-md-2 width will be here."));
	}

	/**
	 * @see WP_Widget::widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget($args, $instance)
	{
		// render widget in frontend
		$title = apply_filters( 'widget_title', $instance['title'] );
		$quick_title = apply_filters( 'widget_quick_title', $instance['quick_title']);
		$urls = apply_filters( 'widget_url', $instance['urls'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		//if ( ! empty( $title ) )
		//echo $args['before_title'] . $title . $args['after_title'];
		
		echo '<ul class="quick_links footer_list">';
				foreach ($urls as $key => $value){
					if($value) {
						echo '<li><a href="'.$value.'">'.$quick_title[$key].'</a></li>';
					}
				}
		echo '</ul>';
			 
		echo $args['after_widget'];
	}


	/**
	 * @see WP_Widget::update
	 *
	 * @param array $newInstance
	 * @param array $oldInstance
	 *
	 * @return array
	 */
	public function update($newInstance, $oldInstance)
	{
		$instance = $oldInstance;
		$instance['title'] = ( ! empty( $newInstance['title'] ) ) ? strip_tags( $newInstance['title'] ) : '';
		$instance['quick_title'] = array();
		$instance['urls'] = array();

		if (isset($newInstance['quick_title'])) {
			foreach ($newInstance['quick_title'] as $key => $value) {
				if (trim($value)) {
					$instance['quick_title'][$key] = $value;
					$instance['urls'][$key] = $newInstance['urls'][$key];
				}
			}
		}

		return $instance;
	}
	
	/**
	 * @see WP_Widget::form
	 *
	 * @param array $instance
	 */
	public function form($instance)
	{
		if ( isset( $instance[ 'title' ] ) )
		{
			$title = $instance[ 'title' ];
		}
		else
		{
			$title = __( 'Quick Links', 'quick_links' );
		}
		$quick_title = isset($instance['quick_title']) ? $instance['quick_title'] : array();
		$urls = isset($instance['urls']) ? $instance['urls'] : array();
		$quick_title[] = '';
		$form = '';
?>	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
<?php		
		echo '<div class="quick_links_wrap"><label>Quick Links & Title:</label>';
			foreach ($quick_title as $idx => $value) {
				$quick_link_title = isset($quick_title[$idx]) ? $quick_title[$idx] : '';
				$url = isset($urls[$idx]) ? $urls[$idx] : '';
				$form .= '<div class="quick_form"><p>'
					. sprintf(
						'<input type="text" name="%1$s[%2$s]" value="%3$s" class="widefat" placeholder="Quick Link Title">',
						$this->get_field_name('quick_title'),
						$idx,
						esc_attr($quick_link_title))
					. '</p>'
					. '<p>'
					. sprintf(
						'<input type="text" name="%1$s[%2$s]" value="%3$s" class="widefat" placeholder="Quick Link Url">',
						$this->get_field_name('urls'),
						$idx,
						esc_attr($url))
					. '</p><input type="button" class="removebtn" value="&#xf335;" id="b_remove"/></div>';
			}
		echo $form;
			
		echo '</div>';
	}
}

add_action('widgets_init', create_function('', 'return register_widget("wclacrosse_quick_links_col2");'));

// Custom css
function quick_links_col_2_custom_css() {
    echo '<style type="text/css">
			.quick_links_wrap {
				text-align: left;
				width: 100%;
			}
			.quick_links_wrap label {
				font-weight: normal;
				display: block;
				padding: 10px 0;
			}
			.quick_form {
				overflow: hidden;
			}
			.quick_links_wrap .quick_form p {
				float: left;
				width: 44.3%;
				    margin-top: 0;
			}
			.quick_links_wrap .quick_form p:first-child {
				padding-right: 5px;
			}
			.add_more {
				text-align: right;
				padding: 5px 5px 10px;
			}
			.quick_form #b_remove {
				font-family: dashicons;
				padding: 0px 2px;
				background: transparent;
				border: 0;
				font-size: 18px;
				color: #ddd;
				cursor: pointer;
				-webkit-transition: all 0.3s;
				-moz-transition: all 0.3s;
				-o-transition: all 0.3s;
				transition: all 0.3s;
			}
			.quick_form #b_remove:hover {
				color: #252525;
			}
			.add_more #b_remove:focus {
				outline: 0;
			}

		</style>';
}
add_action('admin_head', 'quick_links_col_2_custom_css');

// Custom js
function quick_links_2_custom_js() {
    echo '<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(function () {
				var counter = 0;
				jQuery(".removebtn").live("click",function () {
					jQuery(this).parent().remove();   
				});
			});
			});
		</script>';
}
add_action('admin_head', 'quick_links_2_custom_js');