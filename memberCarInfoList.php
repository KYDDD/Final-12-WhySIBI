<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /*
 +----------------------------------------------------------------------+
 | Copyright (c) 2023 KKTY. co. Ltd
 +----------------------------------------------------------------------+
 | 작업일 : 2024-1-3
 | 파일설명 : 기본업무 > 각종신청서 > 사내차량출입증신청서
 | 변경이력 : 
 +----------------------------------------------------------------------+
 | 프로그래머: 나금영
 +----------------------------------------------------------------------+
 */

$_is_test_user = ($this->session->userdata('login_id') == '2386');
?>

<script language="javascript">
$(function() { 
<?
	$start	= '';
	$end	= '';
	if (isset($from))$start = date("Y-m-d", strtotime($from));
	if (isset($to)) $end = date("Y-m-d", strtotime($to));
?>
    $('#search_dateGigan').daterangepicker({
        autoApply: true,
        ranges: {
            '당일': [moment(), moment()],
            '2일간': [moment().add(-1, 'days'), moment()],
            '7일간': [moment().add(-6, 'days'), moment()],
            '30일간': [moment().add(-29, 'days'), moment()],
            '이번달': [moment().startOf('month'), moment().endOf('month')],
            '기간없음': [moment('1900-01-01'), moment('2099-12-31')]
        },
        //minDate:'<?=date("Y-m-d")?>',
        startDate:'<?=$start?>',
        endDate: '<?=$end?>'
    });

    /* #region 新 datatables */
    createKKTYDateTable2({
        tableID :'memberCarInfoListTable',
        selectFilterArr : [1,2,3,4,5,6],
        inputFilterArr : [8,9],    
<?if($_is_test_user){?>
        nonFilterArr :[0,7,10,11,12,13],
<?}else{?>
        nonFilterArr :[0,7,10],
<?}?>
        btnFlag : true,
    });
    /* #endregion */

});

<?if($_is_test_user){?>

function form_submit(){

    var segment = '';
    var gigan = dateGiganCheckData($("#search_dateGigan").val());
    var req_dept_code = $("#search_req_dept_code").val();
    var member_id = $("#search_member_id").val();
    var member_name = $("#search_member_name").val();

    var ga_0_flag = "0";
    var ga_1_flag = "0";

    var request_1_status = "0";
    var request_2_status = "0";
    var request_4_status = "0";
    var request_5_status = "0";

    var ga_0_status = "0";
    var ga_1_status = "0";
    var ga_2_status = "0";
    var ga_3_status = "0";
    var ga_4_status = "0";
    var ga_5_status = "0";

    if($("#ga_0_flag:checked").val())     ga_0_flag = "1"; 
    if($("#ga_1_flag:checked").val())     ga_1_flag = "1"; 

    if($("#request_1_status:checked").val())    request_1_status = "1"; 
    if($("#request_2_status:checked").val())    request_2_status = "1"; 
    if($("#request_4_status:checked").val())    request_4_status = "1"; 
    if($("#request_5_status:checked").val())    request_5_status = "1";
    
    if($("#ga_0_status:checked").val())     ga_0_status = "1";
    if($("#ga_1_status:checked").val())     ga_1_status = "1";
    if($("#ga_2_status:checked").val())     ga_2_status = "1";
    if($("#ga_3_status:checked").val())     ga_3_status = "1";
    if($("#ga_4_status:checked").val())     ga_4_status = "1";
    if($("#ga_5_status:checked").val())     ga_5_status = "1";

    segment += getSegmentData('from', gigan.substring(0,8));
    segment += getSegmentData('to', gigan.substring(8,16));
    segment += getSegmentData('req_dept_code', req_dept_code);
    segment += getSegmentData('member_id', member_id);
    segment += getSegmentData('member_name', member_name);
    segment += getSegmentData('ga_0_flag', ga_0_flag);
    segment += getSegmentData('ga_1_flag', ga_1_flag);
    segment += getSegmentData('request_1_status', request_1_status);
    segment += getSegmentData('request_2_status', request_2_status);
    segment += getSegmentData('request_4_status', request_4_status);
    segment += getSegmentData('request_5_status', request_5_status);
    segment += getSegmentData('ga_0_status', ga_0_status);
    segment += getSegmentData('ga_1_status', ga_1_status);
    segment += getSegmentData('ga_2_status', ga_2_status);
    segment += getSegmentData('ga_3_status', ga_3_status);
    segment += getSegmentData('ga_4_status', ga_4_status);
    segment += getSegmentData('ga_5_status', ga_5_status);
    
    uSearchLoading();	
    document.location.href = ("/<?=$menu_link?>" + "/mcode/<?=$mcode?>"+segment).replace(/[/][/]/g,'/');
}

<?}else{?>

function form_submit(){

    var segment = '';
    var search_no_sign = "0";
    var gigan = dateGiganCheckData($("#search_dateGigan").val());
    var req_dept_code = $("#search_req_dept_code").val();
    var member_id = $("#search_member_id").val();
    var member_name = $("#search_member_name").val();
    
    var dept_99_flag = "0";
    var dept_0_flag = "0";
    var dept_1_flag = "0";

    var ga_99_flag = "0";
    var ga_0_flag = "0";
    var ga_1_flag = "0";

    var request_1_status = "0";
    var request_2_status = "0";
    var request_3_status = "0";

    if($("#dept_99_flag:checked").val())  dept_99_flag = "1"; 
    if($("#dept_0_flag:checked").val())   dept_0_flag = "1"; 
    if($("#dept_1_flag:checked").val())   dept_1_flag = "1"; 

    if($("#ga_99_flag:checked").val())    ga_99_flag = "1"; 
    if($("#ga_0_flag:checked").val())     ga_0_flag = "1"; 
    if($("#ga_1_flag:checked").val())     ga_1_flag = "1"; 

    if($("#request_1_status:checked").val())    request_1_status = "1"; 
    if($("#request_2_status:checked").val())    request_2_status = "1"; 
    if($("#request_3_status:checked").val())    request_3_status = "1"; 

    segment += getSegmentData('from', gigan.substring(0,8));
    segment += getSegmentData('to', gigan.substring(8,16));
    segment += getSegmentData('req_dept_code', req_dept_code);
    segment += getSegmentData('member_id', member_id);
    segment += getSegmentData('member_name', member_name);
    segment += getSegmentData('dept_99_flag', dept_99_flag);
    segment += getSegmentData('dept_0_flag', dept_0_flag);
    segment += getSegmentData('dept_1_flag', dept_1_flag);
    segment += getSegmentData('ga_99_flag', ga_99_flag);
    segment += getSegmentData('ga_0_flag', ga_0_flag);
    segment += getSegmentData('ga_1_flag', ga_1_flag);
    segment += getSegmentData('request_1_status', request_1_status);
    segment += getSegmentData('request_2_status', request_2_status);
    segment += getSegmentData('request_3_status', request_3_status);
    
    uSearchLoading();	
    document.location.href = ("/<?=$menu_link?>" + "/mcode/<?=$mcode?>"+segment).replace(/[/][/]/g,'/');
}

<?}?>

function onRequestAdd(){
	var strUrl = "/index.php/generalaffairs/MemberCarInfo/memberCarInfoProc/mode/ins";
	$('#memberCarInfoModal').modal('show').find('.modal-body').load(strUrl);
}

<?if($_is_test_user){?>
function onRequestEdit(request_yymd, request_seq, request_member_id, request_phone_no, ga_status, ga_status_raw){    
    var strUrl = "/index.php/generalaffairs/MemberCarInfo/memberCarInfoProc"
            + "/mode/mod"
            + "/request_yymd/" + request_yymd
            + "/request_seq/"  + request_seq;
    if(request_member_id !== '') {
        strUrl += '/request_member_id/' + request_member_id;
    }
    if(request_phone_no !== '') {
        strUrl += '/request_phone_no/' + encodeURIComponent(request_phone_no);
    }
    if(ga_status !== ''){
        strUrl += '/ga_status/' + ga_status;
    }
    if(ga_status_raw !== ''){
        strUrl += '/ga_status_raw/' + ga_status_raw;
    }
	$('#memberCarInfoModal').modal('show').find('.modal-body').load(strUrl);
}
<?}else{?>
function onRequestEdit(request_yymd, request_seq){    
	var strUrl = "/index.php/generalaffairs/MemberCarInfo/memberCarInfoProc/mode/mod/request_yymd/"+request_yymd+'/request_seq/'+request_seq;
	$('#memberCarInfoModal').modal('show').find('.modal-body').load(strUrl);
}
<?}?>

function onRequestDetail(request_yymd, request_seq){
	var strUrl = "/index.php/generalaffairs/MemberCarInfo/memberCarInfoProc/mode/detail/request_yymd/"+request_yymd+'/request_seq/'+request_seq;
	$('#memberCarInfoModal').modal('show').find('.modal-body').load(strUrl);
}

<?if($_is_test_user){?>
var _syncCarKey = null;
<?}?>

function onMemberCarInfoAppCreate(member_namek, member_id, request_yymd, request_seq, work_tag){
<?if($_is_test_user){?>
    _syncCarKey = { yymd: request_yymd, seq: request_seq }; 
<?}?>
    var tag = '/appreqtag/memberCarInfo'
    var key = '/appreqkey1/'+request_yymd+'/appreqkey2/'+request_seq
    var title = '/apptitle/'+member_id+'_'+member_namek+'_'+ request_yymd.substr(0,4) + '년' + request_yymd.substr(4,2) + '월' + request_yymd.substr(6,2) + '일' + '_차량출입증신청서'
    var addStrUrl = "/addurl/generalaffairs__MemberCarInfo__memberCarInfoProc__mode__read__request_yymd__"+request_yymd+'__request_seq__'+request_seq+'__member_id__'+member_id;
    switch (work_tag) { 
        case "onMemberCarInfoAppCreate":     
            onAppCreate(tag+title+key+addStrUrl);       
            break;
        case "onMemberCarInfoAppVali":     
            onAppVali(tag+title+key+addStrUrl);       
            break;
        case "onMemberCarInfoAppFin":     
            onAppProc(tag+title+key+addStrUrl);       
            break;
        default:    
            onAppProc(tag+title+key+addStrUrl);       
            break;
    }
}

<?if($_is_test_user){?>
function appFinish(finishFlag){
    if(_syncCarKey){
        $.ajax({
            type: 'POST',
            url: '/index.php/generalaffairs/memberCarInfo/syncGAStatus/',
            async: false,
            data: { 'request_yymd': _syncCarKey.yymd, 'request_seq': _syncCarKey.seq }
        });
        _syncCarKey = null;
    }
}

function uConfirmYN(title, msg, yesBtnTxt, noBtnTxt, yesCallback, noCallback, changeclass = 'skin-blue fixed') {
    if (title == '')     title     = "확인";
    if (yesBtnTxt == '') yesBtnTxt = "예";
    if (noBtnTxt == '')  noBtnTxt  = "아니오";

    msg = msg.replace(/\n/gi, '<br>');

    var okModal = $('<div id="#myMsgBox" class="modal fade" role="dialog" style="z-index:99999">' +
                '<div class="alert-modal">' +
                '<div class="modal-dialog alert-dialog" role="document">' +
                    '<div class="modal-content alert-content">' +
                    '<div class="modal-header alert-header-stop">' +
                        '<h5 class="modal-title">' + title +
                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button></h5>' +
                    '</div>' +
                    '<div class="modal-body alert-body">' +
                        '<p>' + msg + '</p>' +
                    '</div>' +
                    '<div class="modal-footer">' +
                        '<button type="button" class="btn btn-primary" id="yesBtn">' + yesBtnTxt + '</button>' +
                        '<button type="button" class="btn btn-default" id="noBtn">'  + noBtnTxt  + '</button>' +
                    '</div>' +
                    '</div>' +
                '</div>' +
                '</div>' +
                '</div>');

    okModal.find('#yesBtn').click(function () {
        if (yesCallback != '') yesCallback();
        okModal.modal('hide');
    });

    okModal.find('#noBtn').click(function () {
        if (noCallback != '') noCallback();
        okModal.modal('hide');
    });

    okModal.on('hidden.bs.modal', function () {
        $(document.body).removeClass();
        $(document.body).addClass(changeclass);
    });

    okModal.modal({ backdrop: 'static', keyboard: false, show: true });
}

function submitGA(request_yymd, request_seq){
    uConfirmYN('확인', '<div>제출 시 수정이 불가합니다.</br>제출하시겠습니까?</div>', '예', '아니오',
    function(){
        $.ajax({
            type: "POST",
            url: "/index.php/generalaffairs/memberCarInfo/updateGAstatus/",
            dataType: "json",
            data: { 'request_yymd': request_yymd, 'request_seq': request_seq },
            success: function(data) {
                $.ajax({
                    type: "POST",
                    url: "/index.php/generalaffairs/memberCarInfo/autoRegisterApp/",
                    dataType: "json",
                    data: { 'request_yymd': request_yymd, 'request_seq': request_seq },
                    success: function(appData) {
                        if(appData.error){
                            uAlertStop('오류', appData.msg, '', '', 'skin-blue fixed');
                        } else {
                            uAlertStop('확인', `해당 신청서를 <strong>총무과</strong>에 제출했습니다.`, '', '', 'skin-blue fixed modal-open');
                        }
                        self_reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);  
                        alert("결재등록오류: " + xhr.status);
                    }
                });
            },
            error: function(xhr) {
                alert("오류: " + xhr.status);
            }
        });
    }, 
    function(){ /*no*/ });
}

function RejectGA(request_yymd, request_seq, request_member_id){
    uAlertStop('<strong>반려사유 입력</strong>', `<div style="width:100%; padding: 5px 0;"><input type="text" id="rejectReasonInput" class="form-control" placeholder="반려 사유를 입력하세요."></div>`, '',  
    function () {
        var reason = $('#rejectReasonInput').val().trim();
        $.ajax({
            type: "POST",
            url: "/index.php/generalaffairs/memberCarInfo/rejectGA/",
            dataType: "json",
            data: {
                'request_yymd':      request_yymd,
                'request_seq':       request_seq,
                'reject_reason':     reason,
                'request_member_id': request_member_id
            },
            success: function (data) {
                uAlertStop('확인', '반려 처리되었습니다.', '확인', '', 'skin-blue fixed');
                self_reload();
            },
            error: function (xhr) {
                alert("오류: " + xhr.status);
            }
        });
    }, 'skin-blue fixed modal-open');
}
<?}?>

function onDeptManager(){
	var strUrl = "/index.php/func/deptManagerList/program_tag/membercarinfo";
	$('#memberCarManager').modal('show').find('.modal-body').load(strUrl);
}

</script>

<div class="row translation">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <form class="form-inline" onsubmit="return false;">  
                        <div class="tsearch_box_01 row">
                            <div class="col-xs-12 col-md-12 text-left">
                                <div class="se_box_t pull-left">
                                    <label for="search_dateGigan" class="box_label_01 hidden-xs" data-i18n="base:BaseCondition.searchYYMD">신청일자</label>
                                    <div class="inpt hidden-xs">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm pull-right" id="search_dateGigan" name="search_dateGigan">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar open-datetimepicker"></i>
                                            </div>
                                        </div>	
                                    </div>	
                                </div>  

<?if($_is_test_user){?>
                                <!-- ==================== 테스트 UI (사번 2386 전용) ==================== -->
                                <div class="se_box_bod pull-left">
                                    <div class="label_01 hidden-xs">총무결재</div>
                                    <label class="labv"><input type="checkbox" id="ga_0_flag" value="1" <?=$ga_0_flag=='1'?'checked':''?>><span data-i18n="base:BaseCondition.appFlag0">미완료</span></label>   
                                    <label class="labv"><input type="checkbox" id="ga_1_flag" value="1" <?=$ga_1_flag=='1'?'checked':''?>><span data-i18n="base:BaseCondition.appFlag1">완료</span></label>                  
                                </div>	
                                <div class="se_box_bod pull-left">
                                    <div class="label_01 hidden-xs">진행현황</div>
                                    <label class="labv"><input type="checkbox" id="ga_0_status" value="1" <?=$ga_0_status=='1'?'checked':''?>><span>접수전</span></label>   
                                    <label class="labv"><input type="checkbox" id="ga_1_status" value="1" <?=$ga_1_status=='1'?'checked':''?>><span>접수</span></label>
                                    <label class="labv"><input type="checkbox" id="ga_2_status" value="1" <?=$ga_2_status=='1'?'checked':''?>><span>결재중</span></label>
                                    <label class="labv"><input type="checkbox" id="ga_3_status" value="1" <?=$ga_3_status=='1'?'checked':''?>><span>결재완료</span></label>
                                    <label class="labv"><input type="checkbox" id="ga_4_status" value="1" <?=$ga_4_status=='1'?'checked':''?>><span>총무반려</span></label>
                                    <label class="labv"><input type="checkbox" id="ga_5_status" value="1" <?=$ga_5_status=='1'?'checked':''?>><span>신청취소</span></label>
                                </div>	
                                <div class="se_box_bod pull-left">
                                    <div class="label_01 hidden-xs">상태</div>
                                    <label class="labv"><input type="checkbox" id="request_1_status" value="1" <?=$request_1_status=='1'?'checked':''?>><span>신규</span></label>  
                                    <label class="labv"><input type="checkbox" id="request_2_status" value="1" <?=$request_2_status=='1'?'checked':''?>><span>차량변경</span></label>   
                                    <label class="labv"><input type="checkbox" id="request_4_status" value="1" <?=$request_4_status=='1'?'checked':''?>><span>재발급(차량변경O)</span></label>   
                                    <label class="labv"><input type="checkbox" id="request_5_status" value="1" <?=$request_5_status=='1'?'checked':''?>><span>재발급(차량변경X)</span></label>   
                                </div>	
<?}else{?>
                                <!-- ==================== 본서버 UI ==================== -->
                                <div class="se_box_bod pull-left">
                                    <div class="label_01 hidden-xs" data-i18n="base:BaseCondition.appDept1">부서결재</div>
                                    <label class="labv"><input type="checkbox" id="dept_99_flag" value="1" <?=$dept_99_flag=='1'?'checked':''?>><span data-i18n="base:BaseCondition.appFlag99">미등록</span></label>
                                    <label class="labv"><input type="checkbox" id="dept_0_flag"  value="1" <?=$dept_0_flag=='1'?'checked':''?> ><span data-i18n="base:BaseCondition.appFlag0">미완료</span></label>   
                                    <label class="labv"><input type="checkbox" id="dept_1_flag"  value="1" <?=$dept_1_flag=='1'?'checked':''?> ><span data-i18n="base:BaseCondition.appFlag1">완료</span></label>                 
                                </div>		
                                <div class="se_box_bod pull-left">
                                    <div class="label_01 hidden-xs" data-i18n="Condition.appDept2">총무과</div>
                                    <label class="labv"><input type="checkbox" id="ga_99_flag" value="1" <?=$ga_99_flag=='1'?'checked':''?>><span data-i18n="base:BaseCondition.appFlag99">미등록</span></label>  
                                    <label class="labv"><input type="checkbox" id="ga_0_flag"  value="1" <?=$ga_0_flag=='1'?'checked':''?> ><span data-i18n="base:BaseCondition.appFlag0">미완료</span></label>   
                                    <label class="labv"><input type="checkbox" id="ga_1_flag"  value="1" <?=$ga_1_flag=='1'?'checked':''?> ><span data-i18n="base:BaseCondition.appFlag1">완료</span></label>                  
                                </div>	
                                <div class="se_box_bod pull-left">
                                    <div class="label_01 hidden-xs" data-i18n="Condition.appDept2">상태</div>
                                    <label class="labv"><input type="checkbox" id="request_1_status" value="1" <?=$request_1_status=='1'?'checked':''?>><span>신규</span></label>  
                                    <label class="labv"><input type="checkbox" id="request_2_status" value="1" <?=$request_2_status=='1'?'checked':''?>><span>차종변경</span></label>   
                                    <label class="labv"><input type="checkbox" id="request_4_status" value="1" <?=$request_4_status=='1'?'checked':''?>><span>재발급</span></label>   
                                    <label class="labv"><input type="checkbox" id="request_3_status" value="1" <?=$request_3_status=='1'?'checked':''?>><span>추가</span></label>                  
                                </div>	
<?}?>
                                <span class="group-btn">
                                    <a class="btn btn-ktk btn-sm" href="javascript:;" id="btnRetrieve" name="btnRetrieve" onclick="form_submit();" data-i18n="base:Button.btnRetrieve">조회</a>    
                                    <a class="btn btn-ktk btn-sm" href="javascript:;" onclick="onRequestAdd();" data-i18n="base:Button.btnInsert">신청</a> 
                                </span>
                                <? if($this->session->userdata('s_depot_code') == '40001000' || $this->session->userdata('s_depot_code') == '83001000') {?>
                                    <span class="group-btn">
                                        <a class="btn btn-warning btn-sm" href="javascript:;" onclick="onDeptManager()">담당자지정</a>                                                                    
                                    </span>
                                <?}?>
                            </div>
                        </div>                        
                        <div class="tsearch_box_01 row">
                            <div class="col-xs-12 col-md-8 text-left">
                            </div>
                        </div>    
                    </form> 

                    <div class="row">
                        <div class="col-sm-12" id="responBoard">
                            <fieldset>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="memberCarInfoListTable" name="memberCarInfoListTable">
<?if($_is_test_user){?>
                                        <!-- ==================== 테스트 테이블 (사번 2386 전용) ==================== -->
                                        <colgroup>
                                            <col width="30px">
                                            <col width="60px">
                                            <col width="100px">
                                            <col>
                                            <col width="90px"> 
                                            <col width="90px"> 
                                            <col width="110px"> 
                                            <col width="110px">
                                            <col width="110px">
                                            <col width="80px">
                                            <col width="80px">
                                            <col width="110px">
                                            <col width="110px">
                                            <col width="80px">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">출입증</th>
                                                <th scope="col">신청자</th>
                                                <th scope="col">부서</th>
                                                <th scope="col">신청일</th>
                                                <th scope="col">상태</th>
                                                <th scope="col">차종</th>
                                                <th scope="col">차량번호</th>
                                                <th scope="col">전화번호</th>
                                                <th scope="col">총무과</th>
                                                <th scope="col">총무</th>
                                                <th scope="col">진행현황</th>
                                                <th scope="col">비고</th>
                                                <th scope="col">기능</th>
                                            </tr>
                                        </thead>
<?}else{?>
                                        <!-- ==================== 본서버 테이블 ==================== -->
                                        <colgroup>
                                            <col width="30px">
                                            <col width="60px">
                                            <col width="100px">
                                            <col>
                                            <col width="90px"> 
                                            <col width="90px"> 
                                            <col width="110px"> 
                                            <col width="110px">
                                            <col width="110px">
                                            <col width="80px">
                                            <col width="80px">
                                            <col width="80px">
                                            <col width="200px">
                                            <col width="100px"> 
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" rowspan="2">No.</th>
                                                <th scope="col" rowspan="2">출입증</th>
                                                <th scope="col" rowspan="2">신청자</th>
                                                <th scope="col" rowspan="2">과,공정</th>
                                                <th scope="col" rowspan="2">신청일</th>
                                                <th scope="col" rowspan="2">상태</th>
                                                <th scope="col" rowspan="2">차종</th>
                                                <th scope="col" rowspan="2">차량번호</th>
                                                <th scope="col" rowspan="2">전화번호</th>
                                                <th scope="col" rowspan="2">결재</th>
                                                <th scope="col" colspan="2">결재상태</th>
                                                <th scope="col" rowspan="2">비고</th>
                                                <th scope="col" rowspan="2">기능</th>
                                            </tr>
                                            <tr>
                                                <th scope="col">부서</th>
                                                <th scope="col">총무</th>
                                            </tr>
                                        </thead>
<?}?>
                                        <tbody>
                                        <?  $currow = 0;
                                            foreach ($list as $row) {
                                                switch ($row["APP_STATUS"]) {
                                                    case '-1':
                                                        $appBtnDesc  = "결재등록";
                                                        $appBtnEvent = "onMemberCarInfoAppCreate"; 
                                                        break; 
                                                    case '0':
                                                        $appBtnDesc  = "결재수정";
                                                        $appBtnEvent = "onMemberCarInfoAppVali";    
                                                        break;                                    
                                                    case '1':
                                                        $appBtnDesc  = "진행중";      
                                                        $appBtnEvent = "onMemberCarInfoAppVali";                      
                                                        break;     
                                                    default:
                                                        $appBtnDesc  = "결재완료";       
                                                        $appBtnEvent = "onMemberCarInfoAppVali";                
                                                        break;
                                                }
                                        ?>
                                                <tr>
                                                <td><?=( ($page_account - 1) * 14 ) + $currow + 1?></td>
                                                <td><?=$row["KEY_NO"]?></td>
                                                <td><?=$row["REQUEST_MEMBER_ID"].' '.$row["REQUEST_MEMBER_NAME"]?></td> 
                                                <td><?=$row["REQUEST_MAP_DESC"]?></td>
                                                <td><?=$this->common->viewDate($row["REQUEST_YYMD"])?></td>
                                                <td><?=$row["REQUEST_TAG_DESC"]?></td>
                                                <td><?=$row["CAR_DESC"]?></td>
                                                <td><?=$row["CAR_NUMBER"]?></td>
                                                <td>
                                                    <?if($row["REQUEST_MEMBER_ID"] == $this->session->userdata('login_id')){?>
                                                        <?=$row["REQUEST_PHONE_NO"]?>
                                                    <?}else{?>
                                                        <?if($this->session->userdata('s_depot_code') == "40001000" || $this->session->userdata('s_depot_code') == "83001000"){?>
                                                            <?=$row["REQUEST_PHONE_NO"]?>
                                                        <?}else{?>
                                                            010-XXXX-XXXX
                                                        <?}?>
                                                    <?}?>
                                                </td>

<?if($_is_test_user){?>
                                                <!-- 총무과 제출/반려 버튼 (테스트) -->
                                                <? if($row['GA_STATUS'] == '접수전' || $row['GA_STATUS'] == '총무반려'){ ?>     
                                                    <td>
                                                        <a class="btn btn-warning btn-xs" href="javascript:submitGA('<?=$row["REQUEST_YYMD"]?>', '<?=$row["REQUEST_SEQ"]?>')">제출</a>
                                                    </td>
                                                <? }else{?>
                                                    <? if($this->session->userdata('login_id') === '2386' && $row['GA_STATUS'] == '접수'){ ?>
                                                        <td>
                                                            <a class="btn bg-blue btn-xs" href="javascript:RejectGA('<?=$row["REQUEST_YYMD"]?>', '<?=$row["REQUEST_SEQ"]?>', '<?=$row["REQUEST_MEMBER_ID"]?>')">반려</a>
                                                        </td>
                                                    <? }else{ ?>   
                                                        <td>접수</td>
                                                    <? } ?> 
                                                <? }?>
                                                <!-- 결재 버튼 (테스트) -->               
                                                <?if($row["REQUEST_YYMD"] < 20240424){?>           
                                                    <td><?=$appBtnDesc?></td>    
                                                <?}else{?>
                                                    <?if($row['GA_STATUS'] == '접수전'){ ?>
                                                        <td></td>
                                                    <?}else if($row['GA_STATUS'] == '신청취소'){?>
                                                        <td>종결</td>
                                                    <?}else{?>
                                                        <td><a class="btn btn-ktk btn-xs" href="javascript:onMemberCarInfoAppCreate('<?=$row["REQUEST_MEMBER_NAME"]?>','<?=$row["INSERT_USER_ID"]?>','<?=$row["REQUEST_YYMD"]?>','<?=$row["REQUEST_SEQ"]?>','<?=$appBtnEvent?>');"><?=$appBtnDesc?></a></td>
                                                    <?}?>
                                                <?}?>
                                                <td><?=$row["GA_STATUS"]?></td>
                                                <td><?=$row["REMARKS"]?></td>
                                                <td>
                                                    <?if($this->session->userdata('s_depot_code') == "83001000"){?>
                                                        <a class="btn btn-ktk btn-xs" data-i18n="base:Button.btnEdit" href="javascript:onRequestEdit('<?=$row["REQUEST_YYMD"]?>','<?=$row["REQUEST_SEQ"]?>', '<?=$row["REQUEST_MEMBER_ID"]?>', '<?=$row["REQUEST_PHONE_NO"]?>', '<?=$row["GA_STATUS"]?>', '<?=$row["GA_STATUS_RAW"]?>');">수정/삭제</a>
                                                    <?}elseif($row["GA_STATUS"] == '신청취소'){?>
                                                        <a class="btn btn-ktk btn-xs" data-i18n="base:Button.btnDetail" href="javascript:onRequestDetail('<?=$row["REQUEST_YYMD"]?>','<?=$row["REQUEST_SEQ"]?>');">열람</a>
                                                    <?}elseif($row["APP_STATUS"] == '-1' || $row["APP_STATUS"] == '0'){?>
                                                        <a class="btn btn-ktk btn-xs" data-i18n="base:Button.btnEdit" href="javascript:onRequestEdit('<?=$row["REQUEST_YYMD"]?>','<?=$row["REQUEST_SEQ"]?>', '<?=$row["REQUEST_MEMBER_ID"]?>', '<?=$row["REQUEST_PHONE_NO"]?>', '<?=$row["GA_STATUS"]?>', '<?=$row["GA_STATUS_RAW"]?>');">수정/삭제</a>
                                                    <?}else{?>
                                                        <a class="btn btn-ktk btn-xs" data-i18n="base:Button.btnDetail" href="javascript:onRequestDetail('<?=$row["REQUEST_YYMD"]?>','<?=$row["REQUEST_SEQ"]?>');">열람</a>
                                                    <?}?>
                                                </td>
<?}else{?>
                                                <!-- 결재 버튼 (본서버) -->               
                                                <?if($row["REQUEST_YYMD"] < 20240424){?>           
                                                    <td><?=$appBtnDesc?></td>    
                                                <?}else{?>
                                                    <td><a class="btn btn-ktk btn-xs" href="javascript:onMemberCarInfoAppCreate('<?=$row["REQUEST_MEMBER_NAME"]?>','<?=$row["INSERT_USER_ID"]?>','<?=$row["REQUEST_YYMD"]?>','<?=$row["REQUEST_SEQ"]?>','<?=$appBtnEvent?>');"><?=$appBtnDesc?></a></td>
                                                <?}?>
                                                <td><?=$row["APP_TAG_1_STATUS"]?></td>
                                                <td><?=$row["APP_TAG_2_STATUS"]?></td>
                                                <td><?=$row["REMARKS"]?></td>
                                                <td>
                                                    <?if($this->session->userdata('s_depot_code') == "83001000" || ($row["APP_STATUS"] == '-1' || $row["APP_STATUS"] == '0')){?>
                                                        <a class="btn btn-ktk btn-xs" data-i18n="base:Button.btnEdit" href="javascript:onRequestEdit('<?=$row["REQUEST_YYMD"]?>','<?=$row["REQUEST_SEQ"]?>');">수정/삭제</a>
                                                    <?}else{?>
                                                        <a class="btn btn-ktk btn-xs" data-i18n="base:Button.btnDetail" href="javascript:onRequestDetail('<?=$row["REQUEST_YYMD"]?>','<?=$row["REQUEST_SEQ"]?>');">열람</a>
                                                    <?}?>
                                                </td>
<?}?>
                                                </tr>
                                        <?
                                                $currow++;
                                            }?>
                                        </tbody>
                                        <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tfoot>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                    </div>         
                </div>
            </div>
        <!-- /.box-body --> 
        </div>
    <!-- /.box --> 
    </div>
  <!-- /.col --> 
</div>

<!-- modal -->
<?
    $paramView = array( array('id'=>'memberCarInfoModal', 'title'=>'차량출입증신청서', 'width'=>'1600', 'tail'=>'3'),
                        array('id'=>'memberCarManager', 'title'=>'담당자지정', 'width'=>'700', 'tail'=>'2'),);
	$this->common->loadModalMultiInit($paramView);
	$this->common->loadModal($paramView);
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/work/app/appRequest/appRequestBasic.php'; ?>
