<?php

echo "test5";

$m = new Memcached();
$m->setOption(Memcached::DYNAMIC_CLIENT_MODE, Memcached::DYNAMIC_CLIENT_MODE);
$m->addServer('test-gakushi.32ftn4.cfg.apne1.cache.amazonaws.com', 11211);


$m->set('int', 99);
$m->set('string', 'a simple string');
$m->set('array', array(11, 12));
/* expire 'object' key in 5 minutes */
$m->set('object', new stdclass, time() + 300);


var_dump($m->get('int'));
var_dump($m->get('string'));
var_dump($m->get('array'));
var_dump($m->get('object'));


echo "finish";

