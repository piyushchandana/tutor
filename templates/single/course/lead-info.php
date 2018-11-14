<?php
/**
 * Template for displaying lead info
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 */


if ( ! defined( 'ABSPATH' ) )
	exit;

global $post;
?>

<div class="tutor-single-course-segment tutor-single-course-lead-info">
    <div class="tutor-leadinfo-top-meta">
        <span class="tutor-single-course-rating">
            <?php
            $course_rating = tutor_utils()->get_course_rating();
            tutor_utils()->star_rating_generator($course_rating->rating_avg);
            ?>

            <span class="tutor-single-rating-count">
                <?php
                echo $course_rating->rating_avg;
                echo '<i>('.$course_rating->rating_count.')</i>';
                ?>
            </span>
        </span>
    </div>

    <h1 class="tutor-course-header-h1"><?php the_title(); ?></h1>

    <div class="tutor-single-course-meta tutor-meta-top">
        <ul>
            <li class="tutor-single-course-author-meta">
                <div class="tutor-single-course-avatar">
					<?php echo tutor_utils()->get_tutor_avatar($post->post_author); ?>
                </div>
                <div class="tutor-single-course-author-name">
                    <strong><?php _e('by', 'tutor'); ?></strong>
                    <a href="<?php echo tutor_utils()->student_url($authordata->ID); ?>"><?php echo get_the_author(); ?></a>
                </div>
            </li>
            <li class="tutor-course-level">
                <strong><?php _e('Course level:', 'tutor'); ?></strong>
				<?php echo get_tutor_course_level(); ?>
            </li>
        </ul>

    </div>

    <div class="tutor-single-course-meta tutor-lead-meta">
        <ul>
			<?php
			$course_categories = get_tutor_course_categories();
            if(is_array($course_categories) && count($course_categories)){
				?>
                <li>
					<?php

                            ?>
                            <strong><?php esc_html_e('Categories', 'tutor') ?></strong>
                            <?php
                            foreach ($course_categories as $course_category){
                                $category_name = $course_category->name;
                                echo "<span>$category_name</span>";
                            }
					?>
                </li>
            <?php } ?>

			<?php
			$course_duration = get_tutor_course_duration_context();
			if(!empty($course_duration)){
				?>
                <li>
                    <strong><?php esc_html_e('Total Hour', 'tutor') ?></strong>
                    <span><?php echo $course_duration; ?></span>
                </li>
			<?php } ?>
            <li>
                <strong><?php esc_html_e('Total Enrolled', 'tutor') ?></strong>
                <span>
                    <?php
                    $total_students = tutor_utils()->get_total_students() ? tutor_utils()->get_total_students() : 0;
                    echo $total_students;
                    ?>
                </span>
            </li>
            <li>
                <strong><?php esc_html_e('Last Update', 'tutor') ?></strong>
				<?php echo esc_html(get_the_modified_date()); ?>
            </li>
        </ul>
    </div>

	<?php
	$excerpt = tutor_get_the_excerpt();

	if (! empty($excerpt)){
		?>
        <div class="tutor-course-summery">
            <h3  class="tutor-segment-title"><?php esc_html_e('About Course', 'tutor') ?></h3>
			<?php echo $excerpt; ?>
        </div>
		<?php
	}
	?>
</div>