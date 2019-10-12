"# OTP-2FA-EXAMPLE" 

**How To use**
- clone this repo `git clone https://github.com/fatkulnurk/OTP-2FA-EXAMPLE.git` or download zip
- open config.php
- update array $config, and change value for all key.
- done. 
---

**Integration with Fail2ban**
- install apache (or nginx)
- install php (5.6 or new)
- run chmod  `chmod +x install.sh`
- run install.sh => `./install.sh`


---

**Library & reference **
- https://github.com/Voronenko/PHPOTP
- https://blog.swmansion.com/limiting-failed-ssh-login-attempts-with-fail2ban-7da15a2313b
---

**Warning**

This repository is only for mid test in "Politeknik Elektronika Negeri Surabaya", not for production.
If you use this code for production, don't forget to set the security (for example SQL Injection or XSS Injection) because the code that I created does not apply security for hack.