-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 05:19 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_appontment_info`
--

CREATE TABLE `faculty_appontment_info` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_appontment_info`
--

INSERT INTO `faculty_appontment_info` (`id`, `title`, `body`) VALUES
(4, 'Open Faculty Positions', '<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero,</p>\r\n'),
(5, 'Short & Long term disability', '<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_development_info`
--

CREATE TABLE `faculty_development_info` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_development_info`
--

INSERT INTO `faculty_development_info` (`id`, `title`, `body`) VALUES
(1, 'Professional Development', '<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n'),
(2, 'Faculty Network', '<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n\r\n<hr />\r\n<p><a href=\"mailto:help@lipsum.com\">help@lipsum.com</a><br />\r\n<a href=\"https://lipsum.com/privacy.pdf\" target=\"_blank\">Privacy Policy</a></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_helth_care`
--

CREATE TABLE `faculty_helth_care` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_helth_care`
--

INSERT INTO `faculty_helth_care` (`id`, `title`, `body`) VALUES
(1, 'Policy', '<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n\r\n<form action=\"https://lipsum.com/feed/html\" method=\"post\">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\"><input name=\"amount\" size=\"3\" type=\"text\" value=\"5\" /></td>\r\n			<td rowspan=\"2\">\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<td><input checked=\"checked\" name=\"what\" type=\"radio\" value=\"paras\" /></td>\r\n						<td>paragraphs</td>\r\n					</tr>\r\n					<tr>\r\n						<td><input name=\"what\" type=\"radio\" value=\"words\" /></td>\r\n						<td>words</td>\r\n					</tr>\r\n					<tr>\r\n						<td><input name=\"what\" type=\"radio\" value=\"bytes\" /></td>\r\n						<td>bytes</td>\r\n					</tr>\r\n					<tr>\r\n						<td><input name=\"what\" type=\"radio\" value=\"lists\" /></td>\r\n						<td>lists</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td><input checked=\"checked\" name=\"start\" type=\"checkbox\" value=\"yes\" /></td>\r\n			<td>Start with &#39;Lorem<br />\r\n			ipsum dolor sit amet...&#39;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td><input name=\"generate\" type=\"submit\" value=\"Generate Lorem Ipsum\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</form>\r\n'),
(2, 'Eligibility', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n'),
(3, 'Contacts', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_housing_info`
--

CREATE TABLE `faculty_housing_info` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_housing_info`
--

INSERT INTO `faculty_housing_info` (`id`, `title`, `body`) VALUES
(1, 'Housing policiy', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n'),
(2, 'For Current Home Buyers', '<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n'),
(3, 'For Current Owners', '<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n'),
(4, 'New Faculty Housing', '<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n'),
(5, 'Contract', '<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_member_info`
--

CREATE TABLE `faculty_member_info` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `department_id` varchar(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `date_of_birth` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_member_info`
--

INSERT INTO `faculty_member_info` (`id`, `department`, `department_id`, `fname`, `lname`, `date_of_birth`, `email`, `password`) VALUES
(1, 'CSE', 'CSE05807036', 'Farhad', 'Ahmend', '1997-05-23', 'i.am.farhadmasum@gmail.com', 'farhad123'),
(3, 'CSE', 'CSE05807107', 'Shaju', 'Mollik', '1996-09-17', 'jack1@g.com', '1234567890'),
(4, 'CSE', 'CSE05606885', 'Fokrul', 'Riad', '1996-02-13', 'fokrul.riad@gmail.com', 'fokrulislam'),
(5, 'CSE', 'CSE05807103', 'Jack', 'Nayem', '1995-09-12', 'jacknayem@yahoo.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_retirment_info`
--

CREATE TABLE `faculty_retirment_info` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_retirment_info`
--

INSERT INTO `faculty_retirment_info` (`id`, `title`, `body`) VALUES
(1, 'Rrtirement Policy', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n'),
(3, 'Before you decide to retire', '<h2>Where does it come from?</h2>\r\n\r\n<p><img alt=\"\" src=\"/Project(UniversityWebsite)/admin/ckeditor/kcfinder/upload/images/25398864_1530580517019959_5211937834229835593_n.png\" style=\"float:right; height:214px; width:140px\" />Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n'),
(4, 'When you decide to retire', '<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `president_biography`
--

CREATE TABLE `president_biography` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `biography` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `president_biography`
--

INSERT INTO `president_biography` (`id`, `name`, `biography`) VALUES
(1, 'Lee C. Bollinger', '<p style=\"text-align:justify\"><img alt=\"\" src=\"/Project(UniversityWebsite)/admin/ckeditor/kcfinder/upload/images/president_biography.jpg\" style=\"float:right; height:133px; width:200px\" />Lee C. Bollinger became Columbia University&rsquo;s nineteenth president in 2002. Under his leadership, Columbia stands again at the very top rank of great research universities, distinguished by comprehensive academic excellence, historic institutional development, an innovative and sustainable approach to global engagement, and unprecedented levels of alumni involvement and financial stability. President Bollinger is Columbia&rsquo;s first Seth Low Professor of the University, a member of the Columbia Law School faculty, and one of the country&rsquo;s foremost First Amendment scholars. Each fall semester, he teaches &ldquo;Freedom of Speech and Press&rdquo; to Columbia undergraduate and graduate students. His most recent book, Uninhibited, Robust, and Wide-Open: A Free Press for a New Century, has placed Bollinger at the center of public discussion about the importance of global free speech to continued social progress.As president of the University of Michigan, Bollinger led the school&rsquo;s historic litigation in Grutter v. Bollinger and Gratz v. Bollinger, Supreme Court decisions that upheld and clarified the importance of diversity as a compelling justification for affirmative action in higher education. He speaks and writes frequently about the value of racial, cultural, and socioeconomic diversity to American society through opinion columns, media interviews, and public appearances around the country. Columbia remains one of the most diverse universities among its peer institutions and has seen the number of applicants to Columbia College and the selectivity of admissions at the school reach record levels. As Columbia&rsquo;s president, Bollinger conceived and led the University&rsquo;s most ambitious expansion in over a century with the creation of the Manhattanville campus in West Harlem, the first campus plan in the nation to receive the U.S. Green Building Council&rsquo;s highest certification for sustainable development. An historic community benefits agreement emerging from the city and state review process for the new campus provides Columbia&rsquo;s local neighborhoods with decades of investment in the community&rsquo;s health, education and economic growth.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `president_news`
--

CREATE TABLE `president_news` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(200) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `president_news`
--

INSERT INTO `president_news` (`id`, `date`, `title`, `body`) VALUES
(1, '2018-09-15 07:17:54', 'Testing', '<p>Testing body 2</p>\r\n'),
(2, '2018-09-15 07:20:30', 'An artist of his times, and ahead of them', '<p>ung, passionate, and wholeheartedly engaged in the pressing social issues of his day, Th&eacute;odore G&eacute;ricault&nbsp;was not only one of the most influential artists of the Romantic period, he may be said to have prefigured modern art. Despite his short life &mdash; the French artist died in 1824 at the age of 31 &mdash; G&eacute;ricault&rsquo;s choice of materials and subject matter make him particularly pertinent to today&rsquo;s media-savvy audience.</p>\r\n\r\n<p>Although best known for his epic painting &ldquo;The Raft of the Medusa&rdquo; (now in the Louvre), G&eacute;ricault also worked in lithographs and other easily reproduced media such as drawings in ink, graphite, chalk, and crayon, to share his work and extend his influence. Examples of these more intimate pieces, including several small and finely worked studies for the massive oil painting, now form the core of the Harvard Art Museums&rsquo;&nbsp;on view in the third-floor research gallery through Jan. 6, 2019.</p>\r\n\r\n<p>The bulk of the pieces in the four-part show come from the museum&rsquo;s own Grenville L. Winthrop collection, one of the most comprehensive of G&eacute;ricault in America, according to curator A. Cassandra Albinson, Margaret S. Winthrop Curator of European Art.</p>\r\n'),
(4, '2018-09-15 09:06:47', 'â€˜Errorâ€™ brings opportunity to metaLAB', '<p>The idea behind &ldquo;Error&rdquo; is that, on one hand, an error can be an opportunity rather than a mistake. Yet on the other hand, with big data surveillance, privacy invasion, and social media manipulation, the dream of a beautiful digital world seems a naive error that needs to be reconceptualized&shy; &mdash;&nbsp;<em>before</em>we make irreparable mistakes with artificial intelligence.</p>\r\n\r\n<p>MetaLAB was invited to join the festival by Eveline Wandl-Vogt of the Austrian Academy of Sciences; the U.S. Embassy of Austria supported the collaboration.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `president_spc_writ`
--

CREATE TABLE `president_spc_writ` (
  `id` int(11) NOT NULL,
  `img_thum_path` varchar(155) NOT NULL,
  `vdo_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `president_spc_writ`
--

INSERT INTO `president_spc_writ` (`id`, `img_thum_path`, `vdo_url`) VALUES
(6, 'images/staff/president_video1.jpg', 'https://www.youtube.com/embed/EY37Tq2cj7o'),
(7, 'images/staff/president_video2.jpg', 'https://www.youtube.com/embed/qIRjytgNuhM'),
(8, 'images/staff/president_video3.jpg', 'https://www.youtube.com/embed/gulzQ_2IyfI'),
(9, 'images/staff/president_video4.jpg', 'https://www.youtube.com/embed/2OOsEjCyaEw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_appontment_info`
--
ALTER TABLE `faculty_appontment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_development_info`
--
ALTER TABLE `faculty_development_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_helth_care`
--
ALTER TABLE `faculty_helth_care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_housing_info`
--
ALTER TABLE `faculty_housing_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_member_info`
--
ALTER TABLE `faculty_member_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_id` (`department_id`);

--
-- Indexes for table `faculty_retirment_info`
--
ALTER TABLE `faculty_retirment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `president_biography`
--
ALTER TABLE `president_biography`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `president_news`
--
ALTER TABLE `president_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `president_spc_writ`
--
ALTER TABLE `president_spc_writ`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_appontment_info`
--
ALTER TABLE `faculty_appontment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_development_info`
--
ALTER TABLE `faculty_development_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_helth_care`
--
ALTER TABLE `faculty_helth_care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty_housing_info`
--
ALTER TABLE `faculty_housing_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_member_info`
--
ALTER TABLE `faculty_member_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_retirment_info`
--
ALTER TABLE `faculty_retirment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `president_biography`
--
ALTER TABLE `president_biography`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `president_news`
--
ALTER TABLE `president_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `president_spc_writ`
--
ALTER TABLE `president_spc_writ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
