<?php
	
	require_once('inc/header.php');
	require_once('inc/db/connect.php');
	require_once('inc/globals/functions.php');
	verify_user();
	$lessonNum[] = "";
	$i = 1;
	$lessonID = $_GET['Lid'];
	$getLesson = mysql_query('SELECT * FROM lessontable WHERE lessonID = "'.$lessonID.'"');
	$lesson = mysql_fetch_assoc($getLesson);
	$getModule = mysql_query('SELECT * FROM categorytable WHERE categoryID = "'.$lesson['lessonCategoryID'].'"');
	$module = mysql_fetch_assoc($getModule);
	$getLessonNum = mysql_query('SELECT lessonID FROM lessontable WHERE lessonCategoryID = "'.$module['categoryID'].'"');
	while ($getLessonNumArray = mysql_fetch_assoc($getLessonNum)) {
		$lessonNum[$i] = $getLessonNumArray['lessonID'];
		$i++;
	}
	$lessonNumber = array_search($lessonID, $lessonNum);
?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col border-col island">
			<h1><?php echo $module['categoryTitle'] ?></h1>
			<span class="gamma lesson-header">Lesson <?php echo $lessonNumber; ?>: <strong class="lesson-title"><?php echo $lesson['lessonTitle']?></strong></span>
			<!-- <div class="p lesson-progress">
				<div class="progress-measure" style="width: 33%;" data-tooltip="33% Complete"><span class="visually-hidden">33% Complete</span></div>
			</div> -->

			<div class="lesson-content">
				<div class="lesson-question">
					<div class="question-header island">
						<h2>Question 2 <span class="questions-total">of 3</span></h2>
						<p class="intro standalone">Lorem ipsum dolor sit amet, consectetur adipisicing elit?</p>
					</div>
					<ol class="question-answer-group standalone">
						<li class="question-answer isle selected-answer"><input checked class="alignleft qa-in" type="radio" value="q2-a1" name="q2" id="q2-a1"><label for="q2-a1">Lorem Ipsum</label></li>
						<li class="question-answer isle"><input class="alignleft qa-in" type="radio" value="q2-a2" name="q2" id="q2-a2"><label for="q2-a2">Dolor Sit</label></li>
						<li class="question-answer isle"><input class="alignleft qa-in" type="radio" value="q2-a3" name="q2" id="q2-a3"><label for="q2-a3">Amet Consectetur</label></li>
					</ol>
				</div>
				<div class="lesson-navigation cf island">
					<button class="butt butt-primary alignright">Next Question</button>
					<button class="butt alignleft">Go Back</button>
				</div>
			</div>
		</div>
		<div class="sidebar secondary-col island">
			<h2>Need some help?</h2>
			<p>Blah, blah, blah</p>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>