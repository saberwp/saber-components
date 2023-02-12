<?php

namespace SaberComponents;

class ComponentPostType extends \AcfEngine\Core\PostType\PostType {

	public function key() {
		return 'component';
	}

	public function nameSingular() {
		return 'Component';
	}

}
