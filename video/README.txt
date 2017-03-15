in php.ini

set post_max_size to 20M
and upload_max_filesize to 20M

Code uses database called videoDB
and table videos

CREATE TABLE videos (
    vid INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    url VARCHAR(255)
);

the upload directory are where all the videos will be stored
