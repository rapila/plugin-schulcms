# Migrationsschritte für SchulCMS Pilotprojekte (git@rapi.la:plugin-schulcms-old.git)

In case we omitted some important information from the file *migration_20_steps.txt*, refer to `035405e22cae21c0fa6893f183992f5578201d4c`.

*Important: update with each migration step of wettingen-devel and wettingen-site-prototype development*

**Make sure to test every step**

## Update step by step bis zu release-1.2


## New upstream repo: SchulCMS Plugin on *github*

    $ git remote rm git@rapi.la:/var/server/git/plugin-schulcms.git
    $ git remote add git@github.com:rapila/plugin-schulcms.git
    $ (cd plugins/schulcms && git pull)
    $ rap migrate-model.sh -p schulcms
    $ rap generate-model.sh && rap clear-caches.sh

## Model changes

    $ git checkout 85b6a25ebc62498629916d749aa0447d17631227
    $ rap migrate-model.sh -p schulcms
    $ rap generate-model.sh && rap clear-caches.sh

Test here

    $ git checkout 889a9e183c2cbe4091c1a256785d78aaffd0bbfe
    $ rap migrate-model.sh -p schulcms
    $ rap generate-model.sh && rap clear-caches.sh

Test here

    $ (cd plugin/schulcms && git checkout 12c62fa4d7a24eeae285512223a3dcca8de7d49e)

Test here

    $ git checkout 85b6a25ebc62498629916d749aa0447d17631227

    $ rap migrate-model.sh -p schulcms
    $ rap generate-model.sh && rap clear-caches.sh

Test here

    $ rap migrate-model.sh -p schulcms
    $ rap generate-model.sh && rap clear-caches.sh

Test here

    $ (cd plugins/schulcms && git checkout 8b11bbf91fca8b3e97ae4ab212e33ad8e931ed12)
    $ rap migrate-model.sh -p schulcms
    $ rap generate-model.sh && rap clear-caches.sh

Test here

    $ (cd plugins/schulcms && git checkout e55129bdd595f04fd58b106dcfc44447571b86de)
    $ rap migrate-model.sh -p schulcms
    $ rap generate-model.sh && rap clear-caches.sh

Test here

    $ (cd plugins/schulcms && git checkout defc2b73b51965a47061f5a45ffa3c42b4c9fd46)
    $ rap migrate-model.sh -p schulcms
    $ rap generate-model.sh && rap clear-caches.sh

## Further steps

- Remove content objects if page_type is other than default any more (SchoolHome / PortalHome / Classes / Aktuell / FAQ etc.)

- Rename `container_name`s in `objects` (ContentObjects) to match new template’s container identifier if necessary

- Change name of pages or add new pages

  - Rename *Anlässe* to *Aktuell*

  - Add new pages: News, Ferienplan, Elternbrief etc. (if they’re not part of a new page type)

- Move pages

  * Change parent of Lehrpersonen from `root` to newly created `Über uns`

## Create Example dumps for easy development of new sites

- Including: Home, School Class page, Custom 404 page, Search page etc.

## Cleanup

- Remove unused site files as templates, config, params, modules, css, js etc.