cd "c:\xampp\htdocs\MiApp"
git remote rm origin
git remote add origin https://github.com/jlean92/MiApp.git
git add .
git commit -m "Changes committed: $TODAY from $Equipo"
git push --set-upstream origin main
git pull
ssh root@192.168.1.16 
sh /var/www/html/ActualizarPagina.sh