Cargar la base de daos que se encuentra en:
BD/libros.sql

# BibliotecaMVC
Proyecto realizado con el patrón MVC y rutas amigables 
Proyecto realizado por Miguel Angel

Recuerda el proyecto funciona con rutas amigables
si no te funciona y estas utilizando Laragon como servidor
tienes que hacer unas configuraciones el archivo (httpd.conf)

Abres Laragon y en la parte de menu seleccionas apache
en ese apartado encuentras en cuentras: httpd.conf

Buscas el AllowOverride
Al principio estara en none y se tiene que cambiar a All
AllowOverride All, guaras y reinicias tu servidor
y en el mismo archivo verifiquen que el mod_rewrite
este activo les tiene que aparecer de esta forma
LoadModule rewrite_module modules/mod_rewrite.so sin el #

con esas configuraciones les debe de funcionar sin problemas
