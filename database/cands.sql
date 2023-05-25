-- Generate sample candidates for presidents
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Liana Fuentes', 'Liberal', NULL, 'president'),
       ('John Smith', 'Independent', NULL, 'president'),
       ('Maria Rodriguez', 'Progressive', NULL, 'president'),
       ('Andrew Thompson', 'Conservative', NULL, 'president');

-- Generate sample candidates for vice presidents
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Mikey Knight', 'Liberal', NULL, 'vpresident'),
       ('Jane Doe', 'Independent', NULL, 'vpresident'),
       ('Olivia Parker', 'Progressive', NULL, 'vpresident'),
       ('David Johnson', 'Conservative', NULL, 'vpresident');

-- Generate sample candidates for representatives in coeng
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1A', 'Party A', 'coeng', 'representative'),
       ('Representative 2A', 'Party B', 'coeng', 'representative'),
       ('Representative 3A', 'Party C', 'coeng', 'representative'),
       ('Representative 4A', 'Party D', 'coeng', 'representative'),
       ('Representative 5A', 'Party E', 'coeng', 'representative');

-- Generate sample candidates for representatives in conhs
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1B', 'Party A', 'conhs', 'representative'),
       ('Representative 2B', 'Party B', 'conhs', 'representative'),
       ('Representative 3B', 'Party C', 'conhs', 'representative'),
       ('Representative 4B', 'Party D', 'conhs', 'representative'),
       ('Representative 5B', 'Party E', 'conhs', 'representative');

-- Generate sample candidates for representatives in cit
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1C', 'Party A', 'cit', 'representative'),
       ('Representative 2C', 'Party B', 'cit', 'representative'),
       ('Representative 3C', 'Party C', 'cit', 'representative'),
       ('Representative 4C', 'Party D', 'cit', 'representative'),
       ('Representative 5C', 'Party E', 'cit', 'representative');

-- Generate sample candidates for representatives in cas
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1D', 'Party A', 'cas', 'representative'),
       ('Representative 2D', 'Party B', 'cas', 'representative'),
       ('Representative 3D', 'Party C', 'cas', 'representative'),
       ('Representative 4D', 'Party D', 'cas', 'representative'),
       ('Representative 5D', 'Party E', 'cas', 'representative');

-- Generate sample candidates for representatives in coed
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 1E', 'Party A', 'coed', 'representative'),
       ('Representative 2E', 'Party B', 'coed', 'representative'),
       ('Representative 3E', 'Party C', 'coed', 'representative'),
       ('Representative 4E', 'Party D', 'coed', 'representative'),
       ('Representative 5E', 'Party E', 'coed', 'representative');

-- Generate additional candidates for representatives in coeng
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6A', 'Party F', 'coeng', 'representative'),
       ('Representative 7A', 'Party G', 'coeng', 'representative'),
       ('Representative 8A', 'Party H', 'coeng', 'representative');

-- Generate additional candidates for representatives in conhs
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6B', 'Party F', 'conhs', 'representative'),
       ('Representative 7B', 'Party G', 'conhs', 'representative'),
       ('Representative 8B', 'Party H', 'conhs', 'representative');

-- Generate additional candidates for representatives in cit
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6C', 'Party F', 'cit', 'representative'),
       ('Representative 7C', 'Party G', 'cit', 'representative'),
       ('Representative 8C', 'Party H', 'cit', 'representative');

-- Generate additional candidates for representatives in cas
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6D', 'Party F', 'cas', 'representative'),
       ('Representative 7D', 'Party G', 'cas', 'representative'),
       ('Representative 8D', 'Party H', 'cas', 'representative');

-- Generate additional candidates for representatives in coed
INSERT INTO voting_system.candidates (name, party, program, position)
VALUES ('Representative 6E', 'Party F', 'coed', 'representative'),
       ('Representative 7E', 'Party G', 'coed', 'representative'),
       ('Representative 8E', 'Party H', 'coed', 'representative');
