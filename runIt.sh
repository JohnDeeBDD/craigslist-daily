#!/bin/sh
cd /var/www/html/wp-content/plugins/crg-daily
vendor/bin/codecept run runner PhantomJSPhoneNumberScraperCest -v --html
