<?php
/**
 * This is where the route endpoints are defined, with their controller handlers
 */

Router::get('test', "TestController@printCommand");

Router::post('post_test', "TestController@postCommand");

