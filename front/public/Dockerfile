FROM node:18-alpine
EXPOSE 5173

RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app

COPY src /usr/src/app

# RUN npm install для прода
CMD ["npm", "start"]
