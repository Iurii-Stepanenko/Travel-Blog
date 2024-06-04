## Local development - domains ##

Add the following domains to the `/etc/hosts` file:

```shell
127.0.0.1 iuriis-blog.local www.iuriis-blog.local mh-prod-iuriis-blog.local
```

Urls list:
- [https://iuriis-blog.local](https://iuriis-blog.local) 
- [https://www.iuriis-blog.local](https://www.iuriis-blog.local) 
- [http://mh-prod-iuriis-blog.local](http://mh-prod-iuriis-blog.local)


## Local development - self-signed certificates ##

Generate self-signed certificates before running this composition in the `$SSL_CERTIFICATES_DIR`:

```shell
mkcert -cert-file=iuriis-blog.local-prod.pem -key-file=iuriis-blog.local-prod-key.pem iuriis-blog.local www.iuriis-blog.local
```

Add these keys to the Traefik configuration file if needed.