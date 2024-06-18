
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
-- 테이블 구조 `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` varchar(20) DEFAULT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  `item_name` varchar(40) DEFAULT NULL,
  `seller` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `quantity`, `created_at`, `price`, `image_url`, `item_name`, `seller`) VALUES
(1, 'qowldk', 1, 1, '2024-06-01 08:53:40' , '15000', 'https://image.yes24.com/goods/106009846/XL','이산 수학', 'qowldk');
--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
