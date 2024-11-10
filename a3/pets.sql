CREATE TABLE `pets`
(
`petid` int(11) NOT NULL AUTO_INCREMENT,
`petname` varchar(255) NOT NULL,
`description` text NOT NULL,
`image` varchar(255) NOT NULL,
`caption` varchar(255) NOT NULL,
`age` double NOT NULL,
`location` varchar(255) NOT NULL,
`type` varchar(255) NOT NULL,
`username` varchar(255),
PRIMARY KEY(`petid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pets` (`petid`, `petname`, `description`, `image`, `caption`, `age`, `location`, `type`, `username`) VALUES
(2, 'Baxter', 'Baxter is a cheerful puppy who loves to play in the park and enjoys every belly rub he gets. His playful spirit brightens up everyone\'s day.', 'dog1.jpeg', 'Baxter the happy dog', 5, 'Cape Woolamai', 'Dog', 'Harneet'),
(3, 'Luna', 'Luna is a playful kitten who loves to explore her surroundings. She enjoys playing hide-and-seek and snuggling up next to you for a cozy nap.', 'cat2.jpeg', 'Luna the curious cat', 1, 'Ferntree Gully', 'Cat', 'Harneet'),
(4, 'Willow', 'Willow is a gentle and loyal dog who loves outdoor adventures. She\'s always ready for a hike or a game of fetch and adores her family.', 'dog2.jpeg', 'Willow the loyal dog', 48, 'Marysville', 'Dog', 'Harneet'),
(5, 'Oliver', 'Oliver is a relaxed cat who enjoys lounging in the sun and watching the world go by. He loves a gentle pet and will curl up next to you for a peaceful nap.', 'cat4.jpeg', 'Oliver the relaxed cat', 12, 'Grampians', 'Cat', 'Harneet'),
(6, 'Bella', 'Bella is a lively puppy filled with energy and curiosity. She loves to run around, play fetch, and cuddle with her favorite toys.', 'dog3.jpeg', 'Bella the playful dog', 10, 'Carlton', 'Dog', 'Harneet'),
(7, 'Nemo', 'Nemo is a vibrant fish that adds color and movement to his aquarium. He enjoys swimming around his tank and exploring every corner.', 'Nemo.jpeg', 'Fish', 1, 'Melbourne CBD', 'Fish', 'Harneet');


CREATE TABLE `users` (
  `userID` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`userID`, `username`, `password`, `reg_date`) VALUES
(1, 'Harneet', '2c5a81305b114189ed62d395755d6a042ac50e36', '2024-10-30 02:06:41'),;
