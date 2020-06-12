-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 伺服器版本:                        5.7.24-log - MySQL Community Server (GPL)
-- 伺服器操作系統:                      Win64
-- HeidiSQL 版本:                  10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 傾印 library 的資料庫結構
CREATE DATABASE IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `library`;

-- 傾印  表格 library.books 結構
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barcode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '條碼',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '書名',
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片',
  `author` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '作者',
  `translator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '譯者',
  `book_type_id` int(10) unsigned NOT NULL COMMENT '圖書類型id',
  `publishing_id` int(10) unsigned NOT NULL COMMENT '出版社id',
  `price` int(10) unsigned NOT NULL COMMENT '價格',
  `page` int(10) unsigned NOT NULL COMMENT '裝訂／頁數',
  `book_case_id` int(10) unsigned NOT NULL COMMENT '書架id',
  `storage` int(10) unsigned NOT NULL COMMENT '數量',
  `publication_day` date NOT NULL COMMENT '出版日',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.books 的資料：~3 rows (約數)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `barcode`, `name`, `image`, `author`, `translator`, `book_type_id`, `publishing_id`, `price`, `page`, `book_case_id`, `storage`, `publication_day`, `created_at`, `updated_at`) VALUES
	(1, '9789864762606', 'PHP 學習手冊', '1547312005.jpg', 'David Sklar', '張靜雯', 1, 6, 580, 416, 1, 3, '2016-12-20', '2020-06-12 14:25:09', '2020-06-12 14:25:09'),
	(2, '9789864340293', 'Java SE 8懶人包', '1547312147.jpg', 'Cay S. Horstmann', '江良志', 1, 4, 360, 256, 2, 5, '2015-07-31', '2020-06-12 14:25:09', '2020-06-12 14:25:09'),
	(3, '9789865002848', 'NET Core開發實作', '1547312363.jpg', '張劍橋', '', 1, 1, 590, 363, 5, 2, '2018-11-07', '2020-06-12 14:25:09', '2020-06-12 14:25:09');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- 傾印  表格 library.book_cases 結構
CREATE TABLE IF NOT EXISTS `book_cases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '書架名稱',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.book_cases 的資料：~11 rows (約數)
/*!40000 ALTER TABLE `book_cases` DISABLE KEYS */;
INSERT INTO `book_cases` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'PHP', '2020-06-12 14:24:50', '2020-06-12 14:24:50'),
	(2, 'Jave', '2020-06-12 14:24:50', '2020-06-12 14:24:50'),
	(3, 'MySql', '2020-06-12 14:24:50', '2020-06-12 14:24:50'),
	(4, 'Linux', '2020-06-12 14:24:50', '2020-06-12 14:24:50'),
	(5, 'ASP.NET', '2020-06-12 14:24:50', '2020-06-12 14:24:50'),
	(6, 'Node.js', '2020-06-12 14:24:50', '2020-06-12 14:24:50'),
	(7, 'SQL Server', '2020-06-12 14:24:50', '2020-06-12 14:24:50'),
	(8, 'CentOS', '2020-06-12 14:24:50', '2020-06-12 14:24:50'),
	(9, 'C#', '2020-06-12 14:24:50', '2020-06-12 14:24:50'),
	(10, 'Vue', '2020-06-12 14:24:50', '2020-06-12 14:24:51'),
	(11, 'JavaScript', '2020-06-12 14:24:50', '2020-06-12 14:24:51');
/*!40000 ALTER TABLE `book_cases` ENABLE KEYS */;

-- 傾印  表格 library.book_types 結構
CREATE TABLE IF NOT EXISTS `book_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖書類型',
  `borrow_day` int(11) NOT NULL COMMENT '可借天數',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.book_types 的資料：~3 rows (約數)
/*!40000 ALTER TABLE `book_types` DISABLE KEYS */;
INSERT INTO `book_types` (`id`, `name`, `borrow_day`, `created_at`, `updated_at`) VALUES
	(1, '程式設計', 7, '2020-06-12 14:24:43', '2020-06-12 14:24:43'),
	(2, '作業系統', 6, '2020-06-12 14:24:43', '2020-06-12 14:24:43'),
	(3, '資料庫設計', 8, '2020-06-12 14:24:43', '2020-06-12 14:24:43');
/*!40000 ALTER TABLE `book_types` ENABLE KEYS */;

-- 傾印  表格 library.borrows 結構
CREATE TABLE IF NOT EXISTS `borrows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reader_id` int(10) unsigned NOT NULL,
  `book_id` int(10) unsigned NOT NULL,
  `borrow` date NOT NULL,
  `return` date NOT NULL,
  `real_return` datetime DEFAULT NULL,
  `returned` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '啟用，1=還書，2=未還書',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.borrows 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `borrows` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrows` ENABLE KEYS */;

-- 傾印  表格 library.manager 結構
CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者帳號',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者密碼',
  `gender` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '性別，1=男，2=女',
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手機',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '啟用，1=啟用，2=未啟用',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '記錄登入狀態',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.manager 的資料：~1 rows (約數)
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` (`id`, `username`, `password`, `gender`, `mobile`, `email`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$10$6DV1pXZU5R8ZK21focjsPO0M9ul.l1dQ1915pOrSu1fkNJ4DeWkIS', '1', '1234567890', 'admin123@yahoo.com.tw', '1', 'PcOtBfNkqy5OwcuvCF3ADwbdIMv4MSCUp4ENYiiC3JdeDRQVQiAC0Tih06vV', '2020-06-12 14:24:31', NULL);
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;

-- 傾印  表格 library.migrations 結構
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.migrations 的資料：~8 rows (約數)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2018_12_28_205441_create_manager_table', 1),
	(2, '2018_12_29_024826_entrust_setup_tables', 1),
	(3, '2018_12_30_222848_create_bookcase_table', 1),
	(4, '2018_12_31_181157_create_book_types_table', 1),
	(5, '2018_12_31_182327_create_publishings_table', 1),
	(6, '2018_12_31_202434_create_books_table', 1),
	(7, '2019_01_01_011041_create_readers_table', 1),
	(8, '2019_01_01_041850_create_borrows_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- 傾印  表格 library.permissions 結構
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` tinyint(4) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '權限',
  `slug` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '路由',
  `url` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '路徑',
  `menu` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '目錄，1:是，2不是',
  `display_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '權限中文名',
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.permissions 的資料：~8 rows (約數)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `pid`, `name`, `slug`, `url`, `menu`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 0, 'permission', 'permission', NULL, '1', '權限管理', NULL, '2019-01-12 21:25:33', '2019-01-12 21:25:33'),
	(2, 1, 'permission-list', 'permission.index', NULL, '1', '權限管理', NULL, '2019-01-12 21:26:16', '2019-01-12 21:26:16'),
	(3, 2, 'permission-create', 'permission-create', NULL, '2', '權限新增按鈕', NULL, '2019-01-12 21:27:32', '2019-01-12 21:27:32'),
	(4, 2, 'permission-edit', 'permission-edit', NULL, '2', '權限編輯按鈕', NULL, '2019-01-12 21:28:21', '2019-01-12 21:29:32'),
	(5, 2, 'permission-delete', 'permission-delete', NULL, '2', '權限刪除按鈕', NULL, '2019-01-12 21:30:07', '2019-01-12 21:30:07'),
	(6, 1, 'role-list', 'role.index', NULL, '1', '角色管理', NULL, '2019-01-12 21:31:03', '2019-01-12 21:31:03'),
	(7, 6, 'role-create', 'role-create', NULL, '2', '角色新增按鈕', NULL, '2019-01-12 21:31:39', '2019-01-12 21:31:39'),
	(8, 6, 'role-edit', 'role-edit', NULL, '2', '角色編輯按鈕', NULL, '2019-01-12 21:32:11', '2019-01-12 21:32:11'),
	(9, 6, 'role-delete', 'role-delete', NULL, '2', '角色刪除按鈕', NULL, '2019-01-12 21:33:05', '2019-01-12 21:34:04'),
	(10, 1, 'manager-list', 'manager.index', NULL, '1', '帳號管理', NULL, '2019-01-12 21:36:21', '2019-01-12 21:36:21'),
	(11, 10, 'manager-create', 'manager-create', NULL, '2', '帳號新增按鈕', NULL, '2019-01-12 21:37:22', '2019-01-12 21:37:22'),
	(12, 10, 'manager-edit', 'manager-edit', NULL, '2', '帳號編輯按鈕', NULL, '2019-01-12 21:38:07', '2019-01-12 21:38:07'),
	(13, 10, 'manager-delete', 'manager-delete', NULL, '2', '帳號刪除按鈕', NULL, '2019-01-12 21:38:47', '2019-01-12 21:38:47'),
	(14, 0, 'basic', 'basic', NULL, '1', '基本設定', NULL, '2019-01-12 21:39:56', '2019-01-12 21:39:56'),
	(15, 14, 'bookcase-list', 'bookcase.index', NULL, '1', '書架設定', NULL, '2019-01-12 21:41:26', '2019-01-12 21:41:26'),
	(16, 15, 'bookcase-create', 'bookcase-create', NULL, '2', '書架新增按鈕', NULL, '2019-01-12 21:43:01', '2019-01-12 21:43:01'),
	(17, 15, 'bookcase-edit', 'bookcase-edit', NULL, '2', '書架編輯按鈕', NULL, '2019-01-12 21:43:55', '2019-01-12 21:43:55'),
	(18, 15, 'bookcase-delete', 'bookcase-delete', NULL, '2', '書架刪除按鈕', NULL, '2019-01-12 21:44:31', '2019-01-12 21:44:46'),
	(19, 14, 'booktype-list', 'booktype.index', NULL, '1', '圖書類型設定', NULL, '2019-01-12 21:45:28', '2019-01-12 21:45:28'),
	(20, 19, 'booktype-create', 'booktype-create', NULL, '2', '圖書類型新增按鈕', NULL, '2019-01-12 21:46:28', '2019-01-12 21:46:35'),
	(21, 19, 'booktype-edit', 'booktype-edit', NULL, '2', '圖書類型編輯按鈕', NULL, '2019-01-12 21:47:39', '2019-01-12 21:47:39'),
	(22, 19, 'booktype-delete', 'booktype-delete', NULL, '2', '圖書類型刪除按鈕', NULL, '2019-01-12 21:48:24', '2019-01-12 21:48:24'),
	(23, 14, 'publishing-list', 'publishing.index', NULL, '1', '出版社設定', NULL, '2019-01-12 21:49:03', '2019-01-12 21:49:03'),
	(24, 23, 'publishing-create', 'publishing-create', NULL, '2', '出版社新增按鈕', NULL, '2019-01-12 21:50:01', '2019-01-12 21:50:07'),
	(25, 23, 'publishing-edit', 'publishing-edit', NULL, '2', '出版社編輯按鈕', NULL, '2019-01-12 21:51:52', '2019-01-12 21:51:52'),
	(26, 23, 'publishing-delete', 'publishing-delete', NULL, '2', '出版社刪除按鈕', NULL, '2019-01-12 21:52:35', '2019-01-12 21:52:35'),
	(27, 0, 'reader', 'reader', NULL, '1', '讀者管理', NULL, '2019-01-12 21:53:11', '2019-01-12 21:53:11'),
	(28, 27, 'reader-list', 'reader.index', NULL, '1', '讀者管理', NULL, '2019-01-12 21:53:41', '2019-01-12 21:53:41'),
	(29, 28, 'reader-create', 'reader-create', NULL, '2', '讀者新增按鈕', NULL, '2019-01-12 21:54:22', '2019-01-12 21:54:22'),
	(30, 28, 'reader-edit', 'reader-edit', NULL, '2', '讀者編輯按鈕', NULL, '2019-01-12 21:54:55', '2019-01-12 21:54:55'),
	(31, 28, 'reader-delete', 'reader-delete', NULL, '2', '讀者刪除按鈕', NULL, '2019-01-12 21:55:44', '2019-01-12 21:56:34'),
	(32, 0, 'book', 'book', NULL, '1', '圖書檔案管理', NULL, '2019-01-12 21:56:11', '2019-01-12 21:56:11'),
	(33, 32, 'book-list', 'book-list', NULL, '1', '圖書檔案管理', NULL, '2019-01-12 21:57:07', '2019-01-12 21:57:07'),
	(34, 33, 'book-create', 'book-create', NULL, '2', '圖書新增按鈕', NULL, '2019-01-12 21:58:04', '2019-01-12 21:58:04'),
	(35, 33, 'book-edit', 'book-edit', NULL, '2', '圖書編輯按鈕', NULL, '2019-01-12 21:58:44', '2019-01-12 21:58:44'),
	(36, 33, 'book-delete', 'book-delete', NULL, '2', '圖書刪除按鈕', NULL, '2019-01-12 21:59:19', '2019-01-12 21:59:19'),
	(37, 0, 'borrow', 'borrow', NULL, '1', '圖書借還管理', NULL, '2019-01-12 22:00:48', '2019-01-12 22:00:48'),
	(38, 37, 'borrow-list', 'borrow.index', NULL, '1', '圖書借閱', NULL, '2019-01-12 22:01:50', '2019-01-12 22:01:50'),
	(39, 38, 'borrow-borrow', 'borrow-borrow', NULL, '2', '圖書借閱按鈕', NULL, '2019-01-12 22:05:09', '2019-01-12 22:10:21'),
	(40, 37, 'borrow-bookReturn', 'borrow.bookReturn', NULL, '1', '圖書歸還', NULL, '2019-01-12 22:07:08', '2019-01-12 22:09:31'),
	(41, 40, 'borrow-return', 'borrow-bookReturn', NULL, '2', '圖書歸還按鈕', NULL, '2019-01-12 22:09:58', '2019-01-12 22:10:36');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- 傾印  表格 library.permission_role 結構
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.permission_role 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- 傾印  表格 library.publishings 結構
CREATE TABLE IF NOT EXISTS `publishings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '出版社名稱',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.publishings 的資料：~12 rows (約數)
/*!40000 ALTER TABLE `publishings` DISABLE KEYS */;
INSERT INTO `publishings` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, '旗標', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(2, '上奇資訊', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(3, '歐萊禮', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(4, '博碩', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(5, '佳魁資訊', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(6, '碁峰', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(7, '經瑋', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(8, '松崗', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(9, '易習圖書', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(10, '新文京', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(11, '深石', '2020-06-12 14:24:56', '2020-06-12 14:24:56'),
	(12, '全華圖書', '2020-06-12 14:24:56', '2020-06-12 14:24:56');
/*!40000 ALTER TABLE `publishings` ENABLE KEYS */;

-- 傾印  表格 library.readers 結構
CREATE TABLE IF NOT EXISTS `readers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `gender` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '性別，1=男，2=女',
  `barcode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '條碼',
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電話',
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手機',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email',
  `borrow_book` int(11) NOT NULL COMMENT '可借圖書幾本',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '啟用，1=啟用，2=未啟用',
  `memo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '備註',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.readers 的資料：~21 rows (約數)
/*!40000 ALTER TABLE `readers` DISABLE KEYS */;
INSERT INTO `readers` (`id`, `name`, `gender`, `barcode`, `tel`, `mobile`, `email`, `borrow_book`, `status`, `memo`, `created_at`, `updated_at`) VALUES
	(1, 'kemmer.adaline', '2', '5955', '0426433958', '0973745354', 'icarroll@hotmail.com', 6, '1', NULL, '2020-06-12 14:25:02', NULL),
	(2, 'mills.eloisa', '2', '5063', '0425215798', '0970374827', 'stone.bins@schneider.com', 2, '1', NULL, '2020-06-12 14:25:02', NULL),
	(3, 'margaret09', '2', '4745', '0445095987', '0960934621', 'wuckert.wallace@hotmail.com', 6, '1', NULL, '2020-06-12 14:25:02', NULL),
	(4, 'minerva88', '2', '5171', '0474089855', '0927669702', 'blanda.bert@ferry.org', 5, '1', NULL, '2020-06-12 14:25:02', NULL),
	(5, 'gwolff', '2', '1665', '0496412289', '0930994348', 'shaniya65@graham.biz', 4, '1', NULL, '2020-06-12 14:25:02', NULL),
	(6, 'abdullah59', '1', '6682', '0466042074', '0928059336', 'jeramy.huel@nicolas.com', 4, '1', NULL, '2020-06-12 14:25:02', NULL),
	(7, 'feil.jerry', '2', '6235', '0452281962', '0929586719', 'lebsack.meggie@watsica.com', 2, '1', NULL, '2020-06-12 14:25:02', NULL),
	(8, 'oconner.lonzo', '2', '2304', '0428735627', '0984296412', 'iarmstrong@gmail.com', 2, '1', NULL, '2020-06-12 14:25:02', NULL),
	(9, 'fgreenfelder', '1', '6060', '0444355548', '0916663049', 'wprosacco@yahoo.com', 6, '1', NULL, '2020-06-12 14:25:02', NULL),
	(10, 'eleanora.zieme', '1', '8778', '0438780187', '0970683263', 'german12@lebsack.com', 3, '1', NULL, '2020-06-12 14:25:02', NULL),
	(11, 'tjacobs', '2', '1871', '0466230895', '0972116235', 'pacocha.kale@hotmail.com', 6, '1', NULL, '2020-06-12 14:25:02', NULL),
	(12, 'ludwig22', '2', '1024', '0465348579', '0917549385', 'travon71@nitzsche.com', 4, '1', NULL, '2020-06-12 14:25:02', NULL),
	(13, 'trinity.greenholt', '2', '7620', '0467119567', '0913857132', 'vbotsford@grady.com', 6, '1', NULL, '2020-06-12 14:25:02', NULL),
	(14, 'mckenna52', '1', '8099', '0463132178', '0984110136', 'kfeest@yahoo.com', 4, '1', NULL, '2020-06-12 14:25:02', NULL),
	(15, 'harmon.predovic', '2', '8594', '0471677284', '0939960261', 'hspencer@wyman.org', 4, '1', NULL, '2020-06-12 14:25:02', NULL),
	(16, 'dharvey', '2', '2359', '0456916050', '0927484507', 'lisa16@hotmail.com', 3, '1', NULL, '2020-06-12 14:25:02', NULL),
	(17, 'ruben86', '1', '8356', '0422188722', '0995551820', 'tyra.marquardt@effertz.com', 3, '1', NULL, '2020-06-12 14:25:02', NULL),
	(18, 'hbailey', '2', '3835', '0472752514', '0993967982', 'ybashirian@gmail.com', 2, '1', NULL, '2020-06-12 14:25:02', NULL),
	(19, 'waelchi.nicola', '2', '6608', '0480674130', '0952280290', 'noel.mann@bogan.info', 2, '1', NULL, '2020-06-12 14:25:02', NULL),
	(20, 'lwillms', '1', '5640', '0475162419', '0970972382', 'bogisich.emmett@yahoo.com', 4, '1', NULL, '2020-06-12 14:25:02', NULL),
	(21, 'verna.weissnat', '2', '9672', '0466817309', '0970966636', 'ykautzer@hotmail.com', 6, '1', NULL, '2020-06-12 14:25:02', NULL);
/*!40000 ALTER TABLE `readers` ENABLE KEYS */;

-- 傾印  表格 library.roles 結構
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.roles 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '管理者', NULL, '2019-01-12 22:20:51', '2019-01-12 22:20:51');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- 傾印  表格 library.role_manager 結構
CREATE TABLE IF NOT EXISTS `role_manager` (
  `manager_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`manager_id`,`role_id`),
  KEY `role_manager_role_id_foreign` (`role_id`),
  CONSTRAINT `role_manager_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_manager_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  library.role_manager 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `role_manager` DISABLE KEYS */;
INSERT INTO `role_manager` (`manager_id`, `role_id`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `role_manager` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
