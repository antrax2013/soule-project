Pour que les scripts de debug fonctionnent renseignez dans le fichier php.conf sous linux ou php.ini sous windows comme ci-dessous
 1-> enlever le ";"
 2-> modifier la ligne comme par exemple: include_path = ".;${path}\php\includes;D:\Workspace\SR\SR V0.2\library\;"