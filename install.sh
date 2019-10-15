#!/bin/sh
echo "Apt update"
apt-get update
apt-get install apache2
apt-get install php
echo "Install Fail2Ban"
apt-get install fail2ban

echo "create filter and jail.local config"
#touch /etc/fail2ban/jail.local

cat > /etc/fail2ban/filter.d/php-login.conf << ENDOFFILE
[Definition]
failregex = \[WARNING\] \[client: <HOST>\] Authentication failed for: .*$
ignoreregex =
ENDOFFILE

cat > /etc/fail2ban/jail.local << ENDOFFILE
# The DEFAULT allows a global definition of the options. They can be override
# in each jail afterwards.

[DEFAULT]

# "ignoreip" can be an IP address, a CIDR mask or a DNS host. Fail2ban will not
# ban a host which matches an address in this list. Several addresses can be
# defined using space separator.
# ignoreip = <space-separated list of IPs>

# "bantime" is the number of seconds that a host is banned.
bantime  = 300

# A host is banned if it has generated "maxretry" during the last "findtime"
# seconds.
findtime  = 60

# "maxretry" is the number of failures before a host get banned.
maxretry = 3


# "usedns" specifies if jails should trust hostnames in logs,
#   warn when DNS lookups are performed, or ignore all hostnames in logs
#
# yes:   if a hostname is encountered, a DNS lookup will be performed.
# warn:  if a hostname is encountered, a DNS lookup will be performed,
#        but it will be logged as a warning.
# no:    if a hostname is encountered, will not be used for banning,
#        but it will be logged as info.
#usedns = no
[apache-php]
enabled  = true
port     = http,https
filter   = php-login
action   = php-login
logpath  = /var/log/apache*/*error.log
maxretry = 3
findtime = 300


ENDOFFILE

echo "Restart fail2ban"
sudo systemctl restart fail2ban
