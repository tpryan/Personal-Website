BASEDIR = $(shell pwd)
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


# terrenceryansql proceses
build:
	docker build -t terrenceryan-base "$(BASEDIR)/."  
clean:
	-docker stop -t 0 terrenceryansql
	-docker rm terrenceryansql

run:
	docker run --name=terrenceryansql -d -p 3306:3306 \
	-e STARTUP_SQL="prod.sql creds.sql" terrenceryan-base 	


develop: clean build run	