<?php
/**
 * Created by index.php.
 * User: gakushi0130
 * Date: 13/04/11
 * Time: 1:58
 *
 */

echo "test3";

/**
 * Sample PHP code to show how to integrate with the Amazon ElastiCcache
 * Auto Discovery feature.
 */

/* Configuration endpoint to use to initialize memcached client. This is only an example. */
$server_endpoint = "test-gakushi.32ftn4.cfg.apne1.cache.amazonaws.com";
/* Port for connecting to the ElastiCache cluster. This is only an example */
$server_port = 11211;

/**
 * The following will initialize a Memcached client to utilize the Auto Discovery feature.
 *
 * By configuring the client with the Dynamic client mode with single endpoint, the
 * client will periodically use the configuration endpoint to retrieve the current cache
 * cluster configuration. This allows scaling the cache cluster up or down in number of nodes
 * without requiring any changes to the PHP application.
 */

$dynamic_client = new Memcached();
$dynamic_client->setOption(Memcached::OPT_CLIENT_MODE, Memcached::DYNAMIC_CLIENT_MODE);
$dynamic_client->addServer($server_endpoint, $server_port);
$dynamic_client->set('key', 'value', 60);  // Store the data for 60 seconds in the cluster, the client will decide which node to store

$var = $dynamic_client->get('key');

var_dump($var);


/**
 * Configuring the client with Static client mode disables the usage of Auto Discovery
 * and the client operates as it did before the introduction of Auto Discovery. The user
 * can then add a list of server endpoints.
 */

$static_client = new Memcached();
$static_client->setOption(Memcached::OPT_CLIENT_MODE, Memcached::STATIC_CLIENT_MODE);
$static_client->addServer($server_endpoint, $server_port);
$static_client->set('key', 'value');  // Store the data in the cluster without expiration