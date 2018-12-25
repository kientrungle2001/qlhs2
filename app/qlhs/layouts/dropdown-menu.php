<!-- Source: https://catalin.red/dist/uploads/2011/03/css3-dropdown-menu-demo.html -->
	<ul id="menu">
	<li><a href="{url /}">Tổng quan</a></li>
	<li>
		<a href="{url /student}">Học sinh</a>
		<ul>
			<li>
				<a href="{url /student/center}">Trung tâm</a>
				<ul>
					<li><a href="{url /student/classed}">Đã xếp lớp</a></li>
					<li><a href="{url /student/unclassed}">Danh sách chờ</a></li>
					<li><a href="{url /student/ontest}">Test đầu vào</a>
					<ul>
						<li><a href="{url /test/schedule}">Lịch hẹn thi đầu vào</a></li>
					</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="{url /student/online}">Trực tuyến</a>
				<ul>
					<li><a href="{url /student/potential}">Tiềm năng</a>
						<ul>
							<li><a href="{url /advice}">Tư vấn</a></li>
						</ul>
					</li>
					<li><a href="{url /student/used}">Đang sử dụng</a></li>
					<li><a href="{url /student/familiar}">Thân thiết</a></li>
				</ul>				
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
		<ul>
			<li><a href="{url /teacher/lecturer}">Giảng viên</a></li>
			<li><a href="{url /teacher/tutor}">Trợ giảng</a></li>
		</ul>	
	</li>
	<li>
		<a href="{url /room}">Phòng học</a>	
	</li>
	<li>
		<a href="{url /test}">Bài thi</a>	
	</li>
	<li>
		<a href="{url /employee}">Nhân viên</a>	
	</li>
	<li>
		<a href="{url /partner}">Đối tác</a>	
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
		<a href="{url /student/order}">Hóa đơn</a>
		<ul>
			<li>
				<a href="{url /student/order}">Học phí</a>
			</li>
			<li>
				<a href="{url /order/report}">Báo cáo</a>
			</li>
			<li>
				<a href="{url /order/billing}">Hóa đơn chi</a>
			</li>
			<li>
				<a href="{url /order/createbill}">Tạo HĐ Chi Nhiều Mục</a>
			</li>
			<li>
				<a href="{url /order/createbill2}">Tạo HĐ Chi Một Mục</a>
			</li>
			<li>
				<a href="{url /order/createordermanual}">Tạo HĐ Thu</a>
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
<style>
.pzk-autocomplete {
	position: absolute;
	z-index: 1;
	background: #fff;
}
.pzk-autocomplete-close {
	float: right;
	margin-right: -10px;
	margin-top: -10px;
	text-decoration: none;
	border: 1px solid #ddd;
	padding: 10px;
	width: 10px;
	height: 10px;
	display: block;
	border-radius: 50%;
	text-align: center;
}
.pzk-autocomplete-item {
	text-decoration: none;
	padding: 5px;
	border-bottom: 1px solid #ddd;
	margin-top: 5px;
	margin-bottom: 5px;
	display: block;
}
.pzk-autocomplete-item:hover {
	background: yellow;
}
</style>