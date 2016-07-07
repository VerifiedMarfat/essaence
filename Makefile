init:
	vagrant up
	cp wordpress/wp-config-sample.php wordpress/wp-config.php
	make db-restore
	npm install
	gulp
	open http://essaence.dev
	gulp watch

db-backup:
	vagrant ssh -- 'cd /var/www/dumps && mv latest.sql $(shell date +'%d-%m-%y__%H-%M').sql && mysqldump -u essaence -pessaence essaence > latest.sql'

db-restore:
	vagrant ssh -- 'cd /var/www/dumps && mysql -u essaence -pessaence essaence < latest.sql'
