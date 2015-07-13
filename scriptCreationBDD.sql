SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Création de la table `TABLE_USER`
--

CREATE TABLE IF NOT EXISTS `TABLE_USER` (
  `id` varchar(256) collate latin1_general_ci NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(256) collate latin1_general_ci NOT NULL,
  `firstname` varchar(50) collate latin1_general_ci NOT NULL COMMENT 'prenom',
  `lastname` varchar(50) collate latin1_general_ci NOT NULL COMMENT 'nom de famille',
  `email` varchar(256) collate latin1_general_ci NOT NULL COMMENT 'email',
  `timestampConnexion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT 'Dernière connexion',
  `token` varchar(255) collate latin1_general_ci NOT NULL COMMENT 'token de connexion',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='utilisateur de Dinner';

--
-- Contenu de la table `TABLE_USER`
--

INSERT INTO `TABLE_USER` (`id`, `dob`, `password`, `firstname`, `lastname`, `email`, `timestampConnexion`, `token`) VALUES
('76654357', '1986-01-28', '1b2o3njourCommentVasTu?', 'Nicolas', 'DUMONT', '***', '2015-07-12 19:50:30', '6c76a7036c1ac23b4e119fa6f1ee9825'),
