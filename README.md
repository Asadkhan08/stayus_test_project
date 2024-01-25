**STAYUS LARAVEL/PHP APPLICATION CONTAINERIZATION AND CI/CD WITH JENKINS**

**Table of Contents**

1.  **Introduction**

-   Php/Laravel application has been dockerized with each service has its own Dockerfile

- Dockerfile "for app"

- Dockerfile.db "for mysql database"

- Dockerfile.redis "for Redis"

-   Application has been testing regularly  and in working condition. Docker Compose created to orchestrate whole dockerization process. Networking was created to make sure that all service can communicate with each other and separate volumes also created for data persistence.
-   .env modified all database related parameters added, which can be secured more but due to **deactivation** of my **AWS account** I could not referenced to AWS parameters store and AWS secretes.

2.  **Project Structure**

-   Overview of Project Files and Directories

-   Laravel Application Files
-   Docker Configuration Files
-   Docker Compose File
-   Jenkins Configuration Files

4.  **Docker Setup**

-   Dockerfile for Web Server (**laravelphp_image:v1**)
-   Dockerfile for MySQL Database
-   Dockerfile for Redis Server
-   Docker Compose File (**docker-compose.yml**)
-   Custom Apache Virtual Host Configuration (**000-default.conf**)
-   MySQL Configuration File (**Dockerfile.db**)
-   Redis Server Configuration (**Dockerfile.redis**)

6.  **Configuration Changes**

-   Changes to **000-default.conf** for Apache virtual host configuration
-   Custom configurations in **conf.migration**
-   Adjustments in **.env** for Database Credentials

1.  **Deployment Constraints**

-   **AWS Cloud**

-   Deployment is not possible on AWS Cloud at the moment due to expired Free Tier and account deactivation.

3.  **Jenkins Configuration**

-   Jenkins Pipeline Stages

-   Checkout
-   Build Docker Image
-   Testing
-   Deploy

5.  **Environment Variables**

-   Docker Image (**DOCKER_IMAGE**)
-   Docker Compose File (**DOCKER_COMPOSE_FILE**)
-   MySQL and Database Configuration

7.  **CI/CD Process**

-   Checkout Stage:

- Jenkins will look for specified repo if that exist and be cloned.

-   Build Procedures:

- Build stage will build docker image with tag specified.

-   Deployment Steps:

- Docker compose will deploy the whole and create network and volumes as well.

1.  **Troubleshooting**

-   Common Issues and Solutions : one issue arises when migration is issued for 2^nd^ time , it say users table already, existed which I manually delete and works again.
-   Log Analysis: log analysis done and each and every service works normally.

3.  **Post-Deployment Actions**

-   Stop and Remove Containers: I usually do for my test environment.
-   Additional Cleanup Steps

5.  **Future Improvements**

-   Potential Enhancements and Updates: can be done a lot to enhance security and SSL certifications and using parameter store and aws secrets to store sensitive data.  

7.  **Conclusion**

-   Comprehensive implementation and  Containerization and CI/CD pipeline using Jenkins.

13. Github link:  https://github.com/Asadkhan08/stayus_test_project/tree/master