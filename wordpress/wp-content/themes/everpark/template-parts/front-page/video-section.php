<div id="video-section-container" class="container-fluid bg-success m-0 p-0">
	<div id="video-section-row" class="row p-7">

		<div id="video-section-column" class="col-12 d-flex justify-content-center align-items-center text-center p-7">
			<div id="video-container" class="ratio ratio-16x9" style="max-height:626px; max-width:939px;">
				<?php
					$video_link = get_theme_mod( 'video_link', '' );
					if ( $video_link ) {
						echo '<iframe src="' . esc_url( $video_link ) . '" allowfullscreen title="EverPark Video"></iframe>';
					}
				?>
			</div> <!-- End of #video-container -->
		</div> <!-- End of #video-section-column -->

	</div> <!-- End of #video-section-row -->
</div> <!-- End of #video-section-container -->