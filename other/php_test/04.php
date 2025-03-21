<?php

/**
 * 新增方法
 *
 * @param [type] $val_1
 * @param [type] $val_2
 * @return void
 */
function add($val_1, $val_2) {
  $result = $val_1 + $val_2;
  return $result;
}

echo 'add(5, 10) 执行结果：'.add(5, 10);

include_once '03.php';
// include_once '03.php';

require '03.php'

?>
