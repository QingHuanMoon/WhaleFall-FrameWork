<?php
/**
 * Created by PhpStorm.
 * User: qhMo0n
 * Date: 2018/4/26
 * Time: 上午10:47
 */

namespace App\Controller\Back\View;


use App\Models\Student;
use Core\BaseController;
use Libs\Request;

class TableController extends BaseController
{
    public function show(Request $request) {
        $id = $request->get('id');
        $row = Student::find($id);
        return $this->display('Table',['row'=>$row]);
    }

    public function info(Student $student) {
        return Student::all();
    }

    public function find(Request $request) {
        $id = $request->get('id');
        return Student::find($id);

    }
}
