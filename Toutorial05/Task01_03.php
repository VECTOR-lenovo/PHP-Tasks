<?php
$globalvar = "I am a global variable";

function testScope()
{
    echo $globalvar;
}

function testScopeWithGlobal()
{
    global $globalvar;
    echo $globalvar;
}

testScope();
testScopeWithGlobal();