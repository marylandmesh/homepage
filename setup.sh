#!/bin/sh
#
## setup.sh
# This script, part of MarylandMesh's homepage repository, is expressly
# for symlinking configuration files and assuring that the host server
# is usable for hosting the site.
set -e

cd "$(dirname "$0")"

if [ -z "$CHECKFILE" ]; then
	CHECKFILE=/etc/lighttpd
fi

if [ -z "$CONFFILES" ]; then
	CONFFILES=/etc/lighttpd/lighttpd.conf,/etc/lighttpd/lighttpd.conf.vhosts
fi

echo "Beginning setup."
echo "This script should only be run once, or if it ever updates,"
echo "in which case it will be marked as such."
echo

if [ ! -e "$CHECKFILE" ]; then
	echo "It looks like lighttpd is not installed."
	echo "If it is, define the environment variable CHECKFILE as"
	echo "the location of its install. Currently, it is $CHECKFILE."
	exit 1
fi

for FILE in $(echo $CONFFILES | tr ',' '\n'); do
	if [ -e "$FILE" ]; then
		echo "The configuration file already exists."
		echo "Moving it to $FILE.backup"
		mv "$FILE" "$FILE.backup"
	fi

	echo "Trying to symlink $FILE to this repository."
	ln -s $(pwd)/"$(basename "$FILE")" "$FILE" 
done

echo "Successful!"