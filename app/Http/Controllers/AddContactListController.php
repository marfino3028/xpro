<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\ContactList;
use App\Config;
use App\Auth;

class AddContactListController extends BaseController
{
    public function getView(){
		$showData = ContactList::get();
		$no = 1;
		return view('pages/contactlist', ['showData' => $showData]);
    }

    public function getDataContactList(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = ContactList::count();
		$data = ContactList::get();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

    public function getAddContactList(){
        return view('pages/contactlist_add');
    }

    public function addContactList(Request $request)
    {
        ContactList::create([
            'name'          => $request->name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
        ]);
        return redirect('contact_list')->with('success', 'added data contact list successfully');
    }

    public function getContactList(Request $request) 
    {
        $contact_id = $request->route('id');
        $data = ContactList::where('id', $contact_id)->first();
        $params = [
            'data' => $data,
            'showProject' => ContactList::get()
        ];
        return view('pages.contactlist_edit')->with($params);
    }

    public function editContactList(Request $request)
    {
        $contact_id = $request->route('id');
        $project = ContactList::where('id', $contact_id)->first();
        if ($project == null) {
            return redirect()->back()->with('failed', 'project not found');
        }
        $project->update([
            'name'          => $request->name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
        ]);
        return redirect('contact_list')->with('success', 'added data contact list successfully');
    }

    public function deleteDataContactList(Request $request)
    {
		foreach ($request->data as $key => $contact_id) {
            $project = ContactList::where('id', $contact_id)->first();
            if ($project != null) {
                $project->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }
}
