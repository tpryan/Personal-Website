FROM gcr.io/php-mvm-a/php-nginx:latest
ENV DOCUMENT_ROOT /app/web
# COPY terrenceryan.conf /etc/nginx/conf.d/terrenceryan.conf 
COPY www /app/web
RUN chmod -R 755 /app/web/* 