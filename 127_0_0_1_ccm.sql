--
-- Database: `ccm`
--
CREATE DATABASE IF NOT EXISTS `ccm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ccm`;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `bid` int(3) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `batch` varchar(20) DEFAULT NULL,
  `batchtime` varchar(40) DEFAULT NULL,
  `startdate` varchar(40) DEFAULT NULL,
  `enddate` varchar(40) DEFAULT NULL,
  `amt` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`bid`, `name`, `email`, `contact`, `batch`, `batchtime`, `startdate`, `enddate`, `amt`) VALUES
(4, 'Rohit Joshi', 'joshirohitcsn@gmail.com', '9049606366', 'Regular', '7:00AM - 11:00AM', '25-06-2020', '25-06-2121', 10000),
(5, 'Pranav mukharji', 'pmukhrji@yahoo.com', '9049606349', 'Vacation', '4:00PM - 7:00PM', '26-06-2020', '24-09-2020', 4000),
(6, 'Abhijit Baba', 'abhibaba@gmail.com', '9049606345', 'Regular', '7:00AM - 11:00AM', '24-06-2020', '24-06-2121', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `ground`
--

CREATE TABLE `ground` (
  `gid` int(3) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `purpose` varchar(20) DEFAULT NULL,
  `fromdate` varchar(15) DEFAULT NULL,
  `todate` varchar(15) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ground`
--

INSERT INTO `ground` (`gid`, `name`, `email`, `contact`, `purpose`, `fromdate`, `todate`, `amount`, `status`) VALUES
(1, 'Rohit Joshi', 'joshirohitcsn@gmail.com', '9049606366', 'cricket practice', '2020-06-19', '2020-06-21', 4000, 'Approved'),
(2, 'Abhijit Baba', 'abhibaba@gmail.com', '9049606349', 'high Jump', '2020-06-19', '2020-06-27', 16000, 'Disapprove'),
(3, 'Pranav mukharji', 'pmukhrji@yahoo.com', '9049606345', 'Running', '2020-06-02', '2020-06-05', 6000, 'Approved'),
(4, 'sarbjit kaur', 'sarbat@gmail.com', '9049606366', 'Climbing', '2020-06-24', '2020-06-27', 6000, 'Approved'),
(5, 'Rohit Joshi', 'joshirohitcsn@gmail.com', '9049606349', 'cricket practice', '2020-06-10', '2020-06-28', 36000, 'Approved'),
(6, 'ramuj kulkrnifl', 'kulkrnifl@gmail.com', '7374834883', 'Running', '2020-08-21', '2020-08-22', 2000, 'Approved'),
(7, 'raj kuwar', 'ramraje@yahoo.com', '4567653452', 'Running', '2020-08-21', '2020-08-28', 14000, 'Approved'),
(8, 'Rohit Joshi', 'rj7121996@gmail.com', '9049606366', 'Running', '2020-12-20', '2020-12-22', 4000, '-');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mid` int(3) NOT NULL,
  `mname` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `catg` varchar(50) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mid`, `mname`, `email`, `contact`, `address`, `dob`, `catg`, `amount`) VALUES
(2, 'Rohit Joshi', 'joshirohitcsn@gmail.com', '9049606366', 'gfdfgdgh', '26-06-2020', 'Active Member Prime', 50000),
(4, 'Abhijit Baba', 'joshirohitcsn@gmail.com', '9049606366', 'bnbmnmbmnb', '26-06-2020', 'Active Member', 40000),
(5, 'Pranav mukharji', 'vishal@yahoo.com', '9049606349', 'bnbmnmbmnb', '18-06-2020', 'Active Member', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `nid` int(3) NOT NULL,
  `notice` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `notice`) VALUES
(1, 'today no match will play due to bad weather'),
(2, 'today blood donation camp organized so no matches after evening'),
(3, 'today is green day so use green shirts'),
(4, 'i have done alot work.'),
(5, 'hey today has bad weather!!!!!!!'),
(6, 'abhibaba a child welfare website lounch today'),
(7, ''),
(8, ''),
(9, 'sdsadasdasfzsDc'),
(10, 'some days are blind\r\n'),
(11, ''),
(12, ''),
(13, ''),
(14, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(3) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `role` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `contact`, `password`, `role`) VALUES
(1, 'Admin', 'admin2010@gmail.com', '7890875645', 'admin', 1),
(2, 'Abhijit Baba', 'abhibaba@gmail.com', '9270458685', 'abhibaba', 0),
(3, 'Rohan patil', 'rohanp@yahoo.com', '9049606345', 'asdfg', 0),
(4, 'sohan singh', 'sowan@gmail.com', '9049606769', 'sowam', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `ground`
--
ALTER TABLE `ground`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);
