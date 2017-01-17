FROM gcr.io/google_appengine/php:latest
ENV DOCUMENT_ROOT /app/web
# COPY terrenceryan.conf /etc/nginx/conf.d/terrenceryan.conf 
COPY www /app/web
RUN chmod -R 755 /app/web/* 
EXPOSE 11211