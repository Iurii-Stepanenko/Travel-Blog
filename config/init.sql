DROP DATABASE IF EXISTS iuriis_travel_blog;

DROP USER IF EXISTS 'iuriis_travel_blog_user'@'%';

CREATE DATABASE iuriis_travel_blog;

CREATE USER 'iuriis_travel_blog_user'@'%' IDENTIFIED BY '45Ya!$""sT&P*C%RNSEhr';

GRANT ALL ON iuriis_travel_blog.* TO 'iuriis_travel_blog_user'@'%';