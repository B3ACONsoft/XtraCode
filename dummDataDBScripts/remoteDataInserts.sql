INSERT INTO sport (sport_id, sport_name) VALUES (NULL, 'SOCCER');
INSERT INTO sport (sport_id, sport_name) VALUES (NULL, 'FOOTBALL');
INSERT INTO sport (sport_id, sport_name) VALUES (NULL, 'BASKETBALL');
INSERT INTO sport (sport_id, sport_name) VALUES (NULL, 'POLO');
INSERT INTO sport (sport_id, sport_name) VALUES (NULL, 'TENNIS');

INSERT INTO league VALUES (NULL, 'OXFORD PARKS AND RECREATION', 1, 0, 100, '15-MAR-2016', '15-JUN-2016');
INSERT INTO league VALUES (NULL, 'DURHAM KICKERS', 1, 0, 100, '15-MAR-2016', '15-JUN-2016');
INSERT INTO league VALUES (NULL, 'GELA PARK SERVICE', 1, 0, 100, '15-MAR-2016', '15-JUN-2016');
INSERT INTO league VALUES (NULL, 'STOVALL-SHAW COMPETITIVE SPITTERS', 1, 0, 100, '15-MAR-2016', '15-JUN-2016'); 

INSERT INTO users VALUES(NULL, 'HENRY A.', 'JOHNSON', 5434327890, 2323548302, 'IMNOTRESPONSIBLEFORTHETEES@SORRY.COM', 'ADMIN', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'PATRICK', 'CURRIN', 9196932121, 9196938011, 'CURRIN.PATRICK@YAHOO.COM', 'ADMIN', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'PATRICIA', 'ARQUETTE', 9195772938, 8488372987, 'PATARQ@GODADDY.COM', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'SAM', 'NEIL', 9191594896, 1548693584, 'JURASSIC@PARK.AAH', 'COACH', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'TIMOTHY', 'SWEET', 5684596325, 5467913468, 'HOTDUDE@SMELLSLIKEBACON.NET', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'SNARKY', 'PARENT', 5847856983, 1485214852, 'IGAVEBIRTHTOSATAN@HITLERYOUTH.EDU', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'TOM', 'CLANCY', 1548965325, 5848569587, 'TOOMANYCRIMENOVELS@MYDESK.COM', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'KERRI', 'PLYMOUTH', 5124845796, 1547854256, 'LANDEDONMAY@THEROCK.COM', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'BARRY', 'LONGFELLOW', 1548512457, 2563526589, 'STRETCH@ARMSTRONG.COM', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'INPUT', 'M''DHATA', 1010010100, 0100100001, 'ONOFFOFFON@SOCKET.COM', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'MESO', 'SAHOOP', 3451849765, 3164527548, 'HEALTHYLIVING@FAREAST.NET', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'GUY', 'CLARK', 5431642758, 1245679185, 'LIVE@THEBLUEBIRDCAFE.COM', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'CHERRIE', 'BERRY', 6645122436, 5487548151, 'LOVEINANELEVAT@AEROLIFT.COM', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'COUNT', 'CHOCULA', 3164527548, 6664516666, 'ILOVETOCOUNTTHINGS@ANYWHERE.COM', 'USER', 'PASSWORD');
INSERT INTO users VALUES(NULL, 'COUNT', 'BASSY', 2548752145, 5326547852, 'BANGSOUNDTHORUGHD@WINDA.NET', 'COACH', 'PASSWORD');

INSERT INTO team VALUES(NULL, 1, 'YETIS', 15);
INSERT INTO team VALUES(NULL, 1, 'ROCKERS', 15);
INSERT INTO team VALUES(NULL, 1, 'KNICKS', 15);
INSERT INTO team VALUES(NULL, 1, 'LAKERS', 15);
INSERT INTO team VALUES(NULL, 1, 'YETIKILLERS', 15);
INSERT INTO team VALUES(NULL, 1, 'ROCKETS', 15);
INSERT INTO team VALUES(NULL, 2, 'REDSKINS', 15);
INSERT INTO team VALUES(NULL, 2, 'FLYERS', 15);
INSERT INTO team VALUES(NULL, 2, 'REDSOX', 15);
INSERT INTO team VALUES(NULL, 3, 'CHARGERS', 15);
INSERT INTO team VALUES(NULL, 3, 'LAKERS', 15);
INSERT INTO team VALUES(NULL, 3, 'KNICKS', 15);
INSERT INTO team VALUES(NULL, 4, 'PICKEDLASTS', 15);

INSERT INTO place VALUES(NULL, 'RAINBOW FIELD', '5565 DUCK RUN', 'CHAPEL HILL', 'NC', '27517' );
INSERT INTO place VALUES(NULL, 'OXFORD PARK RECREATIONAL CENTER', '122 SPRING STREET', 'OXFORD', 'NC', '27565');
INSERT INTO place VALUES(NULL, 'CARMICHAEL INDOOR STADIUM', '526 DURHAM RD.', 'CHAPEL HILL', 'NC', '27514');
/*INSERT INTO event VALUES(NULL, 'PRACTICE', TO_DATE('2003/05/03 19:00:00', 'yyyy/mm/dd hh24:mi:ss'), 1, 5, NULL); 
INSERT INTO event VALUES(NULL, 'GAME', TO_DATE('2003/07/03 14:00:00', 'yyyy/mm/dd hh24:mi:ss'), 1, 5, 6);*/

INSERT INTO enrollment VALUES(NULL, 1, 1, 1, 1,  '12-APR-2015', 0);
INSERT INTO enrollment VALUES(NULL, 1, 6, 2, 1, '03-MAR-2016', 0);/*NOT A FOREIGN KEY VIOLATION, kids on different teams...*/



