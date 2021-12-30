					   #############################
                                           ###### Script GIT PUSH ######
					   #############################

###Script para hacer git add. - git commit (con mensaje) y git push a GitHub con una sola línea de comandos
###evitando estar tipeando credenciales

###INSTRUCCIONES###

##IMPORTANTE:No necesita privilegios sudo para usarse

##Descarga el archivo en la carpeta raíz de tu proyecto o repositorio local

##Haz una copia del archivo (cp gitpushtemplate.sh gitpush.sh)

#Edítalo con tu editor de texto favorito. Por ejemplo -> nano gitpush.sh

##Descomenta las líneas que contienen las variables y escribe las tuyas entre comillas dobles

#Usuario de GitHub
#user=""

#Token de GitHub
#token=""

#Repositorio en GitHub de tu proyecto
#repo=""

#mensaje del commit
mensaje=$@

#Comando que ejecuta la función
git add '.' && git commit '-'m "${mensaje}" && git push https://${token}@github.com/${user}/${repo}.git

##Ejecuta el archivo y escribe los argumentos que serán el mensaje que añadirás al commit (el mensaje va sin entrecomillar)

##Por ejemplo
##sh gitpush.sh Versión 2.0.0

##Esto ejecutará el comando y la ejecución del commit será equivalente a git commit -m "Versión 2.0.0"

##LICENCIA: Eres libre de distribuir y mejorar este script. Se agradece mención al autor

##Rafa Montes
##rafamontes88@gmail.com
##github.com/RafaM88
