jQuery(document).ready(function(){
	      showStudentInfo();

	jQuery('.save').click(function(){
          studentInfoInsert();
          
	});

	jQuery('.update').click(function(){
		studentInfoUpdate();
	});
})

function studentInfoInsert(){
	var studentName=jQuery('input#studentName').val();
	var studentRoll=jQuery('input#studentRoll').val();
	var studentPhone=jQuery('input#studentPhone').val();
	var studentAddress=jQuery('input#studentAddress').val();
	$.ajax({
		'url':'croud.php',
		'type' :'post',
		'data':{
			'studentName':studentName,
			'studentRoll':studentRoll,
			'studentPhone':studentPhone,
			'studentAddress':studentAddress,

			'checker':'userInsert',
		},
		'success':function(result){
			jQuery('.msg').html(result).fadeIn();
		     showStudentInfo();
			jQuery('.msg').html(result).fadeOut(2000);
		}
	});
}


function studentInfoUpdate(){
	var studentName=jQuery('input#studentName').val();
	var studentRoll=jQuery('input#studentRoll').val();
	var studentPhone=jQuery('input#studentPhone').val();
	var studentAddress=jQuery('input#studentAddress').val();
	var id=jQuery('input#id').val();
	$.ajax({
		'url':'croud.php',
		'type':'post',
		'data':{
			'id':id,
			'studentName':studentName,
			'studentRoll':studentRoll,
			'studentPhone':studentPhone,
			'studentAddress':studentAddress,

            'checker':'userUpdate',
		},
		'success':function(result){
			jQuery('.msg').html(result).fadeIn();
			 showStudentInfo();
			jQuery('.msg').html(result).fadeOut(2000);
		}
	});
}

function  showStudentInfo(){
	$.ajax({
		'url':'croud.php',
		'type':'post',
		'data':{
          'checker': 'showInfo',
		},
		'success': function(result){
			jQuery('.show').html(result).fadeIn();
		}
	});
}

function showDatforUpdate(id){
		$.ajax({
		'url':'croud.php',
		'type':'post',
		'data':{
          'checker': 'showInfoinputforupfate',
          'id': id,
		},
		'success': function(result){
			var user= JSON.parse(result);

			jQuery('#studentName').val(user.studentName);
			jQuery('#studentRoll').val(user.studentRoll);
			jQuery('#studentPhone').val(user.studentPhone);
			jQuery('#studentAddress').val(user.studentAddress);
			jQuery('#id').val(user.id);
		}
	});
		
}