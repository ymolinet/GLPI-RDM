GLPI-RDM
========

Plugin GLPI pour RDM.
RDM pour RemoteDesktopManager : http://remotedesktopmanager.com/
RDM est un outil de centralisation de prise de contrôle à distance sous Windows.
La version Standard (gratuite) prend uniquement en charge un fichier XML comme source de données.
La version Entreprise (payante) prend en charge, entre autre, une base de données MariaDB, Mysql, SQL Server.

Ce plugin doit permettre :
  1. de spécifier, pour chaque ordinateur declaré dans GLPI, le moyen de connection : RDP, VNC, Putty, Web, ...
  2. de spécifier, pour chaque ordinateur declaré dans GLPI, l'interface IP à prendre en compte
  3. de convertir une entité en dossier (groupe) dans RDM.
  4. d'alimenter la base de données Mysql/MariaDB de RDM depuis GLPI.
  5. d'exporter sous forme XML ce même contenu (4).
