BASEDIR = $(shell pwd)
IMAGE = terrenceryan_mysql
include ../Makefile.properties

env:
	@echo "Making sure project settings all in order"
	@gcloud config set project $(GCP_PROJECT)
	@gcloud config set compute/zone $(GCP_ZONE)
	@gcloud config set account $(GCP_ACCOUNT)


getprod: env
	gcloud sql instances export $(SQL_INSTANCE) gs://$(GCS_BUCKET)/sql/prod.sql --database $(PROD_SCHEMA)
	gsutil cp gs://$(GCS_BUCKET)/sql/prod.sql "$(BASEDIR)/prod.sql"
	gsutil rm gs://$(GCS_BUCKET)/sql/prod.sql


build:
	docker build -t $(IMAGE) "$(BASEDIR)/."  

clean:
	-docker stop -t 0 $(IMAGE)
	-docker rm $(IMAGE)

serve:
	docker run --name=$(IMAGE) -d -p 3306:3306 \
	-e STARTUP_SQL="prod.sql creds.sql" $(IMAGE) 	

run: clean build serve
	@echo ""