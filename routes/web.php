<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\ArchiveController;



Route::get('/', [LoginController::class, 'index'])->name('loginForm');
Route::post('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/library/view', [LibraryController::class, 'library'])->name('library');
Route::post('/library/view/search', [LibraryController::class, 'bookSearch'])->name('library.search');




Route::group(['prefix' => 'admin','middleware' =>['isAdmin','auth']], function(){

// admin archive files
Route::get('/archive', [ArchiveController::class, 'index'])->name('archive.index.admin');
Route::get('/archive/create', [ArchiveController::class, 'create'])->name('archive.create.admin');
Route::post('/archive/create', [ArchiveController::class, 'doCreate']);
Route::get('/archive/upload', [ArchiveController::class, 'upload'])->name('archive.upload.admin');
Route::post('/archive/upload', [ArchiveController::class, 'doUpload']);
Route::get('/archive/view', [ArchiveController::class, 'view'])->name('archive.view.admin');
Route::post('/archive/view', [ArchiveController::class, 'details']);
Route::get('/archive/delete/file/{path}', [ArchiveController::class, 'deleteFile'])->name('archive.deletefile.admin');





Route::get('/password-reset/{id}', [AdminController::class, 'passwordReset'])->name('passwordReset.admin');
Route::post('/password-reset/{id}', [AdminController::class, 'passwordResetSubmit']);

Route::get('/', [AdminController::class, 'index'])->name('admin.main');
// admin upload...............................................................
Route::get('/upload', [AdminController::class, 'upload'])->name('upload.admin');
Route::post('/upload/teacher', [AdminController::class, 'uploadTeacher'])->name('uploadTeacher.admin');
Route::post('/upload/student', [AdminController::class, 'uploadStudent'])->name('uploadStudent.admin');
Route::post('/upload/course', [AdminController::class, 'uploadCourse'])->name('uploadCourse.admin');
Route::get('/upload/teacher/download', [AdminController::class, 'downloadTeacherExcel'])->name('teacherSample.admin');
Route::get('/upload/student/download', [AdminController::class, 'downloadStudentExcel'])->name('studentSample.admin');
Route::get('/upload/course/download', [AdminController::class, 'downloadCourseExcel'])->name('courseSample.admin');
// admin add info..............................................................
Route::get('/addinfo', [AdminController::class, 'addinfo'])->name('addinfo.admin');
Route::get('/addinfo/student', [AdminController::class, 'addStudent'])->name('addStudent.admin');
Route::post('/addinfo/student', [AdminController::class, 'postStudent'])->name('postStudent.admin');
Route::get('/addinfo/teacher', [AdminController::class, 'addTeacher'])->name('addTeacher.admin');
Route::post('/addinfo/teacher', [AdminController::class, 'postTeacher'])->name('postTeacher.admin');
Route::get('/addinfo/course', [AdminController::class, 'addCourse'])->name('addCourse.admin');
Route::post('/addinfo/course', [AdminController::class, 'postCourse'])->name('postCourse.admin');
Route::get('/addinfo/classroom', [AdminController::class, 'addClassRoom'])->name('addClassRoom.admin');
Route::post('/addinfo/classroom', [AdminController::class, 'postClassRoom'])->name('postClassRoom.admin');
// admin delete info................................................................
Route::get('/deleteinfo', [AdminController::class, 'deleteinfo'])->name('deleteinfo.admin');
Route::get('/deleteinfo/student', [AdminController::class, 'deleteStudent'])->name('deleteStudent.admin');
Route::post('/deleteinfo/student', [AdminController::class, 'searchStudent'])->name('searchStudent.admin');
Route::post('/deleteinfo/student/{id}', [AdminController::class, 'deleteStudentData'])->name('deleteStudentData.admin');
Route::get('/deleteinfo/teacher', [AdminController::class, 'deleteTeacher'])->name('deleteTeacher.admin');
Route::post('/deleteinfo/teacher', [AdminController::class, 'searchTeacher'])->name('searchTeacher.admin');
Route::post('/deleteinfo/teacher/{id}', [AdminController::class, 'deleteTeacherData'])->name('deleteTeacherData.admin');
Route::get('/deleteinfo/course', [AdminController::class, 'deleteCourse'])->name('deleteCourse.admin');
Route::get('/deleteinfo/course/all', [AdminController::class, 'deleteAllCourse'])->name('deleteAllCourse.admin');
Route::post('/deleteinfo/course/all', [AdminController::class, 'deleteAllCourseDate'])->name('deleteAllCourseDate.admin');
Route::get('/deleteinfo/course/one', [AdminController::class, 'deleteOneCourse'])->name('deleteOneCourse.admin');
Route::post('/deleteinfo/course', [AdminController::class, 'deleteOneCourseData'])->name('deleteOneCourseData.admin');
Route::get('/deleteinfo/classroom', [AdminController::class, 'deleteClass'])->name('deleteClass.admin');
Route::post('/deleteinfo/classroom', [AdminController::class, 'deleteClassData'])->name('deleteClassData.admin');
// admin update info..................................................................
Route::get('/updateinfo', [AdminController::class, 'updateinfo'])->name('updateinfo.admin');
Route::get('/updateinfo/student', [AdminController::class, 'updateStudent'])->name('updateStudent.admin');
Route::post('/updateinfo/student', [AdminController::class, 'updateStudentDetails'])->name('updateStudentDetails.admin');
Route::get('/updateinfo/teacher', [AdminController::class, 'updateTeacher'])->name('updateTeacher.admin');
Route::post('/updateinfo/teacher', [AdminController::class, 'updateTeacherDetails'])->name('updateTeacherDetails.admin');
Route::get('/updateinfo/course', [AdminController::class, 'updateCourse'])->name('updateCourse.admin');
Route::post('/updateinfo/course', [AdminController::class, 'updateCourseDetails'])->name('updateCourseDetails.admin');
Route::get('/updateinfo/classroom', [AdminController::class, 'updateRoom'])->name('updateRoom.admin');
Route::post('/updateinfo/classroom', [AdminController::class, 'updateRoomDetails'])->name('updateRoomDetails.admin');

// admin browse info...............................................
Route::get('/browseinfo', [AdminController::class, 'browseinfo'])->name('browseinfo.admin');
Route::get('/browseinfo/student', [AdminController::class, 'browseStudentInfo'])->name('browseStudentInfo.admin');
Route::get('/browseinfo/student/byid', [AdminController::class, 'browseStudentInfoById'])->name('browseStudentInfoById.admin');
Route::post('/browseinfo/student/byid', [AdminController::class, 'browseStudentInfoByIdPost'])->name('browseStudentInfoByIdPost.admin');
Route::get('/browseinfo/student/bysemester', [AdminController::class, 'browseStudentInfoBySemester'])->name('browseStudentInfoBySemester.admin');
Route::post('/browseinfo/student/bysemester', [AdminController::class, 'browseStudentInfoBySemesterPost'])->name('browseStudentInfoBySemesterPost.admin');
Route::get('/browseinfo/student/bysession', [AdminController::class, 'browseStudentInfoBySession'])->name('browseStudentInfoBySession.admin');
Route::post('/browseinfo/student/bysession', [AdminController::class, 'browseStudentInfoBySessionPost'])->name('browseStudentInfoBySessionPost.admin');

Route::get('/browseinfo/teacher', [AdminController::class, 'browseTeacherInfo'])->name('browseTeacherInfo.admin');
Route::get('/browseinfo/teacher/byid', [AdminController::class, 'browseTeacherInfoById'])->name('browseTeacherInfoById.admin');
Route::post('/browseinfo/teacher/byid', [AdminController::class, 'browseTeacherInfoByIdPost'])->name('browseTeacherInfoByIdPost.admin');
Route::get('/browseinfo/teacher/bydept', [AdminController::class, 'browseTeacherInfoByDept'])->name('browseTeacherInfoByDept.admin');
Route::post('/browseinfo/teacher/bydept', [AdminController::class, 'browseTeacherInfoByDeptPost'])->name('browseTeacherInfoByDeptPost.admin');

Route::get('/browseinfo/course', [AdminController::class, 'browseCourseInfo'])->name('browseCourseInfo.admin');
Route::post('/browseinfo/course', [AdminController::class, 'browseCourseInfoPost']);


// admin assign teacher ...................................................
Route::get('/assign', [AdminController::class, 'assign'])->name('assign.admin');
Route::post('/assign', [AdminController::class, 'assignPostDept'])->name('assignPostDept.admin');
Route::get('/assign/{dept}', [AdminController::class, 'assignDept'])->name('assignDept.admin');
Route::post('/assign/{dept}/', [AdminController::class, 'assignPostCourses'])->name('assignPostCourses');
Route::get('/assign/{dept}/{year}/{semester}', [AdminController::class, 'assignCourses']);

// admin teacher priority
Route::get('/teacher-priority', [PriorityController::class, 'index'])->name('teacherPriority.admin');
Route::post('/teacher-priority', [PriorityController::class, 'store']);


});

Route::group(['prefix' => 'student','middleware' => ['isStudent','auth']], function(){
// students routes.............................................................
Route::get('/{id}', [StudentController::class, 'index'])->name('student.main');
Route::get('/{id}/password-reset', [StudentController::class, 'signup'])->name('signup.student');
Route::post('/{id}/password-reset', [StudentController::class, 'signupSubmit']);
Route::get('/{id}/result', [StudentController::class, 'result'])->name('result.student');
Route::get('/{id}/courses', [StudentController::class, 'showCourses'])->name('courses.student');
Route::get('/{id}/courses/{code}', [StudentController::class, 'course'])->name('course.student');
Route::post('/{id}/courses/{code}/', [StudentController::class, 'courseSubmit'])->name('attendance.student');
Route::get('/{id}/updateEmail/', [StudentController::class, 'emailForm'])->name('updateEmail.student');
Route::post('/{id}/updateEmail/', [StudentController::class, 'emailUpdate']);
Route::get('/{id}/routine', [RoutineController::class, 'showRoutine'])->name('routine.student');
Route::get('/{id}/files', [ArchiveController::class, 'studentIndex'])->name('archive.index.student');
Route::post('/{id}/files/view', [ArchiveController::class, 'studentView'])->name('archive.view.student');

});



Route::group(['prefix' => 'teacher','middleware' => ['isTeacher','auth']], function(){
// teacher routes
Route::get('/{id}', [TeacherController::class, 'index'])->name('teacher.main');
Route::get('/{id}/password-reset', [TeacherController::class, 'signup'])->name('signup.teacher');
Route::post('/{id}/password-reset', [TeacherController::class, 'signupSubmit']);
Route::get('/{id}/courses', [TeacherController::class, 'showCourses'])->name('courses.teacher');
Route::get('/{id}/courses/{code}', [TeacherController::class, 'course'])->name('course.teacher');
Route::post('/{id}/courses/{code}', [TeacherController::class, 'courseSubmit']);
Route::get('/{id}/courses/{code}/students/{dept}/{semester}', [TeacherController::class, 'studentsInfo'])->name('studentsInfo.teacher');
Route::get('/{id}/courses/{code}/students/{stuId}', [TeacherController::class, 'studentInfo'])->name('studentInfo.teacher');
Route::get('/{id}/courses/{code}/result/download', [TeacherController::class, 'export'])->name('export.teacher');
Route::get('/{id}/updateEmail/', [TeacherController::class, 'emailForm'])->name('updateEmail.teacher');
Route::post('/{id}/updateEmail/', [TeacherController::class, 'emailUpdate']);
Route::get('/{id}/routine/', [RoutineController::class, 'index'])->name('routine.teacher');
Route::get('/{id}/routine/view', [RoutineController::class, 'viewRoutine'])->name('routine.view.teacher');
Route::get('/{id}/routine/set', [RoutineController::class, 'routine'])->name('setRoutine.teacher');
// Route::post('/{id}/routine/set', [RoutineController::class, 'setRoutine']);
Route::get('/{id}/routine/set/course/{code}', [RoutineController::class, 'course'])->name('routineCourse.teacher');
Route::post('/{id}/routine/set/course/{code}', [RoutineController::class, 'setCourse']);


Route::get('/{id}/files', [ArchiveController::class, 'teacherIndex'])->name('archive.index.teacher');
Route::post('/{id}/files/view', [ArchiveController::class, 'teacherView'])->name('archive.view.teacher');
Route::get('/{id}/files/view/{path}/{name}', [ArchiveController::class, 'teacherViewDetails'])->name('archive.view-details.teacher');

});

Route::group(['prefix' => 'library', 'middleware' => ['isLibrarian', 'auth']], function () {

Route::get('/dashboard', [LibraryController::class, 'dashboard'])->name('librarian.main');
Route::get('/dashboard/password-reset/{id}', [LibraryController::class, 'passwordReset'])->name('passwordReser.librarian');
Route::post('/dashboard/password-reset/{id}', [LibraryController::class, 'passwordResetSubmit']);
Route::get('/dashboard/upload', [LibraryController::class, 'upload'])->name('upload.librarian');
Route::post('/dashboard/upload', [LibraryController::class, 'doupload']);
Route::get('/dashboard/download', [LibraryController::class, 'downloadBooksExcel'])->name('download.librarian');
Route::get('/dashboard/update', [LibraryController::class, 'booksList'])->name('booksList.librarian');
Route::get('/dashboard/update/{id}', [LibraryController::class, 'update'])->name('update.librarian');
Route::post('/dashboard/update/{id}', [LibraryController::class, 'doupdate']);
Route::get('/dashboard/delete/{id}', [LibraryController::class, 'delete'])->name('delete.librarian');
Route::get('/dashboard/search/', [LibraryController::class, 'search'])->name('search.librarian');
Route::post('/dashboard/search/', [LibraryController::class, 'doSearch']);


});






