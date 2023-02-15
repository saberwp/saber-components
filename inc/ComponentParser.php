<?php

namespace SaberComponents;

class ComponentParser {

	public function populate($blueprint, $schema, $values) {

		foreach ($schema["properties"] as $key => $property) {
			if (array_key_exists($key, $values)) {
				$placeholder = "{{".$schema["title"].".".$key."}}";
				$blueprint = str_replace($placeholder, $values[$key], $blueprint);
			}
		}
		return $blueprint;
		
	}

}
