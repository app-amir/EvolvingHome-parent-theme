<?php 

if ( ! class_exists( 'EvolvingHome_Functionalities' ) ) {

    class EvolvingHome_Functionalities {
		
		public function __constructs() {

			$this->_hoooks();
		}

		private function _hooks() {

			add_action( 'init', array( $this, 'generate_custom_post_types' ) );
		}

		function generate_custom_post_types() {			

			$team_us_labels = array(
				'name'               => _x( 'Team', 'post type general name', 'EvolvingHome' ),
				'singular_name'      => _x( 'Team', 'post type singular name', 'EvolvingHome' ),
				'add_new'            => _x( 'Add New', 'post type Team item', 'EvolvingHome' ),
				'add_new_item'       => __( 'Add New Team', 'EvolvingHome' ),
				'edit_item'          => __( 'Edit', 'EvolvingHome' ),
				'search_items'       => __( 'Search', 'EvolvingHome' ),
				'not_found_in_trash' => __( 'Nothing found in Trash', 'EvolvingHome' ),
				'parent_item_colon'  => ''
			);

			$team_us_args = array(
				'labels'                => $team_us_labels,
				'public'                => true,
				'menu_position'         => 8,
				'query_var'             => true,
				'capability_type'       => 'post',
				'rewrite' 			    => array( 'slug' => 'our-team', 'with_front' => false ),
				'supports'              => array( 'title', 'thumbnail', 'revisions', 'editor', 'author' ),
				// 'has_archive'           => 'our-team',
				'has_archive'           => true,
			);

			register_post_type( 'eh-team' , $team_us_args );
		}

		private function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
			    self::$_instance = new self();
			}
			return self::$_instance;
		}

    }

}

function EvolvingHome_loader() {
	return EvolvingHome_Functionalities::instance();
}

EvolvingHome_loader();