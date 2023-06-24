### Prepare database


1. Create DB, DB User and Grants

connect mysql db with `mysql -u ${MYSQL_USER} -h ${MYSQL_HOST} -p`

```
CREATE USER 'wpuser'@'localhost' IDENTIFIED BY 'Wp123#';
CREATE USER 'wpuser'@'%' IDENTIFIED BY 'Wp123#';
    
CREATE DATABASE IF NOT EXISTS wpdb;
    
GRANT ALL ON wpdb.* TO 'wpuser'@'localhost' WITH GRANT OPTION;
GRANT ALL ON wpdb.* TO 'wpuser'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```

### Prepare k8s user

Create Corresponding k8s manifests
Create Corresponding CICD in github Repo
Create corresponding Recond in route53

### Generate `Dockerfile` from template with 

Don't remove the template file, otherwise pipeline will fail

Generate .env file from example `.env.example` file with credentials.

Generate Dockerfile

```bash
while read line; do export $line; done < .env
envsubst < Dockerfile.tmpl > Dockerfile
```

```
aws ecr get-login-password --region ap-southeast-1 --profile edhub | docker login --username AWS --password-stdin 658717967470.dkr.ecr.ap-southeast-1.amazonaws.com
docker tag rafaftahsin/simple_apache_app:v1  658717967470.dkr.ecr.ap-southeast-1.amazonaws.com/demoapp:v1
docker push 658717967470.dkr.ecr.ap-southeast-1.amazonaws.com/demoapp:v1
```

Unable to create application: application spec for simple-app is invalid: InvalidSpecError: Unable to generate manifests in /: rpc error: code = Unknown desc = /: app path is absolute

See your service up and running 

```
kubectl port-forward service/demoapp 8000:80
```

