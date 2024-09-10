# Git and GitHub - Version Control

## Important Git Commands
| Command                                   | Description
--------------------------------------------|--------------------------------------------------------------------------------------------
|`git init` | Turns an existing directory into a new Git repository inside the folder you are running this command.
|`git clone [url]` | Download a repository that already exists on GitHub, including all of the files, branches, and commits.
|`git push` | Uploads all local branch commits to GitHub.
|`git pull` | Updates your current local working branch with all new commits from the corresponding remote branch on GitHub.
|`git add [filename]` | Snapshots the file in preparation for versioning.
|`git add .` | Snapshots all file in preparation for versioning.
|`git commit -m "[descriptive message]"` | Records file snapshots permanently in version history.
|`git log` | Lists version history for the current branch.
|`git branch [branch-name]` | Creates a new branch.
|`git switch -c [branch-name]` | Switches to the specified branch and updates the working directory.
|`git merge [branch]` | Combines the specified branch’s history into the current branch. This is usually done in pull requests, but is an important Git operation.
|`git branch -d [branch-name]` | Deletes the specified branch.
|`git status` | See which branch.
|`git config --global user.name "[name]"` | Sets the name you want attached to your commit transactions.
|`git config --global user.email "[email address]"` | Sets the email you want attached to your commit transactions.

#### Full documentation link: https://training.github.com/downloads/github-git-cheat-sheet/
