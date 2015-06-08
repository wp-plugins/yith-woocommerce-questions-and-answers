<?php
/**
 * Advanced Review  Template
 *
 * @author        Yithemes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$ywqa = YITH_WooCommerce_Question_Answer::get_instance();
?>

<?php //todo    apply_filters( 'yith_question_answer_before_review', $question ); ?>
<li id="li-question-<?php echo $question->ID; ?>" class="question-container <?php echo $classes; ?>">
	<div class="question-votes">
	</div>

	<div class="question-text <?php echo $classes; ?>">
		<div class="question-content">
			<span class="question-symbol"><?php echo "Q"; ?></span>
			<span class="question"><a
					href="<?php echo add_query_arg( "reply-to-question", $question->ID, remove_query_arg( "show-all-questions" ) ); ?>"><?php echo $question->content; ?></a></span>
		</div>

		<div class="answer-content">
			<?php
			$first_answer = $question->get_answers( 1 );
			if ( isset( $first_answer[0] ) ):
				if ( ! $ywqa->faq_mode && current_user_can( 'manage_options' ) ) {
					echo '<span class="admin-answer-symbol">' . __( "Answered by the admin", "ywqa" ) . '</span>';
				} else {
					echo '<span class="answer-symbol">' . __( "A", "ywqa" ) . '</span>';
				}
				?>

				<span class="answer">
						<?php
						if ( $first_answer = $question->get_answers( 1 ) ) {
							if ( isset( $first_answer[0] ) ) {
								echo $first_answer[0]->content;
							}
						}

						?>
				</span>
			<?php else: ?>
				<span class="answer"><?php _e( "There are no answers for this question yet.", "ywqa" ); ?></span>
			<?php endif; ?>
		</div>

		<?php if ( ( $count = $question->has_answers() ) > 1 ) : ?>
			<div class="all-answers-section">
				<a href="<?php echo add_query_arg( "reply-to-question", $question->ID, remove_query_arg( "show-all-questions" ) ); ?>"
				   id="all-answers-<?php echo $question->ID; ?>" class="all-answers">
					<?php echo sprintf( __( "Show all %s answers", "ywqa" ), $count ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</li>