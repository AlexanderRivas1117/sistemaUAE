--
-- Table structure for table `tbl_contact`
--
create database blog_samples;
use blog_samples;

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `first_name`, `last_name`, `address`, `email`, `phone`, `date_of_birth`) VALUES
(1, 'Peter', 'Parker', '970 Princee St.\r\n\r\nPiqua, OH 45356', 'peter@parker.com', '4455664455', '1990-04-10'),
(2, 'Barry', 'Allen', '976 Livingston Lane \r\nSaint Peterssburg, FL 33702', 'barry@allen.com', '2211335566', '1983-02-02'),
(3, 'Bruce', 'Banner', '69 Bridge Lane \r\nBrooklyn, NY 11201', 'bruce@banner.com', '7788995566', '1987-04-14'),
(4, 'Bruce', 'Wayne', '896 East Smith Store Dr. \r\nLake Jackson, TX 77566', 'bruce@wayne.com', '8877887744', '1991-11-15'),
(5, 'Harvy', 'Dent', '35 Wakehurst Avenue \r\nNoblesville, IN 46060', 'harvy@dent.com', '9988774445', '1990-10-01'),
(6, 'Tony', 'Stark', '31 Edgewater Court \r\nMalden, MA 02148', 'tony@stark.com', '8899886655', '1984-10-05'),
(7, 'Nick', 'Fury', '70 WakePrin St.\r\n\r\nPiqua, OL 356444', 'nick@fury.com', '9966554488', '1980-01-25'),
(8, 'John', 'Mclane', '76 Kevins Lane \r\n\r\nSt. Petersburg, FN 33711', 'john@maclay.com', '7744114411', '2000-11-15'),
(9, 'Howard', 'Roark', '88 Golden Lane \r\n\r\nBrooklyn, LS 11204', 'howard@roark.com', '8745554413', '2011-11-15'),
(10, 'Peter', 'Keating', '86 Smith Road\r\n\r\nLake Jackson, TQ 77566', 'peter@keating.com', '9089094445', '2013-11-15');


--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);
COMMIT;
