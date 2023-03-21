FROM openjdk:21-ea-13-jdk-bullseye

RUN apt update && apt install maven -y
