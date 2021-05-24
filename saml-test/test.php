<xmp>
<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

echo "Testing SAML Service Provider sp.myhost.org via Identity Provider idp.myhost.org\n\n";

echo "phpversion: " . phpversion() . "\n\n";

# We start off with loading a file which registers the SimpleSAMLPHP classes with the autoloader.
require_once('/Applications/MAMP/htdocs/saml-test/saml/lib/_autoload.php');

# We select our authentication source
$as = new \SimpleSAML\Auth\Simple('mysql_idp-sp');

# We then require authentication:
$as->requireAuth([
	'ReturnTo' => 'https://test.myhost.org/test.php',
	'KeepPost' => true
]);

# And print the attributes once authenticated

$attributes = $as->getAttributes();
echo "\n\nAttributes:\n\n";
print_r($attributes);

# get the logout URL
$logouturl = $as->getLogOutURL();

echo "</xmp>";
echo "\n\nlogouturl: $logouturl\n\n";
echo "<p><a href=\"$logouturl\">Logout</a></p>";

?>