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
				var is_child_next = false;
				for (var i in data) {
					console.log(data[i])
					if (data[i].is_parent == "1"){
						menu += '<li class ="active treeview"><a href="#">'+data[i].menu_icon+'<span>'+data[i].menu_name+'</span>';
						menu += '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';
						last_parent = data[i].p_menu_id;
					}

					if (data[i].is_parent == "0" && last_parent == data[i].menu_parent ){
						menu += '<ul class="treeview-menu">';
						menu += '<li class="active"><a href="#'+data[i].menu_controller+'"><i class="fa fa-circle-o"></i>'+data[i].menu_name+'</a></li></ul></li>';
						//menu += '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';
						//last_parent = data[i].p_menu_id;
					}
				}
				 $("#sidebarmenu").append(menu);
			}
		});
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
		alert('da')
        var url = location.hash;
        var breadcrumb = '';
        url = url.replace('#', '')
        console.log(url);
        //if (url !== "") {
           // if (url.split('/').length > 1) {
                global.loadMethod(url);
           // }
        
    })
}