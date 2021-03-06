--TEST--
bug67436: E_STRICT instead of custom error handler
--FILE--
<?php

spl_autoload_register(function($classname) {
	if (in_array($classname, array('a','b','c'))) {
		require_once __DIR__ . "/{$classname}.inc";
	}
});

a::staticTest();

$b = new b();
$b->test();
--EXPECTF--
Warning: Declaration of b::test() should be compatible with a::test($arg = c::TESTCONSTANT) in %s%ebug67436%eb.inc on line %d
b::test()
a::test(c::TESTCONSTANT)
