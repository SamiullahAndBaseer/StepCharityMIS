<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maktob;
use App\Models\Certificate;
use App\Models\Contract;
use App\Models\Survey;
use App\Models\ProposalForItem;
use App\Models\Remittance;
use App\Models\Category;

class ResourceController extends Controller
{
    public function maktobs()
    {
        $maktobs = Maktob::all();
        return view('director.maktobs.maktobs', ['maktobs'=> $maktobs]);   
    }

    public function certificates()
    {
        $certificates = Certificate::all();
        return view('director.certificate.certificate_list', ['certificates'=> $certificates]);
    }

    public function contracts()
    {
        $contracts = Contract::all();
        return view('director.contract.all_contracts', ['contracts'=> $contracts]);
    }

    public function surveys()
    {
        $surveys = Survey::all();
        return view('director.survey.survey_list', ['surveys'=> $surveys]);
    }

    public function requestItems()
    {
        $request_items = ProposalForItem::all();
        return view('proposal_for_item.requested_items_list', ['request_items'=> $request_items]); 
    }

    public function remittances()
    {
        $remittances = Remittance::orderBy('created_at', 'DESC')->get();
        return view('remittance.remittance_list', ['remittances'=> $remittances]);
    }

    public function categories()
    {
        $categories = Category::all();
        return view('director.inventory.category.all_categories', ['categories'=> $categories]);
    }
}
