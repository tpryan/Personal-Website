BASEDIR = $(shell pwd)

include ../Makefile.properties

run:
	dev_appserver.py  .

deploy:
	gcloud app deploy app.yaml --project $(GCP_PROJECT) -q