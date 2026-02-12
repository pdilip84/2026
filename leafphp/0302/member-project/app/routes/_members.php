<?php
app()->get('/members', 'MembersController@showall');
app()->get('/members/show/{id}', 'MembersController@show');
app()->get('/members/create', 'MembersController@create');
app()->post('/members/store', 'MembersController@store');
app()->delete('/members/delete/{id}', 'MembersController@destroy');
app()->get('/members/deleted', 'MembersController@showDeleted');
app()->post('/members/restore/{id}', 'MembersController@restore');
app()->delete('/members/force-delete/{id}', 'MembersController@forceDelete');
