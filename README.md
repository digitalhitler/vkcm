# VKCM
## Map
* `api\` - express-based API server
* `api\index.js` - API server entry point
* `api\pathfinder.js` - router
* `api\map.json` - routes map
* `app\` - front-end application files
* `app\brow\` - browserify bundle root with `index.js` entry point
* `app\engine\` - deprecated PHP-based app backend. Still used to serve frontend files.
* `app\raw\` - deprecated non-browserify JS-files.
* `app\ui\` - deprecated non-browserify & non-less UI framework files.
* `app\less\` - LESS root with `general.less` main file
* `public\` - root of nginx server
* `public\assets\` - assets root. Can be used for custom scripts & styles
* `public\build\` - compiled JS and CSS files from `app\`
* `public\fonts\` - web fonts directory

### Notes
* JSCS rules are in `.jscsrc`. Also there is symbolic link to this file in `api\`
* Please use
