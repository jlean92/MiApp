cd "c:\xampp\htdocs\MiApp"
$TODAY= date
$Equipo= hostname
git remote rm origin
git remote add origin https://github.com/jlean92/MiApp.git
git add .
git commit -m "Changes committed: $TODAY from $Equipo"
git push --set-upstream origin main
git pull