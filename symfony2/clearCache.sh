#!/bin/sh

sudo /opt/lampp/bin/php app/console cache:clear --env=prod
sudo /opt/lampp/bin/php app/console cache:clear --env=dev
sudo chmod -R 777 app/cache
sudo chmod -R 777 app/logs
