<?php

namespace App\Http\Controllers;

use App\Contracts\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Exception;

class AdminController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function importForm()
    {
        return view('admin.import');
    }

    public function import(Request $request)
    {
       try{
        $request->validate([
            'file' => 'required|mimes:xlsx',
            'columns' => 'required|array',
        ]);     
        
        Excel::import(new UsersImport($request->columns,$this->userService), $request->file('file'));
        return redirect()->route('users.index')->with('success', 'Users imported successfully.');
       }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

    }
    public function exportForm()
    {
        return view('admin.export');
    }
    public function export(Request $request)
    {
         $columns = $request->input('columns', ['id', 'full_name', 'phone_number', 'email']);
       
         return Excel::download(new UsersExport($columns), 'users.xlsx');
        //  return redirect()->route('admin.export')->with('success', 'Users imported successfully.');

    }
}
?>
