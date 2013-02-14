ShowTonight - basic server app exemple (Admin interface + API)
========================

Source code of a basic server app based on the ShowTonight project described in the first class
The id of this server app is to provide a backend for administrators to be able to create, delete, 
update events and their related avalabilities as well as provide an API that will be used by the
mobile app.

I used composer to install all external packages, it make things simpler.

Here is a global overview of the app:
  * src/S2n : the directory where I store my bundles for this project (fyi I chose S2n as a namespace for Show2Night)
  * src/S2n/ShowBundle: my main bundle where all my Entities and EntityRepositories are stored
  * src/S2n/ApiBundle: my API bundle, containing the API controllers
  * vendor/: this is where I installed (or where composer installed) the external bundles I use in this project: 
    FOSuserBundle and SonataAdminBundle as well as all the bundles they depend on.

Don't hesitate to take a look at the [Commits][1] section and click on a particular commit to see exactly what files changed
during the commit, it might help you if you are having trouble on a specific section.

Below are a few comments that might help you. Keep in mind that you can look at the files of the project to see exactly
how I implemented each features.

Tip for windows user: if you installed gitHub for windows, use the shell and launch your php commands from there as well
as your git commands

create your main bundle (S2n/ShowTonight bundle in my case)
generate entities with the command:
	php app/console doctrine:generate:entity
	(without foreign keys, all in the same bundle)
Do not generate your User entity yet

install the fosuser bundle (https://github.com/FriendsOfSymfony/FOSUserBundle)
create your user entity extending FOSUser

modify generated entities to add foreign keys
regenerate entities:
	php app/console doctrine:generate:entities S2n
create and update database
	php app/console doctrine:schema:update --force

Install the Sonata admin bundle:

If you are using composer, you will have to change the minimum stability in composer.json
    "minimum-stability": "dev",
then do in your console:
    composer require sonata-project/admin-bundle
    composer require sonata-project/doctrine-orm-admin-bundle 
(it might update other bundles)

refer to this link for the rest of the install procedure
http://sonata-project.org/bundles/admin/master/doc/reference/installation.html

this link should help to generate your 
http://sonata-project.org/bundles/admin/master/doc/reference/getting_started.html
update services.yml rather than adding an admin.xml
	
don't forget to create toString methods for your entities
	
to fix intl extension prb if you encounter it (windows) :
http://forum.wampserver.com/read.php?2,80704,82499

create the api bundle

[1]: https://github.com/rguillet/showtonight-server/commits/master
