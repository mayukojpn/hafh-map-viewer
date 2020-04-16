<?php
$url = "http://api.hafh.com/properties";
$source = file_get_contents($url);
$source = json_decode($source,true);
$output = [];

foreach ( $source as $source_item ):

	$output_item['id'  ] = (int)$source_item['id'];
	$output_item['name'] = $source_item['property_name']['ja'];
	$output_item['img' ] = $source_item['property_images'][0]['image_url'];
	$output_item['lat' ] = (float)$source_item['latitude'];
	$output_item['lng' ] = (float)$source_item['longitude'];

	$output[] = $output_item;

endforeach;

return file_put_contents( 'api/properties.json', json_encode($output) );
