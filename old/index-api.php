<?php
/* * *
  # @ file	    : index.php
  # @ location	: /www/apache/htdocs/ccsd
  # @ author	: Clark County School District.
 test
 * * */
$debug = false;

if ($debug == true) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}


if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off") {
	$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: ' . $redirect);
	exit();
}
include('_includes/ccsd-global.php');

//NOTES: PLEASE DO NOT USE EDGE INCLUDES, PLEASE USE REAL REALITVE INCLUDES INSTEAD.
# set the page parameters
$page['ribbon'] = array('home', $home->url . '/');
//var_dump($page);
$page['title'] = 'Clark County School District';
$page['description'] = 'Rich, full-featured site offering school, employment, and community education program information.';

# include the site header
//include($home->inc['header']); 
include('_includes/markup/header.php');
//var_dump($home->inc['header']);

###### PAGE SPECIFIC ######
# news areas
//include($home->inc['ccsdnews']);
include('_includes/functions/ccsdnews.php');
//var_dump($home->inc['ccsdnews']);

$featured = array();
$newsroomjson = file_get_contents('_includes/newsroomdata.json');
$featured = json_decode($newsroomjson, TRUE);

$trending_sql = array();
$trending = file_get_contents('_includes/trending.json');
$trending_sql = json_decode($trending, TRUE);

$supeintdata = array();
$supedata = file_get_contents('_includes/supeintdata.json');
$supeintdata = json_decode($supedata, TRUE);


//echo"<pre>";var_dump($supeintdata);exit;
//$events = get_ccsd_events(6);
//$news = get_ccsd_news(5);
//$news_sections = array('general', 'students', 'schools', 'parents', 'employees', 'community');
////$news_list = get_ccsd_news_and_events(NULL,$news_section);
//foreach ($news_sections AS $news_section) {
//    $news_arr[$news_section] = get_ccsd_news_and_events(null, $news_section, 0, 5);
//}
//
//$straight_post = get_ccsd_news_straight_record(null,null,0,1);
# pat personally
//$pats = get_pat(null, 0, 3);

# needed for Jobs list
//include('/www/apache/htdocs/ccsd/employees/includes/functions.php');

# board meeting check
//var_dump($home->inc['live-board']);


$live_board_meeting = include($home->inc['live-board']);

//$live_board_meeting = include('_includes/functions/live-board-meeting.php');
#turn off live board meetings on Thursdays
#if(date("N") == "5" && (date("H") == 03)) {
#    $query = "UPDATE ccsd.streaming SET flash='0'";
#    mysql_query($query, $_dB_ccsd);
#}
?>
<script>(function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; window.key = 'WT8Z8BLT@PF6F1LT'; window.url = '//www.k12insight.com/'; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//www.k12insight.com/Lets-Talk/LtTabJs.aspx"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'Lets-Talk'));</script>


<h1 class="hidden">Clark County School District Homepage</h1>
<div id="page_wrap">
	<!-- SLIDER AREA -->
	<div class="slider-trending">
		<div class="trend-box">
			<h2 class="trend-title">Quick Links</h2>
			<ul id="trend_list" class="trending-list" style="display: block;">
				<li class="trend-item"><a href="/parents/infinite-campus.php">Campus Portal Parent Information </a></li>
				<li class="trend-item"><a href="https://ccsd.net/district/backtoschool/legal-notices.html">2024-2025 Back to School Legal Notices</a></li>
				<li class="trend-item"><a href="/district/data/">District Data</a></li>
				<li class="trend-item"><a href="https://recruitment.ccsd.net/">Recruitment Information</a></li>
				<li class="trend-item"><a href="/employees/current/services/">Employee Services </a></li>
				<li class="trend-item"><a href="/district/anti-racism/">Policy 5139 Anti-Racism, Equity, and Inclusion</a></li>
			</ul>
		</div>
		<?php
		//Featured News story on ccsd.net
		include('_includes/api/featured-news.php'); ?>

		<section>
			<!-- NEWS THUMBNAILS -->
			<div id="news_thumbs">

				<?php
				//left news story on ccsd.net
				include('_includes/api/left-news.php');
				?>
				
				<?php 
				//middle news story on ccsd.net
				include('_includes/api/middle-news.php');
				?>
				
				<?php 
				//right news story on ccsd.net
				include('_includes/api/right-news.php');
				?>

				<div class="clear-both" style="margin-bottom: 40px;"></div>
			</div>
			<!-- <div class="news-horiz-rule"></div> -->

			<div class="clear-both" style="margin-bottom: 40px;">
				<!-- END SLIDER AREA -->



				<!-- BOARD MEETING NOTIFICATION https://ccsd.eduvision.tv/live.aspx -->

				<?php include('includes/homepageVideo.php'); ?>

			</div>
			<!-- END BOARD MEETING NOTIFICATION -->



			<div align="center" style="margin-top: 40px;">
				<a class="BTSR-notice more-link2" href="https://backtoschool.ccsd.net/"><img
						src="https://ccsd.net/_static/images/2024-backtoschool.jpg" alt="Back to School" /></a>
			</div>

			<div align="center" style="margin-top:10px;margin-bottom:-35px;padding-bottom:10px;">
				<h2 class="BTSR-notice BTSR-label"><span><a class="BTSR-notice"
							href="https://ccsd.net/district/backtoschool/legal-notices.html">Back to School Legal
							Notices</a></span></h2>

			</div>
			<div align="center" style="margin-bottom:20px;height:70px;margin-left: 385px;margin-right: auto;">
				<a style="margin-right: 20px;" class="more-link"
					href="https://ccsd.net/district/backtoschool/assets/pdf/24-25-Back-to-School-Legal-Notices-English.pdf"
					target="_blank">English</a>
				<a class="more-link"
					href="https://ccsd.net/district/backtoschool/assets/pdf/24-25-Back-to-School-Legal-Notices-Spanish.pdf"
					target="_blank">Spanish</a>

			</div>






			<!--
  <div align="center" >
	  <a class="BTSR-notice" href="https://ccsd.net/district/dataincident/"><img src="/_static/images/CyberSecurity" alt="District CyberSecurity" /><br/ >
<div align="center">
		 <h2 class="BTSR-label">Notice of Cybersecurity Incident</h2>
	 </div>
 </a>
 </div>  
-->


			<!--
  <div align="center" >
	  <a class="BTSR-notice" href="https://data.ccsd.net/"><img src="/_static/images/AARSI-District-Data.jpg" alt="District Data" /><br/ >
<div align="center">
		 <h2 class="BTSR-label">CCSD’s District Data</h2>
	 </div>
 </a>
 </div>  
-->




			<!--
  <div align="center" >
	  <a class="BTSR-notice" href="https://data.ccsd.net/"><img src="/_static/images/AARSI-District-Data.jpg" alt="District Data" /><br/ >
<div align="center">
		 <h2 class="BTSR-label">CCSD’s District Data</h2>
	 </div>
 </a>
 </div>  
-->

			<!-- <insert code here manually for board meetings> -->
			<!--
	<section class="live-stream-notification">
	<div>		
		<p><strong>Graduation Events Live Streams</strong> <br>
			View Live Graduation Events
			<a href="https://ccsdgraduations.eduvision.tv/LiveEvents" target="_blank">Eduvision</a> 
		</p>
	</div>
	</section>
-->
			<!--
<section class="live-stream-notification">
 
	<div>		
		<p><strong>CCSD Live Stream</strong> <br>
			View the stream on <a href="https://ccsd.eduvision.tv/live.aspx" target="_blank">Eduvision</a> 
			or <a href="https://www.youtube.com/channel/UCb8dUIsat7U7lTjXYPFs_Ww" target="_blank" >YouTube</a>
		</p>
		<div class="board-meeting-disclaimer">
			If you're having trouble viewing the live stream, call 702-799-2988
		</div> 
		 <div id="spanish-on" class="dynamic-content">
			 <p><strong>Español:</strong> <a href="https://ccsd.eduvision.tv/LiveChannelPlayer.aspx?qev=6zseFFegtzjNZq8essXM9Q%253d%253d" target="_blank">Eduvision</a></p>
			 <p class="board-meeting-disclaimer">Si tie ne problemas con el link en español, llame al (702) 855-9646 y use la clave 776225 para accesar la junta exclusivamente con audio. Por favor ponga su teléfono en silencio cuando entre la llamada.</p>
		 </div>
			
			
	</div> 
		
</section>
-->


			<div class="news-horiz-rule"></div>


			<!-- MAIN CONTENT AREA -->
			<main id="main_content_wrap">
				<!-- HOMEPAGE CARDS/TILES -->
				<div class="content-full-wrap">
					<div id="card1" class="card-wrapper">
						<a id="we-are" href="https://weare.ccsd.net/">
							<div class="card-image"><img src="/_static/images/WeAre.jpg" alt="" /></div>
							<h2 class="card-title">We are CCSD </h2>
						</a>
						<div class="card-content">
							<div class="card-text">The Clark County School District celebrates the collective effort of
								the
								Southern Nevada community to educate the children of Clark County.</div>
						</div>
					</div>

					<div id="card2" class="card-wrapper cards-bottom-row">
						<a id="teach-vegas" href="https://recruitment.ccsd.net/">
							<div class="card-image"><img src="/_static/images/Recruitment-front.png" alt="" /></div>
							<h2 class="card-title">Teach with CCSD</h2>
						</a>
						<div class="card-content">
							<div class="card-text">The Clark County School District is seeking highly motivated
								employees
								who are committed to helping students thrive.</div>
						</div>
					</div>

					<div id="card3" class="card-wrapper">
						<a id="contact-us" href="https://ccsd.net/contactus/">
							<div class="card-image"><img src="/_static/images/LetsTalk.jpg" alt="" /></div>
							<h2 class="card-title">Contact Us</h2>
						</a>
						<div class="card-content">
							<div class="card-text">Ask <span
									style="color:#707070;font-weight: 600;">questions.</span><br>
								Get <span style="color:#707070;font-weight: 600;">answers.</span><br>
								Share <span style="color:#707070;font-weight: 600;">feedback.</span>
							</div>
						</div>
					</div>
					<div id="card4" class="card-wrapper">
						<a id="trustees" href="https://ccsd.net/trustees/">
							<div class="card-image"><img src="/_static/images/newdesign/trustees-new.jpg"
									alt="Board of School Trustees group photo" /></div>
							<h2 class="card-title">Trustees</h2>
						</a>
						<div class="card-content">
							<div class="card-text">Get to know your Board of School Trustees and learn about upcoming
								board
								meetings.</div>
						</div>
					</div>
					<div id="card5" class="card-wrapper cards-bottom-row">
						<a id="newsroom" href="http://newsroom.ccsd.net/">
							<div class="card-image"><img src="/_static/images/newdesign/newsroom.jpg" alt="" /></div>
							<h2 class="card-title">Newsroom</h2>
						</a>
						<div class="card-content">
							<div class="card-text">Get the latest news, information and press releases about CCSD.</div>
						</div>
					</div>
					<div id="card6" class="card-wrapper cards-bottom-row ">
						<a id="safevoice" href="https://ccsd.net/students/safevoice">
							<div class="card-image"><img src="/_static/images/newdesign/safevoice.jpg" alt="" /></div>
							<h2 class="card-title">SafeVoice</h2>
						</a>
						<div class="card-content">
							<div class="card-text">SafeVoice is the new statewide reporting system for threats to school
								and
								reports of bullying.</div>
						</div>
					</div>
					<div id="card7" class="card-wrapper">
						<a id="infinite-campus" href="https://ccsd.net/parents/infinite-campus-choice.php">
							<div class="card-image"><img src="/_static/images/newdesign/infinite-campus.jpg" alt="" />
							</div>
							<h2 class="card-title">Infinite Campus</h2>
						</a>
						<div class="card-content">
							<div class="card-text">A fast and easy way for parents and students to check their grades,
								assignments and class schedules.</div>
						</div>
					</div>
					<!--
	<div id="card7" class="card-wrapper cards-bottom-row">
			<a id="capital-improvement" href="https://sites.google.com/nv.ccsd.net/reorg">
				<div class="card-image"><img src="/_static/images/newdesign/1-for-kids-min.jpg" alt="" /></div>
				<h2 class="card-title">School Organizational Teams</h2>
			</a>
				<div class="card-content">
					<div class="card-text">Information related to SOTs and NRS 388G</div>
				</div>
	</div>
-->

					<div id="card8" class="card-wrapper">
						<a id="focus-2024" href="https://ccsd.net/district/superintendent-selection/">
							<div class="card-image"><img
									src="/_static/images/newdesign/superintendent-selection-search-new.png" alt="" />
							</div>
							<h2 class="card-title">Superintendent Selection Search</h2>
						</a>
						<div class="card-content">
							<div class="card-text">Learn more about the process of finding the next Superintendent of
								Schools for the Clark County School District (CCSD).</div>
						</div>
					</div>

					<!--
				<div id="card8" class="card-wrapper">
					<a id="focus-2024" href="https://sites.google.com/nv.ccsd.net/focus2024">
						<div class="card-image"><img src="/_static/images/newdesign/focus-2024.jpg" alt="" /></div>
						<h2 class="card-title">Focus: 2024</h2>
					</a>
					<div class="card-content">
						<div class="card-text">Learn more about CCSD's five-year strategic plan and get updates on our
							progress.</div>
					</div>
				</div>
-->


					<div style="clear:both;"></div>
				</div>
				<br />
				<!--
 <div align="center" >
	  <a class="BTSR-notice" style="margin-top:-35px !important;" href="https://ccsd.net/district/dataincident/">
--><!-- <img src="/_static/images/CyberSecurity" alt="District CyberSecurity" /> --><!-- <br/ > -->
				<!--
<div align="center">
		 <h2 class="BTSR-label">Notice of Cybersecurity Incident</h2>
	 </div>
 </a>
 </div>  
-->



				<!-- END HOMEPAGE CARDS/TILES -->


				<!-- TEMPORARY NEW SUP SECTION (OLD SUP BLOG IS IN NEXT SECTION BELOW) -->
				<div id="new_sup_section">
					<div class="hero"><img src="/_static/images/superintendent_banner.png" alt=""></div>
					<div class="sup-content">
						<h2>Interim Superintendent</h2>
						<span class="sup-name">Dr. Brenda Larsen-Mitchell</span>
						<p>The Clark County School District (CCSD) serves 300,000 students - each with unique skills,
							talents, passions, and stories to tell, each of whom deserves the best education possible to
							allow them to realize their hopes and dreams for the future.</p>
						<!-- 			<p>The Clark County School District (CCSD) serves 300,000 students - and each only has one shot at school. I felt this urgency every day in my first year serving as your superintendent. After a 90-day listening tour throughout our community, the Board of Trustees and my team set our five-year strategic plan, <a href="http://focus2024.ccsd.net/">Focus:2024</a>...</p> -->

						<!-- 			<a id="sup-blog-btn" class="more-link" href="/district/superintendent/">Read more from Dr. Jara</a> -->
						<div style="clear:both;"></div>
					</div>

				</div>
			</main>

			<!-- END MAIN CONTENT WRAP -->

	</div>
	<!-- <script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];window.key='WT8Z8BLT@PF6F1LT';window.url='//www.k12insight.com/';if (d.getElementById(id))return;js = d.createElement(s);js.id = id;js.src = "//www.k12insight.com/Lets-Talk/LtTabJs.aspx";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'Lets-Talk'));</script> -->
	<!-- /page_wrap -->
	<?php //var_dump($home->inc['footer']); ?>
	<?php //include($home->inc['footer']); ?>
	<?php include('_includes/markup/footer-tracking.php'); ?>
	<script src="_static/js/ccsd.2014.01.31.js"></script>
	<script>(function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; window.key = 'WT8Z8BLT@PF6F1LT'; window.url = '//www.k12insight.com/'; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//www.k12insight.com/Lets-Talk/LtTabJs.aspx"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'Lets-Talk'));</script>