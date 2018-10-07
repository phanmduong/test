<?php
/**
 * Created by PhpStorm.
 * User: lethergo
 * Date: 18/03/2018
 * Time: 11:16
 */

namespace Modules\Company\Http\Controllers;


use App\AdvancePayment;
use App\Fund;
use App\HistoryFund;
use App\Http\Controllers\ManageApiController;
use App\RequestVacation;
use App\Contracts;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use App\Report;
use DB;


class AdministrationController extends ManageApiController
{
    public function getAllRequestVacation(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;
        $staff_name = $request->staff_name;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $status = $request->status;
        $type = $request->type;
        $command_code = $request->command_code;
        if ($limit == -1) {
            $requestVacations = RequestVacation::all();
            return $this->respondSuccessWithStatus([
                "requestVacation" => $requestVacations->map(function ($requestVacation) {
                    return $requestVacation->transform();
                }),
            ]);
        } else {
            if ($this->user->role == 2) {
                $requestVacations = RequestVacation::query();
                if ($staff_name) {
                    $requestVacations = $requestVacations->join('users', 'users.id', '=', 'request_vacations.staff_id');
                    $requestVacations->where('users.name', 'like', '%' . $staff_name . '%');
                }
                if ($status) {
                    $requestVacations->where('request_vacations.status', $status == -1 ? 0 : $status);
                }
                if ($type) {
                    $requestVacations->where('request_vacations.type', $type);
                }
                if ($command_code) {
                    $requestVacations->where('request_vacations.command_code', 'like', '%' . $command_code . '%');
                }
                if ($start_time && $end_time) {
                    $requestVacations = $requestVacations
                        ->whereBetween('request_vacations.start_time', array($start_time, $end_time))
                        ->orWhereBetween('request_vacations.end_time', array($start_time, $end_time));
                }
                $requestVacations = $requestVacations->orderBy('request_vacations.created_at', 'desc')->paginate($limit);
                return $this->respondWithPagination($requestVacations, [
                    "requestVacation" => $requestVacations->map(function ($requestVacation) {
                        return $requestVacation->transform();
                    }),
                ]);
            } else {
                $requestVacations = RequestVacation::query();
                if ($status) {
                    $requestVacations->where('request_vacations.status', $status == -1 ? 0 : $status);
                }
                if ($command_code) {
                    $requestVacations->where('request_vacations.command_code', 'like', '%' . $command_code . '%');
                }
                if ($type) {
                    $requestVacations->where('request_vacations.type', $type);
                }
                if ($start_time && $end_time) {
                    $requestVacations = $requestVacations
                        ->orwhereBetween('request_vacations.start_time', array($start_time, $end_time))
                        ->orWhereBetween('request_vacations.end_time', array($start_time, $end_time));
                }
                $requestVacations = $requestVacations->where("staff_id", $this->user->id)->orderBy('request_vacations.created_at', 'desc')->paginate($limit);
                return $this->respondWithPagination($requestVacations, [
                    "requestVacation" => $requestVacations->map(function ($requestVacation) {
                        return $requestVacation->transform();
                    }),
                ]);
            }
        }
    }

    public function createRequestVacation(Request $request)
    {
        if (!$request->staff_id) return $this->respondErrorWithStatus("Chưa có mã nhân viên");
        $requestVacation = new RequestVacation;
        $requestVacation->staff_id = $request->staff_id;
        $requestVacation->request_date = $request->request_date;
        $requestVacation->start_time = $request->start_time;
        $requestVacation->end_time = $request->end_time;
        $requestVacation->type = $request->type;
        $requestVacation->reason = $request->reason;

        $requestVacation->save();

        $ppp = strtotime($requestVacation->created_at);

        $day = date('d', $ppp);
        $month = date('m', $ppp);
        $year = date('Y', $ppp);
        $id = (string)$requestVacation->id;
        while (strlen($id) < 4) $id = '0' . $id;
        $requestVacation->command_code = "NGHIPHEP" . $day . $month . $year . $id;

        $requestVacation->save();

        return $this->respondSuccessWithStatus([
            "message" => "Tạo thành công"
        ]);
    }

    public function editRequestVacation($requestId, Request $request)
    {
        $requestVacation = RequestVacation::find($requestId);
        $requestVacation->staff_id = $request->staff_id;
        $requestVacation->request_date = $request->request_date;
        $requestVacation->start_time = $request->start_time;
        $requestVacation->end_time = $request->end_time;
        $requestVacation->type = $request->type;
        $requestVacation->reason = $request->reason;

        $requestVacation->save();
        return $this->respondSuccessWithStatus([
            "message" => "Sửa thành công"
        ]);

    }


    public function getRequestVacation($requestVacationId, Request $request)
    {
        $requestVacation = RequestVacation::find($requestVacationId);
        if (!$requestVacation) return $this->respondErrorWithStatus("Không tồn tại");
        return $this->respondSuccessWithStatus([
            "request" => $requestVacation->transform()
        ]);
    }

    public function changeStatusRequestVacation($requestId, Request $request)
    {
        $requestVacation = RequestVacation::find($requestId);
        $requestVacation->status = $request->status;
        $requestVacation->save();
        return $this->respondSuccessWithStatus([
            "message" => "Thay đổi status thành công"
        ]);
    }

    public function getAllAdvancePayment(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;
        $staff_name = $request->staff_name;
        $company_pay_id = $request->company_pay_id;
        $company_receive_id = $request->company_receive_id;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $status = $request->status;
        $command_code = $request->command_code;
        if ($limit == -1) {
            $datas = AdvancePayment::all();
            return $this->respondSuccessWithStatus([
                "data" => $datas->map(function ($data) {
                    return $data->transform();
                })
            ]);
        } else {
            if ($this->user->role == 2) {
                $datas = AdvancePayment::query();
                if ($staff_name) {
                    $datas = $datas->join('users', 'users.id', '=', 'advanced_payments.staff_id');
                    $datas->where('users.name', 'like', '%' . $staff_name . '%');

                }
                if ($company_pay_id) {
                    $datas->where('advanced_payments.company_pay_id', $company_pay_id);
                }
                if ($company_receive_id) {
                    $datas->where('advanced_payments.company_receive_id', $company_receive_id);
                }
                if ($status) {
                    $datas->where('advanced_payments.status', $status == -1 ? 0 : $status);
                }
                if ($command_code) {
                    $datas->where('advanced_payments.command_code', 'like', '%' . $command_code . '%');
                }
                if ($start_time && $end_time) {
                    $datas = $datas->whereBetween('advanced_payments.created_at', array($start_time, $end_time));
                }
                $datas = $datas->orderBy('advanced_payments.created_at', 'desc')->paginate($limit);
                return $this->respondWithPagination($datas, [
                    "data" => $datas->map(function ($data) {
                        return $data->transform();
                    })
                ]);
            } else {
                $datas = AdvancePayment::query();
                $datas->where('staff_id', $this->user->id);
                if ($company_pay_id) {
                    $datas->where('advanced_payments.company_pay_id', $company_pay_id);
                }
                if ($company_receive_id) {
                    $datas->where('advanced_payments.company_receive_id', $company_receive_id);
                }
                if ($status) {
                    $datas->where('advanced_payments.status', $status == -1 ? 0 : $status);
                }
                if ($command_code) {
                    $datas->where('advanced_payments.command_code', 'like', '%' . $command_code . '%');
                }
                if ($start_time && $end_time) {
                    $datas = $datas->whereBetween('advanced_payments.created_at', array($start_time, $end_time));
                }
                $datas = $datas->orderBy('advanced_payments.created_at', 'desc')->paginate($limit);
                return $this->respondWithPagination($datas, [
                    "data" => $datas->map(function ($data) {
                        return $data->transform();
                    })
                ]);
            }
        }

    }

    public function changeStatusAdvancePayment($advancePaymentId, Request $request)
    {
        $data = AdvancePayment::find($advancePaymentId);
        $data->status = $request->status;

        if ($request->status == 1) {
            $data->money_received = $request->money_received;
            $data->company_pay_id = $request->company_pay_id;
        }
        if ($request->status == 2) {
            $data->money_used = $request->money_used;
            $data->date_complete = $request->date_complete;
            $data->company_receive_id = $request->company_receive_id;

        }

        $data->save();

        return $this->respondSuccessWithStatus([
            "message" => "Thay đổi trạng thái thành công"
        ]);
    }

    public function createAdvancePayment(Request $request)
    {
        $data = new AdvancePayment;
        $data->staff_id = $request->staff_id;
        $data->reason = $request->reason;
        $data->money_payment = $request->money_payment;
        $data->type = $request->type;
        $data->save();

        $ppp = strtotime($data->created_at);
        $day = date('d', $ppp);
        $month = date('m', $ppp);
        $year = date('Y', $ppp);
        $id = (string)$data->id;
        while (strlen($id) < 4) $id = '0' . $id;
        $data->command_code = "TAMUNG" . $day . $month . $year . $id;

        $data->save();
        return $this->respondSuccessWithStatus([
            "message" => "Tạo đơn thành công"
        ]);


    }

    public function editAdvancePayment($advancePaymentId, Request $request)
    {
        $data = AdvancePayment::find($advancePaymentId);
        $data->staff_id = $request->staff_id;
        $data->reason = $request->reason;
        $data->money_payment = $request->money_payment;
        $data->money_received = $request->money_received;
        $data->type = $request->type;
        $data->save();
        return $this->respondSuccessWithStatus([
            "message" => "Sửa đơn thành công"
        ]);
    }

    public function getAdvancePayment($advancePaymentId, Request $request)
    {
        $advancePayment = AdvancePayment::find($advancePaymentId);
        if (!$advancePayment) return $this->respondErrorWithStatus("Không tồn tại");
        return $this->respondSuccessWithStatus([
            "request" => $advancePayment->transform()
        ]);
    }

    public function PaymentAdvance($advancePaymentId, Request $request)
    {
        $data = AdvancePayment::find($advancePaymentId);
        $data->money_used = $request->money_used;
        $data->date_complete = $request->date_complete;
        $data->save();
        return $this->respondSuccessWithStatus([
            "message" => "Hoàn ứng thành công"
        ]);
    }


    public function createReport($staff_id, Request $request)
    {
        if (User::where('id', $staff_id)->count() > 0) {
            $report = new Report();
            $report->staff_id = $staff_id;
            $report->title = $request->title;
            $report->report = $request->report;
            $report->save();

            return $this->respondSuccessWithStatus([
                "message" => "Tạo báo cáo thành công"
            ]);
        } else {
            return $this->respondErrorWithStatus([
                "message" => "Không tồn tại user"
            ]);
        }

    }

    public function editReport(Request $request, $staff_id, $id)
    {
        $report = Report::find($id);
        if ($report->staff_id == $staff_id) {
            $report->report = $request->report;
            $report->title = $request->title;
            $report->save();
        } else {
            return $this->respondErrorWithStatus("Sửa báo cáo không thành công");
        }

        return $this->respondSuccessWithStatus([
            "message" => "Sửa báo cáo thành công"
        ]);
    }

    public function showReportId(Request $request, $id)
    {
        $report = Report::where('id', $id)->get();
        // dd($report);
        return $this->respondSuccessWithStatus([
            "report" => $report->map(function ($report) {
                return $report->transform();
            })
        ]);
    }

    public function showReports(Request $request)
    {

        $limit = $request->limit ? $request->limit : 20;
        $search = trim($request->search);
        $reports = Report::join('users', 'reports.staff_id', "=", "users.id")->select('reports.*', 'users.name');
        // dd($reports->get());
        if ($search) {
            $reports = $reports->where(function ($q) use ($search) {
                $q->where('reports.report', 'like', "%$search%")
                    ->orWhere('users.name', 'like', "%$search%");
            });
            // dd($reports);
        }

        if ($this->user->role == 2) {
            // dd($reports);
            $reports = $reports->paginate($limit);
            // dd($reports);
        } else {
            $reports = $reports->where('staff_id', $this->user->id)->paginate($limit);
        }

        return $this->respondWithPagination($reports, [
            "reports" => $reports->map(function ($report) {
                return $report->transform();
            })
        ]);
    }

    public function deleteReport(Request $request, $id)
    {
        Report::where('id', $id)->delete();
        return $this->respondSuccessWithStatus([
            "message" => "Xóa thành công"
        ]);
    }

    public function changeStatus(Request $request, $id)
    {
        $report = Report::find($id);
        if ($report->status === 1) {
            $report->status = 0;
            $report->save();
        } else if ($report->status === 0) {
            $report->status = 1;
            $report->comment = $request->comment;
            $report->save();
        } else {
            return $this->respondErrorWithStatus([
                "message" => "Thay đổi trạng thái không thành công"
            ]);
        }

        return $this->respondSuccessWithStatus([
            "message" => "Thay đổi trạng thái thành công"
        ]);

    }

    public function getAllContract(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;
        $contract_number = $request->contract_number;
        $company_a_id = $request->company_a_id;
        $company_b_id = $request->company_b_id;
        $type = $request->type;
        $status = $request->status;
        $value = $request->value;
        $sign_staff_id = $request->sign_staff_id;
        $staff_id = $request->staff_id;
        $status = $request->status;
        $start_time = $request->start_time;
        $end_time = $request->end_time;

        if ($limit == -1) {
            $datas = Contracts::all();
            return $this->respondSuccessWithStatus([
                "data" => $datas->map(function ($data) {
                    return $data->transform();
                })
            ]);
        } else {

            $datas = Contracts::query();

            if ($company_a_id) {
                $datas->where('company_a_id', $company_a_id);
            }
            if ($company_b_id) {
                $datas->where('company_b_id', $company_b_id);
            }
            if ($type) {
                $datas->where('type', $type);
            }
            if ($value) {
                $datas->where('value', $value);
            }
            if ($sign_staff_id) {
                $datas->where('sign_staff_id', $sign_staff_id);
            }
            if ($staff_id) {
                $datas->where('staff_id', $staff_id);
            }
            if ($contract_number) {
                $datas->where('contract_number', 'like', '%' . $contract_number . '%');
            }
            if ($status) {
                $datas->where('status', $status == -1 ? 0 : $status);
            }
            if ($start_time && $end_time) {
                $datas = $datas->whereBetween('created_at', array($start_time, $end_time));
            }
            $datas = $datas->orderBy('created_at', 'desc')->paginate($limit);
            return $this->respondWithPagination($datas, [
                "data" => $datas->map(function ($data) {
                    return $data->transform();
                })
            ]);

        }
    }

    public function createContract(Request $request)
    {

        $contract = new Contracts();
        $contract->staff_id = $this->user->id;
        $contract->sign_staff_id = $request->sign_staff_id;
        $contract->company_a_id = $request->company_a_id;
        $contract->company_b_id = $request->company_b_id;
        $contract->due_date = $request->due_date;
        $contract->type = $request->type;
        $contract->status = 0;
        $contract->value = $request->value;
        $contract->contract_number = $request->contract_number;
        $contract->note = $request->note;
        $contract->save();

        return $this->respondSuccessWithStatus([
            "message" => "Tạo thành công"
        ]);

    }

    public function editContract($contract_id, Request $request)
    {
        $contract = Contracts::find($contract_id);
        if ($contract) {
            $contract->staff_id = $this->user->id;
            $contract->sign_staff_id = $request->sign_staff_id;
            $contract->company_a_id = $request->company_a_id;
            $contract->company_b_id = $request->company_b_id;
            $contract->due_date = $request->due_date;
            $contract->type = $request->type;
            $contract->status = $request->status;
            $contract->value = $request->value;
            $contract->contract_number = $request->contract_number;
            $contract->note = $request->note;
            $contract->save();
        } else {
            return $this->respondErrorWithStatus("Không tồn tại");
        }

        return $this->respondSuccessWithStatus([
            "message" => "Sửa thành công"
        ]);
    }

    public function changeStatusContract($contract_id, Request $request)
    {
        $contract = Contracts::find($contract_id);
        if ($contract && $request->status) {
            $contract->status = $request->status;
            $contract->save();
        } else {
            return $this->respondErrorWithStatus("Không tồn tại");
        }

        return $this->respondSuccessWithStatus([
            "message" => "Đổi thành công"
        ]);
    }

    public function getContractDetail($contract_id, Request $request)
    {
        $contract = Contracts::find($contract_id);
        if (!$contract) return $this->respondErrorWithStatus("Không tồn tại");
        return $this->respondSuccessWithStatus([
            "contract" => $contract->transform()
        ]);

    }

    public function getAllFunds(Request $request)
    {
        if ($request->limit == -1) {
            $funds = Fund::all();
            return $this->respondSuccessWithStatus([
                "funds" => $funds->map(function ($fund) {
                    return $fund->transform();
                })
            ]);
        } else {
            $funds = Fund::paginate($request->limit);
            return $this->respondWithPagination($funds, [
                "funds" => $funds->map(function ($fund) {
                    return $fund->transform();
                })
            ]);
        }

    }

    public function getFund($fundId, Request $request)
    {
        $fund = Fund::find($fundId);
        return $this->respondSuccessWithStatus([
            "fund" => $fund->transform()
        ]);
    }

    public function createFund(Request $request)
    {
        $fund = new Fund();
        $fund->name = $request->name;
        $fund->money_value = $request->money_value;
        $fund->save();
        $this->respondSuccessWithStatus([
            "message" => "Tạo quỹ thành công"
        ]);
    }

    public function editFund($fundId,Request $request)
    {
        $fund = Fund::find($fundId);
        $fund->name = $request->name;
        $fund->money_value = $request->money_value;
        $fund->save();
        $this->respondSuccessWithStatus([
            "message" => "Sửa quỹ thành công"
        ]);
    }

    public function getHistoryFund($fundId,Request $request){
        $historyFund = HistoryFund::where('payer_id',$fundId)->orWhere('receiver_id',$fundId)->get();

        return $this->respondSuccessWithStatus([
           "historyFund" => $historyFund->map(function($hf){
               return $hf->transform();
           })
        ]);
    }

    public function getAllHistoryFund(Request $request){
        if ($request->limit == -1) {
            $historyFunds = HistoryFund::all()->get();
            return $this->respondSuccessWithStatus([
                "hitoryFunds" => $historyFunds->map(function ($hf) {
                    return $hf->transform();
                })
            ]);
        } else {
            $historyFunds = HistoryFund::paginate(10);
            
            return $this->respondWithPagination($historyFunds, [
                "historyFunds" => $historyFunds->map(function ($hf) {
                    //dd($hf);
                    return $hf->transform();
                    //return $hf;
                })
            ]);
        }
    }

    public function getHistory($historyId,Request $request){
        $history = HistoryFund::find($historyId);

        return $this->respondSuccessWithStatus([
            "historyFund" => $history->transform()
        ]);
    }

    public function createHistoryFund(Request $request){
        $history = new HistoryFund;
        $history->payer_id = $request->payer_id;
        $history->receiver_id = $request->receiver_id;
        $history->money_value = $request->money_value;
        $history->content = $request->content;
        $history->save();
        $fund = Fund::find($history->payer_id);
        $fund->money_value -= $history->money_value;
        $fund->save();
        $fund = Fund::find($history->receiver_id);
        $fund->money_value += $history->money_value;
        $fund->save();
        return $this->respondSuccessWithStatus([
           "message" => "Tạo lịch sử thành công"
        ]);
    }
    public function editHistoryFund($historyId,Request $request){
        $history =HistoryFund::find($historyId);
        $fund = Fund::find($history->payer_id);
        $fund->money_value += $history->money_value;
        $fund->save();
        $fund = Fund::find($history->receiver_id);
        $fund->money_value -= $history->money_value;
        $fund->save();
        $history->payer_id = $request->payer_id;
        $history->receiver_id = $request->receiver_id;
        $history->money_value = $request->money_value;
        $history->content = $request->content;
        $history->save();
        $fund = Fund::find($history->payer_id);
        $fund->money_value -= $history->money_value;
        $fund->save();
        $fund = Fund::find($history->receiver_id);
        $fund->money_value += $history->money_value;
        $fund->save();

        return $this->respondSuccessWithStatus([
            "message" => "Sửa lịch sử thành công"
        ]);
    }

}

