<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Config;
use App\Model\Contact;

class ContactController extends BaseController
{
    protected $model;
    protected $category;
    protected $pathUpload;

    public function __construct(Contact $model)
    {
        $prefix = explode('/',\Route::current()->getPrefix());
        $this->lastPrefix = end($prefix);
        $this->Model = $model;
        $this->pathUpload = 'contacts';

        // routes in controller
        $this->list = 'admin.'.$this->lastPrefix.'.list';
        $this->createUpdate = 'admin.'.$this->lastPrefix.'.create_update';

        // variables share to view
        view()->share('actionList',$this->lastPrefix.'.list');
        view()->share('actionCreate',$this->lastPrefix.'.create');
        view()->share('actionUpdate',$this->lastPrefix.'.detail');
        view()->share('actionDelete',$this->lastPrefix.'.delete');
        view()->share('breadcrumb','liên hệ');
        view()->share('modul',$this->pathUpload);
        view()->share('statusRead',Contact::STATUS_READ);
        view()->share('statusUnRead',Contact::STATUS_UNREAD);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $filter = $request->all();
        $datas = $this->Model->getList($filter);
        return view($this->list,compact('datas','filter'));
    }

    public function detail(Request $request,$id){
        $contact = $this->Model->findOrFail($id);
        $contact->status = Contact::STATUS_READ;
        $contact->save();
        return view($this->createUpdate,compact('contact'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        $item = $this->Model->findOrFail($id);
        $item->delete();
        return redirect()->back()->with([
            'alert_message' => Config::get('constants.DELETE_SUCCESS'),
        ]);
    }



}
