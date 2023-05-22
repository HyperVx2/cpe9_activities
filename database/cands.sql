-- Generate sample candidates for presidents
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Liana Fuentes', 'Liberal', NULL, 'pres'),
       ('John Smith', 'Independent', NULL, 'pres');

-- Generate sample candidates for vice presidents
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Mikey Knight', 'Liberal', NULL, 'vpres'),
       ('Jane Doe', 'Independent', NULL, 'vpres');

-- Generate sample candidates for representatives in coeng
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1A', 'Party A', 'coeng', 'rep'),
       ('Representative 2A', 'Party B', 'coeng', 'rep'),
       ('Representative 3A', 'Party C', 'coeng', 'rep'),
       ('Representative 4A', 'Party D', 'coeng', 'rep'),
       ('Representative 5A', 'Party E', 'coeng', 'rep');

-- Generate sample candidates for representatives in conhs
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1B', 'Party A', 'conhs', 'rep'),
       ('Representative 2B', 'Party B', 'conhs', 'rep'),
       ('Representative 3B', 'Party C', 'conhs', 'rep'),
       ('Representative 4B', 'Party D', 'conhs', 'rep'),
       ('Representative 5B', 'Party E', 'conhs', 'rep');

-- Generate sample candidates for representatives in cit
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1C', 'Party A', 'cit', 'rep'),
       ('Representative 2C', 'Party B', 'cit', 'rep'),
       ('Representative 3C', 'Party C', 'cit', 'rep'),
       ('Representative 4C', 'Party D', 'cit', 'rep'),
       ('Representative 5C', 'Party E', 'cit', 'rep');

-- Generate sample candidates for representatives in cas
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1D', 'Party A', 'cas', 'rep'),
       ('Representative 2D', 'Party B', 'cas', 'rep'),
       ('Representative 3D', 'Party C', 'cas', 'rep'),
       ('Representative 4D', 'Party D', 'cas', 'rep'),
       ('Representative 5D', 'Party E', 'cas', 'rep');

-- Generate sample candidates for representatives in coed
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1E', 'Party A', 'coed', 'rep'),
       ('Representative 2E', 'Party B', 'coed', 'rep'),
       ('Representative 3E', 'Party C', 'coed', 'rep'),
       ('Representative 4E', 'Party D', 'coed', 'rep'),
       ('Representative 5E', 'Party E', 'coed', 'rep');


-- Generate additional candidates for presidents
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Maria Rodriguez', 'Progressive', NULL, 'pres'),
       ('Andrew Thompson', 'Conservative', NULL, 'pres');

-- Generate additional candidates for vice presidents
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Olivia Parker', 'Progressive', NULL, 'vpres'),
       ('David Johnson', 'Conservative', NULL, 'vpres');

-- Generate additional candidates for representatives in coeng
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6A', 'Party F', 'coeng', 'rep'),
       ('Representative 7A', 'Party G', 'coeng', 'rep'),
       ('Representative 8A', 'Party H', 'coeng', 'rep');

-- Generate additional candidates for representatives in conhs
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6B', 'Party F', 'conhs', 'rep'),
       ('Representative 7B', 'Party G', 'conhs', 'rep'),
       ('Representative 8B', 'Party H', 'conhs', 'rep');

-- Generate additional candidates for representatives in cit
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6C', 'Party F', 'cit', 'rep'),
       ('Representative 7C', 'Party G', 'cit', 'rep'),
       ('Representative 8C', 'Party H', 'cit', 'rep');

-- Generate additional candidates for representatives in cas
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6D', 'Party F', 'cas', 'rep'),
       ('Representative 7D', 'Party G', 'cas', 'rep'),
       ('Representative 8D', 'Party H', 'cas', 'rep');

-- Generate additional candidates for representatives in coed
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6E', 'Party F', 'coed', 'rep'),
       ('Representative 7E', 'Party G', 'coed', 'rep'),
       ('Representative 8E', 'Party H', 'coed', 'rep');
