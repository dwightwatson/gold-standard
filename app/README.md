## Models

Keep your models in `app/` unless you have a very good reason to move them elsewhere.

### Base model

Add an abstract base `Model` class that your models extend from to give yourself a central place to add any helpful methods you want to use.

### Table name

This is personal preference, but I always define the table name manually. It just saves Eloquent from having to call the pluralizer a bunch of times under the hood, but I doubt it makes a difference at all.

### Fillable

Don't just pop every model attribute in here - think very carefully about what you want to whitelist. For starters, always use `$fillable` instead of `$guarded` - it's going to be more secure than otherwise, for example you might add additional attributes in the future that would be at risk unless you guard them as well.

Usually you aren't going to want your relationship keys to be in this array - it would allow clever users to re-associate models by filling in what they. You're generally going to want to set up these relationships using Eloquent instead.

```php
// You don't want do have this, effectively.
$post = Post::create(
    $request->all() + ['user_id' => auth()->id()]
);

// Let Eloquent set the `user_id` for you.
$post = auth()->user()->posts($requst->all());
```

### Scopes

Add helpful scopes that are going to reduce logic duplication across the application. Use names that read well and are obvious in their intention.

### Relationships

Place your relationships at the bottom of your model alphabetically. Use the `::class` syntax which shouldn't require you to import the class as they will all be in the same namespace. Avoid using custom column names for relationships and instead use the default that Laravel can infer.
