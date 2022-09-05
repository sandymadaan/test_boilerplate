FROM hashicorp/terraform:latest 

COPY . /var/www/html
WORKDIR /var/www/html
RUN pwd
RUN ls -l
RUN terraform init -input=false
RUN terraform plan -out=tfplan -input=false
RUN terraform apply -input=false tfplan