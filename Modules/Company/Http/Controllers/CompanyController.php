<?php

namespace Modules\Company\Http\Controllers;

use App\DiscountCompany;
use App\ExportOrder;
use App\Field;
use App\HistoryDebt;
use App\ImportItemOrder;
use App\ItemOrder;
use App\Payment;
use App\PrintOrder;
use App\ZHistoryGood;
use DateTime;
use Google\Auth\Cache\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ManageApiController;
use App\Company;
use Illuminate\Support\Facades\DB;
use Modules\Good\Entities\GoodPropertyItem;
use App\RoomServiceRegister;

class CompanyController extends ManageApiController
{
    public function createCompany(Request $request)
    {
        if ($request->name === null || trim($request->name) == '' ||
            $request->registered_business_address === null || trim($request->registered_business_address) == '' ||
            $request->office_address === null || trim($request->office_address) == '' ||
            $request->phone_company === null || trim($request->phone_company) == '' ||
            $request->tax_code === null || trim($request->tax_code) == '' ||
            $request->account_number === null || trim($request->account_number) == '' ||
            $request->account_name === null || trim($request->account_name) == '' ||
            $request->bank_name === null || trim($request->bank_name) == '' ||
            $request->field_id === null || trim($request->field_id) == '' ||
            $request->bank_branch === null || trim($request->bank_branch) == '' ||
            $request->user_contact === null || trim($request->user_contact) == '' ||
            $request->user_contact_phone === null || trim($request->user_contact_phone) == '' ||
            $request->type === null || trim($request->type) == '') return $this->respondErrorWithStatus("Thiếu trường");
        $company = new Company;
        $company->name = $request->name;
        $company->registered_business_address = $request->registered_business_address;
        $company->office_address = $request->office_address;
        $company->phone_company = $request->phone_company;
        $company->tax_code = $request->tax_code;
        $company->account_number = $request->account_number;
        $company->account_name = $request->account_name;
        $company->bank_name = $request->bank_name;
        $company->bank_branch = $request->bank_branch;
        $company->field_id = $request->field_id;
        $company->user_contact = $request->user_contact;
        $company->user_contact_phone = $request->user_contact_phone;
        $company->type = $request->type;
        $company->user_contact1 = $request->user_contact1;
        $company->user_contact_phone1 = $request->user_contact_phone1;
        $company->user_contact2 = $request->user_contact2;
        $company->user_contact_phone2 = $request->user_contact_phone2;
        $company->discount_comic = $request->discount_comic;
        $company->discount_text = $request->discount_text;
        $company->save();
        $field = Field::find($company->field_id);
        $str = convert_vi_to_en_not_url($field->name);
        $str = str_replace(" ", "", str_replace("&*#39;", "", $str));
        $str = strtoupper($str);
        $day = date_format($company->created_at, 'd');
        $month = date_format($company->created_at, 'm');
        $id = (string)$company->id;
        while (strlen($id) < 4) $id = '0' . $id;
        $company->partner_code = $str . $day . $month . $id;
        $company->save();
        return $this->respondSuccessWithStatus([
            "messange" => "Tạo thành công",
        ]);
    }

    public function createField(Request $request)
    {
        if ($request->name === null || trim($request->name) == '') return $this->respondErrorWithStatus("Thiếu tên");
        $field = new Field;
        $field->name = $request->name;
        $field->save();
        return $this->respondSuccessWithStatus([
            "message" => "Tạo thành công",
        ]);
    }

    public function editCompany($companyId, Request $request)
    {
        $company = Company::find($companyId);
        if (!$company) return $this->respondErrorWithStatus("Không tồn tại công ty");
        $company->name = $request->name;
        $company->registered_business_address = $request->registered_business_address;
        $company->office_address = $request->office_address;
        $company->phone_company = $request->phone_company;
        $company->tax_code = $request->tax_code;
        $company->account_number = $request->account_number;
        $company->account_name = $request->account_name;
        $company->bank_name = $request->bank_name;
        $company->bank_branch = $request->bank_branch;
        $company->field_id = $request->field_id;
        $company->user_contact = $request->user_contact;
        $company->user_contact_phone = $request->user_contact_phone;
        $company->type = $request->type;
        $company->user_contact1 = $request->user_contact1;
        $company->user_contact_phone1 = $request->user_contact_phone1;
        $company->user_contact2 = $request->user_contact2;
        $company->user_contact_phone2 = $request->user_contact_phone2;
        $company->discount_comic = $request->discount_comic;
        $company->discount_text = $request->discount_text;
        $company->save();
        $field = Field::find($company->field_id);
        $str = convert_vi_to_en_not_url($field->name);
        $str = str_replace(" ", "", str_replace("&*#39;", "", $str));
        $str = strtoupper($str);
        $day = date_format($company->created_at, 'd');
        $month = date_format($company->created_at, 'm');
        $id = (string)$company->id;
        while (strlen($id) < 4) $id = '0' . $id;
        $company->partner_code = $str . $day . $month . $id;
        $company->save();
        return $this->respondSuccessWithStatus([
            "message" => "Sửa thành công",
        ]);
    }

    public function createDiscount($companyId, Request $request)
    {
        $discountCompany = new DiscountCompany;
        $discountCompany->company_id = $companyId;
        $discountCompany->task_list_id = $request->task_list_id;
        $discountCompany->discount_value = $request->discount_value;
        $discountCompany->save();
        return $this->respondSuccessWithStatus([
            "message" => "Thành công"
        ]);

    }

    public function getDiscountsCompany($companyId, Request $request)
    {
        $discountCompany = DiscountCompany::where('company_id', $companyId)->get();
        return $this->respondSuccessWithStatus([
            "discountList" => $discountCompany->map(function ($discount) {
                return $discount->transform();
            })
        ]);

    }

    public function editDiscountCompany($discountId, Request $request)
    {
        $discount = DiscountCompany::find($discountId);
        $discount->discount_value = $request->discount_value;
        $discount->save();
        return $this->respondSuccessWithStatus([
            "message" => "Thành công"
        ]);
    }

    public function getAllField(Request $request)
    {
        $fields = Field::all();
        return $this->respondSuccessWithStatus([
            "fields" => $fields->map(function ($field) {
                return $field->transform();
            })
        ]);
    }

    public function getAllCompany(Request $request)
    {
        $name = $request->name;
        $partner_code = $request->partner_code;
        $address = $request->address;
        $phone = $request->phone;
        $type = $request->type;
        $limit = $request->limit ? $request->limit : 20;
        if ($limit != -1) {
            $company = Company::query();
            if ($name)
                $company->where('name', 'like', '%' . $name . '%');
            if ($partner_code)
                $company->where('partner_code', 'like', '%' . $partner_code . '%');
            if ($address)
                $company->where('office_address', 'like', '%' . $address . '%');
            if ($phone)
                $company->where('phone_company', 'like', '%' . $phone . '%');
            if ($type)
                $company->where('type', $type);
            $company = $company->orderBy('created_at', 'desc')->paginate($limit);
            return $this->respondWithPagination($company, [
                "company" => $company->map(function ($data) {
                    return $data->transform();
                }),
            ]);
        } else {
            $company = Company::all();
            return $this->respondSuccessWithStatus([
                "company" => $company->map(function ($pp) {
                    return $pp->transform();
                })
            ]);
        }
    }

    public function getCompanyProvide()
    {
        $companies = Company::where('type', '<>', 'share')->get();
        return $this->respondSuccessWithStatus([
            "companies" => $companies->map(function ($company) {
                return $company->transform();
            })
        ]);
    }

    public function getCompanyShare()
    {
        $companies = Company::where('type', '<>', 'provided')->get();
        return $this->respondSuccessWithStatus([
            "companies" => $companies->map(function ($company) {
                return $company->transform();
            })
        ]);
    }

    public function getDetailCompany($companyId, Request $request)
    {
        $company = Company::find($companyId);
        if (!$company) return $this->respondErrorWithStatus("Không tồn tại công ty");
        return $this->respondSuccessWithStatus([
            "company" => $company->transform()
        ]);
    }

    public function createPayment(Request $request)
    {
        if ($request->register_id) {
            if ($request->user_id === null || $request->money_value === null || trim($request->money_value) == '')
                return $this->respondErrorWithStatus("Thiếu trường");
            $register = RoomServiceRegister::find($request->register_id);
            if ($register == null)
                return $this->respondErrorWithStatus(['Không tồn tại đăng kí']);
            if ($register->extra_time < $request->time) {
                return $this->respondErrorWithStatus('Vui lòng nhập thời gian nhỏ hơn thời gian còn lại');
            }
            $payment = new Payment;
            $payment->bill_image_url = 'a';
            $payment->description = $request->description;
            $payment->money_value = $request->money_value;
            $payment->payer_id = $request->user_id;
            $payment->receiver_id = $this->user->id;
            $payment->register_id = $request->register_id;
            $payment->time = $request->time;
            $payment->type = "payment";
            $payment->save();

            $register->money += $request->money_value;
            $register->extra_time -= $request->time;
            $register->save();

            return $this->respondSuccessWithStatus([
                "message" => "Thành công",
                "payment" => $payment->transform_for_up(),

            ]);
        } else {
            if ($request->payer_id === null || $request->receiver_id === null ||
                $request->money_value === null || trim($request->money_value) == '')
                return $this->respondErrorWithStatus("Thiếu trường");
            $payment = new Payment;
            $payment->bill_image_url = $request->bill_image_url;
            $payment->description = $request->description;
            $payment->money_value = $request->money_value;
            $payment->payer_id = $request->payer_id;
            $payment->receiver_id = $request->receiver_id;
            $payment->staff_id = $this->user->id;
            $payment->deadline = $request->deadline;
            $payment->type = $request->type;
            $payment->save();
            return $this->respondSuccessWithStatus([
                "message" => "Thành công"
            ]);
        }
    }


    public function editPayment($paymentId, Request $request)
    {
        $payment = Payment::find($paymentId);
        if (!$payment) return $this->respondErrorWithStatus("Không tồn tại");
        if ($request->payer_id === null || !$request->receiver_id === null ||
            $request->money_value === null || trim($request->money_value) == '')

            return $this->respondErrorWithStatus("Thiếu trường");
        $payment->bill_image_url = $request->bill_image_url;
        $payment->description = $request->description;
        $payment->money_value = $request->money_value;
        $payment->payer_id = $request->payer_id;
        $payment->receiver_id = $request->receiver_id;
        $payment->staff_id = $request->staff_id;
        $payment->deadline = $request->deadline;
        $payment->type = $request->type;
        $payment->save();

        return $this->respondSuccessWithStatus([
            "message" => "Thành công"
        ]);
    }

    public function changeStatusPayment($paymentId, Request $request)
    {
        $payment = Payment::find($paymentId);
        $payment->status = $request->status;
        $payment->save();
        if ($request->status == 1) {
            $n = HistoryDebt::where('company_id', $payment->receiver_id)->count();
            $historyDebts = HistoryDebt::where('company_id', $payment->receiver_id)->get();
            if ($n > 0) $pre_value = $historyDebts[$n - 1]->total_value;
            else $pre_value = 0;
            $value = $payment->money_value;
            $historyDebt = new HistoryDebt;
            $historyDebt->value = $value;
            $historyDebt->total_value = $pre_value + $value;
            $historyDebt->date = $payment->created_at;
            $historyDebt->type = "payment";
            $historyDebt->company_id = $payment->receiver_id;
            $company = Company::find($payment->receiver_id);
            $company->account_value = $historyDebt->total_value;
            $company->save();
            $historyDebt->save();

            $n = HistoryDebt::where('company_id', $payment->payer_id)->count();
            $historyDebts = HistoryDebt::where('company_id', $payment->payer_id)->get();
            if ($n > 0) $pre_value = $historyDebts[$n - 1]->total_value;
            else $pre_value = 0;
            $value = $payment->money_value;
            $historyDebt = new HistoryDebt;
            $historyDebt->value = $value * (-1);
            $historyDebt->total_value = $pre_value + $value * (-1);
            $historyDebt->date = $payment->created_at;
            $historyDebt->type = "payment";
            $historyDebt->company_id = $payment->payer_id;
            $company = Company::find($payment->payer_id);
            $company->account_value = $historyDebt->total_value;
            $company->save();
            $historyDebt->save();


        }
        return $this->respondSuccessWithStatus([
            "message" => "Thành công"
        ]);
    }

    public function getAllPayment(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;
        if($limit == -1){
            $payments = Payment::all(); 
            
            return $this->respondSuccessWithStatus([
                "payment" => $payments->map(function ($pp) {
                    return $pp->transform();
                })
            ]);
        }
        $payments = Payment::query();
        $receiver_id = $request->receiver_id;
        $payer_id = $request->payer_id;
        $startTime = $request->start_time;
        $endTime = date("Y-m-d", strtotime("+1 day", strtotime($request->end_time)));
        if ($receiver_id) {
            $payments = $payments->where('receiver_id', $receiver_id);
        }
        if ($payer_id) {
            $payments = $payments->where('payer_id', $payer_id);
        }
        if($startTime && $endTime)
            $payments = $payments->whereBetween('created_at',array($startTime,$endTime));
        
            $payments = $payments->where('type',$request->type);
        $payments = $payments->orderBy('created_at', 'desc')->paginate($limit);
        return $this->respondWithPagination($payments, [
            "payment" => $payments->map(function ($payment) {
                return $payment->transform();
            }),

        ]);
    }

    public function getPayment($paymentId)
    {
        $payment = Payment::find($paymentId);
        if (!$payment) return $this->respondErrorWithStatus("Không tồn tại");
        return $this->respondSuccessWithStatus([
            'payment' => $payment->transform(),
        ]);
    }


    public function createPrintOrder(Request $request)
    {
        if ($request->staff_id === null ||
            $request->company_id === null ||
            $request->good_id === null)
            return $this->respondErrorWithStatus("Thiếu trường");
        $printorder = new PrintOrder();
        $printorder->staff_id = $request->staff_id;
        $printorder->company_id = $request->company_id;
        $printorder->good_id = $request->good_id;
        $printorder->quantity = $request->quantity;
        $printorder->core1 = $request->core1;
        $printorder->core2 = $request->core2;
        $printorder->cover1 = $request->cover1;
        $printorder->cover2 = $request->cover2;
        $printorder->spare_part1 = $request->spare_part1;
        $printorder->spare_part2 = $request->spare_part2;
        $printorder->packing1 = $request->packing1;
        $printorder->packing2 = $request->packing2;
        $printorder->other = $request->other;
        $printorder->price = $request->price;
        $printorder->note = $request->note;
        $printorder->order_date = $request->order_date;
        $printorder->receive_date = $request->receive_date;
        $printorder->save();

        $name = $printorder->company->name;
        $str = convert_vi_to_en_not_url($name);
        $str = str_replace(" ", "", str_replace("&*#39;", "", $str));
        $str = strtoupper($str);
        $ppp = DateTime::createFromFormat('Y-m-d', $printorder->order_date);
        $day = date_format($ppp, 'd');
        $month = date_format($ppp, 'm');
        $year = date_format($ppp, 'y');
        $id = (string)$printorder->id;
        while (strlen($id) < 4) $id = '0' . $id;
        $printorder->command_code = "DATIN" . $id . $str . $day . $month . $year;
        $printorder->save();

        $order = new ItemOrder;
        $order->command_code = $printorder->command_code;
        $order->company_id = $printorder->company_id;
        $order->status = 0;
        $order->type = "print-order";
        $order->staff_id = $printorder->staff_id;
        $order->print_order_id = $printorder->id;
        $order->good_count = 1;
        $order->save();

        $importOrder = new ImportItemOrder;
        $importOrder->good_id = $printorder->good_id;
        $importOrder->quantity = $printorder->quantity;
        $importOrder->item_order_id = $order->id;
        $importOrder->save();
        return $this->respondSuccessWithStatus([
            "message" => "Thành công"
        ]);
    }

    public function editPrintOrder($printOrderId, Request $request)
    {
        $printorder = PrintOrder::find($printOrderId);
        if (!$printorder) return $this->respondErrorWithStatus("Không tồn tại");
        if ($request->staff_id === null ||
            $request->company_id === null ||
            $request->good_id === null)
            return $this->respondErrorWithStatus("Thiếu trường");
        $printorder->staff_id = $request->staff_id;
        $printorder->company_id = $request->company_id;
        $printorder->good_id = $request->good_id;
        $printorder->quantity = $request->quantity;
        $printorder->core1 = $request->core1;
        $printorder->core2 = $request->core2;
        $printorder->cover1 = $request->cover1;
        $printorder->cover2 = $request->cover2;
        $printorder->spare_part1 = $request->spare_part1;
        $printorder->spare_part2 = $request->spare_part2;
        $printorder->packing1 = $request->packing1;
        $printorder->packing2 = $request->packing2;
        $printorder->other = $request->other;
        $printorder->price = $request->price;
        $printorder->note = $request->note;
        $printorder->order_date = $request->order_date;
        $printorder->receive_date = $request->receive_date;
        $printorder->save();

        $name = $printorder->company->name;
        $str = convert_vi_to_en_not_url($name);
        $str = str_replace(" ", "", str_replace("&*#39;", "", $str));
        $str = strtoupper($str);
        $ppp = DateTime::createFromFormat('Y-m-d', $printorder->order_date);
        $day = date_format($ppp, 'd');
        $month = date_format($ppp, 'm');
        $year = date_format($ppp, 'y');
        $id = (string)$printorder->id;
        while (strlen($id) < 4) $id = '0' . $id;
        $printorder->command_code = "DATIN" . $id . $str . $day . $month . $year;
        $printorder->save();

        $order = ItemOrder::where('print_order_id', $printorder->id)->first();
        $order->command_code = $printorder->command_code;
        $order->company_id = $printorder->company_id;
        $order->status = 0;
        $order->type = "print-order";
        $order->staff_id = $printorder->staff_id;
        $order->print_order_id = $printorder->id;
        $order->good_count = 1;
        $order->save();

        $importOrder = ImportItemOrder::where('item_order_id', $order->id)->first();
        $importOrder->good_id = $printorder->good_id;
        $importOrder->quantity = $printorder->quantity;
        $importOrder->item_order_id = $order->id;
        $importOrder->save();
        return $this->respondSuccessWithStatus([
            "message" => "Sửa thành công"
        ]);
    }

    public function getAllPrintOrder(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;
        $search = $request->search;
        $printorders = PrintOrder::query();
        if ($search)
            $printorders = $printorders->where('command_code', 'like', '%' . $search . '%');
        if ($request->company_id)
            $printorders = $printorders->where('company_id', $request->company_id);

        if ($request->good_id)
            $printorders = $printorders->where('good_id', $request->good_id);

        if ($request->status != null)
            $printorders = $printorders->where('status', $request->status);

        $printorders = $printorders->orderBy('created_at', 'desc')->paginate($limit);

        return $this->respondWithPagination($printorders, [
            "printorders" => $printorders->map(function ($printorder) {
                return $printorder->transform();
            })
        ]);

    }

    public function getPrintOrder($printOrderId, Request $request)
    {
        $printorder = PrintOrder::find($printOrderId);
        if (!$printorder) return $this->respondErrorWithStatus("Không tồn tại");
        return $this->respondSuccessWithStatus([
            "printOrder" => $printorder->transform()
        ]);
    }

    public function createOrEditExportOrder($exportOrderId, Request $request)
    {
        //export order chính là đơn hàng nhưng có status = 2
        //status<2 thuộc về đơn hàng
        $exportOrder = ItemOrder::find($exportOrderId);
        $exportOrder->status = 2;
        $exportOrder->date = $request->date; // là ngày xuất hàng
        $exportOrder->import_export_staff_id = $request->staff_id;
        $exportOrder->company_debt_id = $request->company_debt_id;
        $exportOrder->note = $request->note;
        $exportOrder->save();
        $goods = json_decode($request->goods);
        foreach ($goods as $good) {
            $good_new = ExportOrder::find($good->id);
            $good_new->export_quantity = $good->export_quantity;
            $good_new->warehouse_id = $good->warehouse_id;
            $good_new->save();
            $historyGood = new ZHistoryGood;
            $historyGood->quantity = $good->export_quantity;
            $historyGood->good_id = $good_new->good_id;
            $historyGood->warehouse_id = $good_new->warehouse_id;
            $historyGood->item_order_id = $exportOrderId;
            $historyGood->save();

        }
        return $this->respondSuccessWithStatus([
            "message" => "Thành công"
        ]);
    }


    public function getAllExportOrder(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;
        $exportorders = ItemOrder::query();

        $exportorders = $exportorders->where('type', '=', 'be-ordered')
            ->where('status', '>', 1)
            ->orderBy('created_at', 'desc')->paginate($limit);

        return $this->respondWithPagination($exportorders, [
            "exportorders" => $exportorders->map(function ($exportorder) {
                return $exportorder->transform();
            })
        ]);
    }

    public function getAllExportOrderNoPaging(Request $request)
    {

        //$exportorders = ItemOrder::query();

        $exportorders = ItemOrder::where('type', '=', 'be-ordered')
            ->where('status', '>', 1)->get();

        return $this->respondSuccessWithStatus([
            "exportorders" => $exportorders->map(function ($order) {
                return $order->transform();
            })
        ]);

    }

    public function getExportOrder($exportOrderId, Request $request)
    {
        $exportorder = ItemOrder::find($exportOrderId);
        if (!$exportorder) return $this->respondErrorWithStatus("Không tồn tại");
        return $this->respondSuccessWithStatus([
            "exportOrder" => $exportorder->transform()
        ]);
    }

    public function changeStatusPrintOrder($printOrderId, Request $request)
    {
        $printOrder = PrintOrder::find($printOrderId);
        if (!$printOrder) return $this->respondErrorWithStatus("Không tồn tại");
        $printOrder->status = $request->status;
        $printOrder->save();
        $order = ItemOrder::where('print_order_id', $printOrder->id)->first();
        $order->status = $printOrder->status;
        $order->save();
        $date = $printOrder->created_at;
        if ($request->status == 3) {
            $n = HistoryDebt::where('company_id', $printOrder->company_id)->count();
            $historyDebts = HistoryDebt::where('company_id', $printOrder->company_id)->get();
            if ($n > 0) $pre_value = $historyDebts[$n - 1]->total_value;
            else $pre_value = 0;
            $value = $printOrder->quantity * $printOrder->price;
            $historyDebt = new HistoryDebt;
            $historyDebt->value = $value;
            $historyDebt->total_value = $pre_value + $value;
            $historyDebt->date = $date;
            $historyDebt->type = "export";
            $historyDebt->company_id = $printOrder->company_id;
            $company = Company::find($historyDebt->company_id);
            $company->account_value = $historyDebt->value;
            $company->save();
            $historyDebt->save();

            $n = HistoryDebt::where('company_id', $order->company_debt_id)->count();
            $historyDebts = HistoryDebt::where('company_id', $order->company_debt_id)->get();
            if ($n > 0) $pre_value = $historyDebts[$n - 1]->total_value;
            else $pre_value = 0;
            $value = $printOrder->quantity * $printOrder->price;
            $historyDebt = new HistoryDebt;
            $historyDebt->value = $value * (-1);
            $historyDebt->total_value = $pre_value + $value * (-1);
            $historyDebt->date = $date;
            $historyDebt->type = "import";
            $historyDebt->company_id = $order->company_debt_id;
            $company = Company::find($historyDebt->company_id);
            $company->account_value = $historyDebt->value;
            $company->save();
            $historyDebt->save();

        }

        return $this->respondSuccessWithStatus([
            "message" => "Thay đổi thành công"
        ]);
    }


    public function getAllCodePrintOrder()
    {
        $printorders = PrintOrder::query();
        $printorders = $printorders->orderBy('created_at', 'desc')->get();
        return $this->respondSuccessWithStatus([
            "codes" => $printorders->map(function ($printorder) {
                return [
                    "id" => $printorder->id,
                    "code" => $printorder->command_code,
                ];
            })
        ]);
    }

    public function getAllProperties()
    {
        $props = GoodPropertyItem::where('type', 'print_order')->get();
        return $this->respondSuccessWithStatus([
            "props" => $props->map(function ($prop) {
                return [
                    "id" => $prop->id,
                    "name" => $prop->name,
                    "value" => $prop->prevalue,
                ];
            })
        ]);
    }

    public function editProperty($propId, Request $request)
    {
        $prop = GoodPropertyItem::find($propId);
        if ($request->value === null)
            return $this->respondErrorWithStatus("Thiếu trường");
        $prop->prevalue = $request->value;

        $prop->save();
        return $this->respondSuccessWithStatus([
            "message" => "Thay đổi thành công"
        ]);
    }

    public function createProperty(Request $request)
    {
        $prop = new GoodPropertyItem();
        $prop->name = $request->name;
        $prop->prevalue = $request->value;
        $prop->type = "print_order";
        $prop->save();
        return $this->respondSuccessWithStatus([
            "message" => "Thêm thành công"
        ]);
    }

    public function createOrdered(Request $request)
    {
        //đơn hàng từ nhà phân phối đặt
        if ($request->company_id == null) return $this->respondErrorWithStatus("Thiếu nhà phân phối");
        $order = new ItemOrder;
        $order->company_id = $request->company_id;
        $order->type = "be-ordered";
        $order->staff_id = $request->staff_id;
        $order->note = $request->note;
        $order->save();
        $ppp = $order->created_at;
        $day = date_format($ppp, 'd');
        $month = date_format($ppp, 'm');
        $year = date_format($ppp, 'y');
        $id = (string)$order->id;
        while (strlen($id) < 4) $id = '0' . $id;
        $order->command_code = "DONHANG" . $day . $month . $year . $id;
        $order->save();
        $goods = json_decode($request->goods);
        $order->good_count = count($goods);
        $order->save();
        foreach ($goods as $good) {
            $exportOrder = new ExportOrder;
            $exportOrder->warehouse_id = 0;
            $exportOrder->company_id = $order->company_id;
            $exportOrder->price = $good->price;
            $exportOrder->quantity = $good->quantity;
            $exportOrder->discount = $good->discount ? $good->discount : 0;
            $exportOrder->good_id = $good->id;
            $exportOrder->total_price = $request->total_price ? $request->total_price : 0;
            $exportOrder->item_order_id = $order->id;
            $exportOrder->save();
        }
        $notif = new NotificationZgroupController;
        $notif->sendAddNewOrderedNotification($order->staff_id);
        return $this->respondSuccessWithStatus([
            "message" => "Tạo đơn hàng thành công"
        ]);
    }

    public function editOrdered($orderId, Request $request)
    {
        //đơn hàng từ nhà phân phối đặt
        $order = ItemOrder::find($orderId);
        if ($request->company_id == null) return $this->respondErrorWithStatus("Thiếu nhà phân phối");
        $order->company_id = $request->company_id;
        $order->staff_id = $request->staff_id;
        $order->note = $request->note;
        $order->save();
        $goods = $order->exportOrder;
        foreach ($goods as $good) {
            $good->delete();
        }
        $goods = json_decode($request->goods);
        $order->good_count = count($goods);
        $order->save();
        foreach ($goods as $good) {
            $exportOrder = new ExportOrder;
            $exportOrder->warehouse_id = 0;
            $exportOrder->company_id = $order->company_id;
            $exportOrder->price = $good->price;
            $exportOrder->quantity = $good->quantity;
            $exportOrder->discount = $good->discount;
            $exportOrder->good_id = $good->id;
            $exportOrder->total_price = $request->total_price ? $request->total_price : 0;
            $exportOrder->item_order_id = $order->id;
            $exportOrder->save();
        }
        return $this->respondSuccessWithStatus([
            "message" => "Sửa đơn hàng thành công"
        ]);


    }

    public function getAllOrdered(Request $request)
    {
        //đơn hàng từ nhà phân phối đặt
        $limit = $request->limit ? $request->limit : 20;
        if ($request->limit == -1) {
            $orders = ItemOrder::where('type', 'be-ordered');
            if ($request->filter) $orders = $orders->where('status', '>', 0)->where('status', '<', 3);
            $orders = $orders->orderBy('created_at', 'desc')->get();
            return $this->respondSuccessWithStatus([
                "orders" => $orders->map(function ($order) {
                    return $order->transform();
                })
            ]);
        } else {
            $orders = ItemOrder::where('type', 'be-ordered')->orderBy('created_at', 'desc')->paginate($limit);
            return $this->respondWithPagination($orders, [
                "orders" => $orders->map(function ($order) {
                    return $order->transform();
                })
            ]);

        }
    }

    public function getOrdered($orderId, Request $request)
    {
        //đơn hàng từ nhà phân phối đặt
        $order = ItemOrder::find($orderId);
        return $this->respondSuccessWithStatus([
            "order" => $order->transform()
        ]);
    }

    public function createOrder(Request $request)
    {
        //đơn hàng từ nhà cung cấp đặt
        if ($request->company_id == null) return $this->respondErrorWithStatus("Thiếu nhà phân phối");
        $order = new ItemOrder;
        $order->company_id = $request->company_id;
        $order->type = "order";
        $order->staff_id = $request->staff_id;
        $order->note = $request->note;
        $order->save();
        $ppp = $order->created_at;
        $day = date_format($ppp, 'd');
        $month = date_format($ppp, 'm');
        $year = date_format($ppp, 'y');
        $id = (string)$order->id;
        while (strlen($id) < 4) $id = '0' . $id;
        $order->command_code = "DATHANG" . $day . $month . $year . $id;
        $order->save();
        $goods = json_decode($request->goods);
        $order->good_count = count($goods);
        $order->save();
        foreach ($goods as $good) {
            $importOrder = new ImportItemOrder;
            $importOrder->warehouse_id = 0;
            $importOrder->price = $good->price;
            $importOrder->quantity = $good->quantity;
            $importOrder->good_id = $good->id;
            $importOrder->item_order_id = $order->id;
            $importOrder->save();
        }
        $notif = new NotificationZgroupController;
        $notif->sendAddNewOrderNotification($order->staff_id);
        return $this->respondSuccessWithStatus([
            "message" => "Tạo đơn đặt hàng thành công"
        ]);
    }

    public function editOrder($orderId, Request $request)
    {
        //đơn hàng từ nhà cung cấp đặt
        $order = ItemOrder::find($orderId);
        if ($request->company_id == null) return $this->respondErrorWithStatus("Thiếu nhà phân phối");
        $order->company_id = $request->company_id;
        $goods = $order->importOrder;
        $order->staff_id = $request->staff_id;
        $order->note = $request->note;
        $order->save();
        foreach ($goods as $good) {
            $good->delete();
        }
        $goods = json_decode($request->goods);
        $order->good_count = count($goods);
        $order->save();
        foreach ($goods as $good) {
            $importOrder = new ImportItemOrder;
            $importOrder->warehouse_id = 0;
            $importOrder->price = $good->price;
            $importOrder->quantity = $good->quantity;
            $importOrder->good_id = $good->id;
            $importOrder->item_order_id = $order->id;
            $importOrder->save();
        }
        return $this->respondSuccessWithStatus([
            "message" => "Sửa đơn đặt hàng thành công"
        ]);


    }

    public function getAllOrder(Request $request)
    {
        //đơn hàng từ nhà cc đặt
        $limit = $request->limit ? $request->limit : 20;
        if ($request->limit == -1) {
            $orders = ItemOrder::where('type', 'order')->orderBy('created_at', 'desc')->get();
            return $this->respondSuccessWithStatus([
                "orders" => $orders->map(function ($order) {
                    return $order->importTransform();
                })

            ]);
        } else {
            $orders = ItemOrder::where('type', 'order')->orderBy('created_at', 'desc')->paginate($limit);
            return $this->respondWithPagination($orders, [
                "orders" => $orders->map(function ($order) {
                    return $order->importTransform();
                })
            ]);

        }
    }

    public function getOrder($orderId, Request $request)
    {
        //đơn hàng từ nhà cc đặt
        $order = ItemOrder::find($orderId);
        return $this->respondSuccessWithStatus([
            "order" => $order->importTransform()
        ]);
    }

    public function createOrEditImportOrder($importOrderId, Request $request)
    {
        $importOrder = ItemOrder::find($importOrderId);
        $importOrder->import_export_staff_id = $request->staff_id;
        $importOrder->note = $request->note;
        $importOrder->company_debt_id = $request->company_debt_id;
        $importOrder->status = 2;
        $importOrder->save();
        $goods = json_decode($request->goods);

        foreach ($goods as $good) {
            $good_new = new ImportItemOrder;
            $good_new->imported_quantity = $good->imported_quantity;
            $good_new->warehouse_id = $good->warehouse_id;
            $good_new->quantity = $good->quantity;
            $good_new->item_order_id = $importOrderId;
            $good_new->good_id = $good->good_id;
            $good_new->price = $good->price;
            $good_new->status = 1;
            $good_new->save();
            $historyGood = new ZHistoryGood;
            $historyGood->quantity = $good->imported_quantity;
            $historyGood->good_id = $good->good_id;
            $historyGood->warehouse_id = $good_new->warehouse_id;
            $historyGood->item_order_id = $importOrderId;
            $historyGood->save();
        }

        return $this->respondSuccessWithStatus([
            "message" => "Thành công"
        ]);
    }

    public function createOrEditImportPrintOrder($importOrderId, Request $request)
    {
        $importOrder = PrintOrder::find($importOrderId);
        $importOrder->status = 2;
        $importOrder->import_staff_id = $request->staff_id;
        $importOrder->company_debt_id = $request->company_debt_id;
        $importOrder->note = $request->note;
        $importOrder->save();
        $goods = json_decode($request->goods);
        foreach ($goods as $good) {
            $good_new = ImportItemOrder::find($good->id);
            $good_new->imported_quantity = $good->imported_quantity;
            $good_new->warehouse_id = $good->warehouse_id;
            $good_new->save();
        }
        return $this->respondSuccessWithStatus([
            "message" => "Thành công"
        ]);
    }

    public function getImportOrder($importOrderId, Request $request)
    {
        $importOrder = ItemOrder::find($importOrderId);
        return $this->respondSuccessWithStatus([
            "import-order" => $importOrder->importTransform()
        ]);
    }

    public function getAllImportOrder(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;


        if ($limit == -1) {
            $importOrders = ItemOrder::where('type', '<>', 'be-ordered')
                ->where('item_orders.status', '>', 1)->get();
            if ($request->company_id)
                $importOrders = $importOrders->where('company_id', $request->company_id);
            if ($request->command_code)
                $importOrders = $importOrders->where('command_code', $request->command_code);
                if($request->startTime && $request->endTime)
                $importOrders = $importOrders->whereBetween('created_at',array($request->startTime,$request->endTime));
            return $this->respondSuccessWithStatus([
                "import-orders" => $importOrders->map(function ($order) {
                    return $order->importTransform();
                })
            ]);
        } else {
            $importOrders = ItemOrder::query();

            $importOrders = $importOrders->where('type', '<>', 'be-ordered')
                ->where('status', '>', 1);

            if ($request->company_id)
                $importOrders = $importOrders->where('company_id', $request->company_id);
            if ($request->command_code)
                $importOrders = $importOrders->where('command_code', $request->command_code);
            if($request->startTime && $request->endTime)
                $importOrders = $importOrders->whereBetween('created_at',array($request->startTime,$request->endTime));

            $importOrders = $importOrders->orderBy('created_at', 'desc')->paginate($limit);
            return $this->respondWithPagination($importOrders, [
                "import-orders" => $importOrders->map(function ($importOrder) {
                    return $importOrder->importTransform();
                })
            ]);
        }

    }

    public function changeStatusItemOrder($itemOrderId, Request $request)
    {
        $order = ItemOrder::find($itemOrderId);
        $order->status = $request->status;
        $order->save();
        $date = $order->created_at;
        if ($request->status == 3) {
            if ($order->type == "order") {
                $type = "export";
                $p = 1;
                $goods_value = $order->importOrder->reduce(function ($total, $good) {
                    return $total + $good->imported_quantity * $good->price;
                }, 0);
            } else {
                $type = "import";
                $p = -1;
                $goods_value = $order->exportOrder->reduce(function ($total, $good) {
                    return $total + $good->export_quantity * $good->price;
                }, 0);
            }
            $n = HistoryDebt::where('company_id', $order->company_id)->count();
            $historyDebts = HistoryDebt::where('company_id', $order->company_id)->get();
            if ($n > 0) $pre_value = $historyDebts[$n - 1]->total_value;
            else $pre_value = 0;
            $value = $goods_value;
            $historyDebt = new HistoryDebt;
            $historyDebt->value = $value;
            $historyDebt->total_value = $pre_value + $value * $p;
            $historyDebt->date = $date;
            $historyDebt->type = $type;
            $historyDebt->company_id = $order->company_id;
            $company = Company::find($historyDebt->company_id);
            $company->account_value = $historyDebt->value;
            $company->save();
            $historyDebt->save();

            if ($type == 'export') $type = "import"; else $type = "export";
            $p = $p * (-1);
            $n = HistoryDebt::where('company_id', $order->company_debt_id)->count();
            $historyDebts = HistoryDebt::where('company_id', 1)->get();
            if ($n > 0) $pre_value = $historyDebts[$n - 1]->total_value;
            else $pre_value = 0;
            $value = $goods_value;
            $historyDebt = new HistoryDebt;
            $historyDebt->value = $value * $p;
            $historyDebt->total_value = $pre_value + $value * $p;
            $historyDebt->date = $date;
            $historyDebt->type = $type;
            $historyDebt->company_id = $order->company_debt_id;
            $company = Company::find($historyDebt->company_id);
            $company->account_value = $historyDebt->value;
            $company->save();
            $historyDebt->save();


        }

        return $this->respondSuccessWithStatus([
            "message" => "Thay đổi trạng thái thành công"
        ]);
    }

    public function getHistoryDebt($companyId, Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;
        $historyDebt = HistoryDebt::where('company_id', $companyId)->paginate($limit);
        return $this->respondWithPagination($historyDebt, [
            "history-debt" => $historyDebt->map(function ($pp) {
                return $pp->transform();
            })
        ]);
    }

    public function getAllHistoryDebt(Request $request)
    {
        $company = Company::all();
        return $this->respondSuccessWithStatus([
            "companies" => $company->map(function ($data) {
                $historyDebt = HistoryDebt::where('company_id', $data->id)->get();

                return [
                    "company" => $data->transform(),
                    "history_debt" => $historyDebt->map(function ($pp) {
                        return $pp->transform();
                    }),

                ];
            }),
        ]);

    }

}
