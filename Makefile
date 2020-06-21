SOURCES += config
SOURCES += src
SOURCES += vendor

SOURCES += cli-config.php
SOURCES += wp-devkit.php
SOURCES += README.md
SOURCES += composer.json
SOURCES += composer.lock

ZIP = wp-devkit.zip

all: install clear-zip $(ZIP)

install:
	@composer install

clear-zip:
	rm wp-devkit.zip

$(ZIP): $(SOURCES)
	zip -r $@ $^
