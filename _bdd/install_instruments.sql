INSERT INTO `categorie` (`id_cat`, `type_cat`) VALUES
(1, 'Guitares & Basses'),
(2, 'Batteries & percutions'),
(3, 'Instruments à vent')

INSERT INTO `instrument` (`id_inst`,`nom_inst`, `fabricant_inst`, `ref_fabricant_inst`, `descript_inst`, `prix_inst`,`nb_stock_inst`,`id_cat`) VALUES
(1, 'Guitare classique', 'startone', 'CG 851 1/8','Taille: 1/8, Corps en tilleul, Manche en nato, Touche en érable, Diapason: 465 mm,  Largeur au sillet: 39 mm, Filet de corps noir, Cordes en nylon, Longueur totale: 762 mm, Couleur: Marron clair satiné', 38, 150, 1 ), 
(2, 'Guitarelele Bundle', 'Harley Benton', 'GL-2NT', 'Guitare classique 1/8, Table en épicéa, Fond et éclisses en acajou (Entandrophragma cylindricum), Manche en nato, Touche en blackwood (Pinus radiata), Filet noir, 17 frettes, Diapason: 433 mm, Largeur au sillet: 48 mm, Chevalet en blackwood (Pinus radiata), Sillet de chevalet: 68 x 8 x 3 mm, Mécaniques de guitare classique, Cordes en nylon de tension moyenne, Longueur totale: 710 mm, Largeur: 225 mm, Couleur: Naturel mat, Livrée en housse ', 62, 10, 1),
(3, 'Guitare classique – 6 cordes', 'Yamaha', 'GL1 Black',	'', 95, 52, 1),
(4, 'Batterie acoustique complète', 'Startone', 'Star Drum Set Standard – BK',	'Grosse caisse 22’’x14’’', 269, 23, 2),
(5, 'Batterie acoustique complète', 'Millénium', 'Série Focus',	'Série Focus, Convient aux enfants de 4 à 7 ans, Grosse caisse 16’’x10’’, Finition : Rhodoïd', 179, 15, 2),
(6, 'Hautbois', 'Yamaha', 'YOB-431 Oboe','Système d''octave semi automatique, Clé de troisième octave "système conservatoire", En bois de grenadille,Touches plaquées argent, Étui fourni ', 4, 5, 3)