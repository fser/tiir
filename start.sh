#!/usr/bin/env bash

docker build -t tiir .
docker run -i -t -p 80:80 tiir 
