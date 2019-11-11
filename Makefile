BASEDIR = $(shell pwd)
APPNAME = terrenceryan
include Makefile.properties


env:
	@echo "Making sure project settings all in order"
	@gcloud config set project $(GCP_PROJECT)
	@gcloud config set compute/zone $(GCP_ZONE)
	@gcloud config set account $(GCP_ACCOUNT)

run:
	cd "$(BASEDIR)/sql/" && $(MAKE) run
	cd "$(BASEDIR)/frontend/" && $(MAKE) run	

clean:
	cd "$(BASEDIR)/sql/" && $(MAKE) clean
	cd "$(BASEDIR)/frontend/" && $(MAKE) clean	

deploy: env
	cd "$(BASEDIR)/frontend/" && $(MAKE) deploy	

runtests:
	@echo "test"
	phpunit test	

builddocker:
	docker build -t $(APPNAME) "$(BASEDIR)/."	

serve: 
	docker run --name=$(APPNAME) -d -P -p 8080:80 $(APPNAME)	

dev: cleandocker builddocker serve

cleandocker:
	-docker stop $(APPNAME)
	-docker rm $(APPNAME)		


css:
	sass --watch main/assets/css/scss/main.scss:main/assets/css/main.css