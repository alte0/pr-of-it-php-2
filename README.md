# pr-of-it-php-1
https://pr-of-it.ru/courses/php-1.html

# Restoring data from dump files
https://hub.docker.com/_/mysql
`USE personal_site;` in dump file
`docker exec -i mysql_cn sh -c 'exec mysql -uroot' < ./.docker/db/personal_site_dump.sql`
