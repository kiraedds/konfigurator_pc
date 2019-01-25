# KONFIGURATOR_PC

## What to do?

A niewiele, niewiele

### 1. How to install dependencies?

Nginx setup:
```bash
sudo su -
cd /etc/nginx/sites-available/
cp /home/student/PhpstormProjects/php_2018_konfigurator_pc/konfigurator_pc .
cd /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/konfigurator_pc .
service nginx restart 
exit
```


### 2. How to connect to database?

```bash
mysql -u test test -p
test123
//Paste the content of baza.sql
exit

mysqldump -u test test -p > tests/_data/dump.sql
```
### 3.How to set up codeception?
```bash

composer require codeception/codeception --dev

vendor/bin/codecept bootstrap
```
### 4. How to run Selenium?

```

Open new terminal window and execute:

cd Selenium/
java -jar selenium-server-standalone-3.14.0.jar
```

