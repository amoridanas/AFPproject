SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `kozlemenyek` (
  `id` int(11) NOT NULL,
  `tananyag_id` int(11) NOT NULL,
  `kozlemeny` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `kozlemenyek` (`id`, `tananyag_id`, `kozlemeny`, `created_at`) VALUES
(3, 3, 'hi \\r\\n', '2025-01-14 21:10:25'),
(4, 3, 'asddas', '2025-01-14 21:23:22');



CREATE TABLE `tananyag` (
  `id` int(11) NOT NULL,
  `cim` varchar(255) NOT NULL,
  `tartalom` text NOT NULL,
  `szerzo` int(11) NOT NULL,
  `kategoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tananyag` (`id`, `cim`, `tartalom`, `szerzo`, `kategoria`) VALUES
(3, 'sadas', '123', 7, 'asda');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `vezeteknev` varchar(255) NOT NULL,
  `keresztnev` varchar(255) NOT NULL,
  `szuletesi_datum` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`id`, `username`, `vezeteknev`, `keresztnev`, `szuletesi_datum`, `email`, `password`, `permission`) VALUES
(4, 'Aron', '', '', '0000-00-00', 'aron@email.com', '5c02f67a1da6b9b24c87a914d44c7470', 'admin'),
(5, 'admin', '', '', '0000-00-00', 'arona@email.com', '5c02f67a1da6b9b24c87a914d44c7470', 'admin'),
(6, 'user1', 'asd', 'asd', '2132-12-22', 'user1@gmail.com', '6edf26f6e0badff12fca32b16db38bf2', 'admin'),
(7, 'user2', 'asd', 'asd', '1222-02-03', 'amoridanas5@gmail.com', '6edf26f6e0badff12fca32b16db38bf2', 'admin');



CREATE TABLE `user_tananyag` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tananyag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `user_tananyag` (`id`, `user_id`, `tananyag_id`) VALUES
(4, 7, 3);


ALTER TABLE `kozlemenyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tananyag_id` (`tananyag_id`);


ALTER TABLE `tananyag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `szerzo` (`szerzo`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user_tananyag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tananyag_id` (`tananyag_id`);


ALTER TABLE `kozlemenyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `tananyag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `user_tananyag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `kozlemenyek`
  ADD CONSTRAINT `kozlemenyek_ibfk_1` FOREIGN KEY (`tananyag_id`) REFERENCES `tananyag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `tananyag`
  ADD CONSTRAINT `tananyag_ibfk_1` FOREIGN KEY (`szerzo`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `user_tananyag`
  ADD CONSTRAINT `user_tananyag_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_tananyag_ibfk_2` FOREIGN KEY (`tananyag_id`) REFERENCES `tananyag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
