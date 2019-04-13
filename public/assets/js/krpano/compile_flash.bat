@echo off

ECHO compile pluginexample.as to pluginexample.swf...

set PATH=.\flexsdk\bin;%PATH%

mxmlc pluginexample.as 1>nul

pause
