<?php

if (!function_exists('createMenu')) {
	function createMenu(array $menus): string
	{
		$result = treeMenu($menus);
		return $result;
	}
}

function checkChild(array $menu): bool
{
	$result = false;

	if (!empty($menu['child'])) {
		$result = true;
	}

	return $result;
}

function treeMenu(array $treeMenu): string
{
	$result = '';

	foreach ($treeMenu as $menu) {
		$icon = ($menu['icon'] == '') ? 'fa-circle' : $menu['icon'];

		$result .= '<li class="nav-item">
		<a href="' . $menu['link'] . '" class="nav-link">
		<i class="nav-icon fas ' . $icon . '"></i>
		<p>' . $menu['title'];

		if (checkChild($menu)) {
			$result .= '<i class="fas fa-angle-left right"></i></p></a>';
			$result .= subMenu($menu['child']);
		} else {
			$result .= '</p></a>';
		}

		$result .= '</li>';
	}

	return $result;
}

function subMenu(array $childMenu): string
{
	$result = '<ul class="nav nav-treeview">';

	foreach ($childMenu as $menu) {
		$icon = ($menu['icon'] == '') ? 'fa-circle' : $menu['icon'];
		$result .= '<li class="nav-item">
		<a href="' . $menu['link'] . '" class="nav-link">
		<i class="nav-icon far ' . $icon . '"></i>
		<p>' . $menu['title'];

		if (checkChild($menu)) {
			$result .= '<i class="fas fa-angle-left right"></i></p></a>';
			$result .= subMenu($menu['child']);
		} else {
			$result .= '</p></a>';
		}

		$result .= '</li>';
	}
	$result .= '</ul>';

	return $result;
}
