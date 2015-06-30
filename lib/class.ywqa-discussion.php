<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct access forbidden.' );
}

if ( ! class_exists( 'YWQA_Discussion' ) ) {
	/**
	 *
	 * @class   class.ywqa-discussion.php
	 * @package    Yithemes
	 * @since      Version 1.0.0
	 * @author     Your Inspiration Themes
	 *
	 */
	class YWQA_Discussion {

		/**
		 * @var int Id of the question or answer
		 */
		public $ID;

		/**
		 * @var string the content of the question
		 */
		public $content = '';

		/**
		 * @var int the user who submitted the question
		 */
		public $author_id = 0;

		/**
		 * @var the date when the question was submitted
		 */
		public $date;

		/**
		 * @var int the product id related to current question
		 */
		public $product_id = 0;

		/**
		 * @var int id of the parent element(it's a product for the question element, it's a question element for the answer element)
		 */
		public $parent_id = 0;

		/**
		 * @var string discussion type, can be  "question", "answer"
		 */
		public $type = '';

		/**
		 * @var string status of the post
		 */
		public $status = 'publish';

		/**
		 * Create a new item
		 *
		 * @param null $args
		 */
		public function __construct( $args = null ) {

			if ( is_numeric( $args ) ) {
				$args = $this->get_array( $args );
			}

			if ( $args ) {
				foreach ( $args as $key => $value ) {
					$this->{$key} = $value;
				}
			}
		}

		/**
		 * Retrieve the discussion author name
		 */
		public function get_author_name() {
			if ( ! isset( $this->author_id ) ) {
				return '';
			}

			$user_info = get_userdata( $this->author_id );
			if ( $user_info ) {
				return $user_info->display_name;
			}

			return __( "Anonymous", "ywqa" );
		}

		/**
		 * retrieve discussion attribute from id
		 *
		 * @param $post_id discussion id
		 *
		 * @return array|null
		 */
		private function get_array( $post_id ) {
			$post = get_post( $post_id );

			if ( ! isset( $post ) ) {
				return null;
			}

			return array(
				"content"    => $post->post_title,
				"author_id"  => $post->post_author,
				"product_id" => get_post_meta( $post->ID, YWQA_METAKEY_PRODUCT_ID, true ),
				"ID"         => $post->ID,
				"parent_id"  => $post->post_parent,
				"date"       => $post->post_date
			);
		}

		/**
		 * Save the current question
		 */
		public function save() {

			$new_id = 0;

			// Create post object
			$args = array(
				'post_content' => '',
				'post_date'    => isset( $this->date ) ? $this->date : current_time( 'mysql', 0 ),
				'post_author'  => $this->author_id,
				'post_title'   => $this->content,
				'post_status'  => $this->status,
				'post_type'    => YWQA_CUSTOM_POST_TYPE_NAME,
				'post_parent'  => $this->parent_id,
			);

			if ( ! isset( $this->ID ) ) {
				// Insert the post into the database
				$new_id = wp_insert_post( $args );
			} else {
				$args["ID"] = $this->ID;
				$new_id     = wp_update_post( $args );
			}

			update_post_meta( $new_id, YWQA_METAKEY_PRODUCT_ID, $this->product_id );
			update_post_meta( $new_id, YWQA_METAKEY_DISCUSSION_TYPE, $this->type );

			return $new_id;
		}
	}
}