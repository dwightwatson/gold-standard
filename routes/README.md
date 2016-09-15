## Routing

When defining routes for your application you should try and think of everything as being a CRUD resource. The boilerplate Laravel resource controller has 7 actions - `index`, `create`, `store`, `show`, `edit`, `update` and `destroy`. See if you can fit every request in your application to one of these actions.

For example, logging in would be "creating" a session. So `SessionsController@create` could be your login form, and `SessionsController@store` could handle the login. Writing a comment is "creating" a comment and deleting one is "destroying" a comment, so you could use `CommentsController@store` and `CommentsController@destroy`.

### Resourceful

Try and use `Route::resource()` when possible as it's intention is clear. If you only need some of the actions, pass `only` as an argument to whitelist the actions you want. Don't use `except`.

```php
Route::resource('posts', 'PostsController', ['only' => ['index', 'show']]);
```

Sometimes this isn't going to work when you want to use prettier URLs. Take the login example above - by default that would give you `GET /sessions/create` and `POST /sessions` which might not be what you're after. If that's the case, be explicit.

```php
Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::delete('logout', 'SessionsController@destroy');
```

This is only if you intend on rolling your own registration/login controllers through. Roll with the default boilerplate unless you have a reason not to.
