<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "wrapper" div and all content after.
 *
 * @package Neve
 * @since   1.0.0
 */

do_action( 'neve_before_primary_end' );
?>
</main>
<!--/.neve-main-->

<?php do_action( 'neve_after_primary' ); ?>
<?php
if ( apply_filters( 'neve_filter_toggle_content_parts', true, 'footer' ) === true ) {
  neve_before_footer_trigger();
  do_action( 'neve_do_footer' );
  neve_after_footer_trigger();
}
?>
</div>
<!--/.wrapper-->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php wp_footer(); ?>

</body>
</html>
