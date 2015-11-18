<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/9/24
 * Time: 下午9:36
 */

function writeMsg()
{
    echo "Hello world!<br>";
}

writeMsg(); // 调用函数

function familyName($fname)
{
    echo "$fname Zhang.<br>";
}

familyName("Li");
familyName("Hong");
familyName("Tao");
familyName("Xiao Mei");
familyName("Jian");

function testdef($value = 50)
{
    echo "Your age is $value years old.<br>";
}

testdef(13);
testdef();
testdef(100);

function add($x, $y)
{
    return $x + $y;
}

echo add(1, 2);

?>