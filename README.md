https://hub.docker.com/r/trafex/alpine-nginx-php7/
https://semaphoreci.com/community/tutorials/dockerizing-a-php-application

docker run -p 80:8080 -v ~/path_to_VitaDB:/var/www/html trafex/alpine-nginx-php7

localhost

Alternate
docker-compose up

Alternate 2
make start


TODO
Change unnecessary posts to gets - this would break the api i guess  
Reduce js files  
One php database connect file instead of in every file  
Bootstrap native to remove jquery - it's in everything so probably not  
Create sample SQL schema from json returned from site at all endpoints  
mysql container add to docker-compose.yml  
move sql query strings to constants file  
replace "SELECT *" with "SELECT columnName1, columnName2..."  
make models for json returned from db  
Create sample SQL schema from json returned from site at all endpoints  
Stackoverflow.com/questions/42156468/php-mvc-model-relations-mysql  
Golang create db schema from json  
Https://vitadb.rinnegatamante.it  


.env in docker-compose  
https://docs.docker.com/compose/environment-variables/#the-env-file  

env vars in php
https://mediatemple.net/community/products/grid/204643130/using-environment-variables-in-php  

create env vars in docker container from docker-compose.yml
https://vsupalov.com/docker-arg-env-variable-guide/  

follow docker logs for a service with name 
docker logs vitadb_webapp_1 -f  

connect to mysql docker container from outside docker compose network  
mysql -P 9906 --protocol=tcp -u root -p
mysql -P 9906 --protocol=tcp -u devuser -p  

show databases;  
show tables;  

separating nginx out of php-fpm container
http://www.inanzzz.com/index.php/post/zpbw/creating-a-simple-php-fpm-nginx-and-mysql-application-with-docker-compose