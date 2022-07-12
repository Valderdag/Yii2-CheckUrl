<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Сервис проверки доступности url-ов</h1>
    <br>
</p>

<p align="center" >Реализуется на фреймворке Yii2 Advanced [Yii 2](http://www.yiiframework.com/)</p>

<p align="center" >Используются yiisoft/yii2-httpclient, hail812/yii2-adminlte3 </p>

<p align="center" ><p style="text-transform:uppercase; font-weight: 900">Front: </p> доступность урла, если ответ меньше 399 - запрос повторяется заданное количество раз, с заданным тайм-аутом. Выводится сообщение об успехе. Несуществующие или заблокированные сайты выводять соответствующее сообщение, не вызывают сбой приложения.</p>
<p style="text-align: center" ><p style="text-transform:uppercase;  font-weight: 900">Backend:</p> доступен список проверенных урлов, информация по каждому урлу с датой проверки, кодом ответа, номером попытки и установленной задержкой. Заблокированные и не существующие адреса в базу не пишутся.</p>

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes   
    helpers/             contains shared helper
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
