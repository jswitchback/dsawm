<?php

/*
 * Run this script from the drupal root...
 */

define( 'DRUPAL_ROOT', getcwd() );
include 'includes/bootstrap.inc';
drupal_bootstrap( DRUPAL_BOOTSTRAP_FULL );

/*
 * ...or paste the code below into an "Execute PHP code" field
 */

$file = fopen( 'resources.csv', 'r' );
while ( $row = fgetcsv( $file ) )
{
	list( $blank, $num, $name, $url, $phone, $description ) = $row;

	// Skip empty rows and the header
	if ( empty( $name ) || $name == 'Name' )
		continue;

	$node = new stdClass();
	$node->type = 'resource';
	$node->status = 1;
	$node->uid = 1;
	$node->title = $name;
	$node->field_resource_description['und'][] = array(
		'value' => $description,
		'format' => 'filtered_html',
	);
	$node->field_resource_link['und'][] = array(
		'url' => $url,
		'title' => $name,
	);
	$phone_numbers = parse_phone_numbers( $phone );
	foreach ( $phone_numbers as $phone_number )
	{
		$node->field_resource_phone['und'][] = array(
			'value' => $phone_number,
			'format' => 'plain_text',
		);
	}

	node_save( $node );
	print "$name [nid $node->nid]\n";
}

function parse_phone_numbers( $text )
{
	$phone_numbers = preg_split( '#\s*[,/]|or\s*#', $text );
	$phone_numbers = array_map( 'trim', $phone_numbers );

	return $phone_numbers;
}

