-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2020 at 10:21 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sportchek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(60) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids'),
(4, 'Footwear'),
(5, 'Gear'),
(6, 'Electronics'),
(7, 'Jerseys');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(150) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`) VALUES
(1, 'Nike Men\'s Techknit Ultra Long Sleeve Shirt', 'The Nike TechKnit Ultra Top is strategically designed with angled seams and engineered fabric. Zoned ventilation helps keep you cool where you heat up most, while a slim fit gives a tailored feel perfect for layering.', 'men_nike_techknit.png', '$71.25'),
(2, 'Champion Men\'s Powerblend Fleece Full Zip Hoodie', 'Champion long sleeve full zipper hoodie offers comfort and style with embroidered \"C\" logo on left chest. Powerblend fleece lined for comfort and softness. Great with your favorite pair of jeans or joggers. On the left sleeve is the Iconic \"C\" patch for Champion.', 'men_champion_fleece.png', '$59.99'),
(3, 'The North Face Men\'s Half Dome Pullover Hoodie', 'Whether you’re cleaning the roof rack or loading up the adventure-mobile, this cotton-blend pullover will keep you warmer on rest days.', 'men_north_hoodie.png', '$52.49'),
(4, 'Nike Sportswear Men\'s Heritage Jogger Pants', 'Nike Sportswear Heritage Joggers update the classic comfort of French terry with an exaggerated waistband and cuffs. Their classic jogger look lets you show off your kicks.', 'men_nike_jogger.png', '$68.00'),
(5, 'adidas Men\'s Tiro 19 Pants', 'Train hard. Stay cool. These football pants battle the heat with breathable, quick-drying fabric. Cut for movement, they have a slim fit down the leg and stretchy ribbed details on the lower legs to promote clean footwork. Ankle zips allow you to pull them on or off over boots.', 'men_adidas_pants.png', '$64.99'),
(6, 'Nike Dry Women\'s Legend T Shirt', 'Ideal for any workout, the Nike Dri-FIT Legend Women’s Training T Shirt delivers the performance-ready feel of sweat-wicking fabric. Its feminine silhouette combines a crew neck design with a relaxed fit, optimizing flattering comfort.', 'women_nike_tee.png', '$18.00'),
(7, 'Nike Sportswear Women\'s Essentials Cropped Hoodie', 'Keep it simple in the Nike Sportswear Essential Women’s Cropped Hoodie. Made with semi-brushed fleece fabric for a soft, lightweight feel, it’s cropped for a versatile look.', 'women_nike_hoodie.png', '$55.50'),
(8, 'adidas Women\'s Parley We All Care 7/8 Tights', 'Push through extra reps in these seven-eighth-length tights. They’re made of a stretchy fabric that hugs your body and wicks moisture to keep you dry. Inner waist pockets can stow keys and cards while you work. This product is created with yarn made in collaboration with Parley for the Oceans. Some of the yarn features Parley Ocean Plastic™ which is made from recycled waste, intercepted from beaches and coastal communities before it reaches the ocean.', 'women_adidas_tights.png', '$47.97'),
(9, 'New Balance Women\'s Impact 5\" Shorts', 'Lightweight and loaded with pockets, the Impact Run Short 5 Inch is designed for distance runners who want easy access to their nutrition, phone or keys. These women’s running shorts’ 5-inch length offers added coverage for a comfortable fit, while the NB DRY technology helps wick away sweat to keep you cool and dry on long runs. ', 'women_newbalance_shorts.png', '$59.99'),
(10, 'Under Armour Women\'s Woven Branded Anorak', 'Under Armour Women’s Woven Branded Anorak features UA Storm technology which repels water without sacrificing breathability. It comes with 4-way stretch construction which moves better in every direction.', 'women_ua_anorak.png', '$52.49'),
(11, 'Nike Toddler Boys\' Oversized Swoosh Windrunner Jacket', 'The Nike Sportswear Windrunner Jacket is made of lightweight ripstop fabric and features the classic chevron on the chest from the 1978 original design. Zippered pockets gives little ones a place to store their essentials.', 'kids_nike_jacket.png', '$48.75'),
(12, 'Jordan Boys’ Jumpman Fleece Pullover Hoodie', 'The Jordan Jumpman Fleece Boy’s Pullover Hoodie features soft fleece and a hood to keep you warm and comfortably covered', 'kids_jordan_hoodie.png', '$37.50'),
(13, 'Under Armour Girls\' Armour Fleece Full Zip Hoodie', 'Armour Fleece® is our original performance replacement for old-school fleece. It\'s light, incredibly warm, and has just the right amount of stretch.', 'kids_ua_hoodie.png', '$40.97'),
(14, 'Nike Toddler Girls\' Run This T Shirt', 'The Nike T-Shirt is made of soft knit jersey fabric for easy, everyday comfort.', 'kids_nike_tee.png', '$19.50'),
(15, 'Nike Girls’ 4-6X Sportswear PE Starry Night Pullover Hoodie', 'The Nike ’Starry Night Hoodie’ features warm fleece for easy all day warmth.', 'kids_nike_hoodie.png', '$33.75'),
(16, 'Nike Women\'s Revolution 5 Running Shoes', 'The Nike Women’s Revolution 5 Running Shoe cushions your stride with soft foam to keep you running in comfort. Lightweight knit material wraps your foot in breathable support, while a minimalist design fits in anywhere your day takes you.', 'footwear_nike_running.png', '$65.99'),
(17, 'adidas Women\'s Superstar Shoes', 'The adidas Superstar Shoes first stepped onto the basketball hardwood in 1970. It didn’t take long for them to make the leap from athletic gear to streetwear staple. These shoes show off the materials, proportions and style that made the original such a legend. They’ve got a smooth leather upper with sporty 3-Stripes and a heel tab. They’re finished off with the world-famous rubber shell toe.', 'footwear_adidas_superstar.png', '$100.00'),
(18, 'Keds Women\'s Champion Leather Shoes - White', 'The original Keds Champion of true-blue, feel-good style. Keeping feet happy since 1916.', 'footwear_keds_champion.png', '$69.99'),
(19, 'Under Armour Charged Rogue Running Shoes - Grey/Black', 'The Under Armour Charged Rogue Running Shoes are engineered mesh upper is extremely lightweight & breathable, with strategic support where you need it.', 'footwear_ua_rogue.png', '$69.99'),
(20, 'Nike Boys\' Star Runner 2 AC Pre-School Shoes', 'The Nike Star Runner 2 is easy to take on and off with elastic laces and a strap to keep them out of the way. Soft foam cushions your step, while a durable rubber sole has grooves for flexibility.', 'footwear_nike_kids.png', '$41.24'),
(21, 'Nakamura Inspire 26 Mountain Bike 2020', 'The Nakamura Inspire is an excellent choice entry level mountain bike. The hardtail design, quality components and an 18 speed drivetrain provides the rider with a versatile bike that is great for riding around the neighborhood and on recreational trails.', 'gear_nakamura_bike.png', '$249.99'),
(22, 'Reebok 4Mm Yoga Mat W/ Carry String - Green', 'Ideal for yoga and Pilates, Reebok 4 mm Yoga Mats strike a middle-ground between comfort and stability. With a grippy non-slip texture, the mat increases traction during your poses for stronger, more effective workouts. Available in varied colourways; the lightweight mats are easily rolled with a carrying string for transport.', 'gear_reebok_yoga.png', '$29.99'),
(23, 'Hydroflask 32 oz Wide Mouth Bottle', 'Big enough for a whole day on the river or trails, our 32 oz Wide Mouth Bottle is made with professional-grade stainless steel and a wider opening for faster fill. We couldn’t think of a bottle more deserving of a refresh, so we’ve elevated the silhouette and simplified design without compromising one degree of performance. And our Color Last™ powder coat is dishwasher safe for even more convenience. Cold stays ice cold for 24 hours, and hot stays wickedly hot for 12 — just like always.', 'gear_hydroflask_bottle.png', '$47.99'),
(24, 'adidas Euro Uniforia League Soccer Ball', 'Twelve hosts, 24 national teams. A continent united. Made for training, this adidas Uniforia ball takes design cues from the one used at European football’s showpiece summer event. Its seamless design and FIFA stamp mean you’ll have no excuses when you send it over the fence during shooting practice.', 'gear_adidas_ball.png', '$49.99'),
(25, 'Bauer Vapor 2X Grip Senior Hockey Stick', 'Get a dynamic release with every shot. The Vapor 2X is designed for players looking for a very lightweight stick and a high level of performance. It’s made of lightweight, industry-leading carbon fiber to improve performance and reduce weight. The new XE Taper geometry is also used to decrease weight while increasing release speed and stability. An enhanced shaft thickness adds durability to the stick to withstand more force so that you can really lean into shots.', 'gear_bauer_stick.png', '$269.99'),
(26, 'Fitbit Versa 2 Smartwatch - Sandstone', 'Meet Fitbit Versa 2​™​—a smartwatch that elevates every moment. Use your voice to create alarms, set bedtime reminders or check the weather with Amazon Alexa Built-in.​ Take your look from the gym to the office with its modern and versatile design. Control your favourite playlists and podcasts with Spotify. ​Plus get Fitbit Pay​™​, daily in-app sleep quality scores, notifications, 24/7 heart rate and store 300+ songs for an experience that revolves around you.', 'electronics_fitbit_2.png', '$249.95'),
(27, 'JBL Flip 4 Portable Bluetooth Speaker - Red', 'JBL Flip 4 is the next generation in the award-winning Flip series; it is a portable Bluetooth speaker that delivers surprisingly powerful stereo sound. This compact speaker is powered by a 3000mAh rechargeable Li-ion battery that offers 12 hours of continuous, high-quality audio playtime. Sporting durable, waterproof fabric materials that are available in 6 vibrant colors, Flip 4 is the all purpose, all weather companion that takes the party everywhere. It also features a built-in noise and echo cancelling speakerphone for crystal clear conference calls, and JBL Connect+ technology that can wirelessly link more than 100 JBL Connect+ enabled speakers together to amplify the listening experience. ', 'electronics_jbl_speaker.png', '$129.99'),
(28, 'GoPro HERO8 Black Action Camera', 'This is HERO8 Black—the most versatile, unshakable HERO camera ever. A streamlined design makes it more pocketable than ever, and swapping mounts takes just seconds, thanks to built-in folding fingers. And with the optional Media Mod, you get ultimate expandability to add more lighting, pro audio and even another screen. There’s also game-changing HyperSmooth 2.0 stabilization with jaw-dropping slo-mo.', 'electronics_gopro_camera.png', '$529.99'),
(29, 'Fitbit Charge 3 Fitness Tracker - Black/Graphite Aluminum', 'The New Charge 3 advanced fitness tracker can give you a deeper understanding of your body, your health and your progress. Not just a step counter or heart rate monitor, the Charge 3 can auto recognize your activites with SmartTrack and is swimproof and water resistant to 50m. Stylish and smart, this fitness tracker can track your sleep quality and can be review on the Fitbit app. Your wellness picture is now easier to see and understand thanks to Fitbit. Everyday, you can find valuable insights about your health that will empower you to take action, improve yourself and reach your goals.', 'electronics_fitbit_charge.png', '$158.98'),
(30, 'Beats EP Headphones – Black', 'Beats EP on-ear headphones delivers masterfully tuned sound. Its lightweight frame is reinforced with stainless steel, an ideal introduction to Beats for any music lover. ', 'electronics_beats_headphones', '$129.99'),
(31, 'Toronto Raptors Nike Men\'s Kyle Lowry Statement Black Jersey', 'Directly inspired by the on-court jersey, you\'ll feel part of the team when sporting the Toronto Raptors Kyle Lowry Swingman Basketball Jersey.', 'jersey_raptors_jersey.png', '$97.50'),
(32, 'Toronto Maple Leafs Fanatics Women\'s Break Out Top', 'Break free of the usual fanwear by sporting the flattering, stylish Toronto Maple Leafs Fanatics Women’s Break Out Top during the upcoming NHL season.', 'jersey_maple_shirt.png', '$49.99'),
(33, 'Hamilton Tiger-Cats New Era Men\'s French Terry Crewneck', 'Elevate your array of Tiger-Cats inspired gear to the next level with this classic Hamilton Tiger-Cats New Era Men’s French Terry Crewneck. You’ll love showcasing your Canadian Football League team spirit all season long in this stylish top! Officially Licensed by the CFL.', 'jersey_ticat_crewneck.png', '$75.99'),
(34, 'Manchester United FC adidas Men\'s Anthem Jacket', 'The final few minutes before kickoff are some of the most charged moments in the game. This anthem jacket gives players a unified look as they line up on the pitch. Show your support for Manchester United with this comfortable twill bomber jacket, which features taping down the sleeves and an embroidered club crest on the chest. Iconic crest A woven club crest sits on the chest A twist on tradition Man Utd taping down the sleeves shows your team pride in a fresh way', 'jersey_manchester_jacket.png', '$129.99'),
(35, 'Dallas Cowboys Road 39THIRTY Sideline Cap', 'In celebration of the 100th season of the National Football League, the Established Collection honors the era that each franchise was established. The Dallas Cowboys Official NFL Sideline Road 39THIRTY Stretch Fit features an embroidered Cowboys logo at the front panels, date of establishment at the right-wear side and the Official NFL 100 Logo at the rear. Additional details include contrasting team color stitching.', 'jersey_dallas_hat.png', '$41.99');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_category`
--

DROP TABLE IF EXISTS `tbl_products_category`;
CREATE TABLE IF NOT EXISTS `tbl_products_category` (
  `products_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  PRIMARY KEY (`products_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products_category`
--

INSERT INTO `tbl_products_category` (`products_category_id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 4),
(17, 16, 2),
(18, 17, 4),
(19, 17, 2),
(20, 18, 4),
(21, 18, 2),
(22, 19, 4),
(23, 19, 1),
(24, 20, 4),
(25, 20, 3),
(26, 21, 5),
(27, 22, 5),
(28, 23, 5),
(29, 24, 5),
(30, 25, 5),
(31, 26, 6),
(32, 27, 6),
(33, 28, 6),
(34, 29, 6),
(35, 30, 6),
(36, 31, 7),
(37, 31, 1),
(38, 32, 7),
(39, 32, 2),
(40, 33, 7),
(41, 33, 1),
(42, 34, 7),
(43, 34, 1),
(44, 35, 7),
(45, 35, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(60) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_pass` varchar(40) NOT NULL,
  `user_email` varchar(80) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`) VALUES
(1, 'Ariana', 'ari123', '123', 'ari@test.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
