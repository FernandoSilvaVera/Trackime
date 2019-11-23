@echo off

title Instalador Trackime

:inicio
Color 07
cls
echo **************************
echo *****-=[Instalador]=-*****
echo **************************
echo 1) Instalar Trackime
echo 2) Configurar fichero .env
echo 3) Regenerar fichero .env
echo **************************
echo 4) Salir
echo **************************
echo.

set /p var=Seleccione una opcion [1-4]:
if "%var%"=="1" goto op1
if "%var%"=="2" goto op2
if "%var%"=="3" goto op3
if "%var%"=="4" goto salir

echo. El numero "%var%" no es una opcion valida, por favor intente de nuevo.
echo.
pause
echo.
goto inicio

:op1
color 08
cls
echo.
echo. Instalando Trackme
echo.
powershell.exe -command "composer install"
Copy /-Y .env.example .env
php artisan key:generate
echo.
pause
goto inicio

:op2
color 09
cls
echo.
echo. Abriendo fichero de configuracion
echo.
start C:\Windows\System32\notepad.exe ".env"
echo.
pause
goto inicio

:op3
color 0A
cls
echo.
echo. Remplazando el fichero .env
echo.
Copy /-Y .env.example .env
echo.
pause
goto inicio

:salir
@cls&exit
