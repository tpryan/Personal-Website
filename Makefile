BASEDIR = $(shell pwd)
APPNAME = terrenceryan
include Makefile.properties


env:
	@echo "Making sure project settings all in order"
	@gcloud config set project $(GCP_PROJECT)
	@gcloud config set compute/zone $(GCP_ZONE)
	@gcloud config set account $(GCP_ACCOUNT)


build: env
	gcloud builds submit -q

deploy: build
	gcloud beta run deploy $(APPNAME) -q --image gcr.io/$(GCP_PROJECT)/$(APPNAME)	--platform managed --allow-unauthenticated


runtests:
	@echo "test"
	phpunit test	

builddocker:
	docker build -t $(APPNAME) "$(BASEDIR)/."	

serve: 
	docker run --name=$(APPNAME) -d -P -p 8080:8080 $(APPNAME)	

dev: cleandocker builddocker serve

cleandocker:
	-docker stop $(APPNAME)
	-docker rm $(APPNAME)		


css:
	sass --watch main/assets/css/scss/main.scss:main/assets/css/main.css