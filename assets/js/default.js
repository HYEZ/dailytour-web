var json = null;

function init(){
    LoadSvg();
    getJsonData();
    setMapLocatedColor();
    initIndexedDB();
}


/* svg */

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



/* IndexedDB */

function initIndexedDB(){
    var request = indexedDB.open("librarys");

    request.onupgradeneeded = function() {
        var db = request.result;
        var objectStore = db.createObjectStore("member", {keyPath: "_id", autoIncrement:true});
        objectStore.createIndex("email", "email", {unique: true});
        objectStore.createIndex("name", "name");
        objectStore.createIndex("pw", "pw");
        objectStore.createIndex("file", "file");
        objectStore.createIndex("checked", "checked");

        objectStore.put({email: "a@a.a", pw: "1234", name: "Fred", file: "", checked: true, _id: 1});
        objectStore.put({email: "asdf@ac.aa", pw: "a1234", name: "Asdf", file: "", checked: false, _id: 2});
    };

    request.onsuccess = function() {
        db = request.result;
        getAllIndexedDB(db);
        initTriggerindexedDB(db);
    };
}

function initTriggerindexedDB(db){
    $("body").on("click", "#indexedOk", function(){
        var value = [];
        value.push($(this).parent("div").children("div").children("#indexed_email").val());
        value.push($(this).parent("div").children("div").children("#indexed_pw").val());
        value.push($(this).parent("div").children("div").children("#indexed_name").val());
        value.push($(this).parent("div").children("div").children("#indexed_check").is(":checked"));
        setindexedDB(db, "insert", 0, value);
    });
}

function setindexedDB(db, type, key, value){
    var objectStore = db.transaction("member","readwrite").objectStore("member");
   
    switch(type){
        case "insert":
            objectStore.put({email: value[0], pw: value[1], name: value[2], file: "", checked: value[3]});
            break;
        case "delete":
            objectStore.delete(key);
            break;
        case "update":
            objectStore.put({email: value[0], pw: value[1], name: value[2], file: "", checked: value[3], _id: key});
            break;
    }
    
    getAllIndexedDB(db);
}

function getAllIndexedDB(db){
    var objectStore = db.transaction("member").objectStore("member");
    
    objectStore.openCursor().onsuccess = function(event) {
        var cursor = event.target.result;

        if (cursor) {
            console.log(cursor.key + " : " + cursor.value.email + ", pw: " + cursor.value.pw + ", Email: " + cursor.value.name + ", checked: " + cursor.value.checked);
            cursor.continue();
        } else {
            console.log("\n");
        }       
    };
}


/* init */

$(function(){
	init();
});



