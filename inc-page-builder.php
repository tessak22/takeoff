<?php 
// loop over the ACF flexible fields for this page / post 
while ( the_flexible_field('page_builder') ) {
      
      // load the layout from the block folder  
	  get_template_part( 'blocks/'. get_row_layout() );

} ?>