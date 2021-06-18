# Symfony4 Bootstrap - API with soap & rest

### Docker
Aby uruchomić środowisko developerskie potrzebujemy dockera:
(https://www.docker.com/get-started)

* Kopiujemy plik build/.env.dist -> build/.env
* Ustawiamy scieżkę do naszego katalogu gdzie trzymamy www np: **C:\www**
 w pliku .env _PATH_WEB_
* Jeśli mieliśmy jakieś obrazy wcześniej usuwamy wszystko:
```docker image prune -a```
* Uruchammiamy ```docker-compose build && docker-compose up -d``` w katalogu **build**
#### Vhost
* W pliku vhost na Windows **C:\system32\drivers\etc\hosts**
* Unix: **/etc/hosts**

Dodajemy:
```127.0.0.1 new-superadmin.napoleoncat.com```

**Od tego momenu mamy aplikację dostępną pod adresem:(https://new-superadmin.napoleoncat.com)**

#### Composer

Composera możemy odpalić u siebie lokalnie, lub wejść na container docerowy:

```
> docker exec -it napoleon_php_admin bash
$ cd /data/www/cs
$ composer install
```

