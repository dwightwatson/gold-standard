## Model factories

Place your factories in a file that matches the table name (the pluralised name of the model). Use [Faker](https://github.com/fzaninotto/Faker) to generate fake data for your models - it's well worth reading the documentation to see what sort of information can be generated for you.

### Types

Use factory types to build similar factories that are different enough that they deserve their own. For example, unpublished posts are likely important enough in the application that they deserve their own factory. Note that the default factory provides the most obvious type - a published model.
