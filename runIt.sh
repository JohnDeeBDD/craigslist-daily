#!/bin/sh
cd /var/www/html/wp-content/plugins/crg-daily
vendor/bin/wpcept run runner PhantomJSPhoneNumberScraperCest -v --html
