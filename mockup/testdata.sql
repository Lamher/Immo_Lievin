START TRANSACTION;

INSERT INTO categories (`name`) VALUES ('Maison'), ('Appartement'), ('Terrain à bâtir'), ('Jardin'), ('Garage'), ('Parking'), ('Immobilier professionnel');
SELECT @category := Last_insert_id();

INSERT INTO addresses (`street_number`, `street_name`, `postal_code`, `city`, `country`) VALUES (05, 'Rue des tests', 62000, 'Calais', 'France'), (05, 'Rue des tests', 62000, 'Calais', 'France'), (05, 'Rue des tests', 62000, 'Calais', 'France'), (05, 'Rue des tests', 62000, 'Calais', 'France'), (05, 'Rue des tests', 62000, 'Calais', 'France'), (05, 'Rue des tests', 62000, 'Calais', 'France'), (05, 'Rue des tests', 62000, 'Calais', 'France'), (05, 'Rue des tests', 62000, 'Calais', 'France'), (05, 'Rue des tests', 62000, 'Calais', 'France'), (05, 'Rue des tests', 62000, 'Calais', 'France');
SELECT @address := Last_insert_id();

INSERT INTO users (`name`, `surname`, `mail`, `password`, `id_address`) VALUES ('Hermant', 'Thomas', 'cleyam@gmail.com', '$2y$10$NP.M/C2qqSP.EMydAJiSseSb1sx4SZBhf13ZcdW62W1IyJKZLxCP6', @address), ('Lamorski', 'Philippe', 'philippe.lamorski@gmail.com', '$2y$10$BlKzqUNK4bDwYsjKzsxOpeh5YDUxwhZFrm8d.Zm4nfKqW2t4o2ByG', @address+1), ('Dupont', 'Jean', 'test@gmail.com', '$2y$10$NP.M/C2qqSP.EMydAJiSseSb1sx4SZBhf13ZcdW62W1IyJKZLxCP6', @address+2);
SELECT @user := Last_insert_id();

INSERT INTO messages (`object`, `content`, `id_user`) VALUES ('Demande x', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate officiis esse nam deserunt architecto iste illum, laudantium ullam similique, odit voluptas id consequatur quod reprehenderit facilis quisquam corrupti tenetur. Iste?', @user+2), ('Remarque', 'Coucou !', @user);

INSERT INTO properties (`name`, `reference`, `type`, `price`, `surface_area`, `id_address`, `id_category`) VALUES ('Maison de la mer', 'M0000001', 'Vente', 373000, 275, @address+3, @category), ('Appartement en centre-ville', 'A0000001', 'Location', 525, 85, @address+4, @category+1), ('Terrain vague', 'T0000001', 'Vente', 73000, 2500, @address+5, @category+2), ('Parking tout simple', 'P0000001', 'Location', 300, 100, @address+6, @category+5), ('Maison à la montagne', 'M0000002', 'Location', 1257, 100, @address+7, @category),('Appartement très joli', 'A0000002', 'Vente', 407000, 225, @address+8, @category+1), ('Maison plein pied', 'M0000003', 'Vente', 180000, 170, @address+9, @category);
SELECT @property := Last_insert_id();

INSERT INTO images (`name`, `default`, `id_property`) VALUES ('M0000001_1', 1, @property), ('M0000001_2', 0, @property), ('M0000001_3', 0, @property), ('A0000001_1', 1, @property+1), ('A0000001_2', 0, @property+1), ('T0000001_1', 1, @property+2), ('P0000001_1', 1, @property+3), ('M0000002_1', 1, @property+4), ('M0000002_2', 0, @property+4), ('A0000002_1', 1, @property+5), ('A0000002_2', 0, @property+5), ('A0000002_3', 0, @property+5), ('M0000003_1', 1, @property+6);

INSERT INTO favorites (`id_user`, `id_property`) VALUES (@user+2, @property+5), (@user+2, @property+3), (@user, @property+2);


COMMIT;