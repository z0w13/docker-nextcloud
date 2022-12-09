<?php
$CONFIG = array (
  # Added by us
  'installed' => $_ENV["NEXTCLOUD_INSTALLED"] == "true",
  'overwriteprotocol' => $_ENV["OVERWRITEPROTOCOL"] ?? "",
  'trusted_proxies' => explode(" ", $_ENV["TRUSTED_PROXIES"]),
  'secret' => $_ENV["NEXTCLOUD_SECRET"],
  'instanceid' => $_ENV["NEXTCLOUD_INSTANCE_ID"],

  # Technically in official image but uses weird command line shenanigans in entrypoint
  'trusted_domains' => explode(" ", $_ENV["NEXTCLOUD_TRUSTED_DOMAINS"]),

  # Don't check for htaccess as we aren't using Apache
  'check_for_working_htaccess' => false,
  # Don't want NextCloud messing with the config
  'config_is_read_only' => true,
  # Only update through newer docker images no web updater
  'upgrade.disable-web' => true,
);
