cp ./back/api/src/.env.example ./back/api/src/.env

docker-compose up -d --build

npm i --prefix ./front/public/src

docker-compose restart

echo "Install his completed!"