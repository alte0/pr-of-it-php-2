# pr-of-it-php-2
https://pr-of-it.ru/courses/php-2.html

# Restoring data from dump files
https://hub.docker.com/_/mysql
`USE php2;` in dump file
`docker exec -i mysql_cn sh -c 'exec mysql -uroot' < ./.docker/db/personal_site_dump.sql`
