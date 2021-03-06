<?php
	$isAdmin = true;
	$verify = true;
	require_once('../inc/header.php');
	$questionID = $_GET['Qid'];
	$getQuestion = mysql_query('SELECT * FROM questiontable WHERE questionID = "'.$questionID.'"');
	$question = mysql_fetch_assoc ($getQuestion);
	$answers = $question['questionAnswers'];
	decode_array($answers);
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Edit Question</h1>
			<p>Welcome to the Modules Page! From here, you view the current modules and edit existing ones, remove modules and more.</p>
			<form action="inc/php/edit_question.php" method="post" enctype="multipart/form-data">
            	<label for ="image">Question Image</label>
                <?php if ($question['questionImg']){ ?><img class="question-image p" src="../../../assets/lesson-images/<?php echo $question['questionImg'] ?>" /><?php } ?>
                <input type="file" class="input" name="image" id="image"/>            
            	<label for="question-title">Question</label>
                <input type="text" name="question-title" value="<?php echo $question['questionName']?>" class="input"/>
				<div class="grid">
                	<div class="unit one-of-five">
                        <label for="correct-answer">Correct Answer</label>
                    </div>
                    <div class="unit four-of-five">
                        	<label for="answer">Answer</label>
                    </div>
                	<div class="unit alignmiddle one-of-five">
                        <input <?php if($question['questionAnswerIndex'] == 0){?> checked="checked" <?php }?> type="radio" name="correct-answer" value="0"/>
                    </div>
                    <div class="unit four-of-five">
                        <input type="text" class="input" value = "<?php echo $arrayResult[0] ?>" name="answer[]" />
                    </div>
                	<div class="unit alignmiddle one-of-five">
                        <input <?php if($question['questionAnswerIndex'] == 1){?> checked="checked" <?php }?> type="radio" name="correct-answer" value="1"/>
                    </div>
                    <div class="unit four-of-five">
                        <input type="text" class="input" value = "<?php echo $arrayResult[1] ?>" name="answer[]" />
                    </div>
                	<div class="unit alignmiddle one-of-five">
                        <input <?php if($question['questionAnswerIndex'] == 2){?> checked="checked" <?php }?> type="radio" name="correct-answer" value="2"/>
                    </div>
                    <div class="unit four-of-five">
                        <input type="text" class="input" value = "<?php echo $arrayResult[2] ?>" name="answer[]" />
                    </div>
                	<div class="unit alignmiddle one-of-five">
                        <input <?php if($question['questionAnswerIndex'] == 3){?> checked="checked" <?php }?> type="radio" name="correct-answer" value="3"/>
                    </div>
                    <div class="unit four-of-five">
                        <input type="text" class="input" value = "<?php echo $arrayResult[3] ?>" name="answer[]" />
                    </div>
                </div>
                <label for="help-text">Helper Text</label>
                <textarea name="help-text" class="input"><?php echo $question['questionHelperText']?></textarea>
                <input type="hidden" name="question-id" value="<?php echo $questionID ?>" />
                <input type="submit" class="butt butt-primary alignright" value="Submit"/>
            </form>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>
