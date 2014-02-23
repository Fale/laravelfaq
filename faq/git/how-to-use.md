# How can I use Git for my Laravel project?

You can create a Git repository for your Laravel project with these steps:

    ~$ cd myapp
    ~/myapp$ git init

That's it. Try checking the status.

    ~/myapp$ git status

You should see all the untracked files.

    # On branch master
    #
    # Initial commit
    #
    # Untracked files:
    #   (use "git add <file>..." to include in what will be committed)
    #
    #   .gitattributes
    #   .gitignore
    #   CONTRIBUTING.md
    #   app/
    #   artisan
    #   bootstrap/
    #   composer.json
    #   phpunit.xml
    #   public/
    #   readme.md
    #   server.php
    #   util/
    nothing added to commit but untracked files present (use "git add" to track)

Notice the file `composer.lock` is not tracked? If you want to add it, you should edit `.gitattributes` and removed the line that has `composer.lock` in it.

If you haven't configured Git with your name and email, it's easy.

    ~/myapp$ git config --global user.email "you@example.com"
    ~/myapp$ git config --global user.name "Your Name"

You can add everything and commit it to your repository with two commands.

    ~/myapp$ git add .
    ~/myapp$ git commit -m "Initial commit"

And a final status will show you nothing's changed.

    ~/myapp$ git status

You should see the following.

    # On branch master
    nothing to commit, working directory clean

{"tags": ["git", "composer"]}
