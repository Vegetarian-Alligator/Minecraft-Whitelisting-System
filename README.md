Minecraft-Whitelisting-System
=============================

This is a system designed to allow users with the proper activation code to whitelist themselves on a minecraft server, public or private.  Only users with an activaton code may whitelist themselves, and only whitelisted users may play.

This implementation depends on the Minecraft Server being run with Mojang.  It also depends upon a linux named pipe, and the proper permissions.  In its current state, this system will run only under Unix.

Goal: Use Mojang's login system rather than our own as described in the following document.

http://wiki.vg/Authentication
