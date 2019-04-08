-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Квт 04 2019 р., 09:14
-- Версія сервера: 10.1.36-MariaDB
-- Версія PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `myshop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'Телефоны'),
(2, 0, 'Планшеты'),
(3, 1, 'Телефоны Nokia'),
(4, 1, 'Телефоны Samsung'),
(5, 1, 'Телефоны Apple'),
(6, 1, 'Телефоны GSmart'),
(7, 2, 'Планшеты Apple'),
(8, 2, 'Планшеты Acer'),
(10, 2, 'Планшеты Samsung'),
(11, 2, 'Планшеты Lenovo'),
(12, 0, 'Ноутбуки'),
(13, 12, 'Ноутбуки Asus'),
(16, 18, 'Наушники Panasonic'),
(18, 0, 'Наушники');

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_payment` datetime DEFAULT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `user_ip` varchar(15) NOT NULL,
  `total_sum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`id`, `user_id`, `date_created`, `date_payment`, `date_modification`, `status`, `comment`, `user_ip`, `total_sum`) VALUES
(15, 37, '2019-03-07 14:39:30', NULL, '2019-03-23 15:35:54', 0, 'id пользователя: 37<br />Имя: Oleg Nazarenko<br />Телефон: +30666999413<br />Адрес: Koritnya<br />', '127.0.0.1', 4400),
(16, 35, '2019-03-07 18:30:59', NULL, '2019-03-23 15:36:29', 1, 'id пользователя: 35<br />Имя: Игорь Тернюк<br />Телефон: +380956692817<br />Адрес: с.Межирич<br />', '127.0.0.1', 8000),
(17, 35, '2019-03-07 18:31:27', NULL, '2019-03-23 15:35:56', 0, 'id пользователя: 35<br />Имя: Игорь Тернюк<br />Телефон: +380956692817<br />Адрес: с.Межирич<br />', '127.0.0.1', 146000),
(18, 35, '2019-03-07 18:32:00', '2019-02-07 00:00:00', '0000-00-00 00:00:00', 1, 'id пользователя: 35<br />Имя: Игорь Тернюк<br />Телефон: +380956692817<br />Адрес: с.Межирич<br />', '127.0.0.1', 4570),
(19, 35, '2019-03-28 13:18:26', NULL, '2019-03-28 12:18:26', 0, 'id пользователя: 35<br />Имя: Игорь Тернюк<br />Телефон: +380956692817<br />Адрес: с.Межирич<br />', '127.0.0.1', 48300);

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `price`, `image`, `status`) VALUES
(1, 4, 'GT-C3560', '                        Samsung C3560 is a flip phone with 2.2-inch display. The phone supports GPRS, EDGE, and WAP 2.0 for internet connectivity and bluetooth and USB for data transfer. It also packs in the latest must-have features like enhanced connectivity with access to Samsung apps, email and social network sites. Add to this the multimedia available, like a built-in 2 megapixel camera, a FM radio and a 3.5mm ear jack, and you truly have all your entertainment needs at your fingertips. \n                    ', 1200, '1.jpeg', 1),
(2, 4, 'GT-E2600', 'Launch 	Announced 	2011, November. Released 2011, December\r\nStatus 	Discontinued\r\nBody 	Dimensions 	97 x 49.9 x 15.3 mm (3.82 x 1.96 x 0.60 in)\r\nWeight 	88.7 g (3.10 oz)\r\nSIM 	Mini-SIM\r\nDisplay 	Type 	TFT, 256K colors\r\nSize 	2.4 inches, 17.8 cm2 (~36.9% screen-to-body ratio)\r\nResolution 	240 x 320 pixels, 4:3 ratio (~167 ppi density)\r\nMemory 	Card slot 	microSD, up to 16 GB (dedicated slot)\r\nPhonebook 	1000 contacts, Photocall\r\nCall records 	30 dialed, 30 received, 30 missed calls\r\nInternal 	40 MB\r\nMain Camera 	Single 	2 MP\r\nVideo 	Yes\r\nSelfie camera 	  	No\r\nSound 	Loudspeaker 	Yes\r\n3.5mm jack 	Yes\r\n 	- DNSe lite\r\nComms 	WLAN 	No\r\nBluetooth 	3.0, A2DP\r\nGPS 	No\r\nRadio 	Stereo FM radio, RDS\r\nUSB 	microUSB 2.0\r\nFeatures 	Sensors 	\r\nMessaging 	SMS, MMS, Email, IM\r\nGames 	Yes + downloadable\r\nJava 	Yes, MIDP 2.0\r\n 	- MP3/WMA/eAAC+ player\r\n- MP4/H.263 player\r\n- Organizer\r\n- Voice memo\r\n- Predictive text input\r\nBattery 	  	Removable Li-Ion 800 mAh battery\r\nStand-by 	Up to 720 h\r\nTalk time 	Up to 11 h 50 min\r\nMisc 	Colors 	Black\r\nSAR 	0.36 W/kg (head)     0.69 W/kg (body)    \r\nSAR EU 	0.53 W/kg (head)    \r\nPrice 	About 70 EUR', 5000, '2.jpg', 1),
(3, 4, 'S5575 Galaxy mini', 'Samsung Galaxy Pop for India\r\nNetwork 	Technology 	\r\nGSM / HSPA\r\nLaunch 	Announced 	2011, January. Released 2011, February\r\nStatus 	Discontinued\r\nBody 	Dimensions 	110.4 x 60.8 x 12.1 mm (4.35 x 2.39 x 0.48 in)\r\nWeight 	105 g (3.70 oz)\r\nSIM 	Mini-SIM\r\nDisplay 	Type 	TFT capacitive touchscreen, 256K colors\r\nSize 	3.14 inches, 30.5 cm2 (~45.5% screen-to-body ratio)\r\nResolution 	240 x 320 pixels, 4:3 ratio (~127 ppi density)\r\nPlatform 	OS 	Android 2.2 (Froyo), upgradable to 2.3 (Gingerbread); TouchWiz UI 3\r\nChipset 	Qualcomm MSM7227 Snapdragon S1\r\nCPU 	600 MHz ARMv6\r\nGPU 	Adreno 200\r\nMemory 	Card slot 	microSD, up to 32 GB (dedicated slot), 2 GB included\r\nInternal 	160 MB, 384 MB RAM\r\nMain Camera 	Single 	3.15 MP\r\nVideo 	320p@15fps\r\nSelfie camera 	  	No\r\nSound 	Loudspeaker 	Yes\r\n3.5mm jack 	Yes\r\n 	- DNSe sound\r\nComms 	WLAN 	Wi-Fi 802.11 b/g/n, hotspot\r\nBluetooth 	2.1, A2DP\r\nGPS 	Yes, with A-GPS\r\nRadio 	Stereo FM radio, RDS\r\nUSB 	microUSB 2.0\r\nFeatures 	Sensors 	Accelerometer, proximity, compass\r\nBrowser 	HTML\r\nBattery 	  	Removable Li-Ion 1200 mAh battery\r\nStand-by 	Up to 570 h\r\nTalk time 	Up to 9 h 30 min\r\nMisc 	Colors 	Black, White\r\nSAR EU 	0.96 W/kg (head)    \r\nPrice 	About 90 EUR\r\nTests 	Camera 	Photo\r\nLoudspeaker 	Voice 68dB / Noise 65dB / Ring 70dB\r\nAudio quality 	Noise -83.0dB / Crosstalk -80.6dB', 4300, '3.jpg', 1),
(4, 4, 'E2530 La fleur', 'Network 	Technology 	\r\nGSM\r\nLaunch 	Announced 	2010, November. Released 2011, June\r\nStatus 	Discontinued\r\nBody 	Dimensions 	94.4 x 47.2 x 17.4 mm (3.72 x 1.86 x 0.69 in)\r\nWeight 	86 g (3.03 oz)\r\nSIM 	Mini-SIM\r\nDisplay 	Type 	TFT, 65K colors\r\nSize 	2.0 inches, 12.6 cm2 (~28.3% screen-to-body ratio)\r\nResolution 	128 x 160 pixels (~102 ppi density)\r\n 	- hidden 1\" CSTN 96 x 96 pixels external display\r\nMemory 	Card slot 	microSD, up to 8 GB (dedicated slot)\r\nPhonebook 	1000 entries, Photocall\r\nCall records 	30 dialed, 30 received, 30 missed calls\r\nMain Camera 	Single 	1.3 MP\r\nVideo 	Yes\r\nSelfie camera 	  	No\r\nSound 	Loudspeaker 	Yes\r\n3.5mm jack 	Yes\r\nComms 	WLAN 	No\r\nBluetooth 	2.1, A2DP\r\nGPS 	No\r\nRadio 	FM radio, recording\r\nUSB 	2.0\r\nFeatures 	Sensors 	\r\nMessaging 	SMS, MMS\r\nBrowser 	WAP 2.0/xHTML\r\nGames 	Yes\r\nJava 	Yes, MIDP 2.0\r\n 	- SNS integration\r\n- MP3/MP4 player\r\n- Organizer\r\n- Voice memo\r\n- Predictive text input\r\nBattery 	  	Removable Li-Ion 800 mAh battery\r\nStand-by 	Up to 530 h\r\nTalk time 	Up to 11 h 20 min\r\nMisc 	Colors 	Black; La Fleur edition\r\nSAR 	0.41 W/kg (head)     0.70 W/kg (body)    \r\nSAR EU 	0.43 W/kg (head)    \r\nPrice 	About 70 EUR', 70, '4.jpg', 1),
(5, 6, 'GSmart Roma R2', 'Network 	Technology 	\r\nGSM / HSPA\r\nLaunch 	Announced 	2013, October. Released 2013, October\r\nStatus 	Discontinued\r\nBody 	Dimensions 	-\r\nWeight 	-\r\nSIM 	Dual SIM\r\nDisplay 	Type 	IPS LCD capacitive touchscreen, 16M colors\r\nSize 	4.0 inches, 45.5 cm2\r\nResolution 	480 x 800 pixels, 5:3 ratio (~233 ppi density)\r\nPlatform 	OS 	Android 4.2 (Jelly Bean)\r\nChipset 	Mediatek MT6572 (28 nm)\r\nCPU 	Dual-core 1.3 GHz Cortex-A7\r\nGPU 	Mali-400\r\nMemory 	Card slot 	microSD, up to 32 GB (dedicated slot)\r\nInternal 	4 GB, 1 GB RAM\r\nMain Camera 	Single 	5 MP\r\nFeatures 	LED flash\r\nVideo 	Yes\r\nSelfie camera 	Single 	VGA\r\nVideo 	\r\nSound 	Loudspeaker 	Yes\r\n3.5mm jack 	Yes\r\nComms 	WLAN 	Wi-Fi 802.11 b/g/n, hotspot\r\nBluetooth 	3.0\r\nGPS 	Yes, with A-GPS\r\nRadio 	FM radio\r\nUSB 	microUSB 2.0\r\nFeatures 	Sensors 	Accelerometer, proximity\r\nBattery 	  	Removable Li-Ion 1400 mAh battery\r\nStand-by 	Up to 220 h\r\nTalk time 	Up to 3 h 30 min\r\nMisc 	Colors 	Black, White, Blue, Red\r\nPrice 	About 140 EUR', 1300, '5.jpg', 1),
(6, 3, 'Nokia 2600', 'Network 	Technology 	\r\nGSM\r\nLaunch 	Announced 	2004, Q2\r\nStatus 	Discontinued\r\nBody 	Dimensions 	107 x 46 x 20 mm, 80 cc (4.21 x 1.81 x 0.79 in)\r\nWeight 	94 g (3.32 oz)\r\nSIM 	Mini-SIM\r\nDisplay 	Type 	CSTN, 4096 colors\r\nSize 	1.5 inches, 7.3 cm2 (~14.7% screen-to-body ratio)\r\nResolution 	128 x 128 pixels, 1:1 ratio (~121 ppi density)\r\n 	- 4-way navi key\r\n- Screensavers\r\nMemory 	Card slot 	No\r\nPhonebook 	200 entries\r\nCall records 	10 dialed, 10 received, 10 missed calls\r\nInternal 	4 MB\r\nCamera 	  	No\r\nSound 	Loudspeaker 	Yes\r\nAlert types 	Vibration; Downloadable polyphonic, monophonic ringtones, composer	\r\n3.5mm jack 	No\r\nComms 	WLAN 	No\r\nBluetooth 	No\r\nGPS 	No\r\nRadio 	No\r\nUSB 	\r\nFeatures 	Sensors 	\r\nMessaging 	SMS, EMS\r\nBrowser 	\r\nGames 	3 - Mobile Soccer, Bounce, Nature Park\r\nLanguages 	Major European and Asia-Pacific languages\r\nJava 	No\r\n 	- Predictive text input\r\n- Stopwatch\r\n- Organizer\r\n- Changeable front and back covers\r\nBattery 	  	Removable Li-Ion 820 mAh battery (BR-5C)\r\nStand-by 	Up to 250 h\r\nTalk time 	Up to 3 h 30 min\r\n  	Standard, Li-Ion 850 mAh (BL-5C)\r\nStand-by 	Up to 250 h\r\nTalk time 	Up to 3 h 30 min\r\nMisc 	Colors 	Iron blue, Tree green\r\nSAR 	1.43 W/kg (head)     0.75 W/kg (body)    \r\nSAR EU 	0.85 W/kg (head)  ', 100, '6.gif', 0),
(7, 5, 'iPhone 3GS', 'Network 	Technology 	\r\nGSM / HSPA\r\nLaunch 	Announced 	2009, June. Released 2009, June\r\nStatus 	Discontinued\r\nBody 	Dimensions 	115.5 x 62.1 x 12.3 mm (4.55 x 2.44 x 0.48 in)\r\nWeight 	135 g (4.76 oz)\r\nSIM 	Mini-SIM\r\nDisplay 	Type 	TFT capacitive touchscreen, 16M colors\r\nSize 	3.5 inches, 36.5 cm2 (~50.9% screen-to-body ratio)\r\nResolution 	320 x 480 pixels, 3:2 ratio (~165 ppi density)\r\nProtection 	Corning Gorilla Glass, oleophobic coating\r\nPlatform 	OS 	iOS 3, upgradable to iOS 6.1.6\r\nCPU 	600 MHz Cortex-A8\r\nGPU 	PowerVR SGX535\r\nMemory 	Card slot 	No\r\nInternal 	8/16/32 GB, 256 MB RAM\r\nMain Camera 	Single 	3.15 MP, AF, f/2.8\r\nVideo 	480p@30fps\r\nSelfie camera 	  	No\r\nSound 	Loudspeaker 	Yes\r\n3.5mm jack 	Yes\r\nComms 	WLAN 	Wi-Fi 802.11 b/g\r\nBluetooth 	2.1, A2DP (headset support only)\r\nGPS 	Yes, with A-GPS\r\nRadio 	No\r\nUSB 	2.0\r\nFeatures 	Sensors 	Accelerometer, proximity, compass\r\nBrowser 	HTML (Safari)\r\n 	- iCloud cloud service\r\n- Maps\r\n- Organizer\r\n- TV-out\r\n- Audio/video player/editor\r\n- Photo viewer/editor\r\n- Voice command/dial\r\n- Predictive text input\r\nBattery 	  	Non-removable Li-Ion battery\r\nStand-by 	Up to 300 h\r\nTalk time 	Up to 12 h (2G) / Up to 5 h (3G)\r\nMusic play 	Up to 30 h\r\nMisc 	Colors 	Black, White\r\nSAR 	0.26 W/kg (head)     0.79 W/kg (body)    \r\nSAR EU 	0.45 W/kg (head)     0.40 W/kg (body)    \r\nPrice 	About 110 EUR\r\nTests 	Display 	Contrast ratio: 201:1 (nominal)\r\nCamera 	Photo\r\nLoudspeaker 	Voice 69dB / Noise 69dB / Ring 71dB\r\nAudio quality 	Noise -92.1dB / Crosstalk -95.0dB', 34000, '7.jpg', 1),
(8, 5, 'Apple iPhone 6', 'Network 	Technology 	\r\nGSM / CDMA / HSPA / EVDO / LTE\r\nLaunch 	Announced 	2014, September\r\nStatus 	Available. Released 2014, September\r\nBody 	Dimensions 	138.1 x 67 x 6.9 mm (5.44 x 2.64 x 0.27 in)\r\nWeight 	129 g (4.55 oz)\r\nBuild 	Front glass, aluminum body\r\nSIM 	Nano-SIM\r\n 	- Apple Pay (Visa, MasterCard, AMEX certified)\r\nDisplay 	Type 	LED-backlit IPS LCD, capacitive touchscreen, 16M colors\r\nSize 	4.7 inches, 60.9 cm2 (~65.8% screen-to-body ratio)\r\nResolution 	750 x 1334 pixels, 16:9 ratio (~326 ppi density)\r\nProtection 	Ion-strengthened glass, oleophobic coating\r\nPlatform 	OS 	iOS 8, upgradable to iOS 12.1.3\r\nChipset 	Apple A8 (20 nm)\r\nCPU 	Dual-core 1.4 GHz Typhoon (ARM v8-based)\r\nGPU 	PowerVR GX6450 (quad-core graphics)\r\nMemory 	Card slot 	No\r\nInternal 	16/32/64/128 GB, 1 GB RAM DDR3\r\nMain Camera 	Single 	8 MP, f/2.2, 29mm (standard), 1/3\", 1.5µm, PDAF\r\nFeatures 	Dual-LED dual-tone flash, HDR\r\nVideo 	1080p@60fps, 720p@240fps\r\nSelfie camera 	Single 	1.2 MP, f/2.2, 31mm (standard)\r\nFeatures 	face detection, HDR, FaceTime over Wi-Fi or Cellular\r\nVideo 	720p@30fps\r\nSound 	Loudspeaker 	Yes\r\n3.5mm jack 	Yes\r\n 	- 16-bit/44.1kHz audio\r\n- Active noise cancellation with dedicated mic\r\nComms 	WLAN 	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot\r\nBluetooth 	4.0, A2DP, LE\r\nGPS 	Yes, with A-GPS, GLONASS\r\nNFC 	Yes (Apple Pay only)\r\nRadio 	No\r\nUSB 	2.0, proprietary reversible connector\r\nFeatures 	Sensors 	Fingerprint (front-mounted), accelerometer, gyro, proximity, compass, barometer\r\n 	- Siri natural language commands and dictation\r\nBattery 	  	Non-removable Li-Po 1810 mAh battery (6.9 Wh)\r\nStand-by 	Up to 250 h (3G)\r\nTalk time 	Up to 14 h (3G)\r\nMusic play 	Up to 50 h\r\nMisc 	Colors 	Space Gray, Silver, Gold\r\nSAR 	1.18 W/kg (head)     1.18 W/kg (body)    \r\nSAR EU 	0.98 W/kg (head)     0.97 W/kg (body)    \r\nPrice 	About 360 EUR\r\nTests 	Performance 	Basemark OS II: 1252 / Basemark X: 15841\r\nDisplay 	Contrast ratio: 1213 (nominal), 3.838 (sunlight)\r\nCamera 	Photo / Video\r\nLoudspeaker 	Voice 66dB / Noise 65dB / Ring 72dB\r\nAudio quality 	Noise -94dB / Crosstalk -73.4dB\r\nBattery life 	\r\nEndurance rating 61h', 44000, '8.jpg', 1),
(9, 5, 'Apple iPhone 7 Plus', 'Network 	Technology 	\r\nGSM / CDMA / HSPA / EVDO / LTE\r\nLaunch 	Announced 	2016, September\r\nStatus 	Available. Released 2016, September\r\nBody 	Dimensions 	158.2 x 77.9 x 7.3 mm (6.23 x 3.07 x 0.29 in)\r\nWeight 	188 g (6.63 oz)\r\nBuild 	Front glass, body\r\nSIM 	Nano-SIM\r\n 	- IP67 dust/water resistant (up to 1m for 30 mins)\r\n- Apple Pay (Visa, MasterCard, AMEX certified)\r\nDisplay 	Type 	LED-backlit IPS LCD, capacitive touchscreen, 16M colors\r\nSize 	5.5 inches, 83.4 cm2 (~67.7% screen-to-body ratio)\r\nResolution 	1080 x 1920 pixels, 16:9 ratio (~401 ppi density)\r\nProtection 	Ion-strengthened glass, oleophobic coating\r\n 	- Wide color gamut\r\n- 3D Touch display & home button\r\nPlatform 	OS 	iOS 10.0.1, upgradable to iOS 12.1.3\r\nChipset 	Apple A10 Fusion (16 nm)\r\nCPU 	Quad-core 2.34 GHz (2x Hurricane + 2x Zephyr)\r\nGPU 	PowerVR Series7XT Plus (six-core graphics)\r\nMemory 	Card slot 	No\r\nInternal 	32/128/256 GB, 3 GB RAM\r\nMain Camera 	Dual 	12 MP, f/1.8, 28mm (wide), 1/3\", OIS, PDAF\r\n12 MP, f/2.8, 56mm (telephoto), 1/3.6\", 2x optical zoom, AF\r\nFeatures 	Quad-LED dual-tone flash, HDR\r\nVideo 	2160p@30fps, 1080p@30/60/120fps, 720p@240fps\r\nSelfie camera 	Single 	7 MP, f/2.2, 32mm (standard)\r\nFeatures 	Face detection, HDR\r\nVideo 	1080p@30fps\r\nSound 	Loudspeaker 	Yes, with stereo speakers\r\n3.5mm jack 	No\r\n 	- Active noise cancellation with dedicated mic\r\nComms 	WLAN 	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot\r\nBluetooth 	4.2, A2DP, LE\r\nGPS 	Yes, with A-GPS, GLONASS, GALILEO, QZSS\r\nNFC 	Yes\r\nRadio 	No\r\nUSB 	2.0, proprietary reversible connector\r\nFeatures 	Sensors 	Fingerprint (front-mounted), accelerometer, gyro, proximity, compass, barometer\r\n 	- Siri natural language commands and dictation\r\nBattery 	  	Non-removable Li-Ion 2900 mAh battery (11.1 Wh)\r\nStand-by 	Up to 384 h (3G)\r\nTalk time 	Up to 21 h (3G)\r\nMusic play 	Up to 60 h\r\nMisc 	Colors 	Jet Black, Black, Silver, Gold, Rose Gold, Red\r\nSAR 	1.19 W/kg (head)     1.19 W/kg (body)    \r\nSAR EU 	1.24 W/kg (head)     1.00 W/kg (body)    \r\nPrice 	About 690 EUR\r\nTests 	Performance 	Basemark OS II 2.0: 3796\r\nDisplay 	Contrast ratio: 1398:1 (nominal), 3.588 (sunlight)\r\nCamera 	Photo / Video\r\nLoudspeaker 	Voice 68dB / Noise 72dB / Ring 72dB\r\nAudio quality 	Noise -93.1dB / Crosstalk -80.5dB\r\nBattery life 	\r\nEndurance rating 75h', 50000, '9.jpg', 1),
(10, 5, 'Apple iPhone 8 plus', 'Network 	Technology 	\r\nGSM / HSPA / LTE\r\nLaunch 	Announced 	2017, September\r\nStatus 	Available. Released 2017, September\r\nBody 	Dimensions 	158.4 x 78.1 x 7.5 mm (6.24 x 3.07 x 0.30 in)\r\nWeight 	202 g (7.13 oz)\r\nBuild 	Front/back glass, aluminum frame\r\nSIM 	Nano-SIM\r\n 	- IP67 dust/water resistant (up to 1m for 30 mins)\r\n- Apple Pay (Visa, MasterCard, AMEX certified)\r\nDisplay 	Type 	LED-backlit IPS LCD, capacitive touchscreen, 16M colors\r\nSize 	5.5 inches, 83.4 cm2 (~67.4% screen-to-body ratio)\r\nResolution 	1080 x 1920 pixels, 16:9 ratio (~401 ppi density)\r\nProtection 	Ion-strengthened glass, oleophobic coating\r\n 	- Wide color gamut\r\n- 3D Touch display & home button\r\n- True-tone\r\nPlatform 	OS 	iOS 11, upgradable to iOS 12.1.3\r\nChipset 	Apple A11 Bionic (10 nm)\r\nCPU 	Hexa-core (2x Monsoon + 4x Mistral)\r\nGPU 	Apple GPU (three-core graphics)\r\nMemory 	Card slot 	No\r\nInternal 	64/256 GB, 3 GB RAM\r\nMain Camera 	Dual 	12 MP, f/1.8, 28mm (wide), OIS, PDAF\r\n12 MP, f/2.8, 57mm (telephoto), 2x optical zoom, PDAF\r\nFeatures 	Quad-LED dual-tone flash, HDR\r\nVideo 	2160p@24/30/60fps, 1080p@30/60/120/240fps\r\nSelfie camera 	Single 	7 MP, f/2.2, 32mm (standard)\r\nFeatures 	Face detection, HDR\r\nVideo 	1080p@30fps\r\nSound 	Loudspeaker 	Yes, with stereo speakers\r\n3.5mm jack 	No\r\n 	- Active noise cancellation with dedicated mic\r\nComms 	WLAN 	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot\r\nBluetooth 	5.0, A2DP, LE\r\nGPS 	Yes, with A-GPS, GLONASS, GALILEO, QZSS\r\nNFC 	Yes\r\nRadio 	No\r\nUSB 	2.0, proprietary reversible connector\r\nFeatures 	Sensors 	Fingerprint (front-mounted), accelerometer, gyro, proximity, compass, barometer\r\n 	- Siri natural language commands and dictation\r\nBattery 	  	Non-removable Li-Ion 2691 mAh battery (10.28 Wh)\r\nCharging 	Fast battery charging 15W: 50% in 30 min\r\nUSB Power Delivery 2.0\r\nQi wireless charging\r\nTalk time 	Up to 21 h (3G)\r\nMusic play 	Up to 60 h\r\nMisc 	Colors 	Gold, Space Gray, Silver, Red\r\nSAR 	1.19 W/kg (head)     1.19 W/kg (body)    \r\nSAR EU 	0.99 W/kg (head)     0.99 W/kg (body)    \r\nPrice 	About 770 EUR\r\nTests 	Performance 	Basemark OS II 2.0: 3806\r\nDisplay 	Contrast ratio: 1395:1 (nominal), 3.957 (sunlight)\r\nCamera 	Photo / Video\r\nLoudspeaker 	Voice 76dB / Noise 74dB / Ring 79dB\r\nAudio quality 	Noise -93.5dB / Crosstalk -80.2dB\r\nBattery life 	\r\nEndurance rating 81h', 63000, '10.jpg', 1),
(11, 13, 'Asus K50IJ', '                        Asus K50IJ\n                    ', 4950, '11.jpeg', 1),
(12, 16, ' RP-HD6MGC-K', ' RP-HD6MGC-K RP-HD6MGC-K', 2600, '12.jpeg', 1),
(15, 13, 'Asus X55', '                        Asus X55 description\n                    ', 17500, '15.jpg', 1),
(16, 13, 'Asus K40IJ', 'Asus K40IJ description', 3500, '16.jpeg', 0),
(17, 13, 'Asus X55', 'Asus X55 description', 17500, '17.jpg', 1),
(18, 13, 'Asus K40IJ', 'Asus K40IJ description', 3500, '', 0),
(19, 13, 'Asus X55', 'Asus X55 description', 17500, '', 1),
(20, 13, 'Asus K40IJ', 'Asus K40IJ description', 3500, '', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `purchase`
--

INSERT INTO `purchase` (`id`, `product_id`, `order_id`, `price`, `amount`) VALUES
(18, 5, 15, 1300, 3),
(19, 6, 15, 100, 5),
(20, 2, 16, 5000, 1),
(21, 5, 16, 1300, 2),
(22, 6, 16, 100, 4),
(23, 2, 17, 5000, 4),
(24, 10, 17, 63000, 2),
(25, 4, 18, 70, 1),
(26, 5, 18, 1300, 3),
(27, 6, 18, 100, 6),
(28, 3, 19, 4300, 1),
(29, 8, 19, 44000, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `phone`, `address`) VALUES
(35, 'xmonad@ukr.net', 'f1c1592588411002af340cbaedd6fc33', 'Игорь Тернюк', '+380956692817', 'с.Межирич'),
(36, 'mr.ternyuk@mail.ru', 'f1c1592588411002af340cbaedd6fc33', '', '', ''),
(37, 'noa5@mail.ru', 'f1c1592588411002af340cbaedd6fc33', 'Oleg Nazarenko', '+30666999413', 'Koritnya');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Індекси таблиці `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ibfk_1` (`user_id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Індекси таблиці `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_ibfk_1` (`product_id`),
  ADD KEY `purchase_ibfk_2` (`order_id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблиці `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
