-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-01-25 14:29:07
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `camping_gear`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `category_table`
--

CREATE TABLE `category_table` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `category_table`
--

INSERT INTO `category_table` (`id`, `category`) VALUES
(1, 'テント'),
(2, 'タープ・シェード'),
(3, 'グリル・焚火'),
(4, '家具'),
(5, '寝具'),
(6, '調理グッズ'),
(7, '電化製品'),
(8, '保冷グッズ'),
(9, '小物類');

-- --------------------------------------------------------

--
-- テーブルの構造 `genre_table`
--

CREATE TABLE `genre_table` (
  `id` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `genre_table`
--

INSERT INTO `genre_table` (`id`, `genre`) VALUES
(1, 'テント'),
(2, 'タープ'),
(3, 'シェード'),
(4, '焚火台'),
(5, 'テーブル'),
(6, 'チェア'),
(7, 'スツール'),
(8, 'クッション'),
(9, '寝袋'),
(10, 'ペグ'),
(11, 'ポール'),
(12, 'ハンマー'),
(13, 'ランタン'),
(14, '保冷剤'),
(15, 'クーラーボックス');

-- --------------------------------------------------------

--
-- テーブルの構造 `like_table`
--

CREATE TABLE `like_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `like_table`
--

INSERT INTO `like_table` (`id`, `user_id`, `item_id`, `created_at`) VALUES
(29, 4, 1, '2024-01-25 13:36:01'),
(30, 4, 12, '2024-01-25 13:36:17'),
(34, 1, 1, '2024-01-25 17:01:14'),
(35, 2, 3, '2024-01-25 18:02:21'),
(36, 2, 8, '2024-01-25 18:02:23'),
(37, 2, 19, '2024-01-25 18:02:25'),
(38, 2, 22, '2024-01-25 18:02:27'),
(39, 5, 21, '2024-01-25 21:20:52'),
(42, 5, 1, '2024-01-25 21:26:13'),
(43, 5, 2, '2024-01-25 21:26:14'),
(44, 5, 3, '2024-01-25 21:26:15'),
(45, 5, 4, '2024-01-25 21:26:16'),
(46, 5, 5, '2024-01-25 21:26:17'),
(47, 5, 9, '2024-01-25 21:47:33'),
(48, 5, 18, '2024-01-25 21:47:34');

-- --------------------------------------------------------

--
-- テーブルの構造 `maker_table`
--

CREATE TABLE `maker_table` (
  `id` int(11) NOT NULL,
  `maker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `maker_table`
--

INSERT INTO `maker_table` (`id`, `maker`) VALUES
(1, 'コールマン'),
(2, 'フィールドア'),
(3, 'SOTO'),
(4, 'ロゴス'),
(5, 'DOD'),
(6, 'ワークマン'),
(7, 'クイックキャンプ'),
(8, 'SPICEofLife'),
(9, 'ランドポート');

-- --------------------------------------------------------

--
-- テーブルの構造 `my_table`
--

CREATE TABLE `my_table` (
  `id` int(11) NOT NULL,
  `item` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `genre` varchar(128) NOT NULL,
  `maker` varchar(128) NOT NULL,
  `purchase_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `long_side` decimal(5,1) NOT NULL,
  `short_side` decimal(5,1) NOT NULL,
  `thickness` decimal(5,1) NOT NULL,
  `weight` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `my_table`
--

INSERT INTO `my_table` (`id`, `item`, `category`, `genre`, `maker`, `purchase_date`, `price`, `long_side`, `short_side`, `thickness`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'ポケットEZシェード', 'タープ・シェード', 'シェード', 'コールマン', '2022-10-01', 4800, 38.0, 6.0, 13.0, 1400, '2023-12-19 06:28:13', '2023-12-19 06:28:13'),
(2, 'ファイヤーディスク(TM)ソロ', 'グリル・焚火', '焚火台', 'コールマン', '2022-12-01', 5390, 32.0, 32.0, 10.0, 900, '2023-12-19 06:31:57', '2023-12-19 06:31:57'),
(3, 'ミニ焚火台テトラ', 'グリル・焚火', '焚火台', 'SOTO', '2022-11-01', 1320, 8.8, 8.0, 0.4, 122, '2023-12-19 06:34:06', '2023-12-19 06:34:06'),
(4, '耐熱アルミテーブル', '家具', 'テーブル', 'ワークマン', '2023-01-15', 980, 21.4, 12.1, 2.7, 390, '2023-12-19 06:37:10', '2023-12-19 06:37:10'),
(5, 'ポータブルチェア　ポリコットン　ノーマル', '家具', 'チェア', 'フィールドア', '2023-02-01', 4200, 38.0, 11.0, 13.0, 1000, '2023-12-19 06:40:21', '2023-12-19 06:40:21'),
(6, 'ファミリー2in1　C10', '寝具', '寝袋', 'コールマン', '2023-03-01', 8500, 42.0, 30.0, 30.0, 3000, '2023-12-19 06:43:03', '2023-12-19 06:43:03'),
(7, 'クロスポールドーム240', 'テント', 'テント', 'フィールドア', '2022-09-01', 6710, 54.0, 20.0, 20.0, 3200, '2023-12-19 06:45:24', '2023-12-19 06:45:24'),
(8, 'スクエアタープ', 'タープ・シェード', 'タープ', 'フィールドア', '2022-10-01', 3740, 25.0, 14.0, 14.0, 1300, '2023-12-19 06:48:28', '2023-12-19 06:48:28'),
(9, 'アルミテントポール150　2セット入り', '小物類', 'ポール', 'フィールドア', '2022-10-01', 3300, 37.0, 11.0, 11.0, 500, '2023-12-19 06:51:00', '2023-12-19 06:51:00'),
(10, 'ジョイントバックパック　スタンダード', 'バッグ類', 'リュック', 'ワークマン', '2022-08-01', 3900, 56.0, 32.0, 9.0, 600, '2023-12-19 20:40:23', '2023-12-19 20:40:23'),
(11, 'アルミペグハンマー', '小物類', 'ハンマー', 'クイックキャンプ', '2022-11-01', 2000, 31.0, 11.0, 3.0, 350, '2023-12-19 20:43:43', '2023-12-19 20:43:43'),
(12, '鋳造ペグ　8本セット', '小物類', 'ペグ', 'クイックキャンプ', '2022-11-01', 1800, 20.0, 20.0, 10.0, 440, '2023-12-19 20:45:45', '2023-12-19 20:45:45'),
(13, '2WAY エアクッション 5cm厚', '小物類', 'クッション', 'クイックキャンプ', '2022-12-01', 2000, 30.0, 5.0, 5.0, 300, '2023-12-19 20:48:05', '2023-12-19 20:48:05'),
(14, '7075ポケットスツール', '家具', 'スツール', 'ロゴス', '2023-02-01', 2980, 26.0, 12.0, 5.5, 340, '2023-12-19 20:50:57', '2023-12-19 20:50:57'),
(15, '氷点下パック・クールキーパー', '保冷グッズ', 'クーラーボックス', 'ロゴス', '2022-09-01', 3700, 23.5, 17.5, 17.0, 500, '2023-12-19 20:54:28', '2023-12-19 20:54:28'),
(16, '倍速凍結・氷点下パックM', '保冷グッズ', '保冷剤', 'ロゴス', '2022-09-01', 1280, 19.6, 13.8, 2.6, 600, '2023-12-19 20:57:46', '2023-12-19 20:57:46'),
(17, 'スマイルLEDランタン', '電化製品', 'ランタン', 'SPICEofLife', '2022-08-01', 1320, 17.0, 11.0, 11.0, 150, '2023-12-19 21:00:34', '2023-12-19 21:00:34'),
(18, 'CARRY THE SUN　Small', '電化製品', 'ランタン', 'ランドポート', '2022-09-01', 3190, 17.0, 8.8, 1.2, 57, '2023-12-19 21:11:39', '2023-12-19 21:11:39'),
(19, 'ソフトくらこ（１０）', '保冷グッズ', 'クーラーボックス', 'DOD', '2022-11-01', 5040, 41.0, 29.0, 13.0, 700, '2023-12-19 21:14:21', '2023-12-19 21:14:21'),
(20, 'カマボコリュック', 'バッグ類', 'リュック', 'DOD', '2022-12-01', 7700, 49.0, 30.0, 16.0, 700, '2023-12-19 21:17:01', '2023-12-19 21:17:01'),
(21, 'キングトング', '小物類', 'トング', 'テンマクデザイン', '2023-08-01', 1408, 39.5, 3.7, 2.2, 157, '2023-12-20 21:52:37', '2023-12-20 21:52:37'),
(22, 'ポケットストーブ', 'グリル・焚火', 'ポケットストーブ', 'ダイソー', '2022-11-01', 330, 10.0, 7.2, 2.2, 102, '2023-12-21 22:57:08', '2023-12-21 22:57:08'),
(23, '焚火用グローブ　ロング', 'グリル・焚火', 'グローブ', '不明', '2023-12-22', 2000, 35.0, 14.0, 2.0, 337, '2023-12-22 00:01:03', '2023-12-22 00:01:03'),
(24, '軍手', '小物類', '軍手', 'ワークマン', '2023-12-23', 2000, 25.0, 20.0, 1.1, 200, '2023-12-23 13:18:14', '2023-12-23 13:18:14'),
(26, '焚火シート', 'グリル・焚火', '小物', 'フューチャーフォックス', '2023-12-23', 3500, 80.0, 80.0, 1.5, 400, '2024-01-04 18:37:03', '2024-01-04 18:37:03');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ami', 'ami01', 0, '2024-01-22 21:18:05', '2024-01-22 21:18:05', NULL),
(2, 'あかり', 'akari02', 1, '2024-01-22 21:19:14', '2024-01-22 21:19:14', NULL),
(3, 'いちろう', 'ichirou03', 1, '2024-01-22 21:20:48', '2024-01-22 21:20:48', NULL),
(4, 'うみ', 'umi04', 1, '2024-01-22 21:21:24', '2024-01-22 21:21:24', NULL),
(5, 'えいた', 'eita05', 1, '2024-01-22 21:21:55', '2024-01-22 21:21:55', NULL),
(6, 'おみ', 'omi06', 1, '2024-01-23 06:27:23', '2024-01-23 06:27:23', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `use_table`
--

CREATE TABLE `use_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `use_table`
--

INSERT INTO `use_table` (`id`, `user_id`, `item_id`, `created_at`) VALUES
(1, 5, 2, '2024-01-25 21:26:28'),
(2, 5, 5, '2024-01-25 21:48:05');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `genre_table`
--
ALTER TABLE `genre_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `maker_table`
--
ALTER TABLE `maker_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `my_table`
--
ALTER TABLE `my_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `use_table`
--
ALTER TABLE `use_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `genre_table`
--
ALTER TABLE `genre_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- テーブルの AUTO_INCREMENT `maker_table`
--
ALTER TABLE `maker_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `my_table`
--
ALTER TABLE `my_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `use_table`
--
ALTER TABLE `use_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
