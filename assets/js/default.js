var json = null;

function init(){
    LoadSvg();
    getJsonData();
    setMapLocatedColor();
}

function LoadSvg(){
	$("#svg").load("/svg/map.svg", function(data){
		$(this).html(data);
	});
}

function getJsonData(){
	$.getJSON("/json/description.json", function(data){
		if(data){
			json = data.WardOffice;
            
			$.each(json, function(key, val){
				val.files = [];
			});
		}
	});
	return false;
}

function setMapLocatedColor(){
	$("body").on("mouseenter", "path", function(){
		$(this).css({ "fill" : "#FF9900" });
	});

	$("body").on("mouseleave", "path", function(){
		$(this).css({ "fill" : "#C8C8C8" });
	});

	// 텍스트 마우스 오버시 색 변경
	$("body").on("mouseenter", "text", function(){
		var id = $(this).find("tspan:last-child").text();
		$("#"+id).css({ "fill" : "#FF9900" });
	});

	$("body").on("mouseleave", "text", function(){
		var id = $(this).find("tspan:last-child").text();
		$("#"+id).css({ "fill" : "#C8C8C8" });
	});

	$("body").on("click", "path", function(){
        alertLocatedName(this);
	});
}

function alertLocatedName(element){
    var self = null;
    var id = $(element).attr("id");

	$.each(json, function(i, val){
		if(val.name_en == id){
			self = val;
			key = i;
			return false;
		}
	});

    alert(self.name_ko);
}

$(function(){
	init();
});