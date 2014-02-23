# Should I put composer.lock in the Git repository?

This is very personal, some people like `composer.lock` tracked and some don't. When you track `composer.lock` with your source code control system (Git or whatever) it allows you to do a `composer update` on your development machine and then, later, a `composer install` on your production machine. The `composer install` command will make sure all packages are the correct version as specified in the `composer.lock` file. Thus production uses not only the same packages, but the same versions of the packages as your production machine.

{"tags": ['git', 'composer', 'packages']}
