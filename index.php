<?php
/**
 * Created by index.php.
 * User: gakushi0130
 * Date: 13/04/11
 * Time: 1:58
 *
 */

echo "test2";

# set specific endpoint for auto discovery
$server_endpoint = "test-gakushi.32ftn4.cfg.apne1.cache.amazonaws.com";
$server_port = 11211;

# connect and store record
$stime = time();
$dynamic_client = new Memcached();
$dynamic_client->setOption(Memcached::OPT_CLIENT_MODE, Memcached::DYNAMIC_CLIENT_MODE);
$dynamic_client->addServer($server_endpoint, $server_port);
  $dynamic_client->set('key1', 'value', 600);
  $dynamic_client->set('key2', 'value', 600);
  $dynamic_client->set('key3', 'value', 600);
  $dynamic_client->set('key4', 'value', 600);
  $dynamic_client->set('key5', 'value', 600);
  $dynamic_client->set('key6', 'value', 600);
$ptime = time() - $stime;
echo $ptime;

# verify serverlist
$sl = $dynamic_client->getServerList();
print_r($sl);
