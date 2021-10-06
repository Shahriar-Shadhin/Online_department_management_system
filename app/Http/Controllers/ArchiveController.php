<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ArchiveController extends Controller
{
    public function index(){
        return view('admin.archive.index');
    }
    public function create(){
        $folders = File::directories('uploads');
        // $folders = Storage::allDirectories('uploads');
        return view('admin.archive.create', compact('folders'));
    }
    public function doCreate(Request $req){
        // Storage::put('test');
        $path = $req->input('folder'). DIRECTORY_SEPARATOR . $req->input('name');
        
        File::makeDirectory($path);
        
        return redirect()->back()->with('message', 'Successfully Created');
    }
    public function upload(){
        $allFolders = [];
        $subfolders = [];
        $folders = File::directories('uploads');
        
        // dd($folders);
        foreach ($folders as $key => $folder) {
            array_push($allFolders,$folder);
            $subfolder = File::directories($folder);
            if(!empty($subfolder)){
                array_push($allFolders, $subfolder);
            }
        }

        foreach ($allFolders as $key => $folder) {
            // dd($folder);
            if(is_string($folder)){
                array_push($subfolders, $folder);
            }else{
                foreach ($folder as $key => $value) {
                    array_push($subfolders, $value);
                }
            }
        }
        // dd($subfolders);

        // $folders = Storage::allDirectories('uploads');
        // $subfolders = File::directories('uploads');
        
        return view('admin.archive.upload', compact('subfolders'));
    }
    public function doUpload(Request $req){
        // dd($req->input('folder'));
        $file = $req->file('file');
        // dd($file);
        $fileName = $file->getClientOriginalName();
        $filePath = public_path() . $req->input('folder');


        // dd($filePath);
        // Storage::put($req->input('folder'), $fileName);
        $file->move($filePath, $fileName);

        return redirect()->back()->with('message', 'Successfully Uploaded');

    }
    public function view(){
        // $folders = File::directories('uploads');
        $allFolders = [];
        $subfolders = [];
        $folders = File::directories('uploads');
        
        // dd($folders);
        foreach ($folders as $key => $folder) {
            array_push($allFolders,$folder);
            $subfolder = File::directories($folder);
            if(!empty($subfolder)){
                array_push($allFolders, $subfolder);
            }
        }

        foreach ($allFolders as $key => $folder) {
            // dd($folder);
            if(is_string($folder)){
                array_push($subfolders, $folder);
            }else{
                foreach ($folder as $key => $value) {
                    array_push($subfolders, $value);
                }
            }
        }
        return view('admin.archive.files', compact('subfolders'));
    }
    public function details(Request $req){
        if($req->input('action') == 'view'){
            $datas = File::allFiles(public_path(). $req->input('folder'));
            $fileNames = [];
            if(count($datas) != 0){
                $filePath = $datas[0]->getPath();
                foreach ($datas as $key => $data) {
                    array_push($fileNames, $data->getFilename());
                }
            }else{
                $filePath = 0;
            }
            return view('admin.archive.file-details', compact('fileNames', 'filePath'));
        }else{
            $deletePath = public_path() . $req->input('folder');
            File::deleteDirectory($deletePath);
            return redirect()->back()->with('message', 'Successfully Uploaded');

        }
        
    }
    public function deleteFile($path){
        // dd($path);
        File::delete($path);
        return redirect()->back();
    }

    // teacher functions 
    public function teacherIndex(){
        // $folders = File::directories('uploads');
        $allFolders = [];
        $subfolders = [];
        $folders = File::directories('uploads');
        
        // dd($folders);
        foreach ($folders as $key => $folder) {
            array_push($allFolders,$folder);
            $subfolder = File::directories($folder);
            if(!empty($subfolder)){
                array_push($allFolders, $subfolder);
            }
        }

        foreach ($allFolders as $key => $folder) {
            // dd($folder);
            if(is_string($folder)){
                array_push($subfolders, $folder);
            }else{
                foreach ($folder as $key => $value) {
                    array_push($subfolders, $value);
                }
            }
        }

        return view('teacher.files', compact('subfolders'));
    }
    public function teacherView(Request $req){
        // $folders = File::directories('uploads');
        $allFolders = [];
        $subfolders = [];
        $folders = File::directories('uploads');
        
        // dd($folders);
        foreach ($folders as $key => $folder) {
            array_push($allFolders,$folder);
            $subfolder = File::directories($folder);
            if(!empty($subfolder)){
                array_push($allFolders, $subfolder);
            }
        }

        foreach ($allFolders as $key => $folder) {
            // dd($folder);
            if(is_string($folder)){
                array_push($subfolders, $folder);
            }else{
                foreach ($folder as $key => $value) {
                    array_push($subfolders, $value);
                }
            }
        }

        $datas = File::allFiles(public_path(). $req->input('folder'));
        // dd($datas);
            $fileNames = [];
            if(count($datas) != 0){
                $filePath = $datas[0]->getPath();
                foreach ($datas as $key => $data) {
                    array_push($fileNames, $data->getFilename());
                }
            }else{
                $filePath = 0;
            }
            return view('teacher.files', compact('fileNames', 'filePath', 'subfolders'));
    }

    public function teacherViewDetails($id, $path, $name){
        $type = File::mimeType($path);
        $file = $path;
        $headers = array('Content-Type:' . $type);
        return response()->download($file, $name,$headers);
    }
    public function studentIndex(){
        // $folders = File::directories('uploads');
        $allFolders = [];
        $subfolders = [];
        $folders = File::directories('uploads');
        
        // dd($folders);
        foreach ($folders as $key => $folder) {
            array_push($allFolders,$folder);
            $subfolder = File::directories($folder);
            if(!empty($subfolder)){
                array_push($allFolders, $subfolder);
            }
        }

        foreach ($allFolders as $key => $folder) {
            // dd($folder);
            if(is_string($folder)){
                array_push($subfolders, $folder);
            }else{
                foreach ($folder as $key => $value) {
                    array_push($subfolders, $value);
                }
            }
        }
        return view('student.files', compact('subfolders'));
    }
    public function studentView(Request $req){
        // $folders = File::directories('uploads');

        // $datas = File::allFiles(public_path(). $req->input('folder'));
        //     $fileNames = [];
        //     if(count($datas) != 0){
        //         $filePath = $datas[0]->getPath();
        //         foreach ($datas as $key => $data) {
        //             array_push($fileNames, $data->getFilename());
        //         }
        //     }else{
        //         $filePath = 0;
        //     }
        //     return view('student.files', compact('fileNames', 'filePath', 'folders'));

            $allFolders = [];
        $subfolders = [];
        $folders = File::directories('uploads');
        
        // dd($folders);
        foreach ($folders as $key => $folder) {
            array_push($allFolders,$folder);
            $subfolder = File::directories($folder);
            if(!empty($subfolder)){
                array_push($allFolders, $subfolder);
            }
        }

        foreach ($allFolders as $key => $folder) {
            // dd($folder);
            if(is_string($folder)){
                array_push($subfolders, $folder);
            }else{
                foreach ($folder as $key => $value) {
                    array_push($subfolders, $value);
                }
            }
        }

        $datas = File::allFiles(public_path(). $req->input('folder'));
        // dd($datas);
            $fileNames = [];
            if(count($datas) != 0){
                $filePath = $datas[0]->getPath();
                foreach ($datas as $key => $data) {
                    array_push($fileNames, $data->getFilename());
                }
            }else{
                $filePath = 0;
            }
            return view('student.files', compact('fileNames', 'filePath', 'subfolders'));

    }
}
