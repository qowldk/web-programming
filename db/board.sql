

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
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `bid` int(11) NOT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `subject` varchar(245) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `modifydate` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`bid`, `userid`, `subject`, `content`, `regdate`, `modifydate`, `status`, `parent_id`, `likes`) VALUES
(1, 'example_user', 'Example Subject', 'This is an example content.', '2023-05-30 09:43:06', NULL, 1, NULL, 1),
(6, 'qowldk', '이산수학 책 구합니다', '이산수학 책 중고로 구매하고싶습니다', '2024-05-31 00:11:44', NULL, 1, NULL, 0),
(7, 'hong', '정보보호개론 시험 유형', '정보보호개론 작년 시험은 어땠나요', '2024-05-31 00:11:51', NULL, 1, NULL, 0),
(8, 'woo', '기술과 경제 책 가지신 분', '기술과 경제 책 가지고 계신 분 있나요?', '2024-05-31 00:19:47', NULL, 1, NULL, 1),
(9, 'gue', '졸설 팀플 조 어떻게 짜요', '졸설 팀플 조는 어떻게 짜는 건가요?', '2024-05-31 00:20:07', NULL, 1, NULL, 0),
(10, '156lkm', 'e-learning 개론 수업 시간 외의 과제 수행 질문', 'e-learning 개론 과제 어떻게 해요ㅠㅠ', '2024-05-31 00:45:39', NULL, 1, NULL, 1),
(11, 'qowldk', '산책 하실 분 구함', '얍', '2024-05-31 00:53:10', NULL, 1, NULL, 0),
(12, 'vsodm', '졸업 이수 관련 질문', 'fsdafsdafdsa', '2024-05-31 01:16:36', NULL, 1, NULL, 0),
(13, 'jllmk3', '오늘 학식', '얍', '2024-05-31 01:20:00', NULL, 1, 11, 0),
(14, 'zdvknvl', 'e-learning 개론', 'a', '2024-05-31 01:20:09', NULL, 1, 10, 0),
(15, '789', '축제 연예인', '누구옴', '2024-05-31 10:59:03', NULL, 0, NULL, 0),
(18, 'jew123', '글 등록하기', '안녕!', '2024-06-03 14:56:09', NULL, 1, NULL, 2),
(19, 'jew123', 'fsdafasdf', 'sdafdsfsdaf', '2024-06-05 00:37:46', NULL, 1, NULL, 6),
(22, '6541', 'React 공부', '정말 정말 재밌어요.', '2024-06-06 19:38:40', '2024-06-06 19:43:41', 1, NULL, 0),
(23, 'efwvv', '[RE]오늘은 React 공부를 했습니다.', '저도 해봤는데 너무 재밌어요', '2024-06-06 19:46:38', NULL, 1, 22, 0),
(24, 'jawef', '자바스크립트는 정말 재밌다.', '오늘은 콜백함수를 공부해보았다.', '2024-06-06 21:13:59', NULL, 1, NULL, 1),
(25, '789645', '[RE]자바스크립트는 정말 재밌다.', '오늘은 콜백함수를 공부해보았다.', '2024-06-09 17:29:13', NULL, 0, 24, 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`bid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
