--TEST--
Decimal128: Scientific - Large
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400000000000A5BC138938D44C64D31FE5F00');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "1.000000000000000000000000000000000E+6144"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toCanonicalExtendedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400000000000a5bc138938d44c64d31fe5f00
{"d":{"$numberDecimal":"1.000000000000000000000000000000000E+6144"}}
18000000136400000000000a5bc138938d44c64d31fe5f00
===DONE===