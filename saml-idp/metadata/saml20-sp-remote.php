<?php

/**
 * SAML 2.0 remote SP metadata for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */

/*
 * Example SimpleSAMLphp SAML 2.0 SP
 */
$metadata['https://saml2sp.example.org'] = [
    'AssertionConsumerService' => 'https://saml2sp.example.org/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
    'SingleLogoutService' => 'https://saml2sp.example.org/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
];

/*
 * This example shows an example config that works with Google Workspace (G Suite / Google Apps) for education.
 * What is important is that you have an attribute in your IdP that maps to the local part of the email address at
 * Google Workspace. In example, if your Google account is foo.com, and you have a user that has an email john@foo.com, then you
 * must set the simplesaml.nameidattribute to be the name of an attribute that for this user has the value of 'john'.
 */
$metadata['google.com'] = [
    'AssertionConsumerService' => 'https://www.google.com/a/g.feide.no/acs',
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
    'simplesaml.nameidattribute' => 'uid',
    'simplesaml.attributes' => false,
];

$metadata['https://legacy.example.edu'] = [
    'AssertionConsumerService' => 'https://legacy.example.edu/saml/acs',
    /*
     * Currently, SimpleSAMLphp defaults to the SHA-256 hashing algorithm.
     * Uncomment the following option to use SHA-1 for signatures directed
     * at this specific service provider if it does not support SHA-256 yet.
     *
     * WARNING: SHA-1 is disallowed starting January the 1st, 2014.
     * Please refer to the following document for more information:
     * http://csrc.nist.gov/publications/nistpubs/800-131A/sp800-131A.pdf
     */
    //'signature.algorithm' => 'http://www.w3.org/2000/09/xmldsig#rsa-sha1',
];

$metadata['https://test.myhost.org/saml/module.php/saml/sp/metadata.php/mysql_idp-sp'] = [
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://test.myhost.org/saml/module.php/saml/sp/saml2-logout.php/mysql_idp-sp',
        ],
    ],
    'AssertionConsumerService' => [
        [
            'index' => 0,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://test.myhost.org/saml/module.php/saml/sp/saml2-acs.php/mysql_idp-sp',
        ],
        [
            'index' => 1,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
            'Location' => 'https://test.myhost.org/saml/module.php/saml/sp/saml1-acs.php/mysql_idp-sp',
        ],
        [
            'index' => 2,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
            'Location' => 'https://test.myhost.org/saml/module.php/saml/sp/saml2-acs.php/mysql_idp-sp',
        ],
        [
            'index' => 3,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
            'Location' => 'https://test.myhost.org/saml/module.php/saml/sp/saml1-acs.php/mysql_idp-sp/artifact',
        ],
    ],
    'contacts' => [
        [
            'emailAddress' => 'admin@myhost.org',
            'contactType' => 'technical',
            'givenName' => 'Administrator',
        ],
    ],
    'certData' => 'MIIFnDCCA4QCCQDkwqVmqkyUxzANBgkqhkiG9w0BAQsFADCBjzELMAkGA1UEBhMCVVMxETAPBgNVBAgMCE5ldyBZb3JrMREwDwYDVQQHDAhOZXcgWW9yazEQMA4GA1UECgwHVGhlIE9yZzEQMA4GA1UECwwHRGV2IE9wczEVMBMGA1UEAwwMKi5teWhvc3Qub3JnMR8wHQYJKoZIhvcNAQkBFhBhZG1pbkBteWhvc3Qub3JnMB4XDTIxMDUyMDE1MTMwMloXDTIyMDUyMDE1MTMwMlowgY8xCzAJBgNVBAYTAlVTMREwDwYDVQQIDAhOZXcgWW9yazERMA8GA1UEBwwITmV3IFlvcmsxEDAOBgNVBAoMB1RoZSBPcmcxEDAOBgNVBAsMB0RldiBPcHMxFTATBgNVBAMMDCoubXlob3N0Lm9yZzEfMB0GCSqGSIb3DQEJARYQYWRtaW5AbXlob3N0Lm9yZzCCAiIwDQYJKoZIhvcNAQEBBQADggIPADCCAgoCggIBAMqVGz+v0EKBVQVi7aImk0uUU1Gy0lWffT1fo1eakf9MYWzxwdytC/DCgCw1Ii/mQqWZos2v/b+83WzHHOAH+7xrvrt9+Fk5TMKyP5b6qgL1LNX6P6an/ETJlzC/HjC9fYU85U/R3B6gj6y1feJxC7eAZPQ56l5AAozZ3swfYelqA7NpZLAx1dq5B2wkJZLHkhysMgUlyAEQJ9jwr7Nu3pitL92t5yKon83A6AxBPPfrcsHnoybK1dawvLkl6yAa0+NCtoFIVK8XpO6PUp8LkvIl2ywbKt9OW+CSy1qorNwCws0eoF0BZU1VvqJkgwuxY4a3fQERHBGN2LnndzB2YDmY8ssCYxRiy/K3+YctLJzOcgH5WeCYLUpW23rM3oUHtP9q3YKyN6FWMTzSY+EmHLCUmIlIP2p8khPMAwVRJNNXls+RHkCMR9VhhaA3Y+I2xfkF3U1tzoJG5CIaGYg4I+qVxXLBqyTgiQzA8a0wORtovaPTS9h/ddrxe59qhO78A5rYgBrTWikxjs9WEv9YWfs3ATiDa74yNJ0FDRE0FSoLBiQBrQ1f8/XMFKkC4iFi2m/+96YGQf1lLctavyxEhDsqBBkaa8MtdQx/T3WGPTa8TFusX5NPc6LNdEwTnCvIVP1htIuTAi9Di/RMtmPurSbPJIrQhlsaidJg6Nty9Um1AgMBAAEwDQYJKoZIhvcNAQELBQADggIBAMRi48docKkXDNlx6YLr3WgBbTdys0w4tH+8+N2tDblW/Sm9pbbLGMVRHGTHv/jcnVDdp+VIN+2vV9hkFo5Ysewst/82Uq8OoKrno2JUnD3fk6Prk5bPplIv4Wjg1hopCfBbk0OLXrKGcE+saFmiftjKweQ/Fv+JA5eKsgeKgvvSppLuVU/Xb/C0sZVuNAbuiYeWg1Ul09cpndBXyX4q4ZR49xqzVNoOiDU90C3opMAmS3B0ycDrreevqfKv/5uYkbzLALLCi3BcoFg4sBsrISTepea8wCtZb4Zc00BqYYbqUXLuStiBAWRIlkWWShE9QAu1nQ9Lg8YrdT4OKDJoxrUqRBvgRBQLZBPDChqCox3olk3pqdS/xZnEjgZycb2EILVeU4CFRGM2uTd8yZwY8R8Oul6L/qzIDNeGjT36RYMmecZOmh7Elsm8QA7uYTe3WOYgmwSMy9oY7d5D6iMTlDG/4NvERP+gXXRx6IvsDMGo+B/Yfy0unTWtkPsWRSwJWlBu0OSo89GLxFSIZ9wX2vTbE6Ysa/tesVm0Kj9e0becKiLbAJAYOAN1xy95Cks0fGJze3YZl4wjqkdVSFVHz3ZH2GhC4JdPTOXA2zgiHzTZ8BBtpfwOFkbafj0IQMGPjpWX2k3TfT6OVBvYnaHxBIFi7uqQwiySOFLgyoVoUd6x',
];