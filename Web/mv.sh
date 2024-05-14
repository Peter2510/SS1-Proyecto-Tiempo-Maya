#!/bin/bash

# Second, clean the build directory
rm -rf /opt/lampp/htdocs/tiempo-maya

# First, create the build directory in htdocs folder
mkdir /opt/lampp/htdocs/tiempo-maya

# Third, copy the files from the Web folder to the build directory
cp -r ../Web/* /opt/lampp/htdocs/tiempo-maya
