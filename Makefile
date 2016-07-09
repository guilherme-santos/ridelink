all: dep

dep:
	-test ! -f composer.phar && curl -sS https://getcomposer.org/installer | php
	php composer.phar install

question%:
	php bin/console $@
