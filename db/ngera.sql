-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 11:59 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngera`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `adminid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `role` int(2) NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `profilepicture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adminid`, `name`, `email`, `password`, `role`, `active`, `profilepicture`) VALUES
(1, 'RueDev', 'admin@ngera.com', '835d6dc88b708bc646d6db82c853ef4182fabbd4a8de59c213f2b5ab3ae7d9be', 1, 1, '../dist/img/profpics/me.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryid` int(10) NOT NULL,
  `categoryname` varchar(100) NOT NULL,
  `categoryimage` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `categoryname`, `categoryimage`) VALUES
(1, 'Laptops', 'images/categories/laptops.jpg'),
(2, 'Printers', 'images/categories/printers.jpg'),
(7, 'Accessories', 'images/categories/e9f3064a37460e22935d3df9e26e53bb_XS.jpg'),
(8, 'Toners And Ink Cartridges', 'images/categories/Toner-HD-HP-LaserJet1320-1160-Canon-LBP-3300-3360_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus_messages`
--

CREATE TABLE `contactus_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_sent` datetime NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `is_served` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contactus_messages`
--

INSERT INTO `contactus_messages` (`id`, `name`, `email`, `date_sent`, `message`, `is_served`) VALUES
(1, 'Mwangi', 'mwangi@mail.com', '2017-07-18 00:00:00', ' My Message\n				', 0),
(2, 'august2017', 'dzyslinjez@gmail.com', '2017-08-12 00:00:00', ' Your Message\n				', 0),
(3, 'slinjez', 'admin@capitalgetit.com', '2017-08-12 00:00:00', ' Your Message\n				', 0),
(4, 'slinjez', 'mwangithiga@gmail.com', '2017-08-14 00:00:00', ' My Message\n				', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordid` int(200) NOT NULL,
  `orderid` int(200) NOT NULL DEFAULT '0',
  `placer` int(10) NOT NULL,
  `product` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `pickupcoord` text,
  `attime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `orderid` int(200) NOT NULL,
  `placerid` int(10) NOT NULL,
  `pickupcrds` text,
  `distance` text NOT NULL,
  `shipcost` text NOT NULL,
  `paid` tinyint(2) NOT NULL DEFAULT '0',
  `dispatched` tinyint(2) NOT NULL DEFAULT '0',
  `dispatchedby` int(10) DEFAULT NULL,
  `freightid` int(200) NOT NULL DEFAULT '0',
  `arrived` tinyint(2) DEFAULT '0',
  `collected` tinyint(2) NOT NULL DEFAULT '0',
  `receivedby` int(10) DEFAULT NULL,
  `attime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productprices`
--

CREATE TABLE `productprices` (
  `priceid` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `asofdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productprices`
--

INSERT INTO `productprices` (`priceid`, `productid`, `price`, `asofdate`) VALUES
(1, 1, 15000, '2017-08-11 11:37:16'),
(5, 5, 88000, '2017-08-14 11:16:52'),
(6, 6, 25000, '2017-08-14 11:40:34'),
(7, 7, 5400, '2017-08-14 14:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` bigint(20) NOT NULL,
  `productcategory` int(10) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `productdescription` text,
  `imgpath` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productcategory`, `productname`, `productdescription`, `imgpath`) VALUES
(1, 1, 'Hp Pavillion dv7', '<h6>Lorem ipsum dolor sit amet</h6>\n						<p>Lorem ipsum dolor sit amet, consectetur adipisicing\n							elPellentesque vehicula augue eget nisl ullamcorper, molestie\n							blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur\n							adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et\n							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\n							exercitation ullamco. labore et dolore magna aliqua.</p>\n						<p class="w3ls_para">Lorem ipsum dolor sit amet, consectetur\n							adipisicing elPellentesque vehicula augue eget nisl ullamcorper,\n							molestie blandit ipsum auctor. Mauris volutpat augue\n							dolor.Consectetur adipisicing elit, sed do eiusmod tempor\n							incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim\n							veniam, quis nostrud exercitation ullamco. labore et dolore magna\n							aliqua.</p>', 'images/products/1/1.jpg'),
(5, 1, 'Dell XPS 13 Laptop', '<p>\r\n\r\n<div><div></div></div><div><div><div><img alt="Innovation that inspires" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/Awards/award-xps-13-9350-laptop.jpg" title="Image: http://i.dell.com/sites/imagecontent/products/PublishingImages/Awards/award-xps-13-9350-laptop.jpg"></div><div><h2>Innovation that inspires.</h2><p>When youâ€™re at the forefront of ingenuity, you get noticed. Thatâ€™s why itâ€™s no surprise the XPS 13 was honored. The winning streak continues.</p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div></div><div><div><div><img alt="" src="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></div><div><h2>Operating system</h2><p><strong></strong><strong>With Windows 10 Home</strong>&nbsp;â€“ get the best combination of Windows features you know and new improvements youâ€™ll love.</p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div></div></div><div><div><div><img alt="The smallest 13-inch  on the planet with the worlds first InfinityEdge display " src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-01.jpg"></div><div><h2>The smallest 13-inch on the planet with the worldâ€™s first InfinityEdge display</h2><p><strong>More screen, less to carry:</strong>&nbsp;The virtually borderless InfinityEdge display maximizes screen space by squeezing a 13-inch display in an 11-inch frame. With a bezel only 5.2 mm thin, weighing in at only 2.7 pounds and measuring a super slim 9-15 mm, the XPS 13 is exceptionally thin and light.</p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div></div></div><div><div><img alt="Stunning state-of-the-art display" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-02.jpg"></div><div><h2>Stunning, state-of-the-art display</h2><p><strong>Stunning UltraSharpâ„¢ QHD+ resolution (3200x1800):</strong>&nbsp;An optional upgrade gives you eye-popping detail with 5.7 million pixels (276 ppi). <br><br><strong>Easy to share:</strong>&nbsp;See content clearly from nearly every angle with the IGZO IPS panel, providing a wide viewing angle of up to 170Â°. <br><br><strong>Brighten your day:</strong>&nbsp;400 nit brightness is brighter than a typical laptop panel, so you get a great view, even outside.<br><br><strong>Gorgeous colors: </strong>See the brightest bright and the darkest darks with a color gamut of 72% and a contrast ratio of 1000:1. <br><br><strong>Touch friendly:</strong>&nbsp;Tap, swipe and pinch your way around the screen. The optional touch display lets you interact naturally with your technology.<br></p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div></div><div><div><img alt="Fully-loaded for enhanced performance" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-03.jpg"></div><div><h2>Fully-loaded for enhanced performance</h2><p></p><p><strong></strong></p><strong>The latest performance features: </strong>Powerful 6th Gen IntelÂ® Coreâ„¢ processors and the latest Intel HD graphics offer speed and reliability. Boot and resume in seconds with the latest solid state drives now with faster PCIe options up to 1TB<a target="_blank" rel="nofollow">*</a>, and get up to 16GB<a target="_blank" rel="nofollow">*</a>&nbsp;of memory. Optional IntelÂ® Irisâ„¢ 540 Graphics, paired with the i7 6560U processor, deliver the high impact visuals you want, with a performance boost of up to 40%<a target="_blank" rel="nofollow">*</a>&nbsp;for the highest quality settings for media capabilities like video editing with IntelÂ® Quick Sync Video.<br><br><strong>Stay powered longer:</strong>&nbsp;Longest battery life of any 13-inch product*, with up to 18 hours, 14 minutes<a target="_blank" rel="nofollow">*</a>&nbsp;of battery life with FHD display. Add an additional 10 hours<a target="_blank" rel="nofollow">*</a>&nbsp;with the optional Dell Power Companion.<br><br><strong>Leading-edge connectivity: </strong>Thunderboltâ„¢ 3 multi-use port allows you to charge your laptop, connect to multiple devices (including support for up to two 4K displays) and enjoy data transfers up to 40Gbps, 8 times that of a USB 3.0.<br><br><strong>Advanced docking:</strong>&nbsp;Featuring a single-cable connection for power, Ethernet, audio and video. Add the optional Dell Thunderboltâ„¢ Dock for faster data transfers and support for up to three Full HD displays or two 4K displays.<br><p></p><p></p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div></div><div><div><img alt="Microsoft and Dell have just raised the bar Again" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-04.jpg"></div><div><h2>Microsoft and Dell have just raised the bar. Again.</h2><p>The best windows ever meets the best Dell ever. The result? A whole new era of power, performance and productivity. Windows 10 give you all the features you know from the worldâ€™s most popular operating system, plus great improvements youâ€™ll love. Enhance all you do with the new Windows 10 features:<br><br><strong>Here to help:</strong>&nbsp;Easily interact with your own personal digital assistant: Cortana. Using Cortana with a Dell PC equipped with Waves MaxxAudioÂ® Pro gives you a natural voice interaction experience. <br><br><strong>Start it up:</strong>&nbsp;Youâ€™ll feel like an expert from the get-go since your Windows Start menu is back in an expanded form. Plus, all your pinned applications will carry over so your experience is familiar, productive and better than ever <br><br><strong>Stay unplugged:</strong>&nbsp;Stay untethered for even longer: All Windows 10 devices now have Battery Saver to automatically conserve power so you can get more done for longer.<br></p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div></div><div><div><img alt="Built for business" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-05.jpg"></div><div><h2>Built for business</h2><p>Best-in-class Security with industry-leading endpoint solutions that include leading-edge encryption, authentication and threat protection.<br><br>&nbsp;â€¢ Protect data across multiple end-points with Dell Data Protection | Encryption. Factory installed, IT admins can remotely manage encryption policies to easily meet compliance regulations right out of the box.<br>&nbsp;â€¢ Dell Data Protection | Protected Workspace keeps your information safe. If an attack occurs, the malware is sealed off and a safe environment is restored in only 20 seconds.<br><br>The worldâ€™s most manageable XPS allows IT to change BIOS settings and configure systems with ample flexibility that your business requires. <br><br>&nbsp;â€¢ Dell Client Command Suite compatibility - free tools that help automate and streamline system deployment, monitoring and updating in complex IT environments<br>&nbsp;â€¢ Factory installed, Dell Command | Update eliminates time-consuming hunting and pecking while minimizing system disruption. <br>&nbsp;â€¢ Factory installed with Dell Command | Power Manager and Battery Extender Mode.<br>&nbsp;â€¢ Simplify deployments with long lifecycles using Dell Configuration and Deployment Services with Dell Imaging Services.<br>&nbsp;â€¢ Dell KACE System Management solutions meet the most demanding IT management needs.<br></p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div></div><div><div><div><h2>Improved usability</h2><p><strong>Pinch, zoom and click with precision</strong><br>The precision touch pad prevents jumping and floating cursors, while Accidental Activation Prevention puts a stop to unintentional clicks when your palm hits the touch pad. <br><br><strong>See what youâ€™ve been missing</strong><br>A standard backlit keyboard illuminates your keys so you can stay productive in low-light or no-light rooms. <br></p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div><div><img alt="Improved usability" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-06.jpg"></div></div></div><div><div><div><img alt="Artfully constructed from premium materials" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/Polaris/laptop-xps-13-pdp-polaris-module-7-REVISED.jpg"></div><div><h2>Artfully constructed from premium materials</h2><p><strong>Maximum durability:</strong>&nbsp;The XPS 13 is cut with precision from a single block of aluminum for a sturdy, durable chassis in a beautiful design. The CorningÂ® GorillaÂ® Glass NBTâ„¢ QHD+ display option is up to 10 times more scratch resistant than soda lime glass<a target="_blank" rel="nofollow">*</a>. The XPS 13 is now available in gold.<br><br><strong>Cool under pressure:</strong>&nbsp;The palm rest is made from carbon fiber. It\'s strong and thin like aluminum, but lighter and cooler to the touch.<br></p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div></div></div><div><div><div><h2>The greenest XPS laptops ever</h2><p>Power efficient: XPS 13 is ENERGY STARÂ® certified <br><br><strong>Smarter materials:</strong>&nbsp;Free of materials like cadmium, lead, mercury and some phthalates, itâ€™s also EPEATÂ® Gold registered<a target="_blank" rel="nofollow">*</a>&nbsp;and BFR/PVC-free<a target="_blank" rel="nofollow">*</a>.<br><br><strong>Recycle-friendly:</strong>&nbsp;90% of the laptopâ€™s parts can be easily recycled or reused, and the bamboo packaging trays are 100% recyclable<br></p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div><div><img alt="The greenest XPS laptops ever" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-08.jpg"></div></div></div><div><div><img alt="Ports  Slots" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-09.jpg"></div><div><h2>Ports &amp; Slots</h2><p>1. Speaker | 2. SD card slot | 3. USB 3.0 with PowerShare | 4. Noble lock slot | 5. AC power | 6. Thunderboltâ„¢ 3 supporting: Power in/charging, PowerShare, Thunderbolt 3 (40Gbps bi-directional), USB 3.1 Gen 2 (10Gbps), VGA, HDMI, Ethernet and USB-A via Dell Adapter (sold separately) | 7. USB 3.0 | 8. Headset jack | 9. Battery gauge button and indicator</p><p><a target="_blank" rel="nofollow" href="http://www.dell.com/en-us/shop/productdetails/xps-13-9350-laptop"></a></p></div></div><div><div><img alt="Dimensions  Weight" src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-13-9350-laptop/laptop-xps-13-9350-pdp-polaris-10.jpg"></div><div><h2>Dimensions &amp; Weight</h2><p>Height: 0.33 â€“ 0.6" (9-15mm) | Width: 11.98" (304mm) | Depth: 7.88" (200mm) | Starting at weight: 2.7lbs (1.2 kg) non-touch, 2.9lbs (1.29kg) touch</p></div></div></div>\r\n\r\n<br></p>', 'images/products/5/dell32.JPG'),
(6, 2, 'CANON PIXMA MG6320 Printer WiFi', '<p>\r\n\r\nMultifunction printer with wireless connectivity WIFi, printing in 21 seconds a photo 10 Ã— 15, 6 inks model MG6320, MG5420 5 for, support full HD printing from a camcorder or camera. Maximum color resolution 9600 Ã— 2400 dpi5. LCD touch screen of 3.5 inches for the model MG6320 and 3 inches without the tactile model MG5420.<br><br><a target="_blank" rel="nofollow" href="http://www.maxigadget.com/?attachment_id=37847"><img width="400" alt="" src="http://www.maxigadget.com/wp-content/uploads/2012/12/canon-pixma-ip7220.jpg" height="300" title="Image: http://www.maxigadget.com/wp-content/uploads/2012/12/canon-pixma-ip7220.jpg"></a>\r\n\r\n<br></p>', 'images/products/6/canon-pixma-mg5420.jpg'),
(7, 8, 'HD- Q2612A TONER - HP LASERJET TONER', '<p>\r\n\r\n<div><p><strong><br>Brand:</strong>&nbsp;Hp</p><p><strong>Model:</strong>&nbsp;HP (Q2612A) (Canon CRG 703)</p><p><strong>Color:</strong>&nbsp;K</p><p><strong>Page:</strong>&nbsp;2200 sf * (with 5% coverage)</p><p><strong>Original Price:</strong>&nbsp;73,35 USD</p><p><strong>Equivalent Price:</strong>&nbsp;14,00 $ + VAT</p><p><strong>Dolum Price:</strong>&nbsp;15,00 TL</p><p><strong>Drum Price:</strong></p><p><strong>Chip Price:</strong></p></div><div></div><div><br>\r\n\r\n</div><br></p>', 'images/products/7/hd_(q2612a)lazer_toner__malzeme_634958387402888750.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` bigint(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Rue Developer', 'mwangi@gmail.com', '0712577777', '835d6dc88b708bc646d6db82c853ef4182fabbd4a8de59c213f2b5ab3ae7d9be');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `contactus_messages`
--
ALTER TABLE `contactus_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `productprices`
--
ALTER TABLE `productprices`
  ADD PRIMARY KEY (`priceid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contactus_messages`
--
ALTER TABLE `contactus_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordid` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `orderid` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productprices`
--
ALTER TABLE `productprices`
  MODIFY `priceid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
