<?php
# @Author: Anwar Jahid
# @Date:   2018-08-12T10:25:33+06:00
# @Email:  a.jahid@il.com
# @Filename: Routes.php
# @Last modified by:   Anwar Jahid
# @Last modified time: 2018-08-12T10:44:28+06:00
# @Copyright: anwar jahid
Route::get('/installer', function () {
    return view('installer::installer');
});
