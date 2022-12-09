<?php
// Based on config/autoconfig.php
function getDbConfig() {
  if(getenv('SQLITE_DATABASE')) {
    return [
      'dbtype' => 'sqlite',
      'dbname' => getenv('SQLITE_DATABASE')
    ];
  }
  if (getenv('MYSQL_DATABASE') && getenv('MYSQL_USER') && getenv('MYSQL_PASSWORD') && getenv('MYSQL_HOST')) {
    return [
      'dbtype' => 'mysql',
      'dbname' => getenv('MYSQL_DATABASE'),
      'dbuser' => getenv('MYSQL_USER'),
      'dbpass' => getenv('MYSQL_PASSWORD'),
      'dbhost' => getenv('MYSQL_HOST'),
    ];
  }
  if (getenv('POSTGRES_DB') && getenv('POSTGRES_USER') && getenv('POSTGRES_PASSWORD') && getenv('POSTGRES_HOST')) {
    return [
      'dbtype' => 'pgsql',
      'dbname' => getenv('POSTGRES_DATABASE'),
      'dbuser' => getenv('POSTGRES_USER'),
      'dbpass' => getenv('POSTGRES_PASSWORD'),
      'dbhost' => getenv('POSTGRES_HOST'),
    ];
  }

  return [];
}

// Merge the base config and the db config together
$CONFIG = array_merge(getDbConfig(), [
  // Custom added env vars
  'installed' => getenv("NEXTCLOUD_INSTALLED") == "true",
  'overwriteprotocol' => getenv("OVERWRITEPROTOCOL") ?? "",
  'trusted_proxies' => explode(" ", getenv("TRUSTED_PROXIES")),
  'secret' => getenv("NEXTCLOUD_SECRET"),
  'instanceid' => getenv("NEXTCLOUD_INSTANCE_ID"),

  // Technically in official image but uses weird command line shenanigans in entrypoint
  'trusted_domains' => explode(" ", getenv("NEXTCLOUD_TRUSTED_DOMAINS")),

  // Don't check for htaccess as we aren't using Apache
  'check_for_working_htaccess' => false,
  // Don't want NextCloud messing with the config
  'config_is_read_only' => true,
  // Only update through newer docker images no web updater
  'upgrade.disable-web' => true,
]);
