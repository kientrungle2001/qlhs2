<!--
	Source: https://catalin.red/dist/uploads/2011/03/css3-dropdown-menu-demo.html

	-->

<script>
setTimeout(
	function() {
		$(function() {
			if ($.browser.msie && $.browser.version.substr(0,1)<7)
			{
				$('li').has('ul').mouseover(function(){
					$(this).children('ul').show();
				}).mouseout(function(){
					$(this).children('ul').hide();
				});
			}
		});     
	}, 1000
)
   
</script>
	<ul id="menu">
	<li><a href="{url /}">Tổng quan</a></li>
	<li>
		<a href="{url /student}">Học sinh</a>
		<ul>
			<li>
				<a href="{url /student/center}">Trung tâm</a>
				<ul>
					<li><a href="{url /student/unclassed}">Danh sách chờ</a></li>
				</ul>
			</li>
			<li>
				<a href="{url /student/online}">Trực tuyến</a>
				<ul>
					<li><a href="{url /student/potential}">Tiềm năng</a></li>
					<li><a href="#">Thân thiết</a></li>
				</ul>				
			</li>
			<li>
				<a href="{url /advice}">Tư vấn</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="{url /subject}">Môn học</a>
		<ul>
			<li>
				<a href="{url /subject/center}">Môn học</a>				
			</li>
			<li>
				<a href="{url /subject/online}">Phần mềm</a>		
			</li>
		</ul>		
	</li>
	<li>
		<a href="{url /course}">Khóa học</a>
		<ul>
			<li>
				<a href="{url /course/center}">Trung tâm</a>
			</li>
			<li>
				<a href="{url /course/online}">Trực tuyến</a>
			</li>
		</ul>	
	</li>
	<li>
		<a href="{url /teacher}">Giáo viên</a>	
	</li>
	<li>
		<a href="{url /room}">Phòng học</a>	
	</li>
	<li>
		<a href="{url /test}">Bài thi</a>	
	</li>
	<li>
		<a href="#">Trung tâm</a>
		<ul>
		<li>
				<a href="{url /course/student}">Xếp lớp</a>
			</li>
			<li>
				<a href="{url /course/schedule}">Lịch học</a>
			</li>
			<li>
				<a href="{url /offschedule}">Lịch nghỉ</a>
			</li>
			<li>
				<a href="{url /paymentperiod}">Kỳ thanh toán</a>
			</li>
		</ul>	
	</li>
	<li>
		<a href="{url /student/order}">Học phí</a>
		<ul>
			<li>
				<a href="{url /order/report}">Báo cáo</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="{url /schedule/daily}">Thời khóa biểu</a>
		<ul>
			<li>
				<a href="{url /schedule/daily}">Theo ngày</a>
			</li>
			<li>
				<a href="{url /schedule/weekly}">Theo tuần</a>
			</li>
			<li>
				<a href="{url /schedule/teacher}">Theo giáo viên</a>
			</li>
		</ul>
	</li>
</ul>
<br />