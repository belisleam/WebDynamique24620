CREATE DATABASE project;

CREATE TABLE user(
userId INT auto_increment NOT NULL PRIMARY KEY,
userName varchar(45) NOT NULL,
userUsername varchar(45) NOT NULL,
userPassword varchar(100) NOT NULL,
userBirthday DATE
);

CREATE TABLE forum(
forumId INT auto_increment NOT NULL PRIMARY KEY,
forumTitle varchar(255) NOT NULL,
forumArticle TEXT,
forumDate DATE NOT NULL,
forumUserId INT NOT NULL,
CONSTRAINT fk_forumUserId FOREIGN KEY (forumUserId) REFERENCES user (userId)
);

SELECT * FROM project.user;
INSERT INTO user VALUES (null, 'Belisle', 'abelisle', 'admin1234', '1995-02-21');

SELECT * FROM project.forum;
INSERT INTO forum VALUES (null, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', null, '2025-08-20', 1);

INSERT INTO forum VALUES (null, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.', '2025-08-22', 18);
