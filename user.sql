-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2018 at 06:23 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `Buy`
--

CREATE TABLE `Buy` (
  `CropID` int(11) NOT NULL,
  `ID` varchar(255) NOT NULL,
  `Title` text NOT NULL,
  `Description` text NOT NULL,
  `Price` text NOT NULL,
  `Quantity` text NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Buy`
--

INSERT INTO `Buy` (`CropID`, `ID`, `Title`, `Description`, `Price`, `Quantity`, `Image`) VALUES
(1, '5', 'Wheat', 'Require high protein wheat', '20', '12500 Mt', NULL),
(2, '5', 'Grain', '1500 Qtl high protien grain', '50', '60', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `csa`
--

CREATE TABLE `csa` (
  `ID` varchar(255) DEFAULT NULL,
  `CSA_ID` int(255) NOT NULL,
  `Title` text,
  `Season` text,
  `Type` text,
  `Full Share` text,
  `Half Share` text,
  `Available shares` text,
  `DeliveryArea1` text,
  `DeliveryArea2` text,
  `DeliveryArea3` text,
  `Description` text,
  `Short Description` text,
  `Ratings` varchar(255) DEFAULT '4.0',
  `WorkReq` text,
  `Review1` text,
  `Review2` text,
  `Review3` text,
  `Crop` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csa`
--

INSERT INTO `csa` (`ID`, `CSA_ID`, `Title`, `Season`, `Type`, `Full Share`, `Half Share`, `Available shares`, `DeliveryArea1`, `DeliveryArea2`, `DeliveryArea3`, `Description`, `Short Description`, `Ratings`, `WorkReq`, `Review1`, `Review2`, `Review3`, `Crop`, `img`) VALUES
('7', 1, 'School Lunch Farm', 'January through January', 'single farm', '325', '200', '150', 'K-Mart Parking Lot  (Tue) \r\nMembers pick their shares up on Tuesday afternoons from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n720 Sutters Creek Blvd. \r\nRocky Mount, NC 27804', 'Nashville Agriculture Center  (Tue)\r\nMembers pick up their shares on Tuesday afternoons from 4:45-5:15.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n1006 Eastern Avenue\r\nNashville, NC 27856', 'Staples Parking Lot  (Tue) \r\nMembers may pick up their boxes every Tuesday afternoon from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n2342 W. Forest Hills Rd.\r\nWilson, NC 27893', 'School Lunch Farm & CSA is a 100% Certified Organic and GMO-Free Farm offering a weekly share of organic vegetables, herbs, and fruit. We grow over 200 varieties of Organic vegetable, fruit and herbs. Each week shareholders receive 10 plus items--often over 15 items per week. All the vegetables, fruit and herbs you receive from us are Certified Organic, grown on our property from seed.\r\n\r\nWe harvest the day you pick up your share--so your veggies are super fresh. Shareholders are welcome to volunteer at the farm, hike our woodlands, and visit our 4 acre pond.\r\n\r\nWe grow all of our produce on our farm and we do not purchase produce or plants from other farms or distributors.\r\n\r\n', 'We offer a wide variety of produce.', '4.3', 'No', 'We started with a half share 3 years ago and liked it so much we changed to a full share the last 2 years. We have a family of 4 (all adults) and the share is plentiful for all of us. Each week we look forward to seeing what different produce will be in our bag. We enjoy learning about the varieties of different organic produce and enjoy researching new recipes to try. Margaret sends an email each week identifying all the produce in the bag and she shares some delicious recipe ideas as well, one of my favorites is the Broccoli Watercress Soup.', 'Heading into our 4th year as a CSA member- wonderful variety of vegetables and herbs. Great sense of community. We always look forward to our weekly share and a visit to the farm!', 'Organic produce is not easy to come by in the far west corner of Morris County. With our 1/2 share at School Lunch Farm, we got easy access to a lovely variety of organic produce, more than enough for two vegetarians. We also got to support a farmer committed to organic farming, who has rescued land that sat fallow for years and put it back to use producing real, pesticide-free food, who donates fresh organic produce to the Mt Olive Food Bank, who cares deeply about what she does and shares her knowledge about the things she grows and her passion for farming and food. School Lunch farm is a rare, true CSA. The weekly share is made up of only what is harvested at School Lunch Farm that week and each person who purchases a share truly helps the farm prosper and grow. Caring for the planet at School Lunch Farm goes beyond the growing to careful use of resources (bring your own bags, and more). A few of my favorite things from this past season: ground cherries, organic honey & baby turnips', 'lettuce,  watermelon, cucumbers, cantaloupe, blackberries, strawberries, tomatoes, butterbeans, peas, garden peas, corn, and peppers', 'farm.jpg'),
('8', 2, 'Desert Farm', 'January through January', 'single farm', '325', '200', '150', 'K-Mart Parking Lot  (Tue) \r\nMembers pick their shares up on Tuesday afternoons from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n720 Sutters Creek Blvd. \r\nRocky Mount, NC 27804', 'Nashville Agriculture Center  (Tue)\r\nMembers pick up their shares on Tuesday afternoons from 4:45-5:15.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n1006 Eastern Avenue\r\nNashville, NC 27856', 'Staples Parking Lot  (Tue) \r\nMembers may pick up their boxes every Tuesday afternoon from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n2342 W. Forest Hills Rd.\r\nWilson, NC 27893', 'School Lunch Farm & CSA is a 100% Certified Organic and GMO-Free Farm offering a weekly share of organic vegetables, herbs, and fruit. We grow over 200 varieties of Organic vegetable, fruit and herbs. Each week shareholders receive 10 plus items--often over 15 items per week. All the vegetables, fruit and herbs you receive from us are Certified Organic, grown on our property from seed.\r\n\r\nWe harvest the day you pick up your share--so your veggies are super fresh. Shareholders are welcome to volunteer at the farm, hike our woodlands, and visit our 4 acre pond.\r\n\r\nWe grow all of our produce on our farm and we do not purchase produce or plants from other farms or distributors.\r\n\r\n', 'We offer a wide variety of produce.', '4.9', 'No', 'We started with a half share 3 years ago and liked it so much we changed to a full share the last 2 years. We have a family of 4 (all adults) and the share is plentiful for all of us. Each week we look forward to seeing what different produce will be in our bag. We enjoy learning about the varieties of different organic produce and enjoy researching new recipes to try. Margaret sends an email each week identifying all the produce in the bag and she shares some delicious recipe ideas as well, one of my favorites is the Broccoli Watercress Soup.', 'Heading into our 4th year as a CSA member- wonderful variety of vegetables and herbs. Great sense of community. We always look forward to our weekly share and a visit to the farm!', 'Organic produce is not easy to come by in the far west corner of Morris County. With our 1/2 share at School Lunch Farm, we got easy access to a lovely variety of organic produce, more than enough for two vegetarians. We also got to support a farmer committed to organic farming, who has rescued land that sat fallow for years and put it back to use producing real, pesticide-free food, who donates fresh organic produce to the Mt Olive Food Bank, who cares deeply about what she does and shares her knowledge about the things she grows and her passion for farming and food. School Lunch farm is a rare, true CSA. The weekly share is made up of only what is harvested at School Lunch Farm that week and each person who purchases a share truly helps the farm prosper and grow. Caring for the planet at School Lunch Farm goes beyond the growing to careful use of resources (bring your own bags, and more). A few of my favorite things from this past season: ground cherries, organic honey & baby turnips', 'cabbage, broccoli, spring onions, okra, squash, watermelon, cucumbers, cantaloupe, blackberries, strawberries, tomatoes', 'farm1.jpg'),
('6', 3, 'Tulsi Farm', 'January through January', 'single farm', '325', '200', '150', 'K-Mart Parking Lot  (Tue) \r\nMembers pick their shares up on Tuesday afternoons from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n720 Sutters Creek Blvd. \r\nRocky Mount, NC 27804', 'Nashville Agriculture Center  (Tue)\r\nMembers pick up their shares on Tuesday afternoons from 4:45-5:15.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n1006 Eastern Avenue\r\nNashville, NC 27856', 'Staples Parking Lot  (Tue) \r\nMembers may pick up their boxes every Tuesday afternoon from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n2342 W. Forest Hills Rd.\r\nWilson, NC 27893', 'School Lunch Farm & CSA is a 100% Certified Organic and GMO-Free Farm offering a weekly share of organic vegetables, herbs, and fruit. We grow over 200 varieties of Organic vegetable, fruit and herbs. Each week shareholders receive 10 plus items--often over 15 items per week. All the vegetables, fruit and herbs you receive from us are Certified Organic, grown on our property from seed.\r\n\r\nWe harvest the day you pick up your share--so your veggies are super fresh. Shareholders are welcome to volunteer at the farm, hike our woodlands, and visit our 4 acre pond.\r\n\r\nWe grow all of our produce on our farm and we do not purchase produce or plants from other farms or distributors.\r\n\r\n', 'We offer a wide variety of produce.', '4.0', 'No', 'We started with a half share 3 years ago and liked it so much we changed to a full share the last 2 years. We have a family of 4 (all adults) and the share is plentiful for all of us. Each week we look forward to seeing what different produce will be in our bag. We enjoy learning about the varieties of different organic produce and enjoy researching new recipes to try. Margaret sends an email each week identifying all the produce in the bag and she shares some delicious recipe ideas as well, one of my favorites is the Broccoli Watercress Soup.', 'Heading into our 4th year as a CSA member- wonderful variety of vegetables and herbs. Great sense of community. We always look forward to our weekly share and a visit to the farm!', 'Organic produce is not easy to come by in the far west corner of Morris County. With our 1/2 share at School Lunch Farm, we got easy access to a lovely variety of organic produce, more than enough for two vegetarians. We also got to support a farmer committed to organic farming, who has rescued land that sat fallow for years and put it back to use producing real, pesticide-free food, who donates fresh organic produce to the Mt Olive Food Bank, who cares deeply about what she does and shares her knowledge about the things she grows and her passion for farming and food. School Lunch farm is a rare, true CSA. The weekly share is made up of only what is harvested at School Lunch Farm that week and each person who purchases a share truly helps the farm prosper and grow. Caring for the planet at School Lunch Farm goes beyond the growing to careful use of resources (bring your own bags, and more). A few of my favorite things from this past season: ground cherries, organic honey & baby turnips', 'lettuce, cabbage, broccoli, spring onions,  butterbeans, peas, garden peas, corn, and peppers', 'farm2.jpg'),
('11', 12, 'Herbs Corporation ', 'March-December', 'Single Farm', '500', '600', '450', '101 ,nandanvan colony indore', NULL, NULL, 'Very Good', 'GOOD', '4.0', 'No', NULL, NULL, NULL, 'Tomato,Garlic,Mangoes', 'farm5.jpg'),
('14', 14, 'Hungry Hours', 'January through January', 'single farm', '325', '200', '150', 'K-Mart Parking Lot  (Tue) \r\nMembers pick their shares up on Tuesday afternoons from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n720 Sutters Creek Blvd. \r\nRocky Mount, NC 27804', 'Nashville Agriculture Center  (Tue)\r\nMembers pick up their shares on Tuesday afternoons from 4:45-5:15.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n1006 Eastern Avenue\r\nNashville, NC 27856', 'Staples Parking Lot  (Tue) \r\nMembers may pick up their boxes every Tuesday afternoon from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n2342 W. Forest Hills Rd.\r\nWilson, NC 27893', 'School Lunch Farm & CSA is a 100% Certified Organic and GMO-Free Farm offering a weekly share of organic vegetables, herbs, and fruit. We grow over 200 varieties of Organic vegetable, fruit and herbs. Each week shareholders receive 10 plus items--often over 15 items per week. All the vegetables, fruit and herbs you receive from us are Certified Organic, grown on our property from seed.\r\n\r\nWe harvest the day you pick up your share--so your veggies are super fresh. Shareholders are welcome to volunteer at the farm, hike our woodlands, and visit our 4 acre pond.\r\n\r\nWe grow all of our produce on our farm and we do not purchase produce or plants from other farms or distributors.\r\n\r\n', 'We offer a wide variety of produce.', '4.0', 'No', 'We started with a half share 3 years ago and liked it so much we changed to a full share the last 2 years. We have a family of 4 (all adults) and the share is plentiful for all of us. Each week we look forward to seeing what different produce will be in our bag. We enjoy learning about the varieties of different organic produce and enjoy researching new recipes to try. Margaret sends an email each week identifying all the produce in the bag and she shares some delicious recipe ideas as well, one of my favorites is the Broccoli Watercress Soup.', 'Heading into our 4th year as a CSA member- wonderful variety of vegetables and herbs. Great sense of community. We always look forward to our weekly share and a visit to the farm!', 'Organic produce is not easy to come by in the far west corner of Morris County. With our 1/2 share at School Lunch Farm, we got easy access to a lovely variety of organic produce, more than enough for two vegetarians. We also got to support a farmer committed to organic farming, who has rescued land that sat fallow for years and put it back to use producing real, pesticide-free food, who donates fresh organic produce to the Mt Olive Food Bank, who cares deeply about what she does and shares her knowledge about the things she grows and her passion for farming and food. School Lunch farm is a rare, true CSA. The weekly share is made up of only what is harvested at School Lunch Farm that week and each person who purchases a share truly helps the farm prosper and grow. Caring for the planet at School Lunch Farm goes beyond the growing to careful use of resources (bring your own bags, and more). A few of my favorite things from this past season: ground cherries, organic honey & baby turnips', 'peppers', 'farm3.jpg'),
('13', 15, 'Textile', 'January through January', 'single farm', '325', '200', '142', 'K-Mart Parking Lot  (Tue) \r\nMembers pick their shares up on Tuesday afternoons from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n720 Sutters Creek Blvd. \r\nRocky Mount, NC 27804', 'Nashville Agriculture Center  (Tue)\r\nMembers pick up their shares on Tuesday afternoons from 4:45-5:15.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n1006 Eastern Avenue\r\nNashville, NC 27856', 'Staples Parking Lot  (Tue) \r\nMembers may pick up their boxes every Tuesday afternoon from 5:30-6:00.\r\n\r\nContact: Andrew Strickland\r\nPhone: 252-230-0345\r\nAddress:\r\n2342 W. Forest Hills Rd.\r\nWilson, NC 27893', 'School Lunch Farm & CSA is a 100% Certified Organic and GMO-Free Farm offering a weekly share of organic vegetables, herbs, and fruit. We grow over 200 varieties of Organic vegetable, fruit and herbs. Each week shareholders receive 10 plus items--often over 15 items per week. All the vegetables, fruit and herbs you receive from us are Certified Organic, grown on our property from seed.\r\n\r\nWe harvest the day you pick up your share--so your veggies are super fresh. Shareholders are welcome to volunteer at the farm, hike our woodlands, and visit our 4 acre pond.\r\n\r\nWe grow all of our produce on our farm and we do not purchase produce or plants from other farms or distributors.\r\n\r\n', 'We offer a wide variety of produce.', '4.0', 'No', 'We started with a half share 3 years ago and liked it so much we changed to a full share the last 2 years. We have a family of 4 (all adults) and the share is plentiful for all of us. Each week we look forward to seeing what different produce will be in our bag. We enjoy learning about the varieties of different organic produce and enjoy researching new recipes to try. Margaret sends an email each week identifying all the produce in the bag and she shares some delicious recipe ideas as well, one of my favorites is the Broccoli Watercress Soup.', 'Heading into our 4th year as a CSA member- wonderful variety of vegetables and herbs. Great sense of community. We always look forward to our weekly share and a visit to the farm!', 'Organic produce is not easy to come by in the far west corner of Morris County. With our 1/2 share at School Lunch Farm, we got easy access to a lovely variety of organic produce, more than enough for two vegetarians. We also got to support a farmer committed to organic farming, who has rescued land that sat fallow for years and put it back to use producing real, pesticide-free food, who donates fresh organic produce to the Mt Olive Food Bank, who cares deeply about what she does and shares her knowledge about the things she grows and her passion for farming and food. School Lunch farm is a rare, true CSA. The weekly share is made up of only what is harvested at School Lunch Farm that week and each person who purchases a share truly helps the farm prosper and grow. Caring for the planet at School Lunch Farm goes beyond the growing to careful use of resources (bring your own bags, and more). A few of my favorite things from this past season: ground cherries, organic honey & baby turnips', 'peppers', 'farm4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `CSABuy`
--

CREATE TABLE `CSABuy` (
  `userID` varchar(255) NOT NULL,
  `CSAID` varchar(255) NOT NULL,
  `Next Delivery` varchar(255) NOT NULL DEFAULT '10/4/2018',
  `Weeks Left` varchar(255) NOT NULL DEFAULT '12',
  `No of Share` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CSABuy`
--

INSERT INTO `CSABuy` (`userID`, `CSAID`, `Next Delivery`, `Weeks Left`, `No of Share`) VALUES
('5', '3', '10/4/2018', '12', '8');

-- --------------------------------------------------------

--
-- Table structure for table `CSAPurchased`
--

CREATE TABLE `CSAPurchased` (
  `userID` varchar(255) NOT NULL,
  `CSAID` varchar(255) NOT NULL,
  `Shares` varchar(255) NOT NULL,
  `Months` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CSAPurchased`
--

INSERT INTO `CSAPurchased` (`userID`, `CSAID`, `Shares`, `Months`) VALUES
('5', '3', '7', '3');

-- --------------------------------------------------------

--
-- Table structure for table `ItemPurchased`
--

CREATE TABLE `ItemPurchased` (
  `userID` varchar(255) NOT NULL,
  `CropID` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `NotificationTable`
--

CREATE TABLE `NotificationTable` (
  `userID` varchar(255) NOT NULL,
  `Notification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `NotificationTable`
--

INSERT INTO `NotificationTable` (`userID`, `Notification`) VALUES
('6', 'Your 8 shares of Tulsi Farm has been bought by <t> Jamila   <t>  Total Price:2600 ');

-- --------------------------------------------------------

--
-- Table structure for table `Sell`
--

CREATE TABLE `Sell` (
  `ID` varchar(255) DEFAULT NULL,
  `CropID` int(255) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Description` text,
  `Price` varchar(255) DEFAULT NULL,
  `Available` varchar(255) DEFAULT NULL,
  `Review1` text,
  `shortDescription` text,
  `Review2` text,
  `Review3` text,
  `Rating` varchar(255) DEFAULT '4.6'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sell`
--

INSERT INTO `Sell` (`ID`, `CropID`, `Title`, `Description`, `Price`, `Available`, `Review1`, `shortDescription`, `Review2`, `Review3`, `Rating`) VALUES
('6', 5, 'Organic Meyer Lemons', 'Harvested and hand packed on our farm within 24 hours of shipping, our 100% Certified Organic Meyer lemons are sweeter and less acidic in flavor than the more common Lisbon or Eureka lemon. The skin is fragrant and thin, with a deep yellow color and slight orange tint when ripe.\r\n\r\nMeyer Lemons were introduced to the United States in 1908 and became popular as a food item in the United States after being rediscovered by chefs such as Alice Waters at Chez Panisse during the California Cuisine revolution.\r\n\r\nEnjoy fresh Meyer lemonade, roasted Meyer lemon chicken or homemade Meyer lemon preserves.', '100', '150', 'I am really fussy about lemons I usually have at least one a day. These are perfection! The color is a beautiful yellow and the flavor is sweet with the perfect amount of lemon flavor. Well packed and good shipment. I like them so much I just placed another order.', 'Fairview Orchards - 100% Certified Organic Meyer Lemons\r\n', 'Absolutely beautiful Meyer lemons. Large, firm and very heavy for their size. Flesh is firm with lots of juice with a wonderful balance of lemon taste and tart. Not blah like super market lemons. Peeling (outter rind) is great for lemon zest with not a lot of thick pith which can give zest a bitter taste. These were the best lemons I have purchased in 20 yrs and I will definitely be back for more. I also ordered blood oranges from Fairview Orchards in Ojai and they too were firm, heavy for their size sweet and juicey. Not overly big like supermarket produce but their flavor and texture were superior to anything you can buy at the grocery store or big box stores.', 'Fairview Orchard Meyer organic lemons are amazing, juicy & packed exceptionally well & arrived in absolutely beautiful condition. I ordered some for my sister in Idaho because of the high quality of the lemons. The lemons smell wonderful & taste refreshing. I discovered them last year when in California & never thought I could get as good a Meyer lemon way over here in Wisconsin. And then, I ordered yours & WOW...I\'m so happy I did. Way better than I expected & packed with love !! I will order from your orchard again & will recommend your orchard to my family & friends. Worth every penny. Thank you, thank you, thank you. These lemons are as close to how God created them as I can imagine.', '4.3'),
('6', 7, 'Organic Hass Avocados\r\n', '100% Certified Organic Hass Avocados harvested within 24 hours of shipping.\r\n\r\nAll of our avocados are harvested from Certified Organic trees which give them exceptional flavor and richness.\r\n\r\nThe delicious green flesh has a nutty, rich flavor with a black, pebbled skin. Your avocados should ripen in one to two weeks at room temperature and are an excellent source of fiber and vitamins. Enjoy fresh homemade guacamole or sliced in your favorite salad or sandwich.', '50', '75', 'Avocados are one of my absolute favorite foods and it\'s not easy to find good ones at the store here in NW Florida. They are usually either over-ripe and/or bruised, or else they are hard as a rock and for some reason don\'t ripen well at home. We tried growing them, but even the Mexicali variety that are supposed to be cold tolerant died during the winter here. I was delighted to find these avocados on sale from Fairview Orchards. They arrived in flawless condition and ripened perfectly - the best we\'ve ever had! Could not be happier with this purchase.', 'Fairview Orchards - 100% Certified Organic Hass Avocados\r\n', 'I have ordered the box of 12 avocados twice. They are simply wonderful. They arrived in perfect condition. I put half in the refrigerator, leave half on the counter to begin the ripening process and then start putting those in the refrigerator - that way I have an avocado a day for 12 days. I am the envy of my friends when I serve them these delicious treats. Thanks so much - so glad I found your site.', 'I recently ordered Haas Avocados from Fairview Orchards. These are very tasty avocados, dance and nutty with nice oil content, I really like them. Nicely packed and delivered on time.', '4.6'),
('8', 8, 'Organic Pomegranates\r\n', '100% Certified Organic Pomegranates harvested within 24 hours of shipping.\r\n\r\nThese are some of the finest ruby red pomegranates California has to offer. Large, extra juicy and full of healthy antioxidants, this ancient fruit is a real treat.\r\nSimply crack open and enjoy! You can also sprinkle them on salads, or try juicing for a powerful antioxidant boost. Egyptians regarded the pomegranate as a symbol of prosperity and ambition. Introduced into California by Spanish settlers in 1769, the fruit is typically in season from September through December.\r\n\r\nGet them while you can, this beautiful ruby red fruit won\'t be available for long.', '78', '40', '', 'Fairview Orchards - 100% Certified Organic Pomegranates', '', '', '4.2'),
('8', 9, 'Organic Cranberries', 'We ship on Tuesdays.\r\n\r\nCranberry Hill has been a grower of organic cranberries since 1986. Our berries are now available for individual orders shipped via UPS or priority mail.\r\n\r\nThe berries are individually quick frozen and pour out of the package like red marbles. They keep their healthful qualities and allow you to make your own juice to your own specifications\r\n\r\nShipped 2nd day air to Mid West and West Coast\r\n\r\nPlace your order early! Five or ten pound orders will be shipped USPS flat rate to save you shipping costs to anywhere in the USA. Starting February we also have frozen cranberries, 1o# minimum order, Additional shipping charges will apply for larger quantities shipped to the West Coast.', '80', '64', 'These are the best cranberries we have ever tasted! We love that they are much larger than the ones we find in the stores during the holidays. Plus the best part is that they are organic and I don\'t have to clean the pesticides off of them before cooking! The service is fabulous and they are very courteous. They even called us to tell us they couldn\'t ship the day they promised due to a big storm hitting them. I will buy only from this farm (Cranberry Hill Organic farm) in the future! We like to eat cranberry sauce year round as it helps reduce plaque in the arteries and greatly aids digestion. We eat it with each meal.', 'Organic Cape Cod cranberries from Plymouth, Massachusetts. Picked from our bogs at full ripeness and frozen.\r\n', 'I always order these and keep them in my freezer. They are wonderful, fresh and flavorful. Service is friendly and shipped promptly. No problems ever. If you like cranberries and if you appreciate organic, these are for you. -Debbie /NJ', '', '4.8'),
('6', 16, 'Cereal', 'Cereal Milk Dairy Cornflakes', '100', '20', 'Vrery good', 'Cereal', 'very good', 'was not fiberous enough', '4.6'),
('8', 17, 'eggs', 'Free Range eggs from the beautiful Himalayas....', '100', '50', 'very tasty', 'big eggs', 'they were brown', 'very nice eggs', '4.6'),
('8', 18, 'Apple', 'Free Range Apple from the beautiful Himalayas....', '100', '50', 'very tasty', 'Sweet Red Apples from Kashmir and Himalaya', 'they were brown', 'very nice apple', '4.6');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(250) DEFAULT NULL,
  `contact` varchar(250) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `lat` varchar(250) DEFAULT NULL,
  `longi` varchar(250) DEFAULT NULL,
  `address` text,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `Certification` text,
  `Description` text,
  `Members` varchar(255) DEFAULT NULL,
  `Ratings` varchar(255) DEFAULT '4.3',
  `FPOJoined` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `id`, `name`, `password`, `category`, `contact`, `email`, `lat`, `longi`, `address`, `City`, `State`, `Country`, `postal_code`, `Certification`, `Description`, `Members`, `Ratings`, `FPOJoined`) VALUES
('jamila', 5, 'Jamila', '1', 'Consumer', '7415407199', 'mohammeddewaswala@gmail.com', '22.6954233', '75.85495560000004', '101 ,Nandanvan Colony ', 'Indore', 'Madhya Pradesh', 'India', '452001', '', '', NULL, NULL, NULL),
('shanki', 6, 'Shanki', '1', 'Farmer', '9642991642', 'mohammeddewaswala@gmail.com', '22.8172806', '75.92890460000001', '101 ,Nandanvan Colony ', 'Indore', 'Madhya Pradesh', 'India', '452001', 'Organic Certified', 'Producer of different type of pulses', NULL, '4', '1'),
('farmerfpo', 7, 'Swakrushi Farmer Producer CO. LTD.', '1', 'FPO', '9642991642', 'mohammeddewaswala@gmail.com', '22.7258984', '75.88738899999998', '101 ,Nandanvan Colony ', 'Indore', 'Madhya Pradesh', 'India', '452001', 'Organic Certified', 'Produce different vegetables,fruits,pulses', '10', '4.3', NULL),
('mohammed', 8, 'Mohammed', '1', 'Farmer', '9642991642', 'mohammeddewaswala@gmail.com', '19.0759837', '72.87765590000004', '101 ,nandanvan colony mumbai', 'Mumbai', 'Maharashtra', 'india', '452001', 'Organic Certified', 'Produce different vegetables,fruits,pulses', '', '4.3', NULL),
('choithram', 9, 'Choithram Market', '1', 'Market', '9642991642', 'mohammeddewaswala@gmail.com', '22.6822697', '75.8520016', 'Choitram compound near Tower Chauraha', 'Indore', 'Madhya Pradesh', 'India', '452001', '', 'Largest Market in Madhya Pradesh', '', '4.3', NULL),
('nagaraj', 10, 'Nagaraj', '1', 'Trader', '9642991642', 'mohammeddewaswala@gmail.com', '17.445388', '78.34823019999999', 'International Institute of Information Technology, Hyderabad Campus', 'Hyderabad', 'Telangana', 'India', '500032', '', 'Dealer of grains and pulses', '', '4.3', NULL),
('rajesh', 11, 'Rajesh Mahato', '1', 'Farmer', '8228121744', 'AAA@mymail.com', '22.8016417', '75.85294410000006', 'House', 'Jakhya', 'Indore ', 'Madhya Pradesh ', '453555 ', 'Organic Certified', 'Producer of different fruits, grains, vegetables, dairy products, ', NULL, '4', '4'),
('manoj', 12, 'manoj ji', '1', 'FPO', '9007100857', 'BBB@mymail.com', '22.797788059889843', '76.16675646953126', 'Sanwer Road, ', 'Jakhya,', 'Opposite Revati Range Gate No.1,', 'Jakhya, Indore, Madhya Pradesh ', '453555', 'Organic Certified', 'Producer of different fruits, dairy products, poultry, ', '1', '5', '9'),
('rama', 13, 'Rama Murti', '1', 'Farmer', '5819232750', 'CCC@mymail.com', '22.544352199166514', '75.54053576640626', 'Farm', 'Bhawrasla', 'Indore, ', 'Madhya Pradesh ', '453555 ', '', 'Producer of different fruits, poultry, ', 'NULL', '3.5', 'NUL'),
('manoj', 14, 'Manoj', '1', 'Farmer', '9007100857', 'BBB@mymail.com', '22.797788059889843', '76.16675646953126', 'Sanwer Road, ', 'Jakhya,', 'Opposite Revati Range Gate No.1,', 'Jakhya, Indore, Madhya Pradesh ', '453555', 'Organic Certified', 'Producer of different fruits, dairy products, poultry, ', 'NULL', '4.5', '9'),
('rama', 15, 'Rama krishn mehta', '1', 'FPO', '5819232750', 'CCC@mymail.com', '22.544352199166514', '75.54053576640626', 'Farm', 'Bhawrasla', 'Indore, ', 'Madhya Pradesh ', '453555 ', 'Organic Certified', 'Producer of different fruits, poultry, ', '7', '4', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Buy`
--
ALTER TABLE `Buy`
  ADD PRIMARY KEY (`CropID`);

--
-- Indexes for table `csa`
--
ALTER TABLE `csa`
  ADD PRIMARY KEY (`CSA_ID`);

--
-- Indexes for table `CSABuy`
--
ALTER TABLE `CSABuy`
  ADD PRIMARY KEY (`userID`,`CSAID`);

--
-- Indexes for table `Sell`
--
ALTER TABLE `Sell`
  ADD PRIMARY KEY (`CropID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Buy`
--
ALTER TABLE `Buy`
  MODIFY `CropID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `csa`
--
ALTER TABLE `csa`
  MODIFY `CSA_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Sell`
--
ALTER TABLE `Sell`
  MODIFY `CropID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
