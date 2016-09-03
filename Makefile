VERSION = $(shell grep "<version>" plugin/*.xml|cut  -d ">" -f 2|cut -d "<" -f 1)

zip:
	@echo "Creating zip file for version $(VERSION)"
	@(cd plugin && zip -r ../featured_first-$(VERSION).zip *)

all: zip
