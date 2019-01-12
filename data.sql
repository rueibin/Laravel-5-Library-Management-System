-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 服務器版本:                        5.7.21 - MySQL Community Server (GPL)
-- 服務器操作系統:                      Win64
-- HeidiSQL 版本:                  9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;



-- 導出  表 library.permissions 結構
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

-- 正在導出表  library.permissions 的資料：~41 rows (大約)
DELETE FROM `permissions`;
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

-- 導出  表 library.permission_role 結構
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在導出表  library.permission_role 的資料：~41 rows (大約)
DELETE FROM `permission_role`;
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


-- 導出  表 library.roles 結構
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

-- 正在導出表  library.roles 的資料：~1 rows (大約)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '管理者', NULL, '2019-01-12 22:20:51', '2019-01-12 22:20:51');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- 導出  表 library.role_manager 結構
CREATE TABLE IF NOT EXISTS `role_manager` (
  `manager_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`manager_id`,`role_id`),
  KEY `role_manager_role_id_foreign` (`role_id`),
  CONSTRAINT `role_manager_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_manager_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在導出表  library.role_manager 的資料：~1 rows (大約)
DELETE FROM `role_manager`;
/*!40000 ALTER TABLE `role_manager` DISABLE KEYS */;
INSERT INTO `role_manager` (`manager_id`, `role_id`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `role_manager` ENABLE KEYS */;
