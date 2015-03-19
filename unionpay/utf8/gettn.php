﻿<?php

header ( 'Content-type:text/html;charset=utf-8' );
// echo '<pre>';

// var_dump($_SERVER["DOCUMENT_ROOT"]);die();
// echo '</pre>';

// die(ROOT.'/unionpay/PM_700000000000001_acp.pfx');
include_once $_SERVER ['DOCUMENT_ROOT'] . '/unionpay/utf8/func/common.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/unionpay/utf8/func/SDKConfig.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/unionpay/utf8/func/secureUtil.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/unionpay/utf8/func/httpClient.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/unionpay/utf8/func/log.class.php';
/**
 * 消费交易-控件后台订单推送 
 */
$order = isset($_GET['orderNo'])?$_GET['orderNo']:0;
if (!$order) {
	echo "请传入订单号";
}

/**
 *	以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己需要，按照技术文档编写。该代码仅供参考
 */
// 初始化日志
// echo "<pre>";
$log = new PhpLog ( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
$log->LogInfo ( "============处理前台请求开始===============" );
// 初始化日志
$params = array(
		'version' => '5.0.0',				//版本号
		'encoding' => 'utf-8',				//编码方式
		'certId' => getSignCertId (),			//证书ID
		'txnType' => '01',				//交易类型	
		'txnSubType' => '01',				//交易子类
		'bizType' => '000202',				//业务类型
		'frontUrl' =>  SDK_FRONT_NOTIFY_URL,  		//前台通知地址，控件接入的时候不会起作用
		'backUrl' => SDK_BACK_NOTIFY_URL,		//后台通知地址	
		'signMethod' => '01',		//签名方法
		'channelType' => '08',		//渠道类型，07-PC，08-手机
		'accessType' => '0',		//接入类型
		'merId' => '777290058111477',	//商户代码，请改自己的测试商户号
		'orderId' => $order,	//商户订单号，8-40位数字字母
		'txnTime' => date('YmdHis'),	//订单发送时间
		'txnAmt' => '1',		//交易金额，单位分
		'currencyCode' => '156',	//交易币种
		'orderDesc' => '订单描述',  //订单描述，可不上送，上送时控件中会显示该信息
		'reqReserved' =>' 透传信息', //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现
		);


// 签名
sign ( $params );

// echo "请求：" . getRequestParamString ( $params );
$log->LogInfo ( "后台请求地址为>" . SDK_App_Request_Url );
// 发送信息到后台
$result = sendHttpRequest ( $params, SDK_App_Request_Url );
$log->LogInfo ( "后台返回结果为>" . $result );

echo "应答：" . $result;
// $result = json_decode($result,true);
// var_dump(expression)
//返回结果展示
$result_arr = coverStringToArray ( $result );
// explode(delimiter, string)
echo isset ($result_arr['tn'] ) ? $result_arr['tn'] : '验签失败';
// echo verify ( $result_arr ) ? '验签成功' : '验签失败';
// echo "</pre>";
?>

