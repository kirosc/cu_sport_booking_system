# CU Sport Booking System

![homepage](./docs/Screenshots/PC/Student/Homepage%20After%20Login.png)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![standard-readme compliant](https://img.shields.io/badge/readme%20style-standard-brightgreen.svg?style=flat-square)](https://github.com/RichardLitt/standard-readme)
![MicroBadger Size](https://img.shields.io/microbadger/image-size/kirosc/cu-sport-apache)
## Background
A software engineering course project. We discover that booking a sports facility in CUHK may be very confusing. Therefore, few students studying in CUHK join together to make this project possible. We hope to make the procedure of booking a sports facility easy and fun at the same time. We also hope to incentive students to do more exercise and find ways to give coaches opportunities to earn money and teach students. So we come up with this website, hoping students and coaches would like it!

* [Demo website](https://kirosc.duckdns.org/cu_sport_booking_system/)
* [Documentation](https://github.com/kirosc/cu_sport_booking_system/tree/master/docs)

## Prerequisites
* Docker
* Docker-compose
* Apache
* MySQL (MariaDB)
* php

## Build Docker Image
Run the command in the root project directory. The Dockerfile is located under `docker`.
### Apache + php7.3
```
docker build -f docker/apache/Dockerfile . -t kirosc/cu-sport-apache
```

## Usage

Run using Docker Compose.
```
docker-compose up
```
> To run in `localhost`, use self-signed certificate. OR, change the `SERVER_NAME` in `docker-compose.yml`. Delete SSL Virtual Host and redirection in `config`.

## Screenshots
![booking](./docs/Screenshots/PC/Student/Browse%20Facility.png)
![payment](./docs/Screenshots/PC/Student/Book%20Facility.png)
![location](./docs/Screenshots/PC/Student/Location%20Map.png)

* [More screenshots](https://github.com/kirosc/cu_sport_booking_system/tree/master/docs/Screenshots)


## Authors
* **Choi Ki Fung, Kiros** - *UX/UI Designer & Front-End Developer & Cloud Developer* - [KirosC](https://github.com/kirosc)
* **Tsang Ka Hung** - *Back-End Developer* - [kennydc822](https://github.com/kennydc822)
* **Yung King Fung** - *Developer & Tester*
* **Mok Tsun Ting** - *Database Developer*
* **Chan Man Hung** - *Developer & Tester*

## License
[MIT ©](./LICENSE)

## Acknowledgement
* [CodeIgniter](https://codeigniter.com/) - php framework, provide simple and elegant toolkit to create full-featured web applications
* [Bootstrap](https://getbootstrap.com/) - Respoonsive CSS framework
* [Bootstrap Table](https://bootstrap-table.com/) - Extended table integration
* [Date Range Picker](http://www.daterangepicker.com/) - A JavaScript component for choosing date ranges, dates and times
* [Docker](https://www.docker.com/) - Container platform
* [jQuery](https://jquery.com/) - Fast, small, and feature-rich JavaScript library
* [Moment.js](https://momentjs.com/) - Parse, validate, manipulate, and display dates and times in JavaScript
* [Popper.js](https://popper.js.org/) - Manage poppers in web applications
