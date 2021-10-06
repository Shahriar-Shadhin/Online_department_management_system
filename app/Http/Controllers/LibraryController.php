<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\User;
use App\Models\Library;
use App\Models\ClassRoom;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BooksImport;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class LibraryController extends Controller
{
    public function doSearch(Request $req){
        // dd($req->all());
        $books = Library::where('name', 'like', '%' . $req->input('search') . '%')->get();
        return view('library.searchDetails', compact('books'));
    }
    public function search(){

        return view('library.search');
    }
    public function bookSearch(Request $req){
        $books = Library::where('name', 'like', '%' . $req->input('book-name') . '%')->get();
        return view('library.searchDetails', compact('books'));
    }
    public function library(){
        $books = Library::orderBy('name', 'asc')->paginate(6);
        return view('library.index', compact('books'));
    }
    public function delete($id){
        Library::find($id)
                ->delete();
        
        return redirect()->route('booksList.librarian')->with('message', 'Successfully deleted');
    }
    public function doupdate(Request $req, $id){
        Library::find($id)
                ->update([
                    'name' => $req->input('name'),
                    'author' => $req->input('author'),
                    'edition' => $req->input('edition'),
                    'year' => $req->input('year'),
                    'publisher' => $req->input('publisher'),
                    'quantity' => $req->input('qty'),

                ]);
        
        return redirect()->route('booksList.librarian')->with('message', 'Successfully updated');
    }
    public function update($id){
        $book = Library::find($id);
        
        return view('library.update', compact('book'));
    }
    public function booksList(){
        $books = Library::all();

        return view('library.bookList', compact('books'));
    }
    public  function doupload(Request $req){
        $req->validate([
            'booksFile' => 'mimes:xlsx,xls,csv'
        ]);
        $file = $req->file('booksFile')->store('uploads');
        // dd($file);
        (new BooksImport)->import($file);
        
        return \back()->withStatus("Excel file uploaded");
    }
    public function upload(){
        return view('library.upload-main');
    }
    public function downloadBooksExcel(){
        $file = public_path()."/sample/books-info.xlsx";
        $headers = array('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        return response()->download($file, 'books-info.xlsx',$headers);
    }
    public function dashboard(){
        return view('library.dashboard');
    }

    public function passwordResetSubmit($id, Request $req){
        $newPass = $req->input('password');
        // dd($req->input());
        $oldPass = $req->input('old-password');
        $user = User::find($id);
        if($user !== null){
        
            if(Hash::check($oldPass, $user['password'])){
                $req->validate([
                    'password' => ['required' , 'confirmed' , 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
                ]);

                if($user['pass_1'] ==null && $user['pass_2'] ==null && $user['pass_3'] ==null){
                    if(!Hash::check($newPass, $user['password'])){
                        User::find($id)
                            ->update(['pass_1' => $user['password'], 'password' => Hash::make($newPass)]);
                        return redirect()->back()->with('message', 'Successfully updated');
                    }else{
                        return redirect()->back()->with('message', 'password is matching between last three password!');
                    }
                }elseif($user['pass_2'] == null && $user['pass_3'] == null){
                    if(!Hash::check($newPass, $user['password']) && !Hash::check($newPass, $user['pass_1'])){
                        User::find($id)
                            ->update([
                                'pass_2' => $user['pass_1'], 
                                'pass_1' => $user['password'],
                                'password' => Hash::make($newPass),
                                ]);

                        
                        return redirect()->back()->with('message', 'Successfully updated');
                    }else{
                        return redirect()->back()->with('message', 'password is matching between last three password!');

                    }
                }elseif($user['pass_3'] == null){
                    if (!Hash::check($newPass, $user['password']) && !Hash::check($newPass, $user['pass_1']) && !Hash::check($newPass, $user['pass_2'])) {
                        User::find($id)
                            ->update([
                                'pass_3' => $user['pass_2'], 
                                'pass_2' => $user['pass_1'],
                                'pass_1' => $user['password'],
                                'password' => Hash::make($newPass),
                                ]);
                        return redirect()->back()->with('message', 'Successfully updated');
                    } else {
                        return redirect()->back()->with('message', 'password is matching between last three password!');

                    }
                
                }elseif(!Hash::check($newPass, $user['password']) && !Hash::check($newPass, $user['pass_1']) && !Hash::check($newPass, $user['pass_2']) && !Hash::check($newPass, $user['pass_3'])){
                    User::find($id)
                            ->update([
                                'pass_3' => $user['pass_2'], 
                                'pass_2' => $user['pass_1'],
                                'pass_1' => $user['password'],
                                'password' => Hash::make($newPass),
                                ]);
                    return redirect()->back()->with('message', 'Successfully updated');
                }


            }else{
                return redirect()->back()->with('message', 'Invalid User Password');
            }
        }else{
            return redirect()->back()->with('message', 'Invalid User');
            
        }
    }
    public function passwordReset(){
        return view('library.passwordReset');
    }
}
