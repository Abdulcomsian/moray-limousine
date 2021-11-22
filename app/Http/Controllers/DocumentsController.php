<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addDocuments()
    {
        $documents = Document::all();
        return view('admin.manage-documents.add-documents')->with('documents', $documents);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveDocuments(Request $request)
    {
        $request->validate([
            'document_title' => 'required|max:50',
            'applied_on' => 'required|max:50'
        ]);
        $id = $request['edit_id'];
        if ($id == null) {
            if (isset($request->expiry_date_input)) {
                $request['expiry_date_input'] = 1;
            } else {
                $request['expiry_date_input'] = 0;
            }
            Document::create($request->all());
        } else {
            $formData = $request->except('edit_id', '_token');
            if (isset($request->expiry_date_input)) {
                $formData['expiry_date_input'] = 1;
            } else {
                $formData['expiry_date_input'] = 0;
            }
            Document::where('id', $id)->update($formData);
        }
        return redirect('admin/add-documents');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteDocument($id)
    {
        $document = Document::find($id);
        $document->delete();
        return redirect('admin/add-documents');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editDocument($id)
    {
        $document = Document::find($id);
        return response()->json($document);
    }
}
