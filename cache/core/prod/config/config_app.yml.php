<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2013/12/16 15:25:42
sfConfig::add(array(
  'app_swToolbox_cross_link_application' => array (
  'core' => 
  array (
    'enabled' => 'on',
    'load' => 
    array (
      'mgmt' => 
      array (
        'routes' => 
        array (
          0 => 'homepage',
        ),
        'env' => 
        array (
          'dev' => 'localhost/mgmt_dev.php',
          'prod' => 'localhost/index.php',
        ),
      ),
    ),
  ),
  'mgmt' => 
  array (
    'enabled' => 'on',
    'load' => 
    array (
      'core' => 
      array (
        'routes' => 
        array (
          0 => 'homepage',
        ),
        'env' => 
        array (
          'dev' => 'localhost/core_dev.php',
          'prod' => 'localhost/core.php',
        ),
      ),
    ),
  ),
),
));
