## Database seeding

Use database seeding as a means to quickly build data up in a development environment. You'll notice in `DatabaseSeeder` that we immediately exit in the `production` environment in order to prevent accidently seeding and overriding your data.

If you have an application that you intend to deploy multiple times in different environments however (say an open-source project or an app sold to clients) you may instead use seeds to set up a fresh production environment.
