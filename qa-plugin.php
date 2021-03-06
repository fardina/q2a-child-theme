<?php
/*
  Plugin Name: q2a child theme
  Plugin URI:https://github.com/fardina/q2a-child-theme
  Plugin Description: By using a child theme you will ensure that your modifications are preserved
  Plugin Version: 1.1
  Plugin Date: 2017-10-20
  Plugin Author: fardina
  Plugin Author URI: https://github.com/fardina
  Plugin License: GPLv3
  Plugin Minimum Question2Answer Version: 1.5
  Plugin Minimum PHP Version: 5.2
  Plugin Update Check URI: https://github.com/fardina/q2a-child-theme/blob/master/metadata.json
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
  header('Location: ../../');
  exit;
}
qa_register_plugin_layer(
  'child-theme-layer.php', // PHP file containing layer
  'child theme layer' // human-readable name of layer
);
qa_register_plugin_module(
  'module', // type of module
  'child-theme-admin-form.php', // PHP file containing module class
  'child_theme_admin_form', // module class name in that PHP file
  'child theme layer' // human-readable name of module
);
