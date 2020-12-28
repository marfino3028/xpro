-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2020 pada 04.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInvoices\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInvoices\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendInvoices\\\":8:{s:13:\\\"\\u0000*\\u0000invoice_id\\\";i:37;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: fopen(D:\\www\\xpro\\xpro_core\\storage\\fonts//roboto-100_4f648b1e497c5aed1e7e0e5a635dc480.ufm): failed to open stream: No such file or directory in D:\\www\\xpro\\xpro_core\\vendor\\phenx\\php-font-lib\\src\\FontLib\\AdobeFontMetrics.php:45\nStack trace:\n#0 [internal function]: Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'fopen(D:\\\\www\\\\xp...\', \'D:\\\\www\\\\xpro\\\\xpr...\', 45, Array)\n#1 D:\\www\\xpro\\xpro_core\\vendor\\phenx\\php-font-lib\\src\\FontLib\\AdobeFontMetrics.php(45): fopen(\'D:\\\\www\\\\xpro\\\\xpr...\', \'w+\')\n#2 D:\\www\\xpro\\xpro_core\\vendor\\phenx\\php-font-lib\\src\\FontLib\\TrueType\\File.php(361): FontLib\\AdobeFontMetrics->write(\'D:\\\\www\\\\xpro\\\\xpr...\', NULL)\n#3 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\FontMetrics.php(246): FontLib\\TrueType\\File->saveAdobeFontMetrics(\'D:\\\\www\\\\xpro\\\\xpr...\')\n#4 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Css\\Stylesheet.php(1558): Dompdf\\FontMetrics->registerFont(Array, \'https://fonts.g...\', NULL)\n#5 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Css\\Stylesheet.php(1399): Dompdf\\Css\\Stylesheet->_parse_font_face(\'font-family: \'R...\')\n#6 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Css\\Stylesheet.php(416): Dompdf\\Css\\Stylesheet->_parse_css(\'@font-face {\\n  ...\')\n#7 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Dompdf.php(626): Dompdf\\Css\\Stylesheet->load_css_file(\'https://fonts.g...\', 3)\n#8 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Dompdf.php(738): Dompdf\\Dompdf->processHtml()\n#9 D:\\www\\xpro\\xpro_core\\vendor\\barryvdh\\laravel-dompdf\\src\\PDF.php(208): Dompdf\\Dompdf->render()\n#10 D:\\www\\xpro\\xpro_core\\vendor\\barryvdh\\laravel-dompdf\\src\\PDF.php(155): Barryvdh\\DomPDF\\PDF->render()\n#11 D:\\www\\xpro\\xpro_core\\app\\Jobs\\SendInvoices.php(59): Barryvdh\\DomPDF\\PDF->output()\n#12 [internal function]: App\\Jobs\\SendInvoices->handle()\n#13 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(32): call_user_func_array(Array, Array)\n#14 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#15 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#18 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendInvoices))\n#19 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendInvoices))\n#20 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendInvoices), false)\n#22 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#23 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(337): Illuminate\\Queue\\Jobs\\Job->fire()\n#24 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(283): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#25 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#26 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#28 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#29 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(32): call_user_func_array(Array, Array)\n#30 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#32 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#33 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(183): Illuminate\\Container\\Container->call(Array)\n#34 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Command\\Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#35 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Application.php(1009): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 D:\\www\\xpro\\xpro_core\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 {main}', '2020-11-12 16:04:01'),
(2, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInvoices\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInvoices\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendInvoices\\\":8:{s:13:\\\"\\u0000*\\u0000invoice_id\\\";i:37;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\SendInvoices has been attempted too many times or run too long. The job may have previously timed out. in D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php:601\nStack trace:\n#0 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(415): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\DatabaseJob))\n#1 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(327): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 3)\n#2 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(283): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#3 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#6 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(32): call_user_func_array(Array, Array)\n#8 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#9 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(183): Illuminate\\Container\\Container->call(Array)\n#12 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Command\\Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Application.php(1009): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 D:\\www\\xpro\\xpro_core\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}', '2020-11-12 16:04:19'),
(3, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInvoices\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInvoices\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendInvoices\\\":8:{s:13:\\\"\\u0000*\\u0000invoice_id\\\";i:37;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: fopen(D:\\www\\xpro\\xpro_core\\storage\\fonts//roboto-100_4f648b1e497c5aed1e7e0e5a635dc480.ufm): failed to open stream: No such file or directory in D:\\www\\xpro\\xpro_core\\vendor\\phenx\\php-font-lib\\src\\FontLib\\AdobeFontMetrics.php:45\nStack trace:\n#0 [internal function]: Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'fopen(D:\\\\www\\\\xp...\', \'D:\\\\www\\\\xpro\\\\xpr...\', 45, Array)\n#1 D:\\www\\xpro\\xpro_core\\vendor\\phenx\\php-font-lib\\src\\FontLib\\AdobeFontMetrics.php(45): fopen(\'D:\\\\www\\\\xpro\\\\xpr...\', \'w+\')\n#2 D:\\www\\xpro\\xpro_core\\vendor\\phenx\\php-font-lib\\src\\FontLib\\TrueType\\File.php(361): FontLib\\AdobeFontMetrics->write(\'D:\\\\www\\\\xpro\\\\xpr...\', NULL)\n#3 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\FontMetrics.php(246): FontLib\\TrueType\\File->saveAdobeFontMetrics(\'D:\\\\www\\\\xpro\\\\xpr...\')\n#4 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Css\\Stylesheet.php(1558): Dompdf\\FontMetrics->registerFont(Array, \'https://fonts.g...\', NULL)\n#5 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Css\\Stylesheet.php(1399): Dompdf\\Css\\Stylesheet->_parse_font_face(\'font-family: \'R...\')\n#6 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Css\\Stylesheet.php(416): Dompdf\\Css\\Stylesheet->_parse_css(\'@font-face {\\n  ...\')\n#7 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Dompdf.php(626): Dompdf\\Css\\Stylesheet->load_css_file(\'https://fonts.g...\', 3)\n#8 D:\\www\\xpro\\xpro_core\\vendor\\dompdf\\dompdf\\src\\Dompdf.php(738): Dompdf\\Dompdf->processHtml()\n#9 D:\\www\\xpro\\xpro_core\\vendor\\barryvdh\\laravel-dompdf\\src\\PDF.php(208): Dompdf\\Dompdf->render()\n#10 D:\\www\\xpro\\xpro_core\\vendor\\barryvdh\\laravel-dompdf\\src\\PDF.php(155): Barryvdh\\DomPDF\\PDF->render()\n#11 D:\\www\\xpro\\xpro_core\\app\\Jobs\\SendInvoices.php(59): Barryvdh\\DomPDF\\PDF->output()\n#12 [internal function]: App\\Jobs\\SendInvoices->handle()\n#13 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(32): call_user_func_array(Array, Array)\n#14 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#15 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#18 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendInvoices))\n#19 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendInvoices))\n#20 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendInvoices), false)\n#22 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#23 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(337): Illuminate\\Queue\\Jobs\\Job->fire()\n#24 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(283): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#25 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#26 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#28 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#29 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(32): call_user_func_array(Array, Array)\n#30 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#32 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#33 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(183): Illuminate\\Container\\Container->call(Array)\n#34 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Command\\Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#35 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Application.php(1009): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\www\\xpro\\xpro_core\\vendor\\symfony\\console\\Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 D:\\www\\xpro\\xpro_core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 D:\\www\\xpro\\xpro_core\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 {main}', '2020-11-12 16:07:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_09_11_042024_create_new_invoice', 1),
(2, '2020_09_17_234738_create_invoice_setting_table', 2),
(3, '2020_09_18_064607_create_smtp_setting_table', 3),
(5, '2020_09_21_094851_create_email_template_table', 4),
(6, '2020_09_24_022708_create_company_setting_table', 5),
(7, '2016_06_01_000001_create_oauth_auth_codes_table', 6),
(8, '2016_06_01_000002_create_oauth_access_tokens_table', 6),
(9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 6),
(10, '2016_06_01_000004_create_oauth_clients_table', 6),
(11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 6),
(12, '2020_10_01_075915_create_invoices_items_table', 7),
(13, '2020_10_02_074939_create_estimates_items_table', 8),
(14, '2020_10_20_142014_create_tag_tables', 9),
(15, '2020_10_19_050717_create_project_table', 10),
(16, '2020_09_11_033713_add_invoice', 11),
(17, '2020_09_11_054326_add_subtotal', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0090aad3b56dad549b6b25305e38551b6c0af3c60a5f841d16acea808f1b360ace99f862840d5938', 3, 1, 'user', '[]', 0, '2020-11-08 08:29:23', '2020-11-08 08:29:23', '2021-11-08 19:29:23'),
('0488030ed0830c888d5b9db725718a66dda601365fa6829cccdb1163a8ccdb6223fcf04e5b368182', 3, 1, 'user', '[]', 0, '2020-10-26 15:37:16', '2020-10-26 15:37:16', '2021-10-27 02:37:16'),
('0a3782369a620842781b5b75b65a7c895d7de59d24c5f42835a0fa2b20bf58ca6882a2337f365d39', 3, 1, 'user', '[]', 0, '2020-11-16 04:04:35', '2020-11-16 04:04:35', '2021-11-16 15:04:35'),
('0ea73c29c14df33ac6c90ee03a485002c61b83ba6efd6a02020182771d786d9e31cabb9c45a9863f', 3, 1, 'user', '[]', 0, '2020-12-06 05:51:27', '2020-12-06 05:51:27', '2021-12-06 16:51:27'),
('16c4d57badaf325a0f9a7e5ba77b4bc32acbd430e4e583f1ef1f8704e39308b10daec41cf185fa7a', 3, 1, 'user', '[]', 0, '2020-12-15 05:14:53', '2020-12-15 05:14:53', '2021-12-15 16:14:53'),
('1bb28c5e4162c3272e4352eb735d9c4940e3a497d53257eeb87fc2d931ce773143c137f06f7cad58', 3, 1, 'user', '[]', 0, '2020-10-07 00:17:41', '2020-10-07 00:17:41', '2021-10-07 11:17:41'),
('1d9b01046fbaa29e96067144f62c7e56f7c69d02f6728c630ec18de96d1fbadf81766db09464d275', 3, 1, 'user', '[]', 0, '2020-11-08 04:19:01', '2020-11-08 04:19:01', '2021-11-08 15:19:01'),
('2192063a45ea53094b7d235906ec1bf04fed72cf9a69f57887d0f7cffbb0cff0f5eaf877c7a5f65b', 20, 1, 'user', '[]', 0, '2020-11-19 23:52:45', '2020-11-19 23:52:45', '2021-11-20 10:52:45'),
('2211bea7ec94237f14961357f71f8f566d3b4cd58916062d6127246da24f4e48cc4943c8b44514f4', 3, 1, 'user', '[]', 0, '2020-12-04 07:14:09', '2020-12-04 07:14:09', '2021-12-04 18:14:09'),
('266f2c1e94064a9b94131ca95e7e010665e6a38adb5a6c13b5bdca378c2040daf2867211a318c490', 3, 1, 'user', '[]', 0, '2020-11-27 18:47:29', '2020-11-27 18:47:29', '2021-11-28 05:47:29'),
('42d6e2e1762e6d966cc968574f6ec9d61c5bb3ca61c62bd1bb4b86cffb5c941bd4ff87a3a34c2d67', 3, 1, 'user', '[]', 0, '2020-12-12 17:55:03', '2020-12-12 17:55:03', '2021-12-13 04:55:03'),
('458ba64d8009ea12242c73be23e6f2427b128d651c46605da205ac8ea6d779297f3bc91049b4dea2', 3, 1, 'user', '[]', 0, '2020-12-12 16:13:51', '2020-12-12 16:13:51', '2021-12-13 03:13:51'),
('467677e09e9996fec8f6fc96a7ca4dc925807304d1e589708bf29b4a5b325da1d0aa6a5676c497dd', 3, 1, 'user', '[]', 0, '2020-12-16 02:59:47', '2020-12-16 02:59:47', '2021-12-16 13:59:47'),
('5be8b1837c2102be53b70bc031e85dea3e8301f5466947d3b76562ab67b26bf32a38315d64ed568a', 3, 1, 'user', '[]', 0, '2020-12-16 15:13:22', '2020-12-16 15:13:22', '2021-12-17 02:13:22'),
('5c266d7d04a29b29fdf26f8a7d8fdf72e9f5461ccdad9a6f781196929904f8b17426efc77b305a68', 3, 1, 'user', '[]', 0, '2020-11-16 03:03:40', '2020-11-16 03:03:40', '2021-11-16 14:03:40'),
('5ca33e220b52cb36f4de9de020717274674e8763cf5cc32b0ab386d4932fc7fb7dd8b52f3ff1fff3', 3, 1, 'user', '[]', 0, '2020-11-16 12:50:31', '2020-11-16 12:50:31', '2021-11-16 23:50:31'),
('5e36ba83ac702ba8d00f4cfa05e812ae126845c9e17daffa5962c6ad7a5b9960e20a1e8d3e601a60', 3, 1, 'user', '[]', 0, '2020-11-11 11:23:42', '2020-11-11 11:23:42', '2021-11-11 22:23:42'),
('5e4b5218f7c12efc0d46e624da9523fb156c23afb70a9ff551ae5782e3f6171c61318283283fc1e7', 3, 1, 'user', '[]', 0, '2020-11-08 08:29:31', '2020-11-08 08:29:31', '2021-11-08 19:29:31'),
('5efccebf4ba4f533dc0f49640763a14b1b856e30b970e169e6b95699e7e7b987d5df9da2fadbf51a', 3, 1, 'user', '[]', 0, '2020-12-06 02:44:37', '2020-12-06 02:44:37', '2021-12-06 13:44:37'),
('5f6f7c2a1900d7b9154b4a9df636e055d2efc3dd96ff5ac1fc3678c666ccf320d5872b64cd792830', 3, 1, 'user', '[]', 0, '2020-12-16 15:08:53', '2020-12-16 15:08:53', '2021-12-17 02:08:53'),
('61ea86a83f8b39acbf3b2e6ec889b3c204402fb25d95baf67821b26f883f229caa6597b71dc83fc8', 3, 1, 'user', '[]', 0, '2020-12-04 07:01:35', '2020-12-04 07:01:35', '2021-12-04 18:01:35'),
('62f5fb72d3ddba22386ccd253ee59e210a10030865c8b9b226d05f7befd71e34f545d983b4314691', 3, 1, 'user', '[]', 0, '2020-11-27 23:49:43', '2020-11-27 23:49:43', '2021-11-28 10:49:43'),
('655b6fb35d1f074820be8c795ca5af74fcc8498ec704005815d727c006208a9737b62ae8edbb6400', 3, 1, 'user', '[]', 0, '2020-11-14 10:05:51', '2020-11-14 10:05:51', '2021-11-14 21:05:51'),
('6a96e4d47bb8ab248cc07a4efaa3d78f2bbe4f70a9ef7c115efa24c1ab01489329a5d94671fbd040', 3, 1, 'user', '[]', 0, '2020-12-12 17:55:15', '2020-12-12 17:55:15', '2021-12-13 04:55:15'),
('74918ecd13841e16fb89ce20425982dafeee4c6bca368f193ed0e5f8cc6755943513df2abf4ddd2b', 3, 1, 'user', '[]', 0, '2020-10-23 16:11:19', '2020-10-23 16:11:19', '2021-10-24 03:11:19'),
('7778f6b995c0e935b508625a9c78ab9f2e469b2f01bbad0f4ea2931cf72241e3537a8bf6b3e73a18', 3, 1, 'user', '[]', 0, '2020-12-12 07:31:39', '2020-12-12 07:31:39', '2021-12-12 18:31:39'),
('79d6215577e3c998869d3198991c9c09d237a5ea93ab524f969dd4923ee62401eef437f690e7ad72', 3, 1, 'user', '[]', 0, '2020-11-27 18:47:29', '2020-11-27 18:47:29', '2021-11-28 05:47:29'),
('7e405ddff2dbecc7eb380168a3aa56d289b44e7dbb48fbd7f1ec317cddab5d43147a1d0f9eb7c230', 3, 1, 'user', '[]', 0, '2020-12-15 04:17:29', '2020-12-15 04:17:29', '2021-12-15 15:17:29'),
('867b7825eb7e666d49e9f0f9fb21fec2841d30e07c3233ea1a6e3ab8397458b4fa288e6b57fa2916', 3, 1, 'user', '[]', 0, '2020-10-29 07:01:54', '2020-10-29 07:01:54', '2021-10-29 18:01:54'),
('867c34ca23d4ffb3c9204b02ee61a7eecd7a37d937f73ff50bc544e45b123a577389a09002918be8', 3, 1, 'user', '[]', 0, '2020-12-16 15:46:08', '2020-12-16 15:46:08', '2021-12-17 02:46:08'),
('88d9a6c42bf5a5213958a732128be9a31130e220e64b35f2d5ce6006fa8e33b0da42d2675dcbaf93', 3, 1, 'user', '[]', 0, '2020-11-14 06:55:54', '2020-11-14 06:55:54', '2021-11-14 17:55:54'),
('8bd986b0960dc253fcb3152e5957729414d2db11e0a56ddec78fdf44142eb33042df1dfdb6e19e6f', 3, 1, 'user', '[]', 0, '2020-10-17 09:57:18', '2020-10-17 09:57:18', '2021-10-17 20:57:18'),
('96cc30e7fcdb7e913a23a7370a5f2f3f66b08852e05f9980859a2c27197f0dea9a3026950f81da91', 3, 1, 'user', '[]', 0, '2020-11-11 23:18:45', '2020-11-11 23:18:45', '2021-11-12 10:18:45'),
('9b8bfc5a8b9bd8a5c83e0e089e2ebdb9c22be784c413d0951adaa7442adab32dfd3a52fe26f9ea86', 3, 1, 'user', '[]', 0, '2020-10-24 00:15:17', '2020-10-24 00:15:17', '2021-10-24 11:15:17'),
('9d348f71707dca076d2e038c3645c75c83713014fa349157b78b59445426eb2524c2d4a10d550cf9', 3, 1, 'user', '[]', 0, '2020-12-04 07:11:51', '2020-12-04 07:11:51', '2021-12-04 18:11:51'),
('9dd2184522b94b8956c36a0130d28d2edf6e57eba89532770b246f31d4e3730a5f19ea9fd874dd2e', 3, 1, 'user', '[]', 0, '2020-10-28 04:40:54', '2020-10-28 04:40:54', '2021-10-28 15:40:54'),
('a112ae021cfb090fe0bc11d410418c24331f716b8e25b6b770a0e3e2c7f6f4715cfc9b7c67ded801', 3, 1, 'user', '[]', 0, '2020-11-17 13:25:54', '2020-11-17 13:25:54', '2021-11-18 00:25:54'),
('a866fb471f657c713edf9559a4dbb546760fde767752c32237c6c298d538e6f53fbcfe1fa9382dfa', 3, 1, 'user', '[]', 0, '2020-11-05 02:37:55', '2020-11-05 02:37:55', '2021-11-05 13:37:55'),
('aa4bf9b3715c1c81aa1af68f0aee57cfb1ea4c829877950fa389e38ce7d100531120e402978dda9a', 3, 1, 'user', '[]', 0, '2020-11-05 02:38:05', '2020-11-05 02:38:05', '2021-11-05 13:38:05'),
('ad61ee3d1ffb25fdacd17424e2b42339d3fb651815724244aa2eb5eb263f8341452656083ed87015', 3, 1, 'user', '[]', 0, '2020-10-28 04:58:43', '2020-10-28 04:58:43', '2021-10-28 15:58:43'),
('bd2cf9a2de918a58870361ec807c36211adab42815ba38efc74ffadf5ab07f754cf441ceb92b7260', 3, 1, 'user', '[]', 0, '2020-12-16 04:13:15', '2020-12-16 04:13:15', '2021-12-16 15:13:15'),
('bff87fdecb70fc6bc135141da94e310362740a1d38c04a036060dd0d6a9089145f60585188a900a8', 3, 1, 'user', '[]', 0, '2020-12-15 04:25:07', '2020-12-15 04:25:07', '2021-12-15 15:25:07'),
('c6f7b20d4088c8a435d03cdf43310423a26f80be6366f7c8fb066973fa864b77e7f596d30ae6081a', 3, 1, 'user', '[]', 0, '2020-12-05 21:31:39', '2020-12-05 21:31:39', '2021-12-06 08:31:39'),
('ca6455c7fa865718df497185422918941a178fc4d5177161a831ae0e213c93dd5b1056f1f2c1642c', 3, 1, 'user', '[]', 0, '2020-10-29 02:50:48', '2020-10-29 02:50:48', '2021-10-29 13:50:48'),
('cbccd890b60a7602a2ab6b8dcb14c84aa7a7b68e27039ee14433e6de47d6e1d9ee3ca21ad486c5c1', 3, 1, 'user', '[]', 0, '2020-11-21 00:45:47', '2020-11-21 00:45:47', '2021-11-21 11:45:47'),
('ce09732b3f4fa25985d6df3f8fbbfe8e4d8fed99eb07364bfbc340347870f2abbd0099670fd15ec0', 3, 1, 'user', '[]', 0, '2020-11-05 03:25:34', '2020-11-05 03:25:34', '2021-11-05 14:25:34'),
('d0449949fbc4048c338d40d6cb3567227d1fbe0322a1942f56bc86d63db04ab1c29568775bd93f29', 3, 1, 'user', '[]', 0, '2020-10-17 06:44:56', '2020-10-17 06:44:56', '2021-10-17 17:44:56'),
('d19980e1192527c977fb43f1403ee1caff6758ef78e95fd8152e69c995b985aaf36aee8d32afbd5a', 3, 1, 'user', '[]', 0, '2020-10-29 07:04:23', '2020-10-29 07:04:23', '2021-10-29 18:04:23'),
('d65c0202b4d3844d04acd775318dcc6740e930cbae751bd73b4b5bc3ede44a4650be682f71a50060', 3, 1, 'user', '[]', 0, '2020-12-04 07:13:31', '2020-12-04 07:13:31', '2021-12-04 18:13:31'),
('de06d6f1b589b65ae4506e23ac86dd6cf95564917de012cdca46a274567f8d352826025aebd52974', 3, 1, 'user', '[]', 0, '2020-10-17 06:44:42', '2020-10-17 06:44:42', '2021-10-17 17:44:42'),
('e8cf372154a55dea72f98bcc51239dd02d11ee422ace8d1e2be378ac910775b710f20205a344f0fd', 3, 1, 'user', '[]', 0, '2020-11-11 23:19:28', '2020-11-11 23:19:28', '2021-11-12 10:19:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'wPqMqRP8VbxK9UENXSjaCerLcpL7jSg66z02VhGP', 'http://localhost', 1, 0, 0, '2020-10-06 23:31:28', '2020-10-06 23:31:28'),
(2, NULL, 'Laravel Password Grant Client', 'yuTpRCjKJeyYQzfmurZUs7Xp2bX6gMXQ60RqaayN', 'http://localhost', 0, 1, 0, '2020-10-06 23:31:28', '2020-10-06 23:31:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-06 23:31:28', '2020-10-06 23:31:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `taggables`
--

CREATE TABLE `taggables` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `taggables`
--

INSERT INTO `taggables` (`tag_id`, `taggable_type`, `taggable_id`) VALUES
(1, 'App\\Models\\Invoice', 23),
(2, 'App\\Models\\Invoice', 23),
(3, 'App\\Models\\Invoice', 25),
(4, 'App\\Models\\Invoice', 26),
(5, 'App\\Models\\Invoice', 26),
(10, 'App\\Models\\ProjectDocument', 2),
(11, 'App\\Models\\ProjectDocument', 2),
(11, 'App\\Models\\ProjectDocument', 4),
(11, 'App\\Models\\ProjectDocument', 5),
(11, 'App\\Models\\ProjectDocument', 6),
(11, 'App\\Models\\Projects', 7),
(12, 'App\\Models\\Invoice', 29),
(13, 'App\\Models\\ProjectDocument', 4),
(13, 'App\\Models\\ProjectDocument', 5),
(13, 'App\\Models\\ProjectDocument', 6),
(13, 'App\\Models\\Projects', 7),
(14, 'App\\Models\\Projects', 2),
(14, 'App\\Models\\Projects', 9),
(15, 'App\\Models\\Projects', 2),
(15, 'App\\Models\\Projects', 9),
(20, 'App\\Models\\WorkOrder', 5),
(20, 'App\\Models\\WorkOrder', 72),
(21, 'App\\Models\\WorkOrder', 72),
(22, 'App\\Models\\WorkOrder', 67),
(26, 'App\\Models\\WorkOrder', 67),
(27, 'App\\Models\\WorkOrder', 68),
(27, 'App\\Models\\WorkOrder', 70),
(28, 'App\\Models\\WorkOrder', 68),
(28, 'App\\Models\\WorkOrder', 69),
(28, 'App\\Models\\WorkOrder', 70),
(28, 'App\\Models\\WorkOrder', 73),
(29, 'App\\Models\\WorkOrder', 69),
(29, 'App\\Models\\WorkOrder', 73),
(30, 'App\\Models\\WorkOrder', 71),
(31, 'App\\Models\\WorkOrder', 71),
(32, 'App\\Models\\Invoice', 51),
(32, 'App\\Models\\Invoice', 53),
(37, 'App\\Models\\WorkOrder', 82),
(38, 'App\\Models\\Projects', 8),
(39, 'App\\Models\\Projects', 8),
(40, 'App\\Models\\ProjectDocument', 9),
(40, 'App\\Models\\ProjectDocument', 10),
(40, 'App\\Models\\Projects', 10),
(40, 'App\\Models\\Projects', 11),
(40, 'App\\Models\\Invoice', 49),
(40, 'App\\Models\\Invoice', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `slug` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`slug`)),
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `type`, `order_column`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"tag\"}', '{\"en\": \"tag\"}', NULL, 1, '2020-10-20 17:01:21', '2020-10-20 17:01:21'),
(2, '{\"en\": \"tag2\"}', '{\"en\": \"tag2\"}', NULL, 2, '2020-10-20 17:01:21', '2020-10-20 17:01:21'),
(3, '{\"en\": \"project\"}', '{\"en\": \"project\"}', NULL, 3, '2020-10-22 11:15:59', '2020-10-22 11:15:59'),
(4, '{\"en\": \"big\"}', '{\"en\": \"big\"}', NULL, 4, '2020-10-22 11:26:40', '2020-10-22 11:26:40'),
(5, '{\"en\":\"tes\"}', '{\"en\":\"tes\"}', NULL, 5, '2020-10-22 17:25:34', '2020-10-22 17:25:34'),
(6, '{\"en\":\"Rohman\"}', '{\"en\":\"rohman\"}', NULL, 6, '2020-10-23 16:43:04', '2020-10-23 16:43:04'),
(7, '{\"en\":\"Nurafan\"}', '{\"en\":\"nurafan\"}', NULL, 7, '2020-10-23 16:43:05', '2020-10-23 16:43:05'),
(8, '{\"en\":\"Putra\"}', '{\"en\":\"putra\"}', NULL, 8, '2020-10-23 16:43:06', '2020-10-23 16:43:06'),
(9, '{\"en\":\"Pratama\"}', '{\"en\":\"pratama\"}', NULL, 9, '2020-10-23 16:43:07', '2020-10-23 16:43:07'),
(10, '{\"en\":\"Taree\"}', '{\"en\":\"taree\"}', NULL, 10, '2020-10-25 22:12:36', '2020-10-25 22:12:36'),
(11, '{\"en\":\"PS\"}', '{\"en\":\"ps\"}', NULL, 11, '2020-10-25 22:12:36', '2020-10-25 22:12:36'),
(12, '{\"en\":\"Indomaret\"}', '{\"en\":\"indomaret\"}', NULL, 12, '2020-10-25 22:22:18', '2020-10-25 22:22:18'),
(13, '{\"en\":\"Burwood\"}', '{\"en\":\"burwood\"}', NULL, 13, '2020-10-26 20:37:03', '2020-10-26 20:37:03'),
(14, '{\"en\":\"Hurstville\"}', '{\"en\":\"hurstville\"}', NULL, 14, '2020-10-26 20:37:26', '2020-10-26 20:37:26'),
(15, '{\"en\":\"westfield\"}', '{\"en\":\"westfield\"}', NULL, 15, '2020-10-26 20:37:26', '2020-10-26 20:37:26'),
(16, '{\"en\":\"nicepro\"}', '{\"en\":\"nicepro\"}', NULL, 16, '2020-11-01 02:34:44', '2020-11-01 02:34:44'),
(17, '{\"en\":\"coba\"}', '{\"en\":\"coba\"}', NULL, 17, '2020-11-12 15:55:28', '2020-11-12 15:55:28'),
(18, '{\"en\":\"1,2,3,4,5\"}', '{\"en\":\"12345\"}', NULL, 18, '2020-11-15 22:06:55', '2020-11-15 22:06:55'),
(19, '{\"en\":\"ISI TAGS\"}', '{\"en\":\"isi-tags\"}', NULL, 19, '2020-11-16 17:34:11', '2020-11-16 17:34:11'),
(20, '{\"en\":\"1\"}', '{\"en\":\"1\"}', NULL, 20, '2020-11-17 19:13:58', '2020-11-17 19:13:58'),
(21, '{\"en\":\"2\"}', '{\"en\":\"2\"}', NULL, 21, '2020-11-17 19:13:59', '2020-11-17 19:13:59'),
(22, '{\"en\":\"3\"}', '{\"en\":\"3\"}', NULL, 22, '2020-11-17 19:14:00', '2020-11-17 19:14:00'),
(23, '{\"en\":\"4\"}', '{\"en\":\"4\"}', NULL, 23, '2020-11-17 19:14:01', '2020-11-17 19:14:01'),
(24, '{\"en\":\"5\"}', '{\"en\":\"5\"}', NULL, 24, '2020-11-17 20:47:39', '2020-11-17 20:47:39'),
(25, '{\"en\":\"6\"}', '{\"en\":\"6\"}', NULL, 25, '2020-11-17 20:47:39', '2020-11-17 20:47:39'),
(26, '{\"en\":\"211\"}', '{\"en\":\"211\"}', NULL, 26, '2020-11-17 21:34:29', '2020-11-17 21:34:29'),
(27, '{\"en\":\"21\"}', '{\"en\":\"21\"}', NULL, 27, '2020-11-17 21:36:13', '2020-11-17 21:36:13'),
(28, '{\"en\":\"32\"}', '{\"en\":\"32\"}', NULL, 28, '2020-11-17 21:36:14', '2020-11-17 21:36:14'),
(29, '{\"en\":\"12\"}', '{\"en\":\"12\"}', NULL, 29, '2020-11-17 21:38:46', '2020-11-17 21:38:46'),
(30, '{\"en\":\"aa\"}', '{\"en\":\"aa\"}', NULL, 30, '2020-11-17 21:44:41', '2020-11-17 21:44:41'),
(31, '{\"en\":\"ff\"}', '{\"en\":\"ff\"}', NULL, 31, '2020-11-17 21:44:41', '2020-11-17 21:44:41'),
(32, '{\"en\":\"Hurstville westfield\"}', '{\"en\":\"hurstville-westfield\"}', NULL, 32, '2020-11-17 21:56:53', '2020-11-17 21:56:53'),
(33, '{\"en\":\"Taree PS\"}', '{\"en\":\"taree-ps\"}', NULL, 33, '2020-11-17 21:56:53', '2020-11-17 21:56:53'),
(34, '{\"en\":\"PHP\"}', '{\"en\":\"php\"}', NULL, 34, '2020-11-17 22:20:28', '2020-11-17 22:20:28'),
(35, '{\"en\":\"JAVA\"}', '{\"en\":\"java\"}', NULL, 35, '2020-11-17 22:20:29', '2020-11-17 22:20:29'),
(36, '{\"en\":\"LARAVEL\"}', '{\"en\":\"laravel\"}', NULL, 36, '2020-11-17 22:23:56', '2020-11-17 22:23:56'),
(37, '{\"en\":\"Burwood PS\"}', '{\"en\":\"burwood-ps\"}', NULL, 37, '2020-11-18 21:01:12', '2020-11-18 21:01:12'),
(38, '{\"en\":\"gardiner\"}', '{\"en\":\"gardiner\"}', NULL, 38, '2020-12-12 17:34:16', '2020-12-12 17:34:16'),
(39, '{\"en\":\"aven\"}', '{\"en\":\"aven\"}', NULL, 39, '2020-12-12 17:34:16', '2020-12-12 17:34:16'),
(40, '{\"en\":\"Batam\"}', '{\"en\":\"batam\"}', NULL, 40, '2020-12-13 02:20:24', '2020-12-13 02:20:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_activity`
--

CREATE TABLE `x_activity` (
  `id` bigint(20) NOT NULL,
  `id_work_order` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_appointments`
--

CREATE TABLE `x_appointments` (
  `id` bigint(20) NOT NULL,
  `id_clients` bigint(20) NOT NULL,
  `id_staff` bigint(20) DEFAULT NULL,
  `date` datetime NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `recurring_frequency` varchar(200) DEFAULT NULL,
  `recurring_end_date` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_appointments`
--

INSERT INTO `x_appointments` (`id`, `id_clients`, `id_staff`, `date`, `purpose`, `note`, `recurring_frequency`, `recurring_end_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 62, 57, '2020-08-23 00:00:00', 'Meeting', 'tes sds', 'Weekly', '2020-08-22', 'Accept', '2020-08-09 03:24:52', NULL, NULL),
(2, 62, 57, '2020-08-25 00:00:00', 'Meeting f sfsfsfs', 'tesfs fgs gsg sg s', 'Weekly', '2020-08-22', 'Accept', '2020-08-24 12:33:58', NULL, NULL),
(3, 62, 55, '2020-08-25 00:00:00', 'sadwdsd', 'tes', 'Weekly', '2020-08-22', 'Pending', '2020-08-24 19:15:30', NULL, NULL),
(4, 14, 54, '2020-08-31 00:00:00', 'tes', 'tes', 'Weekly', '2020-08-17', 'Accept', '2020-08-31 08:47:05', '2020-08-31 18:56:22', NULL),
(5, 64, 45, '2020-10-31 00:00:00', 'Purpose', 'Note', 'Weekly', '2020-08-17', 'Accept', '2020-10-29 04:08:58', NULL, '2020-10-31 13:59:31'),
(6, 64, 45, '2020-11-09 00:00:00', 'Purpose', 'Note', 'Weekly', '2020-11-09', 'Pending', '2020-11-09 04:08:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_asset_list`
--

CREATE TABLE `x_asset_list` (
  `id` int(6) NOT NULL,
  `project_asset_name_id` int(6) NOT NULL,
  `asset_id` varchar(100) DEFAULT '',
  `name` varchar(200) DEFAULT '',
  `source` text DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT '',
  `serial` varchar(200) DEFAULT '',
  `manufacture` varchar(200) DEFAULT '',
  `disabled` varchar(10) DEFAULT '',
  `storage_capacity` varchar(200) DEFAULT '',
  `type` varchar(200) DEFAULT '',
  `os_name` varchar(200) DEFAULT '',
  `os_type` varchar(200) DEFAULT '',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_asset_list`
--

INSERT INTO `x_asset_list` (`id`, `project_asset_name_id`, `asset_id`, `name`, `source`, `ip_address`, `serial`, `manufacture`, `disabled`, `storage_capacity`, `type`, `os_name`, `os_type`, `updated_at`) VALUES
(5, 3, 'Asset ID', 'Rohman Nurafan Putra Pratama', 'Source', 'Mukakuning Paradise ', 'Mukakuning Paradise Blok U No. 6', 'Manufacture', NULL, 'Batam', 'Type', 'OS Name', 'OS Type', NULL),
(6, 11, '25151225', 'Dell Server', 'server room', '192.168.1.1', '41418444848', 'Australia', NULL, '60tb', 'R305', 'Windows Server', 'Windows server 2016', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_asset_list_camera`
--

CREATE TABLE `x_asset_list_camera` (
  `id` int(6) NOT NULL,
  `project_asset_name_id` int(6) DEFAULT NULL,
  `type` varchar(50) DEFAULT '',
  `description` text DEFAULT NULL,
  `server` varchar(50) DEFAULT '',
  `camera` varchar(50) DEFAULT '',
  `model` varchar(50) DEFAULT '',
  `camera_serial_number` varchar(50) DEFAULT '',
  `mac_address` varchar(50) DEFAULT '',
  `ip_address` varchar(50) DEFAULT '',
  `netmask` varchar(50) DEFAULT '',
  `user` varchar(100) DEFAULT '',
  `password` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `x_asset_list_camera`
--

INSERT INTO `x_asset_list_camera` (`id`, `project_asset_name_id`, `type`, `description`, `server`, `camera`, `model`, `camera_serial_number`, `mac_address`, `ip_address`, `netmask`, `user`, `password`) VALUES
(1, 9, 'IP Address', 'L1 Food Court Subway IP', '1', 'Pelco', 'IMP221-1IS', 'T62307398', '00:04:7D:33:EB:69', '10.8.132.180', '', '', ''),
(2, 9, 'Analogue', 'L2 Woolworths', '1', 'Pelco', 'SNB-6004', 'KHF56V2F8000JZV', '00:16:6C:89:0E:DE', '10.8.132.61', '147', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_asset_list_recording`
--

CREATE TABLE `x_asset_list_recording` (
  `id` int(6) NOT NULL,
  `project_asset_name_id` int(6) DEFAULT NULL,
  `description` varchar(100) DEFAULT '',
  `server` varchar(100) DEFAULT '',
  `days_recording` varchar(100) DEFAULT '',
  `recording` varchar(100) DEFAULT '',
  `motion_recording` varchar(100) DEFAULT '',
  `codec` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `x_asset_list_recording`
--

INSERT INTO `x_asset_list_recording` (`id`, `project_asset_name_id`, `description`, `server`, `days_recording`, `recording`, `motion_recording`, `codec`) VALUES
(1, 8, 'Description', 'Server', 'Days Recording', 'Recording', 'Motion Recording', 'Codec'),
(2, 8, 'Description 1', 'Server 2', 'Days Recording 3', 'Recording 4', 'Motion Recording 5', 'Codec 6'),
(3, 8, 'Description 6', 'Server 4', 'Days Recording 2', 'Recording 5', 'Motion Recording 3', 'Codec 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_asset_list_server`
--

CREATE TABLE `x_asset_list_server` (
  `id` int(6) NOT NULL,
  `project_asset_name_id` int(6) DEFAULT NULL,
  `location` varchar(200) DEFAULT '',
  `brand` varchar(200) DEFAULT '',
  `model` varchar(200) DEFAULT '',
  `serial_number` varchar(60) DEFAULT '',
  `hostname` varchar(100) DEFAULT '',
  `service_tag` varchar(255) DEFAULT '',
  `ip_address` varchar(100) DEFAULT '',
  `subnet_mask` varchar(100) DEFAULT '',
  `default_getway` varchar(100) DEFAULT '',
  `pres_ip_dns` varchar(100) DEFAULT '',
  `alter_ip_dns` varchar(100) DEFAULT '',
  `username` varchar(100) DEFAULT '',
  `password` varchar(100) DEFAULT '',
  `storage_live_db_total` varchar(100) DEFAULT '',
  `storage_archive` varchar(100) DEFAULT '',
  `update_by` varchar(255) DEFAULT '',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `x_asset_list_server`
--

INSERT INTO `x_asset_list_server` (`id`, `project_asset_name_id`, `location`, `brand`, `model`, `serial_number`, `hostname`, `service_tag`, `ip_address`, `subnet_mask`, `default_getway`, `pres_ip_dns`, `alter_ip_dns`, `username`, `password`, `storage_live_db_total`, `storage_archive`, `update_by`, `updated_at`) VALUES
(1, 10, 'Security Office', 'DELL', NULL, NULL, 'DD47CHY1\r\n', '', '10.8.142.10', '255.255.255.192', '10.8.142.1', '10.80.106.148', '10.80.168.148', 'cctv_charlie', 'W3stf!eld_1', ' 55.8 gb free of 557 gb', '3.97 TB free of 50.9 TB', 'SS', '2020-10-28 09:02:30'),
(2, 10, 'Security Office', 'Brand', 'Model', 'ADFHKJA1452DA01', 'CTVANBWNVRW006', 'PORT 10', '10.8.142.72', '255.255.255.192', '10.8.142.1\r\n', '10.80.106.148\r\n', '10.80.168.148', 'cctv_charlie', 'W3stf!eld_1', '501 gb free of 557 gb', '50.9 TB free of 50.9 TB\r\n', 'Sarwen', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_clients`
--

CREATE TABLE `x_clients` (
  `id` bigint(20) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `business_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `country` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_client` int(11) DEFAULT NULL,
  `logo_clients` varchar(200) DEFAULT NULL,
  `secondary_address1` varchar(200) DEFAULT NULL,
  `secondary_address2` varchar(200) DEFAULT NULL,
  `secondary_city` varchar(200) DEFAULT NULL,
  `secondary_state` varchar(200) DEFAULT NULL,
  `secondary_postal` varchar(200) DEFAULT NULL,
  `secondary_country` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_clients`
--

INSERT INTO `x_clients` (`id`, `full_name`, `status`, `business_name`, `email`, `street`, `city`, `province`, `telephone`, `mobile`, `country`, `created_at`, `status_client`, `logo_clients`, `secondary_address1`, `secondary_address2`, `secondary_city`, `secondary_state`, `secondary_postal`, `secondary_country`, `updated_at`) VALUES
(14, 'Rizal', 'individual', 'XPRO', 'rizalhidayat180499@gmail.com', 'Jl. Pulo asri indah', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Indonesia', '2020-11-10 02:26:28', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'sahtia', 'individual', 'XPRO', 'sahtia@gmail.com', 'metro 1', 'Jakarta', 'DKI Jakarta', '89898999', '089812938192', 'Indonesia', '2020-12-21 01:34:15', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'tes', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:15', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'sanjit', 'individual', 'XPRO', 'sanjitsatishan55@gmail.com', '4 gardiner street', 'banksia', 'nsw', '0411086022', '0411086022', 'Country', '2020-12-21 01:34:16', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'testttt', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:16', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'teste', 'individual', 'XPRO', 'tesDelete@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Indonesia', '2020-12-21 01:34:16', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'sahtia2', 'individual', 'XPRO', 'sahtiamurti@gmail.com', 'metro permata 1 blok j5 no.30', 'tangerang', 'Banten', '085939753687', '085939753687', 'Country', '2020-12-21 01:34:16', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'last3', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:31', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'testlogo', 'individual', 'XPRO', 'teslogo@gmail.com', 'asd', 'Kota Jakarta Pusat', 'Prov. D.K.I. Jakarta', '8123456780', '0812345678', 'Country', '2020-12-21 01:34:17', 0, '941px-National_emblem_of_Indonesia_Garuda_Pancasila.svg.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'testlogo', 'individual', 'XPRO', 'teslogo@gmail.com', 'asd', 'Kota Jakarta Pusat', 'Prov. D.K.I. Jakarta', '8123456780', '0812345678', 'Country', '2020-12-21 01:34:17', 0, '941px-National_emblem_of_Indonesia_Garuda_Pancasila.svg.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'ikhsan@gmail.com', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:17', 0, 'Untitled-2.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'wa', 'individual', 'XPRO', 'wada@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:18', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'tes@gmail.com', 'individual', 'XPRO', 'tes@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:18', 0, '/tmp/phpUTUBLL', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'ngetes', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:18', 0, 'poto3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'ngetes', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:18', 0, '/tmp/phpQfN5jI', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'ngetes', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:19', 0, 'poto3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'logo3', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:19', 0, 'poto.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'try5', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:19', 0, '/tmp/phpSK9zuq', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'try5', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:19', 0, '/tmp/phpWsQ5nU', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'keeptry', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:20', 0, 'poto.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'bisa', 'individual', 'XPRO', 'tes@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:20', 0, 'garuda.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'nyoba', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Country', '2020-12-21 01:34:20', 0, 'garuda.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'sanjit', 'individual', 'XPRO', 'sanjitsatishan55@gmail.com', 'sa', 'sa', 'sa', '5444646', '2665656', 'Country', '2020-12-21 01:34:21', 0, 'Customer 1.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Ikhsan', 'individual', 'XPRO', 'ikhsanngeteh@gmail.com', 'jalan rahasia', 'jakarta', 'jakarta', '081383341293', '081383341293', 'Indonesia', '2020-12-21 01:34:21', 0, 'IMG_20191206_200308.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Ikshan', 'individual', 'XPRO', 'ikhsan@gmail.com', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '081383341293', '081383341293', 'Indonesia', '2020-12-21 01:34:21', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'John doe', 'individual', 'XPRO', 'john@xpro.com', 'example street', 'city', 'province', 'telephone', '0812322323xxx', '09123912xxx', '2020-12-21 01:34:35', 0, 'zuwinda-icon.png', 'example address', 'example address2', 'exmaple city', 'example state', '220392', 'Indonesia', '2020-10-07 13:52:08'),
(64, 'sanjit', 'individual', 'XPRO', 'sanjitsatishan55@gmail.com', '223', '333', '222', '5', '0411086022', 'Country', '2020-12-21 01:34:22', 1, 'WhatsApp Image 2020-10-02 at 7.51.12 PM.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_company_setting`
--

CREATE TABLE `x_company_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_company_setting`
--

INSERT INTO `x_company_setting` (`id`, `user_id`, `business_name`, `business_address`, `business_phone`, `business_email`, `created_at`, `updated_at`) VALUES
(1, 3, 'XPROS', 'Blitar Jawa Timur', '081293188223', 'xpro@gmail.com', '2020-09-23 16:59:25', '2020-10-07 14:07:23'),
(5, 21, NULL, NULL, NULL, NULL, '2020-11-30 02:28:42', '2020-11-30 02:28:42'),
(6, 2, NULL, NULL, NULL, NULL, '2020-12-05 05:13:01', '2020-12-05 05:13:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_config`
--

CREATE TABLE `x_config` (
  `id` bigint(20) NOT NULL,
  `var` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_config`
--

INSERT INTO `x_config` (`id`, `var`, `value`, `desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'APP_NAME', 'X PRO', 'application name', '2020-02-15 02:55:37', '2020-02-15 05:07:19', NULL),
(2, 'APP_VERSION', '1.0.0', 'aplication version', '2020-02-15 02:56:10', '2020-02-15 05:07:19', NULL),
(3, 'LOGIN_SIGNATURE', '_!XPRO!_', 'signature for login account', '2020-02-15 05:06:54', '2020-02-15 05:06:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_contact`
--

CREATE TABLE `x_contact` (
  `id` int(6) NOT NULL,
  `name` varchar(100) DEFAULT '',
  `phone_number` varchar(20) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `status` int(2) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `x_contact`
--

INSERT INTO `x_contact` (`id`, `name`, `phone_number`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rohman Nurafan', '+62 812-670-670-94', 'rohman.nurafan13@gmail.com', 1, NULL, NULL),
(6, 'sanjiit satishan', '0411086022', 'sanjitsatishan55@gmail.com', 1, '2020-10-30 01:27:48', '2020-10-30 12:27:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_credit_note`
--

CREATE TABLE `x_credit_note` (
  `id` bigint(20) NOT NULL,
  `id_clients` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `issue_date` date NOT NULL,
  `payment_terms` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `paid_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_credit_note`
--

INSERT INTO `x_credit_note` (`id`, `id_clients`, `id_product`, `start_date`, `issue_date`, `payment_terms`, `quantity`, `notes`, `status`, `paid_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 64, 1, '2020-08-10', '2020-08-13', '1', '1', 'overpaid of $302', 1, NULL, '2020-07-28 12:36:38', '2020-11-25 03:55:38', '2020-11-25 14:55:38'),
(2, 14, 1, '2020-11-03', '2020-11-03', '1', '1', 'overpaid of $2962', 1, NULL, '2020-11-02 18:34:29', '2020-11-02 18:34:29', NULL),
(3, 14, 1, '2020-11-13', '2020-11-13', '1', '1', 'overpaid of $30', 1, NULL, '2020-11-12 21:35:36', '2020-11-12 21:35:36', NULL),
(4, 64, 1, '2020-12-10', '2020-12-10', '1', '1', 'overpaid of $200', 1, NULL, '2020-12-10 03:29:44', '2020-12-10 03:29:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_customers`
--

CREATE TABLE `x_customers` (
  `id` bigint(20) NOT NULL,
  `invoice_date` date NOT NULL,
  `issue_date` date NOT NULL,
  `payment_terms` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_email_queue`
--

CREATE TABLE `x_email_queue` (
  `id` bigint(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `from` varchar(200) NOT NULL,
  `to` varchar(200) NOT NULL,
  `cc` varchar(200) DEFAULT NULL,
  `bcc` varchar(200) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_email_queue`
--

INSERT INTO `x_email_queue` (`id`, `subject`, `message`, `attachment`, `from`, `to`, `cc`, `bcc`, `log`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tes', 'tess', NULL, 'sanjitsatishan17@gmail.com', 'sanjitsatishan55@gmail.com', NULL, NULL, NULL, '2020-07-10 03:29:20', NULL, NULL),
(6, 'tes4', 'tes5', NULL, 'sanjitsatishan17@gmail.com', 'sanjitsatishan55@gmail.com', NULL, NULL, NULL, '2020-07-10 03:53:28', NULL, NULL),
(7, 'test7', 'test7', NULL, 'sanjitsatishan17@gmail.com', 'sanjitsatishan55@gmail.com', NULL, NULL, NULL, '2020-07-10 03:58:31', NULL, NULL),
(8, 'test7', 'test7', NULL, 'sanjitsatishan17@gmail.com', 'sanjitsatishan55@gmail.com', NULL, NULL, NULL, '2020-07-10 04:00:55', NULL, NULL),
(9, 'test7', 'test7', NULL, 'sanjitsatishan17@gmail.com', 'sanjitsatishan55@gmail.com', NULL, NULL, NULL, '2020-07-10 04:01:13', NULL, NULL),
(11, 'Account Information XPRO', '\'Username : \'.Login2@gmail.com\n                          \'Password : \' .wYRlqKYg', NULL, 'XPRO@gmail.com', 'Login2@gmail.com', NULL, NULL, NULL, '2020-07-14 12:02:48', NULL, NULL),
(12, 'Account Information XPRO', '\'Username : Login3@gmail.com\n                          \'Password : R4yDnVXX', NULL, 'XPRO@gmail.com', 'Login3@gmail.com', NULL, NULL, NULL, '2020-07-14 12:03:52', NULL, NULL),
(13, 'Account Information XPRO', 'Username : testcoba@gmail.com\n                          Password : EKfvEvOf', NULL, 'XPRO@gmail.com', 'testcoba@gmail.com', NULL, NULL, NULL, '2020-07-15 01:44:11', NULL, NULL),
(14, 'Account Information XPRO', 'Username : one@gmail.com\n                          Password : VtXWyx3U', NULL, 'XPRO@gmail.com', 'one@gmail.com', NULL, NULL, NULL, '2020-07-15 01:47:06', NULL, NULL),
(15, 'Account Information XPRO', 'Username : sanjitsatishan17@gmail.com\n                          Password : EDKYMAuD', NULL, 'XPRO@gmail.com', 'sanjitsatishan17@gmail.com', NULL, NULL, NULL, '2020-07-20 16:58:03', NULL, NULL),
(16, 'Account Information XPRO', 'Username : test1@gmail.com\n                          Password : 8IOdErwl', NULL, 'XPRO@gmail.com', 'test1@gmail.com', NULL, NULL, NULL, '2020-07-20 16:59:11', NULL, NULL),
(17, 'Account Information XPRO', 'Username : ikhsan11@gmail.com\n                          Password : XteR1gnI', NULL, 'XPRO@gmail.com', 'ikhsan11@gmail.com', NULL, NULL, NULL, '2020-07-20 17:00:38', NULL, NULL),
(18, 'Account Information XPRO', 'Username : sahtiatest@gmail.com\n                          Password : qrSmNato', NULL, 'XPRO@gmail.com', 'sahtiatest@gmail.com', NULL, NULL, NULL, '2020-07-25 01:30:47', NULL, NULL),
(19, 'Account Information XPRO', 'Username : sanjit@xprogroup.com.au\r\n                          Password : Sanjit123', NULL, 'XPRO@gmail.com', 'sanjit@xprogroup.com.au', NULL, NULL, NULL, '2020-11-30 13:27:29', NULL, NULL),
(20, 'Account Information XPRO', 'Username : marfinohamzah455@gmail.com\r\n                          Password : 123456', NULL, 'XPRO@gmail.com', 'marfinohamzah455@gmail.com', NULL, NULL, NULL, '2020-12-22 14:01:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_email_template`
--

CREATE TABLE `x_email_template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_new_invoice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_new_invoice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_payment_received` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_payment_received` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_email_template`
--

INSERT INTO `x_email_template` (`id`, `user_id`, `subject_new_invoice`, `body_new_invoice`, `subject_payment_received`, `body_payment_received`, `created_at`, `updated_at`) VALUES
(1, 3, '{invoice_number} invoice created', '<p>Dear {customer_name},</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We have prepared the following invoice for you:&nbsp;<strong>{invoice_number}</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You can see the invoice details and proceed with the payment from the following link:&nbsp;<a href=\"https://app.akaunting.com/settings/%7Binvoice_guest_link%7D\" target=\"_blank\">{invoice_number}</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Feel free to contact us for any question.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Best Regards,</p>\r\n\r\n<p>{company_name}</p>', 'Payment received for {invoice_number} invoice', '<p>Dear {customer_name},</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thank you for the payment. Find the payment details below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-------------------------------------------------</p>\r\n\r\n<p>Amount:&nbsp;<strong>{transaction_total}</strong></p>\r\n\r\n<p>Date:&nbsp;<strong>{transaction_paid_date}</strong></p>\r\n\r\n<p>Invoice Number:&nbsp;<strong>{invoice_number}</strong></p>\r\n\r\n<p>-------------------------------------------------</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You can always see the invoice details from the following link:&nbsp;<a href=\"https://app.akaunting.com/settings/%7Binvoice_guest_link%7D\" target=\"_blank\">{invoice_number}</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Feel free to contact us for any question.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Best Regards,</p>\r\n\r\n<p>{company_name}</p>', '2020-09-21 00:00:41', '2020-09-21 01:02:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_estimates`
--

CREATE TABLE `x_estimates` (
  `id` bigint(20) NOT NULL,
  `id_clients` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `estimates_date` date NOT NULL,
  `issue_date` date NOT NULL,
  `payment_terms` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `sub_total` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_estimates`
--

INSERT INTO `x_estimates` (`id`, `id_clients`, `id_product`, `estimates_date`, `issue_date`, `payment_terms`, `quantity`, `notes`, `status`, `sub_total`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 14, 1, '2020-01-01', '2020-01-01', '1', '1', 'example notes', 1, 130, 20000, '2020-10-15 10:41:19', '2020-11-04 08:08:22', NULL),
(13, 14, 1, '2020-10-24', '2020-10-24', '1', '1', 'bhh', 1, NULL, 60, '2020-10-24 00:15:56', '2020-10-24 00:15:56', NULL),
(15, 64, 1, '2020-12-18', '2020-12-18', '1', '1', 'Tes Pengurangan Stock', 1, 1954522, 2345426, '2020-12-17 15:51:17', '2020-12-17 15:51:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_estimates_items`
--

CREATE TABLE `x_estimates_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estimates_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_estimates_items`
--

INSERT INTO `x_estimates_items` (`id`, `estimates_id`, `product_id`, `qty`, `unit_price`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 2, 10000, 12, 20000, '2020-10-07 01:13:57', '2020-10-26 15:37:43'),
(2, 8, 8, 1, 35, 20, 50, '2020-10-13 15:48:44', '2020-10-13 16:38:55'),
(3, 8, 1, 2, 20, 20, 40, '2020-10-13 16:42:30', '2020-10-13 16:42:30'),
(4, 9, 3, 2, 50, 20, 100, '2020-10-13 17:10:09', '2020-10-13 17:10:09'),
(5, 10, 8, 10, 35, 20, 350, '2020-10-13 17:15:23', '2020-10-13 17:15:23'),
(6, 11, 3, 3, 50, 20, 150, '2020-10-15 10:40:45', '2020-10-15 10:40:45'),
(7, 12, 8, 2, 35, 20, 70, '2020-10-15 10:41:19', '2020-10-15 10:41:19'),
(8, 12, 1, 3, 20, 20, 60, '2020-10-15 10:41:19', '2020-10-15 10:41:19'),
(9, 14, 3, 2, 50, 20, 100, '2020-11-04 15:11:54', '2020-11-04 15:11:54'),
(11, 13, 3, 1, 50, 20, 50, '2020-12-05 22:57:25', '2020-12-05 22:57:25'),
(12, 15, 10, 43, 45454, 2, 1954522, '2020-12-17 15:51:17', '2020-12-17 15:51:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_expenses`
--

CREATE TABLE `x_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_expenses`
--

INSERT INTO `x_expenses` (`id`, `name`, `description`, `image`, `date`, `status`, `created_at`, `updated_at`, `deleted_at`, `price`, `country`, `category`) VALUES
(6, 'Mobil', 'ssds', 'https://xpro-storage.s3-ap-southeast-1.amazonaws.com/file/images/1608086201.jpg', '2020-12-16', 1, '2020-12-15 15:36:44', '2020-12-15 15:36:44', NULL, 250, NULL, NULL),
(7, 'bensin', 'hai', 'https://xpros.s3-ap-southeast-2.amazonaws.com/file/images/1608260123.png', '2020-12-19', 1, '2020-12-17 15:55:24', '2020-12-17 15:55:24', NULL, 200, NULL, '6'),
(8, 'Bensin', 'Description', 'https://xpros.s3-ap-southeast-2.amazonaws.com/file/images/1608260424.jpg', '2020-12-18', 1, '2020-12-17 16:00:25', '2020-12-17 16:00:25', NULL, 20, NULL, '6'),
(9, 'sanjiit satishan', 'sasa', 'https://xpro-storage.s3-ap-southeast-1.amazonaws.com/file/images/1608300059.jpg', '2020-12-19', 1, '2020-12-18 03:01:00', '2020-12-18 03:01:00', NULL, 52, NULL, '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_expenses_category`
--

CREATE TABLE `x_expenses_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_expenses_category`
--

INSERT INTO `x_expenses_category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'halo', 'ha', '2020-12-15 18:39:49', '2020-12-15 18:39:49'),
(4, 'coba', 'halo', '2020-12-15 18:40:59', '2020-12-15 18:40:59'),
(6, 'Mobil', 'Kantor', '2020-12-16 22:10:59', '2020-12-16 22:10:59'),
(7, 'phone', 'test', '2020-12-18 03:00:33', '2020-12-18 03:00:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_invoice`
--

CREATE TABLE `x_invoice` (
  `id` bigint(20) NOT NULL,
  `invoice_date` date NOT NULL,
  `inv_number` bigint(20) UNSIGNED DEFAULT NULL,
  `issue_date` date NOT NULL,
  `payment_terms` varchar(200) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `notes_raw` varchar(200) DEFAULT NULL,
  `total` double NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:pending|1:paid',
  `paid_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_invoice`
--

INSERT INTO `x_invoice` (`id`, `invoice_date`, `inv_number`, `issue_date`, `payment_terms`, `notes`, `notes_raw`, `total`, `status`, `paid_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, '2020-08-26', NULL, '2020-08-26', '30', NULL, NULL, 277.2, 0, NULL, '2020-08-25 23:13:29', '2020-08-25 23:15:05', NULL),
(8, '2020-08-25', NULL, '2020-08-27', '2', NULL, NULL, 120, 0, NULL, '2020-08-26 13:42:01', '2020-08-26 13:42:01', NULL),
(9, '2020-08-25', NULL, '2020-08-27', '2', NULL, NULL, 120, 0, NULL, '2020-08-26 13:42:49', '2020-08-26 13:42:49', NULL),
(10, '2020-08-25', NULL, '2020-08-27', '2', NULL, NULL, 48, 0, NULL, '2020-08-26 14:17:27', '2020-08-26 14:17:27', NULL),
(11, '2020-08-25', NULL, '2020-08-27', '2', NULL, NULL, 48, 1, NULL, '2020-08-26 14:21:55', '2020-08-26 14:21:55', NULL),
(12, '2020-08-25', NULL, '2020-08-27', '2', NULL, NULL, 48, 0, NULL, '2020-08-26 14:22:24', '2020-08-26 14:22:24', NULL),
(13, '2020-08-25', NULL, '2020-08-31', '2', NULL, NULL, 22, 0, NULL, '2020-08-26 18:54:25', '2020-08-26 18:54:25', '2020-08-26 19:18:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_invoice_batch`
--

CREATE TABLE `x_invoice_batch` (
  `id` bigint(20) NOT NULL,
  `id_invoice_product_client` bigint(20) NOT NULL,
  `id_invoice` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_invoice_batch`
--

INSERT INTO `x_invoice_batch` (`id`, `id_invoice_product_client`, `id_invoice`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 7, 1, '2020-08-25 23:24:57', '0000-00-00 00:00:00', NULL),
(2, 3, 7, 1, '2020-08-25 23:24:57', '0000-00-00 00:00:00', NULL),
(3, 4, 7, 1, '2020-08-25 23:24:57', '0000-00-00 00:00:00', NULL),
(4, 22, 12, 1, '2020-08-26 14:22:24', '2020-08-26 14:22:24', NULL),
(5, 23, 13, 1, '2020-08-26 18:54:25', '2020-08-26 18:54:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_invoice_items`
--

CREATE TABLE `x_invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_invoice_items`
--

INSERT INTO `x_invoice_items` (`id`, `invoice_id`, `product_id`, `qty`, `unit_price`, `tax_id`, `total`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 2, 50000, 20, 10000, '2020-10-07 00:35:33', '2020-10-12 18:12:45'),
(2, 16, 2, 1, 500, 20, 500, '2020-10-12 18:19:53', '2020-10-12 18:24:58'),
(3, 16, 1, 2, 50000, 12, 100000, '2020-10-12 18:29:00', '2020-10-26 15:37:50'),
(4, 17, 8, 5, 35, 20, 175, '2020-10-14 14:54:52', '2020-10-14 14:54:52'),
(5, 17, 7, 3, 1000, 20, 3000, '2020-10-14 14:54:52', '2020-10-14 14:54:52'),
(6, 18, 3, 2, 50, 20, 100, '2020-10-14 14:56:30', '2020-10-14 14:56:30'),
(7, 19, 3, 2, 50, 20, 100, '2020-10-14 15:33:37', '2020-10-14 15:33:37'),
(8, 20, 8, 10, 35, 20, 350, '2020-10-14 15:35:12', '2020-10-14 15:35:12'),
(9, 21, 3, 3, 50, 20, 150, '2020-10-14 20:09:53', '2020-10-14 20:09:53'),
(10, 22, 7, 2, 1000, 20, 2000, '2020-10-15 10:36:32', '2020-10-15 10:36:32'),
(11, 23, 8, 2, 35, 20, 70, '2020-10-15 10:41:38', '2020-10-15 10:41:38'),
(12, 23, 3, 3, 50, 20, 60, '2020-10-15 10:41:38', '2020-10-15 10:42:29'),
(13, 24, 3, 3, 50, 20, 150, '2020-10-15 10:41:38', '2020-10-15 10:41:38'),
(14, 25, 7, 2, 1000, 20, 2000, '2020-10-15 19:02:52', '2020-10-15 19:02:52'),
(15, 26, 3, 2, 50, 20, 100, '2020-10-22 11:26:40', '2020-10-22 11:26:40'),
(16, 28, 1, 1, 20, 20, 20, '2020-10-23 16:43:09', '2020-10-23 16:43:09'),
(18, 30, 3, 1, 50, 20, 50, '2020-10-28 05:02:27', '2020-10-28 05:02:27'),
(19, 28, 3, 12, 211, 10, 2532, '2020-10-28 21:59:19', '2020-10-28 21:59:19'),
(22, 32, 7, 1, 1000, 20, 1000, '2020-10-29 02:51:35', '2020-10-29 02:51:35'),
(25, 31, 7, 1, 1000, 10, 1000, '2020-10-30 20:45:21', '2020-10-30 20:45:21'),
(26, 31, 1, 1, 20, 10, 20, '2020-10-30 20:45:21', '2020-10-30 20:45:21'),
(31, 29, 3, 21, 50, 10, 1050, '2020-10-30 21:27:05', '2020-10-30 21:27:05'),
(32, 29, 1, 21, 20, 10, 420, '2020-10-30 21:27:05', '2020-10-30 21:27:05'),
(34, 33, 1, 2, 20, 2, 40, '2020-11-01 02:37:32', '2020-11-01 02:37:32'),
(35, 34, 3, 25, 50, 1, 1250, '2020-11-02 01:07:13', '2020-11-02 01:07:13'),
(36, 35, 3, 2, 50, 20, 100, '2020-11-04 15:12:21', '2020-11-04 15:12:21'),
(37, 36, 3, 1, 50, 1, 50, '2020-11-05 02:37:34', '2020-11-05 02:37:34'),
(39, 38, 8, 15, 35, 1, 525, '2020-11-12 21:50:04', '2020-11-12 21:50:04'),
(40, 39, 3, 1, 50, 1, 50, '2020-11-13 14:35:05', '2020-11-13 14:35:05'),
(41, 40, 10, 5, 45454, 1, 227270, '2020-11-13 14:37:45', '2020-11-13 14:37:45'),
(44, 37, 3, 2, 50, 2, 100, '2020-11-16 03:04:35', '2020-11-16 03:04:35'),
(45, 37, 7, 1, 1000, 1, 1000, '2020-11-16 03:04:35', '2020-11-16 03:04:35'),
(46, 41, 7, 1, 1000, 1, 1000, '2020-11-16 12:48:39', '2020-11-16 12:48:39'),
(47, 41, 3, 1, 50, 1, 50, '2020-11-16 12:48:39', '2020-11-16 12:48:39'),
(48, 42, 1, 2, 10000, 12, 20000, '2020-11-17 02:57:45', '2020-11-17 02:57:45'),
(49, 42, 8, 2, 35, 20, 70, '2020-11-17 02:57:45', '2020-11-17 02:57:45'),
(50, 42, 1, 3, 20, 20, 60, '2020-11-17 02:57:45', '2020-11-17 02:57:45'),
(51, 43, 8, 1, 35, 2, 35, '2020-11-17 19:14:03', '2020-11-17 19:14:03'),
(52, 44, 8, 1, 35, 2, 35, '2020-11-17 20:42:57', '2020-11-17 20:42:57'),
(53, 44, 7, 1, 1000, 2, 4000, '2020-11-17 20:42:57', '2020-11-17 20:42:57'),
(54, 45, 8, 1, 35, 2, 35, '2020-11-17 20:47:41', '2020-11-17 20:47:41'),
(55, 45, 7, 3, 1000, 2, 3000, '2020-11-17 20:47:42', '2020-11-17 20:47:42'),
(56, 46, 8, 1, 35, 2, 35, '2020-11-17 20:47:52', '2020-11-17 20:47:52'),
(57, 46, 7, 3, 1000, 2, 3000, '2020-11-17 20:47:52', '2020-11-17 20:47:52'),
(58, 47, 10, 1, 45454, 2, 45454, '2020-11-17 21:15:44', '2020-11-17 21:15:44'),
(59, 48, 7, 1, 1000, 2, 1000, '2020-11-17 21:19:20', '2020-11-17 21:19:20'),
(64, 50, 1, 345, 20, 2, 6900, '2020-12-13 03:20:20', '2020-12-13 03:20:20'),
(65, 51, 3, 1, 50, 2, 50, '2020-12-13 15:09:11', '2020-12-13 15:09:11'),
(66, 52, 1, 1, 20, 2, 20, '2020-12-17 15:18:04', '2020-12-17 15:18:04'),
(67, 49, 7, 100, 1000, 2, 100000, '2020-12-18 03:02:31', '2020-12-18 03:02:31'),
(68, 53, 8, 1, 35, 2, 35, '2020-12-18 15:48:40', '2020-12-18 15:48:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_invoice_product_client`
--

CREATE TABLE `x_invoice_product_client` (
  `id` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `id_client` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `subtotal` double NOT NULL DEFAULT 0,
  `id_tax` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_invoice_product_client`
--

INSERT INTO `x_invoice_product_client` (`id`, `id_product`, `id_client`, `quantity`, `subtotal`, `id_tax`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 16, 1, 20, 1, 2.2, '2020-08-28 15:45:16', '2020-08-28 15:45:16', NULL),
(3, 3, 16, 5, 250, 1, 275, '2020-08-26 19:27:18', '2020-08-26 19:27:18', NULL),
(4, 4, 16, 3, 102, 1, 0, '2020-08-27 18:19:22', '2020-08-27 18:19:22', NULL),
(5, 3, 62, 2, 0, 2, 0, '2020-08-26 13:09:31', '2020-08-26 13:09:31', NULL),
(6, 3, 62, 2, 0, 2, 0, '2020-08-26 13:11:16', '2020-08-26 13:11:16', NULL),
(7, 3, 62, 2, 0, 2, 0, '2020-08-26 13:14:19', '2020-08-26 13:14:19', NULL),
(8, 3, 62, 2, 0, 2, 0, '2020-08-26 13:18:04', '2020-08-26 13:18:04', NULL),
(9, 3, 62, 2, 0, 2, 0, '2020-08-26 13:18:30', '2020-08-26 13:18:30', NULL),
(10, 3, 62, 2, 0, 2, 0, '2020-08-26 13:19:08', '2020-08-26 13:19:08', NULL),
(11, 3, 62, 2, 0, 2, 0, '2020-08-26 13:19:54', '2020-08-26 13:19:54', NULL),
(12, 3, 62, 2, 0, 2, 0, '2020-08-26 13:20:53', '2020-08-26 13:20:53', NULL),
(13, 3, 62, 1, 0, 1, 0, '2020-08-26 13:21:56', '2020-08-26 13:21:56', NULL),
(14, 3, 62, 1, 0, 1, 0, '2020-08-26 13:27:01', '2020-08-26 13:27:01', NULL),
(15, 3, 62, 1, 0, 1, 0, '2020-08-26 13:27:38', '2020-08-26 13:27:38', NULL),
(16, 3, 62, 2, 0, 2, 0, '2020-08-26 13:42:01', '2020-08-26 13:42:01', NULL),
(17, 3, 62, 2, 0, 2, 0, '2020-08-26 13:42:49', '2020-08-26 13:42:49', NULL),
(18, 3, 62, 2, 0, 2, 0, '2020-08-26 14:16:57', '2020-08-26 14:16:57', NULL),
(19, 1, 62, 2, 0, 2, 0, '2020-08-26 14:17:27', '2020-08-26 14:17:27', NULL),
(20, 1, 62, 2, 0, 2, 0, '2020-08-26 14:19:51', '2020-08-26 14:19:51', NULL),
(21, 1, 62, 2, 0, 2, 0, '2020-08-26 14:21:55', '2020-08-26 14:21:55', NULL),
(22, 1, 62, 2, 0, 2, 0, '2020-08-26 14:22:24', '2020-08-26 14:22:24', NULL),
(23, 1, 14, 1, 20, 1, 22, '2020-08-26 18:54:25', '2020-08-26 18:54:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_invoice_setting`
--

CREATE TABLE `x_invoice_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `number_digit` int(11) DEFAULT NULL,
  `number_prefix` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_number` int(11) DEFAULT NULL,
  `disable_invoice_item_edit` tinyint(1) NOT NULL DEFAULT 0,
  `disable_estimates_module` tinyint(1) NOT NULL DEFAULT 0,
  `enable_invoice_manual_status` tinyint(1) NOT NULL DEFAULT 0,
  `disable_shipping_option` tinyint(1) NOT NULL DEFAULT 0,
  `enable_maximum_discount` tinyint(1) NOT NULL DEFAULT 0,
  `disable_footer` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_invoice_setting`
--

INSERT INTO `x_invoice_setting` (`id`, `user_id`, `number_digit`, `number_prefix`, `next_number`, `disable_invoice_item_edit`, `disable_estimates_module`, `enable_invoice_manual_status`, `disable_shipping_option`, `enable_maximum_discount`, `disable_footer`, `created_at`, `updated_at`) VALUES
(2, 3, 4, 'INV-', 54, 0, 0, 0, 0, 0, 1, '2020-09-17 15:02:58', '2020-12-18 15:48:40'),
(3, 21, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '2020-12-01 04:19:40', '2020-12-01 04:19:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_log_activity`
--

CREATE TABLE `x_log_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_log_activity`
--

INSERT INTO `x_log_activity` (`id`, `user_id`, `title`, `note`, `action_by`, `on_date`, `created_at`, `updated_at`) VALUES
(1, 2, 'Create Invoices #INV-0049', 'Created invoices #INV-0049', 'sanjit@xprogroup.com.au', '2020-12-10 14:13:23', '2020-12-10 03:13:23', '2020-12-10 03:13:23'),
(2, 2, 'Receive Payment $200 invoices INV-0049', 'Receive Payment $200 invoices INV-0049', 'sanjit@xprogroup.com.au', '2020-12-10 14:13:40', '2020-12-10 03:13:40', '2020-12-10 03:13:40'),
(3, 2, 'Receive Payment $1200 invoices INV-0049', 'Receive Payment $1200 invoices INV-0049', 'sanjit@xprogroup.com.au', '2020-12-10 14:29:44', '2020-12-10 03:29:44', '2020-12-10 03:29:44'),
(4, 2, 'Update Work Order #W-0001', 'Update Work Order #W-0001', 'sanjit@xprogroup.com.au', '2020-12-10 14:37:20', '2020-12-10 03:37:20', '2020-12-10 03:37:20'),
(5, 1, 'Create Invoices #INV-0050', 'Created invoices #INV-0050', 'rohman.nurafan13@gmail.com', '2020-12-10 15:45:36', '2020-12-10 04:45:36', '2020-12-10 04:45:36'),
(6, 1, 'Receive Payment $280 invoices INV-0050', 'Receive Payment $280 invoices INV-0050', 'rohman.nurafan13@gmail.com', '2020-12-10 15:45:49', '2020-12-10 04:45:49', '2020-12-10 04:45:49'),
(7, 1, 'Update Invoices #INV-0050', 'Update invoices #INV-0050', 'rohman.nurafan13@gmail.com', '2020-12-10 15:46:06', '2020-12-10 04:46:06', '2020-12-10 04:46:06'),
(8, 2, 'Update Invoices #INV-0049', 'Update invoices #INV-0049', 'sanjit@xprogroup.com.au', '2020-12-13 14:18:27', '2020-12-13 03:18:27', '2020-12-13 03:18:27'),
(9, 2, 'Update Invoices #INV-0050', 'Update invoices #INV-0050', 'sanjit@xprogroup.com.au', '2020-12-13 14:20:20', '2020-12-13 03:20:20', '2020-12-13 03:20:20'),
(10, 1, 'Create Invoices #INV-0051', 'Created invoices #INV-0051', 'rohman.nurafan13@gmail.com', '2020-12-14 02:09:11', '2020-12-13 15:09:11', '2020-12-13 15:09:11'),
(11, 1, 'Update Work Order #W-0001', 'Update Work Order #W-0001', 'rohman.nurafan13@gmail.com', '2020-12-14 02:20:59', '2020-12-13 15:20:59', '2020-12-13 15:20:59'),
(12, 1, 'Update Work Order #W-0001', 'Update Work Order #W-0001', 'rohman.nurafan13@gmail.com', '2020-12-14 02:21:10', '2020-12-13 15:21:10', '2020-12-13 15:21:10'),
(13, 1, 'Update Work Order #W-0001', 'Update Work Order #W-0001', 'rohman.nurafan13@gmail.com', '2020-12-14 12:50:40', '2020-12-14 01:50:40', '2020-12-14 01:50:40'),
(14, 1, 'Update Work Order #W-0001', 'Update Work Order #W-0001', 'rohman.nurafan13@gmail.com', '2020-12-14 12:50:54', '2020-12-14 01:50:54', '2020-12-14 01:50:54'),
(15, 3, 'Create Work Order #', 'Created Work Order #', 'sarwen@gmail.com', '2020-12-15 15:38:09', '2020-12-15 04:38:09', '2020-12-15 04:38:09'),
(16, 1, 'Update Work Order #W-0011', 'Update Work Order #W-0011', 'rohman.nurafan13@gmail.com', '2020-12-16 08:45:34', '2020-12-15 21:45:34', '2020-12-15 21:45:34'),
(17, 1, 'Update Work Order #W-0011', 'Update Work Order #W-0011', 'rohman.nurafan13@gmail.com', '2020-12-16 08:46:01', '2020-12-15 21:46:01', '2020-12-15 21:46:01'),
(18, 1, 'Create Invoices #INV-0052', 'Created invoices #INV-0052', 'rohman.nurafan13@gmail.com', '2020-12-18 02:18:04', '2020-12-17 15:18:04', '2020-12-17 15:18:04'),
(19, 1, 'Create Work Order #', 'Created Work Order #', 'rohman.nurafan13@gmail.com', '2020-12-18 02:19:21', '2020-12-17 15:19:21', '2020-12-17 15:19:21'),
(20, 2, 'Update Invoices #INV-0049', 'Update invoices #INV-0049', 'sanjit@xprogroup.com.au', '2020-12-18 14:02:31', '2020-12-18 03:02:31', '2020-12-18 03:02:31'),
(21, 2, 'Create Invoices #INV-0053', 'Created invoices #INV-0053', 'sanjit@xprogroup.com.au', '2020-12-19 02:48:40', '2020-12-18 15:48:40', '2020-12-18 15:48:40'),
(22, 2, ' invoices #INV-0051', ' invoices #INV-0051', 'sanjit@xprogroup.com.au', '2020-12-19 15:42:40', '2020-12-19 04:42:40', '2020-12-19 04:42:40'),
(23, 2, ' invoices #INV-0051', ' invoices #INV-0051', 'sanjit@xprogroup.com.au', '2020-12-19 15:42:43', '2020-12-19 04:42:43', '2020-12-19 04:42:43'),
(24, 2, ' invoices #INV-0052', ' invoices #INV-0052', 'sanjit@xprogroup.com.au', '2020-12-22 13:58:56', '2020-12-22 02:58:56', '2020-12-22 02:58:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_manage_purchase_order`
--

CREATE TABLE `x_manage_purchase_order` (
  `id` int(6) NOT NULL,
  `bill_number` varchar(20) NOT NULL DEFAULT '',
  `suplier` varchar(200) DEFAULT '',
  `curency` varchar(200) DEFAULT '',
  `amount` int(10) DEFAULT NULL,
  `bil_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `sub_total` int(10) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `x_manage_purchase_order`
--

INSERT INTO `x_manage_purchase_order` (`id`, `bill_number`, `suplier`, `curency`, `amount`, `bil_date`, `due_date`, `order_number`, `sub_total`, `notes`, `category`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BIL-0001', 'Rohman', 'IDR', 350, '2020-11-04 15:35:47', '2020-11-05 15:35:50', 1, NULL, NULL, 'Other', 'Draft', '2020-11-04 15:36:50', NULL, NULL),
(2, 'BIL-0002', 'Rohman', 'IDR', 650, '2020-11-04 15:35:47', '2020-11-05 15:35:50', 2, NULL, NULL, 'Other', 'Draft', '2020-11-04 15:36:50', NULL, NULL),
(3, 'BIL-0001', 'Rohman', 'AUD', 24, '2020-11-05 16:23:00', '2020-11-05 16:23:00', 1, 20, 'dgdgdgd', NULL, NULL, '2020-11-05 09:23:58', '2020-11-05 09:23:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_manage_purchase_order_items`
--

CREATE TABLE `x_manage_purchase_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manage_purchase_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_manage_purchase_order_setting`
--

CREATE TABLE `x_manage_purchase_order_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_digit` int(11) DEFAULT NULL,
  `number_prefix` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_number` int(11) DEFAULT NULL,
  `disable_invoice_item_edit` tinyint(1) NOT NULL DEFAULT 0,
  `disable_estimates_module` tinyint(1) NOT NULL DEFAULT 0,
  `enable_invoice_manual_status` tinyint(1) NOT NULL DEFAULT 0,
  `disable_shipping_option` tinyint(1) NOT NULL DEFAULT 0,
  `enable_maximum_discount` tinyint(1) NOT NULL DEFAULT 0,
  `disable_footer` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_manage_purchase_order_setting`
--

INSERT INTO `x_manage_purchase_order_setting` (`id`, `number_digit`, `number_prefix`, `next_number`, `disable_invoice_item_edit`, `disable_estimates_module`, `enable_invoice_manual_status`, `disable_shipping_option`, `enable_maximum_discount`, `disable_footer`, `created_at`, `updated_at`) VALUES
(2, 4, 'BIL-', 1, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_menu`
--

CREATE TABLE `x_menu` (
  `id` bigint(20) NOT NULL,
  `parent_code` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0:nonactive,  1:active-child-dropdown, 2:active-parent-dropdown, 3:single',
  `icon` varchar(255) DEFAULT NULL,
  `reorder` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_menu`
--

INSERT INTO `x_menu` (`id`, `parent_code`, `code`, `name`, `status`, `icon`, `reorder`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sales', 'sales', 'Sales', 2, 'icon-stats-growth', 1, '2020-02-15 04:37:20', '2020-11-17 02:08:59', NULL),
(3, 'sales', 'recurring_invoices', 'Recurring Invoices', 1, 'icon-stats-growth', 6, '2020-02-15 04:39:00', '2020-11-17 02:09:00', NULL),
(4, 'sales', 'client_payment', 'Client Payment', 1, 'icon-stats-growth', 7, '2020-02-15 04:39:48', '2020-11-17 02:09:00', NULL),
(5, 'work_orders-p', 'work_orders-p', 'Work Orders', 2, 'icon-calendar', 2, '2020-02-15 04:43:42', '2020-11-17 02:09:00', NULL),
(6, 'inventory', 'inventory', 'Inventory', 2, 'icon-server', 4, '2020-02-15 09:31:20', '2020-11-17 02:09:00', NULL),
(7, 'inventory', 'manage_purchase_orders', 'Manage Purchase Orders', 1, 'icon-server', 2, '2020-02-15 09:32:00', '2020-11-17 02:09:01', NULL),
(8, 'inventory', 'warehouses', 'Warehouses', 1, 'icon-server', 6, '2020-02-15 09:32:12', '2020-11-17 02:09:01', NULL),
(9, 'sales', 'credit_notes', 'Credit Notes', 1, 'icon-stats-growth', 4, '2020-02-16 04:10:28', '2020-11-17 02:09:01', NULL),
(10, 'sales', 'refund_receipts', 'Refund Receipts', 1, 'icon-stats-growth', 5, '2020-02-16 04:13:20', '2020-11-17 02:09:01', NULL),
(11, 'sales', 'manage_invoice', 'Manage Invoice', 1, 'icon-stats-growth', 1, '2020-02-16 05:05:52', '2020-11-17 02:09:02', NULL),
(12, 'sales', 'estimates', 'Estimates', 1, 'icon-stats-growth', 3, '2020-02-16 05:29:35', '2020-11-17 02:09:02', NULL),
(13, 'sales', 'create_invoice', 'Create Invoice', 1, 'icon-stats-growth', 2, '2020-02-16 05:35:46', '2020-11-17 02:09:02', NULL),
(17, 'clients', 'clients', 'Clients', 2, 'icon-user-tie', 3, '2020-02-17 08:25:33', '2020-11-17 02:09:02', NULL),
(18, 'clients', 'manage_client', 'Manage Client', 1, 'icon-user-tie', 1, '2020-02-17 08:46:34', '2020-11-17 02:09:03', NULL),
(19, 'work_orders-p', 'work_orders', 'Work Orders', 1, 'icon-calendar', 1, '2020-02-17 08:48:34', '2020-11-17 02:09:03', NULL),
(22, 'clients', 'add_new_client', 'Add New Client', 1, 'icon-user-tie', 2, '2020-02-21 20:42:32', '2020-11-17 02:09:03', NULL),
(23, 'clients', 'appointments', 'Appointments', 1, 'icon-user-tie', 4, '2020-02-21 20:44:30', '2020-11-17 02:09:04', NULL),
(24, 'clients', 'contact_list', 'Contact List', 1, 'icon-user-tie', 3, '2020-02-21 20:46:26', '2020-11-17 02:09:04', NULL),
(25, 'inventory', 'products_&_services', 'Product & Services', 1, 'icon-server', 1, '2020-02-21 20:56:01', '2020-11-17 02:09:04', NULL),
(26, 'inventory', 'purchase_refunds', 'Purchase Refunds', 1, 'icon-server', 3, '2020-02-21 20:56:51', '2020-11-17 02:09:04', NULL),
(27, 'inventory', 'manage_suppliers', 'Manage Suppliers', 1, 'icon-server', 4, '2020-02-21 20:58:00', '2020-11-17 02:09:05', NULL),
(28, 'inventory', 'client_price_group', 'Client Price Group', 1, 'icon-server', 5, '2020-02-21 21:02:22', '2020-11-17 02:09:05', NULL),
(29, 'work_orders-p', 'add_work_order', 'Add Work Order', 1, 'icon-calendar', 2, '2020-02-21 21:06:35', '2020-11-17 02:09:05', NULL),
(30, 'work_orders-p', 'work_order_settings', 'Work Order Settings', 1, 'icon-calendar', 3, '2020-02-21 21:07:15', '2020-11-17 02:09:05', NULL),
(31, 'job_management-p', 'job_management-p', 'Job Management', 2, 'icon-tree7', 6, '2020-02-21 21:12:20', '2020-12-14 03:16:23', NULL),
(32, 'job_management-p', 'projects', 'Projects', 1, 'icon-tree7', 2, '2020-02-21 21:15:58', '2020-12-14 03:16:16', NULL),
(33, 'job_management-p', 'time_tracking', 'Time Sheet', 1, 'icon-tree7', 3, '2020-02-21 21:16:37', '2020-12-14 03:16:18', NULL),
(34, 'job_management-p', 'staff_tracking', 'Staff Tracking', 1, 'icon-tree7', 4, '2020-02-21 21:17:24', '2020-12-14 03:16:21', NULL),
(35, 'finance', 'finance', 'Finance', 2, 'icon-coin-dollar', 6, '2020-02-21 21:19:40', '2020-11-17 02:09:07', NULL),
(36, 'finance', 'expenses', 'Expenses', 1, 'icon-coin-dollar', 1, '2020-02-21 21:21:40', '2020-11-17 02:09:07', NULL),
(37, 'finance', 'incomes', 'Incomes', 1, 'icon-coin-dollar', 2, '2020-02-21 21:22:26', '2020-11-17 02:09:07', NULL),
(38, 'finance', 'treasuries_bank_account', 'Treasuries & Bank Account', 1, 'icon-coin-dollar', 3, '2020-02-21 21:23:09', '2020-11-17 02:09:07', NULL),
(39, 'finance', 'journals', 'Journals', 1, 'icon-coin-dollar', 4, '2020-02-21 21:23:24', '2020-11-17 02:09:08', NULL),
(40, 'finance', 'chart_of_account', 'Chart Of Account', 1, 'icon-coin-dollar', 5, '2020-02-21 21:24:09', '2020-11-17 02:09:08', NULL),
(41, 'finance', 'assets', 'Assets', 1, 'icon-coin-dollar', 6, '2020-02-21 21:24:34', '2020-11-17 02:09:08', NULL),
(42, 'finance', 'cost_centers', 'Cost Centers', 1, 'icon-coin-dollar', 7, '2020-02-21 21:24:59', '2020-11-17 02:09:08', NULL),
(43, 'staff', 'staff', 'Staff', 2, 'icon-users4\r\n', 7, '2020-02-21 23:45:35', '2020-11-17 02:09:09', NULL),
(44, 'staff', 'manage_staff_members', 'Manage Staff Members', 1, 'icon-users4\r\n', 1, '2020-02-21 23:46:52', '2020-11-17 02:09:09', NULL),
(45, 'staff', 'add_staff_member', 'Add Staff Member', 1, 'icon-users4\r\n', 2, '2020-02-21 23:47:23', '2020-11-17 02:09:09', NULL),
(46, 'staff', 'manage_staff_roles', 'Manage Staff Roles', 1, 'icon-users4\r\n', 3, '2020-02-21 23:47:54', '2020-11-17 02:09:09', NULL),
(47, 'settings', 'settings', 'Settings', 2, 'icon-cogs', 8, '2020-02-22 00:02:16', '2020-11-17 02:09:10', NULL),
(62, 'profile', 'profile', 'Profile', 2, NULL, 1, '2020-03-16 07:48:09', '2020-11-17 02:09:10', NULL),
(63, 'reports', 'reports', 'Reports', 3, 'icon-file-presentation', 1, '2020-04-27 14:14:04', '2020-11-17 02:09:10', NULL),
(64, 'sales', 'test_menu', 'Test Menu 1', 1, 'icon-stats-growth', 7, '2020-05-06 10:58:14', '2020-11-17 02:09:11', '2020-05-24 00:43:29'),
(65, 'job_management-p', 'staff_tracking_settings', 'Staff Tracking Settings', 1, 'icon-tree7', 5, '2020-05-06 14:34:10', '2020-12-14 03:16:21', NULL),
(66, 'job_management-p', 'project_asset_list', 'Asset List', 1, 'icon-server', 1, '2020-10-16 06:54:07', '2020-12-14 03:16:15', NULL),
(67, 'staff', 'staff_profile', 'Staff Profile', 1, 'icon-users4\r\n', 4, '2020-11-11 08:40:49', '2020-11-17 02:09:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_menu_role`
--

CREATE TABLE `x_menu_role` (
  `id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_menu_role`
--

INSERT INTO `x_menu_role` (`id`, `menu_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2020-02-15 04:59:22', '2020-02-15 04:59:22', NULL),
(2, 3, 1, '2020-02-15 04:59:26', '2020-02-15 04:59:26', NULL),
(3, 4, 1, '2020-02-15 04:59:28', '2020-02-15 04:59:28', NULL),
(4, 5, 1, '2020-02-15 04:59:32', '2020-02-15 04:59:32', NULL),
(5, 6, 1, '2020-02-15 09:32:39', '2020-02-15 09:32:39', NULL),
(6, 7, 1, '2020-02-15 09:32:46', '2020-02-15 09:32:46', NULL),
(7, 8, 1, '2020-02-15 09:32:54', '2020-02-15 09:32:54', NULL),
(8, 10, 1, '2020-02-16 04:15:11', '2020-02-16 04:15:11', NULL),
(10, 12, 1, '2020-02-16 05:30:40', '2020-02-16 05:30:40', NULL),
(11, 11, 1, '2020-02-16 05:31:46', '2020-02-16 05:33:25', NULL),
(12, 13, 1, '2020-02-16 05:36:06', '2020-02-16 05:36:06', NULL),
(13, 9, 1, '2020-02-16 05:45:17', '2020-02-16 05:45:17', NULL),
(14, 17, 1, '2020-02-17 08:44:44', '2020-02-17 08:44:57', NULL),
(15, 18, 1, '2020-02-17 08:46:45', '2020-02-17 08:47:17', NULL),
(27, 19, 1, '2020-02-15 04:59:32', '2020-02-15 04:59:32', NULL),
(28, 22, 1, '2020-02-21 20:42:53', '2020-02-21 20:42:53', NULL),
(29, 23, 1, '2020-02-21 20:44:40', '2020-02-21 20:44:40', NULL),
(30, 24, 1, '2020-02-21 20:46:39', '2020-02-21 20:46:48', NULL),
(31, 25, 1, '2020-02-21 20:56:15', '2020-02-21 20:56:15', NULL),
(32, 26, 1, '2020-02-21 21:02:56', '2020-02-21 21:02:56', NULL),
(33, 27, 1, '2020-02-21 21:03:02', '2020-02-21 21:03:02', NULL),
(34, 28, 1, '2020-02-21 21:03:11', '2020-02-21 21:03:11', NULL),
(35, 29, 1, '2020-02-21 21:07:58', '2020-02-21 21:07:58', NULL),
(36, 30, 1, '2020-02-21 21:08:02', '2020-05-24 00:32:21', '2020-05-24 00:32:21'),
(37, 31, 1, '2020-02-21 21:18:04', '2020-02-21 21:18:04', NULL),
(38, 32, 1, '2020-02-21 21:18:10', '2020-02-21 21:18:10', NULL),
(39, 33, 1, '2020-02-21 21:18:13', '2020-02-21 21:18:13', NULL),
(40, 34, 1, '2020-02-21 21:18:22', '2020-02-21 21:18:22', NULL),
(41, 35, 1, '2020-02-21 21:25:31', '2020-02-21 21:25:31', NULL),
(42, 36, 1, '2020-02-21 21:25:36', '2020-02-21 21:25:36', NULL),
(43, 37, 1, '2020-02-21 21:25:40', '2020-02-21 21:25:40', NULL),
(44, 38, 1, '2020-02-21 21:25:44', '2020-02-21 21:25:44', NULL),
(45, 39, 1, '2020-02-21 21:25:49', '2020-02-21 21:25:49', NULL),
(46, 40, 1, '2020-02-21 21:25:54', '2020-02-21 21:25:54', NULL),
(49, 41, 1, '2020-02-21 21:26:08', '2020-02-21 21:26:08', NULL),
(50, 42, 1, '2020-02-21 21:26:13', '2020-02-21 21:26:13', NULL),
(51, 43, 1, '2020-02-21 23:48:11', '2020-02-21 23:48:11', NULL),
(52, 44, 1, '2020-02-21 23:48:19', '2020-02-21 23:48:19', NULL),
(53, 45, 1, '2020-02-21 23:48:28', '2020-02-21 23:48:28', NULL),
(54, 46, 1, '2020-02-21 23:48:33', '2020-02-21 23:48:33', NULL),
(55, 47, 1, '2020-02-22 00:13:57', '2020-02-22 00:13:57', NULL),
(78, 63, 1, '2020-04-27 14:14:59', '2020-04-27 14:14:59', NULL),
(79, 64, 1, '2020-05-06 10:59:10', '2020-05-06 10:59:10', NULL),
(80, 65, 1, '2020-05-06 14:36:59', '2020-05-06 14:36:59', NULL),
(206, 63, 31, '2020-07-15 21:34:31', '2020-07-15 21:34:31', NULL),
(207, 1, 31, '2020-07-15 21:34:31', '2020-07-15 21:34:31', NULL),
(208, 11, 31, '2020-07-15 21:34:31', '2020-07-15 21:34:31', NULL),
(209, 13, 31, '2020-07-15 21:34:31', '2020-07-15 21:34:31', NULL),
(210, 5, 31, '2020-07-15 21:34:31', '2020-07-15 21:34:31', NULL),
(211, 19, 31, '2020-07-15 21:34:31', '2020-07-15 21:34:31', NULL),
(212, 1, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(213, 11, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(214, 13, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(215, 12, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(216, 9, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(217, 10, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(218, 3, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(219, 4, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(220, 5, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(221, 19, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(222, 29, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(223, 17, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(224, 18, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(225, 22, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(226, 24, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(227, 23, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(228, 6, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(229, 25, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(230, 7, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(231, 26, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(232, 27, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(233, 28, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(234, 8, 3, '2020-07-20 17:04:59', '2020-07-20 17:04:59', NULL),
(235, 66, 1, '2020-02-21 21:03:11', '2020-02-21 21:03:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_message`
--

CREATE TABLE `x_message` (
  `id` int(6) NOT NULL,
  `from_user` varchar(10) NOT NULL,
  `to_user` varchar(20) DEFAULT '',
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `view` int(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_message`
--

INSERT INTO `x_message` (`id`, `from_user`, `to_user`, `message`, `created_at`, `updated_at`, `view`) VALUES
(1, '2', '1', 'saya', '2020-12-21 10:33:23', '2020-12-21 10:33:23', NULL),
(2, '1', '2', 'Oke mas', '2020-12-21 10:34:05', '2020-12-21 10:34:05', NULL),
(3, '2', '1', 'saya', '2020-12-21 10:34:45', '2020-12-21 10:34:45', NULL),
(4, '1', '2', 'Oke mas', '2020-12-21 10:34:51', '2020-12-21 10:34:51', NULL),
(5, '2', '1', 'saya', '2020-12-21 10:34:54', '2020-12-21 10:34:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_new_invoice`
--

CREATE TABLE `x_new_invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `inv_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` datetime NOT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes_raw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `subtotal` double NOT NULL DEFAULT 0,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `paid_date` date DEFAULT NULL,
  `tagging` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remaining_amount` int(11) DEFAULT 0,
  `id_tax` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_new_invoice`
--

INSERT INTO `x_new_invoice` (`id`, `product_id`, `client_id`, `inv_number`, `invoice_date`, `due_date`, `payment_terms`, `notes`, `notes_raw`, `qty`, `amount`, `subtotal`, `total`, `status`, `paid_date`, `tagging`, `created_at`, `updated_at`, `remaining_amount`, `id_tax`, `user_id`) VALUES
(49, 0, 64, 'INV-0049', '2020-12-11', '2020-12-11 01:12:00', '1', '', NULL, 0, 0, 0, '120000', 6, NULL, '[\"Batam\",\"Batam\"]', '2020-12-10 03:13:23', '2020-12-18 03:02:31', 0, NULL, 2),
(50, 0, 64, 'INV-0050', '2020-12-10', '2020-12-10 22:45:00', '1', 'fgg', NULL, 0, 0, 0, '8280', 7, NULL, '[\"Burwood PS\"]', '2020-12-10 04:45:36', '2020-12-13 03:20:20', 8000, NULL, 1),
(51, 0, 64, 'INV-0051', '2020-12-14', '2020-12-15 09:08:00', '1', 'sds', NULL, 0, 0, 0, '60', 4, NULL, '[\"Hurstville westfield\"]', '2020-12-13 15:09:11', '2020-12-19 04:42:43', 60, NULL, 1),
(52, 0, 64, 'INV-0052', '2020-12-18', '2020-12-19 09:17:00', '1', 'Tes Pengurangan Stock', NULL, 0, 0, 0, '24', 7, NULL, '[]', '2020-12-17 15:18:04', '2020-12-22 02:58:56', 24, NULL, 1),
(53, 0, 64, 'INV-0053', '2020-12-19', '2020-12-19 13:48:00', '1', '', NULL, 0, 0, 0, '42', 1, NULL, '[\"Hurstville westfield\"]', '2020-12-18 15:48:40', '2020-12-18 15:48:40', 42, NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_product_service`
--

CREATE TABLE `x_product_service` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_product_service`
--

INSERT INTO `x_product_service` (`id`, `name`, `description`, `stock`, `price`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tes', 'tes', 1, 20, 1, '2020-07-09 19:33:04', '2020-12-17 15:18:04', NULL),
(2, 'tes', 'barang 1', 5, 50, 0, '2020-07-09 19:59:06', NULL, NULL),
(3, 'Office', 'Table Office', 6, 50, 1, '2020-07-09 20:01:47', '2020-12-17 15:19:21', NULL),
(4, 'Dsf', 'Ygd', 10, 34, 0, '2020-07-21 06:40:25', '2020-09-03 22:03:50', NULL),
(5, 'Dsf', 'Ygd', 11, 34, 0, '2020-07-21 06:40:26', '2020-09-03 22:03:36', NULL),
(6, 'Pengaman Motor', 'amankan motor kamu', 10, 10000, 3, '2020-09-14 00:42:58', '2020-09-14 07:25:07', '0000-00-00 00:00:00'),
(7, 'Dexacon', 'claim', 10, 1000, 1, '2020-09-15 04:16:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Setaples', 'ini setaples', 4, 35, 1, '2020-09-16 00:30:52', '2020-12-18 15:48:40', '0000-00-00 00:00:00'),
(9, 'Rohman', 'Rohman Nurafan', 500, 501, 0, '2020-10-31 03:34:17', '2020-10-31 04:08:33', '0000-00-00 00:00:00'),
(10, 'dfds', 'fgfgf', 300, 45454, 1, '2020-11-03 01:53:07', '2020-12-17 15:51:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_projects`
--

CREATE TABLE `x_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_contact` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`site_contact`)),
  `status_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_update_user` datetime DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagging` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tagging`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_projects`
--

INSERT INTO `x_projects` (`id`, `project_name`, `client_id`, `company_name`, `address`, `site_contact`, `status_information`, `last_update_user`, `icon`, `tagging`, `created_at`, `updated_at`) VALUES
(2, 'Hurstville westfield', 14, 'XPRO', NULL, '[{\"name\":\"Rohman Nurafan Putra Pratama\",\"email\":\"rohman.nurafan13@gmail.com\",\"phone\":\"081267067094\",\"address\":\"1\"}]', '4', '2020-10-27 07:37:26', NULL, '[\"Hurstville westfield\"]', '2020-10-22 11:33:21', '0000-00-00 00:00:00'),
(6, 'Taree PS', 14, 'XPRO', NULL, '[{\"name\":\"Rizal Hidayat\",\"email\":\"rizalhidayat180499@gmail.com\",\"phone\":\"081515292117\",\"address\":\"DSN Talok rt 02 rw 01\"}]', '2', NULL, NULL, '[\"Taree PS\"]', '2020-10-22 21:45:08', '2020-10-27 21:33:48'),
(7, 'Burwood PS', 62, 'XPRO', NULL, '[{\"name\":\"xzx\",\"email\":\"sanjitsatishan55@gmail.com\",\"phone\":\"0411086022\",\"address\":\"sa\"}]', '3', '2020-10-28 08:56:28', NULL, '[\"Burwood PS\"]', '2020-10-25 22:22:18', '2020-10-27 21:56:46'),
(8, 'gardiner aven', 64, 'XPRO', NULL, '[]', '2', NULL, NULL, '[\"gardiner aven\"]', '2020-12-12 17:34:16', '2020-12-12 17:34:16'),
(11, 'Batam', 14, 'XPRO', NULL, '[{\"name\":\"x_expenses\",\"email\":\"sanjitsatishan55@gmail.com\",\"phone\":\"0411086022\",\"address\":\"gardiner aven\"}]', '2', NULL, NULL, '[\"Batam\"]', '2020-12-13 02:20:55', '2020-12-13 16:14:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_projects_asset`
--

CREATE TABLE `x_projects_asset` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `company` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `last_update_user` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_projects_asset`
--

INSERT INTO `x_projects_asset` (`id`, `project_name`, `company`, `last_update_user`, `created_at`, `updated_at`, `status`) VALUES
(5, 'Taree PS', 'XPRO2', 'Sarwennen', '2020-10-26 04:00:34', '2020-10-27 02:33:14', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_projects_asset_name`
--

CREATE TABLE `x_projects_asset_name` (
  `id` int(6) UNSIGNED NOT NULL,
  `project_name_id` int(6) NOT NULL,
  `asset_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type_template` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_update_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_projects_asset_name`
--

INSERT INTO `x_projects_asset_name` (`id`, `project_name_id`, `asset_name`, `type_template`, `created_date`, `updated_at`, `last_update_user`) VALUES
(1, 2, 'Project 1', 'Network', '2020-10-25 22:44:31', NULL, ''),
(2, 2, 'Project 2', 'Recording', '2020-10-24 22:44:34', NULL, ''),
(3, 1, 'Project 1', 'Network', '2020-10-23 22:44:38', NULL, ''),
(8, 1, 'Tes 1', 'Recording', '2020-10-22 22:44:41', '2020-10-27 14:04:43', 'Sarwen'),
(9, 1, 'Tes 2', 'Camera', '2020-10-22 22:44:41', '2020-10-27 14:04:43', 'Sarwen'),
(10, 1, 'Tes 3', 'Server', '2020-10-22 22:44:41', '2020-10-27 14:04:43', 'Sarwen'),
(11, 5, 'CCTV1', 'Network', '2020-10-27 22:45:19', '2020-10-28 13:02:05', 'Sarwennen'),
(12, 11, 'CCTV1', 'Network', '2020-10-27 22:45:47', '2020-10-28 13:02:36', 'Sarwennen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_projects_asset_name_list`
--

CREATE TABLE `x_projects_asset_name_list` (
  `id` int(6) UNSIGNED NOT NULL,
  `project_name_list_id` int(6) NOT NULL,
  `data_array` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_projects_asset_name_list`
--

INSERT INTO `x_projects_asset_name_list` (`id`, `project_name_list_id`, `data_array`, `create_date`) VALUES
(1, 3, '[{name:\"Title 1\", \"data\":\"Record 1\", name:\"Title 2\", \"data\":\"Record 2\", name:\"Title 3\", \"data\":\"Record 3\"}]', '2020-10-23 22:36:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_projects_document`
--

CREATE TABLE `x_projects_document` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagging` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tagging`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_projects_document`
--

INSERT INTO `x_projects_document` (`id`, `project_id`, `original_name`, `name`, `url_file`, `mime_type`, `path_file`, `size_file`, `tagging`, `created_at`, `updated_at`) VALUES
(2, 6, 'transaction.png', '3-1603703608.png', 'https://xpros.s3-ap-southeast-2.amazonaws.com/documents/3-1603703608.png', 'image/png', '/documents/3-1603703608.png', '21', '[\"Taree\",\"PS\"]', '2020-10-25 22:13:28', '2020-10-25 22:13:28'),
(4, 7, 'SLIDE_3.jpg', '3-1603876778.jpg', '/documents/3-1603876778.jpg', 'image/jpeg', '/documents/3-1603876778.jpg', '810', '[\"Burwood\",\"PS\"]', '2020-10-27 22:19:39', '2020-10-27 22:19:39'),
(5, 7, 'Harvest Moon Back to Nature Bahasa Indonesia_Lalalinds.zip', '3-1603876801.zip', '/documents/3-1603876801.zip', 'application/zip', '/documents/3-1603876801.zip', '33254', '[\"Burwood\",\"PS\"]', '2020-10-27 22:20:10', '2020-10-27 22:20:10'),
(6, 7, '1.pdf', '3-1607225048.pdf', '/documents/3-1607225048.pdf', 'application/pdf', '/documents/3-1607225048.pdf', '33', '[\"Burwood\",\"PS\"]', '2020-12-05 16:24:11', '2020-12-05 16:24:11'),
(7, NULL, '1.pdf', '3-1607227971.pdf', '/work_orders/3-1607227971.pdf', 'application/pdf', '/work_orders/3-1607227971.pdf', '33', '[\"\"]', '2020-12-05 17:12:52', '2020-12-05 17:12:52'),
(8, NULL, '1.pdf', '3-1607228374.pdf', '/work_orders/3-1607228374.pdf', 'application/pdf', '/work_orders/3-1607228374.pdf', '33', '[\"\"]', '2020-12-05 17:19:34', '2020-12-05 17:19:34'),
(9, 11, 'Screen Shot 2020-12-17 at 15.40.54.png', '3-1608259973.png', 'https://xpros.s3-ap-southeast-2.amazonaws.com/documents/3-1608259973.png', 'image/png', '/documents/3-1608259973.png', '17', '[\"Batam\"]', '2020-12-17 15:52:53', '2020-12-17 15:52:53'),
(10, 11, 'CCTV.jpg', '2-1608392497.jpg', '/documents/2-1608392497.jpg', 'image/jpeg', '/documents/2-1608392497.jpg', '1150', '[\"Batam\"]', '2020-12-19 04:41:37', '2020-12-19 04:41:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_rc`
--

CREATE TABLE `x_rc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant` varchar(100) NOT NULL,
  `code` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0:nonactive | 1:active',
  `notes` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_rc`
--

INSERT INTO `x_rc` (`id`, `merchant`, `code`, `message`, `status`, `notes`) VALUES
(1, 'XPRO_ANDROID', 0, 'Success Response', 1, NULL),
(2, 'XPRO_ANDROID', 99, 'Invalid Request', 1, NULL),
(3, 'DEFAULT', 999, 'Invalid RC', 1, NULL),
(4, 'XPRO_ANDROID', 98, 'Invalid Signature', 1, NULL),
(5, 'XPRO_ANDROID', 97, 'Authentication Failed', 1, NULL),
(6, 'XPRO_ANDROID', 96, 'Invalid Token', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_receive_payment`
--

CREATE TABLE `x_receive_payment` (
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `type_account` int(11) DEFAULT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_receive_payment`
--

INSERT INTO `x_receive_payment` (`user_id`, `amount`, `type_account`, `invoice_id`, `received_at`, `note`, `created_at`, `updated_at`) VALUES
(3, 10, 1, '33', '2020-11-03 00:35:00', 'hai', '2020-11-01 02:35:13', '2020-11-01 02:35:13'),
(3, 3000, 1, '33', '2020-11-04 16:34:00', 'gas', '2020-11-02 18:34:29', '2020-11-02 18:34:29'),
(3, 1375, 1, '34', '2020-11-04 19:04:00', 'paid 4/11/2020', '2020-11-03 21:04:54', '2020-11-03 21:04:54'),
(3, 150, 1, '37', '2020-11-13 19:35:00', 'over paid', '2020-11-12 21:35:36', '2020-11-12 21:35:36'),
(3, 20, 1, '40', '2020-11-26 09:13:00', 'hai', '2020-11-24 15:14:13', '2020-11-24 15:14:13'),
(3, 249977, 1, '40', '2020-11-26 09:14:00', 'jos', '2020-11-24 15:15:04', '2020-11-24 15:15:04'),
(2, 200, 1, '49', '2020-12-11 01:13:00', NULL, '2020-12-10 03:13:40', '2020-12-10 03:13:40'),
(2, 1200, 1, '49', '2020-12-11 01:29:00', '11', '2020-12-10 03:29:44', '2020-12-10 03:29:44'),
(1, 280, 1, '50', '2020-12-10 22:45:00', 'hhh', '2020-12-10 04:45:49', '2020-12-10 04:45:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_role`
--

CREATE TABLE `x_role` (
  `id` bigint(20) NOT NULL,
  `name_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_role`
--

INSERT INTO `x_role` (`id`, `name_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2020-02-15 04:58:53', '2020-12-01 14:51:46', NULL),
(3, 'Staff', '2020-05-08 03:54:55', '2020-07-28 14:16:29', NULL),
(31, 'Manager', '2020-07-15 21:03:13', '2020-12-01 14:52:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_smtp_setting`
--

CREATE TABLE `x_smtp_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_security` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_smtp_setting`
--

INSERT INTO `x_smtp_setting` (`id`, `user_id`, `sender_email`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `smtp_security`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'support@zuwinda.com', 'email-smtp.ap-southeast-1.amazonaws.com', '587', '', '', 'tls', 0, '2020-09-17 21:07:11', '2020-09-22 19:43:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_staff`
--

CREATE TABLE `x_staff` (
  `id` bigint(20) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `home_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `notes` text DEFAULT NULL,
  `role_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0:not active | 1:active',
  `rate_per_hour` decimal(10,0) NOT NULL DEFAULT 0,
  `rate_currency` varchar(255) NOT NULL DEFAULT 'AUD',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_staff`
--

INSERT INTO `x_staff` (`id`, `photo`, `name`, `email`, `last_login`, `home_phone`, `mobile_phone`, `full_address`, `city`, `state`, `postal_code`, `country`, `notes`, `role_id`, `status`, `rate_per_hour`, `rate_currency`, `updated_at`) VALUES
(1, '2.png', 'Rohman Nurafan Nurafan Putra Pratama', 'rohman.nurafan13@gmail.com', '2020-07-14 11:28:22', '081267067094', '81267067092', 'Batam', 'Kota Batam', 'Kepulauan Riau', '29438', 'Indonesia', '', 3, 1, '35', 'AUD Australian Dollar', '0000-00-00 00:00:00'),
(2, '2_1607184796.jpg', 'sanjiit satishan', 'sanjit@xprogroup.com.au', '2020-11-30 13:27:29', '0411086022', '0411086022', 'gardiner avenue', 'banksia', 'New South Wales', '2216', 'Australia', '', 1, 1, '65', 'AUD Australian Dollar', '0000-00-00 00:00:00'),
(3, '1.png', 'Sarwen', 'sarwen@gmail.com', '2020-12-01 14:50:03', '', '', '', '', 'Sydne', '123456', 'Australia', '', 1, 1, '45', 'AUD Australian Dollar', '0000-00-00 00:00:00'),
(4, '1.png', 'Marfino', 'marfinohamzah455@gmail.com', '2020-12-22 14:01:52', '0', '0', '-', '-', '-', '0', 'Indonesia', '-', 1, 1, '10', 'AUD Australian Dollar', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_staff_old`
--

CREATE TABLE `x_staff_old` (
  `id` bigint(20) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `home_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `notes` text DEFAULT NULL,
  `role_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0:not active | 1:active',
  `rate_per_hour` decimal(10,0) NOT NULL DEFAULT 0,
  `rate_currency` varchar(255) NOT NULL DEFAULT 'AUD',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_staff_old`
--

INSERT INTO `x_staff_old` (`id`, `photo`, `name`, `email`, `last_login`, `home_phone`, `mobile_phone`, `full_address`, `city`, `state`, `postal_code`, `country`, `notes`, `role_id`, `status`, `rate_per_hour`, `rate_currency`, `updated_at`) VALUES
(1, '2.png', 'ikhsanul', 'ikhsan@gmail.com', '2020-05-08 03:25:58', '081383341293', '0123', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '15147', 'Indonesia', NULL, 1, 0, '90', 'AUD', '2020-12-01 14:59:59'),
(2, '2.png', 'ikhsanul', 'tessLogin@gmail.com', '2020-07-14 11:28:22', '081383341293', '081383341293', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '15147', 'Indonesia', NULL, 3, 0, '90', 'AUD Australian Dollar', NULL),
(44, '2.png', 'sanjiit satishan', 'sanjitsatishan55@gmail.com', '2020-06-28 21:11:57', '0411086022', '0411086022', '4 gardiner avenue', 'banksia', 'nsw', '2216', 'Indonesia', NULL, 31, 0, '45', 'AUD Australian Dollar', NULL),
(45, '2.png', 'none', 'none', '2020-06-30 12:58:24', 'none', 'none', 'none', 'none', 'none', 'none', 'Indonesia', 'none', 1, 0, '0', 'AUD', '2020-11-13 14:52:56'),
(54, '2.png', 'sanjiit satishan', 'sanjitsatishan17@gmail.com', '2020-07-20 16:58:03', '0411086022', '0411086022', '4 gardiner avenue', 'banksia', 'nsw', '2216', 'Indonesia', NULL, 1, 0, '125', 'AUD Australian Dollar', '2020-12-01 15:05:55'),
(55, '2.png', 'sa', 'test1@gmail.com', '2020-07-20 16:59:11', '0411086022', '0411086022', '4 gardiner avenue', 'banksia', 'nsw', '2216', 'Indonesia', 'sa', 3, 1, '35', 'AUD Australian Dollar', NULL),
(56, '2.png', 'tes', 'ikhsan11@gmail.com', '2020-07-20 17:00:38', '081383341293', '081383341293', 'JL.PULO INDAH ASRI 2', 'Kota Jakarta Barat', 'Prov. D.K.I. Jakarta', '15147', 'Indonesia', 'ad', 3, 0, '21', 'AUD Australian Dollar', '2020-11-12 06:41:14'),
(57, '2.png', 'Sahtia', 'sahtiamurti@gmail.com', '2020-07-25 01:30:28', 'Tes', '085939753687', 'metro permata 1 blok j5 no.30', 'tangerang', 'Banten', '15157', 'Indonesia', 'testing', 3, 0, '120', 'AUD Australian Dollar', '2020-11-30 13:19:47'),
(58, '2.png', 'Sahtia', 'sahtiatest@gmail.com', '2020-07-25 01:30:47', 'Tes', '085939753687', 'metro permata 1 blok j5 no.30', 'tangerang', 'Banten', '15157', 'Indonesia', 'testing', 3, 0, '120', 'AUD Australian Dollar', '2020-11-30 13:19:50'),
(59, NULL, 'sanjiit satishan', 'sanjit@xprogroup.com.au', '2020-11-30 13:27:29', '0411086022', '0411086022', 'gardiner avenue', 'banksia', 'New South Wales', '2216', 'Australia', NULL, 1, 1, '35', 'AUD Australian Dollar', NULL),
(60, '1.png', 'Sarwen', 'sarwen@gmail.com', '2020-12-01 14:50:03', '', '', '', '', 'Sydne', '123456', 'Australia', NULL, 1, 1, '50', 'AUD Australian Dollar', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_staff_tracking`
--

CREATE TABLE `x_staff_tracking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `longtitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_staff_tracking`
--

INSERT INTO `x_staff_tracking` (`id`, `staff_id`, `longtitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '131.044', '-25.363', '1', '2020-11-19 22:19:12', '2020-11-19 22:19:12'),
(2, 3, '135.1833663', '-26.192510', '1', '2020-11-19 22:19:12', '2020-11-19 22:19:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_supplier`
--

CREATE TABLE `x_supplier` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `postal_code` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `currency` varchar(200) NOT NULL,
  `opening_balance` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `business_name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_supplier`
--

INSERT INTO `x_supplier` (`id`, `first_name`, `last_name`, `telephone`, `mobile`, `address1`, `address2`, `city`, `state`, `postal_code`, `country`, `currency`, `opening_balance`, `email`, `notes`, `business_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ikhsanul', 'fahmi', '02154318575', '081383341293', 'jl pulo indah asri 2', 'jl pulo indah asri 3', 'jakarta barat', 'dki jakarta', '1922', 'Indonesia', 'AUD', 24, 'ikhsan@gmail.com', 'tes', 'tess', 'Active', '2020-09-06 21:00:59', NULL, NULL),
(2, 'Rohman', 'Nurafan', '081267067094', '081267067094', 'Batam', 'Batam', 'Kepulauan Riau', 'Batam', '290433', 'Indonesia', 'IDR', 20, 'rohman.nurafan13@gmail.com', 'tes', 'tes', 'Active', '2020-11-04 08:09:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_tax`
--

CREATE TABLE `x_tax` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0:nonactive|1:active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_tax`
--

INSERT INTO `x_tax` (`id`, `name`, `value`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GST', '10', NULL, 1, NULL, NULL),
(2, 'PPN', '20', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_timesheet`
--

CREATE TABLE `x_timesheet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `workorder_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_input` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_start` datetime DEFAULT NULL,
  `time_end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_timesheet`
--

INSERT INTO `x_timesheet` (`id`, `user_id`, `workorder_id`, `name`, `description`, `color_input`, `status`, `time_start`, `time_end`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 'Sarwen', 'Description ', '#26A69A', '1', '2020-11-27 11:20:00', '2020-11-27 15:20:00', '2020-11-26 17:01:55', '2020-11-26 17:01:55', NULL),
(2, 1, 1, 'Rohman Nurafan', 'Description ', '#26A69A', '1', '2020-11-27 10:30:00', '2020-11-27 12:00:00', '2020-11-26 20:55:08', '2020-11-26 20:55:08', NULL),
(3, 1, 1, 'Rohman Nurafan', 'Description ', '#26A69A', '1', '2020-11-29 07:10:00', '2020-11-29 11:10:00', '2020-11-28 15:10:13', '2020-11-28 15:10:13', NULL),
(4, 1, 1, 'Rohman Nurafan', 'Description ', '#26A69A', '1', '2020-11-29 10:30:00', '2020-11-29 12:30:00', '2020-11-26 20:55:08', '2020-11-26 20:55:08', NULL),
(5, 1, 1, 'Rohman Nurafan', 'Description ', '#26A69A', '1', '2020-11-29 12:30:00', '2020-11-29 14:30:00', '2020-11-26 20:55:08', '2020-11-26 20:55:08', NULL),
(6, 1, 1, 'Rohman Nurafan', 'Description ', '#26A69A', '1', '2020-11-29 14:30:00', '2020-11-29 20:00:00', '2020-11-26 20:55:08', '2020-11-26 20:55:08', NULL),
(7, 2, 1, 'sanjiit satishan', NULL, '#0a6ebd', '1', '2020-12-11 14:30:00', '2020-12-11 19:40:00', '2020-12-10 03:37:20', '2020-12-10 03:37:20', NULL),
(8, 1, 1, 'Rohman Nurafan Nurafan Putra Pratama', NULL, '#0a6ebd', '1', '2020-12-11 14:30:00', '2020-12-11 19:40:00', '2020-12-13 15:20:59', NULL, NULL),
(9, 1, 1, 'Rohman Nurafan Nurafan Putra Pratama', NULL, '#0a6ebd', '1', '2020-12-11 14:30:00', '2020-12-11 19:40:00', '2020-12-13 15:21:10', NULL, NULL),
(10, 1, 1, 'Rohman Nurafan Nurafan Putra Pratama', NULL, '#0a6ebd', '1', '2020-12-11 14:30:00', '2020-12-11 19:40:00', '2020-12-14 01:50:40', NULL, NULL),
(11, 1, 1, 'Rohman Nurafan Nurafan Putra Pratama', NULL, '#0a6ebd', '1', '2020-12-11 14:30:00', '2020-12-11 19:40:00', '2020-12-14 01:50:54', NULL, NULL),
(12, 1, 4, 'Rohman Nurafan Nurafan Putra Pratama', NULL, '#0a6ebd', '1', '2020-12-15 10:37:00', '2020-12-15 14:37:00', '2020-12-15 21:45:34', '2020-12-15 21:47:10', NULL),
(13, 1, 4, 'Rohman Nurafan Nurafan Putra Pratama', NULL, '#0a6ebd', '1', '2020-12-15 10:37:00', '2020-12-15 14:37:00', '2020-12-15 21:46:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_timesheet_settings`
--

CREATE TABLE `x_timesheet_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `enable_penalty` tinyint(1) NOT NULL DEFAULT 1,
  `normal_hours` int(11) DEFAULT NULL,
  `penalty_rates_1` double(8,2) DEFAULT NULL,
  `max_hours_penalty_1` int(11) NOT NULL DEFAULT 2,
  `penalty_rates_2` double(8,2) DEFAULT NULL,
  `max_hours_penalty_2` int(11) NOT NULL DEFAULT 4,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_timesheet_settings`
--

INSERT INTO `x_timesheet_settings` (`id`, `user_id`, `enable_penalty`, `normal_hours`, `penalty_rates_1`, `max_hours_penalty_1`, `penalty_rates_2`, `max_hours_penalty_2`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 8, 1.50, 2, 2.00, 0, '2020-11-15 19:47:28', '2020-12-15 04:33:14'),
(2, 2, 1, 8, 1.50, 2, 2.00, 4, '2020-12-17 15:37:57', '2020-12-17 15:37:57'),
(3, 4, 1, 8, 1.50, 2, 2.00, 4, '2020-12-25 07:30:07', '2020-12-25 07:30:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_users_login`
--

CREATE TABLE `x_users_login` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_users_login`
--

INSERT INTO `x_users_login` (`id`, `username`, `password`, `token`, `role_id`, `created_at`, `updated_at`, `deleted_at`, `verification_token`) VALUES
(1, 'rohman.nurafan13@gmail.com', '$2y$10$8e0uWGxWO4xFZBdjivwLwO0yk4U.vD5cEPYs59mUv/au/K9eHBUdi', '', 1, '2020-11-16 15:58:03', '2020-12-10 15:44:43', '0000-00-00 00:00:00', ''),
(2, 'sanjit@xprogroup.com.au', '$2y$10$aXXOpCZQ6wMqMsYrITVdpOpAzQGtFMHmj6SbrRabQXNh2sbn3H.K2', '', 1, '2020-11-30 13:27:29', '2020-11-30 13:27:29', '0000-00-00 00:00:00', ''),
(3, 'sarwen@gmail.com', '$2y$10$INlm2EB.v08PbKG9siI3OesvFIIZNjugM4XYl5VA7Gr9Wj6Ln0W76', '$2y$10$XAStvcpHLI.EbL0QKbTbQOA/6EVyp8wvt5rEZA1ZJYA.OyI9GR2N6', 1, '2020-02-16 04:30:17', '2020-12-21 03:00:57', '0000-00-00 00:00:00', ''),
(4, 'marfinohamzah455@gmail.com', '$2y$10$dLlOqMULBxE98mL6a61N3uYw72/.QKGdydQwQ52jxIP5HLQrFabXy', NULL, 1, '2020-12-22 14:01:52', '2020-12-22 14:01:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_users_login_old`
--

CREATE TABLE `x_users_login_old` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_users_login_old`
--

INSERT INTO `x_users_login_old` (`id`, `username`, `password`, `token`, `role_id`, `created_at`, `updated_at`, `deleted_at`, `verification_token`) VALUES
(2, 'sahtiamurti@gmail.com', '$2y$10$7v1oX04lI9UWa/zD/uFwd.GbEtISrPpwsOQWNBXpFjcABBOjeRZF6', NULL, 1, '2020-02-15 06:08:48', '2020-11-27 07:33:36', NULL, NULL),
(3, 'sarwen@gmail.com', '$2y$10$HRE6p7S.L6hQ/HQCN.vSDOsF5uMBXesK4l.IUDbrAqh2qjVx4sORi', '$2y$10$XAStvcpHLI.EbL0QKbTbQOA/6EVyp8wvt5rEZA1ZJYA.OyI9GR2N6', 1, '2020-02-16 04:30:17', '2020-11-27 07:33:36', NULL, NULL),
(8, 'ikhsan@gmail.com', '$2y$10$ekGdduVBtRhP3X1KIevtFeHF1behO6iPEk1.WTDvuSFtFwlVHyYxe', '$2y$10$cdXHqpGPtsdT.uToyhYnUeG/07c9dLNnwe1DCwzRvPFlEq72kG7cW', 1, '2020-04-22 05:23:31', '2020-11-27 07:33:36', NULL, NULL),
(15, 'sanjitsatishan17@gmail.com', '$2y$10$1NzeR6gdj5jQJkZwRaWs0ueG3CSovqYX5nM27/nOQgFR4uO5XI2yO', NULL, 3, '2020-07-20 16:58:03', '2020-11-27 07:33:36', NULL, NULL),
(16, 'rizalhidayat180499@gmail.com', '$2y$10$.pHRKrAIJAowvoZbGNXtFu8Xg58RcOoY5FMVdzw5A9Yt5Uk3GBbm.', '$2y$10$7wXP86ocarWSC18qiD7z6O/rs5bWr0peY/qV3T6T6S.ZazQ2wZuMi', 3, '2020-07-20 16:59:11', '2020-11-27 07:33:37', NULL, '88e83aca7df94bcb8a5d8b1b2fa5e234'),
(17, 'ikhsan11@gmail.com', '$2y$10$lBr1tFFff41r0.GiZbweb.z5Ke9wnP3Fi7wnZBP9XPW05bfq96xU6', NULL, 3, '2020-07-20 17:00:38', '2020-11-27 07:33:37', NULL, NULL),
(19, 'sahtiatest@gmail.com', '$2y$10$D9u7hcyE/NVSpnH0ldWol.cF.drAK3ghJrJypvn.oNwzytSba89xG', '$2y$10$Ovf3C4rHjdQ2PW1YoTItV.qKw4cM.Udxe4ukWlCbsdIKArFGiFsYO', 3, '2020-07-25 01:30:47', '2020-11-27 07:33:37', NULL, NULL),
(20, 'rohman.nurafan13@gmail.com', '$2y$10$HRE6p7S.L6hQ/HQCN.vSDOsF5uMBXesK4l.IUDbrAqh2qjVx4sORi', NULL, 1, '2020-11-16 15:58:03', '2020-11-27 07:33:37', NULL, NULL),
(21, 'sanjit@xprogroup.com.au', '$2y$10$aXXOpCZQ6wMqMsYrITVdpOpAzQGtFMHmj6SbrRabQXNh2sbn3H.K2', NULL, 1, '2020-11-30 13:27:29', '2020-11-30 13:27:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_works_order_setting`
--

CREATE TABLE `x_works_order_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `number_digit` int(11) DEFAULT NULL,
  `number_prefix` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_number` int(11) DEFAULT NULL,
  `disable_invoice_item_edit` tinyint(1) NOT NULL DEFAULT 0,
  `disable_estimates_module` tinyint(1) NOT NULL DEFAULT 0,
  `enable_invoice_manual_status` tinyint(1) NOT NULL DEFAULT 0,
  `disable_shipping_option` tinyint(1) NOT NULL DEFAULT 0,
  `enable_maximum_discount` tinyint(1) NOT NULL DEFAULT 0,
  `disable_footer` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_works_order_setting`
--

INSERT INTO `x_works_order_setting` (`id`, `user_id`, `number_digit`, `number_prefix`, `next_number`, `disable_invoice_item_edit`, `disable_estimates_module`, `enable_invoice_manual_status`, `disable_shipping_option`, `enable_maximum_discount`, `disable_footer`, `created_at`, `updated_at`) VALUES
(2, 3, 4, 'W-', 29, 0, 0, 0, 0, 0, 1, '2020-11-10 14:02:58', '2020-12-17 15:19:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_work_orders`
--

CREATE TABLE `x_work_orders` (
  `id` bigint(20) NOT NULL,
  `id_clients` bigint(20) NOT NULL,
  `id_staff` varchar(100) DEFAULT '',
  `coordinate` varchar(255) NOT NULL DEFAULT '',
  `workorder_type` varchar(255) DEFAULT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `client_preference` varchar(255) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `order_number` varchar(30) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tagging` text DEFAULT NULL,
  `budget` int(200) DEFAULT NULL,
  `hourly_rate` decimal(10,0) NOT NULL,
  `status` int(10) NOT NULL,
  `status_wo` varchar(200) NOT NULL,
  `workorder_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `priority_level` varchar(200) DEFAULT NULL,
  `description_work_completed` text DEFAULT NULL,
  `explanation_pending_work` text DEFAULT NULL,
  `explanation_incomplete_work` text DEFAULT NULL,
  `description_on_going` text DEFAULT NULL,
  `completed_by` varchar(200) DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `approved_by` varchar(200) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `compeleted_by` varchar(200) DEFAULT NULL,
  `compeleted_date` datetime DEFAULT NULL,
  `order_received_by` varchar(200) DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `work_billed_to` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `x_work_orders`
--

INSERT INTO `x_work_orders` (`id`, `id_clients`, `id_staff`, `coordinate`, `workorder_type`, `service_type`, `client_preference`, `title`, `order_number`, `start_date`, `end_date`, `notes`, `description`, `tagging`, `budget`, `hourly_rate`, `status`, `status_wo`, `workorder_date`, `created_at`, `updated_at`, `priority_level`, `description_work_completed`, `explanation_pending_work`, `explanation_incomplete_work`, `description_on_going`, `completed_by`, `completed_date`, `approved_by`, `approved_date`, `compeleted_by`, `compeleted_date`, `order_received_by`, `delivered_date`, `work_billed_to`) VALUES
(1, 14, '[\"1\",\"2\"]', '00.000', NULL, NULL, NULL, 'Work Order', 'W-0001', NULL, NULL, NULL, 'example description', NULL, 100, '5', 5, 'open', '2020-12-18', '2020-12-19 02:09:27', '2020-12-16 16:06:14', 'urgent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL),
(4, 14, '[\"1\"]', '', NULL, NULL, NULL, 'Work Order', 'W-0002', NULL, NULL, NULL, 'example description', NULL, 100, '5', 0, 'open', '2020-12-18', '2020-12-19 02:10:34', '2020-12-16 04:32:49', 'urgent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 64, '[\"1\"]', '', NULL, NULL, NULL, 'Tes Pengurangan Stock', 'W-0028', NULL, NULL, NULL, 'Tes Pengurangan Stock', '[\"Hurstville westfield\"]', 2500, '10', 1, 'Open', '2020-12-18', '2020-12-17 15:19:21', '2020-12-17 15:19:21', 'High', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-18 09:19:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_work_orders_document`
--

CREATE TABLE `x_work_orders_document` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workorders_id` int(11) DEFAULT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagging` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tagging`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_work_orders_document`
--

INSERT INTO `x_work_orders_document` (`id`, `workorders_id`, `original_name`, `name`, `url_file`, `mime_type`, `path_file`, `size_file`, `tagging`, `created_at`, `updated_at`) VALUES
(1, 1, 'IMG-20201206-WA0005.jpg', '3-1607319183.jpg', '/work_orders/3-1607319183.jpg', 'image/jpeg', '/work_orders/3-1607319183.jpg', '67', NULL, '2020-12-06 18:33:03', '2020-12-06 18:33:03'),
(2, 1, 'logo_-01.jpg', '2-1607610967.jpg', '/work_orders/2-1607610967.jpg', 'image/jpeg', '/work_orders/2-1607610967.jpg', '790', NULL, '2020-12-10 03:36:09', '2020-12-10 03:36:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_work_orders_draft`
--

CREATE TABLE `x_work_orders_draft` (
  `id` bigint(20) NOT NULL,
  `id_clients` bigint(20) NOT NULL,
  `id_staff` bigint(20) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `order_number` varchar(30) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tagging` text DEFAULT NULL,
  `budget` int(200) DEFAULT NULL,
  `hourly_rate` decimal(10,0) NOT NULL,
  `status` int(10) NOT NULL,
  `status_wo` varchar(200) NOT NULL,
  `workorder_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `priority_level` varchar(200) DEFAULT NULL,
  `description_work_completed` text DEFAULT NULL,
  `explanation_incomplete_work` text DEFAULT NULL,
  `completed_by` varchar(200) DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `approved_by` varchar(200) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `compeleted_by` varchar(200) DEFAULT NULL,
  `compeleted_date` datetime DEFAULT NULL,
  `order_received_by` varchar(200) DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `work_billed_to` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_work_orders_draft_old`
--

CREATE TABLE `x_work_orders_draft_old` (
  `id` bigint(20) NOT NULL,
  `id_clients` bigint(20) DEFAULT NULL,
  `id_staff` bigint(20) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `order_number` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `budget` int(200) DEFAULT NULL,
  `hourly_rate` decimal(10,0) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `status_wo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_work_orders_items`
--

CREATE TABLE `x_work_orders_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `x_work_orders_items`
--

INSERT INTO `x_work_orders_items` (`id`, `work_order_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(14, 5, 3, 2, '2020-12-18 02:19:21', '2020-12-18 02:19:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `x_work_orders_old`
--

CREATE TABLE `x_work_orders_old` (
  `id` bigint(20) NOT NULL,
  `id_clients` bigint(20) NOT NULL,
  `id_staff` bigint(20) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `order_number` varchar(30) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `budget` int(200) DEFAULT NULL,
  `hourly_rate` decimal(10,0) NOT NULL,
  `status` int(10) NOT NULL,
  `status_wo` varchar(200) NOT NULL,
  `workorder_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `priority_level` varchar(200) DEFAULT NULL,
  `description_work_completed` text DEFAULT NULL,
  `explanation_pending_work` text DEFAULT NULL,
  `explanation_incomplete_work` text DEFAULT NULL,
  `completed_by` varchar(200) DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `approved_by` varchar(200) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `compeleted_by` varchar(200) DEFAULT NULL,
  `compeleted_date` datetime DEFAULT NULL,
  `order_received_by` varchar(200) DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `work_billed_to` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `taggables`
--
ALTER TABLE `taggables`
  ADD UNIQUE KEY `taggables_tag_id_taggable_id_taggable_type_unique` (`tag_id`,`taggable_id`,`taggable_type`),
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_activity`
--
ALTER TABLE `x_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_work_order` (`id_work_order`);

--
-- Indeks untuk tabel `x_appointments`
--
ALTER TABLE `x_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clients` (`id_clients`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `x_asset_list`
--
ALTER TABLE `x_asset_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_asset_list_camera`
--
ALTER TABLE `x_asset_list_camera`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_asset_list_recording`
--
ALTER TABLE `x_asset_list_recording`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_asset_list_server`
--
ALTER TABLE `x_asset_list_server`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_clients`
--
ALTER TABLE `x_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_company_setting`
--
ALTER TABLE `x_company_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_config`
--
ALTER TABLE `x_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `var` (`var`);

--
-- Indeks untuk tabel `x_contact`
--
ALTER TABLE `x_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_credit_note`
--
ALTER TABLE `x_credit_note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clients` (`id_clients`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeks untuk tabel `x_customers`
--
ALTER TABLE `x_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_email_queue`
--
ALTER TABLE `x_email_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_email_template`
--
ALTER TABLE `x_email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_estimates`
--
ALTER TABLE `x_estimates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clients` (`id_clients`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeks untuk tabel `x_estimates_items`
--
ALTER TABLE `x_estimates_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_expenses`
--
ALTER TABLE `x_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_expenses_category`
--
ALTER TABLE `x_expenses_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_invoice`
--
ALTER TABLE `x_invoice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `x_invoice_inv_number_unique` (`inv_number`);

--
-- Indeks untuk tabel `x_invoice_batch`
--
ALTER TABLE `x_invoice_batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice_product_client` (`id_invoice_product_client`),
  ADD KEY `id_invoice` (`id_invoice`);

--
-- Indeks untuk tabel `x_invoice_items`
--
ALTER TABLE `x_invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`) USING BTREE;

--
-- Indeks untuk tabel `x_invoice_product_client`
--
ALTER TABLE `x_invoice_product_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_tax` (`id_tax`),
  ADD KEY `id_client` (`id_client`);

--
-- Indeks untuk tabel `x_invoice_setting`
--
ALTER TABLE `x_invoice_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_log_activity`
--
ALTER TABLE `x_log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_manage_purchase_order`
--
ALTER TABLE `x_manage_purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_manage_purchase_order_items`
--
ALTER TABLE `x_manage_purchase_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_manage_purchase_order_setting`
--
ALTER TABLE `x_manage_purchase_order_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_menu`
--
ALTER TABLE `x_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `name` (`name`),
  ADD KEY `status` (`status`);

--
-- Indeks untuk tabel `x_menu_role`
--
ALTER TABLE `x_menu_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `x_message`
--
ALTER TABLE `x_message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_new_invoice`
--
ALTER TABLE `x_new_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_product_service`
--
ALTER TABLE `x_product_service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_projects`
--
ALTER TABLE `x_projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ProjectName` (`project_name`);

--
-- Indeks untuk tabel `x_projects_asset`
--
ALTER TABLE `x_projects_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_projects_asset_name`
--
ALTER TABLE `x_projects_asset_name`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_projects_asset_name_list`
--
ALTER TABLE `x_projects_asset_name_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_projects_document`
--
ALTER TABLE `x_projects_document`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_rc`
--
ALTER TABLE `x_rc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchant_code` (`merchant`,`code`),
  ADD KEY `merchant` (`merchant`);

--
-- Indeks untuk tabel `x_role`
--
ALTER TABLE `x_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name_role`);

--
-- Indeks untuk tabel `x_smtp_setting`
--
ALTER TABLE `x_smtp_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_staff`
--
ALTER TABLE `x_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `x_staff_old`
--
ALTER TABLE `x_staff_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `x_staff_tracking`
--
ALTER TABLE `x_staff_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_supplier`
--
ALTER TABLE `x_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_tax`
--
ALTER TABLE `x_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_timesheet`
--
ALTER TABLE `x_timesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_timesheet_settings`
--
ALTER TABLE `x_timesheet_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_users_login`
--
ALTER TABLE `x_users_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `x_users_login_old`
--
ALTER TABLE `x_users_login_old`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `x_works_order_setting`
--
ALTER TABLE `x_works_order_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_work_orders`
--
ALTER TABLE `x_work_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clients` (`id_clients`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `x_work_orders_document`
--
ALTER TABLE `x_work_orders_document`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `x_work_orders_draft`
--
ALTER TABLE `x_work_orders_draft`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clients` (`id_clients`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `x_work_orders_draft_old`
--
ALTER TABLE `x_work_orders_draft_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clients` (`id_clients`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `x_work_orders_items`
--
ALTER TABLE `x_work_orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`work_order_id`) USING BTREE;

--
-- Indeks untuk tabel `x_work_orders_old`
--
ALTER TABLE `x_work_orders_old`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `x_activity`
--
ALTER TABLE `x_activity`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `x_appointments`
--
ALTER TABLE `x_appointments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `x_asset_list`
--
ALTER TABLE `x_asset_list`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `x_asset_list_camera`
--
ALTER TABLE `x_asset_list_camera`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `x_asset_list_recording`
--
ALTER TABLE `x_asset_list_recording`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `x_asset_list_server`
--
ALTER TABLE `x_asset_list_server`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `x_clients`
--
ALTER TABLE `x_clients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `x_company_setting`
--
ALTER TABLE `x_company_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `x_config`
--
ALTER TABLE `x_config`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `x_contact`
--
ALTER TABLE `x_contact`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `x_credit_note`
--
ALTER TABLE `x_credit_note`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `x_customers`
--
ALTER TABLE `x_customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `x_email_queue`
--
ALTER TABLE `x_email_queue`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `x_email_template`
--
ALTER TABLE `x_email_template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `x_estimates`
--
ALTER TABLE `x_estimates`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `x_estimates_items`
--
ALTER TABLE `x_estimates_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `x_expenses`
--
ALTER TABLE `x_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `x_expenses_category`
--
ALTER TABLE `x_expenses_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `x_invoice`
--
ALTER TABLE `x_invoice`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `x_invoice_batch`
--
ALTER TABLE `x_invoice_batch`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `x_invoice_items`
--
ALTER TABLE `x_invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `x_invoice_product_client`
--
ALTER TABLE `x_invoice_product_client`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `x_invoice_setting`
--
ALTER TABLE `x_invoice_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `x_log_activity`
--
ALTER TABLE `x_log_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `x_manage_purchase_order`
--
ALTER TABLE `x_manage_purchase_order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `x_manage_purchase_order_items`
--
ALTER TABLE `x_manage_purchase_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `x_manage_purchase_order_setting`
--
ALTER TABLE `x_manage_purchase_order_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `x_menu`
--
ALTER TABLE `x_menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `x_menu_role`
--
ALTER TABLE `x_menu_role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT untuk tabel `x_message`
--
ALTER TABLE `x_message`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `x_new_invoice`
--
ALTER TABLE `x_new_invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `x_product_service`
--
ALTER TABLE `x_product_service`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `x_projects`
--
ALTER TABLE `x_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `x_projects_asset`
--
ALTER TABLE `x_projects_asset`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `x_projects_asset_name`
--
ALTER TABLE `x_projects_asset_name`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `x_projects_asset_name_list`
--
ALTER TABLE `x_projects_asset_name_list`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `x_projects_document`
--
ALTER TABLE `x_projects_document`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `x_rc`
--
ALTER TABLE `x_rc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `x_role`
--
ALTER TABLE `x_role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `x_smtp_setting`
--
ALTER TABLE `x_smtp_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `x_staff`
--
ALTER TABLE `x_staff`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `x_staff_old`
--
ALTER TABLE `x_staff_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `x_staff_tracking`
--
ALTER TABLE `x_staff_tracking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `x_supplier`
--
ALTER TABLE `x_supplier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `x_tax`
--
ALTER TABLE `x_tax`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `x_timesheet`
--
ALTER TABLE `x_timesheet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `x_timesheet_settings`
--
ALTER TABLE `x_timesheet_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `x_users_login`
--
ALTER TABLE `x_users_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `x_users_login_old`
--
ALTER TABLE `x_users_login_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `x_works_order_setting`
--
ALTER TABLE `x_works_order_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `x_work_orders`
--
ALTER TABLE `x_work_orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `x_work_orders_document`
--
ALTER TABLE `x_work_orders_document`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `x_work_orders_draft`
--
ALTER TABLE `x_work_orders_draft`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `x_work_orders_draft_old`
--
ALTER TABLE `x_work_orders_draft_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `x_work_orders_items`
--
ALTER TABLE `x_work_orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `x_work_orders_old`
--
ALTER TABLE `x_work_orders_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `x_activity`
--
ALTER TABLE `x_activity`
  ADD CONSTRAINT `x_activity_ibfk_1` FOREIGN KEY (`id_work_order`) REFERENCES `x_work_orders_old` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_appointments`
--
ALTER TABLE `x_appointments`
  ADD CONSTRAINT `x_appointments_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  ADD CONSTRAINT `x_appointments_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `x_staff_old` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_credit_note`
--
ALTER TABLE `x_credit_note`
  ADD CONSTRAINT `x_credit_note_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  ADD CONSTRAINT `x_credit_note_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `x_product_service` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_estimates`
--
ALTER TABLE `x_estimates`
  ADD CONSTRAINT `x_estimates_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  ADD CONSTRAINT `x_estimates_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `x_product_service` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_invoice_batch`
--
ALTER TABLE `x_invoice_batch`
  ADD CONSTRAINT `x_invoice_batch_ibfk_1` FOREIGN KEY (`id_invoice_product_client`) REFERENCES `x_invoice_product_client` (`id`),
  ADD CONSTRAINT `x_invoice_batch_ibfk_2` FOREIGN KEY (`id_invoice`) REFERENCES `x_invoice` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_invoice_product_client`
--
ALTER TABLE `x_invoice_product_client`
  ADD CONSTRAINT `x_invoice_product_client_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `x_product_service` (`id`),
  ADD CONSTRAINT `x_invoice_product_client_ibfk_3` FOREIGN KEY (`id_tax`) REFERENCES `x_tax` (`id`),
  ADD CONSTRAINT `x_invoice_product_client_ibfk_4` FOREIGN KEY (`id_client`) REFERENCES `x_clients` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_menu_role`
--
ALTER TABLE `x_menu_role`
  ADD CONSTRAINT `x_menu_role_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `x_menu` (`id`),
  ADD CONSTRAINT `x_menu_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `x_role` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_staff`
--
ALTER TABLE `x_staff`
  ADD CONSTRAINT `x_staff_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `x_role` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_staff_old`
--
ALTER TABLE `x_staff_old`
  ADD CONSTRAINT `x_staff_old_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `x_role` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_users_login`
--
ALTER TABLE `x_users_login`
  ADD CONSTRAINT `x_users_login_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `x_role` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_users_login_old`
--
ALTER TABLE `x_users_login_old`
  ADD CONSTRAINT `x_users_login_old_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `x_role` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_work_orders`
--
ALTER TABLE `x_work_orders`
  ADD CONSTRAINT `x_work_orders_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_work_orders_draft`
--
ALTER TABLE `x_work_orders_draft`
  ADD CONSTRAINT `x_work_orders_draft_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  ADD CONSTRAINT `x_work_orders_draft_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `x_staff_old` (`id`);

--
-- Ketidakleluasaan untuk tabel `x_work_orders_draft_old`
--
ALTER TABLE `x_work_orders_draft_old`
  ADD CONSTRAINT `x_work_orders_draft_old_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  ADD CONSTRAINT `x_work_orders_draft_old_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `x_staff_old` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
