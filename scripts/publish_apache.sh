./scripts/set_env.sh
gcloud compute copy-files ./apache/* root@wordpress-i3fn:/etc/apache2/sites-enabled
gcloud compute ssh root@wordpress-i3fn --command "apachectl restart"