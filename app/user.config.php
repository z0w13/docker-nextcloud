<?php
$CONFIG = array (
  'trusted_domains' => explode(",", $_ENV["NEXTCLOUD_TRUSTED_DOMAINS"]),
  'installed' => $_ENV["NEXTCLOUD_INSTALLED"] == "true",
  'overwriteprotocol' => $_ENV["NEXTCLOUD_OVERWRITE_PROTO"] ?? "",
  'trusted_proxies' => explode(",", $_ENV["NEXTCLOUD_TRUSTED_PROXIES"]),
  'secret' => $_ENV["NEXTCLOUD_SECRET"],

  'dbtype' => 'pgsql',
  'dbhost' => $_ENV["DATABASE_HOST"],
  'dbname' => $_ENV["DATABASE_NAME"],
  'dbuser' => $_ENV["DATABASE_USER"],
  'dbpassword' => $_ENV["DATABASE_PASSWORD"],

  'mail_domain' => $_ENV["MAIL_DOMAIN"],
  'mail_from_address' => $_ENV["MAIL_FROM"], // Without the domain
  'mail_smtphost' => $_ENV["MAIL_SMTP_HOST"],
  'mail_smtpport' => $_ENV["MAIL_SMTP_PORT"],
  'mail_smtpsecure' => $_ENV["MAIL_SMTP_SECURE"], // SSL or TLS
  'mail_smtpname' => $_ENV["MAIL_SMTP_USERNAME"],
  'mail_smtppassword' => $_ENV["MAIL_SMTP_PASSWORD"],
  'mail_smtpauth' => isset($_ENV["MAIL_SMTP_USERNAME"]),

  'check_for_working_htaccess' => false,
  'config_is_read_only' => true,
  'upgrade.disable-web' => true,

  'memcache.local' => '\\OC\\Memcache\\APCu',
  'apps_paths' =>
  array (
    0 =>
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 =>
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'instanceid' => 'ocraoe7dlzc4',
);
