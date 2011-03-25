DROP TABLE tekstit;
CREATE TABLE tekstit (
    sivu        INT             NOT NULL,
    kohta       INT             NOT NULL,
    teksti      NTEXT,
    PRIMARY KEY(sivu,kohta)
);

DROP TABLE permissions;
CREATE TABLE permissions (
);

INSERT INTO news (id,title,text,time)
VALUES (1,"css3","Jotain css3-määrityksiä saattaa olla, mutta miksipä ei opiskelisi myös niitä.",1299272918);

INSERT INTO tag
VALUES (1,"testi");
INSERT INTO tag
VALUES (1,"testi2");
INSERT INTO tag
VALUES (1,"testi3");
INSERT INTO tag
VALUES (1,"testi4");