labs
====

Experimentos sobre php en github

para bajar codigo a la PC
-------------------------

git clone "pegar la version (codigo) Solo lectura - Git Read-Only " del proyecto q quieres copiar


Comandos para git en consola
----------------------------

git config --global user.name "angeltapia" 

git config --global user.email "xxxxxx@xxxx.com"

Generando tu Public Key:

ssh-keygen

guardar la llave en un directorio, poner password

Leyendo tu llave para copiarla a Github:

cat ~/.ssh/id_rsa.pub

Arrancando tu proyecto:(entrar a la carpeta)

git init

touch README

git add README

git commit -m "tu primer commit"

git remote add origin "aqui va el HTTPS" o el "SSH", si esto falla usar:
git remote set-url origin "aki va el https"

git pull origin master --para traer archivos a la carpeta desde github

git push origin master --para insertar archivos a github