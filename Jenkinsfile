pipeline {
  agent {
    docker {
      image 'node:8-alpine'
      args '''  --name code
  --env "VIRTUAL_HOST=code.mastertest.cf" 
  --env "VIRTUAL_PORT=3006" 
  --env "LETSENCRYPT_HOST=code.mastertest.cf" 
  --env "LETSENCRYPT_EMAIL=juliusmubajje1@gmail.com" '''
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
        sh '''cd frontend
npm run build
npm start'''
      }
    }
  }
}