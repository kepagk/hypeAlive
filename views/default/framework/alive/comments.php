<?php

/**
 *  Display the comments bar with all comments and likes
 *
 *  @uses $vars['entity'] Entity that is being commented on
 */

$entity = elgg_extract('entity', $vars, false);

if (elgg_instanceof($entity, 'object', 'hjcomment')) {
	echo elgg_view('framework/alive/replies', $vars);
	return;
} else if (elgg_instanceof($entity, 'object', 'groupforumtopic')) {
	echo elgg_view('framework/alive/discussions', $vars);
	return;
}
if (!$entity) {
	return true;
}

$params = hj_alive_prepare_view_params($entity);
$params = array_merge($vars, $params);

$menu = elgg_view_menu('interactions', array(
	'entity' => $params['entity'],
	'class' => 'elgg-menu-hz elgg-menu-comments',
	'sort_by' => 'priority',
	'params' => $params
		));

$comments = elgg_view('framework/alive/comments/comments', $params);
$likes = elgg_view('framework/alive/likes/wrapper', $params);

$params['menu'] = $menu;
$params['comments'] = $comments;
$params['likes'] = $likes;

echo elgg_view('framework/alive/comments/wrapper', $params);
