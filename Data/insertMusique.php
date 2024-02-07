<?php

try {
    $file_db = new PDO('sqlite:bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Album 1
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Whiteys Theme', '6:08', 1),
    ('My Prayer', '2:29', 1),
    ('Señorita', '3:22', 1),
    ('H.H.T.', '4:08', 1),
    ('Nothing Good is Real', '3:48', 1),
    ('Cuts and Scars', '2:10', 1)");

// Album 2
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Hutterite Mile', '4:04', 2),
    ('Outlaw Song', '4:29', 2),
    ('Blessed Persistence', '4:06', 2),
    ('Alone and Forsaken', '2:49', 2),
    ('Single Girl', '2:35', 2),
    ('Beyond the Pale', '3:45', 2),
    ('Horse Head Fiddle', '4:50', 2),
    ('Sinnerman', '4:15', 2),
    ('Flutter', '4:04', 2),
    ('La Robe a Parasol', '2:14', 2)");

// Album 3
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Argument with David Rawlings Concerning Morrissey', '0:37', 3),
    ('To Be Young (Is to Be Sad, Is to Be High)', '3:04', 3),
    ('My Winding Wheel', '3:13', 3),
    ('AMY', '3:46', 3),
    ('Oh My Sweet Carolina', '4:57', 3),
    ('Bartering Lines', '3:59', 3),
    ('Call Me On Your Way Back Home', '3:09', 3),
    ('Damn, Sam (I Love a Woman That Rains)', '2:08', 3),
    ('Come Pick Me Up', '5:18', 3),
    ('To Be the One', '3:01', 3),
    ('Why Do They Leave?', '3:38', 3),
    ('Shakedown on 9th Street', '2:53', 3),
    ('Dont Ask for the Water', '2:56', 3),
    ('In My Time of Need', '5:39', 3),
    ('Sweet Lil Gal (23rd/1st)', '3:39', 3)");

// Album 4
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Gimme Something Good', '3:54', 4),
    ('Kim', '3:26', 4),
    ('Trouble', '3:47', 4),
    ('Am I Safe', '4:32', 4),
    ('My Wrecking Ball', '3:08', 4),
    ('Stay With Me', '3:06', 4),
    ('Shadows', '5:22', 4),
    ('Feels Like Fire', '4:25', 4),
    ('I Just Might', '3:29', 4),
    ('Tired of Giving Up', '3:40', 4),
    ('Let Go', '3:43', 4)");

// Album 5
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('The Ballad of Carol Lynn', '3:04', 5),
    ('Dont Wanna Know Why', '3:59', 5),
    ('Jacksonville Skyline', '3:01', 5),
    ('Reasons to Lie', '3:30', 5),
    ('Dont Be Sad', '3:21', 5),
    ('Sit & Listen to the Rain', '4:05', 5),
    ('Under Your Breath', '3:28', 5),
    ('Mirror, Mirror', '3:15', 5),
    ('Paper Moon', '4:42', 5),
    ('What the Devil Wanted', '3:38', 5),
    ('Crazy About You', '2:46', 5),
    ('My Hometown', '2:46', 5),
    ('Easy Hearts', '5:08', 5),
    ('Bar Lights', '3:56', 5),
    ('To Be Evil (Hidden track)', '3:44', 5)");

// Album 6
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Queen of the Underworld', '3:42', 6),
    ('TKO', '3:26', 6),
    ('Wendy', '3:27', 6),
    ('Downliner', '4:10', 6),
    ('Brooklyn', '4:34', 6),
    ('The Fine Art of Self Destruction', '3:54', 6),
    ('Riding on the Subway', '4:13', 6),
    ('High Lonesome', '4:05', 6),
    ('Solitaire', '4:19', 6),
    ('Almost Grown', '3:04', 6),
    ('Xmas', '3:30', 6),
    ('Cigarettes and Violets', '4:05', 6),
    ('Brooklyn (Walt Whitman in the Trash)', '4:57', 6)");

// Album 7
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Vendetta', '00:38', 7),
    ('Collar', '00:54', 7),
    ('Coma For $$$', '01:15', 7),
    ('Riot', '00:45', 7),
    ('Inside My Brain', '01:49', 7),
    ('No Roolz', '00:43', 7),
    ('Snakes & Scorpions', '00:54', 7),
    ('Never Ever', '01:22', 7),
    ('Run It Down', '00:55', 7),
    ('Wasted Hours', '01:14', 7),
    ('Hunger Pain', '01:42', 7),
    ('Nail & Tooth', '01:19', 7),
    ('No Slaves', '01:20', 7),
    ('See No Skin', '01:16', 7),
    ('Secret 66', '02:21', 7),
    ('Too Stoopid', '01:35', 7),
    ('Casper Lynch', '02:20', 7),
    ('Punk''s Dead Let''s Fuck', '03:54', 7),
    ('What Is It', '02:11', 7),
    ('The Finger', '06:35', 7)");


// Album 8
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Political Scientist', '4:33', 8),
    ('Afraid Not Scared', '4:13', 8),
    ('This House Is Not for Sale', '3:53', 8),
    ('Anybody Wanna Take Me Home', '5:31', 8),
    ('Love Is Hell', '3:19', 8),
    ('Wonderwall', '4:09', 8),
    ('The Shadowlands', '5:18', 8),
    ('World War 24', '4:17', 8),
    ('Avalanche', '5:09', 8),
    ('My Blue Manhattan', '2:23', 8),
    ('Please Do Not Let Me Go', '3:37', 8),
    ('City Rain, City Streets', '3:49', 8),
    ('I See Monsters', '3:57', 8),
    ('English Girls Approximately', '5:42', 8),
    ('Thank You Louise', '2:52', 8),
    ('Hotel Chelsea Nights', '00:00', 8)");

// Album 9
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Sleeper', '4:35', 9),
    ('In My Time of Need', '4:33', 9),
    ('Rosemary Moore', '5:15', 9),
    ('Caleb Meyer', '2:31', 9),
    ('Motherland', '4:44', 9),
    ('Wings', '4:01', 9),
    ('Rexroth''s Daughter', '5:19', 9),
    ('Elvis Presley Blues', '4:40', 9),
    ('King''s Highway', '3:28', 9),
    ('Christmas in Washington', '5:13', 9)");

// Album 10
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Rainy Day Blues', '5:32', 10),
    ('Songbird', '2:40', 10),
    ('Blue Hotel', '3:30', 10),
    ('Back to Earth', '2:59', 10),
    ('Stella Blue', '6:23', 10),
    ('Hallelujah', '4:53', 10),
    ('$1000 Wedding', '3:05', 10),
    ('We Don''t Run', '4:19', 10),
    ('Yours Love', '3:03', 10),
    ('Sad Songs and Waltzes', '3:17', 10),
    ('Amazing Grace', '4:49', 10)");

// Album 11
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Mining for Gold', '1:36', 11),
    ('Misguided Angel', '4:49', 11),
    ('Blue Moon Revisited (Song for Elvis)', '5:38', 11),
    ('I Don''t Get It', '3:54', 11),
    ('I''m So Lonesome I Could Cry', '6:16', 11),
    ('To Love Is to Bury', '3:32', 11),
    ('200 More Miles', '5:18', 11),
    ('Dreaming My Dreams with You', '3:52', 11),
    ('Working on a Building', '6:38', 11),
    ('Sweet Jane', '8:45', 11),
    ('Postcard Blues', '3:36', 11),
    ('Walkin'' After Midnight', '5:20', 11)");

// Album 12
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Signal Fade', '2:49', 12),
    ('Imminent Galactic War', '1:49', 12),
    ('Disappyramid', '2:13', 12),
    ('Fire Away', '1:02', 12),
    ('Defenders of the Galaxy', '1:36', 12),
    ('Fire and Ice', '3:49', 12),
    ('By Force', '2:35', 12),
    ('Ghorgon, Master of War', '2:33', 12),
    ('Ariel', '1:52', 12),
    ('Electro Snake', '1:44', 12),
    ('Victims of the Ice Brigade', '2:06', 12),
    ('2,000 Ships', '1:48', 12),
    ('End of Days', '2:26', 12)");

// Album 13
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Anyone But Me (Dial Tone)', '4:18', 13),
    ('Don''t Wanna Know Why', '4:03', 13),
    ('Easy Hearts', '4:01', 13),
    ('Sittin'' Around', '4:06', 13),
    ('Rays of Burning Light (Rays of Light)', '4:50', 13),
    ('Ghost Without Memory', '4:55', 13),
    ('Runnin'' Out of Road', '3:35', 13),
    ('Can''t Take A Lover (Talkin'' In My Sleep)', '2:19', 13),
    ('I Don''t Care What You Think About Me', '4:26', 13),
    ('Crazy Lonesome (A Memory Away)', '2:20', 13),
    ('Caroline', '4:10', 13)");

// Album 14
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Sound & Color', '3:02', 14),
    ('Don''t Wanna Fight', '3:53', 14),
    ('Dunes', '4:18', 14),
    ('Future People', '3:22', 14),
    ('Gimme All Your Love', '4:03', 14),
    ('This Feeling', '4:29', 14),
    ('Guess Who', '3:16', 14),
    ('The Greatest', '3:50', 14),
    ('Shoegaze', '2:59', 14),
    ('Miss You', '3:47', 14),
    ('Gemini', '6:36', 14),
    ('Over My Head', '3:51', 14)");

// Album 15
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Amarillo Highway (for Dave Hickey)', '04:00', 15),
    ('High Plains Jamboree', '03:33', 15),
    ('The Great Joe Bob (a Regional Tragedy)', '04:42', 15),
    ('The Wolfman of Del Rio', '05:38', 15),
    ('Lubbock Woman', '03:36', 15),
    ('The Girl Who Danced Oklahoma', '04:18', 15),
    ('Truckload of Art', '05:24', 15),
    ('The Collector (and the Art Mob)', '02:02', 15),
    ('Oui (a French Song)', '02:21', 15),
    ('Rendez vous USA', '02:45', 15),
    ('Cocktails for Three', '02:57', 15),
    ('The Beautiful Waitress', '05:37', 15),
    ('High Horse Momma', '03:03', 15),
    ('Blue Asian Reds (for Roadrunner)', '03:47', 15),
    ('New Delhi Freight Train', '07:28', 15),
    ('FFA', '01:11', 15),
    ('Flatland Farmer', '04:18', 15),
    ('My Amigo', '03:20', 15),
    ('The Pink and Black Song', '04:00', 15),
    ('The Thirty Years War Waltz (for Jo Harvey)', '06:32', 15),
    ('I Just Left Myself', '02:09', 15)");

// Album 16
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('The Juarez Device (aka Texican Badman)', '1:22', 16),
    ('The Characters/ A Simple Story', '2:08', 16),
    ('Cortez Sail', '6:10', 16),
    ('Border Palace', '1:47', 16),
    ('Dogwood', '4:31', 16),
    ('Writing On Rocks Across The USA', '2:50', 16),
    ('The Radio...And Real Life', '5:03', 16),
    ('There Oughta Be a Law Against Sunny Southern California', '4:30', 16),
    ('What of Alicia', '5:02', 16),
    ('Honeymoon in Cortez', '2:37', 16),
    ('Four Corners', '4:21', 16),
    ('The Run South', '1:26', 16),
    ('Jabo/Street Walkin'' Woman', '1:40', 16),
    ('Cantina Carlotta', '3:15', 16),
    ('La Despedida (The Parting)', '5:03', 16)");

// Album 17
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Pedal Steel', '35:44', 17),
    ('Fenceline', '2:29', 17),
    ('Rodar Parar Atras', '5:14', 17),
    ('Rollback', '4:39', 17),
    ('Figure Ate', '9:52', 17),
    ('Home On The Range', '3:15', 17),
    ('Further Away', '4:31', 17),
    ('French Home', '1:32', 17)");

// Album 18
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Gone To Texas', '6:22', 18),
    ('Room To Room', '4:12', 18),
    ('Back To Black', '3:27', 18),
    ('Wilderness Of This World', '4:01', 18),
    ('Little Sandy', '3:08', 18),
    ('Buck Naked', '3:12', 18),
    ('What Of Alicia', '4:15', 18),
    ('That Kind Of Girl', '2:44', 18),
    ('Galleria Dele Armi', '4:03', 18),
    ('Crisis Site 13', '3:11', 18),
    ('Peggy Legg', '4:07', 18),
    ('After The Fall', '5:20', 18),
    ('Flatland Boggie', '5:32', 18)");

// Album 19
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('I''m Lost', '2:55', 19),
    ('You', '3:28', 19),
    ('4th of July (Dave Alvin)', '3:32', 19),
    ('In the Time It Takes', '3:09', 19),
    ('Anyone Can Fill Your Shoes', '2:45', 19),
    ('See How We Are', '3:46', 19),
    ('Left & Right', '2:57', 19),
    ('When It Rains...', '4:29', 19),
    ('Holiday Story', '3:36', 19),
    ('Surprise, Surprise', '2:50', 19),
    ('Cyrano de Berger''s Back (John Doe)', '3:33', 19)");

// Album 20
$file_db->exec("INSERT INTO Musique (nomMusique, dure, albumId) VALUES
    ('Harlan County Line', '5:12', 20),
    ('Johnny Ace is Dead', '4:27', 20),
    ('Black Rose of Texas', '4:52', 20),
    ('Gary, Indiana 1959', '4:06', 20),
    ('Run Conejo Run', '4:52', 20),
    ('No Worries Mija (Chris Gaffney)', '3:36', 20),
    ('What''s Up with Your Brother?', '4:44', 20),
    ('Murrietta''s Head', '5:59', 20),
    ('Manzanita (Christy McWilson)', '4:09', 20),
    ('Dirty Nightgown', '5:19', 20),
    ('Two Lucky Bums', '2:28', 20)");


echo "MUSICA";


$file_db->exec("INSERT INTO Utilisateur (nomUtilisateir, emailUtilisateur, MDPutilisateur, roleUtilisateur, DdN, numTel) VALUES
    ('Jean Dupont', 'jean.dupont@email.com', 'mdp123', 'utilisateur', '1990-01-01', '123456789'),
    ('Marie Martin', 'marie.martin@email.com', 'mdp123', 'utilisateur', '1985-05-15', '987654321'),
    ('Pierre Lambert', 'pierre.lambert@email.com', 'mdp123', 'utilisateur', '1998-08-22', '555555555'),
    ('Leni', 'leni', 'mdp123', 'utilisateur', '2004-07-13', '0768438407'),
    ('Admin', 'admin@email.com', 'admin123', 'admin', '1998-08-22', '555555555')");

echo "UTILISATORE";



$userIds = [1, 2, 3, 4];

// Albums fictifs (remplacez les ID par ceux de votre base de données)
$albumIds = range(1, 20);

// Attribuer une note à chaque album pour chaque utilisateur
foreach ($userIds as $userId) {
    foreach ($albumIds as $albumId) {
        // Générer une note aléatoire entre 1 et 5 (modifiable selon vos besoins)
        $randomNote = rand(1, 5);

        // Insertion dans la table Noter
        $file_db->exec("INSERT INTO Noter (albumId, utilisateurId, note) VALUES ($albumId, $userId, $randomNote)");
    }
}


$file_db->exec("INSERT INTO Playlist (nomPlaylist, utiId) VALUES
    ('Ma Playlist', 1),
    ('Playlist de fête', 2)");

$file_db->exec("INSERT INTO PlaylistAlbum (playlistId, albumId) VALUES
    (1, 3),
    (1, 7),
    (1, 10),
    (2, 5),
    (2, 8),
    (2, 12)");

echo "PLAYLIST";
$file_db = null;


?>