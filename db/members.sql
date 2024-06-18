

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `userid` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `username` varchar(145) DEFAULT NULL,
  `passwd` varchar(200) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `balance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`mid`, `userid`, `email`, `username`, `passwd`, `regdate`, `balance`) VALUES
(1, 'test2', 'qowldk1030@gmail.com', 'jia', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-31 00:25:14', 0),
(2, 'test3', 'qowldk1033@naver.com', '배지아', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '2024-05-31 10:58:22', 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
