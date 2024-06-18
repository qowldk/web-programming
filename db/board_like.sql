

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
-- 테이블 구조 `board_like`
--

CREATE TABLE `board_like` (
  `id` int(11) UNSIGNED NOT NULL,
  `board_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `board_like`
--

INSERT INTO `board_like` (`id`, `board_id`, `user_id`) VALUES
(4, 16, 'qowldk'),
(5, 18, 'qowldk'),
(6, 19, 'qowldk'),
(7, 1, 'qowldk'),
(8, 20, 'qowldk'),
(9, 18, ''),
(10, 21, 'qowldk'),
(11, 10, 'qowldk'),
(12, 8, 'qowldk'),
(13, 24, 'qowldk'),
(14, 26, 'qowldk'),
(15, 27, 'qowldk');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board_like`
--
ALTER TABLE `board_like`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board_like`
--
ALTER TABLE `board_like`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
