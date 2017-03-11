## Unit tests

My unit tests aren't true unit tests, but tests that cover model functionality. For every method on a model I write a simple test that ensures it's functionality. This includes scopes and accessors/mutators.

I don't bother testing relationships as I leave that to my controller tests to ensure they're all hooked up as I expect.
