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
	gcloud beta run deploy $(APPNAME) -q --region $(GCP_REGION) \
	--image gcr.io/$(GCP_PROJECT)/$(APPNAME) \
	--platform managed --allow-unauthenticated

test: cleandocker testbuild testserve
	# sleep 2 
	@echo "test"
	docker exec $(APPNAME)_test /run_tests.sh
		

testserve: 
	docker run --name=$(APPNAME)_test  -d -P  $(APPNAME)_test	

builddocker:
	docker build -t $(APPNAME) "$(BASEDIR)/."	

testbuild:
	docker build -t $(APPNAME)_test "$(BASEDIR)/."	-f test.Dockerfile	

serve: 
	docker run --name=$(APPNAME) -d -P -p 8080:8080 $(APPNAME)	

dev: cleandocker builddocker serve

cleandocker:
	-docker stop $(APPNAME)
	-docker rm $(APPNAME)
	-docker stop $(APPNAME)_test
	-docker rm $(APPNAME)_test			

css:
	sass --watch main/assets/css/scss/main.scss:main/assets/css/main.css