# MySite
This is a simple site with register,login,password_reset > form, include email validation after register and in password reset process.
Is developed in Xampp on localmashine
Some instructions for up site on your mashine if you use windows os

1.
  Setup Apache "hhtpd.conf":
  Need to find and redact:
  DocumentRoot "C:/xampp/htdocs/MySite" //(if you install xampp in another path set your path)
  <Directory "C:/xampp/htdocs/MySite">   //(if you install xampp in another path set your path)

2.
  Setup Apache "php.ini":
  Need to find and redact after [mail function]:
  SMTP=smtp.gmail.com
  smtp_port=465
  sendmail_from = testmurzanicolae@gmail.com
  sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t" //(if you install xampp in another path set your path)

3.
  Setup Sendmail in Xampp > C:\xampp\sendmail.ini:
  Need to find and redact positions:
  smtp_server=smtp.gmail.com
  smtp_port=465
  auth_username=testmurzanicolae@gmail.com
  auth_password=Hebydusaq1995
  force_sender=testmurzanicolae@gmail.com

4.
  Setup http://localhost/phpmyadmin/
  in project folder find MySite/indrivo.sql
  upload "indrivo.sql" in http://localhost/phpmyadmin/
  i use in this project default creditials from phpmyadmin: (username="root",password="")

5.Copy project folder "MySite" > C:/xampp/htdocs/   //(if you install xampp in another path set your path)
Test if site is up >> http://localhost/    //(if you http port 80 is in use, you can use any other just redact httpd.conf file: find: Listen 80 and ghange it,
// recomand to use in range 81-89 to avoid port conflicts)
//restart apache after this

//--------------//
6.For link work from email we need to change some in code:
  6.1 ../controller/register.php
    change this line:
    http://93.113.64.122:33331/controller/verify-mail.php?email='.$email.'&hash='.$hash.'
    to 
    http://localhost(:(you custom port without quotes))/controller/verify-mail.php?email='.$email.'&hash='.$hash.'

  6.2 
    Same for ../controller/restore_password_mail.php
    change this line: 
    http://93.113.64.122:33331/view/reset_password.php?
    to:
    http://localhost(:(you custom port without quotes))/view/reset_password.php?



