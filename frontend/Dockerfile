FROM node:17-alpine as builder

WORKDIR /var/www/frontend

COPY package.json /var/www/frontend/
COPY package-lock.json /var/www/frontend/

RUN npm rebuild node-sass

RUN npm install && npm install node-sass

COPY . /var/www/frontend

RUN npm run build
CMD npm start