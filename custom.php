<?php

function display_recent_neatline_exhibits() {
	$html = '';
	// Get our recent Neatline exhibits, limited to five.
	$neatlineExhibits = get_records('NeatlineExhibit',array('recent', ' =$gt;', true), 5);

	// Set them for the loop
	set_loop_records('NeatlineExhibit',$neatlineExhibits);

	// If we have any to loop, we'll append to $html
	if (has_loop_records('NeatlineExhibit')) {
	//	$html .= "";

		foreach (loop('NeatlineExhibit') as $exhibit) {
			$html .= "<div>"
				.nl_getExhibitLink(
					$exhibit,
					'show',
					metadata($exhibit, 'title'),
					array('class', '=&gt;', 'neatline')
				  )
			 	 . "</div>";
					
			}
		
//			$html .= '&lt;/ul&gt;';

	}

	echo $html;

}

add_plugin_hook('public_home','display_recent_neatline_exhibits');

?>
