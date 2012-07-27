Form Helper
============

A non standards compliant form helper for PHP for my own personal use.

Not clean or abstract, just simple dumb code that I can use.

Examples
=========

Near the top of the page / controler

	$fields = array(
		'goal_title' => array(
			'value' => '',
			'type' => 'text',
			'tag' => 'goal_title',
			'validate' => array('empty'),
			'desc' => "Sum up your goal in 5 words or less",
			'label' => "Goal Title"
		),$fields = array(
	    'goal_title' => array(
	        'value' => '',
	        'type' => 'text',
	        'tag' => 'goal_title',
	        'validate' => array('empty'),
	        'desc' => "Sum up your goal in 5 words or less",
	        'label' => "Goal Title"
	    )
	);

For validating form

	foreach($fields as $field) :
		if (isset($field['validate'])):
			$fields[$field['tag']]['value'] = validate($_POST[$field['tag']], $field['label'], $errors, $field['validate']);
		endif;
	endforeach;

Near body

	$custom_fields = get_post_custom($post_id);
	
	foreach($fields as $tag => $data) :
		$fields[$tag]['value'] = $custom_fields['wpcf-'. $tag][0];
	endforeach;
