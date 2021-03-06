<?php

$entity = elgg_extract('entity', $vars);

if (!elgg_instanceof($entity, 'object', 'hjcomment')) {
	echo elgg_view('framework/alive/notifications/comment', $vars);
	return true;
}

$commenter = $entity->getOwnerEntity();
$object = $entity->getOriginalContainer();
$object_owner = $object->getOwnerEntity();

$head = elgg_echo('hj:alive:reply:email:head', array(
	$commenter->name, $object_owner->name, $object->title
));

$body = "<blockquote>" . $entity->description . "</blockquote>";

$footer = elgg_echo('hj:alive:reply:email:footer', array(
	$entity->getURL()
));

echo elgg_view('output/longtext', array(
	'value' => elgg_view_module('message', $head, $body, array('footer' => $footer))
));
