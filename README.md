# domain.fi
- Concrete5 v.9.0.2
- Julkaistu Lanvisionin Zoneriin (huomaa että tänne pitää lisätä oma SSH-avain jos haluaa hakea tiedostot palvelimelta lando pull-komennoilla)

## Lokaali kehitysympäristö
- `git clone --recursive git@github.com:WTF-Design/domain.fi.git`
- luo .env tiedosto (Enpassista sisältö)
- `composer install` (tai `lando composer install` jos ei toimi)
- `lando start`
- `lando pull-start` hakee tietokannan ja tiedostot, kestää hetken
- Sivusto löytyy sitten osoitteella `******.lndo.site` (jos ei toimi, käytä landon ehdottamaa localhost-osoitetta, löytyy `lando info` komennolla)

## Muutosten hakeminen palvelimelta
- `lando pull-db` hakee tietokannan
- `lando pull-files` hakee application/files/ kansion kuvat ym.
- `lando pull-application` hakee koko application kansion

## Versionhallinta
### branchit
- Kun aloitat rakentamaan uutta toimintoa tms., tee tarvittaessa uusi branchi. (voi käyttää myös pelkkää main-branchia jos kehittää yksin tai jos on pieniä muutoksia) Uuden branchin luominen: `git branch branchin-nimi`, olemassa olevaan branchiin siirtyminen: `git checkout branchin-nimi`, näytä kaikki branchit: `git branch`
- HUOM, älä tee muutoksia suoraan production-nimiseen branchiin
### muutosten vieminen GitHubiin
- `git add polku/tiedoston-nimi/` lisää yksittäinen tiedosto
- tai `git add .` lisää kaikki muuttuneet tiedostot
- tai `git add -p` lisää muutokset yksitellen
- `git commit -m "Commit message"` lisää kommentti mitä on tehty
- `git push` puskee muutokset GitHubiin (siihen branchiin jossa olet)

## Muutosten julkaisu staging-sivustolle (development)
Jos käytit erillistä branchia, mergeä se ensin main-branchiin:
  - `git checkout branchinnimi` ja sitten `git pull`
  - `git checkout main` ja sitten `git pull`
  - `git merge branchinnimi`
  - `git push`
---
Siirry main-branchiin ja varmista että on viimeisimmät tiedot:
- `git checkout main`
- `git pull`
Siirry sitten staging-branchiin ja mergeä main siihen:
- `git checkout staging`
- `git merge main`
- `git push`
Jos teet "väärinpäin" eli teit muutokset staging-branchissa, muista mergetä ne mainiin.

Muutokset application/blocks ja application/themes-kansiossa menee tällä tavalla suoraan staging-sivustolle.
(HUOM Githubissa pitää olla secretit SSH_PRIVATE_KEY_STAGING, REMOTE_HOST_STAGING, REMOTE_USER_STAGING, TARGET_STAGING)

## Muutosten julkaisu livesivustolle (production)
- Productioniin pushaaminen onnistuu ainoastaan pull requestin kautta production branchiin. Eli kun production branchiin tehdään pull requestin mergeaminen onnistuneesti, niin workflow vie blocks ja themes kansion tiedostoihin tehdyt muutokset automaattisesti serverille.
(HUOM Githubissa pitää olla secretit SSH_PRIVATE_KEY, REMOTE_HOST, REMOTE_USER, TARGET)

..............

## Lando/Docker komentoja:
- `lando info` -> näkee lando projektin tietoja
- `lando list` -> näkee käynnissä olevat lando kontainerit
- `lando logs` -> näkee logit, mm. tietokanta errorit
- `lando start`
- `lando restart`
- `lando rebuild`
- `lando stop`
- `lando poweroff` -> sammuttaa landon kaikista koneella olevista projekteista
- `lando import-db dump.sql.gz` -> importtaa tietokanta tiedostosta
- `lando db-export dump.sql` -> exporttaa tietokanta tiedostoon
- Lisäsitkö .env tietoja jälkeenpäin? Muista ajaa sen jälkeen `lando rebuild -y`

*Outoihin lando/docker ongelmiin voi kokeilla tätä:*
- `lando poweroff` -> sammuta lando
- `docker container rm landoproxyhyperion5000gandalfedition_proxy_1` -> tuo containeri saattaa jäädä joskus jumiin, täytyy silloin poistaa
- `lando rebuild -y` -> rebuildaa lando projektin
- joskus myös `docker network prune` auttaa tyhjentämällä turhat networkit