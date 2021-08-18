# MySite
This is a simple site with register,login,password_reset > form, include email validation after register and in password reset process. \
```Is developed in Xampp on localmashine``` \
```Some instructions for up site on your mashine if you use windows os``` \


1.
  &emsp;&emsp;Setup Apache ```httpd.conf``` \
  &emsp;&emsp;Need to find and redact: \
  &emsp;&emsp;```<!--if you install xampp in another path set your path-->``` \
  &emsp;&emsp;DocumentRoot "C:/xampp/htdocs/MySite" \
  &emsp;&emsp;<Directory "C:/xampp/htdocs/MySite"> 

2.
  &emsp;&emsp;Setup Apache ```php.ini``` \
  &emsp;&emsp;Need to find and redact after ```[mail function]``` \
  &emsp;&emsp;```SMTP=smtp.gmail.com``` \
  &emsp;&emsp;```smtp_port=465``` \
  &emsp;&emsp;```sendmail_from = testmurzanicolae@gmail.com``` \
  &emsp;&emsp;```<!-- if you install xampp in another path set your path -->``` \
  &emsp;&emsp;```sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"``` \
  
3.
  &emsp;&emsp;Setup Sendmail in Xampp > ```C:\xampp\sendmail.ini:```\
  &emsp;&emsp;Need to find and redact positions:\
  &emsp;&emsp;```smtp_server=smtp.gmail.com```\
  &emsp;&emsp;```smtp_port=465```\
  &emsp;&emsp;```auth_username=testmurzanicolae@gmail.com```\
  &emsp;&emsp;```auth_password=Hebydusaq1995```\
  &emsp;&emsp;```force_sender=testmurzanicolae@gmail.com```

4.
  &emsp;&emsp;Setup ```http://localhost/phpmyadmin/``` \
  &emsp;&emsp;in project folder find file ```MySite/indrivo.sql``` \
  &emsp;&emsp;upload "indrivo.sql" in ```http://localhost/phpmyadmin/ ```\
  &emsp;&emsp;i use in this project default creditials from phpmyadmin: ```(username="root",password="") ```

5.
 &emsp;&emsp; ```<!--if you install xampp in another path set your path-->``` \
 &emsp;&emsp;Copy project folder "MySite" in path ```C:/xampp/htdocs/``` looks like ```C:/xampp/htdocs/MySite/...``` \
 &emsp;&emsp;Test if site is up >> ```http://localhost/``` \
 &emsp;&emsp;```<!--if you http port 80 is in use, you can use any other -->``` \
 &emsp;&emsp;```<!--just redact httpd.conf file: find: Listen 80 and ghange it, -->``` \
 &emsp;&emsp;```<!--recomand to use in range 81-89 to avoid port conflicts -->``` </br>
&emsp;&emsp;```Restart apache after this ```

6.
  &emsp;For link work from email we need to change some in code: \
  </br>
    &emsp;&emsp;6.1 \
      &emsp;&emsp;&emsp;&emsp;Find file ```MySite/controller/register.php``` \
      &emsp;&emsp;&emsp;&emsp;change this line: \
      &emsp;&emsp;&emsp;&emsp;```http://93.113.64.122:33331/controller/verify-mail.php?email='.$email.'&hash='.$hash.'``` \
      &emsp;&emsp;&emsp;&emsp;to \
      &emsp;&emsp;&emsp;&emsp;```http://localhost<!--: you custom port -->/controller/verify-mail.php?email='.$email.'&hash='.$hash.'```

   &emsp;&emsp;6.2 \
      &emsp;&emsp;&emsp;&emsp;Same for ```MySite/controller/restore_password_mail.php``` \
      &emsp;&emsp;&emsp;&emsp;change this line: \
      &emsp;&emsp;&emsp;&emsp;```http://93.113.64.122:33331/view/reset_password.php? ```\
      &emsp;&emsp;&emsp;&emsp;to: \
      &emsp;&emsp;&emsp;&emsp;```http://localhost<!--: you custom port -->/view/reset_password.php?```



