<?php
/**
 * This is where the route endpoints are defined, with their controller handlers
 */

Router::get('', "TestController@Index");

Router::get('test', "TestController@PrintCommand");

Router::get('test/te', "TestController@PrintParameterCommand");

Router::get('test/cat1/cat2/:id', "TestController@PrintParameterCommand");

Router::post('post_test', "TestController@PostCommand");

Router::get('view', "TestController@TestView");
