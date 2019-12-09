<?php
/**
 * This is where the route endpoints are defined, with their controller handlers
 */

Router::get('', "TestController@index");

Router::get('test', "TestController@printCommand");

Router::get('test/:id', "TestController@printParameterCommand");

Router::get('test/cat1/cat2/:id', "TestController@printParameterCommand");

Router::post('post_test', "TestController@postCommand");

