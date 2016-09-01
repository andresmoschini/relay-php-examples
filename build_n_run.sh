#!/bin/bash

docker build -t $1 $1
docker run -it -rm $1
