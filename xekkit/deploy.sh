#!/bin/bash

# Stop execution if a step fails
set -e

DOCKER_USERNAME=lbaw2114 # Replace by your docker hub username
DOCKER_PASSWORD=rumo_ao_20
IMAGE_NAME=lbaw2114-piu


echo $DOCKER_PASSWORD | docker login --username $DOCKER_USERNAME  --password-stdin
docker build -t $DOCKER_USERNAME/$IMAGE_NAME .
docker push $DOCKER_USERNAME/$IMAGE_NAME
