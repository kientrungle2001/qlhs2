<?php
echo "Course\r\n";
if(!is_dir(BASE_DIR . '/app/qlhs/pages/grid/course')) {
    mkdir(BASE_DIR . '/app/qlhs/pages/grid/course');
}
if(!is_dir(BASE_DIR . '/app/qlhs/pages/grid/course/online')) {
    mkdir(BASE_DIR . '/app/qlhs/pages/grid/course/online');
}
if(!is_dir(BASE_DIR . '/app/qlhs/pages/grid/course/center')) {
    mkdir(BASE_DIR . '/app/qlhs/pages/grid/course/center');
}

// center
copy(PKG_DIR . DS . 'page.course.center.php', BASE_DIR . '/app/qlhs/pages/grid/course/center.php');
copy(PKG_DIR . DS . 'page.course.center.subject.php', BASE_DIR . '/app/qlhs/pages/grid/course/center/subject.php');
copy(PKG_DIR . DS . 'page.course.center.level.php', BASE_DIR . '/app/qlhs/pages/grid/course/center/level.php');
copy(PKG_DIR . DS . 'page.course.center.teacher.php', BASE_DIR . '/app/qlhs/pages/grid/course/center/teacher.php');
copy(PKG_DIR . DS . 'page.course.center.datagrid.php', BASE_DIR . '/app/qlhs/pages/grid/course/center/datagrid.php');
copy(PKG_DIR . DS . 'page.course.center.form_schedule.php', BASE_DIR . '/app/qlhs/pages/grid/course/center/form_schedule.php');
copy(PKG_DIR . DS . 'page.course.center.schedule.php', BASE_DIR . '/app/qlhs/pages/grid/course/center/schedule.php');
// online
copy(PKG_DIR . DS . 'page.course.online.php', BASE_DIR . '/app/qlhs/pages/grid/course/online.php');
copy(PKG_DIR . DS . 'page.course.online.subject.php', BASE_DIR . '/app/qlhs/pages/grid/course/online/subject.php');
copy(PKG_DIR . DS . 'page.course.online.level.php', BASE_DIR . '/app/qlhs/pages/grid/course/online/level.php');
copy(PKG_DIR . DS . 'page.course.online.teacher.php', BASE_DIR . '/app/qlhs/pages/grid/course/online/teacher.php');
copy(PKG_DIR . DS . 'page.course.online.datagrid.php', BASE_DIR . '/app/qlhs/pages/grid/course/online/datagrid.php');
copy(PKG_DIR . DS . 'page.course.online.schedule.php', BASE_DIR . '/app/qlhs/pages/grid/course/online/schedule.php');
copy(PKG_DIR . DS . 'page.course.online.tuition_fee.php', BASE_DIR . '/app/qlhs/pages/grid/course/online/tuition_fee.php');

// course selector
copy(PKG_DIR . DS . 'class.CourseSelector.php', BASE_DIR . '/objects/edu/CourseSelector.php');
copy(PKG_DIR . DS . 'class.CourseSelector.js', BASE_DIR . '/js/edu/courseSelector.js');
copy(PKG_DIR . DS . 'edu.course.selector.php', BASE_DIR . '/default/layouts/edu/course/selector.php');