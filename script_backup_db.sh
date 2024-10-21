#!/bin/bash

# Remove all older backups files
rm -rf /var/www/phongha.vn/backups
mkdir /var/www/phongha.vn/backups

# Dump the database to backup file
mysqldump -u root phongha > /var/www/phongha.vn/backups/db_backup_`date +"%d%m%Y"`

# Commit the backup file to the GIT repository
cd  /var/www/phongha.vn && git checkout main && git add ./backups/ && git commit -m "backup database `date` " && git push
