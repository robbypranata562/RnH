var global = new function() {
	this.getmenu = function() {
		$.ajax({
			type: "GET",
			url: "../Login/get_menu",
			cache: false,
			success: function(data)
			{
				var menu = "";
				var last_parent = "";
				var is_first_child = true;
				for (var i in data) {
					//console.log(data[i]);
					// if (data[i].is_parent == "1"){
					// 	menu += '<li class ="active treeview"><a href=""><i class="'+data[i].menu_icon+'"></i> <span>'+data[i].menu_name+'</span>';
					// 	menu += '<span class="pull-right-container"><i class="ion-ios-arrow-left"></i></span></a>';
					// 	last_parent = data[i].p_menu_id;
					// 	//continue;
					// 	console.log('1 parent');
					// }

					if (data[i].is_parent == "0" && last_parent == data[i].menu_parent && is_first_child == true ){
						menu += '<ul class="treeview-menu">';
							menu += '<li class="active">';
								menu += '<a href="#'+data[i].menu_controller+'">';
									menu += '<i class="'+data[i].menu_icon+'"> <span>'+data[i].menu_name+'</span> </i>';
								menu += '</a>';
							menu += '</li>';
							is_first_child = false; 
							//continue;
							//console.log('1 child');
					} else if (data[i].is_parent == "0" && last_parent == data[i].menu_parent && is_first_child == false){
							menu += '<li>';
								menu += '<a href="#'+data[i].menu_controller+'">';
									menu += '<i class="'+data[i].menu_icon+'"> <span>'+data[i].menu_name+'</span> </i>';
								menu += '</a>';
							menu += '</li>';
							//continue;
							//console.log('next child');
					}

					if (data[i].is_parent == "1"){
						// console.log('masuk sini');
						// console.log(data[i].is_parent);
						// console.log(last_parent);
						// console.log(data[i].menu_parent);
						menu += '</ul>';
						menu += '</li>';
						menu += '<li class ="active treeview"><a href=""><i class="'+data[i].menu_icon+'"></i> <span>'+data[i].menu_name+'</span>';
						menu += '<span class="pull-right-container"><i class="ion-ios-arrow-left"></i></span></a>';
						last_parent = data[i].p_menu_id;
						//continue;
						//console.log('next parent');
					}
				}
				
				 $("#sidebarmenu").append(menu);
			}
		});
	}

	this.cek = function (){
		alert('insert');
	}
    this.loadMethod = function(controller) {
        page = '.box-body';
        $.ajax({
            type: "GET",
            url: "../"+controller,
            cache: false,
            beforeSend: function() {
               // $('#loading').show();
            },
            success: function(html)
            {
                $(page).html(html);
                //$('#loading').fadeOut('slow');
            }
        });
    }
	$(window).bind("hashchange", function() {
        var url = location.hash;
        var breadcrumb = '';
        url = url.replace('#', '')
        //console.log(url);
        //if (url !== "") {
           // if (url.split('/').length > 1) {
                global.loadMethod(url);
           // }   
    })
    this.CRUD = function(IDForm) {
        var controller = $(IDForm).attr('action');
        var index = controller.split('/')[0];
        var formData = $(IDForm).serialize(); //mengambil isi dari form
        $.ajax({
            type: "POST",
            url: controller,
            data: formData,
            success: function(html) {
                document.location.hash = index;
                $("#success-info").html(html).show();
                $("#success-info").fadeOut(8000);
                $("html,body").scrollTop(0);
            },
            complete: function(data) {

            }
        });
    }
}