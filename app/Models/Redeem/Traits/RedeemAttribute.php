<?php

namespace App\Models\Redeem\Traits;
use DB;

/**
 * Class RedeemAttribute.
 */
trait RedeemAttribute {
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor

    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute() {
        /*return '<div class="btn-group action-btn">
                ' . $this->getEditButtonAttribute("edit-redeem", "admin.redeems.edit") . '
                ' . $this->getDeleteButtonAttribute("delete-redeem", "admin.redeems.destroy") . '
                </div>';*/
        return '<div class="btn-group action-btn">
                ' . $this->changeStatus($this->id) . '
                </div>';
    }

    /**
     * @return string
     */
    public function getStatusAttribute($value) {
        if ($this->isApproved($value)) {
            return "<label class='label label-success'>Approved</label>";
        }

        return "<label class='label label-danger'>Pending</label>";
    }

    /**
     * @return bool
     */
    public function isApproved($value) {
        return $value == 1;
    }

     public function changeStatus($id) {
        //$detail = MembershipUser::find($id);
        $detail = DB::table('redeems')
                     ->where('id', '=', $id)
                     ->first();
        $data = '';
        $status = $detail->status;
        if($detail->status==0) {
            $data = '<a href="javascript:void(0)" id="'.$id.'-1" class="btn btn-flat btn-default change-status">'.
            '<i data-toggle="tooltip" data-placement="top" title="" class="fa fa-check" '.
            'data-original-title="Approved"></i></a>';
        } 
        return $data;
        
    }

}
