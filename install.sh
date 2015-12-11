echo Goint to setup VKCM

#
# * General
#
# Node modules
npm install --dev

# GULP initial tasks
gulp compile
gulp less
gulp browserify

#
# * API server
#
cd ..
# Node modules

npm install --dev
echo "Done"
