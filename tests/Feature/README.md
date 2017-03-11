## Feature tests

Every resourceful controller should have an associated feature test that covers it's functionality. On a full resource controller there are 7 methods - `index`, `create`, `store`, `show`, `edit`, `update` and `destroy`. I will normally write 9 tests then to additionally cover the valid and invalid responses for creating and updating a resource.

### Routing

I tend to call the actual URI and assert against the expected URI in my controller tests rather than using the `action` or `route` helpers. That way my tests ensure that the resource routing is working as I expect, and prevents someone from changing it by accident without realising the implications.
