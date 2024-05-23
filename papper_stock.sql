SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `order_table` (
  `Order_ID` int(11) NOT NULL,
  `User_ID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Quantity` int(50) NOT NULL,
  `Price_Rs.` int(50) NOT NULL,
  `Recite` blob NOT NULL,
  `Add_Line1` varchar(50) NOT NULL,
  `Add_Line2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `users_table` (
  `User_ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `F_Name` varchar(50) NOT NULL,
  `L_Name` varchar(50) NOT NULL,
  `U_Name` varchar(50) NOT NULL,
  `NIC` varchar(50) NOT NULL,
  `Tel_No` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `users_table` (`User_ID`, `Email`, `F_Name`, `L_Name`, `U_Name`, `NIC`, `Tel_No`, `Password`) VALUES
(3, '123@abc.com', 'abc', 'abc', 'abc', '123', '123', '$2y$10$s/in1ti3ujXjIIiMIEMGL.02i7qtFgEI9cl9p2BA.qXtGsYj3cJEq');
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`Order_ID`);
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`);
ALTER TABLE `order_table`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_table`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
