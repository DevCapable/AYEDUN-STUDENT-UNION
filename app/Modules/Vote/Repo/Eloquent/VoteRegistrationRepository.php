<?php

namespace Cms\ServiceCompany\Repo\Eloquent;

use App\Models\Compound;
use App\Models\UserAccount;
use App\Modules\Vote\Models\Vote;

use Illuminate\Support\Str;
use Sentry;

use Illuminate\Database\Eloquent\Collection;
use Cms\ServiceCompany\Repo\VoteRegistrationRepositoryInterface;


class VoteRegistrationRepository implements VoteRegistrationRepositoryInterface
{

    public function __construct(Vote $model, UserAccount $userAccount, Compound $compound)
    {
        $this->model    = $model;
        $this->userAccount    = $userAccount;
        $this->compound = $compound;

    }

    public function getCompany(){
        return $this->model->orderBy('id','desc');
    }


    public function create(array $data)
    {
        $model = $this->getNew($data);
        $model->save();
        return $model;
    }
    public function edit(Vote $model, array $data)
    {
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function delete($id)
    {
        $model = $this->findById($id);
        $model->delete(null);
    }

    public function findBySingleForApi($id)
    {
        $query = $this->model->with(['service', 'shareholders', 'adverts', 'trainings', 'applications', 'gaps', 'quotas', 'staffs', 'users', 'certificates'])
            ->where('id', (int)$id)
            ->orWhere('nogic_unique_id', $id)
            ->firstOrFail();
        return $query;
    }

    public function getCreationForm()
    {
        return new ServiceCompanyForm;
    }

    public function getAdminCreationForm()
    {
        return new ServiceCompanyAdminForm;
    }

    public function getAdminCreationEditForm()
    {
        return new ServiceCompanyAdminEditForm;
    }

    public function getEditForm()
    {
        return new IndividualEditForm;
    }

    public function getViewColumns(){
        return array(
            'org_name'=>column_array('Organization Name'),
            'rc_no'=>column_array('RC Number'),
            'email'=>column_array('Contact Email Address'),
            'tel'=>column_array('Contact Telephone Number'),
            'staff_local'=>column_array('STAFF STRENGTH (NIGERIAN)'),
            'facility_loc'=>column_array('Facility Location'),
            'facility'=>column_array('Plant/Facility Type'),
            'date_of_incorporation' => column_array('Date of Incorporation', 'date'),
            'is_offshore'=>column_array('Is Foreign')
        );
    }

    public function getColumns(){
        return array(
            'org_name'=>column_array('Organization Name', 'text', 'Organization name',null,'', true),
            //'category'=>column_array('Registration Category','select', '', null, '', true),
            'category_id'=>column_array('Registration Category','select', '', 'Category', 'name', true),
            'rc_no'=>column_array('RC Number', 'text', '', null, '', true),
            'date_of_incorporation' => column_array('Date of Incorporation', 'date','', '', '', true),
            //'is_offshore' => column_array('Offshore', 'select','', '', '', true),
            'total_shares'=>column_array('Total Company Shares', 'number', '', null, '', true),
            'assigned_shares'=>column_array('Total Shares Alloted', 'number', '', null, '', false),
            'dpr_no'=>column_array('DPR Certificate No.', 'text', '', null, '', true),
            'tin' => column_array('Tax Identification Number', '', '', null, '', true),
            'nse_status'=>column_array('NSE registration status','select','', null, '', true),
            'nse_reg_no' =>column_array('NSE registration number'),
            'phone'=>column_array('Contact GSM Number'),
            'tel'=>column_array('Contact Telephone Number'),
            'email'=>column_array('Contact Email Address', 'email'),
            'address'=>column_array('Contact Address','textarea', '',null,'', true),
            'facility_loc'=>column_array('Facility Location','text', '', '','', true),
            'facility'=>column_array('Plant/Facility','text', '', '','', true),
            'percentage_nig_ownership'=>column_array('% Nigerian Ownership', 'number', '', null, '', true),
            'staff_local'=>column_array('Staff Strength (NIGERIAN)', 'select', '', '', '',true),
            'staff_foreign'=>column_array('Staff Strength (FOREIGN)', 'select','', '', '',true)
        );
    }

    public function getAdminColumns(){
        return array(
            'is_offshore' => column_array('Is an Offshore Company?', 'select','', '', '', true),
            'org_name'=>column_array('Organization Name', 'text', '', '', '', true),
            'email'=>column_array('Email Address', 'email', '', '', '', true),
            'tel'=>column_array('Contact Telephone Number', 'tel', '', '', '', true),
            'category_id'=>column_array('Registration Category','select', '', 'category', 'name', true),
            'rc_no'=>column_array('RC Number','text','', '', '', true),
            'address'=>column_array('Contact Address','textarea'),

        );
    }

    public function getCategories(){
        return array(
            'Private Limited Company (LTD)' => 'Private Limited Company (LTD)',
            'Public Limited Company [PLC]' => 'Public Limited Company [PLC]',
            'Unlimited Company [UNLTD]' => 'Unlimited Company [UNLTD]',
            'Company Limited Guarantee [LPG]' => 'Company Limited Guarantee [LPG]',
            'Incorporated Trustee [INCT]' => 'Incorporated Trustee [INCT]',
            'Business Name [BUSN]' => 'Business Name [BUSN]'
        );
    }

    public function getNseStatus(){
        return array(
            'Registered'=>'Registered',
            'Not Available'=>'Not Available'
        );
    }

    public function getStaffStrength($foreign = false)
    {
        $array_start = [ '' => '-- select --'];
        $array_middle = $foreign ? ['0 - 10' => '0 - 10'] : ['1 - 10' => '1 - 10'];
        $array_end = [
            '10 - 50' => '10 - 50',
            '50 - 100' => '50 - 100',
            'Above 100' => 'Above 100'
        ];
        return array_merge($array_start,$array_middle,$array_end);
    }

    public function findCount($company_id, $type)
    {
    	//return $this->$$type-->select(DB::raw('count(*) as item_count'))->where('individual_id',$ind_id)->get();
    	return $this->$type->where('service_company_id',$company_id)->count();

    }

    public function findDataForTables() {
        $query = $this->model->select(array(
            'service_companies.id',
            'service_companies.nogic_unique_id',
            'service_companies.org_name',
            'service_companies.email',
            'service_companies.tel',
            'service_companies.rc_no'))->orderBy('org_name', 'asc');
        return $query;
    }

    public function getForCategorization($start,$end) {
        $this->end_date = $end;
        $query = $this->model->whereHas('equipments',function($query){
            $query->whereHas('categorizations',function($query){
                $query->where('created_at','<=',$this->end_date);
            });
        })->with(['companyCategorizations'=>function($query){
            $query->where('created_at','<=',$this->end_date);
        },'equipments'=>function($query){
            $query->whereHas('categorizations', function ($query) {
                $query->where('created_at', '<=', $this->end_date);
            });
        }])->get();
        return $query;
    }


    public function findUniqueName($title){
        return $this->model->where('org_name', $title)->first();
    }

    public function findUniqueEmail($email){
        return $this->model->where('email',$email)->get()->first();
    }

    public function findEmailsForVesselOwners(){
        $category = app('Cms\ServiceCompany\Models\EquipmentCategory')->where('slug', 'marine-vessel')->first();
        return $this->model->whereHas('equipments',function($query) use($category){
            $query->where('equipment_category_id','=',$category->id);
        })->lists('email','id');
    }


    public function findByRc($title){
        return $this->model->where('rc_no', $title)->get()->first();
    }

    public function findAllWithoutCertificate()
    {
        return  $this->model->doesntHave('certificates')->get();
    }

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        // TODO: Implement findAll() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }
}
