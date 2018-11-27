# Sample Works - Laravel Vuejs  Sample #
This repository contains the Laravel 5.7 Vuejs version API with Bootstrap View Integration

##Cloning
To clone the TMS project to your local machine, run the following command

`git clone --recursive -b master git@github.com:imManish/laravel-vue-sample.git /your_desired_location`

This will also clone the submodules attached to this project. The submodules will clone from the *dev-master* branch,
in a **detached** state.

To develop these modules, you need to switch them to the *dev-master* branches:

`cd /var/www/myspace.dev/workbench/samples-works/sms-worker`
`git checkout dev-master`

Do the same for *workbench/sample-works/email-worker*.

Once done, please run

`git config core.fileMode false`

from the root of the project, as well as the following two folders:

 - workbench/sample-works/sms-worker
 - workbench/sample-works/email-worker

This will prevent git from tracking file mode changes made with *chmod*.

##File Permissions and Ownerships

To make sure the file permissions are correct, a script is supplied, available at *./bin/configure.sh*. Make the file
executable by running:

`sudo chmod +x ./bin/configure.sh`

from the project root. When done, run the script as follows:

`./bin/configure.sh`

Do not run this as root or via sudo, the script will request your root password where needed. This script changes the
ownerships to your account, which it gets from the `whoami` command, and tries to figure out your Apache group, and sets
the folders to the group recursively.

The script will also make the required folders writeable.

##Composer
When checking out the project, be sure to run

`composer install` to install the vendor libraries. These libraries have been excluded from the Git repository. Also
run `composer install` from the submodule paths:

 - workbench/sample-works/sms-worker
 - workbench/sample-works/email-worker

 otherwise these modules won't work.

##Bower
Once you've run composer install, run

`bower install` to install the required JavaScript libraries.


##Configuration Files
Some configuration files are excluded from the repository, as these are symlinked from the *.envexample* .
This allows each developer to have their own private configuration files without overriding configurations from team
members when these files are pushed.

**Please do not commit and push your configuration files into the repository!**

For your localhost, copy the following files:

 - `$ cp .env.example` into `.env`
 - `$ cp .env.development` into `.env` for Development Server
 
 and edit them to suit your localhost configuration.

##Database Migration
All that needs to be done now, is to run the database migration script from the project root.

`./artisan migrate`
`./artisan db:seed`
`./artisan passport:install --force`

##Deployment
The project utilises codepipeline through github integration over AWS EBS.

##Npm Installation
For build the frontend app simply run

`npm install` or `npm run --watch`
##Deployed Url 
`http://localhost:8000` Or `http://app.dev.com:port`

##Redis Configuration

`$ redis-server` To Start Redis server

`$ redis-cli` check `$ keys *` 


##Jenkins
For Continuous Integration, a Jenkins server is available at http://jenkins.sampleserver.com/. Currently, the server only
performs some standards checking using tools like **phpcs**, **phpmd** and **phpcpd**.