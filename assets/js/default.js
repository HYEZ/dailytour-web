var json = null;

function init(){
    LoadSvg();
    getJsonData();
    setMapLocatedColor();
    initTestIndexedDB();
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



/* IndexedDB */

function initTestIndexedDB(){
    var request = indexedDB.open("library"); //db name
    const customerData = [
        { id: "01", name: "Gopal K Varma", age: 35, email: "contact@tutorialspoint.com" },
        { id: "02", name: "Prasad", age: 24, email: "prasad@tutorialspoint.com" }
    ];
    const customerData2 = [
        {title: "4A44-44-asdfsadfasdf4444", name: "authAor", isbn: "bilAl@comdpany.com" },
        {title: "4A44-44-sadfsadfasdf4444", name: "authAor", isbn: "bilAl@codmpany.com" }
    ];
    request.onsuccess = function() {
        db = request.result;
        var transaction = db.transaction("books", "readwrite"); // colum

        var objectStore = transaction.objectStore("books");

        objectStore.put({title: "4A44-44-sadfasdf4444", name: "authAor", isbn: "bilAl@company.com" });

        transaction.oncomplete = function() {
          // All requests have succeeded and the transaction has committed.
        };
        var index = objectStore.index("by_title");

        var req = index.get("Quarry Memories");
        req.onsuccess = function(){
    //        alert(req.result.isbn);
        }
        for(i in customerData2) {
            objectStore.put(customerData2[i]);
        }
        
        deleteIndexedDB(db, "donna@home.org");
        getAllIndexedDB(db);
        
        initTriggerindexedDB(db);
    };
}

function initTriggerindexedDB(db){
    $("body").on("click", "#indexedOk", function(){
        setindexedDB(db, "insert");
    });
}

function setindexedDB(db, type, index){
    var objectStore = db.transaction("books","readwrite").objectStore("books");
    
    switch(type){
        case "insert":
            objectStore.put({title: "asdfa", name: "a", isbn: "ab" });
            break;
        case "delete":
            objectStore.delete(index);
            break;
    }
    
    getAllIndexedDB(db);
}

function getAllIndexedDB(db){
    var objectStore = db.transaction("books").objectStore("books");
    objectStore.openCursor().onsuccess = function(event) {
        var cursor = event.target.result;

        if (cursor) {
            console.log(cursor.key);
//            alert("Name for id " + cursor.key + " is " + cursor.value.name + ", Age: " + cursor.value.age + ", Email: " + cursor.value.email);
            cursor.continue();
        } else {
//            alert("No more entries!");
        }
        
    };
}


/* init */

$(function(){
	init();
});



