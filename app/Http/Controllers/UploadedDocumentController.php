<?php

namespace App\Http\Controllers;

use App\UploadedDocument;
use Illuminate\Http\Request;

class UploadedDocumentController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approveDocument($id){
        $document = UploadedDocument::find($id);
        $document->document_status = 'approved';
        $document->save();
        return redirect()->back()->with('success','Success.. !  Document is Approved Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disapproveDocument($id){
        $document = UploadedDocument::find($id);
        $document->document_status = 'disapproved';
        $document->save();
        return redirect()->back()->with('success','Success.. !  Document is DisApproved Successfully');
    }
}
