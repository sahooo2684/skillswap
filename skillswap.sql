-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 09:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillswap`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_description` varchar(255) NOT NULL,
  `activity_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `event_date` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `is_reminder` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`event_id`, `user_id`, `title`, `event_date`, `description`, `is_reminder`) VALUES
(1, 1, 'Web Development Workshop', '2024-12-25 00:00:00', 'Join us for an intensive workshop on full-stack web development.', 1),
(2, 4, 'Python for Beginners Webinar', '2024-12-27 00:00:00', 'A live webinar covering Python fundamentals.', 1),
(3, 7, 'AI Ethics Panel Discussion', '2024-12-28 00:00:00', 'An engaging discussion on ethics in AI.', 0),
(4, 11, 'End of Year Hackathon', '2024-12-30 00:00:00', 'Participate in our annual hackathon with exciting prizes.', 1),
(5, 9, 'Skillswap Community Meetup', '2025-01-05 00:00:00', 'Connect with other members of the Skillswap community.', 0),
(6, 12, 'JavaScript Deep Dive', '2025-01-10 00:00:00', 'Explore advanced JavaScript concepts in this exclusive event.', 1),
(7, 1, 'Resume Building Workshop', '2025-01-15 00:00:00', 'Learn to craft a standout resume with our expert tips.', 1),
(8, 4, 'Data Science Bootcamp', '2025-01-20 00:00:00', 'Kickstart your career in data science with our bootcamp.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `completed_courses`
--

CREATE TABLE `completed_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `completed_courses`
--

INSERT INTO `completed_courses` (`id`, `user_id`, `skill_id`, `completed_at`) VALUES
(1, 1, 1, '2025-01-15 06:47:33'),
(2, 24, 3, '2025-03-28 19:11:36'),
(3, 24, 1, '2025-03-28 19:12:15'),
(4, 24, 1, '2025-03-28 19:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `course_videos`
--

CREATE TABLE `course_videos` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `video_file` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_videos`
--

INSERT INTO `course_videos` (`video_id`, `user_id`, `skill_id`, `video_file`, `uploaded_at`) VALUES
(1, 1, 1, 'p1.mp4', '2025-01-15 06:39:29'),
(4, 1, 2, 'p1.mp4', '2025-01-15 06:39:29'),
(5, 1, 3, 'p1.mp4', '2025-01-15 06:39:29'),
(6, 1, 4, 'p1.mp4', '2025-01-15 06:39:29'),
(7, 1, 5, 'p1.mp4', '2025-01-15 06:39:29'),
(8, 1, 6, 'p1.mp4', '2025-01-15 06:39:29'),
(9, 1, 7, 'p1.mp4', '2025-01-15 06:39:29'),
(10, 1, 8, 'p1.mp4', '2025-01-15 06:39:29'),
(11, 1, 9, 'p1.mp4', '2025-01-15 06:39:29'),
(12, 1, 10, 'p1.mp4', '2025-01-15 06:39:29'),
(13, 1, 11, 'p1.mp4', '2025-01-15 06:39:29'),
(14, 1, 12, 'p1.mp4', '2025-01-15 06:39:29'),
(15, 1, 13, 'p1.mp4', '2025-01-15 06:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `message`, `is_read`, `created_at`) VALUES
(1, 1, 'Your skill endorsement has increased by 5 points!', 0, '2024-12-23 05:14:28'),
(2, 4, 'A new course on Web Development is now available.', 1, '2024-12-23 05:14:28'),
(3, 7, 'You have a new message from your instructor.', 0, '2024-12-23 05:14:28'),
(4, 9, 'Reminder: Your session starts in 1 hour.', 0, '2024-12-23 05:14:28'),
(5, 11, 'Your profile has been updated successfully.', 1, '2024-12-23 05:14:28'),
(6, 12, 'New opportunities available in the Skillswap community!', 0, '2024-12-23 05:14:28'),
(7, 1, 'Your course completion certificate is now available.', 1, '2024-12-23 05:14:28'),
(8, 4, 'A student has endorsed your skill \"Python Programming\".', 0, '2024-12-23 05:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `reviewee_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `session_date` datetime NOT NULL,
  `mode` enum('Virtual','In-Person') NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `reminder_set` tinyint(1) DEFAULT 0,
  `status` enum('Scheduled','Completed','Cancelled') DEFAULT 'Scheduled',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `category` enum('music','language','technology','cooking','art','design','business','sports','health') NOT NULL,
  `points_value` int(11) DEFAULT 0,
  `popularity` int(11) DEFAULT 0,
  `teacher_id` int(11) NOT NULL,
  `notes` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `more_details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level` varchar(50) NOT NULL DEFAULT 'Beginner',
  `location` varchar(100) NOT NULL DEFAULT 'Online',
  `availability` varchar(50) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`, `description`, `category`, `points_value`, `popularity`, `teacher_id`, `notes`, `video_url`, `more_details`, `created_at`, `updated_at`, `level`, `location`, `availability`) VALUES
(1, 'Web Development', 'Learn how to build responsive websites using HTML, CSS, and JavaScript.', '', 100, 85, 1, 'Includes both front-end and back-end basics.', 'C:\\xampp\\htdocs\\p1.mp4', 'Full stack development is also covered in this course.', '2024-11-27 19:51:07', '2025-03-28 18:47:23', 'Beginner', 'Online', 'Available'),
(2, 'Data Science', 'Understand the fundamentals of data analysis, machine learning, and data visualization.', '', 120, 90, 2, 'Incorporates Python, R, and Tableau.', 'p1.mp4', 'This course focuses on real-world applications of data science.', '2024-11-27 19:51:07', '2025-03-28 18:45:14', 'Beginner', 'Online', 'Available'),
(3, 'Digital Marketing', 'Master online marketing, SEO, PPC, social media strategies, and more.', '', 80, 70, 3, 'Learn how to generate leads and optimize ads.', 'p1.mp4', 'This course covers both organic and paid marketing strategies.', '2024-11-27 19:51:07', '2025-03-28 18:45:19', 'Beginner', 'Online', 'Available'),
(4, 'Artificial Intelligence', 'Dive into AI concepts, machine learning algorithms, and neural networks.', 'technology', 150, 95, 4, 'Focus on algorithms used in real-world AI applications.', 'p1.mp4', 'Detailed explanations of deep learning and reinforcement learning.', '2024-11-27 19:51:07', '2025-03-28 18:45:23', 'Beginner', 'Online', 'Available'),
(5, 'Mobile App Development', 'Learn to create native apps for iOS and Android using Flutter and React Native.', '', 110, 85, 5, 'Both front-end and back-end mobile app development.', 'p1.mp4', 'Explore both cross-platform and native app development tools.', '2024-11-27 19:51:07', '2025-03-28 18:45:27', 'Beginner', 'Online', 'Available'),
(6, 'Photography', 'Learn techniques for capturing high-quality photos with any camera.', '', 70, 60, 6, 'Covers everything from lighting to composition.', 'p1.mp4', 'This course is for all skill levels and camera types.', '2024-11-27 19:51:07', '2025-03-28 18:45:32', 'Beginner', 'Online', 'Available'),
(7, 'Project Management', 'Gain skills in managing teams, timelines, and resources effectively.', 'business', 90, 80, 7, 'Includes project management tools and techniques.', 'p1.mp4', 'Explore Agile, Scrum, and Waterfall methodologies.', '2024-11-27 19:51:07', '2025-03-28 18:45:39', 'Beginner', 'Online', 'Available'),
(8, 'Cybersecurity', 'Learn the basics of network security, cryptography, and ethical hacking.', 'technology', 140, 85, 8, 'Essential for anyone interested in security roles.', 'p1.mp4', 'The course covers both offensive and defensive security techniques.', '2024-11-27 19:51:07', '2025-03-28 18:45:45', 'Beginner', 'Online', 'Available'),
(9, 'Graphic Design', 'Create stunning visual designs using tools like Adobe Photoshop and Illustrator.', '', 60, 50, 9, 'Perfect for beginners and intermediate designers.', 'p1.mp4', 'Learn design theory, typography, and more.', '2024-11-27 19:51:07', '2025-03-28 18:45:49', 'Beginner', 'Online', 'Available'),
(10, 'Machine Learning', 'Explore machine learning algorithms, data pre-processing, and model building.', '', 130, 90, 10, 'Focus on both supervised and unsupervised learning.', 'p1.mp4', 'This course emphasizes practical implementation with real-world datasets.', '2024-11-27 19:51:07', '2025-03-28 18:45:53', 'Beginner', 'Online', 'Available'),
(11, 'Web Development Basics', 'Learn HTML, CSS, and JavaScript fundamentals.', '', 120, 85, 2, 'Beginner-friendly course', 'p1.mp4', 'path/to/details.html', '2024-11-28 09:42:52', '2025-03-28 18:45:57', 'Beginner', 'Online', 'Available'),
(12, 'http://localhost/skillswap/addskill.php', 'http://localhost/skillswap/addskill.php', 'design', 54, 54, 1, 'http://localhost/skillswap/addskill.php', 'p1.mp4', 'http://localhost/skillswap/addskill.php', '2024-12-07 19:09:38', '2025-03-28 18:46:03', 'Beginner', 'Online', 'Available'),
(13, 'web security ', 'web security ', 'technology', 6, 8, 1, 'web security ', 'p1.mp4', 'web security ', '2024-12-22 17:52:08', '2025-03-28 18:46:11', 'Beginner', 'Online', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `skills_backup`
--

CREATE TABLE `skills_backup` (
  `skill_id` int(11) NOT NULL DEFAULT 0,
  `skill_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `points_value` int(11) DEFAULT 0,
  `popularity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills_backup`
--

INSERT INTO `skills_backup` (`skill_id`, `skill_name`, `description`, `category`, `points_value`, `popularity`) VALUES
(0, 'JavaScript', 'A versatile scripting language for web development.', 'Programming', 10, 90),
(0, 'Python', 'A powerful programming language for data science and web development.', 'Programming', 15, 85),
(0, 'Java', 'A high-level, class-based, object-oriented programming language.', 'Programming', 12, 88),
(0, 'C++', 'A high-performance programming language used in system/software development.', 'Programming', 14, 80),
(0, 'HTML', 'The standard markup language for creating web pages.', 'Web Development', 8, 95),
(0, 'CSS', 'Stylesheet language used for describing the presentation of a document written in HTML.', 'Web Development', 7, 92),
(0, 'React', 'A JavaScript library for building user interfaces.', 'Web Development', 13, 85),
(0, 'Angular', 'A platform for building mobile and desktop web applications.', 'Web Development', 12, 78),
(0, 'SQL', 'A language for managing and querying relational databases.', 'Database', 10, 90),
(0, 'NoSQL', 'A database structure that doesn\'t use relational tables.', 'Database', 11, 70),
(0, 'Photoshop', 'A software for raster graphics editing and digital art creation.', 'Design', 14, 85),
(0, 'Illustrator', 'Vector graphics editor used for creating illustrations and artwork.', 'Design', 13, 82),
(0, 'UI/UX Design', 'The process of creating user-friendly interfaces and experiences.', 'Design', 15, 88),
(0, 'Figma', 'A web-based UI/UX design and prototyping tool.', 'Design', 12, 80),
(0, 'Digital Marketing', 'The use of digital channels to promote or market products and services.', 'Marketing', 18, 90),
(0, 'SEO', 'Search Engine Optimization to improve visibility on search engines.', 'Marketing', 16, 92),
(0, 'Social Media Marketing', 'The use of social media platforms to promote a product or service.', 'Marketing', 14, 85),
(0, 'Content Writing', 'The process of writing content for websites and blogs.', 'Marketing', 10, 87),
(0, 'Video Editing', 'The process of editing video footage to create a final product.', 'Media Production', 13, 83),
(0, 'Photography', 'The art or practice of taking and processing photographs.', 'Media Production', 12, 80),
(0, 'Public Speaking', 'The act of delivering a speech or presentation to an audience.', 'Soft Skills', 10, 75),
(0, 'Team Leadership', 'The ability to lead and manage a team effectively.', 'Soft Skills', 18, 85),
(0, 'Communication Skills', 'The ability to convey information effectively.', 'Soft Skills', 16, 90),
(0, 'Time Management', 'The ability to plan and control how you spend your time effectively.', 'Soft Skills', 14, 88),
(0, 'Data Analysis', 'The process of inspecting and analyzing data to find meaningful patterns.', 'Data Science', 20, 95),
(0, 'Machine Learning', 'The use of algorithms and statistical models to enable computers to improve over time.', 'Data Science', 25, 85),
(0, 'Deep Learning', 'A subset of machine learning involving neural networks with many layers.', 'Data Science', 30, 80),
(0, 'Statistics', 'The study of data collection, analysis, interpretation, and presentation.', 'Data Science', 22, 78),
(0, 'Financial Analysis', 'The evaluation of financial data to assess an organization\'s performance and make recommendations.', 'Finance', 18, 70),
(0, 'Budgeting', 'The process of creating a plan for spending and saving money.', 'Finance', 16, 80),
(0, 'Project Management', 'The process of leading a team to achieve specific project goals and objectives.', 'Project Management', 20, 92),
(0, 'Risk Management', 'The identification, assessment, and prioritization of risks followed by mitigation strategies.', 'Project Management', 19, 75),
(0, 'Cybersecurity', 'The practice of defending computers, networks, and data from malicious attacks.', 'IT & Security', 25, 90),
(0, 'Cloud Computing', 'The delivery of computing services over the internet.', 'IT & Security', 22, 85),
(0, 'DevOps', 'A set of practices that automates and integrates the processes of software development and IT operations.', 'IT & Security', 20, 88),
(0, 'Network Security', 'The practice of protecting the integrity of a network and its data.', 'IT & Security', 23, 82),
(0, 'Blockchain', 'A decentralized digital ledger used for secure transactions.', 'Blockchain & Crypto', 30, 87),
(0, 'Cryptocurrency', 'A digital or virtual currency that uses cryptography for security.', 'Blockchain & Crypto', 28, 80),
(0, 'Ethereum', 'A decentralized platform that runs smart contracts on a blockchain.', 'Blockchain & Crypto', 27, 75),
(0, 'Smart Contracts', 'Self-executing contracts with terms directly written into code.', 'Blockchain & Crypto', 26, 78),
(0, 'Ethical Hacking', 'The practice of intentionally probing systems for vulnerabilities in a legal and controlled way.', 'Cybersecurity', 24, 90),
(0, 'Penetration Testing', 'A simulated cyberattack on a computer system to evaluate its security.', 'Cybersecurity', 25, 82),
(0, 'Artificial Intelligence', 'The simulation of human intelligence in machines that are programmed to think and act like humans.', 'AI & Robotics', 30, 95),
(0, 'Robotics', 'The design, construction, and operation of robots for various applications.', 'AI & Robotics', 29, 88),
(0, 'Painting', 'The practice of applying paint to a surface, such as canvas or paper.', 'Arts', 15, 80),
(0, 'Sculpture', 'The creation of three-dimensional art pieces, often using materials like clay, metal, or wood.', 'Arts', 18, 75),
(0, 'Drawing', 'The act of creating pictures or diagrams by marking a surface with a pen, pencil, or other tools.', 'Arts', 12, 88),
(0, 'Printmaking', 'The process of creating artworks by printing, typically on paper.', 'Arts', 13, 72),
(0, 'Photography', 'The art of capturing light to create images.', 'Arts', 20, 90),
(0, 'Graphic Design', 'The art and practice of planning and projecting visual communication through typography, photography, iconography, etc.', 'Arts', 17, 85),
(0, 'Film Directing', 'The process of overseeing and managing the creative aspects of a film production.', 'Arts', 22, 80),
(0, 'Music Composition', 'The art of creating original music compositions.', 'Arts', 25, 92),
(0, 'Music Production', 'The process of creating and managing sound recordings for music.', 'Arts', 21, 78),
(0, 'Theater Acting', 'The craft of performing on stage in front of an audience.', 'Arts', 23, 88),
(0, 'Dance', 'The art form of rhythmic movement to music, often involving body coordination and choreography.', 'Arts', 19, 75),
(0, 'Singing', 'The art of producing musical tones through vocal cords.', 'Arts', 20, 80),
(0, 'Fashion Design', 'The art of designing clothing and accessories.', 'Arts', 24, 70),
(0, 'Interior Design', 'The art and science of enhancing the interior of a building to create a healthier and more aesthetically pleasing environment.', 'Arts', 18, 85),
(0, 'Ceramics', 'The art of shaping and firing clay to create objects and sculptures.', 'Arts', 17, 70),
(0, 'Digital Art', 'Art created using digital technology, often involving software and graphic tablets.', 'Arts', 16, 75),
(0, 'Calligraphy', 'The art of beautiful handwriting, often created with specialized tools like pens or brushes.', 'Arts', 14, 80),
(0, 'Street Art', 'Visual art created in public spaces, often with a message or artistic expression.', 'Arts', 20, 82),
(0, 'Tattoo Art', 'The art of creating permanent designs on the skin by inserting ink.', 'Arts', 19, 70);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `points_balance` int(11) DEFAULT 0,
  `role` enum('Learner','Teacher','Learner-Teacher') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `skill_points` int(11) DEFAULT 0,
  `verified` tinyint(1) DEFAULT 0,
  `skill_preferences` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `bio`, `profile_photo`, `points_balance`, `role`, `created_at`, `updated_at`, `skill_points`, `verified`, `skill_preferences`) VALUES
(1, 'bhagyashree08', 'bhagyashree@gmail.com', '$2y$10$FLx9DWAsNDt2ANDqsAK1b.zLLAMz7yt6HVatScXpSNqNB8tNB7Z/6', 'no more', NULL, 0, 'Learner', '2024-11-12 14:37:01', '2025-03-04 03:29:54', 24, 1, ''),
(4, 'sahooo', 'sahil1@gmail.com', '$2y$10$NfJCfUelCMA4eZVQy.hN8utL6cV/wwpeiSeqwK2Rxs2/e0A8k/9wS', 'no more issues ', '', 0, 'Learner', '2024-11-14 07:59:14', '2024-12-22 17:54:58', 0, 1, 'graphic designer , soft skill'),
(7, 'sahilka', 'patilanant792@gmail.com', '$2y$10$Kom2/8wDCjN5gdizHLQIOep3P7quTR2aUoSQ5LJAjelUMtls66s0O', NULL, NULL, 0, 'Learner', '2024-11-14 08:13:29', '2024-11-14 10:55:36', 0, 1, ''),
(8, 'sahilkam', 'sahil2@gmail.com', '$2y$10$.2rfZi1A2Xvk/T3DR4yAJeDzgsZLKruMGN2FkNu2LIelrb/h9vDZO', NULL, NULL, 0, 'Learner', '2024-11-14 10:52:45', '2024-11-14 10:55:46', 0, 1, ''),
(9, 'adit', 'adity@gmail.com', '$2y$10$z.Miwb2WGp.36p1ceeDv9u5kTInE61Q3jv6hkfX.axLADZ48yGTmS', NULL, NULL, 0, 'Learner', '2024-12-23 03:28:44', '2025-03-04 03:27:26', 0, 1, ''),
(11, 'adity', 'sutaraditya2807@gmail.com', '$2y$10$ppAuIEY5/CYoBP3gwhUWpeb15.ziAwf/cXiNx8hd.aXNmVtYOU8gi', NULL, NULL, 0, 'Learner', '2024-12-23 03:33:17', '2025-03-04 03:28:31', 0, 1, ''),
(12, 'aditya', 'aditya@gmail.com', '$2y$10$VhNhn4eO9iB/YwZgibyleeiCvAXkv0pHLHNRSacZMxOiUCfshbiWy', NULL, NULL, 0, 'Learner', '2024-12-23 03:35:46', '2025-03-04 03:28:36', 0, 1, ''),
(13, 'teacher1', 'teacher1@gmail.com', '$2y$10$XyzABC1234exampleHashedPassword', NULL, NULL, 0, 'Teacher', '2024-12-23 04:30:00', '2024-12-23 04:30:00', 0, 1, NULL),
(14, 'teacher2', 'teacher2@gmail.com', '$2y$10$XyzABC1234exampleHashedPassword', 'Expert in Data Science', NULL, 0, 'Teacher', '2024-12-23 04:35:00', '2024-12-23 04:35:00', 0, 1, 'Data Science, Machine Learning'),
(15, 'teacher3', 'teacher3@gmail.com', '$2y$10$XyzABC1234exampleHashedPassword', 'Experienced Web Developer', NULL, 0, 'Teacher', '2024-12-23 04:40:00', '2024-12-23 04:40:00', 0, 1, 'Web Development, JavaScript'),
(16, 'teacher4', 'teacher4@gmail.com', '$2y$10$XyzABC1234exampleHashedPassword', 'Certified Python Trainer', NULL, 0, 'Teacher', '2024-12-23 04:45:00', '2024-12-23 04:45:00', 0, 1, 'Python, AI, ML'),
(17, 'teacher5', 'teacher5@gmail.com', '$2y$10$XyzABC1234exampleHashedPassword', 'Expert Graphic Designer', NULL, 0, 'Teacher', '2024-12-23 04:50:00', '2024-12-23 04:50:00', 0, 1, 'Graphic Design, Adobe Suite'),
(19, 'bhagyashree0821', 'bhagyashree08@gmail.com', '$2y$10$dKAyOVX9gGiF6tkQe0U99Oc4d.f3OQkW0nq5vD3kvblLPRNjbiKPK', NULL, NULL, 0, 'Learner', '2025-02-24 06:53:34', '2025-02-24 06:54:53', 0, 1, ''),
(20, 'abc', 'abc@gmail.com', '$2y$10$0Lle3ugKSVJXe/bB60IgG.63OmOOyaVuckfw.tOJ3PLDHMzCyL4/2', NULL, NULL, 0, 'Learner', '2025-03-04 03:30:31', '2025-03-04 03:30:47', 0, 1, ''),
(21, 'yuvraj', 'yuvraj@gmail.com', '$2y$10$h.L3.YatOaaxtyEBro1lv.ZOMzZ7NJMgV4xwY/QpmcfW7ssZ0Eneu', NULL, NULL, 0, 'Learner', '2025-03-07 04:32:58', '2025-03-28 18:25:00', 0, 0, ''),
(22, 'bhagu', 'bhagu@gmail.com', '$2y$10$UfaCW8GOFnIWUDsHuLLCGe40oDr6DJXxTVdlPaMVMAjB9LdFPWqW.', NULL, NULL, 0, 'Learner', '2025-03-07 14:54:39', '2025-03-28 18:27:22', 0, 1, ''),
(24, 'me', 'me@gmail.com', '$2y$10$2NMdSu1RRqJ13tdVgedox.12l.pU1AL2qhPQaYvtPIC1fDuteY8a2', NULL, NULL, 0, 'Learner', '2025-03-28 18:28:32', '2025-03-28 18:28:32', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `user_skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `skill_type` enum('Teach','Learn') NOT NULL,
  `experience_level` varchar(50) DEFAULT NULL,
  `endorsements` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`user_skill_id`, `user_id`, `skill_id`, `skill_type`, `experience_level`, `endorsements`) VALUES
(1, 1, 1, 'Teach', 'Expert', 25),
(2, 4, 2, 'Learn', 'Intermediate', 10),
(3, 7, 3, 'Teach', 'Beginner', 5),
(4, 9, 1, 'Learn', 'Advanced', 15),
(5, 11, 4, 'Teach', 'Intermediate', 8),
(6, 12, 2, 'Learn', 'Beginner', 3),
(7, 7, 3, 'Teach', 'Advanced', 20),
(8, 1, 4, 'Learn', 'Expert', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `completed_courses`
--
ALTER TABLE `completed_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `learner_id` (`learner_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `reviewer_id` (`reviewer_id`),
  ADD KEY `reviewee_id` (`reviewee_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`user_skill_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `completed_courses`
--
ALTER TABLE `completed_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_videos`
--
ALTER TABLE `course_videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `user_skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD CONSTRAINT `calendar_events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `completed_courses`
--
ALTER TABLE `completed_courses`
  ADD CONSTRAINT `completed_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `completed_courses_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`) ON DELETE CASCADE;

--
-- Constraints for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD CONSTRAINT `course_videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_videos_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`) ON DELETE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`learner_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_ibfk_3` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`session_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`reviewee_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
