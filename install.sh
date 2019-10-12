#!/bin/sh
echo "Apt update"
apt-get update

echo "Install Fail2Ban"
apt-get install fail2ban

echo "create jail.local config"
#touch /etc/fail2ban/jail.local

cat > /etc/fail2ban/jail.local << ENDOFFILE
[sshd]
#Set ban time to 5 minutes
bantime = 300
#Decrease the number of failed login attempts before banning to 3
maxretry=3
ENDOFFILE

echo "Restart fail2ban"
sudo systemctl restart fail2ban

// var/log/apache2/access.log