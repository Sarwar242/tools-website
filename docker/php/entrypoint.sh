#!/bin/sh
set -eu

cd /var/www/html

if [ -f package.json ] && [ ! -f public/build/manifest.json ]; then
    echo "Vite manifest missing, building frontend assets..."

    if [ ! -x node_modules/.bin/vite ] && [ ! -f node_modules/vite/bin/vite.js ]; then
        npm install
    fi

    npm run build
fi

exec "$@"
