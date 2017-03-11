## Tests

I place all my controller tests into the `Feature` directory and all model tests into the `Unit` directory. Depending on what additional components you build in your application you can decide whether to unit test them or write more functional tests.

### Additional helpers

I keep two additional test helpers in my `TestCase`, both of which are inspired by [Adam Wathan](https://twitter.com/adamwathan).

#### `from`

This method is helpful when you use Laravel's `back()` redirector, or want to test the redirect on failed validation. You can use it to set the previous page for a request and assert that Laravel redirects back to it.

```php
// Invalid request...
$response = $this->from('/posts/create')->post('/posts', []);

// ...redirects to previous URL.
$response->assertRedirect('/posts/create');
```

#### `disableExceptionHandling`

When you're writing tests and the framework is swallowing an exception that makes it difficult for you to debug what is going on, you can call this method in your test to re-throw the exception. This means you'll see the action exception and full stack trace in your console window, and you'll know exactly what you need to fix.

```php
/** @test */
function something_isnt_quite_right()
{
    $this->disableExceptionHandling();

    $response = $this->get('/whoops');
}
```
