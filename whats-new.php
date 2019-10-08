<?php

/* What's new in 7.4 */

// Typed Properties!

	// bool, float, array, object, iterable, self, parent
	// can be used static or vars

	public static int $id;
	private var string $name;

	// ?type = nullable
	public var ?bool $yesorno = null; 


// Array unpacking!
// (aka elipsis syntax)

	$pets = ['cat', 'dog', 'goldfish'];
	$animals = ['horse', 'cow', ...$pets, 'elephant'];
	var_dump($animals);

	// PHP < 7.3 returns a parse error


// Null Coalesce!
// (aka ??= )

	// old syntax: sets the var to default value if null
	$value = $value ?? 'default value';
	
	// now can be written as:
	$value ??= 'default value';


// Preloading!

	// set /etc/php/7.4/apache/php.ini directive:
	// opcache.preload = /var/www/webapp/file-to-preload.php

	// see https://wiki.php.net/rfc/preload for example
	// for each file, opcache_compile_file
	// may get 30%-50% performance esp for frameworks / providers

// WeakReference class!

	$object = new WhateverClass;
	$weakref = WeakReference::create($object);

	var_dump($weakref->get());
	unset($object);
	var_dump($weakRef->get());

	// first var_dump returns the object, second is NULL.
	// useful for referencing an object (which may be unset) obliquely


// Closures!
// (aka anonymous functions)

	// Example adapted from https://kinsta.com/blog/php-7-4/
	// I use pow() since it's faster
	// Great example with array map for iteration

	// Old syntax:
		function cube($n){
			return (pow($n, 3);
		}

		$a = [1, 2, 3, 4, 5];
		$b = array_map('cube', $a);
		print_r($b);

	// New syntax:

	$a = [1, 2, 3, 4, 5];
	$b = array_map(fn($n) => pow($n, 3), $a);
	print_r($b);		


	// Serialization!
	// This provides global functions versus Serializable::serialize()

	__serialize(): array;
	__unserialize(array $data): void;

// Change in + and . concatenation

	// Now, . has a lower precendence - arithmetic first, then string ops.

