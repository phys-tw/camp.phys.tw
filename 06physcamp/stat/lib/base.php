<?php
@define('STAT_BASE', dirname(__FILE__) . '/..');

define('T_DIR', STAT_BASE . '/templates');

require STAT_BASE . '/config/config.php';
require STAT_BASE . '/config/system.php';

@error_reporting($conf['debug_level']);
@set_time_limit($conf['max_exec_time']);

require STAT_BASE . '/lib/Function.php';
?>