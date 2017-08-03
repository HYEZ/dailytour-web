<!-- Header -->
<blockquote class="menu_header">
    <h2>Board</h2>
</blockquote>

<!-- Content -->
<div class="container">
    <div class="row">
        <table class="table table-striped">
        	<thead>
			    <tr>
				    <th>#</th>
				    <th>Title</th>
				    <th>Name</th>
				    <th>Date</th>
			    </tr>
			 </thead>
			 <tbody>
			 	<?php
			 	$query = $db->query("select * from board order by no asc");
        		while($rs = $query->fetch()){
			 	?>
			    <tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
			    </tr>
			    <?php } ?>
  			</tbody>
		</table>
		<button onclick="document.location.href='/server/add';" type="button" class="btn btn-primary">글쓰기</button>
    </div>
</div>