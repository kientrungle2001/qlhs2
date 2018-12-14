<div style="padding:5px;border:1px solid #ddd">
<!--
	<?php if ( @pzk_element('permission')->check('student', 'search') ) : ?><a href="<?php echo BASE_REQUEST . '/student/search'; ?>" class="easyui-linkbutton" data-options="plain:true">Tìm kiếm</a><?php endif; ?>
-->
	<?php if ( @pzk_element('permission')->check('advice', 'index') ) : ?><a href="<?php echo BASE_REQUEST . '/advice'; ?>" class="easyui-linkbutton" data-options="plain:true">Tư vấn</a><?php endif; ?>
	<a href="#" class="easyui-menubutton" data-options="plain:true,menu:'#qlhs'">Quản lý học sinh</a>
	<a href="#" class="easyui-menubutton" data-options="plain:true,menu:'#qlkh'">Quản lý khóa học</a>
	<a href="#" class="easyui-menubutton" data-options="plain:true,menu:'#qlmh'">Quản lý môn học/phần mềm</a>	
	<?php if ( @pzk_element('permission')->check('teacher', 'index') ) : ?>
		<a href="<?php echo BASE_REQUEST . '/teacher'; ?>" class="easyui-linkbutton" data-options="plain:true">Giáo viên</a>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('room', 'index') ) : ?>
		<a href="<?php echo BASE_REQUEST . '/room'; ?>" class="easyui-linkbutton" data-options="plain:true">Phòng học</a>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('test', 'index') ) : ?>
		<a href="<?php echo BASE_REQUEST . '/test'; ?>" class="easyui-linkbutton" data-options="plain:true">Bài thi</a>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('demo', 'orderstat') ) : ?><a href="<?php echo BASE_REQUEST . '/demo/orderstat'; ?>" class="easyui-linkbutton" data-options="plain:true">Bảng hóa đơn</a><?php endif; ?> 
	<?php if ( @pzk_element('permission')->check('demo', 'muster') ) : ?><a href="<?php echo BASE_REQUEST . '/demo/muster'; ?>" class="easyui-linkbutton" data-options="plain:true">Điểm danh</a><?php endif; ?>
	<a href="#" class="easyui-menubutton" data-options="plain:true,menu:'#qltrt'">Quản lý trung tâm</a>
	<a href="#" class="easyui-menubutton" data-options="plain:true,menu:'#qlthuchi'">Quản lý thu chi</a>
	<a href="#" class="easyui-menubutton" data-options="plain:true,menu:'#qlnguoidung'">Quản lý người dùng</a>
	<?php if ( @pzk_element('permission')->check('demo', 'report') ) : ?><a href="<?php echo BASE_REQUEST . '/demo/report'; ?>" class="easyui-linkbutton" data-options="plain:true">Báo cáo</a><?php endif; ?>
	
	<?php if ( @pzk_element('permission')->check('demo', 'logout') ) : ?><a href="<?php echo BASE_REQUEST . '/demo/logout'; ?>" class="easyui-linkbutton" data-options="plain:true">Đăng xuất</a><?php endif; ?>
</div>
<div id="qlnguoidung" style="width:100px;">
	<?php if ( @pzk_element('permission')->check('profile', 'index') ) : ?><div><a href="<?php echo BASE_REQUEST . '/profile'; ?>" class="easyui-linkbutton" data-options="plain:true">Người dùng</a></div><?php endif; ?>
	<?php if ( @pzk_element('permission')->check('profile', 'type') ) : ?><div><a href="<?php echo BASE_REQUEST . '/profile/type'; ?>" class="easyui-linkbutton" data-options="plain:true">Quyền hạn</a></div><?php endif; ?>
	<?php if ( @pzk_element('permission')->check('profile', 'grant') ) : ?><div><a href="<?php echo BASE_REQUEST . '/profile/grant'; ?>" class="easyui-linkbutton" data-options="plain:true">Phân quyền</a></div><?php endif; ?>
</div>
<div id="qlthuchi" style="width:100px;">
	<?php if ( @pzk_element('permission')->check('student', 'order') ) : ?><div><a href="<?php echo BASE_REQUEST . '/student/order'; ?>" class="easyui-linkbutton" data-options="plain:true">Hóa đơn học phí</a></div><?php endif; ?>
	<?php if ( @pzk_element('permission')->check('order', 'createbill') ) : ?><div><a href="<?php echo BASE_REQUEST . '/order/createbill'; ?>" class="easyui-linkbutton" data-options="plain:true">Tạo HĐC 1</a></div><?php endif; ?>
	<?php if ( @pzk_element('permission')->check('order', 'createbill2') ) : ?><div><a href="<?php echo BASE_REQUEST . '/order/createbill2'; ?>" class="easyui-linkbutton" data-options="plain:true">Tạo HĐC 2</a></div><?php endif; ?>
	<?php if ( @pzk_element('permission')->check('order', 'createordermanual') ) : ?><div><a href="<?php echo BASE_REQUEST . '/order/createordermanual'; ?>" class="easyui-linkbutton" data-options="plain:true">Tạo HĐT</a></div><?php endif; ?>
	<?php if ( @pzk_element('permission')->check('order', 'billing') ) : ?><div><a href="<?php echo BASE_REQUEST . '/order/billing'; ?>" class="easyui-linkbutton" data-options="plain:true">Hóa đơn chi</a></div><?php endif; ?>
	<?php if ( @pzk_element('permission')->check('order', 'report') ) : ?><div><a href="<?php echo BASE_REQUEST . '/order/report'; ?>" class="easyui-linkbutton" data-options="plain:true">Báo cáo Hóa đơn</a></div><?php endif; ?>
</div>
<div id="qltrt" style="width:100px;">
	<?php if ( @pzk_element('permission')->check('student', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/student'; ?>" class="easyui-linkbutton" data-options="plain:true">Học sinh</a>
	</div>
	<?php endif; ?>
	
	<?php if ( @pzk_element('permission')->check('course', 'student') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/course/student'; ?>" class="easyui-linkbutton" data-options="plain:true">Xếp lớp</a>
	</div>
	<?php endif; ?>

	<?php if ( @pzk_element('permission')->check('course', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/course'; ?>" class="easyui-linkbutton" data-options="plain:true">Khóa học</a>
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('course', 'schedule') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/course/schedule'; ?>" class="easyui-linkbutton" data-options="plain:true">Lịch học</a>
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('offschedule', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/offschedule'; ?>" class="easyui-linkbutton" data-options="plain:true">Lịch nghỉ</a>
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('teacher', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/teacher'; ?>" class="easyui-linkbutton" data-options="plain:true">Giáo viên</a><br />
	</div>
	<?php endif; ?>
	<!--
	<div>
		<a href="<?php echo BASE_REQUEST . '/demo/teaching'; ?>" class="easyui-linkbutton" data-options="plain:true">Giảng dạy</a><br />
	</div>
	-->
	<?php if ( @pzk_element('permission')->check('subject', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/subject'; ?>" class="easyui-linkbutton" data-options="plain:true">Môn học</a><br />
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('room', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/room'; ?>" class="easyui-linkbutton" data-options="plain:true">Phòng học</a><br />
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('paymentperiod', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/paymentperiod'; ?>" class="easyui-linkbutton" data-options="plain:true">Kỳ thanh toán</a>
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('demo', 'paymentstat') ) : ?><div><a href="<?php echo BASE_REQUEST . '/demo/paymentstat'; ?>" class="easyui-linkbutton" data-options="plain:true">Bảng thanh toán</a></div><?php endif; ?>
</div>
	
<div id="qlhs" style="width:100px;">
	<?php if ( @pzk_element('permission')->check('student', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/student'; ?>" class="easyui-linkbutton" data-options="plain:true">Tất cả</a>
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('student', 'online') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/student/online'; ?>" class="easyui-linkbutton" data-options="plain:true">Trực tuyến</a>
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('student', 'center') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/student/center'; ?>" class="easyui-linkbutton" data-options="plain:true">Trung tâm</a>
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('student', 'unclassed') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/student/unclassed'; ?>" class="easyui-linkbutton" data-options="plain:true">Chờ xếp lớp</a>
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('student', 'potential') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/student/potential'; ?>" class="easyui-linkbutton" data-options="plain:true">Tiềm năng</a>
	</div>
	<?php endif; ?>
	<?php if ( @pzk_element('permission')->check('student', 'familiar') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/student/familiar'; ?>" class="easyui-linkbutton" data-options="plain:true">Thân thiết</a>
	</div>
	<?php endif; ?>
</div>

<div id="qlkh">
<?php if ( @pzk_element('permission')->check('course', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/course/index'; ?>" class="easyui-linkbutton" data-options="plain:true">Tất cả</a>
	</div>
<?php endif; ?>
<?php if ( @pzk_element('permission')->check('course', 'center') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/course/center'; ?>" class="easyui-linkbutton" data-options="plain:true">Trung tâm</a>
	</div>
<?php endif; ?>
<?php if ( @pzk_element('permission')->check('course', 'online') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/course/online'; ?>" class="easyui-linkbutton" data-options="plain:true">Trực tuyến</a>
	</div>
<?php endif; ?>
</div>

<div id="qlmh">
<?php if ( @pzk_element('permission')->check('subject', 'index') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/subject'; ?>" class="easyui-linkbutton" data-options="plain:true">Tất cả</a>
	</div>
<?php endif; ?>
<?php if ( @pzk_element('permission')->check('subject', 'center') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/subject/center'; ?>" class="easyui-linkbutton" data-options="plain:true">Môn học</a>
	</div>
<?php endif; ?>
<?php if ( @pzk_element('permission')->check('subject', 'online') ) : ?>
	<div>
		<a href="<?php echo BASE_REQUEST . '/subject/online'; ?>" class="easyui-linkbutton" data-options="plain:true">Phần mềm</a>
	</div>
<?php endif; ?>
</div>
