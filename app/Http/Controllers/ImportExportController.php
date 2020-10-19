<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UserDeleteImport;
use App\Imports\UserImport;
use App\Imports\UserUpdateImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import()
    {
        Excel::import(new UserImport, request()->file('file'));

        return response()->json('imported');
    }

    public function updateImport()
    {
        $data = Excel::toArray(new UserUpdateImport, request()->file('file'));

        return collect(head($data))
            ->each(function ($row, $key) {
                User::find($row['id'])->update([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'password' => bcrypt($row['password'])
                ]);
                // DB::table('produk')
                //     ->where('id_produk', $row['id'])
                //     ->update(array_except($row, ['id']));
            });

        // return response()->json('updated');
    }

    public function deleteImport()
    {
        $data = Excel::toArray(new UserDeleteImport, request()->file('file'));

        return collect(head($data))
            ->each(function ($row, $key) {
                User::find($row['id'])->delete();
            });

        // return response()->json('updated');
    }
}
