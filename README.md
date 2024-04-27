Техническое задание на проверку, взаимодействие с ZOHO CMS. Весь функционал описаный в тз работает. 
Обновление токена работает, валидацию также работает и оповещение об статусе (ошибка, успешно) всё это работает
Пытался сделать чистые контроллеры запихав всю логику в сервисе а в сервисе уже делал это.

## Deployment
- **Start script "setup.sh" command:** Run `/bin/bash/setup.sh` and wait for the initial setup.
- **For other runs, enter the command:** `docker-compose up -d` and `npm run dev` to start the services.
- **Insert info in env (ZOHO_CLIENT_ID, ZOHO_CLINET_CODE(For first run), ZOHO_CLIENT_SECRET, ZOHO_ACCOUNT_URL)
