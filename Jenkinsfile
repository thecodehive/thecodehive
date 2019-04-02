pipeline {
  agent {
    docker {
      image 'node:8-alpine'
      args '-p 3000:3000'
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
cat package.json
npm run build
npm start'''
      }
    }
  }
}