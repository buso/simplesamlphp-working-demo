A SimpleSAMLPHP working demo.  It has a working IdP, SP and a script authenticating against the SP.

hosts file entry.  edit via: sudo nano /etc/hosts

```
127.0.0.1 idp.myhost.org
127.0.0.1 test.myhost.org
```

vhosts configuration for Apache in: /Applications/MAMP/conf/apache/extra/httpd-ssl.conf

make sure you have generated the self-signed certificates, in this case: snakeoil.pem, snakeoil.key

```
<VirtualHost *:443>

#   General setup for the virtual host
DocumentRoot "/Applications/MAMP/htdocs/saml-test"
DirectoryIndex index.html index.php
ServerName "test.myhost.org"

#   SSL Engine Switch:
#   Enable/Disable SSL for this virtual host.
SSLEngine on

SSLCertificateFile "/Applications/MAMP/conf/apache/certs/snakeoil.pem"
SSLCertificateKeyFile "/Applications/MAMP/conf/apache/certs/snakeoil.key"


<Directory  "/Applications/MAMP/htdocs/saml-test">
  <IfModule mod_authz_core.c>
  # For Apache 2.4:
  Require all granted
  </IfModule>
</Directory>

Alias /saml "/Applications/MAMP/htdocs/saml-test/saml/www"
<Directory  "/Applications/MAMP/htdocs/saml-test/saml/www">
  <IfModule mod_authz_core.c>
  # For Apache 2.4:
  Require all granted
  </IfModule>
  Options Indexes FollowSymLinks
  AllowOverride all
</Directory>

</VirtualHost>


<VirtualHost *:443>

#   General setup for the virtual host
DocumentRoot "/Applications/MAMP/htdocs/saml-idp/www"
DirectoryIndex index.html index.php
ServerName "idp.myhost.org"

#   SSL Engine Switch:
#   Enable/Disable SSL for this virtual host.
SSLEngine on

SSLCertificateFile "/Applications/MAMP/conf/apache/certs/snakeoil.pem"
SSLCertificateKeyFile "/Applications/MAMP/conf/apache/certs/snakeoil.key"


<Directory  "/Applications/MAMP/htdocs/saml-idp/www">
  <IfModule mod_authz_core.c>
  # For Apache 2.4:
  Require all granted
  </IfModule>
</Directory>

</VirtualHost>
```

Configured Hosts

```
IdP: https://idp.myhost.org (admin password: somepass123)
SP: https://test.myhost.org/saml (admin password: somepass123)
Script to test the SP and IdP: https://test.myhost.org/test.php (user: exampleuser / password: secret)
```
This demo uses a MySQL for authentication purposes.  Use the included userdatabase.sql file to create the database/table with the necessary record to test.  The username and password for the MySQL database is: samluser/samluserpass.   Feel free to create your own user/password combination.
