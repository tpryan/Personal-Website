BASEDIR = $(shell pwd)
include Makefile.properties


env:
	@echo "Making sure project settings all in order"
	@gcloud config set project $(GCP_PROJECT)
	@gcloud config set compute/zone $(GCP_ZONE)
	@gcloud config set account $(GCP_ACCOUNT)

run:
	cd "$(BASEDIR)/sql/" && $(MAKE) run
	cd "$(BASEDIR)/frontend/" && $(MAKE) run	