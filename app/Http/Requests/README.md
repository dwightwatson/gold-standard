## Requests

Use form request objects to handle any sort of validation that represents a resource or is going to be used in more than one place. If you have different logic for creating/updating a resource you might consider `CreatePostRequest`/`UpdatePostRequest` or `Posts\CreateRequest`/`Posts\UpdateRequest` instead (and have your update request extend your create request).

Don't forget that these objects extend from `Illuminate\Http\Request`, so you have access to the authenticated user and route parameters.

### Authorization

In instances you're not using Laravel's authorization gates or policies you can do it in a request. Remember that you have access to the user with `$this->user()` on the request. In this example we can require the user be authenticated.

### Access route parameters

You can access route parameters from the request as well. In this example we get the `Post` model using route model binding, and if it exists (for an update request) use it's ID for unique validation.
