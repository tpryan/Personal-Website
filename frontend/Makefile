BASEDIR = $(shell pwd)
IMAGE = terrenceryan_php



build:
	docker build -t $(IMAGE) "$(BASEDIR)/."  

clean:
	-docker stop -t 0 $(IMAGE)
	-docker rm $(IMAGE)

serve:
	docker run --name=$(IMAGE) -v "$(BASEDIR)/www":/app/web \
	--link terrenceryan_mysql:terrenceryan_mysql -d -P -p 80:8080 $(IMAGE) 	

run: clean build serve