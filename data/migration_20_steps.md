# Migrationsschritte für SchulCMS Pilotprojekte (git@rapi.la:plugin-schulcms-old.git)

In case we omitted some important information from the file *migration_20_steps.txt*, refer to `035405e22cae21c0fa6893f183992f5578201d4c`.

*Important: update with each migration step of wettingen-devel and wettingen-site-prototype development*

**Make sure to test every step**

## Update step by step bis zu release-1.2


## New upstream repo: SchulCMS Plugin on *github*

    $ git remote rm git@rapi.la:/var/server/git/plugin-schulcms.git
    $ git remote add git@github.com:rapila/plugin-schulcms.git
    $ (cd plugins/schulcms && git pull)
		$ git checkout master (fetch all)
    $ rap migrate-model.sh -p schulcms up
    $ rap generate-model.sh && rap clear-caches.sh

		# handle indices in a last migration for each site schulcms individually

## write_migration and migrate_model for schulcms
		// for final touch up

## Refactor configuration related code

*Info: Change from abstact ids to readable names and create missing categories/types automatically.*

		$ (cd plugins/schulcms && git checkout "6f0aa279a2bb4c01062aef8fb5d5834ed6eb9495")

	IMPORTENT: In order to prevent broken code, change the following category/type names in the database
						 before you instantiate the detail widgets in admin! this concerns ClassDetail, TeamMemberDetail
						 ServiceDetail and EventDetail related category / type configurations
	Change the names to the corresponding category/type name used in the new SchoolSiteConfig class
		or configure the old names according to the pattern the settings are called in these config methods.

  document_categories:
    school_class_portraits: n
    school_class_schedules: n
    school_class_documents: n
    event_documents: 105
    team_member_portraits: 108

  externally_managed_link_categories:
    school_class_links: n

  externally_managed_news_types:
    school_class_news_type_id: n

## Further steps

- migrate all deprecated default page_type with frontend modules content to use new TeamMembers / Classes / Aktuell / FAQ / SchoolHome / PortalHome page_types

- Rename `container_name`s in `objects` (ContentObjects) to match new template’s container identifier if necessary

- Change name of pages or add new pages

  - Rename *Anlässe* to *Aktuell*

  - Add new pages: News, Ferienplan, Elternbrief etc. (if they’re not part of a new page type)

- Move pages

  * Change parent of Lehrpersonen from `root` to newly created about-us `Über uns`

- replace instances of TeamMember->getTeamMemberLink() by TeamMember->getLink()
- replace instances of Class->getSchoolClassLink() by Class->getLink()

- replace default pages with content objects of type of team_members by page_type team_members

## Create Example dumps for easy development of new sites

- Including: Home, School Class page, Custom 404 page, Search page etc.

## Cleanup

- Remove unused site files as templates, config, params, modules, css, js etc.
