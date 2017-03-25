## Database migrations

All migrations should be named with the suffix `{$tableName}Table`. The boilerplate Laravel migrations ship this way (for example, `CreateUsersTable`) so follow suite. Always include a primary key first and timestamps last.

Be descriptive in the naming of your migrations. If you're creating a table, `CreatePostsTable`. If you're adding a column, `AddDeletedAtToPostsTable` - notice, it still reads as English. Dropping a column would be `DropDeletedAtFromPostsTable`. And if you need to drop a table, `DropPostsTable`.

### Foreign keys

I generally don't use foreign keys and instead manage associations through the application code. This is so there is only definition of how associations map (in the application code) rather than duplicating it between code and database constraints.

However, if you opt to use foreign keys (because you prefer them, want additional data integrity, or any other reason) use them consistently.

Your associated columns should go immediately after the `id` column and before anything else. Use the association column names that Laravel expects to reduce boilerplate and help other developers. For example, if a `Post` belongs to a `User` it should indicate that with a `user_id` column.

### Soft deletes

I generally use soft deletes unless otherwise required. If your application doesn't require them then don't.

Note that the unique index on the `slug` column is a compound index with `deleted_at` - this means that a slug can be reused if posts that previously used it have been deleted.


### Indexes

Leave a blank line between your column definitions and your index definitions. Define your definitions at the bottom instead of using the fluent syntax as it makes it clearer to other developers what indexes are created by the migration.
