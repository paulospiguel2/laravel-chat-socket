<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

### Prerequisites

```
docker
docker-compose
makefile
```

### Installing

```
git@github.com:paulospiguel2/laravel-chat-socket.git <projectName>
```

```
cd <projectName>
```

```
make up
```

```
make composer-install
```

```
make setup-laravel
```
```
make build-css
```

```
make npm-install
```

```
make node-dev
```


### Makefile Commands

```
make up               ; run docker-compose up -d
make stop             ; run docker-compose stop
make build            ; run docker-compose build
make down             ; run docker-compose down
make composer-install ; run composer-install inside containers
make composer-update  ; run composer-update inside containers
make npm-install      ; install node dependences
make node-dev         ; npm run dev:server (nodemom)
make node-server      ; npm run prod:server
make setup-laravel    ; setup laravel project
make build-css        ; npm run dev (build CSS)

```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
