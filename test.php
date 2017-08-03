<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php"; 
 function index(){
 
    $values=array(
        "Jan" => 110,
        "Feb" => 130,
        "Mar" => 215,
        "Apr" => 81,
        "May" => 310,
        "Jun" => 110,
        "Jul" => 190,
        "Aug" => 175,
        "Sep" => 390,
        "Oct" => 286,
        "Nov" => 150,
        "Dec" => 300
    );   // 그래프 데이터값
    
    $arr = array(110, 130, 215, 81, 310, 110, 190, 175, 390, 286, 150, 300);
    
    $img_width=450; // 이미지 width 값
    $img_height=300; // 이미지 height 값
    $margins=20; // 이미지 마진값
    
    
    # ---- Find the size of graph by substracting the size of borders
    $graph_width=$img_width - $margins * 2; // 이미지의 마진 수동적용으로 그래프 의 width height를 마진 크기만큼 차감
    $graph_height=$img_height - $margins * 2;  // 위와동일
    $img=imagecreate($img_width,$img_height); // 이미지 생성
    
    
    $bar_width=20; // 막대그래프 막대 width
    $total_bars=count($values); // 막대 갯수 계산
    $gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1); // 그래프 간격 계산
    
    
    # -------  Define Colors ----------------
    $bar_color=imagecolorallocate($img,0,64,128);   // 각 컬러 정의
    $background_color=imagecolorallocate($img,240,240,255);
    $border_color=imagecolorallocate($img,200,200,200);
    $line_color=imagecolorallocate($img,220,220,220);
    
    # ------ Create the border around the graph ------
    
    imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
    imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);
    
    
    # ------- Max value is required to adjust the scale -------
    $max_value=max($values);
    $ratio= $graph_height/$max_value;
    
    
    # -------- Create scale and draw horizontal lines  --------
    $horizontal_lines=20;
    $horizontal_gap=$graph_height/$horizontal_lines;
    
    for($i=1;$i<=$horizontal_lines;$i++){
        $y=$img_height - $margins - $horizontal_gap * $i ;
        imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
        $v=intval($horizontal_gap * $i /$ratio);
        imagestring($img,0,5,$y-5,$v,$bar_color);
    
    }
    
    
    # ----------- Draw the bars here ------
    for($i=0;$i< $total_bars; $i++){ 
        # ------ Extract key and value pair from the current pointer position
        list($key,$value)=each($values); 
        $x1= $margins + $gap + $i * ($gap+$bar_width) ;
        // $x2= $x1 + $bar_width; 
        $x3 = $margins + $gap + ($i+1)* ($gap+$bar_width);
        $y1=$margins +$graph_height- intval($value * $ratio) ;

        $y3=$margins +$graph_height- intval($arr[$i+1] * $ratio) ;
        // $y2=$img_height-$margins;
        imagestring($img,0,$x1+3,$y1-10,$value,$bar_color);imagestring($img,0,$x1+3,$img_height-15,$key,$bar_color);        
        imageline($img, $x1, $y1, $x3, $y3, $bar_color);
        // imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
    }
    header("Content-type:image/png");
    imagepng($img);
    $_REQUEST['asdfad']=234234;
    
       }
index();
?>