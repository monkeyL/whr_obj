<?php

/* PHP SDK
 * @version 2.0.0
 * @author magicsky0@163.com
 * @copyright © 2014, Ctrip Corporation. All rights reserved.
 */

class SearchGroup
{
	public $open_api = '/Tuan/Product_Get.asmx';
	
	public $keyword;
	public $page;
	public $PageSize;
	public $sort;
	public $city;
	public $startTime;
	public $endTime;
	public $heightPrice;
	public $lowPrice;
	
	public function __construct( $open_api, $args )
	{
		$this->city = $args['city'];
		$this->startTime = $args['startTime'];
		$this->endTime = $args['endTime'];
		$this->heightPrice = $args['heightPrice'];
		$this->lowPrice = $args['lowPrice'];
		$this->keyword = $args['keyword'];
		$this->page = $args['page'];
		$this->PageSize = $args['pageSize'];
		$this->sort = $args['sort'];
		$this->open_api = $open_api.$this->open_api; // TODO:检测open api，如果不合法则覆盖重写
	}
	
	/**
	 * 构造请求xml字符串
	 * @param int $uid
	 * @param int $sid
	 * @param string $stmp
	 * @param string $sign
	 * @param stirng $type
	 */
	public function request_xml( $uid, $sid, $stmp, $sign, $type )
	{
		$request_xml = 
			'<?xml version="1.0" encoding="utf-8"?>'
			.'<Request>'
			.'<Header AllianceID="'.$uid.'" SID="'.$sid.'" TimeStamp="'.$stmp.'" RequestType="'.$type.'" Signature="'.$sign.'" />'
			.'<SearchProductRQ>'
			.'<SearchCondition>'
			.'<KeywordList>'
			.'<Keyword>'.$this->keyword.'</Keyword>'
			.'</KeywordList>'
			.'<PriceRange>'
			.'<MinPrice>'.$this->lowPrice.'</MinPrice>'
			.'<MaxPrice>'.$this->heightPrice.'</MaxPrice>'
			.'</PriceRange>'
			.'<DateRange>'
			.'<StartDate>'.$this->startTime.'</StartDate>'
			.'<EndDate>'.$this->endTime .'</EndDate>'
            .'</DateRange>'
			.'<CityInfo>'
			.'<CityName>'.$this->city.'</CityName>'	
			.'</CityInfo>'
			.'<ItemTypeList>'
			.'<ItemType>1</ItemType>'
			.'</ItemTypeList>'
			.'</SearchCondition>'
			.'<DisplaySettings >'
			.'<PageSettings>'
			.'<PageSize>'.$this->PageSize.'</PageSize>'
			.'<CurrentPageIndex>'.$this->page.'</CurrentPageIndex>'
			.'<SortType>'.$this->sort.'</SortType>'
			.'</PageSettings>'			
			.'</DisplaySettings>'			
			.'</SearchProductRQ>'
			.'</Request>';
		// dump($request_xml);
		// 需要将此处的xml嵌入到外层xml中，故需要将其转义
		$request_xml = str_replace("<",@"&lt;",$request_xml);
		$request_xml = str_replace(">",@"&gt;",$request_xml);
		// dump($request_xml);die();
		return $request_xml;
	}
	
	public function respond_xml( $string )
	{
		// 将内层xmll中转义的符号恢复
		$string = str_replace("&lt;","<",$string);
		$string = str_replace("&gt;",">",$string);

		return simplexml_load_string($string);	
	}
}
