var j = jQuery.noConflict();
j( function() {
	j('#upload_btn').on('click',function(){
		j('#upload_file').trigger('click');
	});
	
	j('#upload_file').on('change', function(){
		fileRead();
	});
	
	j('#apply_link').on('click',function(){
        var job_id = j('#job_id').val();
		window.location.href = "../job_apply/list?job_id="+job_id;
    });

    $("input[name = 'create_btn']").click(function() {
        $('.error-color').html('');
    });
    
    let validator = j("#jobInfoForm").validate({
        focusCleanup: true,
        rules: {
            //ルールの設定
            job_title:{
                required: true,
                maxlength: 100
            },
            job_description: {
                required: true
            },
            hire_number:{
                required: true,
                digits: true
            },
            FromDate: {
                required: true
            },
            ToDate: {
                required: function(element) {
                    return $('#posted_date').val != ""
                },
                greaterThan: "#posted_date"
            }
        },
        //エラーメッセージの設定
        messages: {
            job_title: {
                required: 'タイトルを入力してください',
                maxlength: '100文字以内入力してください'
            },
            job_description: {
                required: '内容を入力してください'
            },
            hire_number: {
                required: '採用人数を入力してください',
                digits: '数字のみ入力してください'
            },
            FromDate: {
                required: '日付を入力してください'
            },
            ToDate: {
                required: '日付を入力してください',
                greaterThan: 'Posted Dateより大きい日付を入力してください'
            }
        },
        
        //エラーメッセージの表示場所を設定
        errorPlacement: function (err, elem) {
            console.log(err);
            switch(elem.attr("name")) {
                case "job_title":
                    $('#job_title-error').html(err.text());
                    break;
                case "job_description":
                    $('#job_description-error').html(err.text());
                    break;
                case "hire_number":
                    $('#hire_number-error').html(err.text());
                    break;
                case "FromDate":
                    $('#posted_date-error').html(err.text());
                    break;
                case "ToDate":
                    $('#expired_date-error').html(err.text());
                    break;
                default:
                    break;
            }
 
        }
    });
});

function fileRead() {
	// Get form
    //フォームのデータを変数formに格納
    var form = $('#jobInfoForm').get()[0];

    //FormData オブジェクトを作成
    var formData = new FormData( form );
    $("#upload_btn").prop("disabled", true);
    console.log(formData);
    j.ajax({
    	type: "POST",
    	url: "/ajax/fileUpload",
    	enctype: 'multipart/form-data',
    	data: formData,
    	processData: false,
    	contentType: false,
        cache: false,
        timeout: 600000,
        success: function (response) {
            if(response === "" || response === null || response === undefined){
                return false;
            }
            res = JSON.parse(response);
            
            if(res.data == undefined) {

                $("#job_description-error").html(res.error);
            } else {
            
                $("#job_description").val(res.data);
            }

            $("#upload_btn").prop("disabled", false);

        },
        error: function (e) {
        	
            $("#job_description").text(e.responseText);
            $("#upload_btn").prop("disabled", false);

        }
    })
}