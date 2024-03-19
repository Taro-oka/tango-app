--
-- Database: tangoapp
--
-- DROP DATABASE tangoapp; ※ もともと作成していなかったら、そんなもん存在しないよ、とエラーになる！！
DROP DATABASE IF EXISTS tangoapp;
CREATE DATABASE IF NOT EXISTS tangoapp DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE tangoapp;

/* ユーザーに権限の付与 */
GRANT ALL ON tangoapp.* TO 'test_user'@'localhost';

--
-- Database: `tangoapp`
--

--
-- Table structure for table `topics`
--

CREATE TABLE `words` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT '単語のID',
  `title` varchar(30) NOT NULL COMMENT '単語自体',
  `phonetics` varchar(30) NOT NULL COMMENT '発音記号',
  `remembered` int(1) NOT NULL COMMENT '公開状態(1: 公開、0: 非公開)',
  `en_definition` text(1000) NOT NULL COMMENT '英語定義',
  `ja_definition` text(1000) NOT NULL COMMENT '日本語定義',
  `user_id` varchar(10) NOT NULL COMMENT '作成したユーザーの名前',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'tangoapp' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(10) PRIMARY KEY COMMENT 'ユーザーid(name)',
  `pwd` varchar(60) NOT NULL COMMENT 'パスワード',
  `nickname` varchar(10) NOT NULL COMMENT '画面表示用名',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'tangoapp' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);

START TRANSACTION;

SET time_zone = "+09:00";

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `title`, `remembered`, `user_id`, `del_flg`) VALUES
(1, 'apple', 0, 'testさん。', 0),
(2, 'orange', 0, 'testさん。', 0),


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pwd`, `nickname`, `del_flg`) VALUES
('testさん', '$2y$10$n.PPvod4ai0r0qpqn5DurenOoxTyRhvef3S7DxoMu5BLRspG5oiBK', 'テストユーザー', 0);


COMMIT;

