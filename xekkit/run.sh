#!/bin/bash

FLAGS=""
DOCKER_CONTAINER="lbaw2114"

for opt in $@
do
    case $opt in
        -*|--*)
            FLAGS=$FLAGS" "$opt
            ;;
    esac
done

if [ ! "$(docker ps -q -f name=$DOCKER_CONTAINER)" ]; then
    if [ "$(docker ps -aq -f status=exited -f name=$DOCKER_CONTAINER)" ]; then
        docker start $FLAGS $DOCKER_CONTAINER
    else
    # run your container
    docker run $FLAGS --name $DOCKER_CONTAINER -it -p 8000:80 -v $PWD/html:/var/www/html lbaw2114/lbaw2114-piu
    fi
    echo "\n"
    echo ">> RUNNING LBAW2114 on http://localhost:8000"
    echo ">> TO STOP: docker stop lbaw2114"
    echo "\n\n"
fi
