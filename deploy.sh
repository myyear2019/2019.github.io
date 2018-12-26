#!/bin/bash

jekyll build
OUTPUT="$(date)"

cd _site
git add .
git checkout master
git commit -m "${OUTPUT}"
git push origin

cd ../
git add .
git commit -m "${OUTPUT}"
git push origin
