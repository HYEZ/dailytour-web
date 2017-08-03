<!-- Content -->
<div class="container">
    <div class="row main">
        <section id="portfolio" class="bg-light-gray">
            <div class="container">
                <div class="row main-container">
                    <?php
                    $query = $db->query("select * from directory where user_id='$_SESSION[user_id]' order by _id desc");
                    for($i = 1;$rs = $query -> fetch(); $i++){
                    ?>
                    <div class="col-md-4 col-sm-6 portfolio-item" onclick="location.href='/view/directory/<?php echo $rs->_id; ?>'">
                        <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="/file/<?php echo $rs->image; ?>" class="img-responsive" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4><?php echo $rs->title; ?></h4>
                            <p class="text-muted"><?php echo $rs->first_date."~".$rs->end_date; ?></p>
                        </div>
                    </div>
                     <?php } ?>
                </div>
            </div>
        </section>

        <div class="btn-wrap add-btn-wrap"> 
            <button data-popup="#popup-folder" class="btn btn-primary add-btn">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </div>

        <!-- popup -->
        <div class="popup-background"></div>
        
        <div class="popup" id="popup-folder" style="display: none;">
            <form action="/model/add_dir" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="folderName">폴더 이름</label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="folderName" name="title" required>
                </div>
                <div class="form-group">
                    <label for="folderDate">여행 날짜</label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-date" id="date1" name="from" required>
                    <span style="float: left; margin: 4px 5px;">~</span>
                    <input type="text" class="form-control form-date" id="date2" name="to" required>
                </div>
                <div class="form-group">
                    <label>대표이미지 선택</label>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="imageName" name="file" required>
                </div>
                <div class="form-group text-right">
                    <input class="btn btn-primary" type="submit" value="여행 폴더 만들기">
                    <button class="popup-close btn btn-danger">취소</button>
                </div>
            </form>
        </div>
    </div>
</div>