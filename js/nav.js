$().ready(function () {
    //教学信息未审核数据表查询数据
    $('#table_teach_info_nopass').dataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<input type='checkbox' class='check_teach_info_nopass'/>"
        }],
        "ajax": "data/teach_info_nopass.php",
    });
    //理论教学数据信息加载
    $('#table_teach_info_pass').dataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": '<span title="修改"class="glyphicon glyphicon-pencil update" data-toggle="modal" data-target="#add_class">&nbsp;</span> <span title="删除" class="glyphicon glyphicon-trash del_lilun"></span>'
        }],
        "ajax": "data/start_loading_data.php?num="+3+"&name="+localStorage.u_name,
    });
    //实践环节数据信息加载
    $('#shijian').dataTable({
          "columnDefs": [{
              "targets": -1,
              "data": null,
              "defaultContent": '<span title="修改"class="glyphicon glyphicon-pencil up_sj" data-toggle="modal" data-target="#add_shijian">&nbsp;</span> <span title="删除" class="glyphicon glyphicon-trash del_shijian"></span>'
        }],
        "ajax": "data/start_loading_data.php?num="+1+"&name="+localStorage.u_name,
    });
    //额外工作量数据信息加载
    $("#ext_work").dataTable({
    	"columnDefs": [{
              "targets": -1,
              "data": null,
              "defaultContent": '<span title="删除" class="glyphicon glyphicon-trash del_extwork"></span>'
        }],
        "ajax": "data/start_loading_data.php?num="+4+"&name="+localStorage.u_name,
    });
    //毕业设计数据信息加载
    $('#bishe').dataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<span title='修改'class='glyphicon glyphicon-pencil up_bj' data-toggle='modal' data-target='#add_bishe'>&nbsp;</span><span title = '删除' class = 'del_bishe glyphicon glyphicon-trash'> </span >",
        }],
        "ajax": "data/start_loading_data.php?num="+2+"&name="+localStorage.u_name,
    });
    //修改密码
    $("#update_upwd").on("click", function () {
        if (($("#ok_new_pwd").val()) === ($("#new_pwd").val())) {
            $.ajax({
                url: "data/update_pwd.php",
                type: "POST",
                data: "ok_new_pwd="+ $("#ok_new_pwd").val()+"&u_name="+localStorage.u_name,
                success: function (data) {
                    if (data == 'sql执行成功') {
                        $("#pwd_alert > p").html('');
                        $("#pwd_alert").removeClass("alert-warning").addClass("alert-success").css("display", "block").append('<p><strong>恭喜！</strong>密码修改成功!!!</p>');
                    }
                },
            });
        } else {
            $("#pwd_alert > p").html('');
            $("#pwd_alert").removeClass("alert-warning").addClass("alert-warning").css("display", "block").append('<p><strong>警告！</strong>两次密码输入不一样!!!</p>');
        }
    });
    //一键换肤
    //从localStorge中读取mainStyle样式
    function read_style() {
        var mainStyle = localStorage.getItem("mainStyle");
        if (mainStyle != "undefined") {
            $("body").removeClass().addClass(mainStyle);
        }
        setTimeout(read_style, 1000);
    }

    read_style();
    //向localStorge中写入mainStyle样式
    function write_style() {
        var bodyClass = $("body").attr('class');
        if (bodyClass !== " pace-running") {
            localStorage.setItem("mainStyle", bodyClass);
        }
        setTimeout(write_style, 50);
    }

    write_style();
    //导航栏链接
    function navlink() {
        var target = "#" + $(this).attr("class");
        $(".right").css("display", "none");
        $(target).css("display", "block");
    }

    $(".navbar-default .nav > li > a").on("click", navlink);
    $(".person_ziliao > li > a").on("click", navlink);
    $(".nav.navbar-top-links .link-block a").on("click", navlink);
    //额外工作量提交
    $("#list li").on("click",function(){
        $("#dropdownMenu2").html($(this).text().trim()+'<span class="caret"></span>');
    })
    $(".ext_work").on("click",function(){
        $.ajax({
            url: "data/ext_work.php?num=1&type="+$("#dropdownMenu2").text()+"&name="+localStorage.u_name,
            type: "POST",
            success: function (data) {
                if(data.trim()=="repeat"){
                    swal({title:"警告",text:"您已申请或未通过,请勿重复申请!!!",type:"error"});
                    return;
                }else if(data.trim()=="errtype"){
                    swal({title:"提示",text:"请您选择合适的类型!!!",type:"error"});
                    return;
                }else{
                    $.ajax({
                        url: "data/ext_work.php?num=2&type="+$("#dropdownMenu2").text()+"&name="+localStorage.u_name,
                        type: "POST",
                        success: function (data) {
                            if(data.trim()=="ok"){
                                swal({title:"申请成功",text:"已提交,等待管理员审核!!!",type:"success"})
                            }
                        }
                    });
                }
            }
        });

    })
    //头像上传实时刷新
    function head() {
        var user=document.cookie.split(";")[0].split("=")[1];
        $.ajax({
            url: "http://127.0.0.1/teacher/upload/"+user+".jpg",
            type: "POST",
            success: function (data) {
                $(".img-circle:first").removeAttr("src").attr("src", "http://127.0.0.1/teacher/upload/"+user+".jpg");
            }
        })
    }

    function header() {
        timeId = setTimeout(head, 1000);
    }

    $(".button_upload").on("click", header);
    //全选按钮
    $("input[data-check^='check']").on('click', function () {
        var str1 = "." + $(this).attr("data-check");
        var box = $(this).prop("checked");
        if (box) {
            $(str1).prop("checked", true);
        } else {
            $(str1).prop("checked", false);
        }
    });
    //数据加载
    //  $(".navbar-default .nav > li > a").on("click", function () {
    //      var target = $(this).attr("class");
    //      if (target !== undefined) {
    //          var url = "data/" + target + ".php";
    //          $.ajax({
    //              url: url,
    //              type: "POST",
    //              success: function (data) {
    //                  var html = "";
    //                  $.each(data, function (i, n) {
    //                      html += `<tr class="gradeX">
    //										<td class="text-center"><input type="checkbox" class="check01" /></td>
    //										<td class="text-center">${n.teacher_id}</td>
    //										<td class="text-center">${n.class_id}</td>
    //										<td class="text-center">${n.class_name}</td>
    //										<td class="text-center">${n.class_type}</td>
    //										<td class="text-center">${n.grade}</td>
    //										<td class="text-center">${n.study_hours}</td>
    //										<td class="text-center">${n.week_num}</td>
    //										<td class="text-center">${n.xueyuan}</td>
    //										<td class="text-center">${n.banji}</td>
    //										<td class="text-center">${n.ext_people}</td>
    //										<td class="text-center">${n.shiji_people}</td>
    //										<td class="text-center">${n.note}</td>
    //										</tr>`;
    //                  });
    //                  $("#" + target + " table>tbody").html(html);
    //              },
    //              error: function (data) {
    //                  alert("用户数据导入失败!!!");
    //                  //                    $( '#serverResponse').html(data.status + " : " + data.statusText + " : " + data.responseText);
    //              }
    //          });
    //      }
    //
    //  });
    //上传xls文件
    $("#up_file").on('click', function () {
        var fileObj = document.getElementById("f").files[0];
        var formData = new FormData();
        formData.append("file", fileObj);
        console.log(fileObj);
        $.ajax({
            url: "data/file_upload.php",
            type: "POST",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data === "data_into_succ") {
                    alert("用户数据导入成功!!!");
                }
            },
            error: function (data) {
                alert("用户数据导入失败!!!");
                //                    $( '#serverResponse').html(data.status + " : " + data.statusText + " : " + data.responseText);
            }
        });
    });
    //发邮件
    $("a[title='Send']").on("click",function(){
    	var received=$("#send_user").val()
    	var theme=$("#theme").val()
    	var content=encodeURIComponent($(".note-editable").html());
        console.log(content);
    	var send=localStorage.u_name;
    	var oDate = new Date();
		var sendtime = oDate.getTime();
		var isread="否";
		$.ajax({
                url: "data/email.php?send="+send+"&received="+received+"&theme="+theme+"&content="+content+"&sendtime="+sendtime+"&isread="+isread+"&num="+1,
                dataType : 'text',
                type: "POST",
                success: function (data) {
               	if(data=="ok"){
               		alert("邮件发送成功!!!");
               	}
                }
            });
    })
    //删除邮件
    $("button[data-original-title='删除邮件']").on("click",delectEmail);
    $("a[data-original-title='删除邮件']").on("click",delectEmail);
    function delectEmail(){
        var theme=$(".mail-tools:eq(1)").children("h3").children('a').html();
        var send=$(".mail-tools:eq(1)").children("h5").children('a').html();
        $.ajax({
            url: "data/email.php?send="+send+"&theme="+theme+"&num="+2,
            dataType : 'text',
            type: "POST",
            success: function (data) {
                if(data=="ok"){
                    alert("邮件删除成功!!!");
                    window.location = './index.html';
                }
            }
        });
    };
    //回复
    $("a[title='back']").on("click",function(){
        $("#mail_detail").css("display","none");
        $("#mail_compose").css("display","block");
        $("#send_user").val($(".mail-tools:eq(1)").children("h5").children('a').html());

    });
    //下一封
    $("a[title='next']").on("click",function(){


    });
    //教学信息未审核通过按钮事件
    function teach_info_pass(){
        $("input[class^='check']").prop("checked", function( i, val ) {
            console.log(i);
        });
    }
    //选择按钮点击事件
    //var class_array=[];
    //$("tbody").delegate("input[class^='check']",'click',function(){
    //    if($(this).prop("checked")){
    //        var data=$(this).parent().siblings("td:eq(1)").text();
    //        console.log(class_array.indexOf(data));
    //        if(class_array.indexOf(data)){
    //            class_array.push(data);
    //            console.log(class_array);
    //        }
    //    }
    //})
 	var th=null;
	//额外工作量删除图表点击事件
    $("tbody").delegate(".del_extwork",'click',function(){
        var th=$(this);
        var stu_name=th.parent().siblings("td:eq(2)").text();
        console.log(stu_name);
        var url="data/gradution.php?num=4&stu_name="+stu_name+"&uname="+localStorage.u_name;
        swal({title:"您确定要删除这条信息吗?",
                text:"删除后将无法恢复，请谨慎操作！",
                type:"warning",
                showCancelButton:true,confirmButtonColor:"#DD6B55",
                confirmButtonText:"删除",
                closeOnConfirm:false,
                closeOnCancel:false},
                function(isConfirm){
                    if(isConfirm){
                        $.ajax({
                            url: url,
                            type: "POST",
                            success: function (data) {}
                        });
                        th.parent().parent().fadeOut("slow");
                        swal("删除成功！","您已经永久删除了这条信息。","success")
                    }else{
                        swal("已取消","您取消了删除操作！","error")
                    }
                }
        );
    });
    //毕业设计删除图表点击事件
    $("tbody").delegate(".del_bishe",'click',function(){
        var th=$(this);
        var stu_name=th.parent().siblings("td:eq(4)").text();
        var url="data/gradution.php?num=1&stu_name="+stu_name;
        swal({title:"您确定要删除这条信息吗?",
                text:"删除后将无法恢复，请谨慎操作！",
                type:"warning",
                showCancelButton:true,confirmButtonColor:"#DD6B55",
                confirmButtonText:"删除",
                closeOnConfirm:false,
                closeOnCancel:false},
                function(isConfirm){
                    if(isConfirm){
                        $.ajax({
                            url: url,
                            type: "POST",
                            success: function (data) {}
                        });
                        th.parent().parent().fadeOut("slow");
                        swal("删除成功！","您已经永久删除了这条信息。","success")
                    }else{
                        swal("已取消","您取消了删除操作！","error")
                    }
                }
        );
    });
    //理论教学删除图标点击事件
    $("tbody").delegate(".del_lilun",'click',function(){
        var th=$(this);
        var kech_name=th.parent().siblings("td:eq(0)").text();
        var class_name=th.parent().siblings("td:eq(5)").text();
        var url="data/gradution.php?num=2&kc="+kech_name+"&cn="+class_name;
        swal({title:"您确定要删除这条信息吗?",
                text:"删除后将无法恢复，请谨慎操作！",
                type:"warning",
                showCancelButton:true,confirmButtonColor:"#DD6B55",
                confirmButtonText:"删除",
                closeOnConfirm:false,
                closeOnCancel:false},
                function(isConfirm){
                    if(isConfirm){
                        $.ajax({
                            url: url,
                            type: "POST",
                            success: function (data) {}
                        });
                    th.parent().parent().fadeOut("slow");
	                swal("删除成功！","您已经永久删除了这条信息。","success")
                    }else{
                        swal("已取消","您取消了删除操作！","error")
                    }
                }
        );
    });
    //理论教学修改图标点击事件
    $("tbody").delegate(".update",'click',function(){
        $("#add_class").find(".modal-title").html("修改课程");
        $(".add_class").html("修改");
        th=$(this).parent();
        var names=['class_name','score','nianji','zhuanye','class_type','banji','kaishi','stu_num','study_time'];
        for(var i=0;i<9;i++){
            $(`input[name='${names[i]}']`).val(th.siblings(`td:eq(${i})`).text());
        }
    });
    //实践教学删除图标点击事件
    $("tbody").delegate(".del_shijian",'click',function(){
        th=$(this);
        var kech_name=th.parent().siblings("td:eq(0)").text();
        var class_name=th.parent().siblings("td:eq(5)").text();
        var url="data/gradution.php?num=3&kc="+kech_name+"&cn="+class_name;
        swal({title:"您确定要删除这条信息吗?",
                text:"删除后将无法恢复，请谨慎操作！",
                type:"warning",
                showCancelButton:true,confirmButtonColor:"#DD6B55",
                confirmButtonText:"删除",
                closeOnConfirm:false,
                closeOnCancel:false},
                function(isConfirm){
                    if(isConfirm){
                        $.ajax({
                            url: url,
                            type: "POST",
                            success: function (data) {}
                        });
                    th.parent().parent().fadeOut("slow");
	                swal("删除成功！","您已经永久删除了这条信息。","success")
                    }else{
                        swal("已取消","您取消了删除操作！","error")
                    }
                }
        );
    });
    //实践教学修改图标点击事件
    $("tbody").delegate(".up_sj",'click',function(){
        $("#add_shijian").find(".modal-title").html("修改实践教学");
        $(".add_shijian").html("修改");
        th=$(this).parent();
        var names=['class_name','class_type','score','study_time','nianji','zhuanye','banji','kaishi','stu_num',];
        for(var i=0;i<9;i++){
            $(`input[name='${names[i]}']`).val(th.siblings(`td:eq(${i})`).text());
        }
    });
    //毕设教学修改图标点击事件
    $("tbody").delegate(".up_bj",'click',function(){
        $("#add_bishe").find(".modal-title").html("修改毕设教学");
        $(".add_bishe").html("修改");
        th=$(this).parent();
        var names=['class_name','class_type','score','study_time','nianji','zhuanye','banji','kaishi'];
        for(var i=0;i<8;i++){
            $(`input[name='${names[i]}']`).val(th.siblings(`td:eq(${i})`).text());
        }
    });
    //毕设按钮点添加毕设按击事件
    $(".add_bishe").on("click",function(){
        $(this).prev().click();
        var data=$('#add_bj').serialize();
        var str=$("#add_bishe").find(".modal-title").html();
        var num=null;
        var title='';
        if(str=="修改毕设教学"){
            num=6;
            title="修改成功";
            data=data+"&num="+num+"&uname="+localStorage.u_name+'&d1='+th.siblings(`td:eq(4)`).text();
            console.log(th.siblings(`td:eq(4)`).text());
        }else if(str=="添加毕设教学"){
            num=5;
            title="添加成功";
            data=data+"&num="+num+"&uname="+localStorage.u_name;
        }
        $.ajax({
            url: "data/add.php",
            data: data,
            type: "POST",
            success: function (data) {
                if(data.trim()=="ok"){
                    swal({title:title,text:"已提交,等待管理员审核!!!",type:"success"})
                }
            }
        });
    })
    //添加课程确定按钮点击事件
    $(".add_class").on("click",function(){
        $(this).prev().click();
        var data=$('#add').serialize();
        var str=$("#add_class").find(".modal-title").html();
        var num=null;
        var title='';
        if(str=="修改课程"){
            num=2;
            title="修改成功";
            data=data+"&num="+num+"&uname="+localStorage.u_name+'&d1='+th.siblings(`td:eq(0)`).text()+'&d2='+th.siblings(`td:eq(5)`).text();
        }else if(str=="添加课程"){
            num=1;
            title="添加成功";
            data=data+"&num="+num+"&uname="+localStorage.u_name;
        }
        $.ajax({
            url: "data/add.php",
            data: data,
            type: "POST",
            success: function (data) {
                if(data.trim()=="ok"){
                    swal({title:title,text:"已提交,等待管理员审核!!!",type:"success"})
                }
            }
        });
    })
    //添加实践教学按钮点击事件
    $(".add_shijian").on("click",function(){
        $(this).prev().click();
        var data=$('#add_sj').serialize();
        console.log(data);
        var str=$("#add_shijian").find(".modal-title").html();
        var num=null;
        var title='';
        if(str=="修改实践教学"){
            num=3;
            title="修改成功";
            data=data+"&num="+num+"&uname="+localStorage.u_name+'&d1='+th.siblings(`td:eq(0)`).text()+'&d2='+th.siblings(`td:eq(5)`).text();
        }else if(str=="添加实践教学"){
            num=4;
            title="添加成功";
            data=data+"&num="+num+"&uname="+localStorage.u_name;
        }
        $.ajax({
            url: "data/add.php",
            data: data,
            type: "POST",
            success: function (data) {
                if(data.trim()=="ok"){
                    swal({title:title,text:"已提交,等待管理员审核!!!",type:"success"})
                }
            }
        });
    })
	//判断修改和删除按钮能不能点击
	var time=setInterval(panduan,2000);
	function panduan(){
		function inner(c1,c2,c3){
			$(`#${c1}`).find(`tbody tr td:nth-child(${c2})`).each(function(indx,val){
				if($(this).html()=="已加入核算"){
					$(this).next().css("cursor","not-allowed");
					$(this).next().children().css({"cursor":"not-allowed","color":"#ccc"}).removeAttr("data-target").removeClass(`${c3}`);
				}
			});
		}
		inner("shijian",11,"del_shijian");
		inner("table_teach_info_pass",10,"del_lilun");
		inner("ext_work",5,"del_extwork");
		inner("bishe",9,"del_bishe");
		if(time>5){
			clearInterval(time);
		}
	}
});
