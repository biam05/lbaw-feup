#!/bin/bash

FLAGS=""

for opt in $@
do
    case $opt in
        -*|--*)
            FLAGS=$FLAGS" "$opt
            ;;
    esac
done

docker run $FLAGS --name lbaw2114 -it -p 8000:80 -v $PWD/html:/var/www/html lbaw2114/lbaw2114-piu

echo "\n"
echo ">> RUNNING LBAW2114 on http://localhost:8000"
echo ">> TO STOP: docker stop lbaw2114\n"
echo "\n"
