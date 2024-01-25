pipeline {
    agent any
    
    environment {
        DOCKER_IMAGE = 'laravelphp_image:v1'
        DOCKER_COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scmGit(branches: [[name: '*/main']], extensions: [], userRemoteConfigs: [[url: 'https://github.com/Asadkhan08/stayus_test_project']])
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    docker.build DOCKER_IMAGE
                }
            }
        }

        stage('Testing') {
            steps {
                script {
                        docker.image(DOCKER_IMAGE).inside {
                            // except handled manually be deleting user table ... using workbench softwar
                            sh 'php artisan migrate'
                            
                            }                    }
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    // Deploy using docker-compose
                    sh "docker-compose -f ${DOCKER_COMPOSE_FILE} up -d"
                    // to check if database is up and running 
                    sh 'docker-compose exec mysql_database mysqladmin ping -u root -p'
                }
            }
        }
    }
// optional but if necessary 
    post {
        always {

            script {
                // Stop and remove containers
                sh "docker-compose -f ${DOCKER_COMPOSE_FILE} down"
            }
        }
    }
}
