docker build -t php_test_image .
docker rm -f php_test_container
docker container run -d --name php_test_container -p 8090:80 php_test_image
