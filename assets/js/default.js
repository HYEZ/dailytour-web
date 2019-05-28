$(function(){
    datepick();
});

$(".main-btn-wrap .btn").on("click", function(){
    var id = $(this).attr("data-popup");
    onShowPopup(id);
});

$(".popup-close").on("click", function(){
    var id = "#" + $(this).parents(".popup").attr("id");
    onHidePopup(id);
});

function onShowPopup ( id ) {
    $(".popup-background").fadeIn();
    $(id).fadeIn();
}

function onHidePopup ( id ) {
    $(".popup-background").fadeOut();
    $(id).fadeOut();
}

$(".editor-tab div").on("click", function(){
    $(this).addClass("this").siblings().removeClass("this");
});

function datepick() {
    $('#date1').datepicker({
        dateFormat:"yy-mm-dd",
        // minDate:0,
        onClose:function(date){
            if(date){
                $('#date2').datepicker("option","minDate",date);
                // totalPrice();
            }
        }
    });
    $('#date2').datepicker({
        dateFormat:"yy-mm-dd",
        // minDate:0,
        onClose:function(date){
            if(date){
                $('#date1').datepicker("option","maxDate",date);
                // totalPrice();
            }
        }
    }); 
 
}



function initMap(lat, lng) {
    if(lat && lng) {
        var uluru = {lat: lat, lng: lng};
    } else {
        var uluru = {lat: 37.5463899, lng: 126.9647134};
    }
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: uluru
    });
    var marker1 = new google.maps.Marker({
      position: uluru,
      map: map
    });

    marker1.addListener('click', function() {
        map.setZoom(18);
        $("#lat").val(uluru.lat);
        $("#lng").val(uluru.lng);
        $("#lat_view").val("위도 : " + uluru.lat);
        $("#lng_view").val("경도 : " + uluru.lng);
        map.setCenter(marker1.getPosition());
        $(".result").show();
    });

}

$("#keyword_search").click(function() {
    var place = $("#keyword").val();
    $.ajax({
        url: "/page/model/search_place.php",
        type: "post",
        data: {
            place: place
        },
        success: function(data) {
            // console.log(data);
            var t = JSON.parse(data);
            // console.log(t);
            initMap(t.results[0].geometry.location.lat, t.results[0].geometry.location.lng);
            // console.log(t.results[0].geometry.location.lng);
        },  error:function(request,status,error){
            // console.log(request);
          }

    });

});
 
$("#photo_search").click(function() {
    var file_data = $('#photo').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $.ajax({
        url: '/page/model/vision.php',
        dataType: 'text',  
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(data){
            // console.log(data);
            var t = JSON.parse(data);
            // console.log(t.responses[0].landmarkAnnotations[0].locations[0].latLng);
            initMap(t.responses[0].landmarkAnnotations[0].locations[0].latLng.latitude, t.responses[0].landmarkAnnotations[0].locations[0].latLng.longitude);

        }
     });
});

$("#detail-add-btn").click(function() {
    showUploadBox(".upload_box_wrap");
});
$(".member-toggle").click(function() {
    showUploadBox(".member_box_wrap");
});
// set opacitys toggle event
function showUploadBox(id) {
    var box = $(id);
    if(box.css("display") == "none") {
        box.fadeIn();
    } else {
        box.fadeOut();
    }
}



