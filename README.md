WebGLChessServer
================

Purpose
=======

This server application serves the JSON string for the WebGL Chess Application

The "/" route is a UI that the user can use to "play" the game.

The "/game" route serves up the JSON string for the WebGL Chess Application to process and "play out"

This application allows for testing the consistent pinging of a game and playing an active game

Usage
=====

The Add Moves will "play" the specified number of moves from the game we we're supplied

The Restart Game will set the game back to the beginning so pinging the server for the game will result in a game with no moves played.

The application will have to be set up locally and can only be used when testing the WebGL application only.

You need to have a server running (possibly rewrite mod may be neccessary), and PHP installed (min version is what Laravel 4 requires), no database is needed. The DocumentRoot should be pointed to /laravel/public/

The JSON files base.json, current.json, and full.json may need more permissions, especially current.json which is written to.