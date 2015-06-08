<?php
/**
 * This file belongs to the YIT Plugin Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

$general_options = array(

	'general' => array(

		'section_general_settings'     => array(
			'name' => __( 'General settings', 'ywqa' ),
			'type' => 'title',
			'id'   => 'ywqa_section_general'
		),
		'ywqa_questions_to_show'       => array(
			'name'              => __( 'Questions to show', 'ywqa' ),
			'type'              => 'number',
			'desc'              => __( 'Set how many questions you want to show for each product (set 0 to display all).', 'ywqa' ),
			'id'                => 'ywqa_questions_to_show',
			'default'           => '0',
			'custom_attributes' => array(
				'min'      => 0,
				'step'     => 1,
				'required' => 'required'
			)
		),
		'ywqa_faq_mode'                => array(
			'name'    => __( 'FAQ mode', 'ywqa' ),
			'type'    => 'checkbox',
			'desc'    => __( 'Don\'t allow users to add questions and answers, but let them read in FAQ mode.', 'ywqa' ),
			'id'      => 'ywqa_faq_mode',
			'default' => 'no',
		),
		'section_general_settings_end' => array(
			'type' => 'sectionend',
			'id'   => 'ywqa_section_general_end'
		)
	)
);

if ( ! defined( 'YITH_YWQA_PREMIUM' ) && (! defined( 'YITH_YWQA_WAIT' ) ))  {
	$intro_tab                  = array(
		'section_general_settings_videobox' => array(
			'name'    => __( 'Upgrade to the PREMIUM VERSION', 'yit' ),
			'type'    => 'videobox',
			'default' => array(
				'plugin_name'               => __( 'YITH WooCommerce Questions and Answers', 'yit' ),
				'title_first_column'        => __( 'Discover Advanced Features', 'yit' ),
				'description_first_column'  => __( 'Upgrade to the PREMIUM VERSION of YITH WOOCOMMERCE QUESTIONS AND ANSWERS to benefit from all features!', 'yit' ),
				'video'                     => array(
					'video_id'          => '118913171',
					'video_image_url'   => YITH_YWQA_ASSETS_IMAGES_URL . 'yith-woocommerce-question-answer.jpg',
					'video_description' => __( 'See the YITH WooCommerce Questions and Answers plugin with full premium features in action', 'yit' ),
				),
				'title_second_column'       => __( 'Get Support and Pro Features', 'yit' ),
				'description_second_column' => __( 'By purchasing the premium version of the plugin, you will take advantage of the advanced features of the product and you will get one year of free updates and support through our platform available 24h/24.', 'yit' ),
				'button'                    => array(
					'href'  => YWQA_Plugin_FW_Loader::get_instance()->get_premium_landing_uri(),
					'title' => 'Get Support and Pro Features'
				)
			),
			'id'      => 'yith_wcas_general_videobox'
		)
	);
	$general_options['general'] = $intro_tab + $general_options['general'];
}

return $general_options;

