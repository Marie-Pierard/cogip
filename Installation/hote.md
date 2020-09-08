# 1. Activer le module de réécriture d’URL dans le serveur Apache.

Editez le fichier httpd.conf se trouvant à l'adresse `C:\wamp\bin\apache\apache2.4.46\conf` et décommettez la ligne suivante :
(Attention le chemin peut changer en fonction de la version de votre apache)

`LoadModule rewrite_module modules/mod_rewrite.so`

# 2. Ajouter un virtual host dans le fichier `httpd-vhosts.conf`

Ce fichier se trouve dans le répertoire suivant: `C:\wamp64\bin\apache\apache2.4.46\conf\extra`
(Attention le chemin peut changer en fonction de la version de votre apache)

A la fin du fichier copiez/collez le code suivant en modifiant les informations concernant votre configuration :

```
<VirtualHost *:80>
  DocumentRoot "ADRESSE_DU_PROJET/cogit/MVC/public"
  ServerName cogit.test
  <Directory "ADRESSE_DU_PROJET/cogit/MVC/public">
    Options +Indexes +FollowSymLinks +MultiViews
    AllowOverride All
    require all granted
  </Directory>
</VirtualHost>
```

`ADRESSE_DU_PROJET` - Chez moi par exemple ces `C:/Users/Hp/BeCode/github`

# 3. Modifier le fichier host du système Windows

Dans votre disque C, éditez le fichier suivant :

`C:\Windows\System32\drivers\etc\hosts`

(Attention, il faut ouvrir ce fichier en mode “Administrateur” pour pouvoir sauvegarder) 
ouvrir blocnote en mode administrateur puis ouvrir le fichier 

Copiez/collez à la fin du fichier la ligne suivante :

`127.0.0.1 cogit.test`

# 4. Dernière étape

Dès que ces actions sont terminées, vous pouvez relancer le service apache.