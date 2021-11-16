FROM nginx:1.21.4-alpine

COPY ./docker/nginx/default.conf /etc/nginx/conf.d/

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]