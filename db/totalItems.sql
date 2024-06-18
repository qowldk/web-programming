

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
-- 테이블 구조 `totalItems`
--

CREATE TABLE `totalItems` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `tag` varchar(10) DEFAULT NULL,
  `sellerId` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `totalItems`
--

INSERT INTO `totalItems` (`id`, `name`, `description`, `price`, `image_url`, `created_at`, `tag`, `sellerId`) VALUES
(1, '이산수학', '이번 년도 책 팝니다', '15000', 'https://image.yes24.com/goods/106009846/XL','2024-06-01', '컴공', 'qowldk'),
(2, '기술과 경제', '조금 사용감이 있습니다', '5000', 'https://contents.kyobobook.co.kr/sih/fit-in/458x0/pdt/9791130318486.jpg','2024-06-01', '기타', 'qowldk'),
(3, '컴퓨터네트워크', '컴네 책 팝니다', '20000', 'https://contents.kyobobook.co.kr/sih/fit-in/458x0/pdt/9788960552425.jpg', '2024-06-01', '컴공', 'qowldk'),
(4, '문명과 역사 책 ', '깨끗하게 사용했습니다. 상태 좋아요 ', '12000', 'https://contents.kyobobook.co.kr/sih/fit-in/458x0/pdt/4808954646789.jpg', '2024-06-01', '기타', 'qowldk'),
(5, '공학수학', '깔끔하게 사용해서 거의 새거입니다. 네고 가능요', '20000', 'https://contents.kyobobook.co.kr/sih/fit-in/458x0/pdt/9791159712647.jpg', '2024-06-02', '컴공', 'qowldk'),
(6, 'c++ 프로그래밍', '시쁠쁠 책 팝니다. 사용감 거의 없습니다', '15000', 'https://contents.kyobobook.co.kr/sih/fit-in/458x0/pdt/9791156643647.jpg', '2024-06-03', '컴공', 'qowldk'),
(18, '운영체제 책(공룡책) 팝니다', '공룡책이라 불리는 가장 유명한 OS책입니다. 이 책의 단점은 어렵다는거 말곤 없습니다.', '29000', 'https://image.yes24.com/goods/89496122/XL', '2024-06-06', '컴공', 'jew123'),
(19, '컴퓨터구조 책 팝니다', '혼자 공부할라고 샀다가 안보게 돼서 팝니다.\r\n완전 깨끗해요 정가 3.5인데 2.9에 팔아봅니다', '29000', 'https://image.aladin.co.kr/product/5264/19/cover500/s422635174_1.jpg', '2024-06-06', '컴공', 'jsfe23'),
(20, '자료구조 책 팔아요', ' 필기감 살짝 있지만 상태 좋습니다. 파이썬으로 하는 자료구조에용', '10000', 'https://image.yes24.com/goods/74971408/XL', '2024-06-06', '컴공', 'wefsdf3'),
(21, '기계공학실습 책', '책 엄청 두꺼워요. 밑줄만 그어져있습니다', '18000', 'https://image.yes24.com/goods/97659199/XL', '2024-06-06', '기계', 'qplap'),
(22, '영어 청해', '영어 청해 책 팔아요 싸게 팝니당', '5000', 'https://image.yes24.com/goods/89468375/XL', '2024-06-06', '기타', 'plplk'),
(23, '그래픽 디자인 책', '그래픽 디자인 책 팝니다. ', '10000', 'https://www.hanbit.co.kr/data/books/B4961630095_l.jpg', '2024-06-06', '디공', '1651dssd');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `totalItems`
--
ALTER TABLE `totalItems`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `totalItems`
--
ALTER TABLE `totalItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
