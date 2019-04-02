pipeline {
  agent {
    docker {
      image 'node:8-alpine'
      args '-p 8082:80'
    }

  }
  stages {
    stage('Build ') {
      steps {
        sh '''cd frontend
ls
npm install'''
      }
    }
    stage('Deliver') {
      steps {
        sh '''ls
cd frontend
ls
cat package.json
npm run build
npm start'''
      }
    }
  }
}