<?php

$entity = elgg_extract('entity', $vars);

if (!elgg_instanceof($entity)) {
	return true;
}

$commenter = $entity->getOwnerEntity();
$object = $entity->getOriginalContainer();
$object_owner = $entity->getOwnerEntity();

$head = elgg_echo('hj:alive:thread:email:head', array(
	$commenter->name, $object_owner->name, $object->title
));

$body = "<blockquote>" . $entity->description . "</blockquote>";
$footer = elgg_echo('hj:alive:thread:email:footer', array(
	$entity->getURL()
));

echo elgg_view('output/longtext', array(
	'value' => elgg_view_module('message', $head, $body, array('footer' => $footer))
));
