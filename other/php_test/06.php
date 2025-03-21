<?php

// https://learnku.com/php/wikis/27088

$var = '这是一个全局变量';

function foo()
{

    // 函数内部无法访问函数外部,如果想要访问, 请使用 global 关键词
    global $var;

    echo "使用关键词 global 输出 \$var 的值为：$var";

}

function foo2()
{
    // 函数内部无法访问函数外部,如果想要访问, 请使用超全局变量 $GLOBALS
    echo "使用超全局变量 \$GLOBALS 输出 \$var 的值为：{$GLOBALS['var']}";
    echo "使用超全局变量 \$GLOBALS 输出 \$var 的值为：".$GLOBALS['var'];

}

foo();

echo '<br>';

foo2();

?>

<?php
// https://learnku.com/php/wikis/27088
function bar()
{

    $var = 0;

    $var++;

    return $var;

}

echo '函数 bar 第一次的输出结果：' . bar() . '<br>';

echo '函数 bar 第二次的输出结果：' . bar() . '<br>';

function foo3()
{

    // 静态变量在函数调用结束后不会被销毁，下次调用时仍然保留上次的值（缓存）
    static $var = 0;

    $var++;

    return $var;

}

echo '函数 foo3 第一次的输出结果：' . foo3() . '<br>';

echo '函数 foo3 第二次的输出结果：' . foo3();

?>
