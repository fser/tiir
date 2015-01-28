#!/usr/bin/env bash

# full clean
# docker rmi $(docker images -q)
docker ps -a | awk '!/CONTAINER/ { print $1 }' | xargs docker rm

