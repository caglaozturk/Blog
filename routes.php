<?php

use BigBear\System\Router;

Router::get('/login', 'Authentication:view');
Router::post('/login', 'Authentication:login');
Router::get('/logout', 'Authentication:logout');

Router::get('/users', 'User:index');
Router::get('/user/create', 'User:create');
Router::get('/user/edit/{id}', 'User:edit');

Router::get('/categories', 'Category:index');
Router::get('/category/create', 'Category:create');
Router::get('/category/update', 'Category:update');

Router::get('/posts', 'Post:index');
Router::get('/post/create', 'Post:create');
Router::get('/post/update', 'Post:update');

Router::get('/settings', 'Setting:index');
Router::get('/setting/create', 'Setting:create');
Router::get('/setting/edit/{id}', 'Setting:edit');

Router::get('/', 'Index:index');