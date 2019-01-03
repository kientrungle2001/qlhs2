<!-- Source: https://catalin.red/dist/uploads/2011/03/css3-dropdown-menu-demo.html -->
	<ul id="menu">
	<li><a href="<?php echo BASE_REQUEST . '/'; ?>">Tổng quan</a></li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/student'; ?>">Học sinh</a>
		<ul>
			<li>
				<a href="<?php echo BASE_REQUEST . '/student/center'; ?>">Trung tâm</a>
				<ul>
					<li><a href="<?php echo BASE_REQUEST . '/student/classed'; ?>">Đã xếp lớp</a></li>
					<li><a href="<?php echo BASE_REQUEST . '/student/unclassed'; ?>">Danh sách chờ</a></li>
					<li><a href="<?php echo BASE_REQUEST . '/student/ontest'; ?>">Test đầu vào</a></li>
				</ul>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/student/online'; ?>">Trực tuyến</a>
				<ul>
					<li><a href="<?php echo BASE_REQUEST . '/student/potential'; ?>">Tiềm năng</a></li>
					<li><a href="<?php echo BASE_REQUEST . '/student/used'; ?>">Đang sử dụng</a></li>
					<li><a href="<?php echo BASE_REQUEST . '/student/familiar'; ?>">Thân thiết</a></li>
				</ul>				
			</li>
			<li><a href="<?php echo BASE_REQUEST . '/test/schedule'; ?>">Lịch hẹn thi đầu vào</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/advice'; ?>">Tư vấn Phần mềm</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/demo/orderstat'; ?>">Bảng học phí</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/demo/muster'; ?>">Điểm danh</a></li>
		</ul>
	</li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/subject'; ?>">Môn học</a>
		<ul>
			<li>
				<a href="<?php echo BASE_REQUEST . '/subject/center'; ?>">Môn học</a>				
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/subject/online'; ?>">Phần mềm</a>		
			</li>
		</ul>		
	</li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/course'; ?>">Khóa học</a>
		<ul>
			<li>
				<a href="<?php echo BASE_REQUEST . '/course/center'; ?>">Trung tâm</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/course/online'; ?>">Trực tuyến</a>
			</li>
		</ul>	
	</li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/teacher'; ?>">Giáo viên</a>
		<ul>
			<li><a href="<?php echo BASE_REQUEST . '/teacher/lecturer'; ?>">Giảng viên</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/teacher/tutor'; ?>">Trợ giảng</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/teacher/billing'; ?>">Bảng lương</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/teacher/create_billing'; ?>">Tạo HĐ Chi 1 mục</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/teacher/create_billing_multiple'; ?>">Tạo HĐ Chi nhiều mục</a></li>
		</ul>	
	</li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/room'; ?>">Phòng học</a>	
	</li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/test'; ?>">Bài thi</a>	
	</li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/employee'; ?>">Nhân viên</a>
		<ul>
			<li>
			<a href="<?php echo BASE_REQUEST . '/employee/billing'; ?>">Bảng lương</a>
			</li>
			<li><a href="<?php echo BASE_REQUEST . '/employee/create_billing'; ?>">Tạo HĐ Chi 1 mục</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/employee/create_billing_multiple'; ?>">Tạo HĐ Chi nhiều mục</a></li>
		</ul>
	</li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/partner'; ?>">Đối tác</a>
		<ul>
			<li><a href="<?php echo BASE_REQUEST . '/partner/order'; ?>">Hóa đơn thu</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/partner/billing'; ?>">Hóa đơn chi</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/partner/create_billing'; ?>">Tạo HĐ Chi 1 mục</a></li>
			<li><a href="<?php echo BASE_REQUEST . '/partner/create_billing_multiple'; ?>">Tạo HĐ Chi nhiều mục</a></li>
		</ul>
	</li>
	<li>
		<a href="#">Trung tâm</a>
		<ul>
		<li>
				<a href="<?php echo BASE_REQUEST . '/course/student'; ?>">Xếp lớp</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/course/schedule'; ?>">Lịch học</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/offschedule'; ?>">Lịch nghỉ</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/paymentperiod'; ?>">Kỳ thanh toán</a>
			</li>
		</ul>	
	</li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/student/order'; ?>">Hóa đơn</a>
		<ul>
			<li>
				<a href="<?php echo BASE_REQUEST . '/student/order'; ?>">Học phí</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/order/report'; ?>">Báo cáo</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/order/billing'; ?>">Hóa đơn chi</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/order/createbill'; ?>">Tạo HĐ Chi Nhiều Mục</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/order/createbill2'; ?>">Tạo HĐ Chi Một Mục</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/order/createordermanual'; ?>">Tạo HĐ Thu</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="<?php echo BASE_REQUEST . '/schedule/daily'; ?>">Thời khóa biểu</a>
		<ul>
			<li>
				<a href="<?php echo BASE_REQUEST . '/schedule/daily'; ?>">Theo ngày</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/schedule/weekly'; ?>">Theo tuần</a>
			</li>
			<li>
				<a href="<?php echo BASE_REQUEST . '/schedule/teacher'; ?>">Theo giáo viên</a>
			</li>
		</ul>
	</li>
</ul>